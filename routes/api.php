<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StatsController;

// — RUTAS PÚBLICAS —

// Inscripción de participantes (pública)
Route::post('registrations', [RegistrationController::class, 'store']);

// Admin: register & login (sin token)
Route::prefix('admin')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login',    [AuthController::class, 'login']);
});

// Admin: rutas protegidas por JWT
Route::prefix('admin')
    ->middleware('auth:api')    // o 'jwt.auth' según config
    ->group(function () {

    // Logout
    Route::post('logout', [AuthController::class, 'logout']);

    // CRUD Categorías
    Route::apiResource('categories', CategoryController::class)
         ->except(['show']);

    // Gestión inscripciones (index, show, destroy)
    Route::apiResource('registrations', RegistrationController::class)
         ->only(['index','show','destroy']);

    // Estadísticas y reportes
    Route::get('stats',          [StatsController::class, 'index']);
    Route::get('stats/daily',    [StatsController::class, 'dailyRegistrations']);
    Route::get('stats/export',   [StatsController::class, 'export']);
});
