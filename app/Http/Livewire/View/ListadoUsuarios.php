<?php

namespace App\Http\Livewire\View;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ListadoUsuarios extends Component
{

    use WithPagination;

    public $buscar;

    public function updateStatusRegistro($id, $status)
    {
        $data = User::find($id)->status_registro;
        if($data == '0' && $status == '1'){
            DB::table('users')
                ->where('id', $id)
                ->update(['status_registro' => 1]);
        }
        if($data == '1' && $status == '2'){
            DB::table('users')
                ->where('id', $id)
                ->update(['status_registro' => 2]);
        }
        if($data == '2' && $status == '3'){
            DB::table('users')
                ->where('id', $id)
                ->update(['status_registro' => 1]);
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
                ->orWhere('empresa', 'like', "%{$this->buscar}%")
                ->orderBy('id', 'desc')
                ->paginate(5)
        ]);
    }
}
