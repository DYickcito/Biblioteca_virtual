<h1>Panel Bibliotecario</h1>
<p>Bienvenido: {{ $usuarioActual->name }}</p>

<form method="POST" action="{{ route('cerrar-sesion') }}" style="display: inline;">
    @csrf
    <button type="submit">Cerrar Sesión</button>
</form>

<hr>

<nav>
    <a href="{{ route('libros.listar') }}">Ver Libros</a> |
    <a href="{{ route('libros.crear') }}">Agregar Libro</a> |
    <a href="{{ route('usuarios.crear') }}">Registrar Usuario</a>
</nav>

<hr>

<h3>Estadísticas</h3>
<p>Total de libros: {{ $totalLibros }}</p>