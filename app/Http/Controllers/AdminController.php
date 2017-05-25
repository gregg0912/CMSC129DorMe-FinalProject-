<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\RequestDorm;
use App\RequestFacility;
use App\Dorm;
use App\Facility;
use DB;

class AdminController extends Controller
{
    //
     public function index()
    {
    	$userArray = [];
    	$dormArray = [];
    	$dormIdArray = [];

	    // $request = DB::table('request_dorms')->get();
	    $request = RequestDorm::all();
	    foreach($request as $req){
	    	$user = User::find($req->user_id);
	    	array_push($dormArray, $req->dormName);
	    	array_push($userArray, $user->name);
	    	array_push($dormIdArray, $req->id);
	    }
	    // dd($userArray);



	    return view('user.adminSettings',['dorm'=>$dormArray,'user'=>$userArray,'dormid'=>$dormIdArray]);
    }
     public function confirm(RequestDorm $dorm_id)
    {
    	$rdorm = RequestDorm::find($dorm_id);
    	$this->addToDorm($rdorm);
    	$this->getFacilities($dorm_id);


    	
    	// dd($dorm_id);
    	//add stuff to real stuff
    	
    	//copy query from requestdorm
    	//delete record from requestdorm
    	//query to dorms
    }
    public function getFacilities($dorm_id)
    {
    	$rfac = RequestFacility::find($dorm_id);
    	//dd($rfac);
    	$this->sendFacilities($rfac);

    }
    public function sendFacilities($rfac)
    {
    	return Facility::create([
            'dorm_id' => $rfac['request_id'],
            'facility_name' => $rfac['facility_name'],
            
        ]);
    }
    public function addToDorm($rdorm)
    {
    	return Dorm::create([
            'user_id' => $rdorm['user_id'],
            'dormName' => $rdorm['dormName'],
            'housingType' => $rdorm['housingType'],
            'location' => $rdorm['location'],
            'thumbnailPic' => $rdorm['thumbnailPic'],
            'streetName' => $rdorm['streetName'],
            'barangayName' => $rdorm['barangayName'],
        ]);

    }

}
