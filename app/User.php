<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
        'name', 'username', 'phone_number', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function dorms(){
        return $this->hasMany('App\Dorm');
    }

    public function requests(){
        return $this->hasMany('App\Request');
    }

    public function roles(){
        return $this->belongsToMany('App\Role');
    }
    public function isAdmin(){
        // return in_array(1, $this->roles()->pluck('admin')->all());
        return $this->roles()->where('admin', 1)->first();
    }
}
