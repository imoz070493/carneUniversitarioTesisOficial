<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convocatoria extends Model
{
    protected $table = 'convocatorias';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'descripcion',
    	'fecha_inicio',
    	'fecha_fin',
    	'activo',
        'folder'
    ];

    public static function guardarDatos($datos){
        $data = [];\Log::info($datos);

        if (array_key_exists('nombre', $datos)) $data['nombre'] = $datos['nombre'];
        if (array_key_exists('descripcion', $datos)) $data['descripcion'] = $datos['descripcion'];
        if (array_key_exists('fecha_inicio', $datos)){
            if($datos['fecha_inicio'])
                $data['fecha_inicio'] = \Carbon\Carbon::parse($datos['fecha_inicio']);
        }
        if (array_key_exists('fecha_fin', $datos)){
            if($datos['fecha_fin'])
                $data['fecha_fin'] = \Carbon\Carbon::parse($datos['fecha_fin']);
        }
        if (array_key_exists('activo', $datos)) $data['activo'] = $datos['activo'];
        
        if(isset($datos['id'])){
            $convocatoria = Convocatoria::findOrFail($datos['id']);
            $convocatoria->update($data);
        }else{
            $folder = 'convocatoria_'.$datos['nombre'];
            \App\Helpers\Archivo::makeFolder($folder);

            $data['folder'] = $folder;
            $convocatoria = new Convocatoria();
            $convocatoria = $convocatoria->create($data);
        }

        return $convocatoria;
    }

    public static function listarConvocatorias($buscar='', $criterio='nombre', $per_page='5'){
        /**
         * TODO: 
         * _FALTA HACER UN JOIN CON LA TABLA PRECIO VENTA QUE SE CREARA MAS ADELANTE
         * _Falta implementar el filtro de busqueda
         */
        $convocatorias = Convocatoria::select(
                                'id',
                                'nombre',
                                'descripcion',
                                'fecha_inicio',
                                'fecha_fin',
                                'activo',
                                'created_at',
                                'folder'
                            );

            if($buscar!=''){
                $convocatorias = $convocatorias->where(function($query)use($buscar){
                    $query->orWhere('nombre','like','%'.$buscar.'%');
                });
            }

            $convocatorias = $convocatorias->orderBy('created_at','desc');

            if($per_page < 0)
                $convocatorias = $convocatorias->get();
            else
                $convocatorias = $convocatorias->paginate($per_page);

        return $convocatorias;
    }

    public static function listarConvocatoriasSelect(){

        $convocatorias = Convocatoria::select(
                                    'id',
                                    'nombre',
                                    'activo'
                                );

            // if($buscar!=''){
            //     $convocatorias = $convocatorias->where($criterio,'like','%'.$buscar.'%');
            // }

        $convocatorias = $convocatorias->orderBy('id','desc')
                                ->get();

        return $convocatorias;
    }
}
