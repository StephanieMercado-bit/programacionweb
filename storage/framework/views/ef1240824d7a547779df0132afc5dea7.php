<?php $__env->startSection('contenido'); ?>


<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<link rel="stylesheet" href="<?php echo e(asset('css/reserva.css')); ?>">
<head>
    <meta charset="UTF-8">
</head>


<?php if( session('mensaje') ): ?>
    <h3><div class="alert"><?php echo e(session('mensaje')); ?></div></h3>
<?php endif; ?>

<?php if(count($errors) > 0): ?>
	<div class="errores">
		<ul>
		<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<li><?php echo e($error); ?></li>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	</div>
<?php endif; ?>

<body>
  <h1>¡Haz tu reserva!</h1>
  <div class="cuadrado">
    <form method="POST" action="<?php echo e(route('reserva.crear')); ?>">
      <?php echo csrf_field(); ?>
      <p> Fecha: <input
        type="date"
        name="fecha"
        class="form-control mb-2"
        value="<?php echo e(old('fecha')); ?>"
      /></p>
      <p> Hora: <input
        type="time"
        name="hora"
        class="form-control mb-2"
        min ="12:00" 
        max ="23:00"
      /></p>
      <p>Número de personas: <input
        type="number"
        name="num_personas"
        class="form-control mb-2"
        value="<?php echo e(old('num_personas')); ?>"
      /></p>
      <p>Local: <select name="id_local" id="id_local" >
        <option selected disabled readonly>Elige local</option>
        <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $local): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($local['id_local']); ?>"><?php echo e($local['ciudad']); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select></p>
      <button class="btn" type="submit">Reservar</button>
    </form>
    <br>
    <br>
    <br>
    <br>
    <a>¿Ya tienes hecha una reserva?</a>
    <a href="<?php echo e(route('reserva.ver')); ?>" style="color:darkgreen">Ver mi reserva</a>
  </div>
</body>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\estre\Downloads\PW_Restaurante_Laravel\resources\views/reservas/reservas.blade.php ENDPATH**/ ?>