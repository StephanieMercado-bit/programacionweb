<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<link rel="stylesheet" href="<?php echo e(asset('css/pedidoRealizado.css')); ?>">
<head>
<meta charset="UTF-8">


<?php $__env->startSection('contenido'); ?>
<br>
<?php if(Auth::check()): ?>
<div class="compra-realizada">
    <br>
    <h1>¡Muchas gracias por confiar en nosotros!</h1>
    <br>
    <p>Su pedido llegará en breve a la dirección: <?php echo e($direccion); ?></p>
    <br><br>
    <a href="/carrito" class="fa fa-reply icon" aria-hidden="true"></a>
    <a href="/perfil/historial-pedidos" class="fa fa-list-alt icon" aria-hidden="true"></a>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
</head>
<body>
</body>
</html>   
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\estre\Downloads\PW_Restaurante_Laravel\resources\views/carrito/pedidoRealizado.blade.php ENDPATH**/ ?>