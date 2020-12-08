<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    public $timestamps = false;
   protected $fillable = [
        'id', 'contenido', 'user_id', 'producto_id','respuesta', 'hora_p', 'p_autorizada', 'r_autorizada',
    ];


    public function producto(){
    	return $this->hasOne('App\Producto','id', 'producto_id');
    }

     public function propietario(){
    	return $this->hasOne('App\User','id','user_id');
    }
}
