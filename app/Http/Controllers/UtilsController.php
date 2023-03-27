<?php

namespace App\Http\Controllers;

use App\Models\Ot;
use App\Models\Tikect;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
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

    public function reporte_users()
    {
        $data = User::all();
        $count = User::all()->count();

        $pdf = Pdf::loadView('pdf.users', compact('data', 'count'));
        return $pdf->stream('reporte_usuarios.pdf');

    }

    public function reporte_ots()
    {
        $data = Ot::all();
        $count_r = Ot::where('statusOts', '1')->count();
        $count_e = Ot::where('statusOts', '3')->count();
        $count_f = Ot::where('statusOts', '5')->count();
        $pdf = Pdf::loadView('pdf.ots', compact('data', 'count_r', 'count_e', 'count_f'));
        return $pdf->stream('reporte_ots.pdf');

    }

    public function reporte_tickect()
    {
        $data = Tikect::all();
        $pdf = Pdf::loadView('pdf.tikects', compact('data'));
        return $pdf->stream('reporte_usuarios.pdf');

    }
}
