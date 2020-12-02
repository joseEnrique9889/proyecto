<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Revision;

class RevisarControler extends Controller
{
     public function __construct(){
        $this->middleware('auth');
    }
   public function index()
    {

       $productos =Revision::all();
       return view('encargado.Revisiones.index',compact('productos'));
    }
     public function show($id)
    {
       $producto =Revision::findOrFail($id);
       return view('encargado.Revisiones.show',compact('producto'));
    }
     public function update(Request $request, $id)
    {
     // $datosProdu=request()->except(['_token','_method']);
      $valores = $request->except(['_token','_method']);
      Revision::where('id','=',$id)->update($valores);

        //$registro= Revision::findOrFail($id);
      if (!isset($valores['motivo'])) $valores['concesionado']=2;
      else $valores['concesionado']=1;
      $registro= Revision::find($id);
      $registro->fill($valores);
      $registro->save();

    

        //return view('encargado.Revisiones.index',compact('registro'));

        //return view('encargado.Revisiones.show',compact('producto'));
     return redirect("/Revisiones")->with('status_success','Revision Realizada'); 
       
      
    }

}
