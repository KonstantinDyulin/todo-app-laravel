<?php

use App\Http\Controllers\Api\HealthCheckController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/health-check', HealthCheckController::class);