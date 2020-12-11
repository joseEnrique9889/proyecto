<?php

namespace App\Http\Controllers;
use App\UserRol\Models\Role;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
      $this->authorize('haveaccess','user.index');

         $users = User::with('roles')->orderBy('id','Asc')->paginate(3);

          
           // return $users;
        return view('user.index',compact('users'));
           
      
           
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$this->authorize('create', User::class);
       // return 'Create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //return $role;

        $this->authorize('view', [$user, ['user.show','userpropio.show'] ]);

        $roles= Role::orderBy('name')->get();

        //return $roles;

        return view('user.view', compact('roles', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    { 
       $this->authorize('update', [$user, ['user.edit','userpropio.edit'] ]);
        $roles= Role::orderBy('name')->get();
        return view('user.edit', compact('roles', 'user'));
    }
    public function update(Request $request,User $user)
    {
        $request->validate([
        'name' => 'required|max:50|unique:users,name,'.$user->id,
        'email' => 'required|max:50|unique:users,email,'.$user->id,
        
       ]);

        $datosUsuario=request()->except(['_token','_method']);
        if ($request->hasFile('imagen')) {

            Storage::delete('public/'.$user->imagen);
            $user['imagen']=$request->file('imagen')->store('uploads/usuario','public');
        }
        //si la contraseña esta en blanco no lo modificamos
        if(is_null($datosUsuario['password']))
            unset($datosUsuario['password']);
        else

           $datosUsuario['password']=Hash::make( $datosUsuario['password'] );

         $user->update($datosUsuario);

         $user->roles()->sync($request->get('roles'));  
    
    return redirect()->route('user.index')->with('status_success','Usuario Actualizado Correctamente');

    }

    public function editPassword(User $user){

        $roles= Role::orderBy('name')->get();

        //return $roles;
       // $user= User::findOrFail($user);
        return view('user.contraseña', compact('roles', 'user'));
    }

    public function updatePass(Request $request,User $user){


        $datosUsuario=request()->except(['_token','_method']);
if ($request->hasFile('imagen')) {

           // $user= User::findOrFail($user);

            Storage::delete('public/'.$user->imagen);
            $user['imagen']=$request->file('imagen')->store('uploads/usuario','public');
        }

         if(is_null($datosUsuario['password']))
            unset($datosUsuario['password']);
        else

           $datosUsuario['password']=Hash::make( $datosUsuario['password'] );

         $user->update($datosUsuario);


         $user->roles()->sync($request->get('roles')); 
       //} 
    
    return redirect()->route('user.index')->with('status_success','contraseña Actualizada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(User $user)
    {

        $this->authorize('haveaccess','user.destroy');
        if(Storage::delete('public/'.$user->imagen)){

          User::destroy($user);  
       }
        $user->delete();
        
        return redirect()->route('user.index')->with('status_success','Usuario Eliminado Correctamente');
    }
}
