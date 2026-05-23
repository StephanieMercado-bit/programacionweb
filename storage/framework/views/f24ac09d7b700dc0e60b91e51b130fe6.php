<div wire:poll.5s class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Panel de Cocina (En vivo)</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php $__empty_1 = true; $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="border p-4 rounded shadow-md <?php echo e($pedido->estado == 'en_preparacion' ? 'bg-yellow-100' : 'bg-white'); ?>">
                <div class="flex justify-between border-b pb-2 mb-2">
                    <span class="font-bold text-lg">Pedido #<?php echo e(substr($pedido->id_pedido, 0, 8)); ?></span>
                    <span class="px-2 py-1 text-xs rounded text-white <?php echo e($pedido->estado == 'en_preparacion' ? 'bg-yellow-500' : 'bg-red-500'); ?>">
                        <?php echo e(strtoupper(str_replace('_', ' ', $pedido->estado))); ?>

                    </span>
                </div>

                <ul class="mb-4">
                    
                    <?php $__currentLoopData = $pedido->producto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="flex justify-between">
                            <span><?php echo e($item->pivot->cantidad); ?>x <?php echo e($item->nombre); ?></span>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>

                <div class="flex justify-end mt-4">
                    <?php if($pedido->estado == 'pendiente'): ?>
                        <button wire:click="cambiarEstado('<?php echo e($pedido->id_pedido); ?>', 'en_preparacion')" 
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Empezar a Preparar
                        </button>
                    <?php elseif($pedido->estado == 'en_preparacion'): ?>
                        <button wire:click="cambiarEstado('<?php echo e($pedido->id_pedido); ?>', 'lista')" 
                                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                            Marcar como Lista
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-full text-center text-gray-500 p-8">
                No hay pedidos pendientes en este momento. Buen trabajo.
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\Users\estre\Downloads\PW_Restaurante_Laravel\resources\views/livewire/cocina-panel.blade.php ENDPATH**/ ?>