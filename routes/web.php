<?php

use Illuminate\Support\Facades\Route;

// Home
use App\Http\Controllers\HomeController;

// Usuarios
use App\Http\Controllers\UsuarioController;

// Gastos
use App\Http\Controllers\GastosController;
use App\Http\Controllers\CategoriaGastoController;

// Entradas
use App\Http\Controllers\EntradasController;

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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'Home'])->name('dashboard');
});

Route::middleware(['auth:sanctum'])->group(function() {
    Route::resource('/usuario', UsuarioController::class)->except('create', 'show');
    Route::resource('/categoria-gastos', CategoriaGastoController::class)->except('create', 'show');
    Route::resource('/gastos', GastoController::class)->except('create', 'show');
    Route::resource('/entradas', EntradaController::class)->except('create', 'show');
});