@extends('layout')

@section('content')
    <h2>Editar Producto</h2>

    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="category_id">Categoría:</label><br>
        <select name="category_id" id="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" 
                    {{ $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select><br><br>

        <label for="name">Nombre del Producto:</label><br>
        <input type="text" name="name" value="{{ $product->name }}" required><br><br>

        <label for="price">Precio:</label><br>
        <input type="number" step="0.01" name="price" value="{{ $product->price }}" required><br><br>

        <label for="stock">Stock:</label><br>
        <input type="number" name="stock" value="{{ $product->stock }}" required><br><br>

        <button type="submit">Actualizar Producto</button>
    </form>

    <br>
    <a href="{{ route('products.index') }}">Volver al listado</a>
@endsection
