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
    <table class="table table-hover">
  <thead> 
 <td colspan="7"><center><label>Listas de Productos</div></label></center></td>
    <tr>
      
      <th scope="col">Nombre</th>
      <th scope="col">Publicado</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Propietario</th>
      <th scope="col">imagen</th>
      <th colspan="3"><CENTER>ACCION</CENTE></th>
    </tr>

  </thead>
  <tbody class="body1">
    @forelse($productos as $producto)
    <tr>
      
    <td scope="row">{{ $producto->nombre}}</td>
    <td scope="row">{{ $producto->updated_at}}</td>
    <td >{{ $producto->descripcion}}</td>
    <td>{{ $producto->propietario->name }}</td>
    <td >
      <img src="{{ asset('storage').'/'.$producto->imagen}}" alt="" width="300">
    </td> 

        <td>
         
        <a href="{{ url('/kardex/'.$producto->id.'/producto') }}" class="btn btn-primary">Kardex</a>
          
        </td>

     @empty
   <tr>
     <td colspan="5">Sin Productos Registrados</td>
   </tr>
      @endforelse
        
  </tbody>

</table>
{{ $productos->links() }}

  </div>
    
@endsection