<?php

namespace App\Http\Controllers;

use App\Models\Agencia;
use App\Models\Estado;
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

    static function estado($codigo)
    {
        $data = Estado::where('codigo', $codigo)->get();
        foreach ($data as $item) {
            $estado = $item->descripcion;
        }
        return $estado;
    }

    static function agencia($codigo)
    {
        $data = Agencia::where('codigo', $codigo)->get();
        foreach ($data as $item) {
            $agencia = $item->descripcion;
        }
        return $agencia;
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

    static function actualizaContador($id, $valor)
    {
        $total =$valor + 1;
        DB::table('users')
                ->where('id', $id)
                ->update(['contador' => $total]);

    }

    static function userActivo($id)
    {
        DB::table('users')
                ->where('id', $id)
                ->update(['activo' => 1]);
    }

    static function userInactivo($id)
    {
        DB::table('users')
                ->where('id', $id)
                ->update([
                    'activo' => 0,
                    'ultima_conexion' => date('d-m-Y h:m:s a')
                ]);
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
        // dd($data);
        $count_r = Ot::where('statusOts', '1')->count();
        $count_a = Ot::where('statusOts', '2')->count();
        $count_e = Ot::where('statusOts', '3')->count();
        $count_f = Ot::where('statusOts', '5')->count();
        $pdf = Pdf::loadView('pdf.ots', compact('data', 'count_r', 'count_a', 'count_e', 'count_f'));
        return $pdf->stream('reporte_ots.pdf');

    }

    public function reporte_tickets()
    {
        $data = Tikect::all();
        $count_a = Tikect::where('status_tikect', '0')->count();
        $count_c = Tikect::where('status_tikect', '1')->count();
        $pdf = Pdf::loadView('pdf.tickets', compact('data', 'count_a', 'count_c'));
        return $pdf->stream('reporte_tickets.pdf');

    }

    static function get_nombre($email)
    {
        $data = User::where('email', $email)->get();
        foreach($data as $item){
            $nombre = $item->nombre;
            $apellido = $item->apellido;
        }
        $res = $nombre.' '.$apellido;
        return $res;
    }

}
