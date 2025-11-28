@extends('layout')

@section('content')
<h2>Crear Proveedor</h2>

<form action="{{ route('proveedors.store') }}" method="POST">
    @csrf

    <label>Nombre:</label><br>
    <input type="text" name="nombre" required>
    <br><br>

    <label>Dirección:</label><br>
    <input type="text" name="direccion" required>
    <br><br>

    <label>Teléfono:</label><br>
    <input type="text" name="telefono" required>
    <br><br>

    <button type="submit">Guardar Proveedor</button>
</form>

<br>
<a href="{{ route('proveedors.index') }}">← Volver</a>
@endsection
