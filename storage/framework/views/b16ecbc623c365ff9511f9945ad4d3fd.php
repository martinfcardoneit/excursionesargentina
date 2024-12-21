<?php $__env->startSection('contenido'); ?>

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
      <div class='excursiones'>
        <?php $__currentLoopData = $excursionesZona; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $excursion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class='excursion'>
          <p class='titulo'><?php echo e($excursion->nombre); ?></p>
          <p class='descripcion'><?php echo e($excursion->situacion); ?></p>
          <h1> </h1>
          <img src="<?php echo e(asset('img/'.$excursion->imagen)); ?>">   
          <div class='flex'>
            <div>
              <a href='/excursion/<?php echo e($excursion->idexcursion); ?>'><button class='btn btn-success'>Más Info</button></a>
            </div>
            <?php $__currentLoopData = $excursionesContratadas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $excursionContratada): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($excursionContratada['nombre']==$excursion['nombre']): ?>
            <div class='circulo'></div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          
        </div>
        <!--
        <div class='excursion'>
          <p class='titulo'>Nombre excursión</p>
          <p class='descripcion'>Situación excursión</p>
          <img src="<?php echo e(asset('img/iguazu.jpg')); ?>">
          <div class='flex'>
            <div>
              <a href='detalle.html?excursion=2'><button class='btn btn-success'>Más Info</button></a>
            </div>
            <div class='circulo'></div>
          </div>
        </div>
        <div class='excursion'>
          <p class='titulo'>Nombre excursión</p>
          <p class='descripcion'>Situación excursión</p>
          <img src="<?php echo e(asset('img/polvorilla.jpg')); ?>">
          <div class='flex'>
            <div>
              <a href='detalle.html?excursion=3'><button class='btn btn-success'>Más Info</button></a>
            </div>
            <div class='circulo'></div>
          </div>
        </div>
      </div>-->



<!--</div>
  </body>
</html>-->
<script>
  
</script>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PR FS35-24_PROJECTE_Martin_Fernandez\argentina\resources\views\excursiones.blade.php ENDPATH**/ ?>