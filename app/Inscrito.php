<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ZipArchive;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\StreamedResponse;

class Inscrito extends Model
{
    protected $table = 'inscritos';

    protected $primaryKey = 'id';

    protected $fillable = [
        'codigo_estudiante',
        'apellido_paterno_validado',
    	'apellido_materno_validado',
    	'nombres_validado',
        'foto',
        'foto_validado',
        'duplicado',
        'credencial_validado',
        'voucher_validado',
        'fecha_anulado',
        'observacion',
        'convocatoria_id',
        'estudiante_id',
        'numero_recibo',
        'fecha_inicio_tramite',
        'fecha_fin_tramite',
        'usuario_create_id',
        'usuario_update_id',
        'fecha_inicio_edicion',
        'fecha_fin_edicion',
    ];

    public static function guardarDatos($datos){
        $data = [];//\Log::info($datos);

        if (array_key_exists('codigo_estudiante', $datos)) $data['codigo_estudiante'] = $datos['codigo_estudiante'];
        if (array_key_exists('apellido_paterno_validado', $datos)) $data['apellido_paterno_validado'] = $datos['apellido_paterno_validado'];
        if (array_key_exists('apellido_materno_validado', $datos)) $data['apellido_materno_validado'] = $datos['apellido_materno_validado'];
        if (array_key_exists('nombres_validado', $datos)) $data['nombres_validado'] = $datos['nombres_validado'];
        if (array_key_exists('convocatoria_id', $datos)) $data['convocatoria_id'] = $datos['convocatoria_id'];
        if (array_key_exists('estudiante_id', $datos)) $data['estudiante_id'] = $datos['estudiante_id'];

        if (isset($datos['id'])) {
            if(isset($datos['new_document'])){
                if($datos['foto_validado']) $folder = $datos['folder'].'/1_validado';
                else $folder = $datos['folder'].'/2_sin_validar';

                // $file_name = '1_'.$datos['dni'];
                // $file_name = Str::uuid().'.jpg';
                $file_name = $datos['foto'];\Log::info("Filename: $file_name");
                $fileName = \App\Helpers\Archivo::guardarImagen($datos['new_document'], $folder, $file_name);
                // $data['foto'] = $fileName;
            }
        }else{
            if(isset($datos['new_document'])){
                if($datos['foto_validado']) $folder = $datos['folder'].'/1_validado';
                else $folder = $datos['folder'].'/2_sin_validar';

                // $file_name = '1_'.$datos['dni'];
                // $file_name = Str::uuid().'.jpg';
                $fileName = \App\Helpers\Archivo::guardarImagen($datos['new_document'], $folder);
                $data['foto'] = $fileName;
            }
        }

        if (array_key_exists('foto_validado', $datos)) $data['foto_validado'] = $datos['foto_validado'];
        if (array_key_exists('credencial_validado', $datos)) $data['credencial_validado'] = $datos['credencial_validado'];
        if (array_key_exists('voucher_validado', $datos)) $data['voucher_validado'] = $datos['voucher_validado'];
        if (array_key_exists('duplicado', $datos)) $data['duplicado'] = $datos['duplicado'];
        if (array_key_exists('fecha_anulado', $datos)) $data['fecha_anulado'] = $datos['fecha_anulado'];
        if (array_key_exists('observacion', $datos)) $data['observacion'] = $datos['observacion'];
        if (array_key_exists('numero_recibo', $datos)) $data['numero_recibo'] = $datos['numero_recibo'];

        if (array_key_exists('fecha_inicio_edicion', $datos)) $data['fecha_inicio_edicion'] = $datos['fecha_inicio_edicion'];
        if (array_key_exists('fecha_fin_edicion', $datos)) $data['fecha_fin_edicion'] = $datos['fecha_fin_edicion'];
        
        if(isset($datos['id'])){
            $inscrito = Inscrito::findOrFail($datos['id']);
            $inscrito->update($data);
        }else{
            if (array_key_exists('fecha_inicio_tramite', $datos)) $data['fecha_inicio_tramite'] = $datos['fecha_inicio_tramite'];
            $data['fecha_fin_tramite'] = \Carbon\Carbon::now();
            $data['usuario_create_id'] = \Auth::user()->id;

            $inscrito = new Inscrito();
            $inscrito = $inscrito->create($data);
        }

        return $inscrito;
    }

