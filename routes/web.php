<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\MediaController;
use App\Http\Controllers\Dashboard\MessagesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// ─── Site vitrine public ───────────────────────────────────────────────────────
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('entreprise')->name('entreprise.')->group(function () {
    Route::get('/', [EntrepriseController::class, 'index'])->name('index');
    Route::get('/contact', [ContactController::class, 'show'])->name('contact');
    Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
});

// ─── Auth (Breeze) ────────────────────────────────────────────────────────────
require __DIR__ . '/auth.php';

// ─── Dashboard privé (auth requis) ───────────────────────────────────────────
Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    // Profil administrateur
    Route::get('/profil',   [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profil', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profil/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

    // Settings par groupe
    Route::get('/identite',  [SettingController::class, 'identity'])->name('settings.identity');
    Route::post('/identite', [SettingController::class, 'updateIdentity'])->name('settings.identity.update');

    Route::get('/couleurs',  [SettingController::class, 'colors'])->name('settings.colors');
    Route::post('/couleurs', [SettingController::class, 'updateColors'])->name('settings.colors.update');

    Route::get('/contenu',   [SettingController::class, 'content'])->name('settings.content');
    Route::post('/contenu',  [SettingController::class, 'updateContent'])->name('settings.content.update');

    Route::get('/contact-config',   [SettingController::class, 'contact'])->name('settings.contact');
    Route::post('/contact-config',  [SettingController::class, 'updateContact'])->name('settings.contact.update');

    Route::get('/reseaux',   [SettingController::class, 'social'])->name('settings.social');
    Route::post('/reseaux',  [SettingController::class, 'updateSocial'])->name('settings.social.update');

    // Médias
    Route::get('/medias',             [MediaController::class, 'index'])->name('media.index');
    Route::post('/medias',            [MediaController::class, 'store'])->name('media.store');
    Route::delete('/medias/{key}',    [MediaController::class, 'destroy'])->name('media.destroy');

    // Messages de contact
    Route::get('/messages',           [MessagesController::class, 'index'])->name('messages.index');
    Route::get('/messages/{id}',      [MessagesController::class, 'show'])->name('messages.show');
    Route::delete('/messages/{id}',   [MessagesController::class, 'destroy'])->name('messages.destroy');
});
