<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ url('/static/css/admin.css?v='.time()) }}">
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
	<div class="col1">@include('supervisor.sidebar')</div>
	<div class="col2">
		<nav class="navbar navbar-expand-lg shadow">
			<div class="collapse navbar-collapse">
				<ul class="navbar-nav">
					<li class="nav-item">
						<h2 href="{{ url('/admin') }}" class="nav-link">MERCADO IXHUATAN</h2>
					</li>
				</ul>
				
			</div>
		</nav>

		<div class="page">
			<div class="container-fluid">
				<nav aria-label="breadcrumb shadow">
					<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="{{url('/tablero')}}"><i class="fas fa-home"></i>Dashboard</a>
					</li>
					@section('breadcrumb')
					@show
					</ol>
				</nav>

			</div>
	@section('content')
	@show
		</div>
	</div>
</body>


</html>