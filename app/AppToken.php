<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppToken extends Model
{
    protected $table = 'apps_tokens';

    protected $primaryKey = 'id';

    protected $fillable = [
        'app_name',
        'token',
        'expired_at',
        'activo'
    ];

    public static function guardarDatos($datos){
        $data = [];

        if (array_key_exists('app_name', $datos)) $data['app_name'] = $datos['app_name'];
        if (array_key_exists('token', $datos)) $data['token'] = $datos['token'];
        if (array_key_exists('expired_at', $datos)) $data['expired_at'] = $datos['expired_at'];
        if (array_key_exists('activo', $datos)) $data['activo'] = $datos['activo'];

        if(isset($datos['id'])){
            $sunat_token = AppToken::findOrFail($datos['id']);
            $sunat_token->update($data);
        }else{
            $sunat_token = new AppToken();
            $sunat_token->create($data);
        }

        return $sunat_token;
    }

    public static function actualizarToken($app_name){
        AppToken::where('app_name',$app_name)
                    ->whereNull('activo')
                    ->update(['activo'=>\Carbon\Carbon::now()]);
    }

    public static function obtenerTokenActual($app_name){
        $token = AppToken::where('app_name',$app_name)
                            ->whereNull('activo')
                            ->first();
        return $token;
    }
}
