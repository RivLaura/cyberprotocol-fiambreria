<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
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
});
    


require __DIR__.'/auth.php';
