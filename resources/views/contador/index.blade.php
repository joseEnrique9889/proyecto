@extends('layout.master')
@section('title', 'Lista de Usuario y Su historial')
@section('content')
@section('breadcrumb')
<li class="breadcrumb-item">
  <a href="{{ url('/role/index') }}"><i class="fas fa-list-alt"></i>Lista de Pagos Pendientes</h2></a>
</li>
@endsection
<div class="panel shadow">
  <div class="inside">
      @include('coustom.message')
    <table class="table table-hover">
  <thead> 
 <td colspan="7"><center><label>Lista de Usurias</div></label></center></td>
    <tr>
     
      <th scope="col">Nombre</th>
      <th colspan="3"><CENTER>ACCION</CENTE></th>
    </tr>

  </thead>
  <tbody class="body1">
    @forelse($usuarios as $usuario)
    <tr>
    <td scope="row">{{ $usuario->name}} <img src="{{ asset('storage').'/'.$usuario->imagen}}" alt="" width="100"></td>
        <td>
          <a href="{{ url('/usuarios/'.$usuario->id.'/historial') }}" role="button" class="btn btn-warning" data-toggle="modal">Historial</a>
          
        </td>
    </tr>

     @empty
   <tr>
     <td colspan="5">Sin Usuarios Registrado</td>
   </tr>
      @endforelse
        
  </tbody>
  

</table>
{{ $usuarios->links() }}

  </div>
    
@endsection