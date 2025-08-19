<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table = 'matriculas';

    protected $primaryKey = 'id';

    protected $fillable = [
        'escuela_profesional',
    	'numero_documento',
    	'apellido_paterno',
    	'apellido_materno',
    	'nombres',
        'sexo',
        'convocatoria_id',
        
    	'codigo_estudiante',
        'estudiante_id',
        'periodo_academico_id',
        'tipo_tramite',
        'fecha_expiracion'
    ];

    public static function guardarDatos($datos){
        $data = [];

        if (array_key_exists('escuela_profesional', $datos)) $data['escuela_profesional'] = $datos['escuela_profesional'];
        if (array_key_exists('numero_documento', $datos)) $data['numero_documento'] = $datos['numero_documento'];
        if (array_key_exists('apellido_paterno', $datos)) $data['apellido_paterno'] = $datos['apellido_paterno'];
        if (array_key_exists('apellido_materno', $datos)) $data['apellido_materno'] = $datos['apellido_materno'];
        if (array_key_exists('nombres', $datos)) $data['nombres'] = $datos['nombres'];
        if (array_key_exists('sexo', $datos)) $data['sexo'] = $datos['sexo'];
        if (array_key_exists('convocatoria_id', $datos)) $data['convocatoria_id'] = $datos['convocatoria_id'];

        if (array_key_exists('codigo_estudiante', $datos)) $data['codigo_estudiante'] = $datos['codigo_estudiante'];
        if (array_key_exists('estudiante_id', $datos)) $data['estudiante_id'] = $datos['estudiante_id'];
        if (array_key_exists('periodo_academico_id', $datos)) $data['periodo_academico_id'] = $datos['periodo_academico_id'];

        if (array_key_exists('tipo_tramite', $datos)) $data['tipo_tramite'] = $datos['tipo_tramite'];
        if (array_key_exists('fecha_expiracion', $datos)) $data['fecha_expiracion'] = $datos['fecha_expiracion'];
        
        // if (isset($datos['id'])) {
        //     if(isset($datos['new_imagen'])){
        //         $fileName = \App\Helpers\Archivo::guardarImagen($datos['new_imagen']);
        //         $data['imagen'] = $fileName;
        //     }
        // }else{
        //     if(isset($datos['new_imagen'])){
        //         $fileName = \App\Helpers\Archivo::guardarImagen($datos['new_imagen']);
        //         $data['imagen'] = $fileName;
        //     }
        // }
        
        if(isset($datos['id'])){
            $matricula = Matricula::findOrFail($datos['id']);
            $matricula->update($data);
        }else{
            $matricula = new Matricula();
            $matricula = $matricula->create($data);
        }

        return $matricula;
    }

    public static function listarMatriculas($buscar='', $criterio='nombre', $per_page='5', $order_by='', $mode_order='', $periodo_academico_id=null){
        /**
         * TODO: 
         * _FALTA HACER UN JOIN CON LA TABLA PRECIO VENTA QUE SE CREARA MAS ADELANTE
         * _Falta implementar el filtro de busqueda
         */
        $matriculas = Matricula::join('periodos_academicos as pa','matriculas.periodo_academico_id','=','pa.id')
                            ->join('estudiantes as e','matriculas.estudiante_id','=','e.id')
                            ->select(
                                'matriculas.id',
                                'e.escuela_profesional',
                                'e.dni',
                                'e.codigo_estudiante',
                                'e.apellido_paterno',
                                'e.apellido_materno',
                                'e.nombres',
                                'e.sexo'
                            );

            if($buscar!=''){
                $matriculas = $matriculas->where(function($query)use($buscar){
                    $query->orWhere('e.codigo_estudiante','like','%'.$buscar.'%');
                    $query->orWhere('e.dni','like','%'.$buscar.'%');
                    $query->orWhere('e.nombres','like','%'.$buscar.'%');
                    $query->orWhere('e.apellido_paterno','like','%'.$buscar.'%');
                    $query->orWhere('e.apellido_materno','like','%'.$buscar.'%');
                });
            }

        $matriculas = $matriculas->where('matriculas.periodo_academico_id',$periodo_academico_id)
                                ->orderBy($order_by,$mode_order);

        if($per_page < 0)
            $matriculas = $matriculas->get();
        else
            $matriculas = $matriculas->paginate($per_page);

        return $matriculas;
    }

    public static function listarMatriculasGeneralSelect($buscar){

        $matriculas = Matricula::join('convocatorias as convocatoria','matriculas.convocatoria_id','=','convocatoria.id')
                                ->select(
                                    'matriculas.id',
                                    'matriculas.nombre as nombre_matricula',
                                    DB::raw("
                                        CONCAT(matriculas.nombre,' - ',coalesce(matriculas.codigo,'')) as data
                                    "),
                                    'matriculas.stock as stock_actual'
                                );

            if($buscar!=''){
                $matriculas = $matriculas->where(function ($query) use ($buscar){
                    $query->orWhere('matriculas.nombre','like','%'.$buscar.'%');
                    $query->orWhere('matriculas.codigo','like','%'.$buscar.'%');
                });
            }

        $matriculas = $matriculas->where('matriculas.estado','activo')
                                ->where('convocatoria.nombre','202302')
                                ->orderBy('matriculas.nombre','asc')
                                ->get();

        return $matriculas;
    }

    public static function obtenerMatricula($tp, $buscar){

        $matricula = Matricula::join('periodos_academicos as pa','matriculas.periodo_academico_id','=','pa.id')
                            ->join('estudiantes as e','matriculas.estudiante_id','=','e.id')
                            ->select(
                                'matriculas.id',
                                'e.escuela_profesional',
                                'e.dni',
                                'e.dni as numero_documento',
                                'e.codigo_estudiante',
                                'e.apellido_paterno',
                                'e.apellido_materno',
                                'e.nombres',
                                'e.sexo',
                                'e.id as estudiante_id',
                                'matriculas.tipo_tramite',
                                'matriculas.fecha_expiracion'
                            )
                            ->where('matriculas.codigo_estudiante',$buscar)
                            ->where('pa.estado','Activo')
                            ->first();

        return $matricula;
    }

    public static function obtenerMatriculaEstudiante($estudiante_id){

        $matricula = Matricula::join('periodos_academicos as pa','matriculas.periodo_academico_id','=','pa.id')
                            ->join('estudiantes as e','matriculas.estudiante_id','=','e.id')
                            ->select(
                                'matriculas.id',
                                // 'e.escuela_profesional',
                                // 'e.dni',
                                // 'e.dni as numero_documento',
                                // 'e.codigo_estudiante',
                                // 'e.apellido_paterno',
                                // 'e.apellido_materno',
                                // 'e.nombres',
                                // 'e.sexo',
                                // 'e.id as estudiante_id',
                                // 'e.correo_institucional',
                                'matriculas.tipo_tramite',
                                'matriculas.fecha_expiracion'
                            )
                            ->where('e.id',$estudiante_id)
                            ->where('pa.estado','Activo')
                            ->first();

        return $matricula;
    }

}
