<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\AlmacenController;

//Crea la ruta para dirigir el flujo al layout
Route::get('/', fn() => view('layout'));


// CRUD de categorías
Route::resource('categories', CategoriasController::class);

// CRUD de productos
Route::resource('products', ProductosController::class);

//Mostrar vista inventario
Route::resource('almacen', AlmacenController::class);