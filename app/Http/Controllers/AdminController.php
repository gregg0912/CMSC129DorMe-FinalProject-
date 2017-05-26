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
use App\Notifications\DormReject;
use App\Notifications\DormApproved;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;

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
       



        return view('user.adminSettings',['dorm'=>$dormArray,'user'=>$userArray,'dormid'=>$dormIdArray]);
    }
    
     public function confirm(RequestDorm $dorm_id)
    
    {
        $rdorm = RequestDorm::find($dorm_id)->first();
       // $dormName = $dorm_id->dormName;
       // dd($dorm_id);
        //print_r($dorm_id->user_id);

        $this->addToDorm($rdorm);
        $this->getSendFacilities($dorm_id);
        $this->getSendAddon($dorm_id);
        $this->getSendRoom($dorm_id);
        $this->deleteFromRoom($dorm_id);
        $this->deleteFromAddon($dorm_id);
        $this->deleteFromFacilities($dorm_id);
        $this->deleteFromDorm($dorm_id);
        // $owner = User::where('id',"=",$dorm_id->user_id)->get()->first();
        $owner = User::find($dorm_id->user_id);

        //dd($owner);
      //  $owner->notify(new DormApproved);
        //dd($owner);
      Notification::send($owner, new DormApproved($dorm_id));
        return redirect('/admin');   
    }
    public function reject(RequestDorm $dorm_id)
    {
        
        $owner = User::find($dorm_id->user_id);


        Notification::send($owner, new DormReject($dorm_id));
        $this->deleteFromRoom($dorm_id);
        $this->deleteFromAddon($dorm_id);
        $this->deleteFromFacilities($dorm_id);
        $this->deleteFromDorm($dorm_id);
        return redirect('/admin');
           
    }
    
      public function deleteFromDorm($dorm_id)
    {
        return RequestDorm::where('id', $dorm_id->id)->delete();
    }
     public function deleteFromRoom($dorm_id)
    {
        return RequestRoom::where('request_id', $dorm_id->id)->delete();
    }
    public function deleteFromAddon($dorm_id)
    {
        return RequestAddon::where('request_id', $dorm_id->id)->delete();

    }
    public function deleteFromFacilities($dorm_id)
    {
        return RequestFacility::where('request_id', $dorm_id->id)->delete();

    }


     public function getSendRoom($dorm_id)
    {
        $rRoom = RequestRoom::where('request_id',"=",$dorm_id->id)->get();
        
        foreach($rRoom as $r){
            $room = new Room;
            $room->dorm_id = $r->request_id;
            $room->maxNoOfResidents = $r->maxNoOfResidents;
            $room->typeOfPayment = $r->typeOfPayment;
            $room->price = $r->price;
            $room->save();
        }
        
    }
    public function getSendAddon($dorm_id)
    {
        $rAddon = RequestAddon::where('request_id',"=",$dorm_id->id)->get();
        
        foreach($rAddon as $r){
            $addon = new Addon;
            $addon->dorm_id = $r->request_id;
            $addon->add_item = $r->add_item;
            $addon->add_price = $r->add_price;
            $addon->save();
        }
      
    }
    public function getSendFacilities($dorm_id)
    {
        $rfac = RequestFacility::where('request_id',"=",$dorm_id->id)->get();
        foreach($rfac as $r){
            $fac = new Facility;
            $fac->dorm_id = $r->request_id;
            $fac->facility_name = $r->facility_name;
            $fac->save();
        }
    


    }
   
    public function addToDorm($rdorm)
    {
        return Dorm::create([
            'dormName' => $rdorm['dormName'],
            'user_id' => $rdorm['user_id'],
            'housingType' => $rdorm['housingType'],
            'location' => $rdorm['location'],
            'thumbnailPic' => $rdorm['thumbnailPic'],
            'streetName' => $rdorm['streetName'],
            'barangayName' => $rdorm['barangayName'],
        ]);

    }

}
