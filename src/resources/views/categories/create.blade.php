@extends('layout')

@section('content')
    <h2>Crear Categoría</h2>
    
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion"></textarea><br><br>

        <button type="submit">Guardar Categoría</button>
    </form>
    
    <br>
    <a href="{{ route('categories.index') }}">Volver al listado</a>
@endsection
