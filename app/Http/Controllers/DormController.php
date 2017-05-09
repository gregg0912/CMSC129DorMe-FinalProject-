<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
   use App\Http\Controllers\Controller;
use App\Dorm;

class DormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // echo "dfasdflaksjd";
            $dorms = Dorm::table('dorms')->where('location','banwa')->get();
        // echo $dorms;
        // $dorms = Dorm::orderBy('dormName', 'asc')->paginate(10);
        return view('dorm.index', compact('dorms'));
    }

    public function voteIndex()
    {
        $dorms = Dorm::orderBy('dormName', 'asc')->get();
        return view('dorm.vote', compact('dorms'));
    }

    // public function filterLocation(){
    //     $location = Input::get('loc') == 'true'? 1 : 0;


    //     if ($location == 'banwa') {
    //         $dorms = Dorm::where('location','banwa')->paginate(5);
    //     }
    //     else if ($location == 'dormArea') {
    //         $dorms = Dorm::where('location','dormArea')->paginate(5);
    //     }
    //     return view('dorm.index', compact('dorms'));

    // }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
