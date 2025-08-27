<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acceso extends Model
{
    protected $table = 'accesos';

    protected $primaryKey = 'id';

    protected $fillable = [
        'usuario_id',
    ];

    public static function guardarDatos($datos){
        $data = [];

        if (array_key_exists('usuario_id', $datos)) $data['usuario_id'] = $datos['usuario_id'];
        
        if(isset($datos['id'])){
            $acceso = Acceso::findOrFail($datos['id']);
            $acceso->update($data);
        }else{
            $acceso = new Acceso();
            $acceso = $acceso->create($data);
        }

        return $acceso;
    }

    public static function listarAccesos($buscar='', $criterio='nombre', $per_page='5'){
        $accesos = \DB::table('accesos as a')
                            ->join('users as u','a.usuario_id','=','u.id')
                            ->leftJoin('estudiantes as e','u.estudiante_id','=','e.id')
                            ->select(
                                'a.id',
                                \DB::raw("coalesce(concat(e.apellido_paterno,' ',
                                            e.apellido_materno,' ',
                                            e.nombres,' '),
                                            'Admin') as nombre_completo"),
                                'e.escuela_profesional', 
                                'a.usuario_id',
                                'a.created_at'
                            );

            if($buscar!=''){
                if($criterio=='todos'){
                    $accesos = $accesos->where(function($query)use($buscar){
                        $query->orWhere('ruc','like','%'.$buscar.'%');
                        $query->orWhere('razonSocial','like','%'.$buscar.'%');
                        $query->orWhere('nombreComercial','like','%'.$buscar.'%');
                    });
                }else{
                    $accesos = $accesos->where($criterio,'like','%'.$buscar.'%');
                }
            }

        $accesos = $accesos->orderBy('created_at','desc')
                                ->paginate($per_page);

        return $accesos;
    }
}
