<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subject;

class Student extends Model
{
    //
    public function subjects(){
    	return $this->hasMany('App\Subject');
    }
}
