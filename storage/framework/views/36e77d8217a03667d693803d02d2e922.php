<div wire:poll.5s class="max-w-5xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8 border-b pb-4">Mis Pedidos 🍔</h2>

    <div class="space-y-6">
        <?php $__empty_1 = true; $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 p-6 overflow-hidden relative">
                
                <!-- Encabezado del Pedido -->
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <span class="text-sm text-gray-500 dark:text-gray-400 font-semibold">Orden #</span>
                        <span class="text-lg font-bold text-gray-900 dark:text-white"><?php echo e(strtoupper(substr($pedido->id_pedido, 0, 8))); ?></span>
                    </div>
                    <div class="text-right">
                        <span class="text-xl font-black text-red-600 dark:text-red-400">$<?php echo e($pedido->total_precio); ?></span>
                    </div>
                </div>

                <!-- Barra de Progreso Visual -->
                <div class="mb-6 bg-gray-100 dark:bg-gray-700 rounded-full h-3">
                    <?php if($pedido->estado == 'pendiente'): ?>
                        <div class="bg-gray-400 h-3 rounded-full w-1/3 transition-all duration-500"></div>
                    <?php elseif($pedido->estado == 'en_preparacion'): ?>
                        <div class="bg-yellow-500 h-3 rounded-full w-2/3 transition-all duration-500 animate-pulse"></div>
                    <?php elseif($pedido->estado == 'lista'): ?>
                        <div class="bg-green-500 h-3 rounded-full w-full transition-all duration-500 shadow-[0_0_10px_rgba(34,197,94,0.8)]"></div>
                    <?php endif; ?>
                </div>

                <!-- Estado en Texto -->
                <div class="flex justify-between items-center mb-6">
                    <span class="font-bold <?php echo e($pedido->estado == 'pendiente' ? 'text-gray-600 dark:text-gray-300' : 'text-gray-400'); ?>">⏳ Recibido</span>
                    <span class="font-bold <?php echo e($pedido->estado == 'en_preparacion' ? 'text-yellow-600 dark:text-yellow-400' : 'text-gray-400'); ?>">🍳 Preparando</span>
                    <span class="font-bold <?php echo e($pedido->estado == 'lista' ? 'text-green-600 dark:text-green-400 text-lg animate-bounce' : 'text-gray-400'); ?>">✅ ¡Listo!</span>
                </div>

                <!-- Lista de Productos -->
                <div class="border-t border-gray-100 dark:border-gray-700 pt-4">
                    <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-2">
                        <?php $__currentLoopData = $pedido->producto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="flex justify-between">
                                <span><?php echo e($item->pivot->cantidad); ?>x <?php echo e($item->nombre); ?></span>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                
                <!-- Capa Verde Brillante si está listo -->
                <?php if($pedido->estado == 'lista'): ?>
                    <div class="absolute top-0 right-0 p-2">
                        <span class="flex h-3 w-3">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                        </span>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow text-center p-12">
                <p class="text-gray-500 dark:text-gray-400 text-lg">Aún no has realizado ningún pedido. ¡Elige algo delicioso del menú!</p>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\Users\estre\Downloads\PW_Restaurante_Laravel\resources\views/livewire/historial-pedidos.blade.php ENDPATH**/ ?>