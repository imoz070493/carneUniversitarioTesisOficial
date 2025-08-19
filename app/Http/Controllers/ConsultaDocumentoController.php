<?php

namespace App\Http\Controllers;

use App\ConsultaDocumento;
use Illuminate\Http\Request;

class ConsultaDocumentoController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $per_page = $request->per_page;
        $fecha_inicio = \Carbon\Carbon::parse($request->fecha_inicio)->format('Y-m-d');
        $fecha_fin = \Carbon\Carbon::parse($request->fecha_fin)->format('Y-m-d');

        $consultas_documentos = ConsultaDocumento::listarConsultasDocumentos($buscar, $criterio, $per_page, $fecha_inicio, $fecha_fin);

        return [
            'pagination' => [
                'total' => $consultas_documentos->total(),
                'current_page' => $consultas_documentos->currentPage(),
                'per_page' => $consultas_documentos->perPage(),
                'last_page' => $consultas_documentos->lastPage(),
                'from' => $consultas_documentos->firstItem(),
                'to' => $consultas_documentos->lastItem(),
            ],
            'consultas_documentos' => $consultas_documentos
        ];
    }
}
