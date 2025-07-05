<!DOCTYPE html>
<html>
<head>
    <title>Registrar Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
            color: #444;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            margin-top: 25px;
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #218838;
        }

        p {
            text-align: center;
            margin-top: 20px;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registrar Usuario</h2>

        @if(session('error'))
            <div class="error-message">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('usuarios.almacenar') }}">
            @csrf
            <label>Nombre:</label>
            <input name="nombre" type="text" required>
            
            <label>Correo:</label>
            <input name="email" type="email" required>
            
            <label>Contraseña:</label>
            <input name="contrasena" type="password" required>
            
            <label>Rol:</label>
            <select name="rol">
                <option value="usuario">Usuario</option>
                <option value="bibliotecario">Bibliotecario</option>
            </select>
            
            <button type="submit">Registrar</button>
        </form>

        <p><a href="{{ route('iniciar-sesion') }}">Volver al login</a></p>
    </div>
</body>
</html>
