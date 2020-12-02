@extends('layout.master')
@section('title', 'ADMINISTRADOR')
@section('content')
<div class="panel shadow">
  <div class="inside">
    @include('coustom.message')
    <table class="table">
  <thead> 
 <td colspan="13"><center><label>Lista de Productos</div></label></center></td>
    <tr >
      <th scope="col">id</th>
      <th scope="col">Nombre</th>
      <th scope="col">categoria</th>
      <th scope="col">Descripcion</th>
      <th scope="col">imagen</th>
      <th scope="col">cantidad</th>
      <th scope="col">precio</th>
      <th scope="col">estado</th>
      <th colspan="3"><CENTER>ACCION</CENTE></th>
    </tr>

  </thead>
  <tbody class="body2">
    @forelse($productos as $producto)

    <tr @if ($producto->concesionado==2)
     class="p-3 mb-2 bg-success text-white"
     
      @endif
       @if ($producto->concesionado==1)
    class="p-3 mb-2 bg-danger text-white"
     @endif
     class="p-3 mb-2 bg-warning text-dark"
      >

      <th scope="row">{{ $producto->id }}</th>
    <th scope="row">{{ $producto->nombre}}</th>
    <th >{{ $producto->categoria->nombre }}</th>
    <th scope="row">{{ $producto->descripcion}}</th>
    <th >
      <img src="{{ asset('storage').'/'.$producto->imagen}}" alt="" width="200">
    </th>
    <th >{{ $producto->cantidad}}</th>
    <th >{{ $producto->precio}}</th>
    <th >{{ $producto->estado}}</th>
     <th>
     
      <a href="{{ url('/producto/'.$producto->id.'/edit') }}" role="button" class="btn btn-success" data-toggle="modal">Editar</a>
    
    </th>

        <th>
         
          <a href="{{ url('/producto/'.$producto->id.'/show') }}" role="button" class="btn btn-warning" data-toggle="modal">Mostrar</a>
        
        </th>
         <th>
         
           <form method="post" action="{{ url('/producto/'.$producto->id) }}">
            {{csrf_field() }}
             {{ method_field('DELETE') }}
             <button type="submit" class="btn btn-large btn-danger" onclick="return confirm('desea Eliminar este elemento?'); ">Eliminar</button>
           </form>
           
         </th>
    </tr>

    @empty
   <tr>
     <th colspan="10">Sin Productos Registrado</th>
   </tr>
      @endforelse
  </tbody>
  

</table>
<table >
 <td scope="col"><center><label>NOMENCLATURA</label></center></td>
  <tr>
      <th class="p-3 mb-2 bg-warning text-dark">Producto Nuevo que fue propuesto pero no ha sido revisado</th>
  </tr>
  <tr>
    
      <th class="p-3 mb-2 bg-danger text-white">Producto que fue rechazado Pero Tiene Observaciones</th>
  </tr>
  <tr>
    
      <th class="p-3 mb-2 bg-success text-white">Producto que fue aceptado</th>
  </tr>
</table>
<div class="boton">

<center><a href="{{ url('/producto/create') }}" role="button" class="btn btn-large btn-info" data-toggle="modal">crear</a></center>

</div>
</div>
  </div>

    
@endsection