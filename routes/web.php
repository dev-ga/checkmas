<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\View\Dashboard;
use App\Models\Ot;
use App\Models\Tikect;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});



Route::middleware(['auth:sanctum','verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /**
     * Ruta de prueba
     */
    Route::view('/dashboard-admin','livewire.view.dashboard')->name('dashboard-admin');

    Route::view('/dash',Dashboard::class)->name('foo');

    Route::get('/completar-registro', function () {
        return view('auth.completar-registro');
    })->name('completar-registro');

    Route::get('ficha-tecnica', function () {
        return view('tecnicos.ficha-tecnica');
    })->name('ficha-tecnica');

    Route::get('crear-tikect', function () {
        return view('dashboard.crear-tikect');
    })->name('crear-tikect');

    Route::get('lista-tikects', function () {
        return view('dashboard.lista-tikects');
    })->name('lista-tikects');

    Route::get('ots', function () {
        return view('tecnicos.ots');
    })->name('ots');

    Route::get('lista-usuarios', function () {
        return view('dashboard.listado-usuarios');
    })->name('lista-usuarios');

    Route::get('dash-mantenimientos', function () {
        return view('dashboard.mantenimientos');
    })->name('dash-mantenimientos');

    Route::get('dash-mantenimientos-culminados', function () {
        return view('dashboard.mantenimientos_culminados');
    })->name('dash-mantenimientos-culminados');

    Route::get('mantenimientos', function () {
        return view('tecnicos.mantenimientos');
    })->name('mantenimientos');

    Route::get('bitacora', function () {
        return view('tecnicos.bitacora');
    })->name('bitacora');

    Route::get('prueba', function () {
        return view('prueba');
    })->name('prueba');

    Route::get('arr', function () {
        $arr = User::all();
        return $arr;
    })->name('arr');

    // Route::view('/completar-registro','livewire.view.completar-registro')->name('completar-registro');

    Route::get('/dash-tecnicos', function () {
        return view('tecnicos.ficha-tecnica');
    })->name('dash-tecnicos');
    
    /**
     * Ruta para Logout del usuario
     */
    Route::get('/logout', [\App\Http\Controllers\UserController::class, 'destroy'])
        ->name('logout');

    /**
     * Ruta para reportes
     */
    Route::get('/reporte/users', [\App\Http\Controllers\UtilsController::class, 'reporte_users'])
        ->name('reporte.users');
    Route::get('/reporte/ots', [\App\Http\Controllers\UtilsController::class, 'reporte_ots'])
        ->name('reporte.ots');
    Route::get('/reporte/tickets', [\App\Http\Controllers\UtilsController::class, 'reporte_tickets'])
        ->name('reporte.tickets');
    
    /**
     * Ruta para imprimir la OTs
     */
    Route::get('/printOt/{id}', function ($id) {
        $data = Ot::find($id);
        $keySecurity = Hash::make($id);
        return view('tecnicos.printOt', compact(['data', 'keySecurity']));
    })->name('print-ot');
});

/**
 * Rutas que no requieren autenticacion
 */
 Route::get('admin-registro', function () {
    return view('auth.admin-registro');
})->name('admin-registro');

Route::get('registro-index', function () {
    return view('auth.registro-index');
})->name('registro-index');

Route::get('registro-trx', function () {
    return view('auth.registro-trx');
})->name('registro-trx');

Route::get('registro-banco', function () {
    return view('auth.registro-banco');
})->name('registro-banco');

Route::get('/completar-registro-banco', function () {
    return view('auth.completar-registro-banco');
})->name('completar-registro-banco');

Route::get('/recuperar-password', function () {
    return view('auth.recuperar-password');
})->name('recuperar-password');



Route::post('/store-resgistro', [\App\Http\Controllers\UserController::class, 'store-registro'])
        ->name('store-resgistro');

Route::view('/completar-registro','livewire.view.completar-registro')->name('completar-registro');

Route::get('uuid', function () {
    $uuid = Str::uuid()->toString();
        dd($uuid);
   
});

Route::get('/pp', function () {
    return view('modal');
})->name('pp');



