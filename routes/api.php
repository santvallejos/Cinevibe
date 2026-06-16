<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SeatApiController;

/*
|--------------------------------------------------------------------------
| API Routes — Asientos / Reservas Temporales
|--------------------------------------------------------------------------
| Rutas protegidas por autenticación (sesión web) para gestionar
| bloqueos temporales de butacas antes de la compra.
*/

Route::middleware('auth')->prefix('seats')->group(function () {
    // Estado actual de todas las butacas de un showtime
    Route::get('/status', [SeatApiController::class, 'status'])->name('api.seats.status');

    // Bloquear una butaca temporalmente
    Route::post('/reserve', [SeatApiController::class, 'reserve'])->name('api.seats.reserve');

    // Liberar una butaca específica
    Route::post('/release', [SeatApiController::class, 'release'])->name('api.seats.release');

    // Liberar todas las butacas del usuario para un showtime
    Route::post('/release-all', [SeatApiController::class, 'releaseAll'])->name('api.seats.release-all');
});
