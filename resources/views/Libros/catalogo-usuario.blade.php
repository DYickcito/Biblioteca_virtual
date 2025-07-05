<h2>Catálogo de Libros</h2>

<form method="POST" action="{{ route('cerrar-sesion') }}" style="display: inline;">
    @csrf
    <button type="submit">Cerrar Sesión</button>
</form>

<p><a href="{{ route('inicio') }}">Inicio</a></p>

<h3>Libros Disponibles</h3>

<style>
    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .libro-card {
        flex: 0 0 calc(33.333% - 20px); /* 3 por fila con espacio */
        border: 1px solid #ccc;
        padding: 15px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        border-radius: 8px;
        box-sizing: border-box;
    }

    @media (max-width: 900px) {
        .libro-card {
            flex: 0 0 calc(50% - 20px); /* 2 por fila en pantallas medianas */
        }
    }

    @media (max-width: 600px) {
        .libro-card {
            flex: 0 0 100%; /* 1 por fila en pantallas pequeñas */
        }
    }
</style>

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