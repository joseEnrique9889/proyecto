<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\UserRol\Traits\UserTrait;

class User extends Authenticatable
{
    use Notifiable,UserTrait ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

     public function usuario(){
        return $this->hasMany('App\Comentario', 'user_id');
    }

    public function producto(){
        return $this->hasMany('App\producto','user_id');
    }

public function user()
{
    return $this->belongsTo('App\User');
}
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



   
}
