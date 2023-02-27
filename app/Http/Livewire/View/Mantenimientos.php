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
    public $atr = 'text-gray-400';

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
            DB::table('ots')
                ->where('id', $id)
                ->update(['statusOts' => 5]);
        }

    }


    public function render()
    {
        $user = Auth::user();
        $tecEmail = $user->email;

        if($user->rol != '7'){
            return view('livewire.view.mantenimientos', [
                'data' => Ot::orderBy('created_at', 'desc')
                    ->Where('otUid', 'like', "%{$this->buscar}%")
                    ->paginate(5)
            ]);

        }else{
            return view('livewire.view.mantenimientos', [
                'data' => Ot::where('tecRespondable', $tecEmail)
                    ->Where('otUid', 'like', "%{$this->buscar}%")
                    ->paginate(5)
            ]);

        }
  
    }
}
