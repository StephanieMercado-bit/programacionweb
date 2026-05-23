<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;

class HistorialPedidos extends Component
{
    public function render()
    {
        // Obtenemos solo los pedidos del usuario conectado
        $pedidos = Pedido::with('producto')
            ->where('id_usuario', Auth::id())
            ->get();

        // Retornamos la vista directamente
        return view('livewire.historial-pedidos', compact('pedidos'));
    }
}
