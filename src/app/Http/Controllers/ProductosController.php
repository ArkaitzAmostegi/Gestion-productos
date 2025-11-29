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
        // Validación de campos básicos y del select múltiple de proveedores
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'stock'  => 'required|integer',
            'idCategoria' => 'required',
            'proveedores' => 'array', // IDs de proveedores seleccionados
        ]);

        // Solo se guardan los campos permitidos
        $producto = Producto::create($request->only([
            'nombre', 'precio', 'stock', 'idCategoria'
        ]));

        // Asigna los proveedores al producto (relación N:M)
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
        $categorias = Categoria::all();   // Todas las categorías para seleccionar
        $proveedores = Proveedor::all();  // Se muestran todos para marcar los asociados

        return view('products.edit', compact('product', 'categorias', 'usuario', 'proveedores'));
    }

    // ACTUALIZAR EN BD
    public function update(Request $request, Producto $product)
    {
        // Valida cambios básicos antes de actualizar
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'idCategoria' => 'required|exists:categorias,id'
        ]);

        // Actualiza solo los campos permitidos
        $product->update($request->only(['nombre', 'precio', 'stock', 'idCategoria']));

        // Sincroniza proveedores seleccionados (si no vienen, limpia la relación)
        $product->proveedores()->sync($request->proveedores ?? []);

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
