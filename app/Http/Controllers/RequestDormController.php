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
            'dormName.max' => 'Establishment name can only be :max characters long',
            'housingType.required' => 'Establishment should be given a housing type. Please choose among the provided categories',
            'housingType.in' => 'Housing Type should be among the following choices: boarding house, apartment, bedspace, or dormitory',
            'location.required' => 'Establishment should have a location. Please choose whether it is in the dorm area or in banwa',
            'location.in' => 'Location should only either be banwa or dorm area',
            'streetName.required' => 'Establishment should have a definitive street',
            'barangayNname.required' => 'Establishment should have a definitive barangay',
            'facilities[].smin' => 'Establishment should have at least 1 selected facility',
        ];

        $validation = Validator::make($request->all(),[
            'dormName' => 'required|unique:dorms|max:255',
            'streetName' => 'required',
            'barangayName' => 'required',
            'housingType' => 'required|in:boardinghouse,apartment,bedspace,dormitory',
            'location' => 'required|in:banwa,dormArea',
            'facilities[]' => 'min:1',

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
        $requestDorm->thumbnailPic = $request->thumbnailPic;
        $requestDorm->streetName = $request->streetName;
        $requestDorm->barangayName = $request->barangayName;
        $requestDorm->save();

        $requestId = $requestDorm->id;


        for($i=0, $facilities = $request->input('facilities.*'); $i < count($facilities); $i++){
            $requestFacility = new RequestFacility;
            $requestFacility->request_id = $requestId;
            $requestFacility->facility_name = $facilities[$i];
            $requestFacility->save();

        }

        for ($i=0, $maxNum = $request->input('maxNum.*'), $typeOfPayment = $request->input('typeOfPayment.*'), $price = $request->input('price.*'); $i < count($maxNum) && $i < count($typeOfPayment) && $i < count($price); $i++) { 
            $requestRoom = new RequestRoom;
            $requestRoom->request_id = $requestId;
            $requestRoom->maxNoOfResidents = $maxNum[$i];
            $requestRoom->typeOfPayment = $typeOfPayment[$i];
            $requestRoom->price = $price[$i];
            $requestRoom->save();

        }

        $addon = $request->input('addon.*');
        if(!empty($addon)){
            for($i = 0; $i < count($addon); $i++){
                $requestAddon = new RequestAddon;
                $requestAddon->request_id = $requestId;
                $addonSep = explode("-", $addon[$i]);
                $requestAddon->add_item = $addonSep[0];
                $requestAddon->add_price = $addonSep[1];
                $requestAddon->save();

            }
        }

        $add_item = $request->input('add_item.*');
        $add_price = $request->input('add_price.*');
        if(!empty($add_item)){
            for($i = 0; $i < count($add_item); $i++){
                $requestAddon = new RequestAddon;
                $requestAddon->request_id = $requestId;
                $requestAddon->add_item = $add_item[$i];
                $requestAddon->add_price = $add_price[$i];
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
