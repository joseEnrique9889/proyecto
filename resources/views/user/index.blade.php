@extends('layout.master')
@section('title', 'ROLES')
@section('content')
<div class="panel shadow">
  <div class="inside">

     @include('coustom.message')
 
<table class="table table-hover">
   

  <thead>

    <td colspan="8"><center><label>LISTA DE Usuarios </div></label></center></td>
    <tr>
      <th scope="col">id</th>
      <th scope="col">nombre</th>
      <th scope="col">Correo</th>
      <th scope="col">Rol</th>
      <th scope="col">Foto</th>
      <CENTER><th colspan="3">ACCION</th></CENTER>
    
  </thead>
  <tbody class="body1">
    <tr>
       @foreach ($users as $user)
    
       </tr>
        <th scope="row">{{ $user->id }}</th>
        <td>{{ $user->name }} {{ $user->apellido }}</td>
        <td>{{ $user->email }}</td>
        <td>
          @isset( $user->roles[0]->name )
             {{ $user->roles[0]->name }}
        @endisset
       
        </td>
        <td> <img src="{{ asset('storage').'/'.$user->imagen}}" alt="" width="150"></td>

        <td>
           @can('view',[$user, ['user.show', 'userpropio.show']])
          <a class="btn btn-success" href="{{ route('user.show',$user->id)}}">Ver</a></td>
          @endcan
        <td>
         @can('view',[$user, ['user.edit', 'userpropio.edit', 'contraseña.rest']])
        
         @can('haveaccess','contraseña.rest')
          <a class="btn btn-warning" href="{{ route('user.edit',$user->id)}}">Editar</a>
          @endcan
          @if($user->id>=2)
          @can('haveaccess','restcon.rest')
         <a class="btn btn-warning" href="{{ route('user.edit',$user->id)}}">Editar</a>
         @endcan
         @endif
          @endcan
        
          
      
        <td>
           @can('haveaccess','user.destroy')
          <form action="{{ route('user.destroy',$user->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-large btn-danger" onclick="return confirm('desea Eliminar este elemento?'); ">Eliminar</button>
          </form>
         @endcan
         </tr>
      @endforeach
   
   
  </tbody>
</table>

    {{ $users->links() }}

</div>
</div>
  </div>

    
@endsection