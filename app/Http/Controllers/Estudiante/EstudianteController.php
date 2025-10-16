<?php

namespace App\Http\Controllers\Estudiante;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    // Mostrar listado de estudiantes
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('Estudiantes.index', compact('estudiantes'));
    }

    // Mostrar formulario para crear estudiante
    public function create()
    {
        return view('Estudiantes.create');
    }

    // Guardar estudiante en BD
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|max:10',
            'nombres' => 'required|string|max:50',
            'pri_ape' => 'required|string|max:50',
            'seg_ape' => 'nullable|string|max:50',
            'dni' => 'required|string|max:15',
        ]);

        Estudiante::create($request->all());

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante agregado correctamente.');
    }
}
