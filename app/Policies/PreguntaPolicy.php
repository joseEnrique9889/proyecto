<?php

namespace App\Policies;

use App\User;
use App\Comentario;
use Illuminate\Auth\Access\HandlesAuthorization;

class PreguntaPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
   // public function __construct()
    //{
        
    //}

    public function responder(User $user, Comentario $comentario){

        return $user->id >="4"; && is_null($comentario->respuesta);
    }

    public function moderar(User $user){
        return $user->id == "2"; 
    }
    public function delete(User $user){
        return $usuario->id == "2";
    }
}
