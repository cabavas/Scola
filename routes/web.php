<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TurmasController;
use App\Http\Controllers\ProfessoresController;
use App\Http\Controllers\FaltasController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\NotasController;
use App\Http\Controllers\RelatoriosController;
use App\Http\Controllers\PerfilController;


// Route::get('/', [IndexController::class, 'index']);

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'create'])->name('login');
    Route::post('login', [AuthController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');
    Route::get('turmas', [TurmasController::class, 'index'])->name('turmas');
    Route::get('professores', [ProfessoresController::class, 'index'])->name('professores');
    Route::get('faltas', [FaltasController::class, 'index'])->name('faltas');
    Route::get('calendario', [CalendarioController::class, 'index'])->name('calendario');
    Route::get('notas', [NotasController::class, 'index'])->name('notas');
    Route::get('relatorios', [RelatoriosController::class, 'index'])->name('relatorios');
    Route::get('perfil', [PerfilController::class, 'index'])->name('perfil');
});