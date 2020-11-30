@extends('layout.master')
@section('title', 'Mostrar')
@section('content')
<div class="container-fluid">
  <div class="panel shadow">
  
     <form action="{{ url('/producto/'.$producto->id) }}" method="POST" enctype="multipart/form-data">

      @csrf
      @method('PUT')
    <center><h3>Ver Producto</h3></center>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" name="nombre" class="form-control" id="nombre" value="{{ $producto->nombre }}" disabled>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">descripcion</label>
    <input type="text" name="descripcion" class="form-control" id="descripcion" value="{{ $producto->descripcion }}" disabled>
  </div>
   <div class="form-group">
    <label for="exampleFormControlInput1">Categoria</label>
    <input type="text" name="categoria_id" class="form-control" id="categoria_id" value="{{ $producto->categoria_id }}" disabled>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Imagen</label>
    <br />
    <img src="{{ asset('storage').'/'.$producto->imagen}}" alt="" width="300">
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


 <CENTER><a href="{{ url('/producto/'.$producto->id.'/edit') }}" role="button" class="btn btn-success" data-toggle="modal">Editar</a></CENTER>
</form>

      <a href="{{ url('/producto') }}"><button class="btn btn-danger">Regresar</button></a>    
       
</div>
   
@endsection