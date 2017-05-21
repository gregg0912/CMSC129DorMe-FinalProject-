<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestDorm extends Model
{
    protected $fillable = [
    	'user_id', 'dormName', 'housingType', 'location', 'thumbnailPic', 'streetName', 'barangayName',
    ];

    public function addons(){
    	return $this->hasMany('App\RequestAddon');
    }

    public function facilities(){
    	return $this->hasMany('App\RequestFacility');
    }

    public function rooms(){
    	return $this->hasMany('App\RequestRoom');
    }

    public function user(){
    	return $this->belongsTo('App\User');
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

    public function getlocation(){
        if($this->location == 'banwa')
            return "Banwa";
        else if($this->location == 'dormArea')
            return "Dorm Area";
        return "Elsewhere";
    }
}
