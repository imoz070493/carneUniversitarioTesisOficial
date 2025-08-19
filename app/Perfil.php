<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'configs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'ruc',
        'razon_social',
        'nombre_comercial',
        'direccion',
        'departamento',
        'provincia',
        'distrito',
        'codpais',
        'ubigeo',
        'telefono',
        'correo',
        'usuario',
        'clave',
        'firma',
        'tipo',
        'imagen',
        'estado',
        'restringir_stock'
    ];

    public static function guardarDatos($datos){

        $data = [];

        if (array_key_exists('ruc', $datos)) $data['ruc'] = $datos['ruc'];
        if (array_key_exists('razon_social', $datos)) $data['razon_social'] = $datos['razon_social'];
        if (array_key_exists('nombre_comercial', $datos)) $data['nombre_comercial'] = $datos['nombre_comercial'];
        if (array_key_exists('direccion', $datos)) $data['direccion'] = $datos['direccion'];
        if (array_key_exists('departamento', $datos)) $data['departamento'] = $datos['departamento'];
        if (array_key_exists('provincia', $datos)) $data['provincia'] = $datos['provincia'];
        if (array_key_exists('distrito', $datos)) $data['distrito'] = $datos['distrito'];
        if (array_key_exists('codpais', $datos)) $data['codpais'] = $datos['codpais'];
        if (array_key_exists('ubigeo', $datos)) $data['ubigeo'] = $datos['ubigeo'];
        if (array_key_exists('telefono', $datos)) $data['telefono'] = $datos['telefono'];
        if (array_key_exists('correo', $datos)) $data['correo'] = $datos['correo'];
        if (array_key_exists('usuario', $datos)) $data['usuario'] = $datos['usuario'];
        if (array_key_exists('clave', $datos)) $data['clave'] = $datos['clave'];
        if (array_key_exists('firma', $datos)) $data['firma'] = $datos['firma'];
        if (array_key_exists('tipo', $datos)) $data['tipo'] = $datos['tipo'];
        if (array_key_exists('imagen', $datos)) $data['imagen'] = $datos['imagen'];
        if (array_key_exists('estado', $datos)) $data['estado'] = $datos['estado'];
        if (array_key_exists('restringir_stock', $datos)) $data['restringir_stock'] = $datos['restringir_stock'];
        
        if(isset($datos['id'])){
            $perfil = Perfil::findOrFail($datos['id']);
            $perfil->update($data);
        }else{
            $perfil = new Perfil();
            $perfil->create($data);
        }

        return $perfil;
    }

    public static function listarPerfiles($buscar='', $criterio='nombre', $per_page='5'){

        $perfiles = Perfil::select(
                                    'id',
                                    'ruc',
                                    'razon_social',
                                    'nombre_comercial',
                                    'direccion',
                                    'departamento',
                                    'provincia',
                                    'distrito',
                                    'codpais',
                                    'ubigeo',
                                    'telefono',
                                    'correo',
                                    'usuario',
                                    'clave',
                                    'firma',
                                    'tipo',
                                    'imagen',
                                    'estado',
                                    'restringir_stock'
                                );

            if($buscar!=''){
                $perfiles = $perfiles->where($criterio,'like','%'.$buscar.'%');
            }

        $perfiles = $perfiles->orderBy('id','desc')
                                ->get();
                                // ->paginate($per_page);

        return $perfiles;
    }

    public static function obtenerPerfil(){
        $perfil = Perfil::first();

        return $perfil;
    }

    public static function activarPerfil(){
        Perfil::where('estado','inactivo')
                ->update(['estado'=>'activo']);
    }

    public static function desactivarPerfil(){
        Perfil::where('estado','activo')
                ->update(['estado'=>'inactivo']);
    }
}
