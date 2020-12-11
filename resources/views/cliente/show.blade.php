@extends('layout.master')
@section('title', 'Mostrar')
@section('content')
<div class="container-fluid">
  <div class="panel shadow">
  
     <form action="{{ url('/comprar/'.$producto->id) }}" method="POST" enctype="multipart/form-data">

      {{ csrf_field() }}
      @method('PUT')
    <center><h3>DETALLES DE TU COMPRA</h3></center>

   <center><h3>{{ $producto->nombre }}</h3></center> 
 <br>
<center><img src="{{ asset('storage').'/'.$producto->imagen}}" alt="" width="600"></center>
<br>
<h4>Descripcion del Producto: {{ $producto->descripcion }}</h4>
  <br>
  <h4>categoria: {{ $producto->categoria->nombre }}</h4>
  <br>
  <h4>Vendendor: {{ $producto->propietario->name }}</h4>
  <br>
  <h4>El Producto es: {{ $producto->estado }}</h4>
  <br>
  <h4>El costo es: {{ $producto->precio }}</h4> 

  
  
<form action="/comprar/{{ $producto->id }}" method="post">
 @csrf
  @method('PUT')

@can('haveaccess','comprar.create')
  <center><button type="submit" class="btn btn-success">Confirmar compra</button>
    @endcan
</form>
   
@endsection