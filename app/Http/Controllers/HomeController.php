<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Categoria;
use App\Producto;
use App\User;
use App\Comprado;
use App\Calificacion;
use App\Mail\ProductoComprado;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
    public function getCat(){
    
    $datos['categorias']=Categoria::paginate(10);

      return view('welcome',$datos);
	}
  
	public function getProd(Request $request){

    $nombres = $request->get('buscar');
        $datos['productos'] =Producto::where('nombre','like',"%$nombres%")->paginate(10);

   // $datos['productos']=Producto::paginate(10);
      
      return view('buscar.listar',$datos);
	}

	public function getsearch($id){
	
		$categoria=Categoria::where('id', $id)->pluck('id')->first();

		$productos =Producto::where('categoria_id', $categoria)->orderBy('id','Desc')->paginate(5);

		 return view('buscar.listar',compact('productos'));
	}

		public function index()
    {
 $productos = Producto::where('user_id',Auth::id())->get();
       
       return view('cliente.index',compact('productos'));
    }

    public function kardex(){
      $productos=Producto::orderBy('id','Asc')->paginate(10);

      return view('supervisor.kardex',compact('productos'));
    }

    public function detalle($id)
    {
       $producto =Producto::findOrFail($id);
       $comentarios = $producto->comentario()->get();
       return view('cliente.detalle',compact('producto','comentarios'));
    }

	public function comprar($id)
    {
       $producto =Producto::findOrFail($id);
       return view('cliente.show',compact('producto'));
    }

    public function update(Request $request, $id)
    {
        // $datosProdu=request()->except(['_token','_method']);
      $valores = $request->except(['_token','_method']);
      Producto::where('id','=',$id)->update($valores);

        //$registro= Revision::findOrFail($id);

       // $datosProdu=request()->except(['_token','_method']);
      $valores = $request->except(['_token','_method']);
      Producto::where('id','=',$id)->update($valores);

        //$registro= Revision::findOrFail($id);
     $valores['comprado']=DB::table('productos')->increment('comprado');  
     $valores['cantidad']=DB::table('productos')->decrement('cantidad'); 
     $registro= Producto::find($id);
     $registro->fill([$valores]);
     $registro->save();


      $user =User::find($registro->user_id);

   Mail::to($user->email)->send(new ProductoComprado($registro));
     return redirect("/calificacion/create")->with('status_success','Compra Realizada'); 
       
      
    }

    public function registrado(){

       $usuarios=User::orderBy('id','Asc')->paginate(10);

      return view('supervisor.vendedor.index',compact('usuarios'));
    }

    public function historial($id){

     $usuarios= User::findOrFail($id);

  $contar = DB::table('productos')->where('id', $usuarios);

    

        return view('supervisor.vendedor.show',compact('usuarios','contar'));
    }

     public function contador(){

       $usuarios=User::orderBy('id','Asc')->paginate(10);

      return view('contador.index',compact('usuarios'));
    }

    

}
