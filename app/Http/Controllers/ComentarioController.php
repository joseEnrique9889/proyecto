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

<<<<<<< HEAD
 public function preguntas()
{
   
    
       $comentarios = Comentario::where('user_id',Auth::id())->get();
        return view('Preguntas.preguntas',compact('comentarios'));

}

=======
>>>>>>> cc2ab4211efaffe9a20b3c0c4099446544c2eaf5
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
<<<<<<< HEAD

    public function edit($id){
         $comentario =Comentario::find($id);
        return view('Preguntas.edit',compact('comentario'));
    }

    public function show($id){
        $comentario =Comentario::find($id);
        return view('Preguntas.responder',compact('comentario'));
    

   }

    public function update(Request $resquest, $id)
    {
        $valores = $resquest->all();
        $registro = Comentario::find($id);
        if ($resquest->user()->id == 2) 
                $valores['p_autorizada']= date('Y-m-d H:i:s');
            else
                $valores['r_autorizada']= date('Y-m-d H:i:s');

            $registro->fill($valores);
            $registro->save();


            return redirect("/");

    }
=======
>>>>>>> cc2ab4211efaffe9a20b3c0c4099446544c2eaf5
}
