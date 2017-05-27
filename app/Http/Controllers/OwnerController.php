<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class OwnerController extends Controller
{
    //
     public function index() //after owner clicks the notifications tab
    {
         $user = Auth::user();
         if($user!=null && $user==0){

	        // echo $user->name;
	        // foreach ($user->notifications as $notification) {
	        //     foreach($notification->data as $message){
	                 
	        //          echo $message;
	                 
	        //     }
	         $user->unreadNotifications->markAsRead();

	        return view('user.notif',['user'=>$user]);
   		 }
   		 else{
   		 	 return view('user.errorPage');
   		 }
    }
       
	
}

