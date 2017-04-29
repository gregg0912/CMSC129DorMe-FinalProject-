<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
	
class ProfileController extends Controller
{
    public function profile($username){
    	$user = User::whereUsername($username)->first();
    	return view('user.profile', compact('user'));
    }

    public function settings(){
    	$user = User::find(Auth::user()->id);
    	return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id){
    	$user = User::find($id);
    	// $user['name'] = $request->name;
    	// $user['password'] = bcrypt($request->password);
    	// $user['username'] = $request->username;
    	// $user['bdate'] = $request->bdate;

    	// $user->update();
    	$request->merge(array('password' => bcrypt($request->password)));
    	$user->update($request->all());
    	return redirect('/profile/'.Auth::user()->username);
    }

    // public function (Request $request, $id){
    //     $user = User::find($id);
    // }

    // public function follow($user_id){ //follower
    //     // $user = User::find($id);
    //     $follow = new Follow;
    //     $follow->user_id = Auth::user()->id;
    //     $follow->save();

    //     $follower = Post::find($user_id);
    //     $followers = array();
    //     foreach ($variable as $key => $value) {
    //         # code...
    //     }



    //     return view('user.profile', compact('user'));
    // }
}
