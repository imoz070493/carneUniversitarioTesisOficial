<?php

namespace App\Http\Controllers;

use App\ConsultaCpe;
use App\ConsultaValidezComprobante;
use App\Http\Requests\ConsultaCpeFormRequest;
use Illuminate\Http\Request;

class SunatConsultaController extends Controller
{
    public function index(ConsultaCpeFormRequest $request){
        $datos['numRuc'] = $request->get('numRuc');
        $datos['codComp'] = $request->get('codComp');
        $datos['numeroSerie'] = $request->get('numeroSerie');
        $datos['numero'] = $request->get('numero');
        $datos['fechaEmision'] = \Carbon\Carbon::parse($request->get('fechaEmision'))->format('d/m/Y');
        $datos['monto'] = $request->get('monto');
        $datos['origen'] = $request->get('origen');
        
        if(!$request->get('origen')) return null;

        $consulta_cpe = ConsultaCpe::guardarDatos($datos);

        $result = ConsultaValidezComprobante::consultaComprobante($datos);

        $result = json_decode($result,true);

        $data_response = [
            'id' => $consulta_cpe->id,
            'success' => $result['success'],
            'message' => $result['message'],
            'data' => $result['data'],
        ];

        ConsultaCpe::guardarDatos($data_response);

        return response()->json($result);
    }

    public function indexGet(ConsultaCpeFormRequest $request){
        
        $datos['numRuc'] = $request->get('numRuc');
        $datos['codComp'] = $request->get('codComp');
        $datos['numeroSerie'] = $request->get('numeroSerie');
        $datos['numero'] = $request->get('numero');
        $datos['fechaEmision'] = \Carbon\Carbon::parse($request->get('fechaEmision'))->format('d/m/Y');
        $datos['monto'] = $request->get('monto');
        $datos['origen'] = $request->get('origen');
        
        if(!$request->get('origen')) return null;

        $consulta_cpe = ConsultaCpe::guardarDatos($datos);

        $result = ConsultaValidezComprobante::consultaComprobante($datos);

        $result = json_decode($result,true);

        $data_response = [
            'id' => $consulta_cpe->id,
            'success' => $result['success'],
            'message' => $result['message'],
            'data' => $result['data'],
        ];

        ConsultaCpe::guardarDatos($data_response);

        return response()->json($result);
    }
}
