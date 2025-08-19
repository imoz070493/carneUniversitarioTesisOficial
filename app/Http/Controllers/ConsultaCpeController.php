<?php

namespace App\Http\Controllers;

use App\ConsultaCpe;
use Illuminate\Http\Request;

class ConsultaCpeController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $per_page = $request->per_page;
        $fecha_inicio = \Carbon\Carbon::parse($request->fecha_inicio)->format('Y-m-d');
        $fecha_fin = \Carbon\Carbon::parse($request->fecha_fin)->format('Y-m-d');

        $consultas_cpes = ConsultaCpe::listarConsultasCpes($buscar, $criterio, $per_page, $fecha_inicio, $fecha_fin);

        return [
            'pagination' => [
                'total' => $consultas_cpes->total(),
                'current_page' => $consultas_cpes->currentPage(),
                'per_page' => $consultas_cpes->perPage(),
                'last_page' => $consultas_cpes->lastPage(),
                'from' => $consultas_cpes->firstItem(),
                'to' => $consultas_cpes->lastItem(),
            ],
            'consultas_cpes' => $consultas_cpes
        ];
    }
}
