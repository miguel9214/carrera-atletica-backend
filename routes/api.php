<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StatsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// — RUTAS PÚBLICAS —

// Inscripción de participantes (pública)
Route::post('registrations', [RegistrationController::class, 'store']);

// Registro/Login de administradores
Route::post('admin/register', [AuthController::class, 'register']);
Route::post('admin/login',    [AuthController::class, 'login']);


// — RUTAS PROTEGIDAS (JWT) —
Route::middleware('auth:api')->group(function () {

    // Logout de administrador
    Route::post('admin/logout', [AuthController::class, 'logout']);

    // CRUD de categorías
    Route::apiResource('categories', CategoryController::class);

    // Gestión de inscripciones (solo admin)
    Route::get('registrations',        [RegistrationController::class, 'index']);
    Route::get('registrations/{id}',   [RegistrationController::class, 'show']);
    Route::delete('registrations/{id}',[RegistrationController::class, 'destroy']);

    // Estadísticas y reportes
    Route::get('stats',                 [StatsController::class, 'index']);
    Route::get('daily-registrations',   [StatsController::class, 'dailyRegistrations']);
    Route::get('export-registrations',  [StatsController::class, 'export']);
});
