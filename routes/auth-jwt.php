<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JWT\AuthenticatedSessionController;

Route::post('/jwt/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest')
                ->name('jwt.login');

Route::post('/jwt/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('jwt.logout');
