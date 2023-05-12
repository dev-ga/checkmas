<?php

namespace App\Http\Controllers;

use App\Models\Agencia;
use App\Models\Estadistica;
use App\Models\Estado;
use App\Models\FichaTecnica;
use App\Models\Ot;
use App\Models\Tikect;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;

class UtilsController extends Controller
{
    static function porcentaje($cardValor, $valorTotal)
    {
        $porcen = ($cardValor * 100) / $valorTotal;
        return $porcen;
    }

    static function estado($codigo)
    {
        try {
            $data = Estado::where('codigo', $codigo)->get();
            foreach ($data as $item) {
                $estado = $item->descripcion;
            }
            return $estado;
        } catch (\Throwable $th) {
            Log::error('- Class UtilsControllers - Se ha producido un error al ejecutar la funcion.'.$th->getMessage());
        }
    }

    static function agencia($codigo)
    {
        try {
            $data = Agencia::where('codigo', $codigo)->get();
            foreach ($data as $item) {
                $agencia = $item->descripcion;
            }
            return $agencia;
        } catch (\Throwable $th) {
            Log::error('- Class UtilsControllers - Se ha producido un error al ejecutar la funcion.'.$th->getMessage());
        }
    }

    static function suma()
    {
        $date = date('Y-m-d');

        try {

            $inver = Ot::where('statusOts', '5')
                ->where('updated_at', '<', $date)
                ->where('tipoMantenimiento', 'MC')
                ->sum('costo_preCli');
            return $inver;
        } catch (\Throwable $th) {
            Log::error('- Class UtilsControllers - Se ha producido un error al ejecutar la funcion.'.$th->getMessage());
        }
    }

    static function actualizaContador($id, $valor)
    {
        $total = $valor + 1;
        try {

            DB::table('users')
                ->where('id', $id)
                ->update(['contador' => $total]);
        } catch (\Throwable $th) {
            Log::error('- Class UtilsControllers - Se ha producido un error al ejecutar la funcion.'.$th->getMessage());
        }
    }

    static function userActivo($id)
    {
        try {

            DB::table('users')
                ->where('id', $id)
                ->update(['activo' => 1]);
        } catch (\Throwable $th) {
            Log::error('- Class UtilsControllers - Se ha producido un error al ejecutar la funcion.'.$th->getMessage());
        }
    }

    static function userInactivo($id)
    {
        try {
            DB::table('users')
                ->where('id', $id)
                ->update([
                    'activo' => 0,
                    'ultima_conexion' => date('d-m-Y h:m:s a')
                ]);
        } catch (\Throwable $th) {
            Log::error('- Class UtilsControllers - Se ha producido un error al ejecutar la funcion.'.$th->getMessage());
        }
    }

    static function porcenInverPorEstado($total_estado)
    {
        try {
            $totalOts = Ot::select(DB::raw("sum(costo_preCli) as total"))
                ->where('tipoMantenimiento', 'MC')
                ->where('statusOts', 5)
                ->pluck('total');

            $valor = ($total_estado * 100) / $totalOts['0'];

            return number_format($valor, 2, ',', '.');
        } catch (\Throwable $th) {
            Log::error('- Class UtilsControllers - Se ha producido un error al ejecutar la funcion.'.$th->getMessage());
        }
    }

    public function reporte_users()
    {
        try {

            $data = User::all();
            $count = User::all()->count();
            $pdf = Pdf::loadView('pdf.users', compact('data', 'count'));
            return $pdf->stream('reporte_usuarios.pdf');
        } catch (\Throwable $th) {
            Log::error('- Class UtilsControllers - Se ha producido un error al ejecutar la funcion.'.$th->getMessage());
        }
    }

    public function reporte_ots()
    {
        try {

            $data = Ot::all();
            $count_r = Ot::where('statusOts', '1')->count();
            $count_a = Ot::where('statusOts', '2')->count();
            $count_e = Ot::where('statusOts', '3')->count();
            $count_f = Ot::where('statusOts', '5')->count();
            $pdf = Pdf::loadView('pdf.ots', compact('data', 'count_r', 'count_a', 'count_e', 'count_f'));
            return $pdf->stream('reporte_ots.pdf');
        } catch (\Throwable $th) {
            Log::error('- Class UtilsControllers - Se ha producido un error al ejecutar la funcion.'.$th->getMessage());
        }
    }

    public function reporte_tickets()
    {
        try {

            $data = Tikect::all();
            $count_a = Tikect::where('status_tikect', '0')->count();
            $count_c = Tikect::where('status_tikect', '1')->count();
            $pdf = Pdf::loadView('pdf.tickets', compact('data', 'count_a', 'count_c'));
            return $pdf->stream('reporte_tickets.pdf');
        } catch (\Throwable $th) {
            Log::error('- Class UtilsControllers - Se ha producido un error al ejecutar la funcion.'.$th->getMessage());
        }
    }

    static function get_nombre($email)
    {
        try {

            $data = User::where('email', $email)->get();

            foreach ($data as $item) {
                $nombre = $item->nombre;
                $apellido = $item->apellido;
            }

            $res = $nombre . ' ' . $apellido;

            return $res;
        } catch (\Throwable $th) {
            Log::error('- Class UtilsControllers - Se ha producido un error al ejecutar la funcion.'.$th->getMessage());
        }
    }

