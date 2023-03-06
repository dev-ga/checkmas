<?php

namespace App\Http\Livewire\View;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ListadoUsuarios extends Component
{
    public $buscar;

    public function updateStatusRegistro($id, $status)
    {
        $data = User::find($id);
        if($status == '0'){
            DB::table('users')
                ->where('id', $id)
                ->update(['status_registro' => 1]);
        }
        if($status == '1'){
            DB::table('users')
                ->where('id', $id)
                ->update(['status_registro' => 0]);
        }
    }

    public function render()
    {
        return view('livewire.view.listado-usuarios', [
            'data' => User::where('id', 'like', "%{$this->buscar}%")
                ->orWhere('nombre', 'like', "%{$this->buscar}%")
                ->orWhere('apellido', 'like', "%{$this->buscar}%")
                ->orWhere('ci_rif', 'like', "%{$this->buscar}%")
                ->orWhere('telefono', 'like', "%{$this->buscar}%")
                ->orWhere('email', 'like', "%{$this->buscar}%")
                ->orWhere('cargo', 'like', "%{$this->buscar}%")
                ->orWhere('status_registro', 'like', "%{$this->buscar}%")
                ->orderBy('id', 'desc')
                ->paginate(5)
        ]);
    }
}
