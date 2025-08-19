<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Reportes\ConstanciaMatriculaPdf;
use App\Http\Controllers\Reportes\ConstanciaPrimeraMatriculaPdf;
use App\Http\Requests\SolicitudDocumentoFormRequest;
use App\SolicitudDocumento;
use Illuminate\Http\Request;

class SolicitudDocumentoController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $per_page = $request->per_page;
        $estudiante_id = $request->estudiante_id;

        $solicitudes_documentos = SolicitudDocumento::listarSolicitudesDocumentos($buscar, $criterio, $per_page, $estudiante_id);
        
        return [
            'pagination' => [
                'total' => $solicitudes_documentos->total(),
                'current_page' => $solicitudes_documentos->currentPage(),
                'per_page' => $solicitudes_documentos->perPage(),
                'last_page' => $solicitudes_documentos->lastPage(),
                'from' => $solicitudes_documentos->firstItem(),
                'to' => $solicitudes_documentos->lastItem(),
            ],
            'solicitudes_documentos' => $solicitudes_documentos
        ];
    }

    public function store(SolicitudDocumentoFormRequest $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        $num_correlativo = static::storeGestionarCorrelativoDocumento([
            'tipo' => $data['tipo'],
            'anio' => \Carbon\Carbon::now()->year
        ]);

        $data['num_correlativo'] = $num_correlativo;
        $data['anio'] = \Carbon\Carbon::now()->year;

        return SolicitudDocumento::guardarDatos($data);
    }

    public function update(SolicitudDocumentoFormRequest $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        return SolicitudDocumento::guardarDatos($data);
    }

    public static function storeGestionarCorrelativoDocumento($data){
        $tipo = $data['tipo'];
        $anio = $data['anio'];\Log::info($data);

        $solicitudTemp = SolicitudDocumento::where('tipo',$tipo)
                            ->where('anio',$anio)
                            ->orderBy('num_correlativo','desc')
                            ->first();
\Log::info("ID: $solicitudTemp->num_correlativo");
        if(is_null($solicitudTemp)){
            $num_comprobante = 0;
        }else{
            $num_comprobante = $solicitudTemp->num_correlativo;
        }

        return $num_comprobante + 1;
    }

    public function descargarConstancia(Request $request){
        if(!$request->ajax()) return redirect('/');

        $solicitud_documento_id = $request->get('id');

        $data = \DB::table('solicitudes_documentos as sc')
                            ->join('estudiantes as e','sc.estudiante_id','e.id')
                            ->select(
                                'sc.id',
                                'sc.tipo',
                                'sc.num_correlativo',
                                'sc.anio',
                                'e.apellido_paterno',
                                'e.apellido_materno',
                                'e.nombres',
                                'e.codigo_estudiante',
                                'e.dni',
                                'e.sexo',
                                'e.escuela_profesional',
                                'sc.fecha_primera_matricula',
                                'sc.ciclo',
                                'sc.periodo',
                                \DB::raw("(select estado from periodos_academicos where romano = sc.periodo) as estado_periodo"),
                                'sc.created_at as fecha_procesado'
                            )
                            ->where('sc.id',$solicitud_documento_id)->first();

        
        // LLENANDO OBJETO BUILPDF
        $file = new \stdClass();
        $file->fecha_hora_impresion = \Carbon\Carbon::now()->format('d-m-Y H:i:s');

        $file->name_file = "File";

        if($data->tipo=='constancia_primera_matricula'){
            $file->name_file = "Constancia de Primera Matricula";
        }elseif($data->tipo=='constancia_matricula'){
            $file->name_file = "Constancia de Matricula";
        }

        $datos = [
            'file' => $file,
            'data' => $data
        ];

        if($data->tipo=='constancia_primera_matricula'){
            $response = ConstanciaPrimeraMatriculaPdf::buildReport($datos);
        }elseif($data->tipo=='constancia_matricula'){
            $response = ConstanciaMatriculaPdf::buildReport($datos);            
        }

        return $response;
    }
}
