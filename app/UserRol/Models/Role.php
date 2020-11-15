<?php

namespace App\UserRol\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	//es: aqui donde empieza el rol
    protected $fillable = [
        'name', 'slug', 'description', 'full-access',
    ];

    public function users(){
    	return $this->belongsToMany('App\User')->withTimesTamps();
    }

    public function permissions(){
        return $this->belongsToMany('App\UserRol\Models\Permission')->withTimesTamps();
    }
}