    public static function guardarDatosPerfilEstudiante($datos){
        $data = [];//\Log::info($datos);

        if (array_key_exists('codigo_estudiante', $datos)) $data['codigo_estudiante'] = $datos['codigo_estudiante'];
        if (array_key_exists('apellido_paterno_validado', $datos)) $data['apellido_paterno_validado'] = $datos['apellido_paterno_validado'];
        if (array_key_exists('apellido_materno_validado', $datos)) $data['apellido_materno_validado'] = $datos['apellido_materno_validado'];
        if (array_key_exists('nombres_validado', $datos)) $data['nombres_validado'] = $datos['nombres_validado'];
        if (array_key_exists('convocatoria_id', $datos)) $data['convocatoria_id'] = $datos['convocatoria_id'];
        if (array_key_exists('estudiante_id', $datos)) $data['estudiante_id'] = $datos['estudiante_id'];
        
        if($datos['usar_foto_anterior']){
            // $file_name = '1_'.$datos['dni'];
            $folder = $datos['foto_anterior'];
            $file_name = Str::uuid().'.jpg';

            $from = "storage/".$datos['foto_anterior'];
            $to = "storage/".$datos['folder']."/1_validado/".$file_name;


            \Log::info($from.$to);
            copy($from, $to);
            $data['foto'] = $file_name;

            $folder_voucher = $datos['folder'].'/4_vouchers';\Log::info("Folder Voucher:".$folder_voucher);
            \App\Helpers\Archivo::guardarImagen($datos['new_document_voucher'], $folder_voucher, $file_name);

        }else{
            if(isset($datos['new_document'])){
                if($datos['foto_validado']) $folder = $datos['folder'].'/1_validado';
                else $folder = $datos['folder'].'/2_sin_validar';

                // $file_name = '1_'.$datos['dni'];
                $file_name = Str::uuid().'.jpg';
                $fileName = \App\Helpers\Archivo::guardarImagen($datos['new_document'], $folder, $file_name);
                $data['foto'] = $fileName;

                $folder_voucher = $datos['folder'].'/4_vouchers';
                \App\Helpers\Archivo::guardarImagen($datos['new_document_voucher'], $folder_voucher, $file_name);
            }
        }

        if (array_key_exists('foto_validado', $datos)) $data['foto_validado'] = $datos['foto_validado'];
        if (array_key_exists('voucher_validado', $datos)) $data['voucher_validado'] = $datos['voucher_validado'];
        if (array_key_exists('credencial_validado', $datos)) $data['credencial_validado'] = $datos['credencial_validado'];
        if (array_key_exists('duplicado', $datos)) $data['duplicado'] = $datos['duplicado'];
        if (array_key_exists('fecha_anulado', $datos)) $data['fecha_anulado'] = $datos['fecha_anulado'];
        if (array_key_exists('observacion', $datos)) $data['observacion'] = $datos['observacion'];
        if (array_key_exists('numero_recibo', $datos)) $data['numero_recibo'] = $datos['numero_recibo'];
        if (array_key_exists('usar_foto_anterior', $datos)) $data['usar_foto_anterior'] = $datos['usar_foto_anterior'];

        if(isset($datos['id'])){
            $inscrito = Inscrito::findOrFail($datos['id']);
            $inscrito->update($data);
        }else{
            $inscrito = new Inscrito();
            $inscrito = $inscrito->create($data);
        }

        return $inscrito;
    }

