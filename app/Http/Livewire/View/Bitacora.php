<?php

namespace App\Http\Livewire\View;

use Livewire\Component;
use App\Models\Agencia;
use App\Models\Bitacora as ModelsBitacora;
use App\Models\Estado;
use App\Models\FichaTecnica;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Ot;
use App\Models\Tikect;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;

class Bitacora extends Component
{

    use Actions;

    use WithPagination;

    use WithFileUploads;

    public $tipo_fotos;
    public $atr_fotos;
    public $nro_ot;
    public $foto1_antes;
    public $foto2_antes;
    public $foto1_despues;
    public $foto2_despues;


    protected $listeners = [
        'selection'
    ];

    public function selection($value)
    {
        if($value == 'antes'){
            $data = DB::table('users')->select('foto1_antes', 'foto2_antes')->where('nro_ot', $this->nro_ot)->get();
            if($data != null){
                $this->notification()->error(
                    $title = 'NOTIFICACION!',
                    $description = 'La '
                );
            }
        }
        
        $this->atr_fotos = $value;
    }

    public function validateData()
    {
        if ($this->tipo_fotos == 'antes') {
            $this->validate([
                'nro_ot'        => 'required',
                'foto1_antes'   => 'required|file|mimes:jpg,jpeg,png|max:2048',
                'foto2_antes'   => 'required|file|mimes:jpg,jpeg,png|max:2048',
                'observaciones' => 'required',
            ]);
        }

        if ($this->tipo_fotos == 'despues') {
            $this->validate([
                'nro_ot'         => 'required',
                'foto1_despues'  => 'required|file|mimes:jpg,jpeg,png|max:2048',
                'foto2_despues'  => 'required|file|mimes:jpg,jpeg,png|max:2048',
                'observaciones'  => 'required',
            ]);
        }
    }

    protected $messages = [

        'nro_ot.required'      => 'Campo Requerido',
        'foto1_antes.mimes'    => 'El formato del archivo no esta permitido',
        'foto2_antes.mimes'    => 'El formato del archivo no esta permitido',
        'foto1_despues.mimes'  => 'El formato del archivo no esta permitido',
        'foto2_despues.mimes'  => 'El formato del archivo no esta permitido',

    ];

    public function store()
    {

        $this->validateData();

        try {

            $user = Auth::user()->email;

            $bitacora = new ModelsBitacora();

            if ($this->tipo_fotos == 'antes') {

                $bitacora->nro_ot = $this->nro_ot;
                $bitacora->tipo_fotos = $this->tipo_fotos;
                $bitacora->foto1_antes = $this->foto1_antes;
                $bitacora->foto2_antes = $this->foto2_antes;
                $bitacora->observaciones = $this->observaciones;
                $bitacora->tecnico = $this->$user;
                $bitacora->save();

                $this->reset();

                $this->notification()->success(
                    $title = 'ÉXITO!',
                    $description = 'La fotos fueron cargadas con exito'
                );
            }

            if ($this->tipo_fotos == 'despues') {

                $bitacora->nro_ot = $this->nro_ot;
                $bitacora->tipo_fotos = $this->tipo_fotos;
                $bitacora->foto1_despues = $this->foto1_despues;
                $bitacora->foto2_despues = $this->foto2_despues;
                $bitacora->observaciones = $this->observaciones;
                $bitacora->tecnico = $this->$user;
                $bitacora->save();

                $this->reset();

                $this->notification()->success(
                    $title = 'ÉXITO!',
                    $description = 'La fotos fueron cargadas con exito'
                );
            }
        } catch (\Throwable $th) {
            dd($th);
            $this->notification()->error(
                $title = 'ERROR!',
                $description = 'Function store() - livewire.bitacora'
            );
        }
    }

    public function render()
    {
        return view('livewire.view.bitacora');
    }
}
