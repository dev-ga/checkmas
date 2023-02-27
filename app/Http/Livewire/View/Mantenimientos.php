<?php

namespace App\Http\Livewire\View;

use App\Models\Ot;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Mantenimientos extends Component
{

    use WithPagination;

    public $buscar;


    public function render()
    {
        $user = Auth::user();
        $tecEmail = $user->email;

        return view('livewire.view.mantenimientos', [
            'data' => Ot::where('tecRespondable', $tecEmail)
                ->Where('otUid', 'like', "%{$this->buscar}%")
                ->paginate(5)
        ]);
    }
}
