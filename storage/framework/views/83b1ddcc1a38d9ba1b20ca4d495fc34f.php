<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<link rel="stylesheet" href="<?php echo e(asset('css/procesarCompra.css')); ?>">
<head>
<meta charset="UTF-8">


<?php $__env->startSection('contenido'); ?>
<div class="procesar-compra-container">
<h1>Tu carrito</h1>
<br>
<?php if(Auth::check()): ?>
    <?php $__currentLoopData = $productosCarrito; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productoCarrito): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p><?php echo e($productoCarrito->nombre); ?> x<?php echo e($productoCarrito->pivot->cantidad); ?>...............................................$<?php echo e($productoCarrito->precio * $productoCarrito->pivot->cantidad); ?></p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <br>
    <h3>total: $<?php echo e($precio); ?></h3>
    <br>
   <form method="POST" action="/carrito/realizarCompra">
    <?php echo csrf_field(); ?>
    <label for="direccion" style="font-family: 'Poppins', sans-serif;">Direccion de envio:</label>
    <input type="text" id="direccion" name="direccion" value="" placeholder="Escribe tu dirección de envío..." required style="padding: 5px; border-radius: 5px; border: 1px solid #ccc; width: 100%; max-width: 300px;">
    <input type="hidden" name="productos" value="<?php echo e($productosCarrito); ?>">
    
    <br><br>
    
    <!-- Contenedor de los botones (Regresar y Comprar) -->
    <div style="display: flex; justify-content: center; gap: 20px; align-items: center; margin-top: 10px;">
        
        <!-- Botón de Regresar -->
        <a href="javascript:history.back()" style="background-color: #6b7280; color: white; padding: 14px 28px; text-decoration: none; font-weight: bold; font-family: 'Poppins', sans-serif; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">
            REGRESAR
        </a>

        <!-- Botón Verde Original -->
        <button type="submit" class="button" style="margin: 0;">REALIZAR COMPRA</button>
        
    </div>
</form>
<?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
</head>
<body>
</body>
</html>   
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\estre\Downloads\PW_Restaurante_Laravel\resources\views/carrito/compra.blade.php ENDPATH**/ ?>