@extends('layout.master')
@section('title', 'ADMINISTRADOR')
@section('content')
<div class="panel shadow">
  <div class="inside">
    <center><h4>Producto Por Recibir Fisicamente</h4></center>
    <hr>
    <table class="table" id="tbl_productos">
  <thead> 
 <td colspan="13"><center><label>Lista de Productos</div></label></center></td>
    <tr >
      
      <th scope="col">Nombre</th>
      <th scope="col">precio</th>
      <th scope="col">subcategoria</th>
            <th scope="col">recibir producto fisicamente <br><em>(toque 2 veces en el texto para recibir el producto)</em></th>
      
     </tr>
 <tbody class="body1">
    @forelse($productos as $producto)
    @if($producto->concesionado==2)
    <tr id="{{$producto->id}}">
      
    <td scope="row">{{ $producto->nombre}}<img src="{{ asset('storage').'/'.$producto->imagen}}" alt="" width="100"></td>
    <td >{{ $producto->precio}}</td>
    <td >{{ $producto->categoria->nombre }}</td>
    <td class="tipo" data-original="{{$producto->recibido}}"><center>{{ $producto->recibido }}</center></td>
   
    @endif
   @empty
   <tr>
     <td colspan="10"><center><h4>Sin Productos Para Concesionar</h4></center></td>
   </tr>
      @endforelse
  </tbody> 

@endsection
@section('escripts')
<script>
var mostrandoInput = false;
$().ready( function(){
    $(".tipo").dblclick(function() {
        if (mostrandoInput) return;
        original = this.innerText;
        var opciones = '<select name="recibido" data="">';
            if (original == "recibido")
                opciones+='    <option selected>recibido</option>';
            else
                opciones+='    <option>recibido</option>';

            if (original == "no recibido")
                opciones+='    <option selected>no recibido</option>';
            else
                opciones+='    <option>no recibido</option>';

            opciones+='</select>';
            this.innerHTML = opciones;
            mostrandoInput = true;
    });

    $(".tipo").keydown(function( event ) {
        if ( event.which == 27 ) {
            this.innerText = this.dataset["original"];
            mostrandoInput = false;
       }
        if ( event.which == 13 ) {
            var recibido = this.children[0].value;
            this.innerText = "";
            axios.put('/_Concesionar/' + this.parentElement.id  , {
                _token: '{{ csrf_token() }}',
                recibido: recibido ,
            })
            .then(function (response) {                
                td = $("tr#" + response.data.id + ">td.tipo").text(response.data.recibido);
                //.text(response.data.equipo);
                console.log(response);
            })
            .catch(function (error) {
                if(error.response.status==401)alert("Usted no ha iniciado en el sistema");
                if(error.response.status==500)alert(error.response.data.message);
                else alert(error.response.data.error);
                console.log(error);
            });
        }
    });
} );
</script>
@endsection