    public static function listarInscritos($buscar='', $criterio='nombre', $per_page='5', $order_by='', $mode_order='', $mode_anulado='both', $filtros=[]){
        /**
         * TODO: 
         * _FALTA HACER UN JOIN CON LA TABLA PRECIO VENTA QUE SE CREARA MAS ADELANTE
         * _Falta implementar el filtro de busqueda
         */
        $inscritos = Inscrito::join('convocatorias as convocatoria','inscritos.convocatoria_id','=','convocatoria.id')
                            ->join('estudiantes as e','inscritos.estudiante_id','=','e.id')
                            ->select(
                                'inscritos.id',
                                'e.escuela_profesional',
                                'e.dni as numero_documento',
                                'e.dni',
                                'e.codigo_estudiante',
                                'e.apellido_paterno',
                                'e.apellido_materno',
                                'e.nombres',
                                'inscritos.apellido_paterno_validado',
                                'inscritos.apellido_materno_validado',
                                'inscritos.nombres_validado',
                                'e.sexo',
                                'inscritos.foto',
                                'inscritos.foto_validado',
                                'inscritos.voucher_validado',
                                'inscritos.duplicado',
                                'inscritos.observacion',
                                'inscritos.credencial_validado',
                                'inscritos.fecha_anulado',
                                'inscritos.created_at',
                                'convocatoria.nombre as nombre_convocatoria',
                                'convocatoria.folder',
                                'inscritos.numero_recibo'
                            );

            if($buscar!=''){
                $inscritos = $inscritos->where(function($query)use($buscar){
                    $query->orWhere('e.codigo_estudiante','like','%'.$buscar.'%');
                    $query->orWhere('e.dni','like','%'.$buscar.'%');
                    $query->orWhere('e.nombres','like','%'.$buscar.'%');
                    $query->orWhere('e.apellido_paterno','like','%'.$buscar.'%');
                    $query->orWhere('e.apellido_materno','like','%'.$buscar.'%');
                });
            }
// \Log::info($filtros);
            if(array_key_exists('foto_validado',$filtros)){
                if($filtros['foto_validado']=='si'){
                    $inscritos = $inscritos->where('foto_validado','1');
                }
                if($filtros['foto_validado']=='no'){
                    $inscritos = $inscritos->where('foto_validado','0');
                }
            }
            if(array_key_exists('credencial_validado',$filtros)){
                if($filtros['credencial_validado']=='si'){
                    $inscritos = $inscritos->where('credencial_validado','validado');
                }
                if($filtros['credencial_validado']=='no'){
                    $inscritos = $inscritos->where('credencial_validado','no_validado');
                }
                if($filtros['credencial_validado']=='no_encontrado'){
                    $inscritos = $inscritos->where('credencial_validado','no_encontrado');
                }
            }
            if(array_key_exists('voucher_validado',$filtros)){
                if($filtros['voucher_validado']=='si'){
                    $inscritos = $inscritos->where('voucher_validado','1');
                }
                if($filtros['voucher_validado']=='no'){
                    $inscritos = $inscritos->where('voucher_validado','0');
                }
            }

            if($mode_anulado=='no_anulado'){
                $inscritos = $inscritos->whereNull('fecha_anulado');
            }
            if($mode_anulado=='anulado'){
                $inscritos = $inscritos->whereNotNull('fecha_anulado');
            }

        $inscritos = $inscritos->whereNull('convocatoria.activo')
                                ->orderBy($order_by,$mode_order);

        if($per_page < 0)
            $inscritos = $inscritos->get();
        else
            $inscritos = $inscritos->paginate($per_page);

        return $inscritos;
    }

