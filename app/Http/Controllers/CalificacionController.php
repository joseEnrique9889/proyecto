<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Calificacion;
use App\User;

class CalificacionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $calificaciones=Calificacion::orderBy('id','Asc')->paginate(10);

      return view('supervisor.calificacion.index',compact('calificaciones'));
    }
    
    public function create()
    {
        $usuarios = User::where('id',Auth::id())->get();
       // $this->authorize('haveaccess','producto.create');
        return view('cliente.calificacion.create',compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosCalificacion=request()->except('_token');
        
       Calificacion::insert($datosCalificacion);
    
       return redirect('/comprado');
    }

    public function show($id)
    {
       // $this->authorize('haveaccess','producto.show');
        $calificacion= calificacion::findOrFail($id);

        return view('supervisor.calificacion.show',compact('calificacion'));
    }
}
