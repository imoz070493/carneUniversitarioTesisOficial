<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleEnvio extends Model
{
    protected $table = 'detalles_enviados';

    protected $primaryKey = 'id';

    protected $fillable = [
        'codigo',
        'nombre_estudiante',
    	'estado',
        'documento_envio_id'
    ];

    public static function guardarDatos($datos){
        $data = [];\Log::info($datos);

        if (array_key_exists('codigo', $datos)) $data['codigo'] = $datos['codigo'];
        if (array_key_exists('nombre_estudiante', $datos)) $data['nombre_estudiante'] = $datos['nombre_estudiante'];
        if (array_key_exists('estado', $datos)) $data['estado'] = $datos['estado'];
        if (array_key_exists('documento_envio_id', $datos)) $data['documento_envio_id'] = $datos['documento_envio_id'];
        
        if(isset($datos['id'])){
            $detalle_enviado = DetalleEnvio::findOrFail($datos['id']);
            $detalle_enviado->update($data);
        }else{
            $detalle_enviado = new DetalleEnvio();
            $detalle_enviado = $detalle_enviado->create($data);
        }

        return $detalle_enviado;
    }

    public static function listarDetallesEnviadosGeneral($buscar='', $criterio='nombre', $per_page='5'){
        /**
         * TODO: 
         * _FALTA HACER UN JOIN CON LA TABLA PRECIO VENTA QUE SE CREARA MAS ADELANTE
         * _Falta implementar el filtro de busqueda
         */
        $detalles_enviados = DetalleEnvio::join('documentos_enviados as do_e','detalles_enviados.documento_envio_id','=','do_e.id')
                            ->select(
                                'detalles_enviados.id',
                                'detalles_enviados.codigo',
                                'detalles_enviados.nombre_estudiante',
                                'detalles_enviados.estado',
                                'detalles_enviados.documento_envio_id',
                                'do_e.carta',
                                'do_e.fecha_procesado',
                                'do_e.fecha_envio_facultad',
                                'do_e.fecha_recibido',
                                'do_e.estado',
                                'do_e.facultad'
                            );

            if($buscar!=''){
                $detalles_enviados = $detalles_enviados->where(function($query)use($buscar){
                    $query->orWhere('codigo','like','%'.$buscar.'%');
                    $query->orWhere('nombre_estudiante','like','%'.$buscar.'%');
                });
            }

            $detalles_enviados = $detalles_enviados->orderBy('detalles_enviados.created_at','desc');
            
        if($per_page < 0)
            $detalles_enviados = $detalles_enviados->get();
        else
            $detalles_enviados = $detalles_enviados->paginate($per_page);

        return $detalles_enviados;
    }

    public static function listarDetallesEnviados($buscar='', $criterio='nombre', $per_page='5', $documento_envio_id){
        /**
         * TODO: 
         * _FALTA HACER UN JOIN CON LA TABLA PRECIO VENTA QUE SE CREARA MAS ADELANTE
         * _Falta implementar el filtro de busqueda
         */
        $detalles_enviados = DetalleEnvio::select(
                                'detalles_enviados.id',
                                'detalles_enviados.codigo',
                                'detalles_enviados.nombre_estudiante',
                                'detalles_enviados.estado',
                                'detalles_enviados.documento_envio_id',
                                \DB::raw('(select escuela_profesional from estudiantes where codigo_estudiante = detalles_enviados.codigo) as escuela_profesional')
                            );

            if($buscar!=''){
                $detalles_enviados = $detalles_enviados->where(function($query)use($buscar){
                    $query->orWhere('carta','like','%'.$buscar.'%');
                });
            }

            $detalles_enviados = $detalles_enviados->where('documento_envio_id',$documento_envio_id);

        if($per_page < 0)
            $detalles_enviados = $detalles_enviados->get();
        else
            $detalles_enviados = $detalles_enviados->paginate($per_page);

        return $detalles_enviados;
    }
}
