<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InicioController extends Controller
{
	 public function __construct(){
   		$this->middleware('auth');
   	//	$this->middleware('roles');

   }
    public function tablero(){
      switch (Auth::user()->id) {
        case  '1':
          $users = DB::table('users')->count();
          $clientes = DB::select('SELECT count(*) as cuantos from roles where name = "Cliente"')[0]->cuantos;
          $empleados = DB::select('SELECT count(*) as cuantos from roles where name <> "Cliente"')[0]->cuantos;
          $productos =DB::table('productos')->count();
          $categorias = DB::table('categorias')->count();
          $concesionados = DB::select('SELECT count(*) as cuantos from productos where concesionado = 2')[0]->cuantos;
          return view('supervisor.tablero', compact('users','clientes','empleados','categorias','productos','concesionados'));
          break;
        case '2':

        $concesionados = DB::select('SELECT count(*) as cuantos from productos where concesionado = 2')[0]->cuantos;
        $porconcesionar = DB::select('SELECT count(*) as cuantos from productos where concesionado = 0')[0]->cuantos;
        

        return view('supervisor.tablero', compact('concesionados','porconcesionar'));
          break;
        default:
        return view('supervisor.tablero');
                    break;
      }
    			
    			
    	
    }
}
