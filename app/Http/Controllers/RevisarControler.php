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

      $this->authorize('haveaccess','revisar.index');
       $productos =Revision::all();
       return view('encargado.Revisiones.index',compact('productos'));
    }
     public function show($id)
    {
      $this->authorize('haveaccess','revisar.index');
       $producto =Revision::findOrFail($id);
       return view('encargado.Revisiones.show',compact('producto'));
    }
     public function update(Request $request, $id)
    {
        $this->authorize('haveaccess','revisar.index');
      $valores = $request->except(['_token','_method']);
      Revision::where('id','=',$id)->update($valores);
      //revisamos si los valores del motivo fue ingresado entonces no cambiara el concesionado en 2. 
      if (!isset($valores['motivo'])) $valores['concesionado']=2;
      //si esto es falso entonces no los cambie en 1 
      else $valores['concesionado']=1;
      $registro= Revision::find($id);
      $registro->fill($valores);
      $registro->save();
     return redirect("/Revisiones")->with('status_success','Revision Realizada'); 
       
      
    }

}
