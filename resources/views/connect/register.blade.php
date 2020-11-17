@extends('connect.master')

@section('title', 'Registro')

@section('content')
<div class="box box_Register shadow">
	<div class="header">
		<center><h1>REGISTRO</h1></center>
	</div>

	<div class="inside">
	{!! Form::open(['url' => '/register','enctype' => 'multipart/form-data']) !!}
	<label for="name">Nombre(s):</label>
	<div class="input-group mb-2">
		<div class="input-group-prepend">
			<div class="input-group-text"><i class="fas fa-user"></i></div>
		</div>

	{!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
	</div>
	<label for="apellido" class="mtop16">Apellidos:</label>
	<div class="input-group mb-2">
		<div class="input-group-prepend">
			<div class="input-group-text"><i class="fas fa-user"></i></div>
		</div>

	{!! Form::text('apellido', null, ['class' => 'form-control', 'required']) !!}
	</div>

	<label for="imagen" class="mtop16">Foto:</label>
	<div class="input-group mb-2">
		<div class="input-group-prepend">
			<div class="input-group-text"><i class="fas fa-camera-retro"></i></div>
		</div>

	{!! Form::file('imagen', null, ['class' => 'form-control', 'required']) !!}
	</div>
	
	<label for="email" class="mtop16">Correo Electronico:</label>
	<div class="input-group mb-2">
		<div class="input-group-prepend">
			<div class="input-group-text"><i class="fas fa-envelope-square"></i></div>
		</div>

	{!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
	</div>
	<label for="password" class="mtop16">Contraseña:</label>
	<div class="input-group mb-2">
		<div class="input-group-prepend">
			<div class="input-group-text"><i class="fas fa-unlock"></i></div>
		</div>

	{!! Form::password('password', ['class' => 'form-control', 'required']) !!}
	</div>
	<label for="cpassword" class="mtop16">Confirmar Contraseña:</label>
	<div class="input-group mb-2">
		<div class="input-group-prepend">
			<div class="input-group-text"><i class="fas fa-unlock"></i></div>
		</div>

	{!! Form::password('cpassword', ['class' => 'form-control', 'required']) !!}
	</div>
	{!! Form::submit('Registrarse', ['class' => 'btn btn-success mtop16']) !!}
	{!! Form::close() !!}
	@if(Session::has('message'))
	<div class="container">
		<div class="metop16 alert alert-{{ Session::get('typealert') }}" style="display:none;">
			{{ Session::get('message') }}
			@if ($errors->any())
			<ul>
				@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
			@endif
			<script>
				$('.alert').slideDown();
				setTimeout(function(){ $('.alert').slideUp(); }, 10000);
			</script>
		</div>
	</div>
	@endif
	<div class="footer mtop16">
		<a href="{{ url('/login') }}">Ya tengo Cuenta Ingresar</a>
		
	</div>
	</div>


	
</div>

@stop