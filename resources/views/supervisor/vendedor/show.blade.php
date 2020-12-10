@extends('layout.master')
@section('title', 'ADMINISTRADOR')
@section('content')
@section('breadcrumb')
<li class="breadcrumb-item">
  <a href="{{ url('/role/index') }}"><i class="fas fa-list-alt"></i>Lista de Categoria</h2></a>
</li>
@endsection
<div class="panel shadow">
  <div class="inside">
      @include('coustom.message')

<center><h3>Nombre: {{ $usuarios->name }}</h3></center>
<center><img src="{{ asset('storage').'/'.$usuarios->imagen}}" alt="" width="300"></center>

<h4>Esta dado de alta desde: {{ $usuarios->created_at }}</h4>

<h4>Los Productos Publicados son: </h4>


<table class="table table-hover">
  <thead> 
 <td colspan="5"><center><label>Sus Productos son</div></label></center></td>
    <tr>
        <th scope="col">id</th>
      <th scope="col">Nombre</th>
      <th scope="col">cantidad</th>
      <th scope="col">Vendidos</th>
      <th scope="col"><CENTER>fecha de publicacion</CENTE></th>
    </tr>
<tbody class="body1">
@foreach($usuarios->producto as $producto)


 <tr>
  <td>{{ $producto->id }}</td>
    <td scope="row">{{ $producto->nombre}} <img src="{{ asset('storage').'/'.$producto->imagen}}" alt="" width="100"></td>
    <td>{{ $producto->cantidad }}</td>
    <td >{{ $producto->comprado }}</td>
    <td scope="row">{{ $producto->updated_at }}</td>


</tr>

@endforeach

@endsection