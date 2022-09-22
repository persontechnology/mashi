<?php

use App\Http\Controllers\AreaSocioController;
use App\Http\Controllers\CreditoController;
use App\Http\Controllers\SimuladorController;
use App\Http\Controllers\Usuario\SocioController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/simulador-credito', [SimuladorController::class, 'credito'])->name('simuladorCredito');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    // socios
    Route::resource('socio', SocioController::class);
    // creditos
    Route::resource('credito', CreditoController::class);
    Route::get('credito-pdf/{id}', [CreditoController::class,'pdf'])->name('credito.pdf');
    Route::get('credito-cobrar-rubro/{id}', [CreditoController::class,'cobrarRubro'])->name('credito.cobrarRubro');
    Route::post('credito-guardar-cobrar-rubro', [CreditoController::class,'guardarCobrarRubro'])->name('credito.guardarCobrarRubro');
    Route::get('credito-pdf-cobrar-rubro/{id}', [CreditoController::class,'pdfCobrarRubro'])->name('credito.pdfCobrarRubro');

});

require __DIR__.'/auth.php';
