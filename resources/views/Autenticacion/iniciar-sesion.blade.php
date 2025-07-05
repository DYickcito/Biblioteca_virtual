<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 40px;
            color: #2c3e50;
        }

        h2 {
            color: #34495e;
        }

        .form-container {
            background-color: white;
            padding: 30px;
            max-width: 400px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #2980b9;
        }

        .mensaje-error {
            color: red;
            margin-bottom: 10px;
        }

        .mensaje-exito {
            color: green;
            margin-bottom: 10px;
        }

        .registro-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #3498db;
            font-weight: bold;
            text-decoration: none;
        }

        .registro-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Iniciar Sesión</h2>

        @if(session('error'))
            <p class="mensaje-error">{{ session('error') }}</p>
        @endif

        @if(session('exito'))
            <p class="mensaje-exito">{{ session('exito') }}</p>
        @endif

        <form method="POST" action="{{ url('/autenticar') }}">
            @csrf
            <label>Correo:</label>
            <input name="email" type="email" required>

            <label>Contraseña:</label>
            <input name="contrasena" type="password" required>

            <button type="submit">Iniciar Sesión</button>
        </form>

        <a href="{{ route('usuarios.crear') }}" class="registro-link">¿No tienes cuenta? Regístrate aquí</a>
    </div>

</body>
</html>
