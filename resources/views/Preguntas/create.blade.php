@extends('layout.master')
@section('title', 'Moderar')
@section('content')
<div class="container-fluid">
  <div class="panel shadow">

  	<form action="/comentario" method="post" enctype="multipart/form-data">
  		@csrf

  		<div class="row">
  			<div class="col">Imagen</div>
  			<div class="col bg-ligth"><img src="{{ asset('storage').'/'.$producto->imagen}}" alt="" width="400"></div>
  			<div class="col"></div>
  			<div class="col"></div>
  		</div>
  		<div class="row">
  			<div class="col">Precio: </div>
  			<div class="col bg-ligth">${{$producto->precio  }}</div>

  			<div class="col"></div>
  			<div class="col"></div>
  		</div>

  		<input type="hidden" name="producto_id" value="{{ $producto->id }}">

  		<div class="form-group">
  			<label>Comentario: </label>
  			<textarea name="contenido" class="form->control" rows="2"></textarea>
  		</div>
  		<input type="submit" class="btn btn-primary" value="Comentar">
  	</form>


@endsection 