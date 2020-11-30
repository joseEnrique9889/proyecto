@extends('layout.plantilla')
@section('title', 'ADMINISTRADOR')
@section('content')
<center><h2>Lista De Producto</h2></center>
<div class="container card text-center">
        <div class="card-header">
            <ul class="nav nav-pills card-header-pills">
                @forelse($productos as $producto)

                <div class="card mtop16" style="width: 25rem;">
                  <img class="card-img-top" src="{{ asset('storage').'/'.$producto->imagen}}" alt="Card image cap" width="700">
                 <div class="card-body">
                <h4 class="card-title">{{ $producto->nombre }}</h4>
                <h5 class="card-title">{{ $producto->categoria->nombre }}</h5>
                <h5 class="card-title">Stock disponible: {{ $producto->cantidad}}</h5>
               <h5 class="card-text">Precion: {{ $producto->precio }}</h5> 
            <p class="card-text">{{ $producto->descripcion }}</p>
            <h5 class="card-text">Estado: {{ $producto->estado }}</h5>
            <a href="#" class="btn btn-primary">ver detalle</a>
            
          <a href="#" class="btn btn-success">comprar</a>
        

  </div>
</div>                 
                   @empty  
                   <h3>Sin Productos Registrado En Esta Categoria</h3>            
                @endforelse
                

            </ul>

       
@endsection