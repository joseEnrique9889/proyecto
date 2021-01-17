<?php

use Illuminate\Database\Seeder;
use App\User;
use App\UserRol\Models\Role;
use App\UserRol\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserRolInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//truncate tablas
    	DB::statement('SET foreign_key_checks=0');
	    	DB::table('role_user')->truncate();
	    	DB::table('permission_role')->truncate();
    		Permission::truncate();
    		Role::truncate();
		DB::statement('SET foreign_key_checks=1');
      
        // usuario supervisor 
        $useradmin= User::where('email','supervisor@admin.com')->first();
        if ($useradmin) {
        	$useradmin->delete();
        }
    	$useradmin= User::create([
    	'name' 	   => 'Jose Enrique',
    	'apellido' => 'Toledo Felipe',
      'imagen' => 'uploads/usuario/supervisor.png',
        'email'	   => 'supervisor@admin.com',
        'password' => Hash::make('supervisor')

    	]);

      $userencargado= User::create([
      'name'     => 'Abel Alejandro',
      'apellido' => 'Rojas Vazquez',
      'imagen' => 'uploads/usuario/encargado.jpg',
      'email'    => 'encargado@admin.com',
      'password' => Hash::make('encargado')

      ]);

      $usercontador = User::create([
        'name' => 'Darwin Alfredo',
        'apellido' => 'Trujillo Hernandez',
        'imagen' => 'uploads/usuario/contador.jpg',
        'email' => 'contador@admin.com',
        'password' => Hash::make('contador')
      ]);

    	//rol supervisor.
    	$roladmin=Role::create([
   		'name' => 'Admin',
   		'slug' => 'admin',
  		'description' => 'Administrador',
 		  'full-access' => 'no',
		]);

      $rolaencargado=Role::create([
      'name' => 'encargado',
      'slug' => 'encargado',
      'description' => 'se encarga de la consigancion de producto',
      'full-access' => 'no',
    ]);

      $rolcontador=Role::create([
      'name' => 'contador',
      'slug' => 'contador',
      'description' => 'se encarga de lo financiero',
      'full-access' => 'no',
    ]);


        //rol cliente
      $roluser=Role::create([
      'name' => 'Cliente',
      'slug' => 'cliente',
      'description' => 'Cliente',
      'full-access' => 'no',
    ]);
        //creacion de la realicion de la tabla de supervisor a la rol administrador
        $useradmin->roles()->sync([ $roladmin->id ]);
        $userencargado->roles()->sync([ $rolaencargado->id]);
        $usercontador->roles()->sync([ $rolcontador->id]);
        //$rolencargado->permissions()->sync( $permission_all );
        //permisos
        $permission_all = [];
        //creacion de los permisos roles
 $permission = Permission::create([
    	'name' => 'lista de roles',
		'slug' => 'role.index',
   		'description' => 'lista de roles',
   		]);
   		$permission_all[] = $permission->id;
 $permission = Permission::create([
    	'name' => 'ver',
		'slug' => 'role.show',
   		'description' => 'un usuario puede ver un rol',
   		]);
 		$permission_all[] = $permission->id;
 $permission = Permission::create([
    	'name' => 'creacion',
		'slug' => 'role.create',
   		'description' => 'creacion del rol',
   		]);
 		$permission_all[] = $permission->id;
 $permission = Permission::create([
    	'name' => 'Editar roles',
		'slug' => 'role.edit',
   		'description' => 'Editar  roles',
   		]);
		$permission_all[] = $permission->id;
 $permission = Permission::create([
    	'name' => 'Destroy',
		'slug' => 'role.destroy',
   		'description' => 'creacion del rol',
   		]);
 		$permission_all[] = $permission->id;
 			

 		//permisos de los usuarios
 		$permissionIndex = Permission::create([
    	'name' => 'lista de user',
		  'slug' => 'user.index',
   		'description' => 'lista de user',
   		]);
   		$permission_all[] = $permission->id;
 		$permissionShow = Permission::create([
    	'name' => 'show user',
		  'slug' => 'user.show',
   		'description' => 'un usuario puede ver un rol',
   		]);
 		$permission_all[] = $permission->id;
 	 	$permissionEdit = Permission::create([
    	'name' => 'Edit user',
		'slug' => 'user.edit',
   		'description' => 'Editar  roles',
   		]);
		$permission_all[] = $permission->id;
 		$permissionDestroy = Permission::create([
    	'name' => 'Destroy user',
		'slug' => 'user.destroy',
   		'description' => 'creacion del rol',
   		]);
    $permission_all[] = $permission->id;
    

    //nuevos permiso
    $permissionUserShow = Permission::create([
      'name' => 'ver mi propio usuario',
      'slug' => 'userpropio.show',
      'description' => 'un usuario puede ver su propio registro',
      ]);
    $permission_all[] = $permission->id;
    $permissionUserEdit = Permission::create([
      'name' => 'Edit mi propio user',
    'slug' => 'userpropio.edit',
      'description' => 'Editar propio user',
      ]);
    $permissionSide = Permission::create([
      'name' => 'se puede ver el sidebar',
    'slug' => 'sidebar.show',
      'description' => 'un usuario autenticado puede ver el sidebar',
      ]);

    $permissionComen= permission::create([
      'name' => 'puede moderar un comentario',
      'slug' =>'comentario.index',
      'description' => 'el usuario encargado puede moderar',
    ]);

     $permissionPregunta= permission::create([
        'name' => 'pregunta',
      'slug' =>'pregunta.create',
      'description' => 'el usuario cliente puede agregar una pregunta',
       ]);

    $permissionRev= permission::create([
      'name' => 'puede revisar y concesionar un producto',
      'slug' =>'revisar.index',
      'description' => 'el usuario encargado puede concesionar un producto',
    ]);

     $permissionListCat= permission::create([
      'name' => 'puede ver la lista de categoria',
      'slug' =>'categoria.index',
      'description' => 'el usuario supervisor puede ver la lista de categoria',
    ]);

     $permissionListProduct= permission::create([
      'name' => 'puede ver la lista de producto',
      'slug' =>'producto.index',
      'description' => 'el usuario supervisor puede ver la lista de producto',
    ]);

      $permissionRestPass= permission::create([
      'name' => 'contraseña',
      'slug' =>'contraseña.rest',
      'description' => 'el usuario supervisor puede cambiar su propia contraseña',
    ]);

      $permissionRestPassCo= permission::create([
      'name' => 'contraseña encargado',
      'slug' =>'restcon.rest',
      'description' => 'el usuario encargado puede cambiar la demas contraseña',
    ]);

      $permissionHistorial= permission::create([
      'name' => 'historial',
      'slug' =>'historial.view',
      'description' => 'el usuario supervisor puede ver el historial de un vendedor',
    ]);

       $permissionRole= permission::create([
      'name' => 'roles',
      'slug' =>'roles.view',
      'description' => 'el usuario supervisor puede ver la lista de roles',
    ]);

       $permissionTablero= permission::create([
        'name' => 'tablero',
      'slug' =>'tablero.view',
      'description' => 'el usuario supervisor,encargado y contador puede ver el tablero',
       ]);

      

       $permissionComprar= permission::create([
        'name' => 'comprar',
      'slug' =>'comprar.create',
      'description' => 'el usuario cliente puede comprar',
       ]);
 		
   //permisos admin
    $roladmin->permissions()->sync([ $permissionSide->id,$permissionListCat->id,$permissionRestPass->id, $permissionEdit->id, $permissionIndex->id,$permissionEdit->id,$permissionDestroy->id,$permissionShow->id,$permissionHistorial->id,$permissionRole->id,$permissionTablero->id]);
//permisos contador
    $rolcontador->permissions()->sync([ $permissionSide->id,$permissionTablero->id]);
    
   //permiso encargado 
    $rolaencargado->permissions()->sync([ $permissionEdit->id,$permissionIndex->id,$permissionShow->id,$permissionSide->id,$permissionComen->id,$permissionRev->id, $permissionRestPassCo->id,$permissionTablero->id]);
    //permisos cliente
    $roluser->permissions()->sync([ $permissionUserShow->id,$permissionUserEdit->id,$permissionSide->id,$permissionListProduct->id,$permissionPregunta->id, $permissionComprar->id]);
   


    
    }
}
