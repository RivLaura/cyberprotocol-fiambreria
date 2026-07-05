<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\VentaProcesoController;
use App\Http\Controllers\OpenFoodFactsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
    
// QUIÉNES SOMOS
    Route::view('/quienes-somos', 'quienes-somos')
    ->name('quienes-somos');

Route::middleware('auth')->group(function () {
    // PERFIL
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CATEGORÍAS
    Route::get('/categorias', [CategoriaController::class, 'index'])
        ->name('categorias.index');

    Route::get('/categorias/crear', [CategoriaController::class, 'create'])
        ->name('categorias.create');

    Route::post('/categorias', [CategoriaController::class, 'store'])
        ->name('categorias.store');

    Route::get('/categorias/{categoria}/editar', [CategoriaController::class, 'edit'])
        ->name('categorias.edit');

    Route::put('/categorias/{categoria}', [CategoriaController::class, 'update'])
        ->name('categorias.update');

    Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy']) // O CategoriaController si fue un typo del pull
        ->name('categorias.destroy');

    // PRODUCTOS
    Route::get('/productos', [ProductoController::class, 'index'])
        ->name('productos.index');

    Route::get('/productos/crear', [ProductoController::class, 'create'])
        ->name('productos.create');

    Route::post('/productos', [ProductoController::class, 'store'])
        ->name('productos.store');

    Route::get('/productos/{producto}/editar', [ProductoController::class, 'edit'])
        ->name('productos.edit');

    Route::put('/productos/{producto}', [ProductoController::class, 'update'])
        ->name('productos.update');

    Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])
        ->name('productos.destroy');

    // OPENFOODFACTS
    Route::get('/openfoodfacts/{codigo}', [OpenFoodFactsController::class, 'buscar'])
    ->name('openfoodfacts.buscar');

    // CLIENTES
    Route::get('/clientes', [ClienteController::class, 'index'])
        ->name('clientes.index');

    Route::get('/clientes/create', [ClienteController::class, 'create'])
        ->name('clientes.create');

    Route::post('/clientes', [ClienteController::class, 'store'])
        ->name('clientes.store');

    Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])
    ->name('clientes.edit');

    Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])
        ->name('clientes.update');

    Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])
        ->name('clientes.destroy');

    // VENTAS
    Route::get('/ventas', [VentaController::class, 'index'])
        ->name('ventas.index');

    Route::get('/ventas/crear', [VentaController::class, 'create'])
    ->name('ventas.create');

    Route::post('/ventas', [VentaController::class, 'store'])
        ->name('ventas.store');

    // Exportar ventas a Excel
    Route::get('/ventas/export/excel', [VentaController::class, 'exportExcel'])
    ->name('ventas.export.excel');

    // CARRITO
    Route::post('/carrito/agregar', [CarritoController::class, 'add'])
        ->name('carrito.add');

    Route::delete('/carrito', [CarritoController::class, 'clear'])
        ->name('carrito.clear');

    Route::delete('/carrito/{producto}', [CarritoController::class, 'destroy'])
        ->name('carrito.destroy');

    // PROCESAR VENTA
    Route::post('/ventas/procesar', [VentaProcesoController::class, 'store'])
        ->name('ventas.procesar');

    Route::get('/ventas/{venta}', [VentaController::class, 'show'])
    ->name('ventas.show');
});

require __DIR__ . '/auth.php';