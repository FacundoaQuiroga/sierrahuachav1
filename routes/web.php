<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\CabanaController;

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

Route::get('/', function() {
    return view('vistas.index');
});

Route::get('/ubicacion', function() {
    return view('vistas.ubicacion');
});

Route::get('/disponibilidad', [CabanaController::class, 'fotosCabanas']);

Route::POST('/reserva', [ReservaController::class, 'index']);

Route::POST('/ajax/reservas', [ReservaController::class, 'datosReservasAjax']);

Route::POST('/ajax/codigo', [ReservaController::class, 'traerCodigoReservaAjax']);

Route::POST('/ajax', [CabanaController::class, 'datosCabanasAjax']);

Route::get('/reserva/pago', [ReservaController::class, 'vistaPagoMercado']);

Route::get('reserva/pago/cargado', [ReservaController::class, 'PagoMercado']);


Route::get('/contacto', function() {
    return view('vistas.contacto');
});

Route::get('/fotos', function() {
    return view('vistas.fotos');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
