@extends('layout.master')
@section('title', 'ROLES')
@section('content')
<div class="panel shadow">
  <div class="inside">
 <CENTER><h2>Hola {{ old('name', $user->name) }} aqui puedes Cambiar La Contraseña</h2></CENTER>

 <div class="card-body">
  @include('coustom.message')
   
 </div>
<form action="{{ url('/contraseña/'.$user->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')

    <div class="container">

      <label for="password" class="mtop16">Ingrese La Nueva Contraseña:</label>
  <div class="input-group mb-2">
    <div class="input-group-prepend">
      <div class="input-group-text"></div>
    </div>

  {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
  </div>
  <label for="cpassword" class="mtop16">Confirma La nueva Contraseña Contraseña:</label>
  <div class="input-group mb-2">
    <div class="input-group-prepend">
      <div class="input-group-text"></div>
    </div>

  {!! Form::password('cpassword', ['class' => 'form-control', 'required']) !!}
  </div>
    
<hr>
    
    <input class='btn btn-success' type="submit" value="Guardar" >

    </div>

</form>

    

</div>
</div>

    
@endsection