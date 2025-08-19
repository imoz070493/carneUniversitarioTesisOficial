<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Estudiante extends Model
{
    protected $table = 'estudiantes';

    protected $primaryKey = 'id';

    protected $fillable = [
        'facultad',
        'escuela_profesional',
        'dni',
        'codigo_estudiante',
        'apellido_paterno',
        'apellido_materno',
        'nombres',
        'sexo',
        'perido_primera_matricula',
        'observacion',
        'correo_institucional',
        'correo_personal',
        'telefono1',
        'telefono2',
    ];

    public static function guardarDatos($datos){
        $data = [];

        if (array_key_exists('facultad', $datos)) $data['facultad'] = $datos['facultad'];
        if (array_key_exists('escuela_profesional', $datos)) $data['escuela_profesional'] = $datos['escuela_profesional'];
        if (array_key_exists('dni', $datos)) $data['dni'] = $datos['dni'];
        if (array_key_exists('codigo_estudiante', $datos)) $data['codigo_estudiante'] = $datos['codigo_estudiante'];
        if (array_key_exists('apellido_paterno', $datos)) $data['apellido_paterno'] = $datos['apellido_paterno'];
        if (array_key_exists('apellido_materno', $datos)) $data['apellido_materno'] = $datos['apellido_materno'];
        if (array_key_exists('nombres', $datos)) $data['nombres'] = $datos['nombres'];
        if (array_key_exists('sexo', $datos)) $data['sexo'] = $datos['sexo'];
        if (array_key_exists('periodo_primera_matricula', $datos)) $data['periodo_primera_matricula'] = $datos['periodo_primera_matricula'];
        if (array_key_exists('observacion', $datos)) $data['observacion'] = $datos['observacion'];
        if (array_key_exists('correo_institucional', $datos)) $data['correo_institucional'] = $datos['correo_institucional'];
        if (array_key_exists('correo_personal', $datos)) $data['correo_personal'] = $datos['correo_personal'];
        if (array_key_exists('telefono1', $datos)) $data['telefono1'] = $datos['telefono1'];
        if (array_key_exists('telefono2', $datos)) $data['telefono2'] = $datos['telefono1'];

        if(isset($datos['id'])){
            $estudiante = Estudiante::findOrFail($datos['id']);
            $estudiante->update($data);
        }else{
            $estudiante = new Estudiante();
            $estudiante = $estudiante->create($data);
        }

        return $estudiante;
    }

    public static function listarPersonasDnis($buscar='', $criterio='nombre', $per_page='5'){
        $personas_dnis = PersonaDni::select(
                                'id',
                                'dni',
                                'nombres',
                                'apellidoPaterno',
                                'apellidoMaterno',
                                'codVerifica',
                                'origen',
                                'created_at'
                            );

            if($buscar!=''){
                if($criterio=='todos'){
                    $personas_dnis = $personas_dnis->where(function($query)use($buscar){
                        $query->orWhere('dni','like','%'.$buscar.'%');
                        $query->orWhere('nombres','like','%'.$buscar.'%');
                        $query->orWhere('apellidoPaterno','like','%'.$buscar.'%');
                        $query->orWhere('apellidoMaterno','like','%'.$buscar.'%');
                    });
                }else{
                    $personas_dnis = $personas_dnis->where($criterio,'like','%'.$buscar.'%');
                }
            }

        $personas_dnis = $personas_dnis->orderBy('created_at','desc')
                                ->paginate($per_page);

        return $personas_dnis;
    }

    public static function listarEstudiantesSelect($buscar){

        $estudiantes = DB::table('vista_estudiantes')
                                ->select(
                                    'id',
                                    'apellido_paterno',
                                    'apellido_materno',
                                    'nombres',
                                    'codigo_estudiante',
                                    DB::raw("
                                        CONCAT(codigo_estudiante,'-',
                                                apellido_paterno,' ',
                                                apellido_materno,' ',
                                                nombres) as data
                                    ")
                                );

            if($buscar!=''){
                $estudiantes = $estudiantes->where(function ($query) use ($buscar){
                    $query->orWhere('apellido_paterno','like','%'.$buscar.'%');
                    $query->orWhere('apellido_materno','like','%'.$buscar.'%');
                    $query->orWhere('nombres','like','%'.$buscar.'%');
                    $query->orWhere('codigo_estudiante','like','%'.$buscar.'%');
                    $query->orWhere('full_name','like','%'.$buscar.'%');
                });
            }

        $estudiantes = $estudiantes->orderBy('apellido_paterno','asc')
                                ->orderBy('apellido_materno','asc')
                                ->orderBy('nombres','asc')
                                ->get();

        return $estudiantes;
    }
}
