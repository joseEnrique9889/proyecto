<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Auth;

class InicioController extends Controller
{
	 public function __construct(){
   		$this->middleware('auth');
   		$this->middleware('roles');

   }
    public function tablero(){
    			$users = DB::table('users')->count();
    			$clientes = DB::select('SELECT count(*) as cuantos from roles where name = "Cliente"')[0]->cuantos;
    			$empleados = DB::select('SELECT count(*) as cuantos from roles where name <> "Cliente"')[0]->cuantos;
    			$productos =DB::table('productos')->count();
    			$categorias = DB::table('categorias')->count();
    			return view('supervisor.tablero', compact('users','clientes','empleados','categorias','productos'));
    			
    	
    }
}
