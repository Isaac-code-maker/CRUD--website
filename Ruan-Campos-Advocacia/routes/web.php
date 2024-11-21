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

