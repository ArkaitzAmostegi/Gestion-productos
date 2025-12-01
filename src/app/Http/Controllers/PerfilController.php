<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    
     // Muestra el perfil del usuario.
     // Solo hay un perfil asociado al usuario_id = 1 (configuración fija).
     
    public function index()
    {
        $usuario = \App\Models\Usuario::first(); // Usuario cargado para mostrar en la vista

        // Obtiene el perfil asociado al usuario con id=1
        // Si en el futuro quieres perfiles dinámicos, esto deberá adaptarse
        $perfil = Perfil::where('usuario_id', 1)->first();

        return view('perfil.index', compact('perfil', 'usuario'));
    }

}
