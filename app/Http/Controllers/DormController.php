<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Dorm;
use App\Facility;


class DormController extends Controller
{

    public function filter_faci(){
        $faci = Input::get('facilityList');

        // $facilities = Facility::where('facility_name', $faci)->get();

        if (!empty($faci)) {
            $dorms = Dorm::whereIn('')
        }
        // echo($faci[0]);
        // echo($faci[1]);

        // $dorms = serialize($faci);
       
        // return $dorms;


    }
    public function filter_location(){
        $location = Input::get('loc');

        if ($location == 'banwa') {
            $dorms = Dorm::where('location', 'banwa')->paginate(5);
        } 
        elseif ($location == 'dormArea') {
            $dorms = Dorm::where('location', 'dormArea')->paginate(5);
        }
        else{
           $dorms = Dorm::orderBy('dormName', 'asc')->paginate(5);

        }

        echo($location);
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
        $dorms = $this->filter_faci();
        $dorms = $this->filter_location();
        // $dorms = serialize($dorms);

        // return view('dorm.index', compact('dorms'));
        return view('dorm.index', ['dorms' => $dorms->appends(Input::except('page'))]);

    }

    public function voteIndex()
    {
        $dorms = Dorm::orderBy('dormName', 'asc')->get();
        return view('dorm.vote', compact('dorms'));
    }

    public function vote($id)
    {
        $dorm = Dorm::findOrFail($id);
        $dorm->increment('votes');
        $dorm->save();

        $dorms = Dorm::orderBy('dormName', 'asc')->get();
        return $dorms;
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
        //
        // $location = $request->get('loc');

        // echo $location;

        // $location->loc = Input::get('loc');
        // $location->save();
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
