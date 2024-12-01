<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SobreMimController;
use App\Http\Controllers\DepoimentoController;
use App\Http\Controllers\AreaAtuacaoController;

Route::get('/', function () {
    return view('auth.login');  
});

// Rotas de autenticação
Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
});

// Rotas protegidas por autenticação
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Logout
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Área administrativa
    Route::prefix('admin')->group(function () {
        // Rotas do SobreMim
        Route::get('/sobre', [SobreMimController::class, 'index'])->name('sobre.index');
        Route::get('/sobre/edit', [SobreMimController::class, 'edit'])->name('sobre.edit');
        Route::put('/sobre', [SobreMimController::class, 'update'])->name('sobre.update');

        // Outras rotas de recursos
        Route::resource('depoimentos', DepoimentoController::class);
        Route::resource('areas-atuacao', AreaAtuacaoController::class);
    });
});