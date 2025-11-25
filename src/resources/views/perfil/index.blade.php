@extends('layout')

@section('content')
    <h2>Perfil del Usuario</h2>
    <br><br>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>nickname</th>
                <th>edad</th>
                <th>email</th>
                <th>teléfono</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $perfil->id }}</td>
                <td>{{ $perfil->nombre }}</td>
                <td>{{ $perfil->nickname }}</td>
                <td>{{ $perfil->edad }}</td>
                <td>{{ $perfil->email }}</td>
                <td>{{ $perfil->telefono }}</td>
            </tr>
        </tbody>
    </table>
@endsection
