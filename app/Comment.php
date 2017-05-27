<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
    	'user_id','content'
    ];

    public function dorm(){
    	return $this->belongsTo('App\Dorm');
    }
}
