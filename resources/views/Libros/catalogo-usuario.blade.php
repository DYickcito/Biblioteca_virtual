<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Libros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f4f4;
            color: #2c3e50;
        }

        h2, h3 {
            color: #34495e;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .top-bar a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }

        .top-bar a:hover {
            text-decoration: underline;
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

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .libro-card {
            flex: 0 0 calc(33.333% - 20px);
            background-color: white;
            border: 1px solid #ddd;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            border-radius: 10px;
            box-sizing: border-box;
            transition: transform 0.2s;
        }

        .libro-card:hover {
            transform: translateY(-4px);
        }

        .libro-card h4 {
            margin-top: 0;
            color: #2c3e50;
        }

        .libro-card p {
            margin: 8px 0;
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

    <h2>Catálogo de Libros</h2>

    <div class="top-bar">
        <a href="{{ route('inicio') }}">← Volver al inicio</a>
        <form method="POST" action="{{ route('cerrar-sesion') }}" style="margin: 0;">
            @csrf
            <button type="submit" class="cerrar-sesion-btn">Cerrar Sesión</button>
        </form>
    </div>

    <h3>Libros Disponibles</h3>

    <div class="card-container">
        @forelse($librosDisponibles as $libro)
            <div class="libro-card">
                <h4>{{ $libro->titulo }}</h4>
                <p><strong>Autor:</strong> {{ $libro->autor }}</p>
                <p><strong>Categoría:</strong> {{ $libro->categoria }}</p>
                <p><strong>Stock disponible:</strong> {{ $libro->stock }}</p>
            </div>
        @empty
            <p>No hay libros disponibles.</p>
        @endforelse
    </div>

</body>
</html>