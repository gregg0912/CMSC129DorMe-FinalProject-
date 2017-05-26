<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestAddon extends Model
{
    //
    protected $table = "request_addons";

    protected $fillable = [
    	'request_id', 'add_item', 'add_price',
    ];

    public function request(){
    	return $this->belongsTo('App\RequestDorm');
    }

}
