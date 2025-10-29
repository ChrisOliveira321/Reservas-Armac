<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\CoordenadorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ============================
// ROTAS DE LOGIN / LOGOUT
// ============================

// Tela de login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Faz o login
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ============================
// ROTAS LIVRES
// ============================

// Criar reserva (qualquer pessoa pode)
Route::get('/reservas/create', [ReservaController::class, 'create'])->name('reservas.create');

// ============================
// ROTAS PROTEGIDAS (COORDENADOR)
// ============================

Route::middleware(['auth', 'role:coordenador, admin'])->group(function () {
    Route::get('/reservas', [ReservaController::class, 'index'])->name('reservas.index');
    Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');
    Route::get('/reservas/{reserva}/edit', [ReservaController::class, 'edit'])->name('reservas.edit');
    Route::put('/reservas/{reserva}', [ReservaController::class, 'update'])->name('reservas.update');
    Route::delete('/reservas/{reserva}', [ReservaController::class, 'destroy'])->name('reservas.destroy');

    // Exemplo de rota de painel do coordenador
    Route::get('/coordenador/dashboard', [CoordenadorController::class, 'index'])->name('coordenador.dashboard');
});

// ============================
// FUTURO: ROTAS DE ADMIN
// ============================

// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
// });

