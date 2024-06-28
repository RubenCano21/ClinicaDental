<?php

use App\Http\Controllers\DashboarController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\OdontologoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\RecepcionistaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\myspacecontroller;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\OdontogramaController;
use App\Http\Controllers\pruebacontroller;

Route::get('/prueba', [pruebaController::class, 'index']);

Route::get('/', function(){
    return view('index');
});

Route::get('/index', function () {
    return view('home.index'); // El archivo está en resources/views/home/contact.blade.php
})->name('index');

Route::get('/contacto', function () {
    return view('home.contacto'); // El archivo está en resources/views/home/contact.blade.php
})->name('contacto');

Route::get('/servicio', function () {
    return view('home.servicio'); // El archivo está en resources/views/home/service.blade.php
})->name('servicio');

Route::get('/acercaDe', function () {
    return view('home.acercaDe'); // El archivo está en resources/views/home/acerca.blade.php
})->name('acercaDe');

 Route::get('/auth/login', function(){
    return view('auth.login');
 });
 Route::get('/auth/register', function () {
    return view('auth.register');
 });

Route::resource('home', 'App\Http\Controllers\HomeController');
route::resource('usuarios',UserController::class,)->names('admin.usuarios');
route::resource('reservas',ReservaController::class,)->names('admin.reservas');
route::resource('citas',CitaController::class)->names('admin.citas');
route::resource('servicios',ServicioController::class)->names('admin.servicios');
Route::resource('users', 'App\Http\Controllers\UserController');

Route::get('users/auth', function () {
    return view('profile.update-password-form');
});


// Rutas para el admin - pacientes
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('pacientes', [PacienteController::class, 'index'])->name('admin.pacientes.index');
    Route::get('pacientes/create', [PacienteController::class, 'create'])->name('admin.pacientes.create');
    Route::post('pacientes/create', [PacienteController::class, 'store'])->name('admin.pacientes.store');
    Route::get('pacientes/buscar_paciente', [PacienteController::class, 'buscar'])->name('admin.pacientes.buscar_paciente');
    Route::get('pacientes/{id}', [PacienteController::class, 'show'])->name('admin.pacientes.show');
    Route::get('pacientes/{id}/edit', [PacienteController::class, 'edit'])->name('admin.pacientes.edit');
    Route::put('pacientes/{id}', [PacienteController::class, 'update'])->name('admin.pacientes.update');
    Route::get('pacientes/{id}/confirm-delete', [PacienteController::class, 'confirmDelete'])->name('admin.pacientes.confirmDelete');
    Route::delete('pacientes/{id}', [PacienteController::class, 'destroy'])->name('admin.pacientes.destroy');
    Route::get('bitacora', [BitacoraController::class, 'index'])->name('admin.bitacora.index');
    Route::get('odontograma', [OdontogramaController::class, 'index'])->name('admin.odontograma.index');
});

// Rutas para el admin - odontologos
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('odontologos', [OdontologoController::class, 'index'])->name('admin.odontologos.index');
    Route::get('odontologos/create', [OdontologoController::class, 'create'])->name('admin.odontologos.create');
    Route::post('odontologos/create', [OdontologoController::class, 'store'])->name('admin.odontologos.store');
    Route::get('odontologos/{id}', [OdontologoController::class, 'show'])->name('admin.odontologos.show');
    Route::get('odontologos/{id}/edit', [OdontologoController::class, 'edit'])->name('admin.odontologos.edit');
    Route::put('odontologos/{id}', [OdontologoController::class, 'update'])->name('admin.odontologos.update');
    Route::get('odontologos/{id}/confirm-delete', [OdontologoController::class, 'confirmDelete'])->name('admin.odontologos.confirmDelete');
    Route::delete('odontologos/{id}', [OdontologoController::class, 'destroy'])->name('admin.odontologos.destroy');
});

// Rutas para el admin - recepcionistas
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('recepcionistas', [RecepcionistaController::class, 'index'])->name('admin.recepcionistas.index');
    Route::get('recepcionistas/create', [RecepcionistaController::class, 'create'])->name('admin.recepcionistas.create');
    Route::post('recepcionistas/create', [RecepcionistaController::class, 'store'])->name('admin.recepcionistas.store');
    Route::get('recepcionistas/{id}', [RecepcionistaController::class, 'show'])->name('admin.recepcionistas.show');
    Route::get('recepcionistas/{id}/edit', [RecepcionistaController::class, 'edit'])->name('admin.recepcionistas.edit');
    Route::put('recepcionistas/{id}', [RecepcionistaController::class, 'update'])->name('admin.recepcionistas.update');
    Route::get('recepcionistas/{id}/confirm-delete', [RecepcionistaController::class, 'confirmDelete'])->name('admin.recepcionistas.confirmDelete');
    Route::delete('recepcionistas/{id}', [RecepcionistaController::class, 'destroy'])->name('admin.recepcionistas.destroy');
});

