<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Categoria;
use App\Producto;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
    public function getCat(){
    
    $datos['categorias']=Categoria::paginate(10);

      return view('welcome',$datos);
	}
	public function getProd(){

    $datos['productos']=Producto::paginate(10);
      return view('buscar.listar',$datos);
	}

	public function getsearch($nombre){
	
		$categoria=Categoria::where('nombre', $nombre)->pluck('id')->first();

		$productos =Producto::where('categoria_id', $categoria)->orderBy('id','Desc')->paginate(5);

		 return view('buscar.listar',compact('productos'));
	}

}
