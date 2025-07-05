<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function crear() {
        return view('usuarios.crear');
    }

    public function almacenar(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'contrasena' => 'required|min:6',
            'rol' => 'required|in:bibliotecario,usuario'
        ]);

        try {
            DB::statement("BEGIN crear_usuario(:p_nombre, :p_email, :p_password, :p_rol); END;", [
                'p_nombre' => $request->nombre,
                'p_email' => $request->email,
                'p_password' => Hash::make($request->contrasena),
                'p_rol' => $request->rol
            ]);

            return redirect()->route('iniciar-sesion')->with('exito', 'Nuevo usuario registrado correctamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al registrar usuario: ' . $e->getMessage());
        }
    }
}

