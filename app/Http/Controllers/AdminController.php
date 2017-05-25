<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\RequestDorm;
use App\RequestFacility;
use App\Dorm;
use App\Facility;
use App\RequestAddon;
use App\Addon;
use App\RequestRoom;
use App\Room;
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
    	$this->getSendFacilities($dorm_id);
    	$this->getSendAddon($dorm_id);
    	 $this->getSendRoom($dorm_id);
    	 $this->deleteFromRoom($dorm_id);
    	$this->deleteFromAddon($dorm_id);
    	$this->deleteFromFacilities($dorm_id);
    	$this->deleteFromDorm($dorm_id);

 
    }
      public function deleteFromDorm($dorm_id)
    {
    	//dd($rfac);
    	// $del = RequestDorm::find(2);
    	return RequestDorm::where('id', $dorm_id->id)->delete();
    	// return $del;
    }
     public function deleteFromRoom($dorm_id)
    {
    	//dd($rfac);
    	return RequestRoom::where('request_id', $dorm_id->id)->delete();
    }
    public function deleteFromAddon($dorm_id)
    {
    	//dd($rfac);
    	return RequestAddon::where('request_id', $dorm_id->id)->delete();

    }
    public function deleteFromFacilities($dorm_id)
    {
    	//dd($rfac);
    	return RequestFacility::where('request_id', $dorm_id->id)->delete();

    }


     public function getSendRoom($dorm_id)
    {
    	$rRoom = RequestRoom::find($dorm_id);
    	//dd($rfac);
    	return Room::create([
            'dorm_id' => $rRoom['request_id'],
            'maxNoOfResidents' => $rRoom['maxNoOfResidents'],
            'typeOfPayment' => $rRoom['typeOfPayment'],
            'price' => $rRoom['price'],
        ]);
    }
    public function getSendAddon($dorm_id)
    {
    	$rAddon = RequestAddon::find($dorm_id);
    	//dd($rfac);
    	return Addon::create([
            'add_id' => $rAddon['request_id'],
            'add_item' => $rAddon['add_item'],
            'add_price' => $rAddon['add_price'],
        ]);
    }
    public function getSendFacilities($dorm_id)
    {
    	$rfac = RequestFacility::find($dorm_id);
    	//dd($rfac);
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
