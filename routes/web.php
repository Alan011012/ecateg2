<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlvaraController;

Route::get('/', function () {
    return redirect()->route('alvaras.index');
});

Route::resource('alvaras', AlvaraController::class);
Route::get('alvaras/{alvara}/historico', [AlvaraController::class, 'historico'])->name('alvaras.historico');
