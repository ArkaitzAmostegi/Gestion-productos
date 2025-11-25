<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\PerfilController;

//Crea la ruta para dirigir el flujo al layout
Route::get('/', fn() => view('layout'));


// CRUD de categorías
Route::resource('categories', CategoriasController::class);

// CRUD de productos
Route::resource('products', ProductosController::class);

//Mostrar vista inventario
Route::get('/almacen', [AlmacenController::class, 'index'])->name('almacen.index');

//Mostrar vista perfil
Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil.index');

//Muestra el usuario
Route::get('usuario', [UsuarioController::class, 'index'])->name('usuario.index');
