<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Categoria;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
   public function index()
    {
        $productos = Producto::where('user_id',Auth::id())->get();

      return view('supervisor.producto.index',compact('productos'));
    }
    public function agregar($id)
    {
        $usuarios = User::where('id',Auth::id())->get();
        $cat= Categoria::findOrFail($id);
       // $this->authorize('haveaccess','producto.create');
        return view('supervisor.producto.create',compact('cat','usuarios'));
    }
    public function store(Request $request)
    {
        $datosProductos=request()->except('_token');
        //validamos que el campo imagen tenga algo
        if ($request->hasFile('imagen')) {
            $datosProductos['imagen']=$request->file('imagen')->store('uploads/producto','public');
        }
       Producto::insert($datosProductos);
       return redirect('producto')->with('status_success','Producto Creado Correctamente');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // $this->authorize('haveaccess','producto.show');
        $producto= Producto::findOrFail($id);

        return view('supervisor.producto.show',compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$this->authorize('haveaccess','producto.edit');
        //devuelve todo el valor del id.
        $producto= Producto::findOrFail($id);

        return view('supervisor.producto.edit',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // $this->authorize('haveaccess','producto.edit');
        $datosProductos=request()->except(['_token','_method']);

       if ($request->hasFile('imagen')) {

            $producto= Producto::findOrFail($id);

            Storage::delete('public/'.$producto->imagen);

            $datosProductos['imagen']=$request->file('imagen')->store('uploads/producto','public');
        }

        Producto::where('id','=',$id)->update($datosProductos);
        $valores['concesionado']=Null;
        $producto= Producto::findOrFail($id);
        $producto->fill($valores);
        $producto->save();
        return view('supervisor.producto.edit',compact('producto'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // $this->authorize('haveaccess','producto.destroy');
        $producto= Producto::findOrFail($id);

       if(Storage::delete('public/'.$producto->imagen)){

          Producto::destroy($id);  
       }

        return redirect('producto');
    }
}