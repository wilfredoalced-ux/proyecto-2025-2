<?php

namespace App\Http\Controllers\Asistencia;

use App\Http\Controllers\Controller;
use App\Models\Asistencia;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    public function index()
    {
        $asistencias = Asistencia::all(); // Trae todos los registros
        return view('Asistencias.index', compact('asistencias'));
    }

    public function create()
    {
        return view('Asistencias.create');
    }

    public function store(Request $request)
    {
        Asistencia::create($request->all());
        return redirect()->route('asistencias.index');
    }
}
