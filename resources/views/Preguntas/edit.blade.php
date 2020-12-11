@extends('layout.master')
@section('title', 'Pregunta')
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
	{{$comentario->propietario->name  }} Pregunto <small class="text-muted intialisn">{{$comentario->hora_p  }}</small> : <input type="text" name="contenido" class="form-control" id="contenido" value="{{ $comentario->contenido }}">
	Responde:
<input type="text" name="respuesta" class="form-control" id="respuesta" value="{{ $comentario->respuesta }}">

</div>

<input type="submit" name="btn btn-success" value="Moderar">

</form>
</div>
</form>



@endsection