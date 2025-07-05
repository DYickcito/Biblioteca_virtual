<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Libros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f9f9f9;
            color: #333;
        }

        h2 {
            color: #2c3e50;
        }

        .nav-links a {
            display: inline-block;
            padding: 10px 18px;
            margin: 5px 10px 15px 0;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        .nav-links a:hover {
            background-color: #2980b9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #ecf0f1;
            color: #2c3e50;
        }

        .btn-editar {
            padding: 6px 12px;
            background-color: #2ecc71;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            margin-right: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-editar:hover {
            background-color: #27ae60;
        }

        .btn-eliminar {
            padding: 6px 12px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-eliminar:hover {
            background-color: #c0392b;
        }

        .btn-cerrar-sesion {
            padding: 10px 18px;
            background-color: #e67e22;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-cerrar-sesion:hover {
            background-color: #d35400;
        }

        .mensaje-exito {
            color: green;
            margin-bottom: 10px;
        }

        .mensaje-error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <h2>Gestión de Libros</h2>

    <div class="nav-links">
        <a href="{{ route('inicio') }}">Inicio</a>
        <a href="{{ route('libros.crear') }}">Agregar Libro</a>
    </div>

    @if(session('exito'))
        <p class="mensaje-exito">{{ session('exito') }}</p>
    @endif

    @if(session('error'))
        <p class="mensaje-error">{{ session('error') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Categoría</th>
                <th>Stock</th>
                <th style="width: 160px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($libros as $libro)
                <tr>
                    <td>{{ $libro->titulo }}</td>
                    <td>{{ $libro->autor }}</td>
                    <td>{{ $libro->categoria }}</td>
                    <td>{{ $libro->stock }}</td>
                    <td>
                        <a href="{{ route('libros.editar', $libro->id) }}" class="btn-editar">Editar</a>

                        <form method="POST" action="{{ route('libros.eliminar', $libro->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-eliminar" onclick="return confirm('¿Seguro que desea eliminar este libro permanentemente?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>

    <form method="POST" action="{{ route('cerrar-sesion') }}">
        @csrf
        <button type="submit" class="btn-cerrar-sesion">Cerrar Sesión</button>
    </form>

</body>
</html>