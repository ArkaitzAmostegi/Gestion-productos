<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacen Laravel</title>

    {{-- Link a CSS  en /public --}}
    <link rel="stylesheet" href="{{ asset('estilos.css') }}">
</head>

<body>
    <header>
        <h1>Gestión de Almacén</h1>

        {{-- Mensajes de éxito --}}
        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        {{-- Mensajes de error --}}
        @if (session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif

        <nav>
            {{-- Muestra el nombre del usuario cargado --}}
            <h3>
                <a href="{{ route('perfil.index') }}">
                    {{ $usuario->nombre ?? 'Usuario' }}
                </a>
            </h3>

            <ul>
                {{-- Enlaces hacia diferentes módulos CRUD --}}
                <li><a href="{{ route('categories.index') }}">Gestión Categorías</a></li>
                <li><a href="{{ route('products.index') }}">Gestión Productos</a></li>
                <li><a href="{{ route('almacen.index') }}">Gestión Almacén</a></li>
                <li><a href="{{ route('proveedors.index') }}">Gestión Proveedores</a></li>
            </ul>
        </nav>

        <hr>
    </header>

    {{-- Aquí va el Contenido dinámico de cada vista --}}
    <main>
        @yield('content')
    </main>

    <footer>
        <hr>
        <p>Proyecto CRUD Laravel Sin Estilos</p>
    </footer>
</body>
</html>
