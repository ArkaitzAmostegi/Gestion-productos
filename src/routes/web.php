<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductosController;

//Crea la ruta para dirigir el flujo al layout
Route::get('/', fn() => view('layout'));


// CRUD de categorías
Route::resource('categories', CategoriasController::class);


// Crea la ruta products, index.
Route::get('/products', [ProductosController::class, 'index'])->name('products.index');