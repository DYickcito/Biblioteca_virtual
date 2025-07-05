<h2>Catálogo de Libros</h2>

<form method="POST" action="{{ route('cerrar-sesion') }}" style="display: inline;">
    @csrf
    <button type="submit">Cerrar Sesión</button>
</form>

<p><a href="{{ route('inicio') }}">Inicio</a></p>

<h3>Libros Disponibles</h3>
@forelse($librosDisponibles as $libro)
    <div style="border: 1px solid #ccc; padding: 10px; margin: 10px 0;">
        <h4>{{ $libro->titulo }}</h4>
        <p>Autor: {{ $libro->autor }}</p>
        <p>Categoría: {{ $libro->categoria }}</p>
        <p>Stock disponible: {{ $libro->stock }}</p>
    </div>
@empty
    <p>No hay libros disponibles.</p>
@endforelse