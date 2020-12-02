<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use Illuminate\Support\Facades\Storage;

class CategoriasControler extends Controller
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
        //
       // $this->authorize('haveaccess','categoria.index');
        $categorias=Categoria::orderBy('id','Asc')->paginate(10);

      return view('supervisor.categoria.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $this->authorize('haveaccess','categoria.create');

        return view('supervisor.categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         //$this->authorize('haveaccess','categoria.create');

       // $datosCategorias=request()->all();
        $datosCategorias=request()->except('_token');
        //validamos que el campo imagen tenga algo

        if ($request->hasFile('imagen')) {
            $datosCategorias['imagen']=$request->file('imagen')->store('uploads/categoria','public');
        }
       Categoria::insert($datosCategorias);
        //return response()->json($datosCategorias);
        //return view('supervisor.categoria.index');
       return redirect('categoria')->with('status_success','Categoria Careada Correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // $this->authorize('haveaccess','categoria.show');
        $categoria= Categoria::findOrFail($id);

       return view('supervisor.categoria.show',compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // $this->authorize('haveaccess','categoria.edit');
        //devuelve todo el valor del id.
        $categoria= Categoria::findOrFail($id);

        return view('supervisor.categoria.edit',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
       // $this->authorize('haveaccess','categoria.edit');
        $datosCategorias=request()->except(['_token','_method']);

       if ($request->hasFile('imagen')) {

            $categoria= Categoria::findOrFail($id);

            Storage::delete('public/'.$categoria->imagen);

            $datosCategorias['imagen']=$request->file('imagen')->store('uploads/categoria','public');
        }

        Categoria::where('id','=',$id)->update($datosCategorias);

        $categoria= Categoria::findOrFail($id);

        return view('supervisor.categoria.edit',compact('categoria'))->with('status_success','Rol Guardado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$this->authorize('haveaccess','categoria.destroy');
        //
        $categoria= Categoria::findOrFail($id);

       if(Storage::delete('public/'.$categoria->imagen)){

          Categoria::destroy($id);  
       }

        return redirect('categoria');
    }
}
