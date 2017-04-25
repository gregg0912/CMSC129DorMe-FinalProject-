<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    public function dorm(){
    	return $this->belongsTo('App/Dorm');
    }
}
