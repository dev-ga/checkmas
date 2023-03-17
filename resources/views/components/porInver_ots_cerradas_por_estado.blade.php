@php
namespace App\Http\Controllers;
use App\Models\Ot;
use Illuminate\Support\Facades\DB;

$totalOts = Ot::select(DB::raw("sum(costo_preCli) as total"))->where('tipoMantenimiento', 'MC')->where('statusOts', 5)->pluck('total');

$s = $item->

// dd($totalOts['0']);
// $valorTotal = Ot::all()->count();
// $porcenOts = UtilsController::porcentaje($cardValor, $valorTotal);
// $porcenOts = round($porcenOts, 2);
@endphp

<h5 class="mb-2 font-bold dark:text-white">%{{ $totalOts['0'] }}</h5>