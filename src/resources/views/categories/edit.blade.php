@extends('layout')

@section('content')
    <h2>Editar Categoría</h2>

    {{-- Formulario para actualizar la categoría existente --}}
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf {{-- Token CSRF obligatorio --}}
        @method('PUT') {{-- método HTTP para actualizar --}}
        
        {{-- Campo nombre pre-rellenado con el valor actual --}}
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre"
                value="{{ $category->nombre }}" required><br><br>

        {{-- Campo descripción--}}
        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion">{{ $category->descripcion }}</textarea><br><br>

        <button type="submit">Actualizar Categoría</button>
    </form>

    <br>

    {{-- Enlace de retorno al listado --}}
    <a href="{{ route('categories.index') }}">Volver al listado</a>
@endsection
