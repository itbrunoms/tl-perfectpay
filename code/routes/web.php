<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ChargeController;
use App\Http\Controllers\ClientController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/desafio', function () {
    return view('desafio.index');
})->name('desafio.index');

Route::prefix('charges')->group(function () {
    Route::get('index', [ChargeController::class, 'index'])->name('charges.index');
    Route::get('create/{id?}', [ChargeController::class, 'create'])->name('charges.create');
    Route::post('store', [ChargeController::class, 'store'])->name('charges.store');
    Route::get('charges/{charge}', [ChargeController::class, 'view'])->name('charges.view');
});

Route::prefix('client')->group(function () {
    Route::get('index', [ClientController::class, 'index'])->name('clients.list');
    Route::post('store', [ClientController::class, 'store'])->name('clients.store');
});
