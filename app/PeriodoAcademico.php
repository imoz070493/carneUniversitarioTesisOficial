<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeriodoAcademico extends Model
{
    protected $table = 'periodos_academicos';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'descripcion',
    	'fecha_inicio',
    	'fecha_fin',
    	'estado',
        'romano'
    ];

    public static function guardarDatos($datos){
        $data = [];\Log::info($datos);

        if (array_key_exists('nombre', $datos)) $data['nombre'] = $datos['nombre'];
        if (array_key_exists('descripcion', $datos)) $data['descripcion'] = $datos['descripcion'];
        if (array_key_exists('fecha_inicio', $datos)) $data['fecha_inicio'] = $datos['fecha_inicio'];
        if (array_key_exists('fecha_fin', $datos)) $data['fecha_fin'] = $datos['fecha_fin'];
        if (array_key_exists('estado', $datos)) $data['estado'] = $datos['estado'];
        if (array_key_exists('romano', $datos)) $data['romano'] = $datos['romano'];
        
        if(isset($datos['id'])){
            $periodo_academico = PeriodoAcademico::findOrFail($datos['id']);
            $periodo_academico->update($data);
        }else{
            $periodo_academico = new PeriodoAcademico();
            $periodo_academico = $periodo_academico->create($data);
        }

        return $periodo_academico;
    }

    public static function listarPeriodosAcademicos($buscar='', $criterio='nombre', $per_page='5'){
        /**
         * TODO: 
         * _FALTA HACER UN JOIN CON LA TABLA PRECIO VENTA QUE SE CREARA MAS ADELANTE
         * _Falta implementar el filtro de busqueda
         */
        $periodos_academicos = PeriodoAcademico::select(
                                'id',
                                'nombre',
                                'descripcion',
                                'fecha_inicio',
                                'fecha_fin',
                                'estado',
                                'created_at'
                            );

            if($buscar!=''){
                $periodos_academicos = $periodos_academicos->where(function($query)use($buscar){
                    $query->orWhere('nombre','like','%'.$buscar.'%');
                });
            }

            $periodos_academicos = $periodos_academicos->orderBy('id','desc');

            if($per_page < 0)
                $periodos_academicos = $periodos_academicos->get();
            else
                $periodos_academicos = $periodos_academicos->paginate($per_page);

        return $periodos_academicos;
    }

    public static function listarPeriodosAcademicosSelect(){

        $periodos_academicos = PeriodoAcademico::select(
                                    'id',
                                    'nombre',
                                    'romano'
                                );

            // if($buscar!=''){
            //     $periodos_academicos = $periodos_academicos->where($criterio,'like','%'.$buscar.'%');
            // }

        $periodos_academicos = $periodos_academicos->where('estado','activo')
                                ->orderBy('id','desc')
                                ->get();

        return $periodos_academicos;
    }

    public static function listarPeriodosAcademicosGeneralSelect(){

        $periodos_academicos = PeriodoAcademico::select(
                                    'id',
                                    'nombre',
                                    'romano',
                                    'estado'
                                );

            // if($buscar!=''){
            //     $periodos_academicos = $periodos_academicos->where($criterio,'like','%'.$buscar.'%');
            // }

        $periodos_academicos = $periodos_academicos->orderBy('id','desc')
                                ->get();

        return $periodos_academicos;
    }
}
