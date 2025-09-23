<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColaboradorController;

Route::get('/', function () {
    return redirect()->route('colaboradores.index');
});

Route::resource('colaboradores', ColaboradorController::class);
