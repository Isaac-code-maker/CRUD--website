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
        Route::get('/sobre/edit', [SobreMimController::class, 'edit'])->name('sobre.edit');
        Route::put('/sobre', [SobreMimController::class, 'update'])->name('sobre.update');

        
        /*
         * Sem essa rota dava erro pois o arquivo dashboard.blade.php pedia essa rota para funcionar
         * TODO: implementar logout dps
        */
        Route::get("/logout")->name("logout");

        Route::resource('depoimentos', DepoimentoController::class);
        Route::resource('areas-atuacao', AreaAtuacaoController::class);
    });
});