    public static function listarInscritosHistorico($buscar='', $criterio='nombre', $per_page='5', $order_by='', $mode_order='', $mode_anulado='both', $convocatoria_id='todos'){
        /**
         * TODO: 
         * _FALTA HACER UN JOIN CON LA TABLA PRECIO VENTA QUE SE CREARA MAS ADELANTE
         * _Falta implementar el filtro de busqueda
         */
        $inscritos = Inscrito::join('convocatorias as convocatoria','inscritos.convocatoria_id','=','convocatoria.id')
                            ->join('estudiantes as e','inscritos.estudiante_id','=','e.id')
                            ->select(
                                'inscritos.id',
                                'e.escuela_profesional',
                                // 'e.numero_documento',
                                'e.dni',
                                'e.codigo_estudiante',
                                'e.apellido_paterno',
                                'e.apellido_materno',
                                'e.nombres',
                                'inscritos.apellido_paterno_validado',
                                'inscritos.apellido_materno_validado',
                                'inscritos.nombres_validado',
                                'e.sexo',
                                'inscritos.foto',
                                'inscritos.foto_validado',
                                'inscritos.duplicado',
                                'inscritos.observacion',
                                'inscritos.credencial_validado',
                                'inscritos.fecha_anulado',
                                'inscritos.created_at',
                                'convocatoria.nombre as nombre_convocatoria',
                                'convocatoria.folder',
                                'inscritos.numero_recibo'
                            );

            if($buscar!=''){
                $inscritos = $inscritos->where(function($query)use($buscar){
                    $query->orWhere('e.codigo_estudiante','like','%'.$buscar.'%');
                    $query->orWhere('e.dni','like','%'.$buscar.'%');
                    $query->orWhere('e.nombres','like','%'.$buscar.'%');
                    $query->orWhere('e.apellido_paterno','like','%'.$buscar.'%');
                    $query->orWhere('e.apellido_materno','like','%'.$buscar.'%');
                });
            }

            if($convocatoria_id != 'todos'){
                $inscritos = $inscritos->where('convocatoria_id',$convocatoria_id);
            }

            if($mode_anulado=='no_anulado'){
                $inscritos = $inscritos->whereNull('fecha_anulado');
            }
            if($mode_anulado=='anulado'){
                $inscritos = $inscritos->whereNotNull('fecha_anulado');
            }

        $inscritos = $inscritos/* ->where('convocatoria.nombre','202302') */
                                ->orderBy($order_by,$mode_order);

        if($per_page < 0)
            $inscritos = $inscritos->get();
        else
            $inscritos = $inscritos->paginate($per_page);

        return $inscritos;
    }

    public static function listarInscritosOficial($buscar='', $criterio='nombre', $per_page='5', $order_by='', $mode_order='', $tipo_tramite=''){
        /**
         * TODO: 
         * _FALTA HACER UN JOIN CON LA TABLA PRECIO VENTA QUE SE CREARA MAS ADELANTE
         * _Falta implementar el filtro de busqueda
         */
        $inscritos = Inscrito::join('convocatorias as convocatoria','inscritos.convocatoria_id','=','convocatoria.id')
                            ->join('estudiantes as e','inscritos.estudiante_id','=','e.id')
                            ->select(
                                'inscritos.id',
                                'e.escuela_profesional',
                                'e.dni as numero_documento',
                                'e.dni',
                                'e.codigo_estudiante',
                                'e.apellido_paterno',
                                'e.apellido_materno',
                                'e.nombres',
                                'inscritos.apellido_paterno_validado',
                                'inscritos.apellido_materno_validado',
                                'inscritos.nombres_validado',
                                'e.sexo',
                                'inscritos.foto',
                                'inscritos.foto_validado',
                                'inscritos.duplicado',
                                'inscritos.observacion',
                                'inscritos.credencial_validado',
                                'inscritos.fecha_anulado',
                                'inscritos.created_at',
                                'convocatoria.nombre as nombre_convocatoria',
                                'convocatoria.folder',
                                'inscritos.numero_recibo'
                            );

            if($buscar!=''){
                $inscritos = $inscritos->where(function($query)use($buscar){
                    $query->orWhere('e.codigo_estudiante','like','%'.$buscar.'%');
                    $query->orWhere('e.dni','like','%'.$buscar.'%');
                    $query->orWhere('e.nombres','like','%'.$buscar.'%');
                    $query->orWhere('e.apellido_paterno','like','%'.$buscar.'%');
                    $query->orWhere('e.apellido_materno','like','%'.$buscar.'%');
                });
            }
            \Log::info("Tipo Tramite: ".$tipo_tramite);
            if($tipo_tramite=='nuevo'){
                $inscritos = $inscritos->where('inscritos.duplicado','0');
            }
            if($tipo_tramite=='duplicado'){
                $inscritos = $inscritos->where('inscritos.duplicado','1');
            }

        $inscritos = $inscritos->whereNull('convocatoria.activo')
                                ->whereNull('fecha_anulado')
                                ->orderBy($order_by,$mode_order)
                                ->get();

        return $inscritos;
    }

