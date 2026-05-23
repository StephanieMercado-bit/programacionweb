<div wire:poll.5s class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Panel de Cocina (En vivo)</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @forelse($pedidos as $pedido)
            <div class="border p-4 rounded shadow-md {{ $pedido->estado == 'en_preparacion' ? 'bg-yellow-100' : 'bg-white' }}">
                <div class="flex justify-between border-b pb-2 mb-2">
                    <span class="font-bold text-lg">Pedido #{{ substr($pedido->id_pedido, 0, 8) }}</span>
                    <span class="px-2 py-1 text-xs rounded text-white {{ $pedido->estado == 'en_preparacion' ? 'bg-yellow-500' : 'bg-red-500' }}">
                        {{ strtoupper(str_replace('_', ' ', $pedido->estado)) }}
                    </span>
                </div>

                <ul class="mb-4">
                    {{-- Recorremos los productos usando la relación pivot de tu base de datos --}}
                    @foreach($pedido->producto as $item)
                        <li class="flex justify-between">
                            <span>{{ $item->pivot->cantidad }}x {{ $item->nombre }}</span>
                        </li>
                    @endforeach
                </ul>

                <div class="flex justify-end mt-4">
                    @if($pedido->estado == 'pendiente')
                        <button wire:click="cambiarEstado('{{ $pedido->id_pedido }}', 'en_preparacion')" 
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Empezar a Preparar
                        </button>
                    @elseif($pedido->estado == 'en_preparacion')
                        <button wire:click="cambiarEstado('{{ $pedido->id_pedido }}', 'lista')" 
                                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                            Marcar como Lista
                        </button>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-500 p-8">
                No hay pedidos pendientes en este momento. Buen trabajo.
            </div>
        @endforelse
    </div>
</div>
