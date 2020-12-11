@extends('layout.master')
@section('title', 'Datos')
@section('content')
<div class="panel shadow">
  <div class="inside">
 <CENTER><h2>Hola {{ Auth::user()->name }} estos son los Datos de {{ old('name', $user->name) }} </h3></h2></CENTER>

 <div class="card-body">
  @include('coustom.message')
   

 </div>
<form action="{{ route('user.update', $user->id) }}" method="POST">
  @csrf
  @method('PUT')

    <div class="container">
 
      <div class="form-group">
      <label for="name">Nombre</label>
       <input type="text" class="form-control" id="name" placeholder="nombre del rol"
       name="name" 
       value="{{ old('name', $user->name) }}"
       disabled>
  </div>

  <div class="form-group">
      <label for="name">Apellidos</label>
       <input type="text" class="form-control" id="name" placeholder="nombre del rol"
       name="name" 
       value="{{ old('name', $user->apellido) }}"
       disabled>
  </div>

   <div class="form-group">
      <label for="email">Email</label>
       <input type="email" class="form-control" id="slug" placeholder="email"
       name="email"
       value="{{ old('email',$user->email) }}"
       disabled>
  </div>

  </div>
   <div class="form-group">
    <label for="exampleFormControlInput1">Imagen</label>
    <br />
   <center> <img src="{{ asset('storage').'/'.$user->imagen}}" alt="" width="200"></center>
    
  </div>

    <div class="form-group">
      <label for="email">ROL</label>
       <select disabled class="form-control" name="roles" id="roles">
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
    <center>
    <a class='btn btn-success' href="{{ route('user.edit',$user->id) }}">Editar</a>

    <a class='btn btn-danger' href="{{ route('user.index') }}">Regresar</a>
    </center>
    </div>

</form>

    

</div>
</div>

    
@endsection