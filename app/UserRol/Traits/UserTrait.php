<?php

namespace App\UserRol\Traits;

trait UserTrait{
	//es: aqui donde empieza el rol
	 public function roles(){
        return $this->belongsToMany('App\UserRol\Models\Role')->withTimesTamps();
    }
    
    public function havePermission($permission){

        foreach ($this->roles as $role ) {
            if ($role['full-access'] =='yes'){
                return true;
            } 

            foreach ($role->permissions as $perm ) {
               if ($perm->slug == $permission){
                return true;
                } 
            }
        }
         return false;
       //return $this->roles;


    }

}