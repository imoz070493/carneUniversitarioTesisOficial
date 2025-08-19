<?php

namespace App\Http\Controllers;

use App\CargaMatricula;
use Illuminate\Http\Request;

class CargaMatriculaController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $per_page = $request->per_page;

        $cargas_matriculas = CargaMatricula::listarCargasMatriculas($buscar, $criterio, $per_page);
        $pendientes = 0;
        
        return [
            'pagination' => [
                'total' => $cargas_matriculas->total(),
                'current_page' => $cargas_matriculas->currentPage(),
                'per_page' => $cargas_matriculas->perPage(),
                'last_page' => $cargas_matriculas->lastPage(),
                'from' => $cargas_matriculas->firstItem(),
                'to' => $cargas_matriculas->lastItem(),
                'pendiente' => $pendientes,
            ],
            'cargas_matriculas' => $cargas_matriculas
        ];
    }

    public function indexById(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $per_page = $request->per_page;
        $carga_matricula_id = $request->carga_matricula_id;

        $cargas_matriculas = CargaMatricula::findOrFail($carga_matricula_id);
        
        return [
            'cargas_matriculas' => $cargas_matriculas
        ];
    }

    public function store(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        return CargaMatricula::guardarDatos($data);
    }

    public function update(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        return CargaMatricula::guardarDatos($data);
    }
}
