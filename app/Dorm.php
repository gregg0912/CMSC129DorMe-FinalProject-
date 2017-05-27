<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dorm extends Model
{

	protected $fillable = [
    	'dormName', 'user_id', 'housingType', 'location', 'thumbnailPic', 'votes', 'streetName', 'barangayName',
    ];

    public function user(){
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

    public function getHousingType(){
        if($this->housingType == 'boardinghouse')
            return "Boarding House";
        else if($this->housingType == 'apartment')
            return "Apartment";
        else if($this->housingType == 'dormitory')
            return "Dormitory";
        return "Bed-space";
    }
    public function getLocation(){
        if($this->location == 'banwa')
            return "Banwa";
        else if($this->location == 'dormArea')
            return "Dorm Area";
        return "Elsewhere";
    }
    public function images(){
        return $this->hasMany('App\Image');
    }

}
