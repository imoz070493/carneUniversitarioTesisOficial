<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SunatToken extends Model
{
    protected $table = 'sunats_tokens';

    protected $primaryKey = 'id';

    protected $fillable = [
        'token',
        'expired_at',
        'activo'
    ];

    public static function guardarDatos($datos){
        $data = [];

        if (array_key_exists('token', $datos)) $data['token'] = $datos['token'];
        if (array_key_exists('expired_at', $datos)) $data['expired_at'] = $datos['expired_at'];
        if (array_key_exists('activo', $datos)) $data['activo'] = $datos['activo'];

        if(isset($datos['id'])){
            $sunat_token = SunatToken::findOrFail($datos['id']);
            $sunat_token->update($data);
        }else{
            $sunat_token = new SunatToken();
            $sunat_token->create($data);
        }

        return $sunat_token;
    }

    public static function actualizarToken(){
        SunatToken::whereNull('activo')
                    ->update(['activo'=>\Carbon\Carbon::now()]);
    }

    public static function obtenerTokenActual(){
        $token = SunatToken::whereNull('activo')->first();
        return $token;
    }
}
