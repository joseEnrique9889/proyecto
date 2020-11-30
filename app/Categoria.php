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
}
