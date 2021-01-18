@extends('layout.master')
@section('title', 'Lista De Productos')
@section('content')
@if(Auth::check()<=0)
<div class="wrapper">
    <nav class="navbar navbar-expand-lg shadow">
      <div class="collapse navbar-collapse">
           <center><ul class="nav navbar-nav navbar-center">
           <a href="{{ url('/')}}"><h3>Lista de Categoria</h3></a>
             <a href="{{ url('/listaProdu')}}"><h3>Lista de Productos</h3></a>
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

<form class="navbar-form navbar-left pull-right">

    <input name="buscar" class="form-control mr-sm-2" type="search" placeholder="nombre del producto" aria-label="Search" autocomplete="on">
    <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
  </form>

   <center><h2>Lista De Producto</h2></center>
<div >
        <div>
            <ul class="nav">
                @forelse($productos as $producto)

                   @if ($producto->concesionado==2)
                    <div class="p-4 ">
                <div class="card" style="width: 25rem;">
                  <img class="card-img-top" src="{{ asset('storage').'/'.$producto->imagen}}" alt="Card image cap" width="700">
                 <div class="card-body">
                <h4 class="card-title">{{ $producto->nombre }}</h4>
                <h5 class="card-title">{{ $producto->categoria->nombre }}</h5>
                <h5 class="card-title">Stock disponible: {{ $producto->cantidad}}</h5>
               <h5 class="card-text">Precion: {{ $producto->precio }}</h5> 
            <p class="card-text">{{ $producto->descripcion }}</p>
            <h5 class="card-text">Estado: {{ $producto->estado }}</h5>
            <a href="{{ url('/kardex/'.$producto->id.'/producto') }}" class="btn btn-primary">ver detalle</a>
            @can('haveaccess','comprar.create')
          <a href="{{ url('/comprar/'.$producto->id.'/comprar') }}"  class="btn btn-success">comprar</a>
          @endcan
        </div>


  </div>

</div>        
   @endif 
           @empty  
                   <h3>Sin Productos Registrado En Esta SubCategoria</h3>            
                @endforelse
                

            </ul>

       
@endsection