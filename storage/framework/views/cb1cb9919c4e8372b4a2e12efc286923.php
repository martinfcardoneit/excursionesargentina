<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/estilos.css">
    <title>Argentina</title>
  </head>
  <body>
    <div id="root">
      <nav>
        <a href= "<?php echo e(route('inicio')); ?>"><b>Inicio</b></a>
        <a href="<?php echo e(route('excursiones',['id'=>1])); ?>">Capital y patagonia</a>
        <a href="<?php echo e(route('excursiones',['id'=>2])); ?>">Norte y Este</a>
        <a href="<?php echo e(route('excursiones',['id'=>4])); ?>">Tierra de Fuego</a>
        <a href="<?php echo e(route('ruta')); ?>">Ruta</a>
        <a class="altaruta" href="<?php echo e(route('altaExcursion')); ?>">Alta ruta</a>
      </nav>
      
        <?php echo $__env->yieldContent('contenido'); ?>

    </div>
  </body>
</html>
<?php /**PATH C:\xampp\htdocs\PR FS35-24_PROJECTE_Martin_Fernandez\argentina\resources\views/layout.blade.php ENDPATH**/ ?>