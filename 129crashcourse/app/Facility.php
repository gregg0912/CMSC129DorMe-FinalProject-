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

    public static function facilityList(){
    	return Facility::orderBy('facility_name', 'asc')->groupBy('facility_name')->get();
    }
}
