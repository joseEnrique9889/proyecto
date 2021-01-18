@extends('layout.master')
@section('title', 'ADMINISTRADOR')
@section('content')
<div class="panel shadow">
  <div class="inside">
    <table class="table">
  <thead> 
 <td colspan="13"><center><label>Lista de Productos</div></label></center></td>
    <tr >
      
      <th scope="col">Nombre</th>
      <th scope="col">precio</th>
      <th scope="col">categoria</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Revisar</th>
     </tr>
 <tbody class="body1">
    @forelse($productos as $producto)

    <tr>
      
    <td scope="row">{{ $producto->nombre}}<img src="{{ asset('storage').'/'.$producto->imagen}}" alt="" width="100"></td>
    <td >{{ $producto->precio}}</td>
    <td >{{ $producto->categoria->nombre }}</td>
    <td scope="row">{{ $producto->descripcion}}</td>
    <td scope="row"><a href="{{ url('/Revisiones/'.$producto->id.'/show') }}" role="button" class="btn btn-warning">Revisar</a></td> 
  </tr>
   @empty
   <tr>
     <td colspan="10">Sin Productos Para Revision</td>
   </tr>
      @endforelse
  </tbody> 

@endsection