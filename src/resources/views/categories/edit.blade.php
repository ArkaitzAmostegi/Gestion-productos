@extends('layout')

@section('content')
    <h2>Editar Categoría</h2>

    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="name">Nombre:</label><br>
        <input type="text" id="name" name="name" value="{{ $category->name }}" required><br><br>

        <label for="description">Descripción:</label><br>
        <textarea id="description" name="description">{{ $category->description }}</textarea><br><br>

        <button type="submit">Actualizar Categoría</button>
    </form>

    <br>
    <a href="{{ route('categories.index') }}">Volver al listado</a>
@endsection
