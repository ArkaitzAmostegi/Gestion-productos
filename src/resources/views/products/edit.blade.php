@extends('layout')

@section('content')
    <h2>Editar Producto</h2>

    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- CATEGORÍA --}}
        <label for="idCategoria">Categoría:</label><br>
        <select name="idCategoria" id="idCategoria" required>
            @foreach($categorias as $category)
                <option value="{{ $category->id }}"
                    @selected($product->idCategoria == $category->id)>
                    {{ $category->nombre }}
                </option>
            @endforeach
        </select><br><br>

        {{-- NOMBRE --}}
        <label for="nombre">Nombre del Producto:</label><br>
        <input type="text" name="nombre" id="nombre"
                value="{{ old('nombre', $product->nombre) }}" required><br><br>

        {{-- PROVEEDORES --}}
        <label for="proveedores">Proveedores:</label><br>
        <select name="proveedores[]" id="proveedores" multiple size="5">
            @foreach ($proveedores as $prov)
                <option value="{{ $prov->id }}"
                    @selected($product->proveedores->contains($prov->id))>
                    {{ $prov->nombre }}
                </option>
            @endforeach
        </select><br><br>

        {{-- PRECIO --}}
        <label for="precio">Precio:</label><br>
        <input type="number" step="0.01" name="precio" id="precio"
                value="{{ old('precio', $product->precio) }}" required><br><br>

        {{-- STOCK --}}
        <label for="stock">Stock:</label><br>
        <input type="number" name="stock" id="stock"
                value="{{ old('stock', $product->stock) }}" required><br><br>

        <button type="submit">Guardar cambios</button>
    </form>

    <br>
    <a href="{{ route('products.index') }}">Volver al listado</a>
@endsection
