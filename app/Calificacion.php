<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
      public function propietario(){
    	return $this->hasOne('App\User','id','user_id');
    }
    
    	public function usuario(){
    		return $this->belongsTo('App\User');
    	}
}
