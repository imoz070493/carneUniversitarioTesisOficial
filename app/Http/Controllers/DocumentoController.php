<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documento;

class DocumentoController extends Controller
{
    public function obtenerDocumento(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $tipo_documento = $request->tp;
        $numero_documento = $request->n;

        $documento = Documento::obtenerDocumento($tipo_documento, $numero_documento);

        if(gettype($documento)== 'object'){
            echo json_encode([
                'msg' => 'exito',
                'data' => $documento
            ]);
        }else{
            echo json_encode([
                'msg' => 'error'
            ]);
        }

    }

    public function obtenerConductorPorNombre(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $q = $request->q;

        $conductor = Documento::obtenerConductorPorNombre($q);
        if(gettype($conductor)== 'object'){
            echo json_encode([
                'msg' => 'exito',
                'data' => $conductor
            ]);
        }else{
            echo json_encode([
                'msg' => 'error'
            ]);
        }

    }

}