// Rutas para el admin - epecialidades
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('especialidades', [EspecialidadController::class, 'index'])->name('admin.especialidades.index');
    Route::get('especialidades/create', [EspecialidadController::class, 'create'])->name('admin.especialidades.create');
    Route::post('especialidades/create', [EspecialidadController::class, 'store'])->name('admin.especialidades.store');
    Route::get('especialidades/{id}', [EspecialidadController::class, 'show'])->name('admin.especialidades.show');
    Route::get('especialidades/{id}/edit', [EspecialidadController::class, 'edit'])->name('admin.especialidades.edit');
    Route::put('especialidades/{id}', [EspecialidadController::class, 'update'])->name('admin.especialidades.update');
    Route::get('especialidades/{id}/confirm-delete', [EspecialidadController::class, 'confirmDelete'])->name('admin.especialidades.confirmDelete');
    Route::delete('especialidades/{id}', [EspecialidadController::class, 'destroy'])->name('admin.especialidades.destroy');
});

//admin- horarios
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('horarios', [HorarioController::class, 'index'])->name('admin.horarios.index');
    Route::get('horarios/create', [HorarioController::class, 'create'])->name('admin.horarios.create');
    Route::post('horarios/create', [HorarioController::class, 'store'])->name('admin.horarios.store');
    Route::get('horarios/{id}', [HorarioController::class, 'show'])->name('admin.horarios.show');
    Route::get('horarios/{id}/edit', [HorarioController::class, 'edit'])->name('admin.horarios.edit');
    Route::put('horarios/{id}', [HorarioController::class, 'update'])->name('admin.horarios.update');
    Route::get('horarios/{id}/confirm-delete', [HorarioController::class, 'confirmDelete'])->name('admin.horarios.confirmDelete');
    Route::delete('horarios/{id}', [HorarioController::class, 'destroy'])->name('admin.horarios.destroy');
});

//admin- citas
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('citas', [CitaController::class, 'index'])->name('admin.citas.index');
    Route::get('citas/create', [CitaController::class, 'create'])->name('admin.citas.create');
    Route::post('citas/create', [CitaController::class, 'store'])->name('admin.citas.store');
    Route::get('citas/{id}', [CitaController::class, 'show'])->name('admin.citas.show');
    Route::get('citas/{id}/edit', [CitaController::class, 'edit'])->name('admin.citas.edit');
    Route::put('citas/{id}', [CitaController::class, 'update'])->name('admin.citas.update');
    Route::get('citas/{id}/confirm-delete', [CitaController::class, 'confirmDelete'])->name('admin.citas.confirmDelete');
    Route::delete('citas/{id}', [CitaController::class, 'destroy'])->name('admin.citas.destroy');
});

Route::resource('pagos', PagoController::class)->middleware('auth');
Route::resource('dash',DashboarController::class)->middleware('auth');

Route::controller(CursoController::class)->group(function(){
    Route::get('cursos', 'index');
    Route::get('cursos/create', 'create');
    Route::get('cursos/{curso}/{categoria?}', 'show');
});

// Rutas para paypal
Route::get('paypal/payment', [PayPalController::class, 'showPaymentForm'])->name('paypal.payment');
Route::post('/paypal/create-payment', [PayPalController::class, 'createPayment'])->name('paypal.create');
Route::get('/paypal/cancel', [PayPalController::class, 'cancel'])->name('paypal.cancel');
Route::get('/paypal/success', [PayPalController::class, 'success'])->name('paypal.success');
Route::get('/paypal/create-transaction', [PayPalController::class, 'createTransaction'])->name('paypal.createTransaction');
Route::get('/paypal/success-transaction', [PayPalController::class, 'successTransaction'])->name('paypal.successTransaction');
Route::get('/paypal/cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('paypal.cancelTransaction');

//Facturacion

Route::get('facturas', [FacturaController::class, 'index'])->name('facturas.index');
Route::get('/facturas/{id}', [FacturaController::class, 'show'])->name('facturas.show');
Route::get('/facturas', [FacturaController::class, 'showInvoice'])->name('facturas.show');
Route::get('/facturas/download', [FacturaController::class, 'downloadInvoice'])->name('facturas.download');
Route::view('download', 'facturas.download')->name('download');

//ruta para imprimir
//Route::get('invoice', [InvoiceController::class, 'showInvoice'])->name('invoice.show');
//Route::get('invoice/download', [InvoiceController::class, 'downloadInvoice'])->name('invoice.download');


// Route::get('cursos/{variable}', function($variable) {
//     return "Bienvenido al curso: $variable";
// });

Route::get('/registro', [RegistroController::class,'index']);
Route::post('/registro', [RegistroController::class,'store'])->name('registro.store');


/* Route::middleware(['auth:sanctum','verified'])->get('/dash', function () {
        return view('dash.index');
    })->name('dash');
*/
//Route::get('/dash','App\Http\Controllers\DashboardController@index');



/*Route::get('/dash', function () {
    return view('crud.index');
});*/

Route::get('/dash/crud/create', function () {
    return view('crud.create');
});

Auth::routes();

