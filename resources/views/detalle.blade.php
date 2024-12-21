@extends ('layout')

@section ('contenido')

<?php
$excursionJson=json_encode($excursion);
?>



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
 

      <div class='detalle'>
        <h1>{{$excursion->nombre}}</h1>
        <p>{{$excursion->servicio}}</p>
        <div class='imagenruta'>
          <div class='precioruta'>{{$excursion->precio}}€</div>
          <div class='botonesruta'>
          
          @if (empty($excursionesContratadas)) 
          <button class='verde' id="verdeo" onclick="enviarExcursion('{{$excursionJson}}')">Contratar</button> 
          @else
          @php
          $yaContratada=false;
          @endphp
            @foreach ($excursionesContratadas as $excursionContratada)
            @if ($excursionContratada['nombre']==$excursion['nombre'])
            @php
          $yaContratada=true;
          @endphp
          @break
          @endif
          @endforeach

          @if(!$yaContratada)
            <button class='verde' id="verdeo" onclick="enviarExcursion('{{$excursionJson}}')">Contratar</button>
          @endif
          @endif
          
          @foreach ($excursionesContratadas as $excursionContratada)
          @if ($excursionContratada['nombre']==$excursion['nombre'])
             <button class='rojo' onclick="eliminarExcursion ('<?php echo $excursion['nombre'];?>')">Anular</button>
             
             @endif
             @endforeach
             
             <a href="{{route('inicio')}}"><button class='yellow'>Volver</button></a>
          </div>
          <img src="{{asset('img/'.$excursion->imagen)}}"/>
        </div>
      </div>

<!--</div>
  </body>
</html>-->


<script>
  const excursion= '';
  const excursiones= [];
  excursionSeleccion=[];
  
  
  function enviarExcursion (efe){
    const excursion = JSON.parse(efe);
    tete= excursion.idexcursion;
    
    
    excursionSeleccion.push(tete);
      console.log(excursionSeleccion);

      enviarExcursion(excursionSeleccion);
      
  }

  function enviarExcursion(excursionSeleccion){
    fetch ('/guardarexcursion', {
      method: 'POST',
      headers:{ 'Content-type': 'aplication/json',
                'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content')},
                body:JSON.stringify({excursionese:excursionSeleccion}) 
    })
    .then(response =>response.json())
    .then(data => {console.log('productos guardados', excursionSeleccion)
      location.reload();
    })
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
  
    
    


    //if( tete==9) {alert ("efe")}
  


</script>


@endsection
