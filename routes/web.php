<?php

use App\Http\Controllers\Estudiante\EstudianteController;
use App\Models\Estudiante;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Asistencia\AsistenciaController;

Route::get('/', function () {
    /*$estudiante = new Estudiante();
    $estudiante->nombres = 'wilfredo';
    $estudiante->pri_ape = 'alcedo';
    $estudiante->seg_ape = 'santiago';

    return $estudiante;*/

  //return 'aqui trabajare con la tabla estudiantes'; (ERA SOLO PARA PROBAR)ss
    return view('welcome');
});

//////////////////////////////////////////////
Route::get('/saludos', function () {
    return 'Hello World';
})->name('saluditos');

Route::get('/bienvenido', function () 
{
    return view('bienvenidos');
})->name('bienvenidos1');
//////////////////////////////////////////////

//////// Nuevas rutas/////////////////////////

Route::get('/proyecto1', function () {
    return 'Este es el proyecto 1';
})->name('proyecto1');

Route::get('/proyecto2', function () {
    return view('proyecto2'); // Asegúrate que esta vista existe: resources/views/wwwww.blade.php
})->name('proyecto2');

// Cambié el nombre de la ruta para que sea 'estudiantes.index' como lo usas en tu vista
Route::get('/Estudiante/index', [EstudianteController::class, 'index'])->name('estudiantes.index');

/// Rutas Estudiantes
Route::get('/estudiantes', [EstudianteController::class, 'index'])->name('estudiantes.index');
Route::get('/estudiantes/create', [EstudianteController::class, 'create'])->name('estudiantes.create');
Route::post('/estudiantes', [EstudianteController::class, 'store'])->name('estudiantes.store');

// **Rutas para editar, actualizar y eliminar**
Route::get('/estudiantes/{id}/edit', [EstudianteController::class, 'edit'])->name('estudiantes.edit');
Route::put('/estudiantes/{id}', [EstudianteController::class, 'update'])->name('estudiantes.update');
Route::delete('/estudiantes/{id}', [EstudianteController::class, 'destroy'])->name('estudiantes.destroy');

// Rutas Asistencias
Route::get('/asistencias', [AsistenciaController::class, 'index'])->name('asistencias.index');
Route::get('/asistencias/create', [AsistenciaController::class, 'create'])->name('asistencias.create');
Route::post('/asistencias', [AsistenciaController::class, 'store'])->name('asistencias.store');

///////////////////////////////////////////
