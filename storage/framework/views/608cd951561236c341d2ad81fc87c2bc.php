<!DOCTYPE html>
<body>
<head>
<meta charset="UTF-8">


<?php $__env->startSection('contenido'); ?>
        
<!-- -------------------------------------------------------------------------------------- -->

    <!-- Listado de usuarios -->
    <h1>Listado de Usuarios</h1>
    <br>
        <div id="usuarios">
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($user->cliente): ?>
                    <h3><strong>Nombre:</strong> <?php echo e($user->name); ?></h3>
                    <p><strong>ID:</strong> <?php echo e($user->id); ?></p>
                    <p><strong>Email:</strong> <?php echo e($user->email); ?></p>
                    <p><strong>Contraseña:</strong> <?php echo e($user->password); ?></p>
                    <p><strong>Teléfono:</strong> <?php echo e($user->cliente->telefono); ?></p>
                    <p><strong>Dirección:</strong> <?php echo e($user->cliente->direccion); ?></p>
                    <br>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    <!-- Añadir usuarios -->
      <h1>Añadir Usuario</h1>
      <br>
 <form action="/admin/añadirUsuario" method="POST">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="form-group">
        <label for="telefono">Teléfono</label>
        <input type="number" class="form-control" id="telefono" name="telefono" required>
    </div>
    <div class="form-group">
        <label for="direccion">Dirección</label>
        <input type="direccion" class="form-control" id="direccion" name="direccion" required>
    </div>
    <button type="submit" class="btn btn-primary">Añadir Usuario</button>
    
 </form>
 <br>
  <?php if(session('message1')): ?>
    <div class="alert alert-success"><?php echo e(session('message1')); ?></div>
  <?php endif; ?>


    <!--   Eliminar usuarios  -->
    <h1>Eliminar Usuario</h1>
    <br>

    <form action="/admin/eliminarUsuario" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="_method" value="POST">
                            <div class="form-group">
                                <input type="number" name="id" class="form-control" placeholder="ID de usuario">
                            </div>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        <br>


  <?php if(session('message2')): ?>
    <div class="alert alert-success"><?php echo e(session('message2')); ?></div>
  <?php endif; ?>

  <?php if(session('message3')): ?>
    <div class="alert alert-success"><?php echo e(session('message3')); ?></div>
  <?php endif; ?>
                        
<!-- -------------------------------------------------------------------------------------- -->

    <!-- Listado de pedidos -->
    <h1>Listado de pedidos</h1>
    <br>
        <div id="pedidos">
            <?php $__currentLoopData = $carritos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carrito): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><strong>ID:</strong> <?php echo e($carrito->id_carrito); ?></p>
                    <p><strong>Precio total:</strong> <?php echo e($carrito->total_precio); ?></p>
                    <p><strong>ID Usuario:</strong> <?php echo e($carrito->id_usuario); ?></p>
                    <br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>


    <!--   Eliminar pedido  -->
    <h1>Eliminar Pedido</h1>
    <br>
    <form action="/admin/eliminarPedido" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="_method" value="POST">
                            <div class="form-group">
                                <input type="text" name="id2" class="form-control" placeholder="ID de pedido">
                            </div>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        <br>


  <?php if(session('message4')): ?>
    <div class="alert alert-success"><?php echo e(session('message4')); ?></div>
  <?php endif; ?>

  <?php if(session('message5')): ?>
    <div class="alert alert-success"><?php echo e(session('message5')); ?></div>
  <?php endif; ?>


<!-- -------------------------------------------------------------------------------------- -->


   <!-- Listado de productos -->
   <h1>Listado de productos</h1>
   <br>
        <div id="productos">
            <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><strong>ID:</strong> <?php echo e($producto->id_producto); ?></p>
                    <p><strong>Nombre:</strong> <?php echo e($producto->nombre); ?></p>
                    <p><strong>Precio:</strong> <?php echo e($producto->precio); ?></p>
                    <p><strong>Tipo:</strong> <?php echo e($producto->tipo); ?></p>
                    <p><strong>Descripción:</strong> <?php echo e($producto->descripcion); ?></p>
                    <br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    <!--   Eliminar producto  -->
    <h1>Eliminar Producto</h1>
    <br>
    <form action="/admin/eliminarProducto" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="_method" value="POST">
                            <div class="form-group">
                                <input type="text" name="id3" class="form-control" placeholder="ID de producto">
                            </div>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        <br>

  <?php if(session('message6')): ?>
    <div class="alert alert-success"><?php echo e(session('message6')); ?></div>
  <?php endif; ?>

  <?php if(session('message7')): ?>
    <div class="alert alert-success"><?php echo e(session('message7')); ?></div>
  <?php endif; ?>


        
    <!-- Añadir producto -->
    <h1>Añadir producto</h1>
    <br>
