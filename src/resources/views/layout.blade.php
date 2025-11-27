<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacen Laravel</title>
</head>
<body>
    <header>
        <h1>Gestión de Almacén</h1>
        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        @if (session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif

        <nav>
            <h3><a href="{{ route('perfil.index') }}">{{ $usuario->nombre ?? 'Usuario' }}</a></h3>
            <ul>
                <li><a href="{{ route('categories.index') }}">Gestionar Categorías</a></li>
                <li><a href="{{ route('products.index') }}">Gestionar Productos</a></li>
                <li><a href="{{ route('almacen.index') }}">Mostrar Almacén</a></li>
            </ul>
        </nav>
        <hr>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <hr>
        <p>Proyecto CRUD Laravel Sin Estilos</p>
    </footer>
</body>
</html>
