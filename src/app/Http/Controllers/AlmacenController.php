<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class AlmacenController extends Controller

{
    public function index(){
        // Datos que a mostrar
        $categories = Categoria::all();
        $products = Producto::all();

        return view('almacen.index', compact('categories', 'products'));
    }
}