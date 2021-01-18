@extends('layout.master')
@section('title', 'Mercado Ixhuatan')
@section('content')

@if(Auth::check()<=0)
<div class="wrapper">
    <nav class="navbar navbar-expand-lg shadow">
      <div class="collapse navbar-collapse">
           <center><ul class="nav navbar-nav navbar-left">
           <a href="{{ url('/')}}"><h4>Lista de Categoria</h4></a>
             <a href="{{ url('/listaProdu')}}"><h4>Lista de Productos</h4></a>
           </ul></center>

            <u1 class="nav navbar-nav navbar-right">
            <a href="{{ url('/register') }}"><button class="btn-primary btn-lg active">Registro</button></a>
            </u1>

        <u1 class="nav navbar-nav navbar-right">
            <a href="{{ url('/login') }}"><button class="btn-success btn-lg active">Iniciar Sesion</button></a>
            </u1>
        </ul>
    </div>
  </nav>
  @endif
  
<center><h1>Bienvenido A Mercado Libre Ixhuatan</h1></center>
<center><h1>Estas Son la Categorias</h1></center>
    
    <div >
            <ul class="nav ">
                @forelse($subcat->subCategori as $categoria)
                 
 <div class="p-4 ">
                <div class="card mtop16" style="width: 35rem;">
                  <img class="card-img-top" src="{{ asset('storage').'/'.$categoria->imagen}}" alt="Card image cap" width="700">
                 <div class="card-body">
                <h5 class="card-title">{{ $categoria->nombre }}</h5>
    <p class="card-text">{{ $categoria->descripcion }}</p>
     
    <a href="{{ url('/listar_por_categoria/'.$categoria->nombre) }}" class="btn btn-primary">Ver lista de Producto</a>

  </div>
 
  </div>
</div>   
     @empty  
      <h3>Sin SubCategoria Registrada</h3>           
                @endforelse


            </ul>

@endsection