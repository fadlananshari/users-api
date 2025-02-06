<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Middleware\LogRequestMiddleware;


Route::middleware(LogRequestMiddleware::class)->group(function () {
    Route::get('/users', [PenggunaController::class, 'index']);
    Route::get('/users/{id}', [PenggunaController::class, 'show']);
    Route::post('/users', [PenggunaController::class, 'store']);
    Route::put('/users/{id}', [PenggunaController::class, 'update']);
    Route::delete('/users/{id}', [PenggunaController::class, 'destroy']);
});