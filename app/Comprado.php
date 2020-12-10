<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comprado extends Model
{
    public function quien(){
    	return $this->belongsTo('App\User','id','user_id');
    }

    public function comprado(){
    	return $this->hasMany('App\comentario', 'producto_id');
    }
}
