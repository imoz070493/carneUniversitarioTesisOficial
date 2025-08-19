<?php

namespace App;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ConsultaCpe extends Model
{
    protected $table = 'consultas_cpes';

    protected $primaryKey = 'id';

    protected $fillable = [
        'numRuc',
        'codComp',
        'numeroSerie',
        'numero',
        'fechaEmision',
        'monto',
        'origen',
        'success',
        'message',
        'data'
    ];

    public static function guardarDatos($datos){
        $data = [];

        if (array_key_exists('numRuc', $datos)) $data['numRuc'] = $datos['numRuc'];
        if (array_key_exists('codComp', $datos)) $data['codComp'] = $datos['codComp'];
        if (array_key_exists('numeroSerie', $datos)) $data['numeroSerie'] = $datos['numeroSerie'];
        if (array_key_exists('numero', $datos)) $data['numero'] = $datos['numero'];
        if (array_key_exists('fechaEmision', $datos)) $data['fechaEmision'] = $datos['fechaEmision'];
        if (array_key_exists('monto', $datos)) $data['monto'] = $datos['monto'];
        if (array_key_exists('origen', $datos)) $data['origen'] = $datos['origen'];
        if (array_key_exists('success', $datos)) $data['success'] = $datos['success'];
        if (array_key_exists('message', $datos)) $data['message'] = $datos['message'];
        if (array_key_exists('data', $datos)) $data['data'] = $datos['data'];

        if(isset($datos['id'])){
            $consulta_cpe = ConsultaCpe::findOrFail($datos['id']);
            $consulta_cpe->update($data);
        }else{
            $consulta_cpe = new ConsultaCpe();
            $consulta_cpe = $consulta_cpe->create($data);
        }

        return $consulta_cpe;
    }

    public static function listarConsultasCpes($buscar='', $criterio='nombre', $per_page='5', $fecha_inicio='', $fecha_fin=''){
        $consultas_cpes = ConsultaCpe::select(
                                'id',
                                'numRuc',
                                'codComp',
                                'numeroSerie',
                                'numero',
                                'fechaEmision',
                                'monto',
                                'origen',
                                'success',
                                'message',
                                'data',
                                'created_at'
                            );

            if($buscar!=''){
                if($criterio=='todos'){
                    $consultas_cpes = $consultas_cpes->where(function($query)use($buscar){
                        $query->orWhere('numero','like','%'.$buscar.'%');
                    });
                }else{
                    $consultas_cpes = $consultas_cpes->where($criterio,'like','%'.$buscar.'%');
                }
            }

        $consultas_cpes = $consultas_cpes->where(DB::raw("CONVERT(created_at, date)"),'>=',$fecha_inicio)
                                ->where(DB::raw("CONVERT(created_at, date)"),'<=',$fecha_fin)
                                ->orderBy('created_at','desc')
                                ->paginate($per_page);

        return $consultas_cpes;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
