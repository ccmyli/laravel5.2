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
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function owns($related){
        return $this->id == $related->user_id;
    }

    public function account()
    {
        //参数说明 ID指的是App\Models\UserAccount 字段 对应user表的字段 
        return $this->hasOne('App\Models\UserAccount','user_id');
    }

    public function isScribe(){
        return true;
    }
}
