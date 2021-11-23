<?php

use App\Http\Controllers\OAuth\AuthenticatedSessionController;
use App\Http\Controllers\OAuth\ConfirmablePasswordController;
use App\Http\Controllers\OAuth\EmailVerificationNotificationController;
use App\Http\Controllers\OAuth\EmailVerificationPromptController;
use App\Http\Controllers\OAuth\NewPasswordController;
use App\Http\Controllers\OAuth\PasswordResetLinkController;
use App\Http\Controllers\OAuth\RegisteredUserController;
use App\Http\Controllers\OAuth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::get('/passport/register', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('passport.register');

Route::post('/passport/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest');

Route::get('/passport/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('passport.login');

Route::post('/passport/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');

Route::get('/passport/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest')
                ->name('passport.password.request');

Route::post('/passport/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest')
                ->name('passport.password.email');

Route::get('/passport/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest')
                ->name('passport.password.reset');

Route::post('/passport/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest')
                ->name('passport.password.update');

Route::get('/passport/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware('auth')
                ->name('passport.verification.notice');

Route::get('/passport/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth', 'signed', 'throttle:6,1'])
                ->name('passport.verification.verify');

Route::post('/passport/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth', 'throttle:6,1'])
                ->name('passport.verification.send');

Route::get('/passport/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth')
                ->name('passport.password.confirm');

Route::post('/passport/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth');

Route::post('/passport/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('passport.logout');
