<?php

namespace App\Http\Controllers;

use App\CargaMatricula;
use App\Convocatoria;
use App\Helpers\Import\MatriculaImport;
use App\Http\Controllers\ExportExcel\GenericExport;
use App\Http\Requests\MatriculaImportFormRequest;
use App\Inscrito;
use App\Jobs\MatriculaImportJob;
use App\Matricula;
use App\PeriodoAcademico;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class MatriculaController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $per_page = $request->per_page;
        $order_by = $request->order_by;
        $mode_order = $request->mode_order;
        $periodo_academico_id = $request->periodo_academico_id;

        $matriculas = Matricula::listarMatriculas($buscar, $criterio, $per_page, $order_by, $mode_order, $periodo_academico_id);

        return [
            'pagination' => [
                'total' => $matriculas->total(),
                'current_page' => $matriculas->currentPage(),
                'per_page' => $matriculas->perPage(),
                'last_page' => $matriculas->lastPage(),
                'from' => $matriculas->firstItem(),
                'to' => $matriculas->lastItem(),
            ],
            'matriculas' => $matriculas
        ];
    }

    public function obtenerMatricula(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $tipo_documento = $request->tp;
        $numero_documento = $request->n;

        $documento = Matricula::obtenerMatricula($tipo_documento, $numero_documento);

        return $documento;
    }

    public function obtenerConvocatoria(Request $request){

        if(!$request->ajax()) return redirect('/');

        $estudiante_id = \Auth::user()->estudiante_id;

        $estudiante = \App\Estudiante::select(
                                'escuela_profesional',
                                'dni',
                                'dni as numero_documento',
                                'codigo_estudiante',
                                'apellido_paterno',
                                'apellido_materno',
                                'nombres',
                                'sexo',
                                'id',
                                'id as estudiante_id',
                                'correo_institucional'
                            )->findOrFail($estudiante_id);

        $convocatoria_actual = Convocatoria::whereNull('activo')->first();

        return response()->json([
            'estudiante' => $estudiante,
            'convocatoria' => $convocatoria_actual->nombre,
            'estado_convocatoria' => $convocatoria_actual->fecha_fin >= \Carbon\Carbon::now()->format('Y-m-d') ? 'activo' : 'inactivo',
        ]);
    }

    public function obtenerMatriculaEstudiante(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $estudiante_id = \Auth::user()->estudiante_id;
        $estudiante = \App\Estudiante::select(
                                'escuela_profesional',
                                'dni',
                                'dni as numero_documento',
                                'codigo_estudiante',
                                'apellido_paterno',
                                'apellido_materno',
                                'nombres',
                                'sexo',
                                'id',
                                'id as estudiante_id',
                                'correo_institucional'
                            )->findOrFail($estudiante_id);

        $matricula = Matricula::obtenerMatriculaEstudiante($estudiante->id);
        $convocatoria_actual = Convocatoria::whereNull('activo')->first();
        $fin_convocatoria = $convocatoria_actual->fecha_fin;

        if($matricula){
            // Matriculado
            $estado_matricula = "matriculado";
            // Para saber si un estudiante ha sido inscrito
            $inscrito = Inscrito::obtenerInscripcionVigente($estudiante_id);
            
            if($inscrito){
                $estado_tramite = "inscrito";
                $incripcion_estudiante = $inscrito;
            }else{
                $estado_tramite = "no_inscrito";
                $ultima_inscripcion = Inscrito::obtenerUltimaInscripcionEstudiante($estudiante_id);
                if($ultima_inscripcion) $foto_anterior = $ultima_inscripcion->folder."/1_validado/".$ultima_inscripcion->foto;
                else $foto_anterior = null;
            }
        }else{
            // No Matriculado
            $estado_matricula = "no_matriculado";
            $foto_anterior = null;
            $incripcion_estudiante = null;
        }
        \Log::info("Fecha Fin:".$convocatoria_actual->fecha_fin);

        return response()->json([
            'matricula' => $matricula,
            'estudiante' => $estudiante,
            'convocatoria' => $convocatoria_actual->nombre,
            'estado_convocatoria' => $convocatoria_actual->fecha_fin >= \Carbon\Carbon::now()->format('Y-m-d') ? 'activo' : 'inactivo',
            'estado_matricula' => $estado_matricula,
            'estado_tramite' => isset($estado_tramite)?$estado_tramite:null,

            'foto_anterior' => isset($foto_anterior)?$foto_anterior:null,

            'inscripcion_estudiante' => isset($incripcion_estudiante)?$incripcion_estudiante:null,
        ]);
    }

    public function obtenerInscripcionEstudiante(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $estudiante_id = \Auth::user()->estudiante_id;
        
        // Para saber si un estudiante ha sido inscrito
        $inscrito = Inscrito::obtenerInscripcionVigente($estudiante_id);
        
        if($inscrito){
            $estado_tramite = "inscrito";
            $incripcion_estudiante = $inscrito;
        }else{
            $estado_tramite = "no_inscrito";
            $ultima_inscripcion = Inscrito::obtenerUltimaInscripcionEstudiante($estudiante_id);
            $foto_anterior = $ultima_inscripcion->folder."/1_validado/".$ultima_inscripcion->foto;
        }


        return response()->json([
            'estado_tramite' => $estado_tramite,
            'inscripcion_estudiante' => $incripcion_estudiante
        ]);
    }

    public function obtenerConvocatorias(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $estudiante_id = \Auth::user()->estudiante_id;

        $convocatorias = Inscrito::obtenerConvocatorias($estudiante_id);

        return $convocatorias;
    }

    public function descargarPlantilla(Request $request)
    {
        $data = $request->all();

        // LOG::info($data);

        $ruta_document = public_path().'/template_imports/matriculas.xlsx';

        $response =  new StreamedResponse(
            function () use ($ruta_document) {
                print file_get_contents($ruta_document);
            }
        );
        $response->headers->set('Content-Type', 'application/vnd.ms-excel');
        $response->headers->set('Content-Disposition', 'attachment;filename="personas.xlsx"');
        $response->headers->set('Cache-Control', 'max-age=0');
        return $response;
    }

    public function importar(MatriculaImportFormRequest $request)
    {
        $data = $request->all();

        // LOG::info($data);

        try{
            $filename = MatriculaImport::guardarExcel($request->excel_document);

            $id = app(Dispatcher::class)->dispatch(new MatriculaImportJob($filename, $data['periodo_academico_id']));
            // $response = MatriculaImport::guardarDatos($filename);
            // \Log::info(gettype($response));

            return CargaMatricula::guardarDatos([
                'document' => $filename,
                'job_id' => $id,
                'estado' => 'cargado',
                'periodo_academico_id' => $data['periodo_academico_id'],
            ]);

            if(gettype($response)=='object'){
                \Log::info("Imprimiendo");
                throw ($response);
            }

            if ($response == 2) {
                /* enviar el resultado */
                return response()->json([
                    'message' => 'importado correctamente',
                    'data' => $data,
                    'id' => $response,
                ]);
            } else {
                $array_errores = [];
                
                for($i=0;$i<count($response);$i++){
                    $objecto_error = new \stdClass();
                    $objecto_error->id = $i + 1;
                    $objecto_error->descripcion = $response[$i];
                    array_push($array_errores,$objecto_error);
                }

                return response()->json([
                    'message' => 'error al importar',
                    'data' => $array_errores,
                ], 500);
            }
        }catch(\Exception $e){
            \Log::info($e);
            \Log::info($e->getMessage());

            $message = 'Ha ocurrido un error al importar el excel';

            $message = "";$code="";
            if($e->getMessage()=='sin_periodo_actual'){
                $code = 'sin_periodo_actual';
                $message = "No se ha registrado un periodo activo, por favor dirijase al menu configuracion.";
            }

            if($e->getMessage()=='excel_vacio'){
                $code = 'excel_vacio';
                $message = "El excel se encuentra vacio.";
            }

            return response()->json([
                'message' => $message,
                'error' => $e,
                'code' => $code
            ], 500);
    	}
    }

    public function descargarMatriculadosNoInscritos(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        \Log::info($request->all());

        // $buscar = $request->buscar;
        // $criterio = $request->criterio;
        // $per_page = -1;
        // $order_by = $request->order_by;
        // $mode_order = $request->mode_order;

        $convocatoria_actual = Convocatoria::whereNull('activo')->first();
        $periodo_academico = PeriodoAcademico::where('estado','Activo')->first();

        $datos = Inscrito::listarMatriculadosNoInscritos($convocatoria_actual->id, $periodo_academico->id);

        $columnas = [
            'escuela_profesional' => 'Escuela Profesional',
            'codigo_estudiante' => 'Codigo Estudiante',
            'dni' => 'DNI',
            'apellido_paterno' => 'Apellido Paterno',
            'apellido_materno' => 'Apellido Materno',
            'nombres' => 'Nombres',
            'telefono1' => 'Telefono 1',
            'telefono2' => 'Telefono 2'
        ];

        $formateadores = [];

        $reporte = GenericExport::exportExcelTable($columnas, $datos, 'NO INSCRITOS', 'php://output',$formateadores);

        return $reporte;
    }
}
