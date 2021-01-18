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
 <td colspan="9"><center><label>AGREGAR CATEGORIAS</div></label></center></td>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">imagen</th>
      <th colspan="5"><CENTER>ACCION</CENTE></th>
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
     <td>
      
      <a href="{{ url('/categoria/'.$categoria->id.'/edit') }}" role="button" class="btn btn-success">Editar</a>
      
    </td>

        <td>
         
          <a href="{{ url('/categoria/'.$categoria->id.'/show') }}" role="button" class="btn btn-warning">Mostrar</a>
          
        </td>


         <td>
         
           <form method="post" action="{{ url('/categoria/'.$categoria->id) }}">
            {{csrf_field() }}
             {{ method_field('DELETE') }}
             <button type="submit" class="btn btn-large btn-danger" onclick="return confirm('desea Eliminar este elemento?'); ">Eliminar</button>
           </form>
           
         </td>
          <td>
          <a href="{{ url('/subcrear/'.$categoria->id.'/create') }}" role="button" class="btn btn-warning">Agregar Subcategoria</a>

        </td>

         <td>

      
      <a href="{{ url('/subcategoria/'.$categoria->id.'/subcategoria') }}" role="button" class="btn btn-success">Ver Subcategoria</a>
      
    </td>
    @endif
    </tr>

     @empty
   <tr>
     <td colspan="5">Sin Categoria  Registrado</td>
   </tr>
      @endforelse
        
  </tbody>
  

</table>
{{ $categorias->links() }}
<div class="boton">
  
<center><a href="{{ url('/categoria/create') }}" role="button" class="btn btn-large btn-info">crear</a></center>

</div>
</div>
  </div>
    
@endsection