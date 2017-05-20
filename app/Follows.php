<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Follows extends Model
{
    //
    // public function follows(){
    // 	return $this -> hasMany('App\User');
    // }

    public function follower(){
    	return $this->belongsToMany('App\User','follows',);
    }
}
