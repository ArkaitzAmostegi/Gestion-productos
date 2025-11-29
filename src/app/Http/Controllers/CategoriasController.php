<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    // LISTAR TODAS LAS CATEGORÍAS
    public function index()
    {
        $usuario = \App\Models\Usuario::first(); // Usuario temporal para mostrar en la vista
        $categories = Categoria::all(); // Consulta simple, no requiere relaciones

        return view('categories.index', compact('categories', 'usuario'));
    }

    // MOSTRAR FORMULARIO DE CREACIÓN
    public function create()
    {
        return view('categories.create');
    }

    // GUARDAR NUEVA CATEGORÍA
    public function store(Request $request)
    {
        // Validación mínima necesaria
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable'
        ]);

        // Mass assignment (fillable en el modelo debe estar bien configurado)
        Categoria::create($request->all());

        return redirect()->route('categories.index')
                        ->with('success', 'Categoría creada correctamente.');
    }

    // MOSTRAR FORMULARIO DE EDICIÓN
    public function edit(Categoria $category)
    {
        return view('categories.edit', compact('category')); 
    }

    // ACTUALIZAR CATEGORÍA
    public function update(Request $request, Categoria $category)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable'
        ]);

        $category->update($request->all()); // Actualización directa

        return redirect()->route('categories.index')
                        ->with('success', 'Categoría actualizada.');
    }

    // BORRAR CATEGORÍA (evita borrar si tiene productos asociados)
    public function destroy(Categoria $category)
    {
        try {
            $category->delete(); // Lanzará excepción si hay FK de productos
            return redirect()
                ->route('categories.index')
                ->with('success', 'Categoría eliminada.');
                
        } catch (\Illuminate\Database\QueryException $e) {
            // Error típico: restricción de clave foránea
            return redirect()
                ->route('categories.index')
                ->with('error', 'No puedes borrar esta categoría porque tiene productos asociados.');
        }
    }
}
