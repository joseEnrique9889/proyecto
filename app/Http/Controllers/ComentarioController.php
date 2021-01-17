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
      $this->authorize('haveaccess','comentario.index');
    $comentarios =Comentario::all();
    

        return view('Preguntas.index',compact('comentarios'));

}

 public function preguntas()
{
   
     $this->authorize('haveaccess','pregunta.create');
       $comentarios = Comentario::where('user_id',Auth::id())->get();
        return view('Preguntas.preguntas',compact('comentarios'));

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

    public function edit($id){
        $this->authorize('haveaccess','comentario.index');
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
        //verifica que si el usuario tiene el id que siempre en nuestra bd
        //sera el encargado entonces que me guarde el valor de la fecha 
        if ($resquest->user()->id == 2) 
                $valores['p_autorizada']= date('Y-m-d H:i:s');
            else
                //si eso es falso entonces que en respuesta autorizada.
                $valores['r_autorizada']= date('Y-m-d H:i:s');
            //ingresamos los valores en nuestr variable registro
            $registro->fill($valores);
            //guardamos nuestros valores
            $registro->save();


            return redirect("/");

    }

    public function destroy($id){
        $this->authorize('haveaccess','comentario.index');
        $comentario= Comentario::findOrFail($id);
         Comentario::destroy($id); 
         return redirect('comentario');
    }
}
