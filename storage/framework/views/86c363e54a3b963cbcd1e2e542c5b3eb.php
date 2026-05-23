<?php $__env->startSection('contenido'); ?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<link rel="stylesheet" href="<?php echo e(asset('css/header.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/historial-pedidos.css')); ?>">
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<?php echo e($cont = 1); ?>

<head>
    <meta charset="UTF-8">
    <title>Historial de Pedidos</title>
</head>
<body>
    <br>
    <h1>Historial de Pedidos</h1>
    <br>

    <div class="grid-container">
    <?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="grid-item">
        <p><strong>Pedido <?php echo e($cont++); ?></strong></p>
        <br>
        <?php $__currentLoopData = $pedido->producto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($producto->nombre); ?>: <?php echo e($producto->pivot->cantidad); ?> uds.<br/>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

</body>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\estre\Downloads\PW_Restaurante_Laravel\resources\views/auth/historial-pedidos.blade.php ENDPATH**/ ?>