    static function total_ticket($estado, $estatus)
    {
        try {

            if ($estatus == 1) {
                $total = Estadistica::where('estado', $estado)->get();
                foreach ($total as $item) {
                    $total_ticket_cerrados = $item->total_ticket_cerrados;
                    $total_ticket_abiertos = $item->total_ticket_abiertos;
                }
                $total_ticket_cerrados = $total_ticket_cerrados + 1;
                $total_ticket_abiertos = $total_ticket_abiertos - 1;
                DB::table('estadisticas')
                    ->where('estado', $estado)
                    ->update([
                        'total_ticket_cerrados' => $total_ticket_cerrados,
                        'total_ticket_abierto' => $total_ticket_abiertos
                    ]);
            } else {
                $total = Estadistica::where('estado', $estado)->get();
                foreach ($total as $item) {
                    $total_ticket_abiertos = $item->total_ticket_abiertos;
                }
                $total_ticket_abiertos = $total_ticket_abiertos + 1;
                DB::table('estadisticas')
                    ->where('estado', $estado)
                    ->update(['total_ticket_abierto' => $total_ticket_abiertos]);
            }
        } catch (\Throwable $th) {
            Log::error('- Class UtilsControllers - Se ha producido un error al ejecutar la funcion.'.$th->getMessage());
        }
    }

    static function total_inversion_mp($equipo_uid, $estado)
    {
        try {

            $data = FichaTecnica::where('uid', $equipo_uid)->get();
            foreach ($data as $item) {
                $costo = $item->costo;
            }

            $data2 = Estadistica::where('estado', $estado)->get();
            foreach ($data2 as $item) {
                $total_inversion_mp = $item->total_inversion_mp;
                $total_inversion_mc = $item->total_inversion_mc;
                $total_ot_mp_creada = $item->total_ot_mp_creada;
            }

            $total_inversion_mp = $total_inversion_mp + $costo;
            $total_ot_mp_creada = $total_ot_mp_creada + 1;
            // dd($total_inversion_mp, $total_ot_mp_creada);
            DB::table('estadisticas')
                ->where('estado', $estado)
                ->update([
                    'total_inversion_mp' => $total_inversion_mp,
                    'total_ot_mp_creada' => $total_ot_mp_creada,
                    'total_inversion_mp_mc' => $total_inversion_mp + $total_inversion_mc
                ]);
        } catch (\Throwable $th) {
            Log::error('- Class UtilsControllers - Se ha producido un error al ejecutar la funcion.'.$th->getMessage());
        }
    }

    static function total_inversion_mc($costo_preCli, $estado)
    {
        try {
            $data = Estadistica::where('estado', $estado)->get();
            foreach ($data as $item) {
                $total_inversion_mc = $item->total_inversion_mc;
                $total_inversion_mp = $item->total_inversion_mp;
            }

            $total_inversion_mc = $total_inversion_mc + $costo_preCli;

            DB::table('estadisticas')
                ->where('estado', $estado)
                ->update([
                    'total_inversion_mc' => $total_inversion_mc,
                    'total_inversion_mp_mc' => $total_inversion_mp + $total_inversion_mc
                ]);
        } catch (\Throwable $th) {
            Log::error('- Class UtilsControllers - Se ha producido un error al ejecutar la funcion.'.$th->getMessage());
        }
    }

