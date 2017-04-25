<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
    	'owner_id', 'dormName', 'housingType', 'location', 'thumbnailPic', 'streetName', 'barangayName',
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

    public function owner(){
    	return $this->belongsTo('App\Owner');
    }
}
