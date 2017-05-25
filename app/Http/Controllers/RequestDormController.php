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
