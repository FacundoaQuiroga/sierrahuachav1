<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\CabanaController;
use App\Http\Controllers\ContactoController;

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

//vista inicio
Route::get('/', function() {
    return view('vistas.index');
});

//vista ubicacion
Route::get('/ubicacion', function() {
    return view('vistas.ubicacion');
});

//vista contacto
Route::get('/contacto', function() {
    return view('vistas.contacto');
});

//Route::POST('/contacto/enviar', [ContactoController::class, 'enviar']);
//vista fotos con visualizacion de las fotos traidas de la base de datos
Route::get('/fotos', [HomeController::class, 'indexFotos']);

/*
 * vistas de reserva
 */

//primera vista de reserva que permite ver las fechas que quieres
Route::get('/disponibilidad', [CabanaController::class, 'fotosCabanas']);

//muestra vista reserva con el calendario y datos de la cabaña
Route::POST('/reserva', [ReservaController::class, 'index']);

//reseva.js almacena el id de la cabaña
//disponibilidad
Route::POST('/ajax/reservas', [ReservaController::class, 'datosReservasAjax']);

//reseva.js crear un codigo de 9 caracteres aleatorios muestra en la vista reserva
Route::POST('/ajax/codigo', [ReservaController::class, 'traerCodigoReservaAjax']);

//fotos con ajax y flechitas para saber que cabaña elegiste para vele las fotos y seleccionar la cabana
Route::POST('/ajax', [CabanaController::class, 'datosCabanasAjax']);

//vista de pago con mercadopago
Route::get('/pago', [ReservaController::class, 'vistaPagoMercado']);

//post para almacenar datos de la reserva en la base de datos
Route::POST('/pagado', [ReservaController::class, 'vistaPagoMercado']);


//Route::get('reserva/pago/cargado', [ReservaController::class, 'PagoMercado']);

/*
 * vistas administrador
 */

// retorna lista de reservas
Route::get('/adminReservas', [AdminController::class, 'index']);

//envia a la vista de editar
Route::get('/adminReservas/{id}/editar',[AdminController::class, 'edit'])->name('admin.edit');

//edita la reserva recibiendo el id de la reserva para poder editarla
Route::put('/adminReservas/{id}',[AdminController::class, 'update'])->name('admin.update');

//elimina la reserva seleccionada por el id
Route::delete('/adminReservas/{id}/destroy',[AdminController::class, 'destroy'])->name('admin.destroy');

//mostrar panel administrativo de imagenes
Route::get('/adminFotos', [FotoController::class, 'index'])->name('adminFotos');

//almacenar fotos cargadas
Route::post('/imagen-almacenada', [FotoController::class, 'store'])->name('image-store');

//eliminar foto seleccionada
Route::delete('/imagen-eliminada/{id}', [FotoController::class, 'destroy'])->name('image-delete');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
