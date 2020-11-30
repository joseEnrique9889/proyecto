@extends('layout.master')
@section('title', 'Crear')
@section('content')

<div class="container-fluid">
  <div class="panel shadow">
  <div class="inside">
    <form action="{{ url('/producto') }}" method="POST" enctype="multipart/form-data">
      @csrf
    <center><h3>Añada un producto</h3></center>
   <div class="form-group">
    <label for="exampleFormControl">Nombre</label>
    <input type="text" name="nombre" class="form-control" id="nombre">
  </div>
 
  <div class="form-group">
    <label for="exampleFormControlInput1">descripcion</label>
    <textarea type="text" name="descripcion" class="form-control" id="descripcion"> </textarea> 
  </div>
  <div class="form-group">
      <label for="email">Categoria</label>
       <select class="form-control" name="categoria_id" id="categoria_id">
        @foreach($cat as $categoria)
         <option value="{{ $categoria->id }}"
          @isset($productos->categoria[0]->nombre)
            @if($categoria->nombre == $categoria->categoria[0]->nombre)
            selected 
            @endif
          @endisset
          >{{ $categoria->nombre }}</option>
         @endforeach
       </select>
 <div class="form-group">
      <label for="email">Usuario</label>
       <select class="form-control" name="user_id" id="user_id">
        @foreach($usuarios as $usuario)
         <option value="{{ $usuario->id }}"
          @isset($productos->usuario[0]->name)
            @if($usuario->name == $usuario->usuario[0]->name)
            selected 
            @endif
          @endisset
          >{{ $usuario->name }}</option>
         @endforeach
       </select>
        
       
  <div class="form-group">
    <label for="exampleFormControlInput1">imagen</label>
    <input type="file" name="imagen" class="form-control" id="imagen">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">cantidad</label>
    <input type="number" name="cantidad" class="form-control" id="cantidad">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">precio</label>
    <input type="number" name="precio" class="form-control" id="precio">
  </div>
<div class="form-group">
    <label for="exampleFormControlInput1">estado</label>
    <input type="text" name="estado" class="form-control" id="estado">
  </div>
  
 
  
  <center><input class="btn btn-success" type="submit" value="Enviar"></center> 
  
</form>
<a href="{{ url('/producto') }}"><button class="btn btn-danger">Regresar</button></a>
</div>
  

@endsection