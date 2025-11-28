<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ProveedorController;

//Crea la ruta para dirigir el flujo al layout, pasando el usuario
Route::get('/', function () {
    $usuario = App\Models\Usuario::first();
    return view('layout', compact('usuario'));
});

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

// CRUD de productos
Route::resource('proveedors', ProveedorController::class);
