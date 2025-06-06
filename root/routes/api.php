<?php

use App\Http\Controllers\Admin\ApiUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')
    ->name('admin.api.')
    ->group(function() {
        Route::get('/getuser', [ApiUserController::class, 'getUsers']);
    });

Route::get('/user',[ApiUserController::class, 'getUsers'])->middleware('auth:sanctum');
