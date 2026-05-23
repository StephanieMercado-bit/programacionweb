<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pedido;

class CocinaPanel extends Component
{
    public function cambiarEstado($id_pedido, $nuevoEstado)
    {
        $pedido = Pedido::findOrFail($id_pedido);
        $pedido->estado = $nuevoEstado;
        $pedido->save();
    }

   public function render()
    {
        // Obtenemos los pedidos que no estén listos, ordenados por los más antiguos primero
        $pedidos = Pedido::with('producto')
            ->whereIn('estado', ['pendiente', 'en_preparacion'])
            ->get();

        // Quitamos la flecha de layout, Livewire usará el layout por defecto automáticamente
        return view('livewire.cocina-panel', compact('pedidos'));
    }
}
