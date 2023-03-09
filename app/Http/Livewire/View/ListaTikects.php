<?php

namespace App\Http\Livewire\View;

use App\Models\Tikect;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use WireUi\Traits\Actions;

class ListaTikects extends Component
{
    use Actions;

    public $buscar;

    public function updateStatusTikect($id, $btr){

        try {

            $data = Tikect::find($id)->status_tikect;

            if ($data == '0' && $btr == '1') {
                DB::table('tikects')
                    ->where('id', $id)
                    ->update(['status_tikect' => 1]);
            }
            if ($data == '1' && $btr == '2') {
                DB::table('tikects')
                    ->where('id', $id)
                    ->update(['status_tikect' => 2]);
            }

        } catch (\Throwable $th) {
            dd($th);
        }
        

    }

    public function CrearOt($id)
    {
        $this->emit('showFormOts', $id);
        
    }

    public function render()
    {
        return view('livewire.view.lista-tikects', [
            'data' => Tikect::where('id', 'like', "%{$this->buscar}%")
                ->orWhere('tikect_uid', 'like', "%{$this->buscar}%")
                ->orWhere('tipoServicio', 'like', "%{$this->buscar}%")
                ->orWhere('oficina', 'like', "%{$this->buscar}%")
                ->orWhere('piso', 'like', "%{$this->buscar}%")
                ->orWhere('estado', 'like', "%{$this->buscar}%")
                ->orWhere('agencia', 'like', "%{$this->buscar}%")
                ->orWhere('observaciones', 'like', "%{$this->buscar}%")
                ->orWhere('owner', 'like', "%{$this->buscar}%")
                ->orWhere('owner_email', 'like', "%{$this->buscar}%")
                ->orWhere('status_tikect', 'like', "%{$this->buscar}%")
                ->orderBy('id', 'desc')
                ->paginate(5)
        ]);
    }
}
