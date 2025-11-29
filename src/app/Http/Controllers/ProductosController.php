<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    // LISTADO
    public function index()
    {
        $usuario = \App\Models\Usuario::first(); //Pasa el usuario a esta vista
        $products = Producto::with('categoria')->get();
        $proveedores = Proveedor::with('productos')->get();

        return view('products.index', compact('products', 'usuario', 'proveedores'));
    }

    // FORMULARIO DE CREACIÓN
    public function create()
    {
        $usuario = \App\Models\Usuario::first();
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();

        return view('products.create', compact('categorias', 'proveedores', 'usuario'));
    }

    // GUARDAR EN BD
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'stock'  => 'required|integer',
            'idCategoria' => 'required',
            'proveedores' => 'array', // viene del select multiple
        ]);

        $producto = Producto::create($request->only([
            'nombre', 'precio', 'stock', 'idCategoria'
        ]));

        // Guardar proveedores seleccionados
        if ($request->proveedores) {
            $producto->proveedores()->sync($request->proveedores);
        }

        return redirect()
            ->route('products.index')
            ->with('success', 'Producto creado correctamente.');
    }

    // FORMULARIO DE EDICIÓN
    public function edit(Producto $product)
    {
        
        $usuario = \App\Models\Usuario::first();
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();


        return view('products.edit', compact('product', 'categorias', 'usuario', 'proveedores'));
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

        // Actualiza los campos del producto
        $product->update($request->only(['nombre', 'precio', 'stock', 'idCategoria']));
        // Actualiza la relación N:M con proveedores
        $product->proveedores()->sync($request->proveedores ?? []);

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
