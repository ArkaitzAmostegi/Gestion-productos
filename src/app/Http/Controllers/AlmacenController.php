<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;

class AlmacenController extends Controller
{
    public function index()
    {
        $usuario = \App\Models\Usuario::first(); //Pasa el usuario a esta vista
        $categories = Categoria::withCount('productos')->get();
        $products   = Producto::with('categoria')->get();

        return view('almacen.index', compact('categories', 'products', 'usuario'));
    }
}
