<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $datos['productos']=Producto::paginate(5);

      return view('supervisor.producto.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supervisor.producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        // $datosCategorias=request()->all();
        $datosProductos=request()->except('_token');
        //validamos que el campo imagen tenga algo

        if ($request->hasFile('imagen')) {
            $datosProductos['imagen']=$request->file('imagen')->store('uploads/producto','public');
        }
       Producto::insert($datosProductos);
        //return response()->json($datosCategorias);
        //return view('supervisor.categoria.index');
       return redirect('producto');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        
        $datosProductos=request()->except(['_token','_method']);

       if ($request->hasFile('imagen')) {

            $producto= Producto::findOrFail($id);

            Storage::delete('public/'.$producto->imagen);

            $datosProductos['imagen']=$request->file('imagen')->store('uploads/producto','public');
        }

        Producto::where('id','=',$id)->update($datosProductos);

        $producto= Producto::findOrFail($id);

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
        $producto= Producto::findOrFail($id);

       if(Storage::delete('public/'.$producto->imagen)){

          Producto::destroy($id);  
       }

        return redirect('producto');
    }
}