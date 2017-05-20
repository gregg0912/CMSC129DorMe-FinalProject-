<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Dorm;
use App\User;
use Auth;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       return view('home');
    }

    public function show(Request $request, $id){
        $owner = $request->session()->get('key');

        echo($owner);
    }

    public function showDorms(){
        $id = Auth::user()->id;
        $ownerId = User::findOrFail($id)->where('id', $id)->pluck('id');
        $dorms= Dorm::where('user_id', $ownerId)->orderBy('dormName', 'asc')->paginate(5);

         return view('user.owndorm', ['dorms' => $dorms->appends(Input::except('page'))]);
    }

}
