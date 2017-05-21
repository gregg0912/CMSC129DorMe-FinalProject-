<?php

namespace App\Http\Controllers;

use App\RequestDorm;
use Auth;
use Illuminate\Http\Request;

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
            'phone_number.regex' => 'Sample phone numbers: 09123456789 or +639123456789',
            'dorm_name.max' => 'Establishment name can only be :max characters long'
        ];

        $validation = Validator::make($request->all(),[
            'dormName' => 'required|unique|max:255',
            'streetName' => 'required',
            'barangayName' => 'required',
            'housingType' => 'required|in:boardinghouse,apartment,bedspace,dormitory',
            'location' => 'required|in:banwa,dormArea',
            'facilities' => 'required',
        ], $messages);
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
