<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacen Laravel</title>
</head>
<body>
    <header>
        <h1>Gestión de Almacen</h1>
        <nav>
            <ul>
                <li><a href="{{ route('categories.index') }}">Gestionar Categorías</a></li>
                <li><a href="{{ route('products.index') }}">Gestionar Productos</a></li>
                <li><a href="{{ route('almacen.index') }}">Mostrar Almacen</a></li>
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