    static function total_ot_mc_estatus($estado, $estatus)
    {
        try {

            $data = Estadistica::where('estado', $estado)->get();
            foreach ($data as $item) {
                $total_ot_mc_creada = $item->total_ot_mc_creada;
                $total_ot_mc_aprobada = $item->total_ot_mc_aprobada;
                $total_ot_mc_ejecucion = $item->total_ot_mc_ejecucion;
                $total_ot_mc_supervicion = $item->total_ot_mc_supervicion;
                $total_ot_mc_finalizada = $item->total_ot_mc_finalizada;
            }

            if ($estatus == 1) {
                $total_ot_mc_creada = $total_ot_mc_creada + 1;
                DB::table('estadisticas')
                    ->where('estado', $estado)
                    ->update([
                        'total_ot_mc_creada' => $total_ot_mc_creada
                    ]);
            }

            if ($estatus == 2) {
                $total_ot_mc_aprobada = $total_ot_mc_aprobada + 1;

                if ($total_ot_mc_creada == 0) {
                    $total_ot_mc_creada = 0;
                } else {
                    $total_ot_mc_creada = $total_ot_mc_creada - 1;
                }

                DB::table('estadisticas')
                    ->where('estado', $estado)
                    ->update([
                        'total_ot_mc_aprobada' => $total_ot_mc_aprobada,
                        'total_ot_mc_creada' => $total_ot_mc_creada
                    ]);
            }

            if ($estatus == 3) {
                $total_ot_mc_ejecucion = $total_ot_mc_ejecucion + 1;

                if ($total_ot_mc_aprobada == 0) {
                    $total_ot_mc_aprobada = 0;
                } else {
                    $total_ot_mc_aprobada = $total_ot_mc_aprobada - 1;
                }

                DB::table('estadisticas')
                    ->where('estado', $estado)
                    ->update([
                        'total_ot_mc_ejecucion' => $total_ot_mc_ejecucion,
                        'total_ot_mc_aprobada' => $total_ot_mc_aprobada
                    ]);
            }

            if ($estatus == 4) {
                $total_ot_mc_supervicion = $total_ot_mc_supervicion + 1;

                if ($total_ot_mc_ejecucion == 0) {
                    $total_ot_mc_ejecucion = 0;
                } else {
                    $total_ot_mc_ejecucion = $total_ot_mc_ejecucion - 1;
                }

                DB::table('estadisticas')
                    ->where('estado', $estado)
                    ->update([
                        'total_ot_mc_supervicion' => $total_ot_mc_supervicion,
                        'total_ot_mc_ejecucion' => $total_ot_mc_ejecucion
                    ]);
            }

            if ($estatus == 5) {
                $total_ot_mc_finalizada = $total_ot_mc_finalizada + 1;

                if ($total_ot_mc_supervicion == 0) {
                    $total_ot_mc_supervicion = 0;
                } else {
                    $total_ot_mc_supervicion = $total_ot_mc_supervicion - 1;
                }

                DB::table('estadisticas')
                    ->where('estado', $estado)
                    ->update([
                        'total_ot_mc_finalizada' => $total_ot_mc_finalizada,
                        'total_ot_mc_supervicion' => $total_ot_mc_supervicion
                    ]);
            }
        } catch (\Throwable $th) {
            Log::error('- Class UtilsControllers - Se ha producido un error al ejecutar la funcion.'.$th->getMessage());
        }
    }

    static function total_ot_mp_estatus($estado, $estatus)
    {
        try {

            $data = Estadistica::where('estado', $estado)->get();
            foreach ($data as $item) {
                $total_ot_mp_creada = $item->total_ot_mp_creada;
                $total_ot_mp_aprobada = $item->total_ot_mp_aprobada;
                $total_ot_mp_ejecucion = $item->total_ot_mp_ejecucion;
                $total_ot_mp_supervicion = $item->total_ot_mp_supervicion;
                $total_ot_mp_finalizada = $item->total_ot_mp_finalizada;
            }

            if ($estatus == 1) {
                $total_ot_mp_creada = $total_ot_mp_creada + 1;
                DB::table('estadisticas')
                    ->where('estado', $estado)
                    ->update([
                        'total_ot_mp_creada' => $total_ot_mp_creada
                    ]);
            }

            if ($estatus == 2) {
                $total_ot_mp_aprobada = $total_ot_mp_aprobada + 1;

                if ($total_ot_mp_creada == 0) {
                    $total_ot_mp_creada = 0;
                } else {
                    $total_ot_mp_creada = $total_ot_mp_creada - 1;
                }

                DB::table('estadisticas')
                    ->where('estado', $estado)
                    ->update([
                        'total_ot_mp_aprobada' => $total_ot_mp_aprobada,
                        'total_ot_mp_creada' => $total_ot_mp_creada
                    ]);
            }

            if ($estatus == 3) {
                $total_ot_mp_ejecucion = $total_ot_mp_ejecucion + 1;

                if ($total_ot_mp_aprobada == 0) {
                    $total_ot_mp_aprobada = 0;
                } else {
                    $total_ot_mp_aprobada = $total_ot_mp_aprobada - 1;
                }

                DB::table('estadisticas')
                    ->where('estado', $estado)
                    ->update([
                        'total_ot_mp_ejecucion' => $total_ot_mp_ejecucion,
                        'total_ot_mp_aprobada' => $total_ot_mp_aprobada
                    ]);
            }

            if ($estatus == 4) {
                $total_ot_mp_supervicion = $total_ot_mp_supervicion + 1;

                if ($total_ot_mp_ejecucion == 0) {
                    $total_ot_mp_ejecucion = 0;
                } else {
                    $total_ot_mp_ejecucion = $total_ot_mp_ejecucion - 1;
                }

                DB::table('estadisticas')
                    ->where('estado', $estado)
                    ->update([
                        'total_ot_mp_supervicion' => $total_ot_mp_supervicion,
                        'total_ot_mp_ejecucion' => $total_ot_mp_ejecucion
                    ]);
            }

            if ($estatus == 5) {
                $total_ot_mp_finalizada = $total_ot_mp_finalizada + 1;

                if ($total_ot_mp_supervicion == 0) {
                    $total_ot_mp_supervicion = 0;
                } else {
                    $total_ot_mp_supervicion = $total_ot_mp_supervicion - 1;
                }

                DB::table('estadisticas')
                    ->where('estado', $estado)
                    ->update([
                        'total_ot_mp_finalizada' => $total_ot_mp_finalizada,
                        'total_ot_mp_supervicion' => $total_ot_mp_supervicion
                    ]);
            }
        } catch (\Throwable $th) {
            Log::error('- Class UtilsControllers - Se ha producido un error al ejecutar la funcion.'.$th->getMessage());
        }
    }
}