    public static function listarMatriculadosNoInscritos($convocatoria_id='', $periodo_academico_id=''){
        
        $no_inscritos = Matricula::leftJoin(\DB::raw("(select * 
                                                        from inscritos 
                                                        where convocatoria_id = $convocatoria_id) as inscrito"),
                                'matriculas.estudiante_id','=','inscrito.estudiante_id')
                            ->join('estudiantes as e','matriculas.estudiante_id','=','e.id')
                            ->select(
                                'matriculas.id',
                                'e.escuela_profesional',
                                'e.dni',
                                'e.codigo_estudiante',
                                'e.apellido_paterno',
                                'e.apellido_materno',
                                'e.nombres',
                                'e.telefono1',
                                'e.telefono2'
                            );
            
            $no_inscritos = $no_inscritos->whereNull('inscrito.estudiante_id')
                                        ->where('matriculas.periodo_academico_id',$periodo_academico_id)
                                        ->where('tipo_tramite','nuevo')
                                        ->get();

        return $no_inscritos;
    }

    public static function validarCredencial($tipo, $numero_documento, $id){
        $documento = Documento::obtenerDocumento($tipo, $numero_documento);
        if (isset($documento->dni)){
            Inscrito::guardarDatos([
                'id' => $id,
                'apellido_paterno_validado' => $documento->apellidoPaterno,
                'apellido_materno_validado' => $documento->apellidoMaterno,
                'nombres_validado' => $documento->nombres,
                'credencial_validado' => 'validado',
            ]);
        }else{
            Inscrito::guardarDatos([
                'id' => $id,
                'credencial_validado' => 'no_encontrado',
            ]);
        }

        return $documento;
    }

    public static function obtenerUltimaInscripcion($codigo_estudiante){
        $inscrito = Inscrito::where('codigo_estudiante',$codigo_estudiante)
                                ->whereNull('fecha_anulado')
                                ->orderBy('id','desc')
                                ->first();

        return $inscrito;
    }

    public static function obtenerInscripcionVigente($estudiante_id){
        $inscrito = Inscrito::join('convocatorias as c','inscritos.convocatoria_id','=','c.id')
                            ->join('estudiantes as e','inscritos.estudiante_id','=','e.id')
                            ->select(
                                'inscritos.id',
                                'inscritos.numero_recibo',
                                \DB::raw("(CASE
                                            WHEN inscritos.duplicado=1 THEN 'Duplicado'
                                            WHEN inscritos.duplicado=0 THEN 'Nuevo'
                                        END) as tipo_tramite"),
                                'e.correo_personal',
                                'e.telefono1',
                                'e.telefono2',
                                'inscritos.foto',
                                'inscritos.foto_validado',
                                'c.folder'
                            )
                            ->where('inscritos.estudiante_id',$estudiante_id)
                            ->whereNull('inscritos.fecha_anulado')
                            ->whereNull('activo')
                            ->first();

        return $inscrito;
    }

    public static function obtenerUltimaInscripcionEstudiante($estudiante_id){
        $inscrito = Inscrito::join('convocatorias as c','inscritos.convocatoria_id','=','c.id')
                                ->select(
                                    'c.folder',
                                    'inscritos.foto'
                                )
                                ->where('inscritos.estudiante_id',$estudiante_id)
                                // ->whereNull('fecha_anulado')
                                ->orderBy('inscritos.id','desc')
                                ->first();

        return $inscrito;
    }

    public static function obtenerConvocatorias($estudiante_id){
        $inscrito = Inscrito::join('convocatorias as c','inscritos.convocatoria_id','=','c.id')
                            ->join('estudiantes as e','inscritos.estudiante_id','=','e.id')
                            ->select(
                                'inscritos.id',
                                'inscritos.numero_recibo',
                                'inscritos.foto',
                                'c.folder',
                                'c.nombre',
                                'inscritos.created_at as fecha_registro',
                                'inscritos.fecha_expiracion'
                            )
                            ->where('inscritos.estudiante_id',$estudiante_id)
                            ->orderBy('inscritos.created_at','desc')
                            ->get();

        return $inscrito;
    }

