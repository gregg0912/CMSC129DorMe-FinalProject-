<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $fillable = array('image_path', 'dorm_id');

	public function dorm(){
		return $this->belongsTo('App\Dorm');
	}
}
