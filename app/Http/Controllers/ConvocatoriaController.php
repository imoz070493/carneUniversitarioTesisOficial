<?php

namespace App\Http\Controllers;

use App\Convocatoria;
use App\Http\Requests\ConvocatoriaFormRequest;
use Illuminate\Http\Request;

class ConvocatoriaController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $per_page = $request->per_page;

        $convocatorias = Convocatoria::listarConvocatorias($buscar, $criterio, $per_page);

        return [
            'pagination' => [
                'total' => $convocatorias->total(),
                'current_page' => $convocatorias->currentPage(),
                'per_page' => $convocatorias->perPage(),
                'last_page' => $convocatorias->lastPage(),
                'from' => $convocatorias->firstItem(),
                'to' => $convocatorias->lastItem(),
            ],
            'convocatorias' => $convocatorias
        ];
    }

    public function store(ConvocatoriaFormRequest $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        return Convocatoria::guardarDatos($data);
    }

    public function update(ConvocatoriaFormRequest $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        return Convocatoria::guardarDatos($data);
    }

    public function listarConvocatoriasSelect(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        
        return Convocatoria::listarConvocatoriasSelect();
    }
}
