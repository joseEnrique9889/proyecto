@extends('layout.master')
@section('title', 'ADMINISTRADOR')
@section('content')
<div class="panel shadow">
  <div class="inside">
    <table class="table" >
  <thead> 
 <td colspan="13"><center><label>Productos Comprados</div></label></center></td>
    <tr >
      
      <th scope="col">Nombre</th>
      <th scope="col">precio</th>
      <th scope="col">categoria</th>
      <th scope="col">Descripcion</th>
      
     </tr>
   
 <tbody class="body1">
    @forelse($productos as $producto)

    <tr>
      
    <td scope="row">{{ $producto->nombre}}<img src="{{ asset('storage').'/'.$producto->imagen}}" alt="" width="100"></td>
    <td >{{ $producto->precio}}</td>
    <td >{{ $producto->categoria->nombre }}</td>
    <td scope="row">{{ $producto->descripcion}}</td>
  </tr>
  
  
   @empty
   <tr>
     <td colspan="10">Sin Productos en el comprado</td>
   </tr>
      @endforelse
  </tbody> 

@endsection