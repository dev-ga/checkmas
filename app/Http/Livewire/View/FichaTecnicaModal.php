<?php

namespace App\Http\Livewire\View;

use App\Models\Agencia;
use App\Models\Estado;
use App\Models\FichaTecnica;
use Livewire\Component;

class FichaTecnicaModal extends Component
{
    public $atr_showModal = 'hidden';
    public $agencia;
    public $estado;
    public $oficina;
    public $piso;
    public $btu;
    public $tipoSistema;
    public $qrConden;
    public $qrEvaporador;

    protected $listeners = [
        'showFichaModal'
    ];

    public function closeModal(){
        $this->atr_showModal = 'hidden';
    }

    public function showFichaModal($equipoUid){

        $this->atr_showModal = '';

        $data = FichaTecnica::where('uid', $equipoUid)->get();

        foreach($data as $item){
            $agencia = $item->agencia;
            $estado = $item->estado;
            $oficina = $item->oficina;
            $piso = $item->piso;
            $btu = $item->btu;
            $tipoSistema = $item->tipoConden;
            $qrConden = $item->qrConden;
            $qrEvaporador = $item->qrEvaporador;

        }

        $edo = Estado::where('codigo', $estado)->get();

        foreach($edo as $item){
            $estadoDef = $item->descripcion;
    
        }

        $age = Agencia::where('codigo', $agencia)->get();
        foreach($age as $item){
            $agenciaDef = $item->descripcion;
    
        }

        $this->agencia = $agenciaDef;
        $this->estado = $estadoDef;
        $this->oficina = $oficina;
        $this->piso = $piso;
        $this->btu = $btu;
        $this->tipoSistema = $tipoSistema;
        $this->qrConden = $qrConden;
        $this->qrEvaporador = $qrEvaporador;

        



        // $this->atr_showModal = '';
        // dd(json_decode($data), $equipoUid);

    }

    public function render()
    {
        return view('livewire.view.ficha-tecnica-modal');
    }
}
