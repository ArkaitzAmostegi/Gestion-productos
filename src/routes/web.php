<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductosController;

//Crea la ruta para dirigir el flujo al layout
Route::get('/', fn() => view('layout'));


// CRUD de categorías
Route::resource('categories', CategoriasController::class);


// CRUD de productos
Route::resource('products', ProductosController::class);