    public static function zipPhotos($folder_origin,$folder_zip, $estudiantes){
        $zip = new ZipArchive;
        $zip_name = Str::random().'.zip';
        
        $path_zip = $folder_zip.'/'.$zip_name;
        \Log::info($path_zip);
        $zip->open($path_zip,ZipArchive::CREATE);

        foreach ($estudiantes as $key => $value) {
            $zip->addFile($folder_origin.'/'.$value->foto,$value->foto);
        }

        // $zip->addFile(storage_path('app/public/convocatoria_202301/01_10015549.jpg'),'01_100155491.jpg');
        $zip->close();

        return $path_zip;
    }

    public static function getDpi($folder, $photo)
    {
        // Ruta de la imagen (puedes cambiarla por la ruta de tu imagen)
        $imagePath = public_path("\storage/".$folder."/1_validado/".$photo);
        \Log::info($imagePath);

        // Verificar que el archivo existe
        if (!file_exists($imagePath)) {
            return response()->json(['error' => 'File not found.'], 404);
        }

        // Leer los datos EXIF
        $exif = exif_read_data($imagePath);

        // Verificar si los datos EXIF están disponibles
        if ($exif === false) {
            return response()->json(['error' => 'No EXIF data found.'], 404);
        }

        // Obtener la resolución DPI
        $xDpi = isset($exif['XResolution']) ? static::parseDpi($exif['XResolution']) : 'N/A';
        $yDpi = isset($exif['YResolution']) ? static::parseDpi($exif['YResolution']) : 'N/A';

        // Devolver la resolución DPI
        // return response()->json([
        //     'xDpi' => $xDpi,
        //     'yDpi' => $yDpi
        // ]);
        return [
            'xDpi' => $xDpi,
            'yDpi' => $yDpi
        ];
    }

    // Función para parsear la resolución DPI
    private static function parseDpi($resolution)
    {
        if (strpos($resolution, '/') !== false) {
            list($numerator, $denominator) = explode('/', $resolution);
            return (int)($numerator / $denominator);
        }
        return (int)$resolution;
    }

    public static function getImageSize($folder, $photo){
        $imagePath = public_path("\storage/".$folder."/1_validado/".$photo);

        // Get the image dimensions
        list($width, $height) = getimagesize($imagePath);

        // Display the dimensions
        // echo "Width: " . $width . " pixels\n";
        // echo "Height: " . $height . " pixels\n";

        return [
            'width' => $width,
            'height' => $height
        ];
    }

    public static function getPhytonCommand(){
        $so = php_uname('s');
        $command = 'python3';

        if($so=='Windows NT') $command = 'py';
        if($so=='Linux') $command = 'python3';

        return $command;
    }

    public static function getDpiV2($folder, $subfolder, $photo){
        $python = static::getPhytonCommand();

        // Path to the Python script
        $script = public_path("script/getResolutionDpi.py");

        // Command to execute the Python script with parameters
        $command = escapeshellcmd("$python $script $folder $subfolder $photo");

        // Execute the command and capture the output
        $output = shell_exec($command);
        $output = rtrim($output, "\n");

        $response = json_decode($output,true);
        // Verificar que no haya errores en el JSON
        if (json_last_error() !== JSON_ERROR_NONE) {
            // Puedes lanzar un error o hacer un return especial aquí
            return ['error' => 'Error decoding JSON', 'output' => $output];
        }

        return $response;
        // $result = explode(",",$output);
        // return [
        //     'xDpi' => $result[0],
        //     'yDpi' => $result[1]
        // ];
    }

    public static function getFacePoints($folder, $photo){
        $python = static::getPhytonCommand();

        // Path to the Python script
        $script = public_path("script/getFacePoints.py");

        // Command to execute the Python script with parameters
        $command = escapeshellcmd("$python $script $folder $photo");

        // Execute the command and capture the output
        $output = shell_exec($command);
        $output = rtrim($output, "\n");
        $response = json_decode($output,true);
        return $response;
    }

