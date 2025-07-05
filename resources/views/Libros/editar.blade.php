<h2>Editar Libro</h2>

<form method="POST" action="{{ route('libros.actualizar', $libro->id) }}">
    @csrf
    @method('PUT')

    <label>Título:</label>
    <input name="titulo" value="{{ $libro->titulo }}" required><br><br>

    <label>Autor:</label>
    <input name="autor" value="{{ $libro->autor }}" required><br><br>

    <label>Categoría:</label>
    <input name="categoria" value="{{ $libro->categoria }}" required><br><br>

    <label>Stock:</label>
    <input name="stock" type="number" value="{{ $libro->stock }}" required><br><br>

    <button type="submit">Actualizar</button>
</form>

<p><a href="{{ route('libros.listar') }}">Volver al listado</a></p>
