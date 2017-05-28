<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Cookie\CookieJar;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Dorm;
use App\Facility;
use App\Addon;
use App\Room;
use App\Comment;
use Auth;
use Cookie;

class DormController extends Controller
{

    public function filter(){
        $location = Input::get('loc');
        $faci = Input::get('facilityList');
        $search = Input::get('keyword');
        $size = count($faci);   

        if (!empty($faci) && !empty($location)) {

            $dormId = Facility::whereIn('facility_name', $faci)
                ->groupBy('dorm_id')
                ->havingRaw('COUNT(id) >='. $size)
                -> pluck('dorm_id');

            $dorms = Dorm::whereIn('id', $dormId)
                ->where('location', $location)
                ->paginate(5);
        }

        else if (!empty($search)) {
            $dorms = Dorm::where('dormName', 'like', '%'.$search.'%')
                 ->orWhere('housingType', 'like', '%'.$search.'%')
                 ->orWhere('barangayName', 'like', '%'.$search.'%')
                 ->paginate(5);
        }

        else if (!empty($location)) {    

            $dorms = Dorm::where('location', $location)->paginate(5);
        }

         else if(!empty($faci)){
     
              $dormId = Facility::whereIn('facility_name', $faci)
                    ->groupBy('dorm_id')
                    ->havingRaw('COUNT(id) >='. $size)
                    -> pluck('dorm_id');
            
            $dorms = Dorm::whereIn('id', $dormId)->paginate(5);

        }

        else{
           $dorms = Dorm::orderBy('dormName', 'asc')->paginate(5);

        }

        return $dorms;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dorms = Dorm::orderBy('dormName', 'asc')->paginate(5);
        $dorms = $this->filter();
        return view('dorm.index', ['dorms' => $dorms->appends(Input::except('page'))]);

    }

    public function voteIndex()
    {
        $dorms = Dorm::orderBy('dormName', 'asc')->get();
        if(Cookie::has('voted')){
            $dorms = Dorm::orderBy('votes', 'desc')->get();
        }
        return view('dorm.vote', compact('dorms'));
    }

    public function vote($id)
    {
        
        $dorm = Dorm::findOrFail($id);
        $dorm->increment('votes');
        if(!Cookie::has('voted'))
        {
            Cookie::queue('voted', 'true', 1440);
            $dorms = Dorm::orderBy('votes', 'desc')->get()->toArray();
            return $dorms;
        }
        return null;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment;
        
        if ($request->content != null) {
                $comment->content = $request->content;
                $comment->dorm_id = $request->comment_id;
                $comment->save();
                # code...
            }
            
            return redirect('/dorm/viewdorm/'.$request->comment_id);
    }
    public function delcom(Comment $comment_id)
    {
        //$comment = new Comment;
        
         //  dd($comment_id->dorm_id);
        if(Auth::user() != null && Auth::user()->role==1){
           Comment::find($comment_id->id)->delete();
            return redirect('/dorm/viewdorm/'.$comment_id->dorm_id);
        }
        else{
            return view('user.errorPage');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dorm = Dorm::findOrFail($id);
        return view('dorm.viewdorm', compact('dorm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($dorm)
    {
        $dorm = Dorm::findOrFail($dorm);
        return view('dorm.edit', compact('dorm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $dorm)
    {
        $messages = [
            'dormName.required' => 'Establishment should have a name',
            'dormName.unique' => 'Establishment name is already taken',
            'dormName.max' => 'Establishment name can only be :max characters long',
            'housingType.required' => 'Establishment should be given a housing type. Please choose among the provided categories',
            'housingType.in' => 'Housing Type should be among the following choices: boarding house, apartment, bedspace, or dormitory',
            'location.required' => 'Establishment should have a location. Please choose whether it is in the dorm area or in banwa',
            'location.in' => 'Location should only either be banwa or dorm area',
            'streetName.required' => 'Establishment should have a definitive street',
            'barangayNname.required' => 'Establishment should have a definitive barangay',
        ];

        $validation = Validator::make($request->all(),[
            'dormName' => 'required|unique:dorms|max:255',
            'streetName' => 'required',
            'barangayName' => 'required',
            'housingType' => 'required|in:boardinghouse,apartment,bedspace,dormitory',
            'location' => 'required|in:banwa,dormArea',

        ], $messages);

        if($validation->fails()){
            return redirect('/dorm/'.$dorm.'/edit')
                    ->withErrors($validation)
                    ->withInput();
        }
        $dorm_id = $dorm;
        $dorm = Dorm::findOrFail($dorm_id);
        $dorm->user_id = $request->user_id;
        $dorm->dormName = $request->dormName;
        $dorm->thumbnailPic = $request->thumbnailPic;
        $dorm->housingType = $request->housingType;
        $dorm->location = $request->location;
        $dorm->votes = $request->votes;
        $dorm->save();

        $dorm_facilities = Facility::where('dorm_id', $dorm_id)->delete();

        for($i = 0, $facilities = $request->input('facilities.*'); $i < count($facilities); $i++){
            $facility = new Facility;
            $facility->dorm_id = $dorm_id;
            $facility->facility_name = $facilities[$i];
            $facility->save();
        }

        $dorm_addon = Addon::where('dorm_id', $dorm_id)->delete();

        $add_item = $request->input('add_item.*');
        $add_price = $request->input('add_price.*');
        if(!empty($add_item)){
            for($i = 0; $i < count($add_item); $i++){
                $addon = new Addon;
                $addon->dorm_id = $dorm_id;
                $addon->add_item = $add_item[$i];
                $addon->add_price = $add_item[$i];
                $addon->save();
            }
        }

        $dorm_room = Room::where('dorm_id', $dorm_id)->delete();

        $maxNum = $request->input('maxNum.*');
        $typeOfPayment = $request->input('typeOfPayment.*');
        $price = $request->input('price.*');
        for($i = 0; $i < count($maxNum) && $i < count($typeOfPayment) && $i < count($price); $i++ ){
            $room = new Room;
            $room->dorm_id = $dorm_id;
            $room->maxNoOfResidents = $maxNum[$i];
            $room->typeOfPayment = $maxNum[$i];
            $room->price = $price[$i];
            $room->save();
        }

        return redirect('/dorm/viewdorm/'.$dorm_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $dorm = Dorm::find($id);
        $dorm->delete();
        $deletedFacility = Facility::where('dorm_id', $id)->delete();
        $deletedAddon = Addon::where('dorm_id', $id)->delete();
        $deletedRoom = Room::where('dorm_id', $id)->delete();

        return redirect('/home/show');
    }
}
