<h2>Registrar Usuario</h2>

@if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif

<form method="POST" action="{{ route('usuarios.almacenar') }}">
    @csrf
    <label>Nombre:</label>
    <input name="nombre" required><br><br>
    
    <label>Correo:</label>
    <input name="email" type="email" required><br><br>
    
    <label>Contraseña:</label>
    <input name="contrasena" type="password" required><br><br>
    
    <label>Rol:</label>
    <select name="rol">
        <option value="usuario">Usuario</option>
        <option value="bibliotecario">Bibliotecario</option>
    </select><br><br>
    
    <button type="submit">Registrar</button>
</form>

<p><a href="{{ route('iniciar-sesion') }}">Volver al login</a></p>