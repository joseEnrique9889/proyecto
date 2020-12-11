@extends('layout.master')
@section('title', 'Crear')
@section('content')

<div class="container-fluid">
  <div class="panel shadow">
  <div class="inside">
    <form action="{{ url('/calificacion') }}" method="POST" enctype="multipart/form-data">
      @csrf


    <h3>Tu Experencia es muy importante para nosotros</h3></center>

  </div>
   <div class="form-group">
    <label for="experencia">De 1 a 10 como fue tu experencia en la pagina</label>
    <select name="experencia" id="experencia">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      <option>6</option>
      <option>7</option>
      <option>8</option>
      <option>9</option>
      <option>10</option>

    </select>
  </div> 
     <div class="form-group">
    <label for="recomendacion">Recomendaria la pagina de Mercado Libre Ixhuatan</label>
    <select name="recomendacion" id="recomendacion">
      <option>Si</option>
      <option>No</option>
    </select>
  </div> 
 <div class="form-group">
      <label for="email">Usuario</label>
       <select class="form-control" name="user_id" id="user_id">
        @foreach($usuarios as $usuario)
         <option value="{{ $usuario->id }}"
          @isset($productos->usuario[0]->name)
            @if($usuario->name == $usuario->usuario[0]->name)
            selected 
            @endif
          @endisset
          >{{ $usuario->name }}</option>
         @endforeach
       </select>
        
       <div class="form-group">
    <label for="sugerencia">Sugerencia para que nuestra pagina mejore</label>
    <input type="text" name="sugerencia" class="form-control" id="activo">
  </div>
  
  <center><input class="btn btn-success" type="submit" value="Enviar"></center> 
  
</form>
<a href="{{ url('/') }}"><button class="btn btn-danger">Regresar</button></a>
</div>
  

@endsection