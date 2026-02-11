<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AluguelController;

Route::get('/', function () {
    return view('home');
});

Route::resource('carros', CarroController::class);
Route::resource('usuarios', UserController::class);
Route::resource('alugueis', AluguelController::class);
Route::put('/alugueis/{id}/devolver', [AluguelController::class, 'devolver'])
    ->name('alugueis.devolver');