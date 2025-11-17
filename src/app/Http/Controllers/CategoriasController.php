<?php

namespace App\Http\Controllers;

use App\Models\categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    // LISTAR
    public function index()
    {
        $categories = categorias::all();
        return view('categories.index', compact('categories'));
    }

    // FORMULARIO DE CREACIÓN
    public function create()
    {
        return view('categories.create');
    }

    // GUARDAR NUEVA CATEGORÍA
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable'
        ]);

        categorias::create($request->all());

        return redirect()->route('categories.index')
                        ->with('success', 'Categoría creada correctamente.');
    }

    // FORMULARIO DE EDICIÓN
    public function edit(categorias $category)
    {
        return view('categories.edit', compact('category'));
    }

    // ACTUALIZAR
    public function update(Request $request, categorias $category)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable'
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')
                        ->with('success', 'Categoría actualizada.');
    }

    // BORRAR
    public function destroy(categorias $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
                        ->with('success', 'Categoría eliminada.');
    }
}
