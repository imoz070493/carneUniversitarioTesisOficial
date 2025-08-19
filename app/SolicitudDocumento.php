<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SolicitudDocumento extends Model
{
    protected $table = 'solicitudes_documentos';

    protected $primaryKey = 'id';

    protected $fillable = [
        'tipo',
        'num_correlativo',
    	'anio',
        'fecha_primera_matricula',
        'sede',
        'ciclo',
        'periodo',
        'estudiante_id'
    ];

    public static function guardarDatos($datos){
        $data = [];\Log::info($datos);

        if (array_key_exists('tipo', $datos)) $data['tipo'] = $datos['tipo'];
        if (array_key_exists('num_correlativo', $datos)) $data['num_correlativo'] = $datos['num_correlativo'];
        if (array_key_exists('anio', $datos)) $data['anio'] = $datos['anio'];
        if (array_key_exists('fecha_primera_matricula', $datos)) $data['fecha_primera_matricula'] = $datos['fecha_primera_matricula'];
        if (array_key_exists('sede', $datos)) $data['sede'] = $datos['sede'];
        if (array_key_exists('ciclo', $datos)) $data['ciclo'] = $datos['ciclo'];
        if (array_key_exists('periodo', $datos)) $data['periodo'] = $datos['periodo'];
        if (array_key_exists('estudiante_id', $datos)) $data['estudiante_id'] = $datos['estudiante_id'];
        
        if(isset($datos['id'])){
            $solicitud_documento = SolicitudDocumento::findOrFail($datos['id']);
            $solicitud_documento->update($data);
        }else{
            $solicitud_documento = new SolicitudDocumento();
            $solicitud_documento = $solicitud_documento->create($data);
        }

        return $solicitud_documento;
    }

    public static function listarSolicitudesDocumentos($buscar='', $criterio='nombre', $per_page='5', $estudiante_id=null){
        /**
         * TODO: 
         * _FALTA HACER UN JOIN CON LA TABLA PRECIO VENTA QUE SE CREARA MAS ADELANTE
         * _Falta implementar el filtro de busqueda
         */
        $solicitudes_documentos = DB::table('solicitudes_documentos as sc')
                                            ->join('estudiantes as e','sc.estudiante_id','=','e.id')
                                            ->select(
                                                'sc.id',
                                                'sc.tipo',
                                                'sc.num_correlativo',
                                                'sc.anio',
                                                'e.codigo_estudiante',
                                                'e.apellido_paterno',
                                                'e.apellido_materno',
                                                'e.nombres',
                                                'sc.created_at as fecha_procesado'
                                            );

            if($buscar!=''){
                $solicitudes_documentos = $solicitudes_documentos->where(function($query)use($buscar){
                    $query->orWhere('e.apellido_paterno','like','%'.$buscar.'%');
                    $query->orWhere('e.apellido_materno','like','%'.$buscar.'%');
                    $query->orWhere('e.nombres','like','%'.$buscar.'%');
                    $query->orWhere('e.codigo_estudiante','like','%'.$buscar.'%');
                });
            }

            if($estudiante_id){
                $solicitudes_documentos = $solicitudes_documentos->where('sc.estudiante_id',$estudiante_id);
            }

            $solicitudes_documentos = $solicitudes_documentos->orderBy('sc.created_at','desc');

        if($per_page < 0)
            $solicitudes_documentos = $solicitudes_documentos->get();
        else
            $solicitudes_documentos = $solicitudes_documentos->paginate($per_page);

        return $solicitudes_documentos;
    }
}
