<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibroController extends Controller
{
    /**
     * Listar libros
     */
    public function listar() {
        $usuarioActual = session('usuario_actual');

        if (!$usuarioActual) {
            return redirect()->route('iniciar-sesion')->with('error', 'Debes iniciar sesión para acceder');
        }

        try {
            
            $libros = DB::select('SELECT * FROM libros ORDER BY titulo');

            if ($usuarioActual->rol === 'bibliotecario') {
                return view('libros.listar', compact('libros'));
            } else {
                $librosDisponibles = array_filter($libros, fn($libro) => $libro->stock > 0);
                return view('libros.catalogo-usuario', compact('librosDisponibles'));
            }
        }catch (\Exception $e) {
            return back()->with('error', 'Error al obtener los libros: ' . $e->getMessage());
        }
    }

    /**
     * Mostrar formulario de creación de libro
     */
    public function crear() {
        $usuarioActual = session('usuario_actual');

        if (!$usuarioActual || $usuarioActual->rol !== 'bibliotecario') {
            return redirect()->route('inicio')->with('error', 'No tienes permisos suficientes');
        }

        return view('libros.crear');
    }

    /**
     * Guardar un nuevo libro en la base de datos
     */
    public function almacenar(Request $request) {
        $usuarioActual = session('usuario_actual');

        if (!$usuarioActual || $usuarioActual->rol !== 'bibliotecario') {
            return redirect()->route('inicio')->with('error', 'No tienes permisos suficientes');
        }

        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'categoria' => 'required|string|max:100',
            'stock' => 'required|integer|min:0'
        ]);

        try {
            // Llamada a procedimiento almacenado en Oracle
            DB::statement("BEGIN pkg_libros.crear_libro(:p_titulo, :p_autor, :p_categoria, :p_stock); END;", [
                'p_titulo' => $request->titulo,
                'p_autor' => $request->autor,
                'p_categoria' => $request->categoria,
                'p_stock' => $request->stock
            ]);

            return redirect()->route('libros.listar')->with('exito', 'Libro registrado correctamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al registrar el libro: ' . $e->getMessage());
        }
    }

    public function editar($id) {
        $usuarioActual = session('usuario_actual');
        if (!$usuarioActual || $usuarioActual->rol !== 'bibliotecario') {
            return redirect()->route('inicio')->with('error', 'No tienes permisos suficientes');
        }

        $libro = DB::selectOne("SELECT * FROM libros WHERE id = :id", ['id' => $id]);
        if (!$libro) {
            return redirect()->route('libros.listar')->with('error', 'Libro no encontrado');
        }

        return view('libros.editar', compact('libro'));
    }

    public function actualizar(Request $request, $id) {
        $usuarioActual = session('usuario_actual');
        if (!$usuarioActual || $usuarioActual->rol !== 'bibliotecario') {
            return redirect()->route('inicio')->with('error', 'No tienes permisos suficientes');
        }

        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'categoria' => 'required|string|max:100',
            'stock' => 'required|integer|min:0'
        ]);

        try {
            DB::statement("BEGIN pkg_libros.actualizar_libro(:id, :titulo, :autor, :categoria, :stock); END;", [
                'id' => $id,
                'titulo' => $request->titulo,
                'autor' => $request->autor,
                'categoria' => $request->categoria,
                'stock' => $request->stock
            ]);

            return redirect()->route('libros.listar')->with('exito', 'Libro actualizado correctamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al actualizar el libro: ' . $e->getMessage());
        }
    }

    public function eliminar($id) {
        $usuarioActual = session('usuario_actual');

        if (!$usuarioActual || $usuarioActual->rol !== 'bibliotecario') {
            return redirect()->route('inicio')->with('error', 'No tienes permisos suficientes');
        }

        try {
            DB::statement("BEGIN pkg_libros.eliminar_libro(:id); END;", [
                'id' => $id
            ]);

            return redirect()->route('libros.listar')->with('exito', 'Libro eliminado correctamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al eliminar el libro: ' . $e->getMessage());
        }
    }
}
