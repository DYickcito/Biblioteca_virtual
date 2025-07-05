<h1>Portal Usuario</h1>
<p>Bienvenido: {{ $usuarioActual->name }}</p>

<form method="POST" action="{{ route('cerrar-sesion') }}" style="display: inline;">
    @csrf
    <button type="submit">Cerrar Sesión</button>
</form>

<hr>

<nav>
    <a href="{{ route('libros.listar') }}">Ver Catálogo</a>
</nav>

<hr>

<h3>Libros Disponibles</h3>
@foreach($librosDisponibles as $libro)
    <div style="border: 1px solid #ccc; padding: 10px; margin: 10px 0;">
        <h4>{{ $libro->titulo }}</h4>
        <p>Autor: {{ $libro->autor }}</p>
        <p>Categoría: {{ $libro->categoria }}</p>
        <p>Stock: {{ $libro->stock }}</p>
    </div>
@endforeach