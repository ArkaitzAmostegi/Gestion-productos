@extends('layout')

@section('content')
    <h2>Crear Categoría</h2>
    
    {{-- Formulario para crear una nueva categoría --}}
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf {{-- Protección contra CSRF obligatoria en formularios POST --}}
        
        {{-- Nombre obligatorio de la categoría --}}
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        {{-- Descripción opcional --}}
        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion"></textarea><br><br>

        <button type="submit">Guardar Categoría</button>
    </form>
    
    <br>
    
    {{-- Enlace para volver al listado de categorías --}}
    <a href="{{ route('categories.index') }}">Volver al listado</a>
@endsection
