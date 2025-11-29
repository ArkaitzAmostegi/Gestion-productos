@extends('layout')

@section('content')
    {{-- Formulario para crear un nuevo producto --}}
    <h2>Crear Producto</h2>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf {{-- Protección CSRF obligatoria en formularios POST --}}

        {{-- Selección de categoría (relación 1:N) --}}
        <label for="idCategoria">Categoría:</label><br>
        <select name="idCategoria" id="idCategoria" required>
            <option value="">-- Selecciona una categoría --</option>

            {{-- Lista de categorías cargadas desde el controlador --}}
            @foreach($categorias as $category)
                <option value="{{ $category->id }}">{{ $category->nombre }}</option>
            @endforeach
        </select><br><br>

        {{-- Selección de proveedor (relación N:M) --}}
        <label for="proveedores">Proveedores:</label><br>
        <select name="proveedores[]" id="proveedores">
            <option value="">-- Selecciona un Proveedor --</option>

            {{-- Lista de proveedores existentes --}}
            @foreach ($proveedores as $proveedor)
                <option value="{{ $proveedor->id }}">
                    {{ $proveedor->nombre }}
                </option>
            @endforeach
        </select><br><br>

        <label for="nombre">Nombre del Producto:</label><br>
        <input type="text" name="nombre" id="nombre" required><br><br>

        <label for="precio">Precio:</label><br>
        <input type="number" step="0.01" name="precio" id="precio" required><br><br>

        <label for="stock">Stock:</label><br>
        <input type="number" name="stock" id="stock" required><br><br>

        {{-- Botón de acción --}}
        <button type="submit">Guardar Producto</button>
    </form>

    <br>
    <a href="{{ route('products.index') }}">Volver al listado</a>
@endsection
