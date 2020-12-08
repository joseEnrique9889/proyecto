<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
	protected $fillable = [
        'id','nombre', 'descripcion', 'imagen', 'cantidad', 'precio', 'estado','concesionado','comprado',
    ];

    public function comentario(){
        return $this->hasMany('App\comentario', 'producto_id');
    }


    public function categoria(){
    	return $this->belongsTo('App\Categoria');
    }
    public function propietario(){
    	return $this->hasOne('App\User','id','user_id');
    }
    
    	public function usuario(){
    		return $this->belongsTo('App\User');
    	}
    

}
