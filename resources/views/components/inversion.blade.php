@php
namespace App\Http\Controllers;
use App\Models\Ot;
$inverOts = UtilsController::suma();
$inverOts = round($inverOts, 2);
$inverOts = number_format($inverOts, 2, ',', '.');
@endphp

<h5 class="mb-2 font-bold dark:text-white">${{ $inverOts }}</h5>