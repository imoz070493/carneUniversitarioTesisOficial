<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentoEnvio extends Model
{
    protected $table = 'documentos_enviados';

    protected $primaryKey = 'id';

    protected $fillable = [
        'carta',
        'facultad',
        'fecha_procesado',
        'fecha_envio_facultad',
        'fecha_recibido',
    	'estado'
    ];

    public static function guardarDatos($datos){
        $data = [];\Log::info($datos);

        if (array_key_exists('carta', $datos)) $data['carta'] = $datos['carta'];
        if (array_key_exists('facultad', $datos)) $data['facultad'] = $datos['facultad'];
        if (array_key_exists('fecha_procesado', $datos)) $data['fecha_procesado'] = \Carbon\Carbon::now();
        if (array_key_exists('fecha_envio_facultad', $datos)) $data['fecha_envio_facultad'] = $datos['fecha_envio_facultad'];
        if (array_key_exists('fecha_recibido', $datos)) $data['fecha_recibido'] = $datos['fecha_recibido'];
        if (array_key_exists('estado', $datos)) $data['estado'] = $datos['estado'];
        
        if(isset($datos['id'])){
            $documento_enviado = DocumentoEnvio::findOrFail($datos['id']);
            $documento_enviado->update($data);
        }else{
            $documento_enviado = new DocumentoEnvio();
            $documento_enviado = $documento_enviado->create($data);
        }

        return $documento_enviado;
    }

    public static function listarDocumentosEnviados($buscar='', $criterio='nombre', $per_page='5'){
        /**
         * TODO: 
         * _FALTA HACER UN JOIN CON LA TABLA PRECIO VENTA QUE SE CREARA MAS ADELANTE
         * _Falta implementar el filtro de busqueda
         */
        $documentos_enviados = DocumentoEnvio::select(
                                'id',
                                'carta',
                                'facultad',
                                'fecha_procesado',
                                'fecha_envio_facultad',
                                'fecha_recibido',
                                'estado'
                            );

            if($buscar!=''){
                $documentos_enviados = $documentos_enviados->where(function($query)use($buscar){
                    $query->orWhere('carta','like','%'.$buscar.'%');
                });
            }

            $documentos_enviados = $documentos_enviados->orderBy('created_at','desc');

        if($per_page < 0)
            $documentos_enviados = $documentos_enviados->get();
        else
            $documentos_enviados = $documentos_enviados->paginate($per_page);

        return $documentos_enviados;
    }
}
