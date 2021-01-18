<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Revision;
use App\Producto;

class AjaxConcesionadoController extends Controller
{
    //

	public function index()
    {

    // $this->authorize('haveaccess','revisar.index');
       $productos =Producto::orderBy('id','Asc')->get();
       return view('encargado.Aceptados.index',compact('productos'));
    }

    public function Concesionado(Request $request, $id)
    {

    	 //$this->authorize('haveaccess','revisar.index');

    	$valores = $request->all();
        //$registro = Usuario::find($id);
        $registro= Producto::find($id);
        if(is_null($registro))  response()->json( ["error"=>"Registro no encontrado"] ,404);
        $valores['concesionado']=3;
        $registro->fill($valores);
        $registro->save();
        return response()->json($registro->toArray(),200);

    
      
       // return response()->json($registro->toArray(),200);
    }
}
