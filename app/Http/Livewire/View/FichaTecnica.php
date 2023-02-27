<?php

namespace App\Http\Livewire\View;

use App\Models\FichaTecnica as ModelFichaTecnica;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;

class FichaTecnica extends Component
{

    use Actions;

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
    public $imgPlacaCompresor;
    public $tipoVentilador;
    public $imgEtiqVentilador;
    public $qrEvaporador;
    public $imgEvaporador;
    public $oficina;
    public $piso;
    public $agencia;
    public $estado;


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
                'imgPlacaCompresor'  => 'required|file|mimes:jpg,jpeg,png|max:2048',
                'tipoVentilador'  => 'required',
                'imgEtiqVentilador'  => 'required|file|mimes:jpg,jpeg,png|max:2048',
                'oficina'  => 'required',
                'piso'  => 'required',
                'agencia'  => 'required',
                'estado'  => 'required',
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
                'imgPlacaCompresor'  => 'required|file|mimes:jpg,jpeg,png|max:2048',
                'tipoVentilador'  => 'required',
                'imgEtiqVentilador'  => 'required|file|mimes:jpg,jpeg,png|max:2048',
                'qrEvaporador'  => 'required',
                'imgEvaporador'  => 'required|file|mimes:jpg,jpeg,png|max:2048',
                'oficina'  => 'required',
                'piso'  => 'required',
                'agencia'  => 'required',
                'estado'  => 'required',

            ]);
        }


    }

    private function resetInputFields()
    {
        $this->tipoConden = '';
        $this->voltaje = '';
        $this->phases = '';
        $this->tipoRefri = '';
        $this->btu = '';
        $this->tipoCompresor = '';
        $this->marcaCompresor = '';
        $this->ampCompresor = '';
        $this->imgPlacaCompresor = '';
        $this->tipoVentilador = '';
        $this->imgEtiqVentilador = '';
        $this->qrEvaporador = '';
        $this->imgEvaporador = '';
        $this->oficina = '';
        $this->piso = '';
        $this->agencia = '';
        $this->estado = '';
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
        'imgPlacaCompresor.required'    => 'Campo Requerido',
        'tipoVentilador.required'    => 'Campo Requerido',
        'imgEtiqVentilador.required'    => 'Campo Requerido',
        'qrEvaporador.required'      => 'Campo Requerido',
        'imgEvaporador.required'    => 'Campo Requerido',
        'oficina.required'    => 'Campo Requerido',
        'piso.required'    => 'Campo Requerido',
        'agencia.required'    => 'Campo Requerido',
        'estado.required'    => 'Campo Requerido',
    ];

    public function store(){

        try {
            
            $user = Auth::user();
        // $this->validateData();

        $fichaTecnica = new ModelFichaTecnica();

        if($this->tipoConden == 'compacto'){

            $this->validateData();

            $uidFt = DB::table('ficha_tecnicas')->latest("id")->first();

            if($uidFt == NULL){
                $fichaTecnica->uid = $this->agencia.'-'.$this->estado.'-1';

            }else{
                $tercerTer = $uidFt->id * 10;
                $fichaTecnica->uid = $this->agencia.'-'.$this->estado.'-'.$tercerTer;
            }

            $fichaTecnica->qrConden = $this->qrConden;
            $fichaTecnica->tipoConden = $this->tipoConden;
            $fichaTecnica->voltaje = $this->voltaje;
            $fichaTecnica->phases = $this->phases;
            $fichaTecnica->tipoRefri = $this->tipoRefri;
            $fichaTecnica->btu = $this->btu;
            $fichaTecnica->tipoCompresor = $this->tipoCompresor;
            $fichaTecnica->marcaCompresor = $this->marcaCompresor;
            $fichaTecnica->ampCompresor = $this->ampCompresor;
            $fichaTecnica->imgPlacaCompresor = $this->imgPlacaCompresor;
            $fichaTecnica->tipoVentilador = $this->tipoVentilador;
            $fichaTecnica->imgEtiqVentilador = $this->imgEtiqVentilador;
            $fichaTecnica->oficina = $this->oficina;
            $fichaTecnica->piso = $this->piso;
            $fichaTecnica->agencia = $this->agencia;
            $fichaTecnica->estado = $this->estado;
            $fichaTecnica->save();

        }

        if($this->tipoConden != 'compacto'){

            $this->validateData();

            $uidFt = DB::table('ficha_tecnicas')->latest("id")->first();

            if($uidFt == NULL){
                $fichaTecnica->uid = $this->agencia.'-'.$this->estado.'-1';

            }else{
                $tercerTer = $uidFt->id * 10;
                $fichaTecnica->uid = $this->agencia.'-'.$this->estado.'-'.$tercerTer;
            }

            $fichaTecnica->qrConden = $this->qrConden;
            $fichaTecnica->tipoConden = $this->tipoConden;
            $fichaTecnica->voltaje = $this->voltaje;
            $fichaTecnica->phases = $this->phases;
            $fichaTecnica->tipoRefri = $this->tipoRefri;
            $fichaTecnica->btu = $this->btu;
            $fichaTecnica->tipoCompresor = $this->tipoCompresor;
            $fichaTecnica->marcaCompresor = $this->marcaCompresor;
            $fichaTecnica->ampCompresor = $this->ampCompresor;
            $fichaTecnica->imgPlacaCompresor = $this->imgPlacaCompresor;
            $fichaTecnica->tipoVentilador = $this->tipoVentilador;
            $fichaTecnica->imgEtiqVentilador = $this->imgEtiqVentilador;
            $fichaTecnica->qrEvaporador = $this->qrEvaporador;
            $fichaTecnica->imgEvaporador = $this->imgEvaporador;
            $fichaTecnica->oficina = $this->oficina;
            $fichaTecnica->piso = $this->piso;
            $fichaTecnica->agencia = $this->agencia;
            $fichaTecnica->estado = $this->estado;
            $fichaTecnica->save();

        }

            $this->resetInputFields();

            $this->notification()->success(
                $title = 'EXITO!',
                $description = 'La ficha técnica fue registrada con éxito'
            );

        } catch (\Throwable $th) {
            $this->notification()->error(
                $title = 'ERROR!',
                $description = 'Function store() - livewire.ficha-tecnica'
            );
        }

        


    }

















    public function render()
    {
        return view('livewire.view.ficha-tecnica');
    }
}
