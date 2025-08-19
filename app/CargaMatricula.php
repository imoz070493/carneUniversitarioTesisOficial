<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CargaMatricula extends Model
{
    protected $table = 'cargas_matriculas';

    protected $primaryKey = 'id';

    protected $fillable = [
        'document',
        'job_id',
        'periodo_academico_id',
        'errores',
        'estado',
    ];

    public static function guardarDatos($datos){
        $data = [];\Log::info($datos);

        if (array_key_exists('document', $datos)) $data['document'] = $datos['document'];
        if (array_key_exists('job_id', $datos)) $data['job_id'] = $datos['job_id'];
        if (array_key_exists('periodo_academico_id', $datos)) $data['periodo_academico_id'] = $datos['periodo_academico_id'];
        if (array_key_exists('errores', $datos)) $data['errores'] = $datos['errores'];
        if (array_key_exists('estado', $datos)) $data['estado'] = $datos['estado'];
        
        if(isset($datos['id'])){
            $carga_matricula = CargaMatricula::findOrFail($datos['id']);
            $carga_matricula->update($data);
        }else{
            $carga_matricula = new CargaMatricula();
            $carga_matricula = $carga_matricula->create($data);
        }

        return $carga_matricula;
    }

    public static function listarCargasMatriculas($buscar='', $criterio='nombre', $per_page='5'){
        /**
         * TODO: 
         * _FALTA HACER UN JOIN CON LA TABLA PRECIO VENTA QUE SE CREARA MAS ADELANTE
         * _Falta implementar el filtro de busqueda
         */
        $cargas_matriculas = DB::table('cargas_matriculas')
                            ->select(
                                'id',
                                'document',
                                'job_id',
                                \DB::raw("(select nombre from periodos_academicos where id = periodo_academico_id) as periodo_academico"),
                                'estado',
                                'created_at'
                            );

            if($buscar!=''){
                // $cargas_matriculas = $cargas_matriculas->where(function($query)use($buscar){
                //     $query->orWhere('codigo','like','%'.$buscar.'%');
                //     $query->orWhere('nombre_estudiante','like','%'.$buscar.'%');
                // });
            }

            $cargas_matriculas = $cargas_matriculas->orderBy('created_at','desc');
            
        if($per_page < 0)
            $cargas_matriculas = $cargas_matriculas->get();
        else
            $cargas_matriculas = $cargas_matriculas->paginate($per_page);

        return $cargas_matriculas;
    }
}