<form action="/admin/añadirProducto" method="POST">
   <?php echo csrf_field(); ?>
   <div class="form-group">
       <label for="nombre">Nombre</label>
       <input type="text" class="form-control" id="nombre" name="nombre" required>
   </div>
   <div class="form-group">
       <label for="precio">Precio</label>
       <input type="number" class="form-control" id="precio" name="precio" required>
   </div>
   <div class="form-group">
       <label for="tipo">Tipo</label>
       <select name="tipo" id="tipo">
         <option value="menu">Menu</option>
         <option value="principal">Principal</option>
         <option value="entrante">Entrante</option>
         <option value="bebida">Bebida</option>
         <option value="postre">Postre</option>
       </select><br>
   </div>
   <div class="form-group">
       <label for="descripcion">Descripcion</label>
       <input type="text" class="form-control" id="descripcion" name="descripcion" required>
   </div>
   <button type="submit" class="btn btn-primary">Añadir Pedido</button>
   
</form>
<br>

 <?php if(session('message8')): ?>
   <div class="alert alert-success"><?php echo e(session('message8')); ?></div>
 <?php endif; ?>


<!-- -------------------------------------------------------------------------------------- -->


   <!-- Listado de locales -->
   <h1>Listado de locales</h1>
   <br>
        <div id="locales">
            <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $local): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><strong>ID:</strong> <?php echo e($local->id_local); ?></p>
                    <p><strong>Ciudad:</strong> <?php echo e($local->ciudad); ?></p>
                    <p><strong>Dirección:</strong> <?php echo e($local->direccion); ?></p>
                    <br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>


    <!--   Eliminar local  -->
    <h1>Eliminar local</h1>
    <br>
    <form action="/admin/eliminarLocal" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="_method" value="POST">
                            <div class="form-group">
                                <input type="text" name="id4" class="form-control" placeholder="ID de local">
                            </div>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        <br>

    
  <?php if(session('message9')): ?>
    <div class="alert alert-success"><?php echo e(session('message9')); ?></div>
  <?php endif; ?>

  <?php if(session('message10')): ?>
    <div class="alert alert-success"><?php echo e(session('message10')); ?></div>
  <?php endif; ?>                        
        
    <!-- Añadir local -->
    <h1>Añadir local</h1>
    <br>
<form action="/admin/añadirLocal" method="POST">
   <?php echo csrf_field(); ?>
   <div class="form-group">
       <label for="ciudad">Ciudad</label>
       <input type="text" class="form-control" id="ciudad" name="ciudad" required>
   </div>
   <div class="form-group">
       <label for="direccion">Direccion</label>
       <input type="text" class="form-control" id="direccion" name="direccion" required>
   </div>
   <button type="submit" class="btn btn-primary">Añadir Local</button>
   
</form>
<br>
 <?php if(session('message11')): ?>
   <div class="alert alert-success"><?php echo e(session('message11')); ?></div>
 <?php endif; ?>


<!-- -------------------------------------------------------------------------------------- -->



   <!-- Listado de reservas -->
   <h1>Listado de reservas</h1>
   <br>
        <div id="reservas">
            <?php $__currentLoopData = $reservas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reserva): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><strong>ID:</strong> <?php echo e($reserva->id_reserva); ?></p>
                    <p><strong>Núm. personas:</strong> <?php echo e($reserva->num_personas); ?></p>
                    <p><strong>Fecha:</strong> <?php echo e($reserva->fecha); ?></p>
                    <p><strong>Hora:</strong> <?php echo e($reserva->hora); ?></p>
                    <p><strong>ID Usuario:</strong> <?php echo e($reserva->id_usuario); ?></p>
                    <br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>


    <!--   Eliminar reserva  -->
    <h1>Eliminar reserva</h1>
    <br>
    <form action="/admin/eliminarReserva" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="_method" value="POST">
                            <div class="form-group">
                                <input type="text" name="id5" class="form-control" placeholder="ID de reserva">
                            </div>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        <br>

  <?php if(session('message12')): ?>
    <div class="alert alert-success"><?php echo e(session('message12')); ?></div>
  <?php endif; ?>

  <?php if(session('message13')): ?>
    <div class="alert alert-success"><?php echo e(session('message13')); ?></div>
  <?php endif; ?>
        
    <!-- Añadir reserva -->
    <h1>Añadir reserva</h1>
    <br>
<form action="/admin/añadirReserva" method="POST">
   <?php echo csrf_field(); ?>
   <div class="form-group">
       <label for="num_personas">Numero de personas</label>
       <input type="text" class="form-control" id="num_personas" name="num_personas" required>
   </div>
   <div class="form-group">
       <label for="fecha">Fecha</label>
       <input type="date" class="form-control" id="fecha" name="fecha" required>
   </div>
   <div class="form-group">
       <label for="hora">Hora</label>
       <input type="time" class="form-control" id="hora" name="hora" required>
   </div>
   <div class="form-group">
       <label for="id_usuario">Id de usuario</label>
       <input type="text" class="form-control" id="id_usuario" name="id_usuario" required>
   </div>
   <div class="form-group">
       <label for="id_local">Id local</label>
       <input type="text" class="form-control" id="id_local" name="id_local" required>
   </div>
   <button type="submit" class="btn btn-primary">Añadir Reserva</button>
   
</form>
<br>

 <?php if(session('message14')): ?>
   <div class="alert alert-success"><?php echo e(session('message14')); ?></div>
 <?php endif; ?>

<!-- -------------------------------------------------------------------------------------- -->



<?php $__env->stopSection(); ?>
</head>
</body>
</html>   


<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\estre\Downloads\PW_Restaurante_Laravel\resources\views/admin/admin.blade.php ENDPATH**/ ?>