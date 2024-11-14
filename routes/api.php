<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HealthCheckController;
use App\Http\Controllers\Api\TaskCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/health-check', HealthCheckController::class)->middleware('auth:sanctum');

Route::group(['prefix' => '/auth', 'controller' => AuthController::class], function () {
    Route::get('/user', 'user');
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::get('/logout', 'logout');
});

Route::group(['prefix' => '/task/categories', 'controller' => TaskCategoryController::class], function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{category}', 'show');
    Route::match(['put', 'patch'], '/{category}', 'update');
    Route::delete('/{category}', 'destroy');
});