<?php

namespace App\Http\Livewire\View;

use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MantenimientosCulminados extends Component
{
    public function render()
    {
        return view('livewire.view.mantenimientos-culminados',  [
            'data' => Bitacora::orderBy('id', 'desc')->paginate(2)
        ]);
    }
}
