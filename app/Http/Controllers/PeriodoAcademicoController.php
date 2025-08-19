<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeriodoAcademicoFormRequest;
use App\PeriodoAcademico;
use Illuminate\Http\Request;

class PeriodoAcademicoController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $per_page = $request->per_page;

        $periodos_academicos = PeriodoAcademico::listarPeriodosAcademicos($buscar, $criterio, $per_page);

        return [
            'pagination' => [
                'total' => $periodos_academicos->total(),
                'current_page' => $periodos_academicos->currentPage(),
                'per_page' => $periodos_academicos->perPage(),
                'last_page' => $periodos_academicos->lastPage(),
                'from' => $periodos_academicos->firstItem(),
                'to' => $periodos_academicos->lastItem(),
            ],
            'periodos_academicos' => $periodos_academicos
        ];
    }

    public function store(PeriodoAcademicoFormRequest $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        return PeriodoAcademico::guardarDatos($data);
    }

    public function update(PeriodoAcademicoFormRequest $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        return PeriodoAcademico::guardarDatos($data);
    }

    public function listarPeriodosAcademicosSelect(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        
        return PeriodoAcademico::listarPeriodosAcademicosSelect();
    }

    public function listarPeriodosAcademicosGeneralSelect(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        
        return PeriodoAcademico::listarPeriodosAcademicosGeneralSelect();
    }
}
