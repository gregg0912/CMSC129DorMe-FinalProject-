<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Cookie\CookieJar;
use Illuminate\Support\Facades\File;
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
