<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ url('/static/css/navbar.css?v='.time()) }}">
	<link rel="stylesheet" type="text/css"  href="{{ asset('/static/css/tabla.css?v='.time()) }}">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	 <script src="https://kit.fontawesome.com/6c52bb4677.js" crossorigin="anonymous"></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip()
		});
	</script>
</head>
<body class="fondo">
	<div class="wrapper">
		<nav class="navbar navbar-expand-lg shadow">
			<div class="collapse navbar-collapse">
					 <center><ul class="nav navbar-nav navbar-left">
					 <a href="{{ url('/')}}"><h4>Lista de Categoria</h4></a>
     				 <a href="{{ url('/listProduct')}}"><h4>Lista de Productos</h4></a>
     				 <a href="{{ url('/AcercaDe') }}"><h4>Quines somos </h4></a>
     				 <a href="{{ url('/contacto') }}"><h4>Contacto</h4></a>
     			 </ul></center>

     			 	<u1 class="nav navbar-nav navbar-right">
            <a href="{{ url('/register') }}"><button class="btn-primary btn-lg active">Registro</button></a>
            </u1>

				<u1 class="nav navbar-nav navbar-right">
            <a href="{{ url('/login') }}"><button class="btn-success btn-lg active">Iniciar Sesion</button></a>
            </u1>
        </ul>
		</div>
	</div>
</body>


</html>