<?php
use Illuminate\Support\Facades\Route;
use App\User;
use App\UserRol\Models\Role;
use App\UserRol\Models\Permission;
use Illuminate\Support\Facades\Gate;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');

    
});

//pruebas
Route::get('/test', function () {
   
    $user =User::find(2);
   // $user->roles()->sync([2]);
 Gate::authorize('haveaccess','role.show');
  return $user;

  // return $user->havePermission('role.create');
 
});

Route::get('autenticar', function() {
    return view('autenticar'); 
    //buscara el archivo 'autenticar.php' o 'autenticar.blade.php' dentro de resoureces/views
});
Route::get('tablero', function() {
    return view('supervisor.tablero'); 
    //buscara el archivo 'tablero.php' o 'tablero.blade.php' dentro de resoureces/views/supervisor
});
Route::get('revisar', function() {
    return view('encargado.revisar'); 
});
Route::get('cuenta', function() {
    return view('cliente.cuenta'); 
});
Route::post('validar'        , 'AutenticarControler@validar');
Route::get('listar_por_categoria/{categoria_id}','BuscarControler@listar_por');
//Route::get('create', function() {
 //   return view('categoria.create'); 
//});

// Routes Auth
Route::get('/login', 'ConnectController@getLogin')->name('login');
Route::post('/login', 'ConnectController@postLogin')->name('login');
Route::get('/register', 'ConnectController@getRegister')->name('register');
Route::post('/register', 'ConnectController@postRegister')->name('register');
Route::get('/logout', 'ConnectController@getLogout')->name('logout');


//rutas crud Categorias
//Route::get('categoria','CategoriasControler@index');
//Route::post('categoria','CategoriasControler@store');
//Route::get('categoria/create','CategoriasControler@create');
Route::get('categoria/{categoria}/show','CategoriasControler@show');
//Route::put('categoria/{categoria}','CategoriasControler@update');
//Route::delete('categoria/{categoria}','CategoriasControler@destroy');
//Route::get('categoria/{categoria}/edit','CategoriasControler@edit');
Route::resource('categoria','CategoriasControler');

//rutas productos
Route::resource('producto','ProductoController');
Route::get('producto/{producto}/show','ProductoController@show');


//RUTAS CRUD ROLES 
Route::resource('/role', 'RoleController')->names('role');

Route::resource('/user', 'UserController', ['except'=>['create', 'store']])->names('user');

