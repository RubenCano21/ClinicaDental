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
use App\Http\Controllers\HistorialClinicoController;
use App\Http\Controllers\OdontogramaController;
use App\Http\Controllers\TipoPagoController;
use App\Http\Controllers\PlanPagoController;


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
//route::resource('citas',CitaController::class)->names('admin.citas');
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
    // ajax
    Route::get('horarios/odontologos/{id}', [HorarioController::class, 'CargarEspecialidad'])->name('admin.horarios.CargarEspecialidad');
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

   Route::prefix('planPagos')->middleware('auth')->group(function () {
       Route::get('/', [PlanPagoController::class, 'index'])->name('planPagos.index');
       Route::get('/create', [PlanPagoController::class, 'create'])->name('planPagos.create');
       Route::post('/create', [PlanPagoController::class, 'store'])->name('planPagos.store');
       Route::get('/{id}', [PlanPagoController::class, 'show'])->name('planPagos.show');
       Route::get('/{id}/edit', [PlanPagoController::class, 'edit'])->name('planPagos.edit');
       Route::put('/{id}', [PlanPagoController::class, 'update'])->name('planPagos.update');
       Route::get('/{id}/confirm-delete', [PlanPagoController::class, 'confirmDelete'])->name('planPagos.confirmDelete');
       Route::delete('/{id}', [PlanPagoController::class, 'destroy'])->name('planPagos.destroy');
   });
   Route::prefix('tipoPagos')->middleware('auth')->group(function () {
       Route::get('/', [TipoPagoController::class, 'index'])->name('tipoPagos.index');
       Route::get('/create', [TipoPagoController::class, 'create'])->name('tipoPagos.create');
       Route::post('/create', [TipoPagoController::class, 'store'])->name('tipoPagos.store');
       Route::get('/{id}', [TipoPagoController::class, 'show'])->name('tipoPagos.show');
       Route::get('/{id}/edit', [TipoPagoController::class, 'edit'])->name('tipoPagos.edit');
       Route::put('/{id}', [TipoPagoController::class, 'update'])->name('tipoPagos.update');
       Route::get('/{id}/confirm-delete', [TipoPagoController::class, 'confirmDelete'])->name('tipoPagos.confirmDelete');
       Route::delete('/{id}', [TipoPagoController::class, 'destroy'])->name('tipoPagos.destroy');
   });


Route::resource('dash',DashboarController::class)->middleware('auth');

// Rutas para paypal
Route::get('paypal/payment', [PayPalController::class, 'showPaymentForm'])->name('paypal.payment');
Route::post('/paypal/create-payment', [PayPalController::class, 'createPayment'])->name('paypal.create');
Route::get('/paypal/cancel', [PayPalController::class, 'cancel'])->name('paypal.cancel');
Route::get('/paypal/success', [PayPalController::class, 'success'])->name('paypal.success');
Route::get('/paypal/create-transaction', [PayPalController::class, 'createTransaction'])->name('paypal.createTransaction');
Route::get('/paypal/success-transaction', [PayPalController::class, 'successTransaction'])->name('paypal.successTransaction');
Route::get('/paypal/cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('paypal.cancelTransaction');

//Facturacion
Route::prefix('facturas')->middleware('auth')->group(function () {
    Route::get('/', [FacturaController::class, 'index'])->name('facturas.index');
    Route::get('/create', [FacturaController::class, 'create'])->name('facturas.create');
    Route::post('/', [FacturaController::class, 'store'])->name('facturas.store'); // Cambiado a POST
    Route::get('/invoice', [FacturaController::class, 'showInvoice'])->name('facturas.invoice');
    Route::get('/{id}', [FacturaController::class, 'show'])->name('facturas.show');
    Route::get('/download', [FacturaController::class, 'download'])->name('facturas.download');
    Route::get('/download/{id}', [FacturaController::class, 'download'])->name('facturas.download'); // Agregado parámetro {id}
});

Route::prefix('historial')->middleware('auth')->group(function () {
    Route::get('', [HistorialClinicoController::class, 'index'])->name('historiales.index');
    Route::get('/create', [HistorialClinicoController::class, 'create'])->name('historiales.create');
    Route::post('/create', [HistorialClinicoController::class, 'store'])->name('historiales.store');
    Route::get('/{id}', [HistorialClinicoController::class, 'show'])->name('historiales.show');
    Route::get('/{id}/edit', [HistorialClinicoController::class, 'edit'])->name('historiales.edit');
    Route::put('/{id}', [HistorialClinicoController::class, 'update'])->name('historiales.update');
    Route::get('/{id}/confirm-delete', [HistorialClinicoController::class, 'confirmDelete'])->name('historiales.confirmDelete');
    Route::delete('/{id}', [HistorialClinicoController::class, 'destroy'])->name('historiales.destroy');
});

Route::prefix('reservas')->middleware('auth')->group(function (){
    Route::get('', [ReservaController::class, 'index'])->name('admin.reservas.index');
    Route::get('/create', [ReservaController::class, 'create'])->name('admin.reservas.create');
    Route::post('/create', [ReservaController::class, 'store'])->name('admin.reservas.store');
    Route::get('/{id}', [ReservaController::class, 'show'])->name('admin.reservas.show');
    Route::get('/{id}/edit', [ReservaController::class, 'edit'])->name('admin.reservas.edit');
    Route::put('/{id}', [ReservaController::class, 'update'])->name('admin.reservas.update');
    Route::get('/{id}/confirm-delete', [ReservaController::class, 'confirmDelete'])->name('admin.reservas.confirmDelete');
    Route::delete('/{id}', [ReservaController::class, 'destroy'])->name('admin.reservas.destroy');
});

//ruta para imprimir
//Route::get('invoice', [InvoiceController::class, 'showInvoice'])->name('invoice.show');
//Route::get('invoice/download', [InvoiceController::class, 'downloadInvoice'])->name('invoice.download');


// Route::get('cursos/{variable}', function($variable) {
//     return "Bienvenido al curso: $variable";
// });

Route::get('/registro', [RegistroController::class,'index']);
Route::post('/registro', [RegistroController::class,'store'])->name('registro.store');

Route::get('/dash/crud/create', function () {
    return view('crud.create');
});

Auth::routes();

