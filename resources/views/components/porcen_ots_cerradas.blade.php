@php
namespace App\Http\Controllers;
use App\Models\Ot;

$cardValor = Ot::where('statusOts', 5)->where('tipoMantenimiento', 'MC')->count();
$valorTotal = Ot::all()->count();
$porcenOts = UtilsController::porcentaje($cardValor, $valorTotal);
$porcenOts = round($porcenOts, 2);
@endphp

<h5 class="mb-2 font-bold dark:text-white">{{ $porcenOts }}%</h5>