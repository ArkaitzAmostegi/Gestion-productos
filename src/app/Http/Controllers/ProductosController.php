<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    // LISTADO
    public function index()
    {
        $usuario = \App\Models\Usuario::first(); //Pasa el usuario a esta vista
        $products = Producto::with('categoria')->get();

        return view('products.index', compact('products', 'usuario'));
    }

    // FORMULARIO DE CREACIÓN
    public function create()
    {
        $categories = Categoria::all();

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

        Producto::create($request->all());

        return redirect()
            ->route('products.index')
            ->with('success', 'Producto creado correctamente.');
    }

    // FORMULARIO DE EDICIÓN
    public function edit(Producto $product)
    {
        
        $categories = Categoria::all();

        return view('products.edit', compact('product', 'categories'));
    }

    // ACTUALIZAR EN BD
    public function update(Request $request, Producto $product)
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
    public function destroy(Producto $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Producto eliminado.');
    }
}
