<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{

	protected $fillable = [
    	'dorm_id', 'add_item', 'add_price',
    ];
    
    public function dorm(){
    	return $this->belongsTo('App/Dorm');
    }
}
