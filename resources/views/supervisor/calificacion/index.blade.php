@extends('layout.master')
@section('title', 'ADMINISTRADOR')
@section('content')
@section('breadcrumb')
<li class="breadcrumb-item">
  <a href="{{ url('/calificacion/index') }}"><i class="fas fa-list-alt"></i>Lista de Calificacion</h2></a>
</li>
@endsection
<div class="panel shadow">
  <div class="inside">
      @include('coustom.message')
    <table class="table table-hover">
  <thead> 
 <td colspan="7"><center><label>Lista de Calificacion</div></label></center></td>
    <tr>
      <th scope="col">id</th>
      <th scope="col">usuario</th>
      <th scope="col">calificacion</th>
      <th scope="col">Recomienda la pagina</th>
      <th scope="col">sugerencia</th>
    </tr>

  </thead>
  <tbody class="body1">
    @forelse($calificaciones as $calificacion)
    <tr>
      <th scope="row">{{ $calificacion->id }}</th>
    <td scope="row">{{ $calificacion->propietario->name}}</td>
    <td scope="row">{{ $calificacion->experencia }}</td>
    <td scope="row">{{ $calificacion->recomendacion }}</td>
    <td scope="row">{{ $calificacion->sugerencia }}</td>
  

     @empty
   <tr>
     <td colspan="5">Sin Categoria  Registrado</td>
   </tr>
      @endforelse
        
  </tbody>
  

</table>
{{ $calificaciones->links() }}
</div>
  </div>
    
@endsection