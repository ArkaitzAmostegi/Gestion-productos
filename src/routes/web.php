<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductosController;

//Crea la ruta para dirigir el flujo al layout
Route::get('/', function () {return view('layout');});


// Crea las rutas categories.index.
Route::get('/categories', [CategoriasController::class, 'index'])->name('categories.index');
Route::get('/categoriesCreate', [CategoriasController::class, 'create'])->name('categories.create');

// Crea las rutas products.index.
Route::get('/products', [ProductosController::class, 'index'])->name('products.index');