    public static function changeImageDpi($folder, $photo){
        $python = static::getPhytonCommand();

        // Path to the Python script
        $script = public_path("script/changeImageDpi.py");

        // Command to execute the Python script with parameters
        $command = escapeshellcmd("$python $script $folder $photo");

        // Execute the command and capture the output
        $output = shell_exec($command);
        $output = rtrim($output, "\n");
        $response = json_decode($output,true);

        // Verificar que no haya errores en el JSON
        if (json_last_error() !== JSON_ERROR_NONE) {
            // Puedes lanzar un error o hacer un return especial aquí
            return ['error' => 'Error decoding JSON', 'output' => $output];
        }

        return $response;
    }

    public static function getTamanioImagen($folder, $photo){
        $python = static::getPhytonCommand();

        // Path to the Python script
        $script = public_path("script/getTamanioImagen.py");

        // Command to execute the Python script with parameters
        $command = escapeshellcmd("$python $script $folder $photo");

        // Execute the command and capture the output
        $output = shell_exec($command);
        $output = rtrim($output, "\n");
        $response = json_decode($output,true);

        // Verificar que no haya errores en el JSON
        if (json_last_error() !== JSON_ERROR_NONE) {
            // Puedes lanzar un error o hacer un return especial aquí
            return ['error' => 'Error decoding JSON', 'output' => $output];
        }

        return $response;
    }

    public static function compressImage($folder, $photo){
        $python = 'py';

        // Path to the Python script
        $script = public_path("\script\compressImage.py");

        // Command to execute the Python script with parameters
        $command = escapeshellcmd("$python $script $folder $photo");

        // Execute the command and capture the output
        $output = shell_exec($command);
        $output = rtrim($output, "\n");
        $response = json_decode($output,true);

        // Verificar que no haya errores en el JSON
        if (json_last_error() !== JSON_ERROR_NONE) {
            // Puedes lanzar un error o hacer un return especial aquí
            return ['error' => 'Error decoding JSON', 'output' => $output];
        }

        return $response;
    }

    public static function validarImagen($data_imagen, $folder){
        $folder_save = $folder.'/5_temps';
        $folder_script = $folder;
        $file_name = \App\Helpers\Archivo::guardarImagen($data_imagen, $folder_save);

        $parametros_foto = [];

        $tamanio = static::getTamanioImagen($folder_script,$file_name);\Log::info($tamanio);
        $parametros_foto['tamanio'] = $tamanio['peso'];
        $parametros_foto['dimension_alto'] = $tamanio['height'];
        $parametros_foto['dimension_ancho'] = $tamanio['width'];

        $face_points = static::getFacePoints($folder_script,$file_name);\Log::info($face_points);
        $parametros_foto['left_eye_x'] = isset($face_points['left_eye']['x'])?$face_points['left_eye']['x']:0;
        $parametros_foto['left_eye_y'] = isset($face_points['left_eye']['y'])?$face_points['left_eye']['y']:0;
        $parametros_foto['right_eye_x'] = isset($face_points['right_eye']['x'])?$face_points['right_eye']['x']:0;
        $parametros_foto['right_eye_y'] = isset($face_points['right_eye']['y'])?$face_points['right_eye']['y']:0;
        $parametros_foto['nose_tip_x'] = isset($face_points['nose_tip']['x'])?$face_points['nose_tip']['x']:0;
        $parametros_foto['nose_tip_y'] = isset($face_points['nose_tip']['y'])?$face_points['nose_tip']['y']:0;
        $parametros_foto['mouth_center_x'] = isset($face_points['mouth_center']['x'])?$face_points['mouth_center']['x']:0;
        $parametros_foto['mouth_center_y'] = isset($face_points['mouth_center']['y'])?$face_points['mouth_center']['y']:0;
        $parametros_foto['left_ear_x'] = isset($face_points['left_ear']['x'])?$face_points['left_ear']['x']:0;
        $parametros_foto['left_ear_y'] = isset($face_points['left_ear']['y'])?$face_points['left_ear']['y']:0;
        $parametros_foto['right_ear_x'] = isset($face_points['right_ear']['x'])?$face_points['right_ear']['x']:0;
        $parametros_foto['right_ear_y'] = isset($face_points['right_ear']['y'])?$face_points['right_ear']['y']:0;

        $resolution_dpis = static::getDpiV2($folder, '5_temps', $file_name);\Log::info($resolution_dpis);
        $parametros_foto['horizontal_dpi'] = $resolution_dpis['horizontal_dpi'];
        $parametros_foto['vertical_dpi'] = $resolution_dpis['vertical_dpi'];

        return static::compararValoresFoto($parametros_foto);
    }

