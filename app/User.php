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
        'name', 'email', 'password', 'username', 'bdate'
    ];

    protected $dates = [
        'bdate'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function following(){
        // return $this->hasMany('App\Follows');
        return $this->belongsToMany('App\User', 'follows', 'user_id', 'following'); // belongsToMany(Model, table, other foreign id, similar id to both tables)
    }
}
