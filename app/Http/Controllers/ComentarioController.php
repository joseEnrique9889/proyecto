<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Comentario;
use App\User;
use App\Producto;


class ComentarioController extends Controller
{
	
      public function __construct(){
        $this->middleware('auth');
    }
    public function index()
{
    $comentarios =Comentario::all();
    

        return view('Preguntas.index',compact('comentarios'));

}

    public function create($id)
    {
    $producto= Producto::find($id);
    if (is_null($producto)) return "UPSS, Producto No Encontrado"; 
    
    return view('Preguntas.create', compact('producto'));
    
    }

    public function store(Request $request){
        $valores = $request->all();
        $valores['user_id']=Auth::id();
        $registro = new Comentario();
        $registro->fill($valores);
        $registro->save();

        return redirect("/");
    }
}
