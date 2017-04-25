<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

	protected $fillable = [
    	'dorm_id', 'maxNoOfResidents', 'typeOfPayment', 'price', 'availability',
    ];

    public function dorm(){
    	return $this->belongsTo('App\Dorm');
    }
}
