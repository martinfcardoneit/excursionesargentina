@extends ('layout')

@section('contenido')

<!--<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/estilos.css">
    <title>Argentina</title>
  </head>
  <body>
    <div id="root">
      <nav>
        <a href='inicio.html'><b>Inicio</b></a>
        <a href='excursiones.html?zona=1'>Capital y patagonia</a>
        <a href='excursiones.html?zona=2'>Norte y Este</a>
        <a href='excursiones.html?zona=3'>Tierra de Fuego</a>
        <a href='ruta.html'>Ruta</a>
        <a class="altaruta" href='alta.html'>Alta ruta</a>
      </nav>-->


      <div class='ruta'>
        @if(!empty($arrayExcur))
        @foreach ($arrayExcur as $excursion)
       
        <h3>Lugares a visitar {{ $excursion ['nombre']}} </h3>
        <p><img src="{{asset('img/'.$excursion['imagen'])}}" /><button onclick="eliminarExcursion ('<?php echo $excursion['nombre'];?>')">Anular</button> Precio:{{ $excursion ['precio']}} €</p>
        else 
        <script> alert ("no hay excursiones")</script>
        @endforeach
        
        @endif

        <?php function sumarExcursiones($arrayExcur) {
          $total= array_sum(array_map(function($excursion){
            return $excursion ['precio'];
          }, $arrayExcur));
          return $total;
        } ?>
        <h3>Total a pagar: {{sumarExcursiones($arrayExcur)}}  €</h3>
        <button class='imprimir' onClick="imprimir()">Imprimir</button>
      </div>
    <!--</div>
  </body>
</html>-->
<script>
  
  function imprimir(){
    window.print();
  }


  function eliminarExcursion (nombre) {
    fetch ('/eliminarexcursion', {
      method:'POST',
      headers:{ 'Content-type': 'application/json',
                'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content')},
                body:JSON.stringify({nombre:nombre}) })
                .then (response=> { if(!response.ok){
                  throw new Error('Error al eliminar');
                }
    return response.json ();
    })
    .then (data=>{console.log(data.message);
      
      location.reload();
    })
  }

</script>
@endsection
