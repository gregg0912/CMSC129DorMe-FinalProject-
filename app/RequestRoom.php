<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestRoom extends Model
{
    //
    protected $fillable = [
    	'request_id', 'maxNoOfResidents', 'typeOfPayment', 'price',
    ];

    public function request(){
    	return $this->belongsTo('App\RequestDorm');
    }
}
