@extends ('layout')

@section ('contenido')
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
      <form action="/alta" method="post"  encType='multipart/form-data'> <!-- formulario de texto y mapa de bits-->
        @csrf
        <h2>Alta de excursión</h2>
        <hr></hr>
        @if (session('success'))
        <div class="ok"> {{session('success')['mensaje']}}</div> <!-- variable success de la linea 43 del controller se genera cuando se da de alta una excursion-->
        @endif
        <br>
        <div class="mb-3">
            <select class="form-select" name="zona">
                <option value='' disabled selected>Selecciona zona</option>
                @foreach ($zonas as $zona)
                    <option @selected($zona->idzona == old('$zona->idzona')) value="{{$zona->idzona}}">{{$zona->descripcion}}</option>
                @endforeach
                <!--<option value='1'>Capital y Patagonia</option>
                <option value='2'>Norte y Este</option>
                <option value='3'>Tierra de Fuego</option>-->
            </select>
        </div>
        @error ('zona')
        <div class = 'errores'>{{$message}}</div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Nombre excursión</label>
            <input  type="text" class="form-control" name="nombre" value="{{old('nombre')}}">
        </div>
        @error ('nombre')
        <div class = 'errores'>Nombre excursión obigatorio</div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Imagen</label>
            <input type="file" class="form-control" name="img" placeholder="Imagen de excursion" accept="image/*" >
        </div>
        @error ('imagen')
        <div class = 'errores'>Imagen excursión obigatoria</div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Situación</label>
            <textarea class="form-control" rows="3" name="situacion">{{old('situacion')}}</textarea>
        </div>
        @error ('situacion')
        <div class = 'errores'>Situación excursión obigatorio</div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Servicio</label>
            <textarea class="form-control" rows="3" name="servicio">{{old('servicio')}}</textarea>
        </div>
        @error ('servicio')
        <div class = 'errores'>Servicio excursión obigatorio</div>
        @enderror
        <div class="mb-3">
            <label class="form-label" >Precio excursión"</label>
            <input type="number" class="form-control" name="precio" value="{{old('precio')}}" />
        </div>
        @error ('precio')
        <div class = 'errores'>Precio excursión obigatorio</div>
        @enderror
        <div class="mb-3">
            <button type="submit" class="btn btn-primary" value='alta'>Alta de excursión</button>
        </div>
      </form>
<!--</div>
  </body>
</html>-->
@endsection