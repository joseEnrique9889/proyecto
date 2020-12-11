@extends('layout.master')
@section('title', 'Moderacion')
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
    
    
      <tr>
     <th scope="row">{{ $comentario->producto->nombre }}<img src="{{ asset('storage').'/'.$comentario->producto->imagen}}" alt="" width="109"></th>

     <th scope="row">{{ $comentario->contenido }}</th>
     <th scope="row"><a href="{{ url('/comentario/'.$comentario->id.'/edit') }}" role="button" class="btn btn-warning" data-toggle="modal">moderar</a>
</th>
      <th><form method="post" action="{{ url('/comentario/'.$comentario->id) }}">
            {{csrf_field() }}
             {{ method_field('DELETE') }}
             &nbsp<button type="submit" class="btn btn-large btn-danger" onclick="return confirm('desea Eliminar este elemento?'); ">Eliminar</button>
           </form></th>
</tr>


     @empty


   <tr>
     <th colspan="10">Sin Preguntas Registrado</th>
   </tr>
      @endforelse
  </tbody>
    

  @endsection
