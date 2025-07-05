<h2>Registrar Libro</h2>

<p><a href="{{ route('libros.listar') }}">Volver al listado</a></p>

@if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif

<form method="POST" action="{{ route('libros.almacenar') }}">
    @csrf
    <label>Título:</label>
    <input name="titulo" required><br><br>
    
    <label>Autor:</label>
    <input name="autor" required><br><br>
    
    <label>Categoría:</label>
    <input name="categoria" required><br><br>
    
    <label>Stock:</label>
    <input name="stock" type="number" required min="0"><br><br>
    
    <button type="submit">Guardar Libro</button>
</form>