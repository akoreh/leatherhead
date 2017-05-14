<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){


        return $this->belongsTo('App\Role');
    }


    public function isAdmin(){

        if($this->role->name == 'admin'){

            return true;

        }

        return false;

    }

    public function orders(){
        return $this->hasMany('App\Order');
    }
}