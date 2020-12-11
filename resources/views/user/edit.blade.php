@extends('layout.master')
@section('title', 'ROLES')
@section('content')
<div class="panel shadow">
  <div class="inside">
 <CENTER><h2>Hola {{ old('name', $user->name) }} aqui puedes editar tu usuario</h2></CENTER>

 <div class="card-body">
  @include('coustom.message')
   
 </div>
<form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')

    <div class="container">

      <h3>Datos Requeridos</h3>
      <div class="form-group">
      <label for="name">Nombre</label>
       <input type="text" class="form-control" id="name" placeholder="nombre del rol"
       name="name" 
       value="{{ old('name', $user->name) }}"
       >
  </div>

   <div class="form-group">
      <label for="email">Email</label>
       <input type="email" class="form-control" id="slug" placeholder="email"
       name="email"
       value="{{ old('email',$user->email) }}"
       >
  </div>

   <div class="form-group">
    <label for="exampleFormControlInput1">Imagen</label>
    <br />
    <img src="{{ asset('storage').'/'.$user->imagen}}" alt="" width="100">
    <br />
    <input type="file" name="imagen" class="form-control" id="imagen">
    <br />
  </div>

    <div class="form-group">
      <label for="email">Rol</label>
       <select class="form-control" name="roles" id="roles">
        @foreach($roles as $role)
         <option value="{{ $role->id }}"
          @isset($user->roles[0]->name)
            @if($role->name == $user->roles[0]->name)
            selected 
            @endif
          @endisset


          >{{ $role->name }}</option>
         @endforeach
       </select>
       
  </div>

  <hr>

  <center><label>Desea cambiar la contraseña:<em>(Si no lo desea simplemente ignora)</em> </label></center>
  <div class="form-group">
      <label for="password" class="mtop16">Ingrese La Nueva Contraseña: </label>
       <input type="password" class="form-control" id="slug" placeholder="Ingrese La Nueva Contraseña"
       name="password"
       >
  </div>
  
    
<hr>
    
    <input class='btn btn-success' type="submit" value="Guardar" >

    </div>

</form>

    

</div>
</div>

    
@endsection