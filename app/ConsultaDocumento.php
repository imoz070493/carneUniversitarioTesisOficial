<?php

namespace App;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ConsultaDocumento extends Model
{
    protected $table = 'consultas_documentos';

    protected $primaryKey = 'id';

    protected $fillable = [
        'type',
        'num_document',
        'origen',
        'estado'
    ];

    public static function guardarDatos($datos){
        $data = [];

        if (array_key_exists('type', $datos)) $data['type'] = $datos['type'];
        if (array_key_exists('num_document', $datos)) $data['num_document'] = $datos['num_document'];
        if (array_key_exists('origen', $datos)) $data['origen'] = $datos['origen'];
        if (array_key_exists('estado', $datos)) $data['estado'] = $datos['estado'];

        if(isset($datos['id'])){
            $consulta_documento = ConsultaDocumento::findOrFail($datos['id']);
            $consulta_documento->update($data);
        }else{
            $consulta_documento = new ConsultaDocumento();
            $consulta_documento = $consulta_documento->create($data);
        }

        return $consulta_documento;
    }

    public static function listarConsultasDocumentos($buscar='', $criterio='nombre', $per_page='5', $fecha_inicio='', $fecha_fin=''){
        $consultas_documentos = ConsultaDocumento::select(
                                'id',
                                'type',
                                'num_document',
                                'origen',
                                'estado',
                                'created_at'
                            );

            if($buscar!=''){
                if($criterio=='todos'){
                    $consultas_documentos = $consultas_documentos->where(function($query)use($buscar){
                        $query->orWhere('num_document','like','%'.$buscar.'%');
                    });
                }else{
                    $consultas_documentos = $consultas_documentos->where($criterio,'like','%'.$buscar.'%');
                }
            }

        $consultas_documentos = $consultas_documentos->where(DB::raw("CONVERT(created_at, date)"),'>=',$fecha_inicio)
                                ->where(DB::raw("CONVERT(created_at, date)"),'<=',$fecha_fin)
                                ->orderBy('created_at','desc')
                                ->paginate($per_page);

        return $consultas_documentos;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
