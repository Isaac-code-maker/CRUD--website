<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SobreMimController;
use App\Http\Controllers\DepoimentoController;
use App\Http\Controllers\AreaAtuacaoController;

Route::get('/', function () {
    return redirect()->route("login");  
});

// Rotas de autenticação
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/do-login', [AuthController::class, 'login'])->name("do-login");

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Outras rotas administrativas
    Route::prefix('admin')->group(function () {
        Route::get('/sobre', [SobreMimController::class, 'index'])->name('sobre.index');
        Route::get('/sobre/create', [SobreMimController::class, 'create'])->name('sobre.create');
        Route::post('/sobre', [SobreMimController::class, 'store'])->name('sobre.store'); // Adiciona esta linha
        Route::get('/sobre/edit', [SobreMimController::class, 'edit'])->name('sobre.edit');
        Route::put('/sobre/{sobreMim}', [SobreMimController::class, 'update'])->name('sobre.update');

        // Rota de logout corrigida
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::resource('depoimentos', DepoimentoController::class);
        Route::resource('areas-atuacao', AreaAtuacaoController::class);
    });
});

Route::get('/favicon.ico', function () {
    return response()->file(public_path('favicon.ico'));
});
