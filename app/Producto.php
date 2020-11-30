<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public function categoria(){
    	return $this->belongsTo('App\Categoria');
    }
    public function propietario(){
    	return $this->hasOne('App\User','id','user_id');
    }
    public function estaConsecionado(){
    	if ($this->concesionado) 
    			return "Si";
    		else
    			return "No";
    	}
    	public function usuario(){
    		return $this->belongsTo('App\User');
    	}
    

}
