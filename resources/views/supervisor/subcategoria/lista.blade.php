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
      <center><h3>Por favor Seleccione Una Categoria </h3></center>
      <hr>
    <table class="table table-hover">
  <thead> 
 <td colspan="9"><center><label>Lista de Categorias</div></label></center></td>

    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">imagen</th>
      <th scope="col"><CENTER>Accion</CENTE></th>
    </tr>

  </thead>
  <tbody class="body1">
    @forelse($categorias as $categoria)
    @if($categoria->subcategoria=='no') 
    <tr>
      <th scope="row">{{ $categoria->id }}</th>
    <td scope="row">{{ $categoria->nombre}}</td>
    <td >{{ $categoria->descripcion}}</td>
    <td >
      <img src="{{ asset('storage').'/'.$categoria->imagen}}" alt="" width="300">
    </td>
    
           
         </td>
          <td>
         
          <a href="{{ url('/categoria/'.$categoria->id.'/agregar') }}" role="button" class="btn btn-success">Agregar Producto</a>

        </td>
@endif
    </tr>

     @empty
   <tr>
     <td colspan="5"><center>Sin Categoria  Registrado</center></td>
   </tr>
      @endforelse
        
  </tbody>
  

</table>
{{ $categorias->links() }}
<div class="boton">
  

  </div>
    
@endsection