    public static function compararValoresFoto($parametros_foto){
        $rango_parametros = static::getParametrosValidacion();
        $array_resultados = static::array_resultados();
        $validado = true;

        foreach ($rango_parametros as $key => $value) {
            if(array_key_exists($key, $parametros_foto)){
                if($parametros_foto[$key] >= $value['min'] &&
                    $parametros_foto[$key] <= $value['max']
                ){
                    $array_resultados[$key]['resultado'] = 'validado';
                }else{
                    $validado = false;
                }
                $array_resultados[$key]['valor'] = $parametros_foto[$key];
            }
        }

        return [
            'resultados' => $array_resultados,
            'validado' => $validado
        ];
    }

    public static function array_resultados(){
        return [
            'tamanio' => [
                'valor' => null,
                'resultado' => 'invalido'
            ],
            'dimension_alto' => [
                'valor' => null,
                'resultado' => 'invalido'
            ],
            'dimension_ancho' => [
                'valor' => null,
                'resultado' => 'invalido'
            ],
            'horizontal_dpi' => [
                'valor' => null,
                'resultado' => 'invalido'
            ],
            'vertical_dpi' => [
                'valor' => null,
                'resultado' => 'invalido'
            ],
            'left_eye_x' => [
                'valor' => null,
                'resultado' => 'invalido'
            ],
            'left_eye_y' => [
                'valor' => null,
                'resultado' => 'invalido'
            ],
            'right_eye_x' => [
                'valor' => null,
                'resultado' => 'invalido'
            ],
            'right_eye_y' => [
                'valor' => null,
                'resultado' => 'invalido'
            ],
            'mouth_center_x' => [
                'valor' => null,
                'resultado' => 'invalido'
            ],
            'mouth_center_y' => [
                'valor' => null,
                'resultado' => 'invalido'
            ],
        ];
    }
    
    public static function getParametrosValidacion(){
        return [
            'tamanio' => [
                'min' => '4',
                'max' => '50'
            ],
            'dimension_alto' => [
                'min' => '288',
                'max' => '288'
            ],
            'dimension_ancho' => [
                'min' => '240',
                'max' => '240'
            ],
            'horizontal_dpi' => [
                'min' => '300',
                'max' => '300'
            ],
            'vertical_dpi' => [
                'min' => '300',
                'max' => '300'
            ],
            'left_eye_x' => [
                'min' => '24',
                'max' => '120'
            ],
            'left_eye_y' => [
                'min' => '55',
                'max' => '180'
            ],
            'right_eye_x' => [
                'min' => '80',
                'max' => '185'
            ],
            'right_eye_y' => [
                'min' => '50',
                'max' => '180'
            ],
            'mouth_center_x' => [
                'min' => '50',
                'max' => '161'
            ],
            'mouth_center_y' => [
                'min' => '70',
                'max' => '252'
            ],
        ];
    }

    public static function cambiarDpi($data_imagen, $folder){
        $folder_save = $folder.'/5_temps';
        $folder_script = $folder;
        $file_name = \App\Helpers\Archivo::guardarImagen($data_imagen, $folder_save);

        $change_dpi = static::changeImageDpi($folder, $file_name);
        \Log::info($change_dpi);

        $image_path = public_path('storage/'.$folder."/5_temps/modificada_dpi_$file_name");
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
        // return static::compararValoresFoto($parametros_foto);
    }
}
