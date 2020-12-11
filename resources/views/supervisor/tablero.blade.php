@extends('layout.master')
@section('title', 'Tablero')
@section('content')

@switch(Auth::user()->id)
	@case('1')
<div class="container card ">
        <div class="card-header">
            <ul class="nav nav-pills card-header-pills">
            	 <div class="p-2 ">
			<div class="card" style="width: 35rem;">
				<a href="{{ url('/user')}}"><img  class="card-img-top" src="{{ url('static/images/usuerss.png') }}" alt="Card-img-cap"></a>
					<div class="card-body">
						<h5 class="card-title">Usuarios registrados</h5>
						<p class="card-text">Total: {{ $users }}</p>
						<p class="card-text">Clientes: {{ $clientes ?? '' }}</p>
						<p class="card-text">Empleados: {{ $empleados }}</p>

					</div>
				</div>
			</div>
			 <div class="p-2 ">
				<div class="card" style="width: 35rem;">
				<a href="{{ url('/listaProdu')}}"><img class="card-img-top" src="{{ url('static/images/productos.jpg') }}" alt="Card-img-cap"></a>
					<div class="card-body">
						<h5 class="card-title">Productos</h5>
						<p class="card-text">Registrados: {{ $productos }}</p>
						<p class="card-text">concesionado: {{ $concesionados }}</p>
</div>

					</div>
</div>
 <div class="p-2 ">
<div class="card" style="width: 35rem;">
				<a href="{{ url('/categoria')}}"><img class="card-img-top" src="{{ url('static/images/categorias.png') }}" alt="Card-img-cap"></a>
					<div class="card-body">
						<h5 class="card-title">Categorias</h5>
						<p class="card-text">Registradas: {{ $categorias }}</p>

					</div>
				</ul>
			</div>
			</div>
@break
@case('2')

<div class="container card ">
        <div class="card-header">
            <ul class="nav nav-pills card-header-pills">
			
				<div class="card" style="width: 35rem;">
				<img class="card-img-top" src="{{ url('static/images/productos.jpg') }}" alt="Card-img-cap">
					<div class="card-body">
						<h5 class="card-title">Productos</h5>
						<p class="card-text">concesionado: {{ $concesionados }}</p>
						<p class="card-text">Por Revisar: {{ $porconcesionar }}</p>

					</div>
</div>

				</ul>

</div>	

				
@endswitch
@endsection