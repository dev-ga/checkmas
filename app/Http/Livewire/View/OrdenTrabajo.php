<?php

namespace App\Http\Livewire\View;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Ot;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class OrdenTrabajo extends Component
{

    use WithPagination;

    use WithFileUploads;

    public $otUid;
    public $fechaInicio;
    public $tecRespondable;
    public $equipoUid;
    public $tipoMantenimiento;
    public $owner;
    public $statusOts;
    

    public function datosTecRes(){
        $datos =User::where('email', $this->tecRespondable)->get();
        foreach($datos as $item){
            $nombre = $item->nombre;
            $apellido = $item->apellido;
        }
        $data = $nombre.' '.$apellido;
        return $data;

    }

    private function resetInputFields()
    {
        $this->fechaInicio = '';
        $this->tecRespondable = '';
        $this->equipoUid = '';
        $this->tipoMantenimiento = '';

    }

    /**
     * Reglas de validación para todos los campos del formulario
     */
    protected $rules = [

        'fechaInicio'       => 'required',
        'tecRespondable'    => 'required',
        'equipoUid'         => 'required',
        'tipoMantenimiento' => 'required',

    ];

    protected $messages = [

        'fechaInicio.required'          => 'Campo Requerido',
        'tecRespondable.required'       => 'Campo Requerido',
        'equipoUid.required'            => 'Campo Requerido',
        'tipoMantenimiento.required'    => 'Campo Requerido',
        

    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store(){
        
        $fecha = Carbon::createFromFormat('Y-m-d', $this->fechaInicio)->format('dmY');

        // dd($fecha->format('dmYhis'));
        $user = Auth::user();

        // $otUid = $fecha->format('dmYhis').'-'.$this->equipoUid.'-'.$this->tipoMantenimiento;
        // dd($otUid);

        $this->validate();

        $ot = new Ot();
        $ot->otUid = $fecha.'-'.$this->equipoUid.'-'.$this->tipoMantenimiento;
        $ot->fechaInicio = Carbon::createFromFormat('Y-m-d', $this->fechaInicio)->format('d-m-Y');
        $ot->tecRes_NomApe = $this->datosTecRes();
        $ot->tecRes_email = $this->tecRespondable;
        $ot->equipoUid = $this->equipoUid;
        $ot->tipoMantenimiento = $this->tipoMantenimiento;
        $ot->owner = $user->email;
        $ot->statusOts = '1';
        $ot->save();


    }

    

    public function render()
    {
        
        return view('livewire.view.orden-trabajo');
    }
}
