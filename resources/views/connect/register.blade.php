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
	
	

		</div>
		 <div class="form-gorup">
   <label for="email" class="mtop16">Correo Electronico:</label>
	<div class="input-group mb-2">
		<div class="input-group-prepend">
			<div class="input-group-text"><i class="fas fa-envelope-square"></i></div>
    <input id="email" type="email" class="form-control" name="email"></div>
    <span id="error_email"></span>
    </div>
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
	<script>
$(document).ready(function(){

$('#email').blur(function(){
    var error_email = '';
    var email = $('#email').val();
    var _token = $('input[name="_token"]').val();
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if($.trim(email).length > 0)
    {
        if(!filter.test(email))
        {				
            $('#error_email').html('<label  class="bg-danger text-white"><img src="{{ url('/static/images/correo.png') }}">Correo Invalido.Ingrese un correo valido</label>');
            $('#email').addClass('has-error');
            $('#register').attr('disabled', 'disabled');
        }
        else
        {
            $.ajax({
                url:"{{ route('register.check') }}",
                method:"POST",
                data:{email:email, _token:_token},
                success:function(result)
                {
                    if(result == 'unique')
                    {
                        $('#error_email').html('<label class="bg-success text-white"><img src="{{ url('/static/images/alegre.png') }}">Correo Disponible </label>');
                        $('#email').removeClass('has-error');
                        $('#register').attr('disabled', false);
                    }
                    else
                    {
                        $('#error_email').html('<label class="bg-danger text-white"><img src="{{ url('/static/images/triste.png') }}">Correo no Disponible</label>');
                        $('#email').addClass('has-error');
                        $('#register').attr('disabled', 'disabled');
                    }
                }
            })
        }
    }
    else
    {
        $('#error_email').html('<label class="bg-warning text-dark"><img src="{{ url('/static/images/correo.png') }}">correo requerido Por favor ingrese su correo</label>');
        $('#email').addClass('has-error');
        $('#register').attr('disabled', 'disabled');
    }
});

});
</script>

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

@endsection
