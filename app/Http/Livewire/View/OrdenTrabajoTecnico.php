<?php

namespace App\Http\Livewire\View;

use Livewire\Component;

class OrdenTrabajoTecnico extends Component
{

    public $ot_id;
    public $otUid_id;
    public $fechaEjecucion;
    public $tipoMantenimiento;
    public $limConden;
    public $limEva;
    public $lecAmpComp;
    public $lecPreAlta;
    public $lecPreBaja;
    public $observacionesMp;
    public $listaMateriales;
    public $fotoAntes;
    public $fotoDespues;
    public $observacionesMc;

    



    public function render()
    {
        return view('livewire.view.orden-trabajo-tecnico');
    }
}
