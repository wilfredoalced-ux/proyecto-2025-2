<?php

use App\Models\Estudiante;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;


Route::get('/', function () {

    $estudiante = new Estudiante();
    $estudiante->nombres = 'wilfredo';
    $estudiante->pri_ape = 'alcedo';
    $estudiante->seg_ape = 'santiago';
 

    return $estudiante;

  //return 'aqui trabajare con la tabla estudiantes'; (ERA SOLO PARA PROBAR)
   // return view('welcome');
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

///////////////////////////////////////////