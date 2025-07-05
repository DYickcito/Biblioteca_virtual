<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Portal Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 40px;
            color: #2c3e50;
        }

        h1, h3 {
            color: #34495e;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .top-bar h1 {
            margin: 0;
        }

        .cerrar-sesion-btn {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .cerrar-sesion-btn:hover {
            background-color: #c0392b;
        }

        nav a {
            background-color: #3498db;
            color: white;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 6px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #2980b9;
        }

        .catalogo {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }

        .libro-card {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            flex: 0 0 calc(33.333% - 20px);
            box-sizing: border-box;
            transition: transform 0.2s;
        }

        .libro-card:hover {
            transform: translateY(-4px);
        }

        .libro-card h4 {
            margin-top: 0;
        }

        @media (max-width: 900px) {
            .libro-card {
                flex: 0 0 calc(50% - 20px);
            }
        }

        @media (max-width: 600px) {
            .libro-card {
                flex: 0 0 100%;
            }
        }
    </style>
</head>
<body>

    <div class="top-bar">
        <h1>Portal Usuario</h1>
        <form method="POST" action="{{ route('cerrar-sesion') }}">
            @csrf
            <button type="submit" class="cerrar-sesion-btn">Cerrar Sesión</button>
        </form>
    </div>

    <h3>Bienvenido: {{ $usuarioActual->name }}</h3>

    <nav style="margin: 20px 0;">
        <a href="{{ route('libros.listar') }}">Ver Catálogo</a>
    </nav>

    <h3>Libros Disponibles</h3>

    <div class="catalogo">
        @forelse($librosDisponibles as $libro)
            <div class="libro-card">
                <h4>{{ $libro->titulo }}</h4>
                <p><strong>Autor:</strong> {{ $libro->autor }}</p>
                <p><strong>Categoría:</strong> {{ $libro->categoria }}</p>
                <p><strong>Stock:</strong> {{ $libro->stock }}</p>
            </div>
        @empty
            <p>No hay libros disponibles.</p>
        @endforelse
    </div>

</body>
</html>