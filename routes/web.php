<?php

use Illuminate\Support\Facades\Route;

// Home
use App\Http\Controllers\HomeController;

// Usuarios
use App\Http\Controllers\UsuarioController;

// Gastos
use App\Http\Controllers\GastoController;
use App\Http\Controllers\CategoriaGastoController;

// Entradas
use App\Http\Controllers\EntradaController;

use App\Http\Controllers\AuthController;


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'Home'])->name('dashboard');

    Route::resource('/usuario', UsuarioController::class)->except('create', 'show');
    Route::resource('/categoria-gastos', CategoriaGastoController::class)->except('create', 'show');
    Route::resource('/gastos', GastoController::class)->except('create', 'show');
    Route::resource('/entradas', EntradaController::class)->except('create', 'show');


    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});