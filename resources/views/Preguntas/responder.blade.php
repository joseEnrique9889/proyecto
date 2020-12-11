@extends('layout.master')
@section('title', 'Respuestas')
@section('content')
<div class="container-fluid">
  <div class="panel shadow">

<form action="/comentario/{{$comentario->id }}" method="post" enctype="multipart/form-data" style="display: inline;">
	@csrf
	@method('PUT')

	<div class="row">
		<div class="col"><label><center>Imagen</center></label></div>
  			<div class="col bg-ligth"><img src="{{ asset('storage').'/'.$comentario->producto->imagen}}" alt="" width="200"></div>
  		</div>
  		<label> Descripcion</label>
		<div class="col bg-ligth">{{$comentario->producto->descripcion  }}</div>
		<div class="col"></div>
		<div class="col"></div>
<br>
	<div class="row">
		<div class="col">Propietario:</div>
		<div class="col bg-ligth">{{ $comentario->producto->propietario->name }}</div>

	<div class="col"></div>
	<div class="col"></div>

	</div>
<div class="alert alert-info" role="alert">
	{{$comentario->propietario->name  }} Pregunto <small class="text-muted intialisn">{{$comentario->hora_p  }}</small> : {{ $comentario->contenido }}
	<div class="alert alert-warning" role="alert">{{ $comentario->respuesta }}</div>
	Respuesta:
	<textarea name="respuesta" class="form-control" rows="3"></textarea>
</div>

<input class="btn btn-success" type="submit" value="Enviar">
</form>
</div>
</form>



@endsection