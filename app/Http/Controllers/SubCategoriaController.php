<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Producto;

class SubCategoriaController extends Controller
{
	public function index()
    {
        //
       // $this->authorize('haveaccess','categoria.index');
        $categorias=Categoria::orderBy('id','Asc')->paginate(10);

      return view('supervisor.categoria.index',compact('categorias'));
    }
    	public function subcategoria($id)
    {
        //
       // $this->authorize('haveaccess','categoria.index');

    	//$usuarios= User::
        $subcategoria=Categoria::findOrFail($id);

      return view('supervisor.subcategoria.index',compact('subcategoria'));
    }

     public function create($id){
    	$categoria =Categoria::findOrFail($id);
    	//$usuarios = User::where('id',Auth::id())->get();
    	//$user =Material::findOrFail($id);
       return view('supervisor.subcategoria.create',compact('categoria'));

    }

    public function store(Request $request)
    {
        $categoria=request()->except('_token');
        $categoria['subcategoria']='si';
        if ($request->hasFile('imagen')) {
            $categoria['imagen']=$request->file('imagen')->store('uploads/categoria','public');
        }
       	Categoria::insert($categoria);
      	 return redirect('categoria')->with('status_success','Material Reservado Correctamente');
    }


    public function lista(){
       $categorias=Categoria::orderBy('id','Asc')->paginate(10);

      return view('supervisor.subcategoria.lista',compact('categorias'));
    }

    public function subcate($id)
    {
        //
       // $this->authorize('haveaccess','categoria.index');

      //$usuarios= User::
        $subcat=Categoria::findOrFail($id);

      return view('listsubcat',compact('subcat'));
    }

}
