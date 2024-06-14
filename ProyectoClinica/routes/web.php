<?php

use App\Http\Controllers\OdontologoController;
use App\Http\Controllers\PacienteController;
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


Route:: resource('recepcionistas', 'App\Http\Controllers\RecepcionistaController');


route::resource('usuarios',UserController::class,)->names('admin.usuarios');

route::resource('reservas',ReservaController::class,)->names('admin.reservas');

route::resource('citas',CitaController::class)->names('admin.citas');

route::resource('servicios',ServicioController::class)->names('admin.servicios');

Route::resource('users', 'App\Http\Controllers\UserController');

Route::get('users/auth', function () {
    return view('profile.update-password-form');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('pacientes', [PacienteController::class, 'index'])->name('admin.pacientes.index');
    Route::get('pacientes/create', [PacienteController::class, 'create'])->name('admin.pacientes.create');
    Route::post('pacientes', [PacienteController::class, 'store'])->name('admin.pacientes.store');
    Route::get('pacientes/{id}', [PacienteController::class, 'show'])->name('admin.pacientes.show');
    Route::get('pacientes/{id}/edit', [PacienteController::class, 'edit'])->name('admin.pacientes.edit');
    Route::put('pacientes/{id}', [PacienteController::class, 'update'])->name('admin.pacientes.update');
    Route::get('pacientes/{id}/confirm-delete', [PacienteController::class, 'confirmDelete'])->name('admin.pacientes.confirmDelete');
    Route::delete('pacientes/{id}', [PacienteController::class, 'destroy'])->name('admin.pacientes.destroy');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('odontologos', [OdontologoController::class, 'index'])->name('admin.odontologos.index');
    Route::get('odontologos/create', [OdontologoController::class, 'create'])->name('admin.odontologos.create');
    Route::post('odontologos', [OdontologoController::class, 'store'])->name('admin.odontologos.store');
    Route::get('odontologos/{id}', [OdontologoController::class, 'show'])->name('admin.odontologos.show');
    Route::get('odontologos/{id}/edit', [OdontologoController::class, 'edit'])->name('admin.odontologos.edit');
    Route::put('odontologos/{id}', [OdontologoController::class, 'update'])->name('admin.odontologos.update');
    Route::get('odontologos/{id}/confirm-delete', [OdontologoController::class, 'confirmDelete'])->name('admin.odontologos.confirmDelete');
    Route::delete('odontologos/{id}', [OdontologoController::class, 'destroy'])->name('admin.odontologos.destroy');
});


Route::controller(CursoController::class)->group(function(){
    Route::get('cursos', 'index');
    Route::get('cursos/create', 'create');
    Route::get('cursos/{curso}/{categoria?}', 'show');
});


// Route::get('cursos/{variable}', function($variable) {
//     return "Bienvenido al curso: $variable";
// });
Route::get('/myspace', [myspaceController::class,'home']);
Route::post('/myspace', [myspacecontroller::class,'store'])->name('myspace.store');

Route::get('/registro', [RegistroController::class,'index']);
Route::post('/registro', [RegistroController::class,'store'])->name('registro.store');


 Route::middleware(['auth:sanctum','verified'])->get('/dash', function () {
        return view('dash.index');
    })->name('dash');

Route::get('/dash','App\Http\Controllers\DashboardController@index');

Route::get('/dash/crud', function () {
    return view('crud.index');
});

Route::get('/dash/crud/create', function () {
    return view('crud.create');
});

Auth::routes();

