<h2>Iniciar Sesión</h2>

@if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif

@if(session('exito'))
    <p style="color: green;">{{ session('exito') }}</p>
@endif

<form method="POST" action="{{ url('/autenticar') }}">
    @csrf
    <label>Correo:</label>
    <input name="email" type="email" required><br><br>
    
    <label>Contraseña:</label>
    <input name="contrasena" type="password" required><br><br>
    
    <button type="submit">Iniciar Sesión</button>
</form>

<p><a href="{{ route('usuarios.crear') }}">Registrar nuevo usuario</a></p>