<?php $__env->startSection('contenido'); ?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(asset('css/perfil.css')); ?>">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <div class="cuadrado">
    <div class="centrar">
        <h1>Perfil de <?php echo e(Auth::user()->name); ?></h1>
        <p>Nombre: <?php echo e(Auth::user()->name); ?></p>
        <p>Correo electrónico: <?php echo e(Auth::user()->email); ?></p>
        <p>Teléfono: <?php echo e(Auth::user()->cliente->telefono); ?></p>
        <p>Dirección: <?php echo e(Auth::user()->cliente->direccion); ?></p>
        <p><div class="modificar"><a href="/modificar-perfil">Modificar perfil</a></div> <a id="logo-historial" href="/perfil/historial-pedidos"><div class="letras-logo">Historial de pedidos</div><i class="fa fa-list-alt"></i></a></p>
        
       
    </div>
    </div>
    </section>
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\estre\Downloads\PW_Restaurante_Laravel\resources\views/auth/perfil.blade.php ENDPATH**/ ?>