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
 		  'full-access' => 'yes',
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
 		$permission = Permission::create([
    	'name' => 'lista de user',
		  'slug' => 'user.index',
   		'description' => 'lista de user',
   		]);
   		$permission_all[] = $permission->id;
 		$permission = Permission::create([
    	'name' => 'show user',
		  'slug' => 'user.show',
   		'description' => 'un usuario puede ver un rol',
   		]);
 		$permission_all[] = $permission->id;
 	 	$permission = Permission::create([
    	'name' => 'Edit user',
		'slug' => 'user.edit',
   		'description' => 'Editar  roles',
   		]);
		$permission_all[] = $permission->id;
 		$permission = Permission::create([
    	'name' => 'Destroy user',
		'slug' => 'user.destroy',
   		'description' => 'creacion del rol',
   		]);
 		$permission_all[] = $permission->id;

 		//tabla de permisos de roles
 		//$roladmin->permissions()->sync( $permission_all );

//nuevos permiso
    $permission = Permission::create([
      'name' => 'ver mi propio usuario',
      'slug' => 'userpropio.show',
      'description' => 'un usuario puede ver su propio registro',
      ]);
    $permission_all[] = $permission->id;
    $permission = Permission::create([
      'name' => 'Edit mi propio user',
    'slug' => 'userpropio.edit',
      'description' => 'Editar propio user',
      ]);


    //permisos de categoria
    $permission = Permission::create([
      'name' => 'lista de categoria',
      'slug' => 'categoria.index',
      'description' => 'lista de categoria',
      ]);
      $permission_all[] = $permission->id;
    $permission = Permission::create([
      'name' => 'ver categoria',
      'slug' => 'categoria.show',
      'description' => 'un usuario puede ver la lista de categoria',
      ]);
    $permission_all[] = $permission->id;
    $permission = Permission::create([
      'name' => 'crear categoria',
      'slug' => 'categoria.create',
      'description' => 'un usuario puede ver la lista de categoria',
      ]);
    $permission_all[] = $permission->id;
    $permission = Permission::create([
      'name' => 'Editar categoria',
      'slug' => 'categoria.edit',
      'description' => 'Editar  categoria',
      ]);
    $permission_all[] = $permission->id;
    $permission = Permission::create([
      'name' => 'Destroy categoria',
      'slug' => 'categoria.destroy',
      'description' => 'eliminacion de categoria',
      ]);
    $permission_all[] = $permission->id;


     //permisos de Productos
    $permission = Permission::create([
      'name' => 'lista de Productos',
      'slug' => 'producto.index',
      'description' => 'lista de producto',
      ]);
      $permission_all[] = $permission->id;
    $permission = Permission::create([
      'name' => 'ver producto',
      'slug' => 'producto.show',
      'description' => 'un usuario puede ver un producto en especifico',
      ]);
    $permission_all[] = $permission->id;
    $permission = Permission::create([
      'name' => 'crear producto',
      'slug' => 'producto.create',
      'description' => 'un usuario puede crear un producto',
      ]);
    $permission_all[] = $permission->id;
    $permission = Permission::create([
      'name' => 'Editar Productos',
      'slug' => 'producto.edit',
      'description' => 'Editar producto',
      ]);
    $permission_all[] = $permission->id;
    $permission = Permission::create([
      'name' => 'Destroy producto',
      'slug' => 'producto.destroy',
      'description' => 'eliminacion de producto',
      ]);
    $permission_all[] = $permission->id;

    }
}
