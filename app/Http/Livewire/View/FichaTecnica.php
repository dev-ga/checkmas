<?php

namespace App\Http\Livewire\View;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class FichaTecnica extends Component
{

    use WithPagination;

    use WithFileUploads;

    public $qrConden;
    public $tipoConden;
    public $voltaje;
    public $phases;
    public $tipoRefri;
    public $btu;
    public $tipoCompresor;
    public $marcaCompresor;
    public $ampCompresor;
    public $placaCompresor;
    public $tipoVentilador;
    public $etiqVentilador;
    public $qrEvaporador;
    public $fotoEvaporador;
    public $oficina;
    public $piso;
    public $agencia;
    public $estado;
    public $model;


    public $atr = '';
    public $label = '';

    protected $listeners = [
        'selection'
    ];

    public function selection($value){
        if($value == 'compacto'){
            $this->atr = 'hidden';
        }

        if($value != 'compacto'){
            $this->atr = '';
            $this->label = $value;
        }
    }

    public function validateData()
    {
        if($this->tipoConden == 'compacto'){
            $this->validate([
                'qrConden'  => 'required',
                'tipoConden'  => 'required',
                'voltaje'  => 'required',
                'phases'  => 'required',
                'tipoRefri'  => 'required',
                'btu'  => 'required',
                'tipoCompresor'  => 'required',
                'marcaCompresor'  => 'required',
                'ampCompresor'  => 'required',
                'placaCompresor'  => 'required',
                'tipoVentilador'  => 'required',
                'etiqVentilador'  => 'required',
            ]);
        }

        if($this->tipoConden != 'compacto'){
            $this->validate([
                'qrConden'  => 'required',
                'tipoConden'  => 'required',
                'voltaje'  => 'required',
                'phases'  => 'required',
                'tipoRefri'  => 'required',
                'btu'  => 'required',
                'tipoCompresor'  => 'required',
                'marcaCompresor'  => 'required',
                'ampCompresor'  => 'required',
                'placaCompresor'  => 'required',
                'tipoVentilador'  => 'required',
                'etiqVentilador'  => 'required',
                'qrEvaporador'  => 'required',
                'fotoEvaporador'  => 'required',

            ]);
        }


    }

    protected $messages = [

        'qrConden.required'          => 'Campo Requerido',
        'tipoConden.required'        => 'Campo Requerido',
        'voltaje.required'           => 'Campo Requerido',
        'phases.required'            => 'Campo Requerido',
        'tipoRefri.required'         => 'Campo Requerido',
        'btu.required'               => 'Campo Requerido',
        'tipoCompresor.required'     => 'Campo Requerido',
        'marcaCompresor.required'    => 'Campo Requerido',
        'ampCompresor.required'      => 'Campo Requerido',
        'placaCompresor.required'    => 'Campo Requerido',
        'tipoVentilador.required'    => 'Campo Requerido',
        'etiqVentilador.required'    => 'Campo Requerido',
        'qrEvaporador.required'      => 'Campo Requerido',
        'fotoEvaporador.required'    => 'Campo Requerido',
    ];

    public function store(){
        
        $this->validateData();
    }

















    public function render()
    {
        return view('livewire.view.ficha-tecnica');
    }
}
