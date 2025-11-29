@extends('layout')

@section('content')
    <h2>Listado de Categorías</h2>

    {{-- Enlace para crear una nueva categoría --}}
    <a href="{{ route('categories.create') }}">Crear Nueva Categoría</a>
    <br><br>

    {{-- Tabla con todas las categorías registradas --}}
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th> {{-- Editar / Borrar --}}
            </tr>
        </thead>

        <tbody>
            @foreach ($categories as $category)
            <tr>
                {{-- Datos básicos de la categoría --}}
                <td>{{ $category->id }}</td>
                <td>{{ $category->nombre }}</td>
                <td>{{ $category->descripcion }}</td>

                <td>
                    {{-- Enlace para editar --}}
                    <a href="{{ route('categories.edit', $category) }}">Editar</a>
                    
                    {{-- Formulario de borrado con confirmación --}}
                    <form action="{{ route('categories.destroy', $category) }}"
                            method="POST"
                            style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                onclick="return confirm('¿Estás seguro?')">
                            Borrar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
