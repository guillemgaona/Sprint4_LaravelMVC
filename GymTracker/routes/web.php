<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EjercicioController;
use App\Http\Controllers\SesionController;



Route::get('/', function () {
    return redirect()->route('ejercicios.index');
});

Route::resource('ejercicios', EjercicioController::class);
Route::resource('sesiones', SesionController::class)->parameters(['sesiones' => 'sesion']);

require __DIR__.'/auth.php';
