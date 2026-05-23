<?php $__env->startSection('contenido'); ?>

<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<link rel="stylesheet" href="<?php echo e(asset('css/reserva.css')); ?>">
<head>
    <meta charset="UTF-8">
</head>

<?php if(auth()->user()->reserva): ?>
    <div class="card">
        <body>
            <br> 
            <h1 style="text-align:center">Tu reserva</h1>   
            <br> 
        </body>
        <table class="content-table" style="margin:0 auto">
            <thead>
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Numero de personas</th> 
                <th>Local</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td> <?php echo $reserva->fecha ?> </td>
                    <td> <?php echo $reserva->hora ?> </td>
                    <td> <?php echo $reserva->num_personas ?> </td>
                    <td> <?php echo $local->ciudad ?> </td>
                </tr>
            </tbody>
        </table>
        <form name="modificar" id="modificar" action="<?php echo e(route('reserva.mod')); ?>">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn"> Modificar</button>
        </form>
        <form name="eliminar" id="eliminar" action="<?php echo e(route('reserva.eliminar')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn"> Eliminar</button>
        </form>
        <br>
        <br>

    </div>
<?php else: ?>

    <div class="cuadrado2">
        <h4>No tienes ninguna reserva, ¿te gustaría realizar una?</h4>
        <h4><a href="/reservas"> Haz click aqui</a></h4>
    </div>

<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\estre\Downloads\PW_Restaurante_Laravel\resources\views/reservas/mireserva.blade.php ENDPATH**/ ?>