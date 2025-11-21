@extends('layout')

@section('content')
    <h2>Listado de Productos</h2>
    <a href="{{ route('products.create') }}">Crear Nuevo Producto</a>
    <br><br>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Categoría</th>
                <th>Acciones Categorías</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones Productos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->categoria->nombre }}</td>
                <td>
                    <a href="{{ route('products.edit', $product) }}">Editar</a>

                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Borrar producto?')">Borrar</button>
                    </form>
                </td>
                <td>{{ $product->categoria->descripcion }}</td>
                <td>{{ $product->nombre }}</td>
                <td>{{ $product->precio }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <a href="{{ route('products.edit', $product) }}">Editar</a>

                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Borrar producto?')">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
