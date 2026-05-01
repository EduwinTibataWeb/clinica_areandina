<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoCitaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\CentroMedicoController;
use App\Http\Controllers\RoleController;

Route::get('/', function () {

    if (auth()->check()) {
        return redirect('/dashboard');
    }

    return redirect('/login');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('tipos-cita', TipoCitaController::class);
    Route::resource('pacientes', PacienteController::class);
    Route::resource('medicos', MedicoController::class);
    Route::resource('citas', CitaController::class);
    Route::resource('centros-medicos', CentroMedicoController::class);
    Route::resource('roles', RoleController::class);
});

require __DIR__.'/auth.php';
