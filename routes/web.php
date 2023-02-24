<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\View\Dashboard;
use App\Models\User;
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
    return view('welcome');
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

    Route::get('ots', function () {
        return view('tecnicos.ots');
    })->name('ots');

    Route::get('prueba', function () {
        return view('prueba');
    })->name('prueba');

    Route::get('arr', function () {
        $arr = User::all();
        return $arr;
    })->name('arr');

    // Route::view('/completar-registro','livewire.view.completar-registro')->name('completar-registro');

    Route::get('/dash-tecnicos', function () {
        return view('layouts.tecnicos');
    })->name('dash-tecnicos');
    
    /**
     * Ruta para Logout del usuario
     */
    Route::get('/logout', [\App\Http\Controllers\UserController::class, 'destroy'])
        ->name('logout');
});

/**
 * Rutas que no requieren autenticacion
 */
 Route::get('admin-registro', function () {
    return view('auth.admin-registro');
})->name('admin-registro');

Route::get('registro-trx', function () {
    return view('auth.registro-trx');
})->name('registro-trx');

Route::get('registro-banco', function () {
    return view('auth.registro-banco');
})->name('registro-banco');



Route::post('/store-resgistro', [\App\Http\Controllers\UserController::class, 'store-registro'])
        ->name('store-resgistro');

Route::view('/completar-registro','livewire.view.completar-registro')->name('completar-registro');

Route::get('uuid', function () {
    $uuid = Str::uuid()->toString();
        dd($uuid);
   
});

Route::get('/pp', function () {
    return view('prueba');
})->name('pp');



