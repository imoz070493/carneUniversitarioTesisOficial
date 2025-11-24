<?php

namespace App\Http\Controllers;

use App\Convocatoria;
use App\Documento;
use App\Estudiante;
use App\Helpers\Import\PagoImport;
use App\Http\Controllers\ExportExcel\GenericExport;
use App\Http\Controllers\ExportExcel\PhotosExport;
use App\Http\Requests\InscritoFormRequest;
use App\Http\Requests\PagoImportFormRequest;
use App\Http\Requests\VoucherValidadoFormRequest;
use App\Inscrito;
use App\PeriodoAcademico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;
use ZipArchive;
use Illuminate\Support\Str;

class InscritoController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
\Log::info($request->all());
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $per_page = $request->per_page;
        $order_by = $request->order_by;
        $mode_order = $request->mode_order;
        $filtros = $request->filtros;

        $inscritos = Inscrito::listarInscritos($buscar, $criterio, $per_page, $order_by, $mode_order, '', $filtros);
        $oficial = count(Inscrito::join('convocatorias as c','inscritos.convocatoria_id','=','c.id')->whereNull('activo')->whereNull('fecha_anulado')->get());
        $anulado = count(Inscrito::join('convocatorias as c','inscritos.convocatoria_id','=','c.id')->whereNull('activo')->whereNotNull('fecha_anulado')->get());
        $nuevo = count(Inscrito::join('convocatorias as c','inscritos.convocatoria_id','=','c.id')->whereNull('activo')->where('duplicado',0)->whereNull('fecha_anulado')->get());
        $duplicado = count(Inscrito::join('convocatorias as c','inscritos.convocatoria_id','=','c.id')->whereNull('activo')->where('duplicado',1)->whereNull('fecha_anulado')->get());

        $convocatoria_actual = Convocatoria::whereNull('activo')->first();
        $periodo_actual = PeriodoAcademico::where('estado','Activo')->first();

        return [
            'pagination' => [
                'total' => $inscritos->total(),
                'current_page' => $inscritos->currentPage(),
                'per_page' => $inscritos->perPage(),
                'last_page' => $inscritos->lastPage(),
                'from' => $inscritos->firstItem(),
                'to' => $inscritos->lastItem(),
                'oficial' => $oficial,
                'anulado' => $anulado,
                'nuevo' => $nuevo,
                'duplicado' => $duplicado,
                'convocatoria_actual' => $convocatoria_actual?$convocatoria_actual->nombre:null,
                'periodo_actual' => $periodo_actual?$periodo_actual->nombre:null,
            ],
            'inscritos' => $inscritos
        ];
    }

    public function indexHistorico(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $per_page = $request->per_page;
        $order_by = $request->order_by;
        $mode_order = $request->mode_order;
        $convocatoria_id = $request->convocatoria_id;

        $inscritos = Inscrito::listarInscritosHistorico($buscar, $criterio, $per_page, $order_by, $mode_order,null,$convocatoria_id);

        return [
            'pagination' => [
                'total' => $inscritos->total(),
                'current_page' => $inscritos->currentPage(),
                'per_page' => $inscritos->perPage(),
                'last_page' => $inscritos->lastPage(),
                'from' => $inscritos->firstItem(),
                'to' => $inscritos->lastItem(),
            ],
            'inscritos' => $inscritos
        ];
    }

    public function store(InscritoFormRequest $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();
        $convocatoria_actual = Convocatoria::whereNull('activo')->first();
        $data['convocatoria_id'] = $convocatoria_actual->id;
        $data['folder'] = $convocatoria_actual->folder;
        $data['voucher_validado'] = false;

        $data_estudiante = [
            'id' => $data['estudiante_id'],
            'correo_personal' => isset($data['correo_personal'])?$data['correo_personal']:null,
            'telefono1' => isset($data['telefono1'])?$data['telefono1']:null,
            'telefono2' => isset($data['telefono2'])?$data['telefono2']:null,
        ];

        try{
            DB::beginTransaction();

            $estudiante_update = Estudiante::guardarDatos($data_estudiante);
            $inscrito = Inscrito::guardarDatos($data);

            DB::commit();
            return response()->json([
                'cod_sunat' => 0,
                'msj_app' => $inscrito,
            ],200);
    	}catch(\Exception $e){
			DB::rollback();
            \Log::info($e);
            return response()->json([
                'message' => 'No se puede registrar la venta',
                'error' => $e
            ], 500);
    	}

    }

    public function storeTest(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();
        $convocatoria_actual = Convocatoria::whereNull('activo')->first();
        $data['convocatoria_id'] = $convocatoria_actual->id;
        $data['folder'] = $convocatoria_actual->folder;
        $data['voucher_validado'] = false;

        $data_estudiante = [
            'id' => $data['estudiante_id'],
            'correo_personal' => isset($data['correo_personal'])?$data['correo_personal']:null,
            'telefono1' => isset($data['telefono1'])?$data['telefono1']:null,
            'telefono2' => isset($data['telefono2'])?$data['telefono2']:null,
        ];

        try{
            DB::beginTransaction();

            $estudiante_update = Estudiante::guardarDatos($data_estudiante);
            $inscrito = Inscrito::guardarDatos($data);

            DB::commit();
            return response()->json([
                'cod_sunat' => 0,
                'msj_app' => $inscrito,
            ],200);
    	}catch(\Exception $e){
			DB::rollback();
            \Log::info($e);
            return response()->json([
                'message' => 'No se puede registrar la venta',
                'error' => $e
            ], 500);
    	}

    }

    public function update(InscritoFormRequest $request)
    {
        if(!$request->ajax()) return redirect('/');

        $inscrito = Inscrito::findOrFail($request->id);

        $convocatoria_actual = Convocatoria::whereNull('activo')->first();
        
        $data = [
            'id' => $request->id,
            'dni' => $request->dni,
            'foto_validado' => $request->foto_validado,
            'new_document' => $request->new_document,
            'observacion' => $request->observacion,
            'folder' => $convocatoria_actual->folder,
            'foto' => $request->foto,

            'fecha_inicio_edicion' => $request->fecha_inicio_edicion,
            'fecha_fin_edicion' => $request->fecha_fin_edicion,
        ];

        return Inscrito::guardarDatos($data);
    }

    public function validarVoucher(VoucherValidadoFormRequest $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = [
            'id' => $request->id,
            'voucher_validado' => $request->voucher_validado,
            'observacion' => $request->observacion,
        ];

        return Inscrito::guardarDatos($data);
    }

    public function updateAnulacion(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $inscrito = Inscrito::findOrFail($request->id);

        $data = [
            'id' => $request->id,
            'observacion' => $request->observacion,
            'fecha_anulado' => \Carbon\Carbon::now()
        ];

        return Inscrito::guardarDatos($data);
    }

    public function validarCredencial(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        $documento = Inscrito::validarCredencial('dni', $data['dni'], $data['id']);

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

    public function invalidarFotografia(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        try{
            \DB::beginTransaction();
        
            Inscrito::guardarDatos([
                'id' => $data['id'],
                'foto_validado' => '0'
            ]);

            $inscrito = Inscrito::findOrFail($data['id']);
            $convocatoria_actual = Convocatoria::whereNull('activo')->first();
            $folder = $convocatoria_actual->folder;
            $photo = $inscrito->foto;

            // Ruta del archivo original
            $archivo_origen = public_path("storage/".$folder."/1_validado/".$photo);

            // Ruta del nuevo destino
            $archivo_destino = public_path("storage/".$folder."/2_sin_validar/".$photo);

            // Mover y reemplazar el archivo
            if (rename($archivo_origen, $archivo_destino)) {
                echo json_encode([
                    'msg' => 'El archivo ha sido movido y reemplazado exitosamente',
                    // 'data' => $documento
                ]);
            } else {
                echo json_encode([
                    'msg' => 'Hubo un error al mover y reemplazar el archivo.',
                    // 'data' => $documento
                ]);
            }

            \DB::commit();
            return 2;
        }catch(\Exception $e){
			\DB::rollback();
            \Log::info($e->getMessage());
            throw ($e);
            // return response()->json([
            //     'message' => $e->getMessage(),
            //     'error' => $e
            // ], 500);
    	}
    }

    public function validarImagen(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        $convocatoria_actual = Convocatoria::whereNull('activo')->first();
        $folder = $convocatoria_actual->folder;

        $datos_validacion = Inscrito::validarImagen($data['new_document'], $folder);

        return $datos_validacion;
    }

    public function cambiarDpiImagen(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        $convocatoria_actual = Convocatoria::whereNull('activo')->first();
        $folder = $convocatoria_actual->folder;

        $cambiar_dpi = Inscrito::cambiarDpi($data['new_document'], $folder);

        return $cambiar_dpi;
    }

    public function obtenerFotoAnteriorEstudiante(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        $inscrito_anterior = Inscrito::obtenerUltimaInscripcionEstudiante($data['estudiante_id']);
        
        if($inscrito_anterior){
            $image_path = public_path('storage/'.$inscrito_anterior->folder."/1_validado/".$inscrito_anterior->foto);
            // $image_path = $folder."/5_temps\modificada_dpi_$file_name";
    
            $response =  new StreamedResponse(
                function () use ($image_path) {
                    readfile($image_path);
                    // print file_get_contents($image_path);
                }
            );
            $response->headers->set('Content-Type', 'image/jpeg');
            $response->headers->set('Content-Disposition', 'attachment;filename=image.jpeg');
            $response->headers->set('Cache-Control', 'max-age=0');
            return $response;
        }else{
            return response()->json([
                'message' => "FOTO NO ENCONTRADA",
                // 'error' => $e
            ], 200);
        }
    }

    public function obtenerFotoEstudiante(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        $convocatoria_actual = Convocatoria::whereNull('activo')->first();
        $foto_folder = public_path('/storage/'.$convocatoria_actual->folder.'/2_sin_validar/'.$data['foto']);
        
        if(file_exists($foto_folder)){
            // $image_path = public_path('storage/'.$inscrito_anterior->folder."/1_validado/".$inscrito_anterior->foto);
            $image_path = $foto_folder;
    
            $response =  new StreamedResponse(
                function () use ($image_path) {
                    readfile($image_path);
                    // print file_get_contents($image_path);
                }
            );
            $response->headers->set('Content-Type', 'image/jpeg');
            $response->headers->set('Content-Disposition', 'attachment;filename=image.jpeg');
            $response->headers->set('Cache-Control', 'max-age=0');
            return $response;
        }else{
            return response()->json([
                'message' => "FOTO NO ENCONTRADA",
                // 'error' => $e
            ], 200);
        }
    }

    public function exportReporteInscrito(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        \Log::info($request->all());

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $per_page = -1;
        $order_by = $request->order_by;
        $mode_order = $request->mode_order;

        $datos = Inscrito::listarInscritos($buscar, $criterio, -1, $order_by, $mode_order, 'both', []);

        $columnas = [
            'nombres' => 'Nombres',
            'apellido_paterno' => 'Apellido Paterno',
            'apellido_materno' => 'Apellido Materno',
            'codigo_estudiante' => 'Codigo Estudiante',
            'dni' => 'DNI',
            'sexo' => 'Sexo',
            'escuela_profesional' => 'Escuela Profesional',
            'nombres_validado' => 'Nombres Validado',
            'apellido_paterno_validado' => 'Apellido Paterno Validado',
            'apellido_materno_validado' => 'Apellido Materno Validado',
            'duplicado' => 'Duplicado',
            'credencial_validado' => 'Credencial Validado',
            'created_at' => 'Fecha Tramite',
            'nombre_convocatoria' => 'Convocatoria',
            'anulado' => 'Anulado',
            'fecha_anulado' => 'Fecha Anulado',
        ];

        $formateadores = [
            'duplicado' => function($a){
                if($a->duplicado=='1') return "SI";
                else return "NO";
            },
            'credencial_validado' => function($a){
                if($a->credencial_validado=='validado') return "SI";
                if($a->credencial_validado=='no_validado') return "NO";
                if($a->credencial_validado=='no_encontrado') return "NO ENCONTRADO";
            },
            'anulado' => function($a){
                if($a->fecha_anulado) return "SI";
                else return "NO";
            },
        ];

        $reporte = GenericExport::exportExcelTable($columnas, $datos, 'INSCRITOS', 'php://output',$formateadores);

        return $reporte;
    }

    public function exportReporteInscritoOficial(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        \Log::info($request->all());

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $per_page = -1;
        $order_by = $request->order_by;
        $mode_order = $request->mode_order;

        $datos = Inscrito::listarInscritos($buscar, $criterio, -1, $order_by, $mode_order, 'no_anulado', []);

        $columnas = [
            'nombres' => 'Nombres',
            'apellido_paterno' => 'Apellido Paterno',
            'apellido_materno' => 'Apellido Materno',
            'codigo_estudiante' => 'Codigo Estudiante',
            'escuela_profesional' => 'Escuela Profesional',
            'dni' => 'DNI',
            'sexo' => 'Sexo',
            'duplicado' => 'Duplicado',
            'credencial_validado' => 'Credencial Validado',
            'created_at' => 'Fecha Tramite',
            'nombre_convocatoria' => 'Convocatoria',
            'numero_recibo' => 'N° Recibo',
            'voucher_validado' => 'Voucher Validado',
        ];

        $formateadores = [
            'nombres' => function($a){
                if($a->credencial_validado=='validado') return $a->nombres_validado;
                if($a->credencial_validado=='no_encontrado') return $a->nombres;
                else return $a->nombres;
            },
            'apellido_paterno' => function($a){
                if($a->credencial_validado=='validado') return $a->apellido_paterno_validado;
                if($a->credencial_validado=='no_encontrado') return $a->apellido_paterno;
                else return $a->apellido_paterno;
            },
            'apellido_materno' => function($a){
                if($a->credencial_validado=='validado') return $a->apellido_materno_validado;
                if($a->credencial_validado=='no_encontrado') return $a->apellido_materno;
                else return $a->apellido_materno;
            },
            'duplicado' => function($a){
                if($a->duplicado=='1') return "SI";
                else return "NO";
            },
            'credencial_validado' => function($a){
                if($a->credencial_validado=='validado') return "SI";
                if($a->credencial_validado=='no_validado') return "NO";
                if($a->credencial_validado=='no_encontrado') return "NO ENCONTRADO";
            },
            'voucher_validado' => function($a){
                if($a->duplicado=='1') return "SI";
                else return "NO";
            },
        ];

        $reporte = GenericExport::exportExcelTable($columnas, $datos, 'INSCRITOS', 'php://output',$formateadores);

        return $reporte;
    }

    public function exportReporteInscritoOficialHistorico(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        \Log::info($request->all());

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $per_page = -1;
        $order_by = $request->order_by;
        $mode_order = $request->mode_order;
        $convocatoria_id = $request->convocatoria_id;

        $datos = Inscrito::listarInscritosHistorico($buscar, $criterio, $per_page, $order_by, $mode_order,'both',$convocatoria_id);

        $columnas = [
            'nombres' => 'Nombres',
            'apellido_paterno' => 'Apellido Paterno',
            'apellido_materno' => 'Apellido Materno',
            'codigo_estudiante' => 'Codigo Estudiante',
            'escuela_profesional' => 'Escuela Profesional',
            'dni' => 'DNI',
            'sexo' => 'Sexo',
            'duplicado' => 'Duplicado',
            'credencial_validado' => 'Credencial Validado',
            'created_at' => 'Fecha Tramite',
            'nombre_convocatoria' => 'Convocatoria',
            'numero_recibo' => 'N° Recibo',
        ];

        $formateadores = [
            'nombres' => function($a){
                if($a->credencial_validado=='validado') return $a->nombres_validado;
                if($a->credencial_validado=='no_encontrado') return $a->nombres;
                else return $a->nombres;
            },
            'apellido_paterno' => function($a){
                if($a->credencial_validado=='validado') return $a->apellido_paterno_validado;
                if($a->credencial_validado=='no_encontrado') return $a->apellido_paterno;
                else return $a->apellido_paterno;
            },
            'apellido_materno' => function($a){
                if($a->credencial_validado=='validado') return $a->apellido_materno_validado;
                if($a->credencial_validado=='no_encontrado') return $a->apellido_materno;
                else return $a->apellido_materno;
            },
            'duplicado' => function($a){
                if($a->duplicado=='1') return "SI";
                else return "NO";
            },
            'credencial_validado' => function($a){
                if($a->credencial_validado=='validado') return "SI";
                if($a->credencial_validado=='no_validado') return "NO";
                if($a->credencial_validado=='no_encontrado') return "NO ENCONTRADO";
            },
        ];

        $reporte = GenericExport::exportExcelTable($columnas, $datos, 'INSCRITOS', 'php://output',$formateadores);

        return $reporte;
    }

    public function exportReporteInscritoAnulado(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        \Log::info($request->all());

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $per_page = -1;
        $order_by = $request->order_by;
        $mode_order = $request->mode_order;

        $datos = Inscrito::listarInscritos($buscar, $criterio, -1, $order_by, $mode_order, 'anulado',[]);

        $columnas = [
            'nombres' => 'Nombres',
            'apellido_paterno' => 'Apellido Paterno',
            'apellido_materno' => 'Apellido Materno',
            'codigo_estudiante' => 'Codigo Estudiante',
            'escuela_profesional' => 'Escuela Profesional',
            'dni' => 'DNI',
            'sexo' => 'Sexo',
            'duplicado' => 'Duplicado',
            'credencial_validado' => 'Credencial Validado',
            'created_at' => 'Fecha Tramite',
            'observacion' => 'Observacion',
            'fecha_anulado' => 'Fecha Anulado',
            'nombre_convocatoria' => 'Convocatoria',
        ];

        $formateadores = [
            'nombres' => function($a){
                if($a->credencial_validado=='1') return $a->nombres_validado;
                else return $a->nombres;
            },
            'apellido_paterno' => function($a){
                if($a->credencial_validado=='1') return $a->apellido_paterno_validado;
                else return $a->apellido_paterno;
            },
            'apellido_materno' => function($a){
                if($a->credencial_validado=='1') return $a->apellido_materno_validado;
                else return $a->apellido_materno;
            },
            'duplicado' => function($a){
                if($a->duplicado=='1') return "SI";
                else return "NO";
            },
            'credencial_validado' => function($a){
                if($a->credencial_validado=='validado') return "SI";
                if($a->credencial_validado=='no_validado') return "NO";
                if($a->credencial_validado=='no_encontrado') return "NO ENCONTRADO";
            },
        ];

        $reporte = GenericExport::exportExcelTable($columnas, $datos, 'INSCRITOS', 'php://output',$formateadores);

        return $reporte;
    }

    public function descargarPhotosNuevo(Request $request)
    {
        $data = $request->all();

        $convocatoria_actual = Convocatoria::whereNull('activo')->first();
        $folder_origin = public_path('/storage/'.$convocatoria_actual->folder.'/1_validado');
        $folder_zip = public_path('storage/'.$convocatoria_actual->folder.'/3_comprimidos');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $per_page = -1;
        $order_by = $request->order_by;
        $mode_order = $request->mode_order;
        $tipo_tramite = $request->tipo_tramite;
        $datos = Inscrito::listarInscritosOficial($buscar, $criterio, -1, $order_by, $mode_order, $tipo_tramite);

        $path_zip = Inscrito::zipPhotos($folder_origin,$folder_zip, $datos);

        $response =  new StreamedResponse(
            function () use ($path_zip) {
                print file_get_contents($path_zip);
            }
        );
        $response->headers->set('Content-Type', 'application/zip');
        $response->headers->set('Content-Disposition', 'attachment;filename="photos.zip"');
        $response->headers->set('Cache-Control', 'max-age=0');
        return $response;
    }

    public function descargarPhotosDiversos(Request $request)
    {
        $data = $request->all();
        
        $codigos = $data['codigos'];

        $codigos_array = explode(",", $codigos);\Log::info($codigos_array);
        
        $convocatoria_actual = Convocatoria::whereNull('activo')->first();
        $folder_zip = public_path('storage/'.$convocatoria_actual->folder.'/3_comprimidos');
        $zip = new ZipArchive;
        $zip_name = Str::random().'.zip';
        $path_zip = $folder_zip.'/'.$zip_name;
        \Log::info($path_zip);
        $zip->open($path_zip,ZipArchive::CREATE);

        foreach ($codigos_array as $key => $value) {
            $inscrito = Inscrito::obtenerUltimaInscripcionDiversos($value);
            if (file_exists(public_path('/storage/'.$inscrito->folder.'/1_validado'))) {
                $folder_origin = public_path('/storage/'.$inscrito->folder.'/1_validado');
                $zip->addFile($folder_origin.'/'.$inscrito->foto, $inscrito->codigo_estudiante.".jpg");
            } else if(file_exists(public_path('/storage/'.$inscrito->folder.'/2_sin_validar'))){
                $folder_origin = public_path('/storage/'.$inscrito->folder.'/2_sin_validar');
                $zip->addFile($folder_origin.'/'.$inscrito->foto, $inscrito->codigo_estudiante.".jpg");
            }else{
                \Log::info("Fotografia no existe: $inscrito->codigo_estudiante");
            }
        }

        // $zip->addFile(storage_path('app/public/convocatoria_202301/01_10015549.jpg'),'01_100155491.jpg');
        $zip->close();

        $response =  new StreamedResponse(
            function () use ($path_zip) {
                print file_get_contents($path_zip);
            }
        );
        $response->headers->set('Content-Type', 'application/zip');
        $response->headers->set('Content-Disposition', 'attachment;filename="photos.zip"');
        $response->headers->set('Cache-Control', 'max-age=0');
        return $response;
    }

    public function exportReporteInscritoOficialNuevoDuplicado(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        \Log::info($request->all());

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $per_page = -1;
        $order_by = $request->order_by;
        $mode_order = $request->mode_order;
        $tipo_tramite = $request->tipo_tramite;

        $datos = Inscrito::listarInscritosOficial($buscar, $criterio, -1, $order_by, $mode_order, $tipo_tramite);

        $columnas = [
            'nombres' => 'Nombres',
            'apellido_paterno' => 'Apellido Paterno',
            'apellido_materno' => 'Apellido Materno',
            'codigo_estudiante' => 'Codigo Estudiante',
            'escuela_profesional' => 'Escuela Profesional',
            'dni' => 'DNI',
            'sexo' => 'Sexo',
            'duplicado' => 'Duplicado',
            'credencial_validado' => 'Credencial Validado',
            'created_at' => 'Fecha Tramite',
            'nombre_convocatoria' => 'Convocatoria',
            'numero_recibo' => 'N° Recibo',
        ];

        $formateadores = [
            'nombres' => function($a){
                if($a->credencial_validado=='validado') return $a->nombres_validado;
                if($a->credencial_validado=='no_encontrado') return $a->nombres;
                else return $a->nombres;
            },
            'apellido_paterno' => function($a){
                if($a->credencial_validado=='validado') return $a->apellido_paterno_validado;
                if($a->credencial_validado=='no_encontrado') return $a->apellido_paterno;
                else return $a->apellido_paterno;
            },
            'apellido_materno' => function($a){
                if($a->credencial_validado=='validado') return $a->apellido_materno_validado;
                if($a->credencial_validado=='no_encontrado') return $a->apellido_materno;
                else return $a->apellido_materno;
            },
            'duplicado' => function($a){
                if($a->duplicado=='1') return "SI";
                else return "NO";
            },
            'credencial_validado' => function($a){
                if($a->credencial_validado=='validado') return "SI";
                if($a->credencial_validado=='no_validado') return "NO";
                if($a->credencial_validado=='no_encontrado') return "NO ENCONTRADO";
            },
        ];

        $reporte = GenericExport::exportExcelTable($columnas, $datos, 'INSCRITOS', 'php://output',$formateadores);

        return $reporte;
    }

    public function exportReporteInscritoOficialPhotoNuevoDuplicado(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        \Log::info($request->all());

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $per_page = -1;
        $order_by = $request->order_by;
        $mode_order = $request->mode_order;
        $tipo_tramite = $request->tipo_tramite;

        $datos = Inscrito::listarInscritosOficial($buscar, $criterio, -1, $order_by, $mode_order, $tipo_tramite);

        $columnas = [
            'nombres' => 'Nombres',
            'apellido_paterno' => 'Apellido Paterno',
            'apellido_materno' => 'Apellido Materno',
            'codigo_estudiante' => 'Codigo Estudiante',
            'escuela_profesional' => 'Escuela Profesional',
            'dni' => 'DNI',
            'sexo' => 'Sexo',
            'duplicado' => 'Duplicado',
            'credencial_validado' => 'Credencial Validado',
            'created_at' => 'Fecha Tramite',
            'nombre_convocatoria' => 'Convocatoria',
            'numero_recibo' => 'N° Recibo',
        ];

        $formateadores = [
            'nombres' => function($a){
                if($a->credencial_validado=='validado') return $a->nombres_validado;
                if($a->credencial_validado=='no_encontrado') return $a->nombres;
                else return $a->nombres;
            },
            'apellido_paterno' => function($a){
                if($a->credencial_validado=='validado') return $a->apellido_paterno_validado;
                if($a->credencial_validado=='no_encontrado') return $a->apellido_paterno;
                else return $a->apellido_paterno;
            },
            'apellido_materno' => function($a){
                if($a->credencial_validado=='validado') return $a->apellido_materno_validado;
                if($a->credencial_validado=='no_encontrado') return $a->apellido_materno;
                else return $a->apellido_materno;
            },
            'duplicado' => function($a){
                if($a->duplicado=='1') return "SI";
                else return "NO";
            },
            'credencial_validado' => function($a){
                if($a->credencial_validado=='validado') return "SI";
                if($a->credencial_validado=='no_validado') return "NO";
                if($a->credencial_validado=='no_encontrado') return "NO ENCONTRADO";
            },
        ];

        $reporte = PhotosExport::exportExcelTable($datos, 'INCRITOS', 'php://output',$formateadores = []);

        return $reporte;
    }

    public function importarPagos(PagoImportFormRequest $request)
    {
        $data = $request->all();

        // LOG::info($data);

        try{
            $filename = PagoImport::guardarExcel($request->excel_document);

            // $id = app(Dispatcher::class)->dispatch(new MatriculaImportJob($filename, $data['periodo_academico_id']));
            $convocatoria_actual = Convocatoria::whereNull('activo')->first();
            $response = PagoImport::guardarDatos($filename, $convocatoria_actual->id);
            // \Log::info(gettype($response));

            return 2;

            return CargaMatricula::guardarDatos([
                'document' => $filename,
                // 'job_id' => $id,
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
}
