<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	public function user(){
		return $this->belongsTo('App\User');
	}

    protected $fillable = [
    	'content', 'user_id'
    ];

    public function likes(){
        return $this->hasMany('App\Like');
    }
}