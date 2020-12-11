@extends('layout.master')
@section('title', 'Mostrar')
@section('content')
<div class="container-fluid">
  <div class="panel shadow">
  
     <form action="{{ url('/comprar/'.$producto->id) }}" method="POST" enctype="multipart/form-data">

      {{ csrf_field() }}
      @method('PUT')
    <center><h3>Detalle de {{ $producto->nombre }}</h3></center>
    <h5><label>Publicacion:</label>{{ $producto->updated_at}} </h5>
 <br>
<center><img src="{{ asset('storage').'/'.$producto->imagen}}" alt="" width="400"></center>
<br>
<h3><label>Descripcion del Producto: </label></h3>

<h4>{{ $producto->descripcion }}</h4>

<hr>
<h4><label>Vendendor:</label> {{ $producto->propietario->name }}</h4>
  
  <h4><label>stock disponible:</label>   {{ $producto->cantidad }}</h4>
  <h4><label>vendidos:</label> {{ $producto->comprado }}</h4>
  <h4><label>categoria:</label> {{ $producto->categoria->nombre }}</h4>
  <h4><label>El Producto es:</label> {{ $producto->estado }}</h5>
  <h4><label>El costo es: </label>${{ $producto->precio }} mx</h4> 
  </form>

<hr>
  <h3><label>Comentarios: </label></h3>
  
  
 
@forelse($comentarios as $comentario)
{{" "}}
  @if (!is_null($comentario->p_autorizada))
  <div class="alert alert-info" role="alert">
    {{ $comentario->propietario->name }} pregunto <small>{{$comentario->hora_p }}</small>: {{ $comentario->contenido }}

    @if(!is_null($comentario->r_autorizada))
      <div class="alert alert-warning" role="alert">
        {{ $comentario->respuesta }}
      </div>
      @endif
  </div>
@endif
@empty
  No hay Comentarios a un
@endforelse

<div>
  @can('haveaccess','comprar.create')
<center><a href="{{ url('/comprar/'.$producto->id.'/comprar') }}"  class="btn btn-success">comprar</a></center>
@endcan
@can('haveaccess','pregunta.create')
<a href="/comentario/{{ $producto->id }}" class="btn btn-info">Preguntar</a>
@endcan
</div>


   
@endsection
   
