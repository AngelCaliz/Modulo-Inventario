<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\ReporteController;

Route::middleware('auth:sanctum')->group(function () {
    
    // CU-16: Gestionar Ubicaciones
    Route::apiResource('ubicaciones', UbicacionController::class);

    // CU-17 y CU-18: Registrar Movimiento (Incluye Pérdida o Daño)
    Route::post('/movimientos', [MovimientoController::class, 'registrarMovimiento']);
    Route::get('/ejemplares/{ejemplarId}/historial', [MovimientoController::class, 'historialEjemplar']);

    // CU-19: Configurar Parámetros del Sistema
    Route::get('/configuraciones', [ConfiguracionController::class, 'index']);
    Route::post('/configuraciones', [ConfiguracionController::class, 'updateOrCreate']);

    // CU-20: Generar Reportes y Dashboard
    Route::get('/dashboard', [ReporteController::class, 'dashboard']);
    Route::get('/reportes/movimientos', [ReporteController::class, 'reporteMovimientos']);
});