@extends('layout')

@section('content')
    <h2>Crear Categoría</h2>
    
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        
        <label for="name">Nombre:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="description">Descripción:</label><br>
        <textarea id="description" name="description"></textarea><br><br>

        <button type="submit">Guardar Categoría</button>
    </form>
    
    <br>
    <a href="{{ route('categories.index') }}">Volver al listado</a>
@endsection
