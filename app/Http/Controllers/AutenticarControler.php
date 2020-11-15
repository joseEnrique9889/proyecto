<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutenticarControler extends Controller
{
    public function validar(Request $request)
    {
        switch ($request->input('usuario')) {
            case 'supervisor':
                if($request->input('password')=="supervisor")
                    return  redirect('/tablero');
                else return  redirect('/autenticar');
                break;
            case 'cliente':
                if($request->input('password')=="cliente")
                    return  redirect('/cuenta');
                else return  redirect('/autenticar');
                break;
            case 'encargado':
                if($request->input('password')=="encargado")
                    return  redirect('/revisar');
                else return  redirect('/autenticar');
                break;
            case 'contador':
                if($request->input('password')=="contador")
                    return  redirect('/totalizar');
                else return  redirect('/autenticar');
                break;                
            default:
                return  redirect('/autenticar')->with('error', 'Usuario no registrado');
                break;
        }
    }
}
