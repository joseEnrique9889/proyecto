@extends('connect.master')

@section('title', 'Login')

@section('content')
<div class="box box_login shadow">
	<div class="header">
		<center><h4>Iniciar Sesion</h4></center>
		<a href="{{ url('/') }}">

		<img src="{{ url('/static/images/user.png') }}"></a>
	</div>

	<div class="inside">
	{!! Form::open(['url' => '/login']) !!}
	<center><h4 for="email">CORREO ELECTRONICO:</h4></center>
	<div class="input-group mb-2">
		<div class="input-group-prepend">
			<div class="input-group-text"><i class="fas fa-envelope-square"></i></div>
		</div>

	{!! Form::email('email', null, ['class' => 'form-control']) !!}
	</div>
	<center><h4 for="email" class="mtop16">CONTRASEÑA:</h4></center>
	<div class="input-group mb-2">
		<div class="input-group-prepend">
			<div class="input-group-text"><i class="fas fa-unlock"></i></div>
		</div>

	{!! Form::password('password', ['class' => 'form-control']) !!}
	</div>
	{!! Form::submit('Ingresar', ['class' => 'btn btn-success mtop16']) !!}
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
		<a href="{{ url('/register') }}">NO TIENES UNA CUENTA?, RESGITRATE</a>
		<a href="{{ url('/recover') }}">OLVIDE MI CONTRASEÑA</a>
	</div>
	</div>
	
</div>

@stop