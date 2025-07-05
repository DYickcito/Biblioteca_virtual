<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AutenticacionController extends Controller
{
    public function iniciarSesion() {
        return view('autenticacion.iniciar-sesion');
    }

    public function autenticar(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'contrasena' => 'required'
        ]);

        $usuario = DB::selectOne("SELECT * FROM usuarios WHERE email = ?", [$request->email]);

        if ($usuario && Hash::check($request->contrasena, $usuario->password)) {
            session(['usuario_actual' => $usuario]);
            return redirect()->route('inicio');
        }

        return back()->with('error', 'Credenciales incorrectas');
    }

    public function cerrarSesion() {
        session()->forget('usuario_actual');
        return redirect()->route('iniciar-sesion');
    }

    public function inicio() {
        $usuarioActual = session('usuario_actual');

        if (!$usuarioActual) {
            return redirect()->route('iniciar-sesion')->with('error', 'Debes iniciar sesión para acceder');
        }

        if ($usuarioActual->rol === 'bibliotecario') {
            $totalLibros = DB::selectOne("SELECT COUNT(*) as total FROM libros")->total;
            return view('inicio.bibliotecario', compact('totalLibros', 'usuarioActual'));
        } else {
            $librosDisponibles = DB::select("SELECT * FROM libros WHERE stock > 0");
            return view('inicio.usuario', compact('librosDisponibles', 'usuarioActual'));
        }
    }
}
