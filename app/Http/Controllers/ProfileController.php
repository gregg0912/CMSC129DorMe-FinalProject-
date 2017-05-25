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
    	$request->merge(array('password' => bcrypt($request->password)));
    	$user->update($request->all());
    	return redirect('/profile/'.Auth::user()->username);
    }

}
