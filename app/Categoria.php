<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function productos(){
    	return $this->hasMany('App\Producto');
    }
    public function scopeSearchCategory($query, $id){
    	return $query->where('id', '=', '$id');
    }

    public function parent(){
    	return $this->belongsTo('App\Categoria');
    }

    public function subCategori(){
    	return $this->hasMany('App\Categoria','parent_id');
    }

    public function subproductos(){
        return $this->hasMany('App\Producto','parent_id');
    }
}
