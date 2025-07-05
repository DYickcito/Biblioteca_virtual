<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AutenticacionController;

Route::get('/', [AutenticacionController::class, 'iniciarSesion'])->name('iniciar-sesion');

Route::post('/autenticar', [AutenticacionController::class, 'autenticar'])->name('autenticar');
Route::post('/cerrar-sesion', [AutenticacionController::class, 'cerrarSesion'])->name('cerrar-sesion');

Route::get('/usuarios/crear', [UsuarioController::class, 'crear'])->name('usuarios.crear');
Route::post('/usuarios', [UsuarioController::class, 'almacenar'])->name('usuarios.almacenar');

Route::get('/inicio', [AutenticacionController::class, 'inicio'])->name('inicio');
Route::get('/libros', [LibroController::class, 'listar'])->name('libros.listar');
Route::get('/libros/crear', [LibroController::class, 'crear'])->name('libros.crear');
Route::post('/libros', [LibroController::class, 'almacenar'])->name('libros.almacenar');
Route::get('/libros/{id}/editar', [LibroController::class, 'editar'])->name('libros.editar');
Route::put('/libros/{id}', [LibroController::class, 'actualizar'])->name('libros.actualizar');
Route::delete('/libros/{id}', [LibroController::class, 'eliminar'])->name('libros.eliminar');
