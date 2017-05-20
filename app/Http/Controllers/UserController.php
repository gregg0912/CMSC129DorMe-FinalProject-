<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function index(){
    	$users = User::all();

    	return view('users.index', compact('users'));
    }

    public function follower(Request $request, $user_id){
    	$user = User::find($user_id);
    	return view('users.follower', compact('user'));
    	// return redirect()->route('users.follower', [$user]);
    	// return redirect('/follows/'.$user_id);
    }
}
