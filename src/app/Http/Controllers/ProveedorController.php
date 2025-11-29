<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller
{
    // Muestra el listado de proveedores.
    // Carga también los productos asociados para evitar consultas N+1.
    public function index()
    {
        $usuario = \App\Models\Usuario::first(); // Usuario para mostrar en el layout
        
        // Carga proveedores junto con los productos que suministran
        $proveedors = Proveedor::with('productos')->get();

        return view('proveedores.index', compact('proveedors', 'usuario'));
    }

    // FORMULARIO CREACIÓN
    public function create()
    {
        $usuario = \App\Models\Usuario::first();
        return view('proveedores.create', compact('usuario'));
    }

    
    //Guarda un nuevo proveedor en la BD.
    // Valida información básica antes de crear.
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:50',
        ]);

        // Crea el proveedor con los campos permitidos
        Proveedor::create($request->all());

        return redirect()
            ->route('proveedors.index')
            ->with('success', 'Proveedor creado correctamente.');
    }

    
    //Formulario de edición de proveedor.
    //Laravel inyecta automáticamente el modelo correspondiente.
    public function edit(Proveedor $proveedor)
    {
        $usuario = \App\Models\Usuario::first();
        
        return view('proveedores.edit', compact('proveedor', 'usuario'));
    }

    // Actualiza un proveedor existente.
    
    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:50',
        ]);

        // Actualiza los datos del proveedor
        $proveedor->update($request->all());

        return redirect()
            ->route('proveedors.index')
            ->with('success', 'Proveedor actualizado correctamente.');
    }

    /**
     * Elimina un proveedor.
     * Si tiene productos relacionados, MYSQL impedirá la eliminación
     * (según relaciones N:M en pivot).
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return redirect()
            ->route('proveedors.index')
            ->with('success', 'Proveedor eliminado correctamente.');
    }

}
