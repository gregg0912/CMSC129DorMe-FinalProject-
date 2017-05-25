<?php

namespace App\Http\Controllers;

use App\RequestDorm;
use App\RequestAddon;
use App\RequestRoom;
use App\RequestFacility;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Input;

class RequestDormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = Auth::user()->requests;
        return view('request.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('request.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'dormName.required' => 'Establishment should have a name',
            'dormName.unique' => 'Establishment name is already taken',
            'streetName.required' => 'Establishment should have a definitive street',
            'barangayNname.required' => 'Establishment should have a definitive barangay', 
            'dormName.max' => 'Establishment name can only be :max characters long',
            'location.required' => 'Establishment should have a location. Please choose whether it is in the dorm area or in banwa',
            'housingType.required' => 'Establishment should be given a housing type. Please choose among the provided categories',
            'facilities.required' => 'Establishment should have at least facility',
            'maxNum.required' => 'Please input maximum number of residents',
            'maxNum.min' => 'Maximum number of residents should at least be :min',
            'typeOfPayment.required' => 'Please provide a type of payment',
            'price.required' => 'Please provide a price for the room',
        ];

        $validation = Validator::make($request->all(),[
            'dormName' => 'required|unique:request_dorms|max:255',
            'streetName' => 'required',
            'barangayName' => 'required',
            'housingType' => 'required|in:boardinghouse,apartment,bedspace,dormitory',
            'location' => 'required|in:banwa,dormArea',
            'facilities' => 'required',
            'maxNum' => 'required|min:1',
            'typeOfPayment' => 'required|in:by_person,by_room',
            'price' => 'required'

        ], $messages);

        if($validation->fails()){
            return redirect('/request/create')
                    ->withErrors($validation)
                    ->withInput();
        }

        $requestDorm = new RequestDorm;
        $requestDorm->dormName = $request->dormName;
        $requestDorm->user_id = $request->user_id;
        $requestDorm->housingType = $request->housingType;
        $requestDorm->location = $request->location;
        $requestDorm->thumbnailPic = "/img-uploads/no_image.png";
        $requestDorm->streetName = $request->streetName;
        $requestDorm->barangayName = $request->barangayName;
        $requestDorm->save();

        $requestId = $requestDorm->id;

        for($i=0, $facilities = Input::get('facilities'); $i < count($facilities); $i++){
            $requestFacility = new RequestFacility;
            $requestFacility->request_id = $requestId;
            $requestFacility->facility_name = $facilities[$i];
            $requestFacility->save();
        }

        for ($i=0, $maxNum = Input::get('maxNum'), $typeOfPayment = Input::get('typeOfPayment'), $price = Input::get('price'); $i < count($maxNum) && $i < count($typeOfPayment) && $i < count($price); $i++) { 
            $requestRoom = new RequestRoom;
            $requestRoom->request_id = $requestId;
            $requestRoom->maxNoOfResidents = $maxNum[$i];
            $requestRoom->typeOfPayment = $typeOfPayment[$i];
            $requestRoom->price = $price[$i];
            $requestRoom->save();
        }

        if(!empty($request->addon)){
            for($i = 0; $i < count($request->addon); $i++){
                $requestAddon = new RequestAddon;
                $requestAddon->request_id = $requestId;
                $addon = explode("-", $request->addon[$i]);
                $requestAddon->add_item = $addon[0];
                $requestAddon->add_price = $addon[1];
                $requestAddon->save();
            }
        }

        if(!empty($request->add_item)){
            for($i = 0; $i < count($request->add_item); $i++){
                $requestAddon = new RequestAddon;
                $requestAddon->request_id = $requestId;
                $requestAddon->add_item = $request->add_item[$i];
                $requestAddon->add_price = $request->add_price[$i];
                $requestAddon->save();
            }
        }

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RequestDorm  $requestDorm
     * @return \Illuminate\Http\Response
     */
    public function show(RequestDorm $requestDorm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RequestDorm  $requestDorm
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestDorm $requestDorm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RequestDorm  $requestDorm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestDorm $requestDorm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RequestDorm  $requestDorm
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestDorm $requestDorm)
    {
        //
    }
}
