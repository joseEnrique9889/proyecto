<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Revision extends Producto
{
    protected $table ="productos";

    protected static function booted(){

    	static::addGlobalScope('concesionado',function (Builder $builder){
    		$builder->whereNull('concesionado');
    	});
    }
}
