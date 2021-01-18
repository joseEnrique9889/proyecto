@extends('layout.master')
@section('title', 'ADMINISTRADOR')
@section('content')
<div class="panel shadow">
  <div class="inside">
    @include('coustom.message')

    <div class="boton ">

<a href="{{ url('/lista') }}" role="button" class="btn btn-large btn-success"   style="margin-left: 90%; width: 10%"  >Proponer</a></

</div>
    <table class="table">
  <thead> 
 <td colspan="13"><center><label>Lista de Productos</div></label></center></td>
    <tr >
      <th scope="col">id</th>
      <th scope="col">Nombre</th>
      <th scope="col">SubCategoria</th>
      <th scope="col">Descripcion</th>
      <th scope="col">imagen</th>
      <th scope="col">cantidad</th>
      <th scope="col">precio</th>
      <th scope="col">Comprado</th>
      <th scope="col">estado</th>
      <th colspan="3"><CENTER>ACCION</CENTE></th>
    </tr>

  </thead>
  <tbody class="body2">
    @forelse($productos as $producto)

    <tr @if ($producto->concesionado==2)
     class="p-3 mb-2 bg-info text-white"
     
      @endif
      
       @if ($producto->concesionado==1)
    class="p-3 mb-2 bg-danger text-white"
     @endif
     @if ($producto->concesionado==3)
    class="p-3 mb-2 bg-success text-white"
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
    <th>{{ $producto->comprado }}</th>
    <th >{{ $producto->estado}}</th>

 @if($producto->concesionado<=1)
     <th>
    
      <a href="{{ url('/producto/'.$producto->id.'/edit') }}" role="button" class="btn btn-success">Editar</a>
   
    </th>
       @endif
@if($producto->concesionado>=2)
       <th>
    
      <a href="{{ url('/producto/'.$producto->id.'/edit') }}" role="button" class="btn btn-success">Cambiar imagen</a>
   
    </th>
    @endif
        <th >
         
          <a href="{{ url('/producto/'.$producto->id.'/show') }}" role="button" class="btn btn-warning" >Mostrar</a>
        
        </th>
        @if($producto->concesionado<=1)
         <th>
         
           <form method="post" action="{{ url('/producto/'.$producto->id) }}">
            {{csrf_field() }}
             {{ method_field('DELETE') }}
             <button type="submit" class="btn btn-large btn-danger" onclick="return confirm('desea Eliminar este elemento?'); ">Eliminar</button>
           </form>
           
         </th>
         @endif
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
    
      <th class="p-3 mb-2 bg-info text-white">Producto que fue aceptado</th>
  </tr>
  <tr>
    
      <th class="p-3 mb-2 bg-success text-white">Producto que fue Recibido Fisicamente</th>
  </tr>
  
</table>

</div>
  </div>

    
@endsection