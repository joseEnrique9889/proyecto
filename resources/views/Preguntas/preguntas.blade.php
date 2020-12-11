@extends('layout.master')
@section('title', 'Preguntas Realizadas')
@section('content')
<div class="panel shadow">
  <div class="inside">
    @include('coustom.message')
    <table class="table">
  <thead> 
 <td colspan="13"><center><label>Comentarios</div></label></center></td>
    <tr >
      <th scope="col">Producto</th>
      <th scope="col">Comentario</th>
      <th colspan="3"><CENTER>ACCION</CENTE></th>
    </tr>

     <tbody class="body1">
    @forelse($comentarios as $comentario)
    @if(!is_null($comentario->p_autorizada))
    

     <th scope="row">{{ $comentario->producto->nombre }}<img src="{{ asset('storage').'/'.$comentario->producto->imagen}}" alt="" width="109"></th>

     <th scope="row">{{ $comentario->contenido }}</th>
     <td scope="row"><a href="{{ url('/comentario/'.$comentario->id.'/show') }}" role="button" class="btn btn-success" data-toggle="modal">Responder</a></td> 

     @endif
     @empty

   <tr>
     <th colspan="10">Sin Preguntas Registrada</th>
   </tr>
      @endforelse
  </tbody>
    

  @endsection
