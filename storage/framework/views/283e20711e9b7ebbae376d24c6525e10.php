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
      <form action="/alta" method="post"  encType='multipart/form-data'> <!-- formulario de texto y mapa de bits-->
        <?php echo csrf_field(); ?>
        <h2>Alta de excursión</h2>
        <hr></hr>
        <?php if(session('success')): ?>
        <div class="ok"> <?php echo e(session('success')['mensaje']); ?></div> <!-- variable success de la linea 43 del controller se genera cuando se da de alta una excursion-->
        <?php endif; ?>
        <br>
        <div class="mb-3">
            <select class="form-select" name="zona">
                <option value='' disabled selected>Selecciona zona</option>
                <?php $__currentLoopData = $zonas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zona): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php if($zona->idzona == old('$zona->idzona')): echo 'selected'; endif; ?> value="<?php echo e($zona->idzona); ?>"><?php echo e($zona->descripcion); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!--<option value='1'>Capital y Patagonia</option>
                <option value='2'>Norte y Este</option>
                <option value='3'>Tierra de Fuego</option>-->
            </select>
        </div>
        <?php $__errorArgs = ['zona'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class = 'errores'><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <div class="mb-3">
            <label class="form-label">Nombre excursión</label>
            <input  type="text" class="form-control" name="nombre" value="<?php echo e(old('nombre')); ?>">
        </div>
        <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class = 'errores'>Nombre excursión obigatorio</div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <div class="mb-3">
            <label class="form-label">Imagen</label>
            <input type="file" class="form-control" name="img" placeholder="Imagen de excursion" accept="image/*" >
        </div>
        <?php $__errorArgs = ['imagen'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class = 'errores'>Imagen excursión obigatoria</div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <div class="mb-3">
            <label class="form-label">Situación</label>
            <textarea class="form-control" rows="3" name="situacion"><?php echo e(old('situacion')); ?></textarea>
        </div>
        <?php $__errorArgs = ['situacion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class = 'errores'>Situación excursión obigatorio</div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <div class="mb-3">
            <label class="form-label">Servicio</label>
            <textarea class="form-control" rows="3" name="servicio"><?php echo e(old('servicio')); ?></textarea>
        </div>
        <?php $__errorArgs = ['servicio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class = 'errores'>Servicio excursión obigatorio</div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <div class="mb-3">
            <label class="form-label" >Precio excursión"</label>
            <input type="number" class="form-control" name="precio" value="<?php echo e(old('precio')); ?>" />
        </div>
        <?php $__errorArgs = ['precio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class = 'errores'>Precio excursión obigatorio</div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary" value='alta'>Alta de excursión</button>
        </div>
      </form>
<!--</div>
  </body>
</html>-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PR FS35-24_PROJECTE_Martin_Fernandez\argentina\resources\views/alta.blade.php ENDPATH**/ ?>