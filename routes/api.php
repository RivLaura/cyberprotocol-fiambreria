<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductoApiController;
use App\Http\Controllers\Api\CategoriaApiController;
// Rutas de autenticación
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rutas protegidas por autenticación
Route::middleware('auth:sanctum')->group(function () {
    // Ruta para cerrar sesión
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::prefix('v1')->group(function () {

        // Rutas para productos
        Route::get('/productos', [ProductoApiController::class, 'index']);
        Route::get('/productos/stock-bajo', [ProductoApiController::class, 'stockBajo']);
        Route::get('/productos/{producto}', [ProductoApiController::class, 'show']);
        
        // Rutas para categorías
        Route::get('/categorias', [CategoriaApiController::class, 'index']);
    });
});

// Ruta para la documentación de la API - Bienvenida
Route::get('/', function () {
    return response()->json([
        'name' => 'CyberProtocol API',
        'version' => '1.0.0',
        'description' => 'API REST del Sistema de Gestión para Fiambrería.',
        'company' => 'CyberProtocol',
        'status' => 'online',
        'documentation' => [
            'productos' => '/api/v1/productos',
            'producto' => '/api/v1/productos/{id}',
        ],
    ]);
});