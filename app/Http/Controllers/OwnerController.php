<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class OwnerController extends Controller
{
    //
     public function index()
    {
         $user = Auth::user();
        // echo $user->name;
        // foreach ($user->notifications as $notification) {
        //     foreach($notification->data as $message){
                 
        //          echo $message;
                 
        //     }
         $user->unreadNotifications->markAsRead();
         
        return view('user.notif',['user'=>$user]);
    }
       
	
}

