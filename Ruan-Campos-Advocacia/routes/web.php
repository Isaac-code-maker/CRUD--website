<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SobreMimController;
use App\Http\Controllers\DepoimentoController;
use App\Http\Controllers\AreaAtuacaoController;

Route::get('/', function () {
    return view('home');
});



Route::middleware(['auth'])->group(function () {
    Route::resource('sobre', SobreMimController::class)->only(['home', 'edit', 'update']);
    Route::resource('depoimentos', DepoimentoController::class);
    Route::resource('areas-atuacao', AreaAtuacaoController::class);
});

// Exibe o formulário de login
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');

// Efetua o login
Route::post('login', [AuthController::class, 'login']);

// Logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

