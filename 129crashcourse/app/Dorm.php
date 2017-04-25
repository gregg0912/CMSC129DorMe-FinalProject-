<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dorm extends Model
{
    public function owner(){
    	return $this->belongsTo('App\User');
    }

    public function facilities(){
    	return $this->hasMany('App\Facility');
    }

    public function rooms(){
    	return $this->hasMany('App\Room');
    }

    public function addons(){
    	return $this->hasMany('App\Addon');
    }
}
