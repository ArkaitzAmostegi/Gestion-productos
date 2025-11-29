@extends('layout')

@section('content')
    {{-- Título y acceso a creación --}}
    <h2>Listado de Productos</h2>
    <a href="{{ route('products.create') }}">Crear Nuevo Producto</a>
    <br><br>

    {{-- Tabla principal --}}
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Categoría</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Proveedor</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>

                {{-- Relación con categoría (belongsTo) --}}
                <td>{{ $product->categoria->nombre }}</td>

                <td>{{ $product->nombre }}</td>
                <td>{{ $product->precio }}</td>
                <td>{{ $product->stock }}</td>

                {{-- Relación N:M: un producto puede tener varios proveedores --}}
                <td>
                    @foreach ($product->proveedores as $prov)
                        {{ $prov->nombre }}<br>
                    @endforeach
                </td>

                {{-- Acciones CRUD --}}
                <td>
                    <a href="{{ route('products.edit', $product) }}">Editar</a>

                    <form action="{{ route('products.destroy', $product) }}"
                            method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                onclick="return confirm('¿Borrar producto?')">
                            Borrar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
