@extends('layout.master')
@section('title', 'Revisar')
@section('content')
<div class="container-fluid">
  <div class="panel shadow">
  
     <form action="{{ url('/Revisiones/'.$producto->id) }}" method="POST" enctype="multipart/form-data">

      {{ csrf_field() }}
      @method('PUT')
    <center><h3>EDITAR Producto</h3></center>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" name="nombre" class="form-control" id="nombre" value="{{ $producto->nombre }} " disabled>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput">descripcion</label>
    <input type="text" name="descripcion" class="form-control" id="descripcion" value="{{ $producto->descripcion }}" disabled>
    
  </div>
   <div class="form-group">
    <label for="exampleFormControlInput1">Categoria</label>
    <input type="text" name="categoria_id" class="form-control" id="categoria_id" value="{{ $producto->categoria_id }}" disabled>
  </div>
  
   
  <div class="form-group">
    <label for="exampleFormControlInput1">Imagen</label>
    <br />
    <img src="{{ asset('storage').'/'.$producto->imagen}}" alt="" width="300" >
    <br />
    <input type="file" name="imagen" class="form-control" id="imagen" disabled>
    <br />
    
  </div>

   <div class="form-group">
    <label for="exampleFormControlInput1">Cantidad</label>
    <input type="text" name="cantidad" class="form-control" id="cantidad" value="{{ $producto->cantidad }}" disabled>
  </div>

   <div class="form-group">
    <label for="exampleFormControlInput1">Precio</label>
    <input type="text" name="precio" class="form-control" id="precio" value="{{ $producto->precio }}" disabled>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Estado</label>
    <input type="text" name="estado" class="form-control" id="cantidad" value="{{ $producto->estado }}" disabled>
  </div>
  

   <div class="alert alert-info" role="alert">
    Motivo si se rechazo:<textarea name="motivo" id="motivo" class="form-control" rows="2" value="{{ $producto->motivo }}"></textarea>
  </div>
  
  <center><button type="submit" class="btn-danger">Rechazada</button></center>
</form>
<form action="/Revisiones/{{ $producto->id  }}" method="post">
 @csrf
  @method('PUT')
  <center><button type="submit" class="btn-success">Aceptar</button></center>
</form>
</div>
   
@endsection