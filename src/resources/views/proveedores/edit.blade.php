@extends('layout')

@section('content')
<h2>Editar Proveedor</h2>

<form action="{{ route('proveedors.update', $proveedor) }}" method="POST">
    @csrf
    @method('PUT')

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
<a href="{{ route('proveedors.index') }}">← Volver</a>
@endsection
