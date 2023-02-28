<?php

namespace App\Http\Livewire\View;

use App\Models\FichaTecnica;
use Livewire\Component;

class FichaTecnicaModal extends Component
{
    public $atr_showModal = 'hidden';

    protected $listeners = [
        'showFichaModal'
    ];

    public function showFichaModal($equipoUid){
        $data = FichaTecnica::where('uid', $equipoUid)->get();
        // $this->atr_showModal = '';
        dd(json_decode($data), $equipoUid);

    }

    public function render()
    {
        return view('livewire.view.ficha-tecnica-modal');
    }
}
