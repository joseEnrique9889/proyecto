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
//prueba
Route::get('/','HomeController@getCat');
Route::get('listar_por_categoria/{nombre}', 'HomeController@getsearch');
Route::get('/listaProdu','HomeController@getProd');

Route::get('Productos','HomeController@kardex');



Route::get('comentario/{producto}','ComentarioController@create');

Route::get('comentario','ComentarioController@index');
Route::get('pregunta','ComentarioController@preguntas');
Route::post('comentario','ComentarioController@store');
Route::get('comentario/{comentario}/show','ComentarioController@show');
Route::get('comentario/{comentario}/edit','ComentarioController@edit');
Route::put('comentario/{comentario}','ComentarioController@update');
Route::delete('comentario/{comentario}','ComentarioController@destroy');

Route::get('calificacion/create','CalificacionController@create');
Route::post('calificacion','CalificacionController@store');
Route::get('calificacion','CalificacionController@index');

Route::get('comprar/{comprar}/comprar','HomeController@comprar');
Route::get('kardex/{kardex}/producto','HomeController@detalle');
Route::put('comprar/{comprar}','HomeController@update');


Route::get('comprado','HomeController@index');

Route::resource('Revisiones', 'RevisarControler', ['only' => ['index', 'update']]);
Route::get('Revisiones/{Revisiones}/show','RevisarControler@show');
//pruebas
Route::get('/test', function () {
   
    $user =User::find(2);
   // $user->roles()->sync([2]);
 Gate::authorize('haveaccess','role.show');
  return $user;

  // return $user->havePermission('role.create');
 
});

//Route::get('autenticar', function() {
   // return view('autenticar'); 
    //buscara el archivo 'autenticar.php' o 'autenticar.blade.php' dentro de resoureces/views
//});
 
    Route::get('tablero','InicioController@tablero');
    //buscara el archivo 'tablero.php' o 'tablero.blade.php' dentro de resoureces/views/supervisor

Route::get('revisar', function() {
    return view('encargado.revisar'); 
});
Route::get('cuenta', function() {
    return view('cliente.cuenta'); 
});
//Route::post('validar'        , 'AutenticarControler@validar');
//Route::get('listar_por_categoria/{categoria_id}','BuscarControler@listar_por');
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

Route::get('user/{user}/contraseña','UserController@editPassword');

Route::put('contraseña/{user}', 'UserController@updatePass');

Route::get('usuarios','HomeController@registrado');

Route::get('usuarios/{usuarios}/historial','HomeController@historial');

Route::get('contador','HomeController@contador');
//ajax correo
Route::post('/register/check', 'EmailAvailable@check')->name('register.check');


//subcategorias

//Route::get('subcategoria','ReservarController@MaterialReservado');
Route::get('subcategoria/{subcategoria}/subcategoria','SubCategoriaController@subcategoria');
Route::get('subcat/{subcat}/subcat','SubCategoriaController@subcate');

Route::get('subcrear/{subcrear}/create','SubCategoriaController@create');


Route::post('subcrear','SubCategoriaController@store');
Route::get('lista','SubCategoriaController@lista');
Route::get('categoria/{producto}/agregar','ProductoController@agregar');

//routas concesionar un producto ajax

Route::get('aceptados','AjaxConcesionadoController@index');
Route::put('_Concesionar/{id}', 'AjaxConcesionadoController@Concesionado');
