<?php

namespace App\Http\Controllers;

use App\Models\productos;
use App\Models\categorias;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    // LISTADO
    public function index()
    {
        // Traer productos con su categoría asociada
        $products = productos::with('categoria')->get();

        return view('products.index', compact('products'));
    }

    // FORMULARIO DE CREACIÓN
    public function create()
    {
        // Necesitamos las categorías para el select
        $categories = categorias::all();

        return view('products.create', compact('categories'));
    }

    // GUARDAR EN BD
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'idCategoria' => 'required|exists:categorias,id'
        ]);

        productos::create($request->all());

        return redirect()
            ->route('products.index')
            ->with('success', 'Producto creado correctamente.');
    }

    // FORMULARIO DE EDICIÓN
    public function edit(productos $product)
    {
        $categories = categorias::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // ACTUALIZAR EN BD
    public function update(Request $request, productos $product)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'idCategoria' => 'required|exists:categorias,id'
        ]);

        $product->update($request->all());

        return redirect()
            ->route('products.index')
            ->with('success', 'Producto actualizado.');
    }

    // BORRAR
    public function destroy(productos $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Producto eliminado.');
    }
}
