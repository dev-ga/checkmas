<?php

namespace App\Http\Controllers;

use App\Models\Agencia;
use App\Models\Estado;
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
                    ->where('updated_at', '<', $date)
                    ->where('tipoMantenimiento', 'MC')
                    ->sum('costo_preCli');
        return $inver;

    }

    static function porcenInverPorEstado($total_estado)
    {
        $totalOts = Ot::select(DB::raw("sum(costo_preCli) as total"))->where('tipoMantenimiento', 'MC')->where('statusOts', 5)->pluck('total');
       
        $valor = ($total_estado * 100) / $totalOts['0'];
        
        return number_format($valor, 2, ',', '.');

    }

    static function estado($codigo)
    {
        $estado = Estado::where('codigo', $codigo)->get();
        foreach ($estado as $item) {
            $value = $item->descripcion;
        }
        return $value;

    }

    static function agencia($codigo)
    {
        $agencia = Agencia::where('codigo', $codigo)->get();
        foreach ($agencia as $item) {
            $value = $item->descripcion;
        }
        return $value;
        

    }








}
