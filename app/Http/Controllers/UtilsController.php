<?php

namespace App\Http\Controllers;

use App\Models\Ot;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UtilsController extends Controller
{
    static function porcentaje($cardValor, $valorTotal)
    {
        $porcen = ($cardValor * 100) / $valorTotal;
        return $porcen;
    }

    static function suma()
    {
        $date = date('Y-m-d');
        $inver = Ot::where('statusOts', '5')
                    ->where('updated_at', '<', '2023-03-14')
                    ->sum('costo_preCli');
        return $inver;

    }
}
