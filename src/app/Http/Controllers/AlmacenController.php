<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;

class AlmacenController extends Controller
{
    public function index()
    {
        // Obtiene el primer usuario (implementación provisional hasta tener auth real)
        $usuario = \App\Models\Usuario::first(); // Pasa el usuario a esta vista
        
        // Carga todas las categorías y añade un contador de productos por categoría
        // withCount evita N+1 porque genera un subquery optimizado
        $categories = Categoria::withCount('productos')->get();

        // Obtiene todos los productos con sus categorías relacionadas (JOIN interno)
        // Evita consultas adicionales por cada producto
        $products = Producto::with('categoria')->get();

        // Retorna la vista principal del almacén con la data preparada
        return view('almacen.index', compact('categories', 'products', 'usuario'));
    }
}
