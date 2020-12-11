@extends('layout.master')
@section('title', 'Mercado Ixhuatan')
@section('content')


<div class="col-12">
<div class="card">
  <div class="card-header">
   <h2>Calificacion</h2>
  </div>
  <div class="card-body">
  	<div class="col-12" style="text-align: center;">
    <h5 class="card-title">Califique tu transaccion</h5>
    <span class="fa fa-star" style="cursor: pointer;" id="1estrella"></span>
    <span class="fa fa-star" onclick="calificar(item)" style="cursor: pointer;" id="2estrella"></span>
    <span class="fa fa-star" onclick="calificar(item)" style="cursor: pointer;" id="3estrella"></span>
    <span class="fa fa-star" onclick="calificar(item)" style="cursor: pointer;" id="4estrella"></span>
    <span class="fa fa-star" onclick="calificar(item)" style="cursor: pointer;" id="5estrella"></span>
    <br>
    <br>
    <a href="#" class="btn btn-primary"> Calificar</a>

    
   </div>

  </div>
</div>
</div>



@endsection