<?php

namespace App\Http\Controllers;

use App\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $per_page = $request->per_page;

        $estudiantes = Estudiante::listarEstudiantes($buscar, $criterio, $per_page);
        $pendientes = 0;
        
        return [
            'pagination' => [
                'total' => $estudiantes->total(),
                'current_page' => $estudiantes->currentPage(),
                'per_page' => $estudiantes->perPage(),
                'last_page' => $estudiantes->lastPage(),
                'from' => $estudiantes->firstItem(),
                'to' => $estudiantes->lastItem(),
                'pendiente' => $pendientes,
            ],
            'estudiantes' => $estudiantes
        ];
    }

    public function store(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        return Estudiante::guardarDatos($data);
    }

    public function update(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        return Estudiante::guardarDatos($data);
    }

    public function listarEstudiantesSelect(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $buscar = $request->get('buscar');
        
        return Estudiante::listarEstudiantesSelect($buscar);
    }
}
