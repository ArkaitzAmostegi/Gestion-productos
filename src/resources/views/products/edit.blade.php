@extends('layout')

@section('content')
    <h2>Editar Producto</h2>

    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="idCategoria">Categoría:</label><br>
        <select name="idCategoria" id="idCategoria" required>
            <option value="">-- Selecciona una categoría --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->nombre }}</option>
            @endforeach
        </select><br><br>

        <label for="nombre">Nombre del Producto:</label><br>
        <input type="text" name="nombre" value="{{ $product->nombre }}" required><br><br>

        <label for="precio">Precio:</label><br>
        <input type="number" step="0.01" name="precio" value="{{ $product->precio }}" required><br><br>

        <label for="stock">Stock:</label><br>
        <input type="number" name="stock" value="{{ $product->stock }}" required><br><br>

        <button type="submit">Actualizar Producto</button>
    </form>

    <br>
    <a href="{{ route('products.index') }}">Volver al listado</a>
@endsection
