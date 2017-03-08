<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password', 'style_id', 'photo_id'];

    protected $hidden = ['password', 'remember_token'];

    public function style(){
        return $this->belongsTo('App\Style');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function scores(){
        return $this->hasMany('App\Scores');
    }

    public function isAdmin(){
        if($this->role->name == "Admin"){
            return true;
        }
        return false;
    }

    public function isUser(){
        if($this->role->name == "User"){
            return true;
        }
        return false;
    }
}
