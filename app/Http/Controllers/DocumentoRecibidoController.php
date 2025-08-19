<?php

namespace App\Http\Controllers;

use App\DetalleEnvio;
use Illuminate\Http\Request;

class DocumentoRecibidoController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $per_page = $request->per_page;

        $documentos_envios = DetalleEnvio::listarDetallesEnviadosGeneral($buscar, $criterio, $per_page);
        $pendientes = 0;
        
        return [
            'pagination' => [
                'total' => $documentos_envios->total(),
                'current_page' => $documentos_envios->currentPage(),
                'per_page' => $documentos_envios->perPage(),
                'last_page' => $documentos_envios->lastPage(),
                'from' => $documentos_envios->firstItem(),
                'to' => $documentos_envios->lastItem(),
                'pendiente' => $pendientes,
            ],
            'documentos_envios' => $documentos_envios
        ];
    }
}
