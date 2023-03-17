<?php

namespace App\Http\Livewire\View;

use App\Models\Agencia;
use App\Models\Estado;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Tikect as ModelTikect;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class CrearTikect extends Component
{

    use Actions;

    use WithPagination;

    use WithFileUploads;


    public $tikect_uid;
    public $tipoServicio;
    public $oficina;
    public $piso;
    public $estado;
    public $agencia;
    public $observaciones;
    public $owner;
    public $owner_email;
    public $status_tikect;


    protected $rules = [
        'tipoServicio'    => 'required',
        'oficina'         => 'required',
        'piso'            => 'required',
        'estado'          => 'required',
        'agencia'         => 'required',
        'observaciones'   => 'required',

    ];

    protected $messages = [
        'tipoServicio.required' => 'Campo Requerido',
        'oficina.required'      => 'Campo Requerido',
        'piso.required'         => 'Campo Requerido',
        'estado.required'       => 'Campo Requerido',
        'agencia.required'      => 'Campo Requerido',
        'observaciones.required' => 'Campo Requerido',

    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();

        try {

            $user = Auth::user();

            $desEstado = Estado::where('codigo', $this->estado)->get();
            foreach ($desEstado as $item) {
                $estadoDes = $item->descripcion;
                $color = $item->color;

            }

            $desAgencia = Agencia::where('codigo', $this->agencia)->get();
            foreach ($desAgencia as $item) {
                $agenciaDes = $item->descripcion;

            }

            /**
             * Owner tikect
             */
            $owner = $user->nombre . ' ' . $user->apellido;
            $owner_email = $user->email;

            $creaTikect = new ModelTikect();

            /**
             * Logica para formar el
             * correlativo del tikect
             */
            $uid = DB::table('tikects')->latest("id")->first();

                if ($uid == NULL) {
                    $creaTikect->tikect_uid = $this->agencia . '-' . $this->estado . '-1';
                } else {
                    $tercerTer = $uid->id + 1;
                    $creaTikect->tikect_uid = $this->agencia . '-' . $this->estado . '-' . $tercerTer;
                }

            $creaTikect->tipoServicio   = $this->tipoServicio;
            $creaTikect->piso           = $this->piso;
            $creaTikect->oficina        = $this->oficina;
            $creaTikect->agencia        = $agenciaDes;
            $creaTikect->estado         = $estadoDes;
            $creaTikect->color          = $color;
            $creaTikect->observaciones  = $this->observaciones;
            $creaTikect->owner          = $owner;
            $creaTikect->owner_email    = $owner_email;
            /**
             * Status Tikect
             * 0 -> registrado
             * 1 -> aprobado
             * 2 -> anulado
             */
            $creaTikect->status_tikect  = '0';
            $creaTikect->save();

            $this->reset();

            $this->notification()->success(
                $title = 'ÉXITO!',
                $description = 'La Tikect fue registrado con éxito'
            );

            $this->emitTo('lista-tikects','refreshComponent');

        } catch (\Throwable $th) {
            dd($th);
            $this->notification()->error(
                $title = 'ERROR!',
                $description = 'Se ha producido un error al intentar guardar el Tikect.'
            );
        }
    }


    public function render()
    {
        return view('livewire.view.crear-tikect');
    }
}
