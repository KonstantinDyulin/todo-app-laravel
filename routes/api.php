<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HealthCheckController;
use Illuminate\Support\Facades\Route;

Route::get('/health-check', HealthCheckController::class)->middleware('auth:sanctum');

Route::group(['prefix' => '/auth', 'controller' => AuthController::class], function () {
    Route::get('/user', 'user');
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::get('/logout', 'logout');
});