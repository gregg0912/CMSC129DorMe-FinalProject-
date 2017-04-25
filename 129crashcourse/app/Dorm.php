<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dorm extends Model
{

	protected $fillable = [
    	'dormName', 'owner_id', 'housingType', 'location', 'thumbnailPic', 'votes', 'streetName', 'barangayName',
    ];

    public function owner(){
    	return $this->belongsTo('App\User');
    }

    public function facilities(){
    	return $this->hasMany('App\Facility');
    }

    public function rooms(){
    	return $this->hasMany('App\Room');
    }

    public function addons(){
    	return $this->hasMany('App\Addon');
    }
}
