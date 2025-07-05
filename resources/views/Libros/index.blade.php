<h2>Listado de Libros</h2>
<a href="{{ route('libros.create') }}">Registrar nuevo libro</a>
<ul>
    @foreach($libros as $libro)
        <li>{{ $libro->titulo }} - {{ $libro->autor }} - {{ $libro->categoria }} - Stock: {{ $libro->stock }}</li>
    @endforeach
</ul>