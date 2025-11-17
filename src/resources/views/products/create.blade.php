@extends('layout')

@section('content')
    <h2>Crear Producto</h2>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <label for="category_id">Categoría:</label><br>
        <select name="category_id" id="category_id" required>
            <option value="">-- Selecciona una categoría --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select><br><br>

        <label for="name">Nombre del Producto:</label><br>
        <input type="text" name="name" id="name" required><br><br>

        <label for="price">Precio:</label><br>
        <input type="number" step="0.01" name="price" id="price" required><br><br>

        <label for="stock">Stock:</label><br>
        <input type="number" name="stock" id="stock" required><br><br>

        <button type="submit">Guardar Producto</button>
    </form>

    <br>
    <a href="{{ route('products.index') }}">Volver al listado</a>
@endsection
