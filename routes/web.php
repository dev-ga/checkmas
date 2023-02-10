<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\View\Dashboard;

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



Route::middleware([
    'auth.basic'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /**
     * Ruta de prueba
     */
    Route::view('/d','livewire.view.dashboard')->name('dash');
    Route::view('/dash',Dashboard::class)->name('foo');
    

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

Route::post('/store-resgistro', [\App\Http\Controllers\UserController::class, 'store-registro'])
        ->name('store-resgistro');
