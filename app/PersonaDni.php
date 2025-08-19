<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonaDni extends Model
{
    protected $table = 'personas_dnis';

    protected $primaryKey = 'id';

    protected $fillable = [
        'dni',
        'nombres',
        'apellidoPaterno',
        'apellidoMaterno',
        'codVerifica',
        'origen'
    ];

    public static function guardarDatos($datos){
        $data = [];

        if (array_key_exists('dni', $datos)) $data['dni'] = $datos['dni'];
        if (array_key_exists('nombres', $datos)) $data['nombres'] = $datos['nombres'];
        if (array_key_exists('apellidoPaterno', $datos)) $data['apellidoPaterno'] = $datos['apellidoPaterno'];
        if (array_key_exists('apellidoMaterno', $datos)) $data['apellidoMaterno'] = $datos['apellidoMaterno'];
        if (array_key_exists('codVerifica', $datos)) $data['codVerifica'] = $datos['codVerifica'];
        if (array_key_exists('origen', $datos)) $data['origen'] = $datos['origen'];

        if(isset($datos['id'])){
            $persona_dni = PersonaDni::findOrFail($datos['id']);
            $persona_dni->update($data);
        }else{
            $persona_dni = new PersonaDni();
            $persona_dni = $persona_dni->create($data);
        }

        return $persona_dni;
    }

    public static function guardarDatosObject($datos){
        $data = [];

        if (property_exists($datos, 'dni')) $data['dni'] = $datos->dni;
        if (property_exists($datos, 'nombres')) $data['nombres'] = $datos->nombres;
        if (property_exists($datos, 'apellidoPaterno')) $data['apellidoPaterno'] = $datos->apellidoPaterno;
        if (property_exists($datos, 'apellidoMaterno')) $data['apellidoMaterno'] = $datos->apellidoMaterno;
        if (property_exists($datos, 'codVerifica')) $data['codVerifica'] = $datos->codVerifica;
        

        if(isset($datos->id)){
            $persona_dni = PersonaDni::findOrFail($datos['id']);
            $persona_dni->update($data);
        }else{
            $persona_dni = new PersonaDni();
            $data['origen'] = 'solo_consulta';
            $persona_dni = $persona_dni->create($data);
        }

        return $persona_dni;
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

    public static function obtenerPersonaDni($dni){
        $persona = PersonaDni::select(
                                    'dni',
                                    'nombres',
                                    'apellidoPaterno',
                                    'apellidoMaterno',
                                    'codVerifica'
                                )
                                ->where('dni',$dni)->first();

        return $persona;
    }
}
