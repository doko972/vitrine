<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use Illuminate\Support\Facades\Route;

// Routes accessibles uniquement sans être connecté
Route::middleware('guest')->group(function () {
    Route::get('connexion',  [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('connexion', [AuthenticatedSessionController::class, 'store']);

    Route::get('mot-de-passe-oublie',  [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('mot-de-passe-oublie', [PasswordResetLinkController::class, 'store'])->name('password.email');

    Route::get('reinitialiser-mot-de-passe/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reinitialiser-mot-de-passe', [NewPasswordController::class, 'store'])->name('password.store');
});

// Routes accessibles uniquement une fois connecté
Route::middleware('auth')->group(function () {
    Route::get('confirmer-mot-de-passe',  [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirmer-mot-de-passe', [ConfirmablePasswordController::class, 'store']);

    Route::post('deconnexion', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
