<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Libro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f4f4;
            color: #2c3e50;
        }

        h2 {
            color: #34495e;
        }

        form {
            background-color: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 500px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #27ae60;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #219150;
        }

        .link-volver {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }

        .link-volver:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <h2>Editar Libro</h2>

    <form method="POST" action="{{ route('libros.actualizar', $libro->id) }}">
        @csrf
        @method('PUT')

        <label for="titulo">Título:</label>
        <input name="titulo" id="titulo" type="text" value="{{ $libro->titulo }}" required>

        <label for="autor">Autor:</label>
        <input name="autor" id="autor" type="text" value="{{ $libro->autor }}" required>

        <label for="categoria">Categoría:</label>
        <input name="categoria" id="categoria" type="text" value="{{ $libro->categoria }}" required>

        <label for="stock">Stock:</label>
        <input name="stock" id="stock" type="number" value="{{ $libro->stock }}" required min="0">

        <button type="submit">Actualizar</button>
    </form>

    <a href="{{ route('libros.listar') }}" class="link-volver">← Volver al listado</a>

</body>
</html>