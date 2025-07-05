<h2>Gestión de Libros</h2>

<form method="POST" action="{{ route('cerrar-sesion') }}" style="display: inline;">
    @csrf
    <button type="submit">Cerrar Sesión</button>
</form>

<p>
    <a href="{{ route('inicio') }}">Inicio</a> |
    <a href="{{ route('libros.crear') }}">Agregar Libro</a>
</p>

@if(session('exito'))
    <p style="color: green;">{{ session('exito') }}</p>
@endif

@if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif

<table border="1" style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Categoría</th>
            <th>Stock</th>
            <th style="width: 150px;">Acciones</th>
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
                    <a href="{{ route('libros.editar', $libro->id) }}">Editar</a>

                    <form method="POST" action="{{ route('libros.eliminar', $libro->id) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Seguro que desea eliminar este libro permanentemente?')">Eliminar</button>
                </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
