<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Bibliotecario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f9f9f9;
            color: #333;
        }

        h1, h2, h3 {
            color: #2c3e50;
        }

        nav {
            margin-bottom: 20px;
        }

        nav a {
            display: inline-block;
            padding: 10px 18px;
            margin: 5px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #2980b9;
        }

        .btn-cerrar-sesion {
            padding: 10px 18px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-cerrar-sesion:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

    <h1>Panel Bibliotecario</h1>
    <h2>Bienvenido: {{ $usuarioActual->name }}</h2>

    <hr>

    <nav>
        <a href="{{ route('libros.listar') }}">Ver Libros</a>
        <a href="{{ route('libros.crear') }}">Agregar Libro</a>
        <a href="{{ route('usuarios.crear') }}">Registrar Usuario</a>
    </nav>

    <hr>

    <h3>Estadísticas</h3>
    <p>Total de libros: {{ $totalLibros }}</p>

    <form method="POST" action="{{ route('cerrar-sesion') }}" style="display: inline;">
        @csrf
        <button type="submit" class="btn-cerrar-sesion">Cerrar Sesión</button>
    </form>

</body>
</html>
