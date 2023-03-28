@php
namespace App\Http\Controllers;
use App\Models\Ot;
$inverOts = UtilsController::suma();
$inverOts = round($inverOts, 2);
$inverOts = number_format($inverOts, 2, ',', '.');
@endphp

<span class="font-semibold text-xl text-blueGray-700">${{ $inverOts }}</span>