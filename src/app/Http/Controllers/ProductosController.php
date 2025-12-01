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
        $usuario = \App\Models\Usuario::first(); // Usuario mostrado en la cabecera

        // Carga productos con su categoría para evitar consultas N+1
        $products = Producto::with('categoria')->get();

        // Obtiene proveedores junto a los productos que suministran
        $proveedores = Proveedor::with('productos')->get();

        return view('products.index', compact('products', 'usuario', 'proveedores'));
    }

    // FORMULARIO DE CREACIÓN
    public function create()
    {
        $usuario = \App\Models\Usuario::first();
        $categorias = Categoria::all();   // Categorías disponibles para asignar
        $proveedores = Proveedor::all();  // Proveedores existentes

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
            
            // VALIDACIÓN OBLIGATORIA
            'proveedores' => 'required|array|min:1',
            'proveedores.*' => 'exists:proveedors,id',
        ]);

        $producto = Producto::create($request->only([
            'nombre', 'precio', 'stock', 'idCategoria'
        ]));

        // Asigna proveedores
        $producto->proveedores()->sync($request->proveedores);

        return redirect()
            ->route('products.index')
            ->with('success', 'Producto creado correctamente.');
    }


    // FORMULARIO DE EDICIÓN
    public function edit(Producto $product)
    {
        $usuario = \App\Models\Usuario::first();
        $categorias = Categoria::all();   // Todas las categorías para seleccionar
        $proveedores = Proveedor::all();  // Se muestran todos para marcar los asociados

        return view('products.edit', compact('product', 'categorias', 'usuario', 'proveedores'));
    }

    // ACTUALIZAR EN BD
    public function update(Request $request, Producto $product)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'idCategoria' => 'required|exists:categorias,id',

            // Obligatorio seleccionar algún proveedor
            'proveedores' => 'required|array|min:1',
            'proveedores.*' => 'exists:proveedors,id',
        ]);

        $product->update($request->only(['nombre', 'precio', 'stock', 'idCategoria']));

        // sincroniza proveedores
        $product->proveedores()->sync($request->proveedores);

        return redirect()
            ->route('products.index')
            ->with('success', 'Producto actualizado.');
    }


    // BORRAR
    public function destroy(Producto $product)
    {
        // Elimina el producto (la relación pivot se borra automáticamente)
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Producto eliminado.');
    }
}
