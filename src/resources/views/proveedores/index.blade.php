@extends('layout')

@section('content')
    <h2>Gestión de Proveedores</h2>

    {{-- Enlace para crear un nuevo proveedor --}}
    <a href="{{ route('proveedors.create') }}">Crear Nuevo proveedor</a>
    <br><br>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Productos que provee</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($proveedors as $proveedor)
            <tr>
                {{-- Datos básicos del proveedor --}}
                <td>{{ $proveedor->id }}</td>
                <td>{{ $proveedor->nombre }}</td>
                <td>{{ $proveedor->direccion }}</td>
                <td>{{ $proveedor->telefono }}</td>

                {{-- Listado de productos asociados al proveedor --}}
                <td>
                    @if ($proveedor->productos->isEmpty())
                        {{-- Caso: el proveedor no tiene productos --}}
                        <em>Sin productos</em>
                    @else
                        {{-- Lista sin viñetas usando clase CSS --}}
                        <ul class="sin-puntos">
                            @foreach ($proveedor->productos as $producto)
                                <li>
                                    {{ $producto->nombre }} 
                                    (Stock: {{ $producto->stock }})
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </td>

                {{-- Acciones de edición y borrado --}}
                <td>
                    <a href="{{ route('proveedors.edit', $proveedor) }}">Editar</a>

                    <form action="{{ route('proveedors.destroy', $proveedor) }}" 
                            method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')

                        {{-- Protección con confirm() para evitar borrados accidentales --}}
                        <button type="submit" onclick="return confirm('¿Borrar proveedor?')">
                            Borrar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
