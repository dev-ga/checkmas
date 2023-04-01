<?php

namespace App\Http\Livewire\View;

use App\Models\Ot;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use WireUi\Traits\Actions;

class Mantenimientos extends Component
{

    use Actions;

    use WithPagination;

    public $buscar;
    public $atr = 'text-gray-400';
    public $campo = 'created_at';
    public $orden = 'desc';
    public $atr_form = 'hidden';
    public $atr_table;
    public $nro_ot;
    public $observaciones;

    public function showFicha($id, $equipoUid)
    {
        $this->emit('showFichaModal', $equipoUid);
        // dd($id, $equipoUid);
    }

    public function ePrint($id)
    {
        return redirect()->to('/printOt/'.$id);
        
    }

    public function updateStatusAdmin($id, $btr){
        $data = ot::find($id)->statusOts;

        if($data == '1' && $btr == '2'){
            DB::table('ots')
                ->where('id', $id)
                ->update(['statusOts' => 2]);
        }

    }

    public function updateStatusSupervisor($id, $btr){
        $data = ot::find($id)->statusOts;

        if($data == '2' && $btr == '3'){
            DB::table('ots')
                ->where('id', $id)
                ->update(['statusOts' => 3]);
            $this->atr = 'text-green-700';
        }
        if($data == '3' && $btr == '4'){
            DB::table('ots')
                ->where('id', $id)
                ->update(['statusOts' => 4]);
        }
        if($data == '4' && $btr == '5'){
            $this->nro_ot = Ot::find($id)->otUid;
            $this->atr_form = '';
            $this->atr_table = 'hidden';
        }

    }

    public function validateData()
    {
        $this->validate([
            'nro_ot'        => 'required',
            'observaciones' => 'required',
        ]);
    }

    protected $messages = [

        'nro_ot.required'           => 'Campo Requerido',
        'observaciones.required'    => 'Campo requerido',

    ];


    public function actualiza_estatus()
    {

        $this->validateData();

        try {

            DB::table('ots')
                ->where('otUid', $this->nro_ot)
                ->update([
                    'statusOts' => 5,
                    'fecha_fin' => date('d-m-Y'),
                    'observaciones' => $this->observaciones,
                ]);

                $this->reset();

                $this->notification()->success(
                    $title = 'ÉXITO!',
                    $description = 'La orden de trabajo fue finalizada con éxito'
                );

        } catch (\Throwable $th) {
            dd($th);
            $this->notification()->error(
                $title = 'ERROR!',
                $description = 'Function actualiza_estatus() - livewire.mantenimientos'
            );
        }
    }



    public function render()
    {
        $user = Auth::user();
        $tecEmail = $user->email;

        if($user->rol == '7'){
            return view('livewire.view.mantenimientos', [
                'data' => Ot::orderBy($this->campo, $this->orden)
                    ->Where('otUid', 'like', "%{$this->buscar}%")
                    ->paginate(5)
            ]);

        }else{
            return view('livewire.view.mantenimientos', [
                'data' => Ot::where('tecRes_email', $tecEmail)
                    ->Where('statusOts', '3')
                    ->Where('otUid', 'like', "%{$this->buscar}%")
                    ->paginate(5)
            ]);

        }
  
    }
}
