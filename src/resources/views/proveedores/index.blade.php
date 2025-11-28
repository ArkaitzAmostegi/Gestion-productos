@extends('layout')

@section('content')
    <h2>Listado de proveedores</h2>
    <a href="{{ route('proveedors.create') }}">Crear Nuevo proveedor</a>
    <br><br>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proveedors as $proveedor)
            <tr>
                <td>{{ $proveedor->id }}</td>
                <td>{{ $proveedor->nombre }}</td>
                <td>{{ $proveedor->direccion }}</td>
                <td>{{ $proveedor->telefono }}</td>
                <td>
                    <a href="{{ route('proveedors.edit', $proveedor) }}">Editar</a>

                    <form action="{{ route('proveedors.destroy', $proveedor) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Borrar proveedor?')">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
