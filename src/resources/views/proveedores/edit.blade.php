@extends('layout')

@section('content')
<h2>Editar Proveedor</h2>

{{-- Formulario para actualizar un proveedor existente --}}
<form action="{{ route('proveedors.update', $proveedor) }}" method="POST">
    @csrf           {{-- Token CSRF obligatorio --}}
    @method('PUT')  {{-- Método PUT para actualizar --}}

    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="{{ $proveedor->nombre }}" required>
    <br><br>

    <label>Dirección:</label><br>
    <input type="text" name="direccion" value="{{ $proveedor->direccion }}" required>
    <br><br>

    <label>Teléfono:</label><br>
    <input type="text" name="telefono" value="{{ $proveedor->telefono }}" required>
    <br><br>

    <button type="submit">Actualizar</button>
</form>

<br>
{{-- Enlace para volver al listado --}}
<a href="{{ route('proveedors.index') }}">← Volver</a>
@endsection
