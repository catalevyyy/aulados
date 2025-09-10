<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\DisponibilidadController;
use App\Http\Controllers\FocoController;
use App\Http\Controllers\AireAcondicionadoController;

// Authentication Routes Manuales
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

// Ruta principal -> Welcome personalizado (usa HomeController)
Route::get('/', [HomeController::class, 'welcome'])->name('inicio');

// Rutas protegidas (requieren autenticación)
Route::middleware(['auth'])->group(function () {

    // Dashboard con HomeController
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Rutas Resource para CRUD
    Route::resource('aulas', AulaController::class);
    Route::resource('materias', MateriaController::class);
    Route::resource('docentes', DocenteController::class);
    Route::resource('reservas', ReservaController::class);
    Route::resource('horarios', HorarioController::class);
    Route::resource('disponibilidades', DisponibilidadController::class);
    Route::resource('focos', FocoController::class);
    Route::resource('aires', AireAcondicionadoController::class);
});
