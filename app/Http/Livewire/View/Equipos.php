<?php

namespace App\Http\Livewire\View;

use App\Models\FichaTecnica;
use Livewire\Component;
use Livewire\WithPagination;

class Equipos extends Component
{
    use WithPagination;

    public $buscar;
    
    public function render()
    {
        return view('livewire.view.equipos', [
            'data' => FichaTecnica::where('uid', 'like', "%{$this->buscar}%")
                ->orWhere('tipoConden', 'like', "%{$this->buscar}%")
                ->orWhere('phases', 'like', "%{$this->buscar}%")
                ->orWhere('voltaje', 'like', "%{$this->buscar}%")
                ->orWhere('tipoRefri', 'like', "%{$this->buscar}%")
                ->orWhere('btu', 'like', "%{$this->buscar}%")
                ->orWhere('tipoCompresor', 'like', "%{$this->buscar}%")
                ->orWhere('marcaCompresor', 'like', "%{$this->buscar}%")
                ->orWhere('ampCompresor', 'like', "%{$this->buscar}%")
                ->orderBy('id', 'desc')
                ->paginate(5)
        ]);
    }
}
