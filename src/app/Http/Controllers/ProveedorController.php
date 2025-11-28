<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuario = \App\Models\Usuario::first(); //Pasa el usuario a esta vista
        
        $proveedors = Proveedor::with('productos')->get();

        return view('proveedores.index', compact('proveedors', 'usuario'));
    }

   // FORMULARIO CREACIÓN
    public function create()
    {
        $usuario = \App\Models\Usuario::first();
        return view('proveedores.create', compact('usuario'));
    }

    // GUARDAR EN BD
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:50',
        ]);

        Proveedor::create($request->all());

        return redirect()
            ->route('proveedors.index')
            ->with('success', 'Proveedor creado correctamente.');
    }

    //EDITAR proveedor
    public function edit(Proveedor $proveedor)
    {
        $usuario = \App\Models\Usuario::first();
        return view('proveedores.edit', compact('proveedor', 'usuario'));
    }


    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:50',
        ]);

        $proveedor->update($request->all());

        return redirect()
            ->route('proveedors.index')
            ->with('success', 'Proveedor actualizado correctamente.');
    }

    //ELIMINAR Proveedor
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return redirect()
            ->route('proveedors.index')
            ->with('success', 'Proveedor eliminado correctamente.');
    }

}