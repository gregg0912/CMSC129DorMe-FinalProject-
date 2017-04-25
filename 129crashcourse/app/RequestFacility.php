<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestFacility extends Model
{
    //
    protected $fillable = [
    	'request_id', 'facility_name',
    ];

    public function request(){
    	return $this->belongsTo('App\Request');
    }
}
