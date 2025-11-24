@extends('layout')

@section('content')
    <h2>ALMACÉN GENERAL</h2>
    <hr><br>

    {{-- ===============================
        SECCIÓN CATEGORÍAS
    =================================== --}}
    <h3>Categorías</h3>
    <a href="{{ route('categories.create') }}">➕ Crear Categoría</a>
    <br><br>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Productos Asociados</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->nombre }}</td>
                <td>{{ $category->descripcion }}</td>

                {{-- Número de productos --}}
                <td>{{ $category->productos_count }}</td>

                <td>
                    {{-- Editar --}}
                    <a href="{{ route('categories.edit', $category) }}">Editar</a>

                    {{-- Borrar categoría SOLO si no tiene productos --}}
                    @if ($category->productos_count == 0)
                        <form action="{{ route('categories.destroy', $category) }}"
                              method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('¿Borrar categoría?')">Borrar</button>
                        </form>
                    @else
                        <button disabled title="No se puede borrar: tiene productos">
                            Borrar
                        </button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br><hr><br>

    {{-- ===============================
        SECCIÓN PRODUCTOS
    =================================== --}}
    <h3>Productos</h3>
    <a href="{{ route('products.create') }}">➕ Crear Producto</a>
    <br><br>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Categoría</th>
                <th>Descripción categoría</th>
                <th>Nombre producto</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->categoria->nombre }}</td>
                <td>{{ $product->categoria->descripcion }}</td>

                <td>{{ $product->nombre }}</td>
                <td>{{ $product->precio }}</td>
                <td>{{ $product->stock }}</td>

                <td>
                    <a href="{{ route('products.edit', $product) }}">Editar</a>

                    <form action="{{ route('products.destroy', $product) }}"
                          method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('¿Borrar producto?')">
                            Borrar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection
