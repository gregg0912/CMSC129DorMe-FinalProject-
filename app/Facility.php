<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{

	protected $fillable = [
		'dorm_id', 'facility_name',
	];

    public function dorm(){
    	return $this->belongsTo('App\Dorm');
    }
}
