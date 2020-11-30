@extends('layout.master')
@section('title', 'SUPERVISOR')
@section('content')

<div class="container card ">
        <div class="card-header">
            <ul class="nav nav-pills card-header-pills">
			<div class="card" style="width: 35rem;">
				<img class="card-img-top" src="{{ url('static/images/usuerss.png') }}" alt="Card-img-cap">
					<div class="card-body">
						<h5 class="card-title">Usuarios registrados</h5>
						<p class="card-text">Total: {{ $users }}</p>
						<p class="card-text">Clientes: {{ $clientes ?? '' }}</p>
						<p class="card-text">Empleados: {{ $empleados }}</p>

					</div>
				</div>
				<div class="card" style="width: 35rem;">
				<img class="card-img-top" src="{{ url('static/images/productos.jpg') }}" alt="Card-img-cap">
					<div class="card-body">
						<h5 class="card-title">Productos</h5>
						<p class="card-text">Registrados: {{ $productos }}</p>

					</div>
</div>
<div class="card" style="width: 35rem;">
				<img class="card-img-top" src="{{ url('static/images/categorias.png') }}" alt="Card-img-cap">
					<div class="card-body">
						<h5 class="card-title">Categorias</h5>
						<p class="card-text">Registradas: {{ $categorias }}</p>

					</div>
				</ul>
								
</div>

				

				

@endsection
