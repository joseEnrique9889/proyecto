@extends('layout.master')
@section('title', 'Mercado Ixhuatan')
@section('content')
<center><h1>Bienvenido A Mercado Libre Ixhuatan</h1></center>

<div class="panel shadow">
    
    <div class="container card text-center">
        <div class="card-header">
            <ul class="nav nav-pills card-header-pills">
                @forelse($categorias as $categoria)

                <div class="card mtop16" style="width: 35rem;">
                  <img class="card-img-top" src="{{ asset('storage').'/'.$categoria->imagen}}" alt="Card image cap" width="700">
                 <div class="card-body">
                <h5 class="card-title">{{ $categoria->nombre }}</h5>
    <p class="card-text">{{ $categoria->descripcion }}</p>
     
    <a href="{{ url('/listar_por_categoria/'.$categoria->nombre) }}" class="btn btn-primary">Ver lista de Producto</a>
   
  </div>
</div>   
     @empty  
      <h3>Sin Caregorias Registrado</h3>           
                @endforelse


            </ul>

@endsection