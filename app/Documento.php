<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
use Peru\Jne\DniFactory;
use Peru\Sunat\RucFactory;

use function GuzzleHttp\json_decode;

class Documento extends Model
{
    public static function obtenerDocumento($tipo_documento, $numero_documento){
        if($tipo_documento=='dni'){
            $persona = PersonaDni::where('dni',$numero_documento)
                                ->first();
        }

        if($tipo_documento=='ruc'){
            $persona = Empresa::where('ruc',$numero_documento)
                                ->first();
        }

        $error = new \stdClass();
        $error->message = 'Not found';

        if($persona){
            return $persona;
        }else{
            if($tipo_documento=='dni'){

                $person = static::consultarDocumento($tipo_documento, $numero_documento);
                if(!$person->success){
                    echo 'Not found';
                    return;
                }
                \Log::info("Guardando ".$person->dni);
                \App\PersonaDni::guardarDatosObject($person);
            }
            
            if($tipo_documento == 'ruc'){
                // \Log::info("Estamos dentro del ruc");
                $person = static::consultarDocumento($tipo_documento, $numero_documento);
                if(!$person->success){
                    echo 'Not found';
                    return;
                }
            }
            // \Log::info($person);
            return $person;
        }
    }

    public static function obtenerConductorPorNombre($q){
        $conductor = Conductor::select(
                                    'id',
                                    'nombre',
                                    'num_documento'
                                )
                                ->where('nombre','like','%'.$q.'%')
                                ->get();

        return $conductor;
    }

    public static function consultarDocumento($tipo_documento, $numero_documento){
        $proveedor = new Client([
            // 'base_uri' => 'http://localhost:8001',
            'base_uri' => 'https://personasunat.ticnovateventas.com',
            // 'timeout' => 20.0
        ]);

        $token = static::obtenerTokenLocal('personasunat.ticnovateventas.com');

        if($tipo_documento == 'dni')
            $tipo_documento = '1';
        if($tipo_documento == 'ruc')
            $tipo_documento = '3';

        \Log::info($token);
        $response_document = $proveedor->request('post', '/api/document', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => "Bearer ".$token
            ],
            'form_params' => [
                'type' => $tipo_documento/* '3' */,
                'num_document' => $numero_documento/* '10729144385' */,
                'origen' => 'carne_universitario'/* 'carne_universitario' */,
            ]
        ]);
        
        $respuesta = $response_document->getBody()->getContents();

        return json_decode($respuesta);
    }

    public static function obtenerTokenLocal($app_name){
        $token_bd = AppToken::obtenerTokenActual($app_name);

        if($token_bd){
            // Existe token en BD
            $now = \Carbon\Carbon::now();
            $expired_at = \Carbon\Carbon::parse($token_bd->expired_at);
            if($now < $expired_at){
                // Token es valido se puede utilizar
                $token = $token_bd->token;

                return $token;
            }else{
                // El token ha expirado solicitar otro
                $token = static::obtenerTokenApp($app_name);
                $expired_at = \Carbon\Carbon::now()->addYear();
                AppToken::actualizarToken($app_name);
                AppToken::guardarDatos(
                    [
                        'app_name' => $app_name,
                        'token' => $token['access_token'],
                        'expired_at'=>$expired_at
                    ]
                );

                return $token['access_token'];
            }

        }else{
            // No existe token en BD
            $token = static::obtenerTokenApp($app_name);
            $expired_at = \Carbon\Carbon::now()->addYear();
            AppToken::actualizarToken($app_name);
            AppToken::guardarDatos(
                [
                    'app_name' => $app_name,
                    'token' => $token['access_token'],
                    'expired_at'=>$expired_at
                ]
            );
            return $token['access_token'];
        }
    }

    public static function obtenerTokenApp(){
        \Log::info("--------------------ObtenerTokenApp--------------------");

        $proveedor = new Client([
            'base_uri' => 'https://personasunat.ticnovateventas.com',
            // 'timeout' => 20.0
        ]);

        $response_login = $proveedor->request('post', '/api/login', [
            'form_params' => [
                'email' => 'test2@test.com',
                'password' => 'admin123456',
            ]
        ]);

        $token = json_decode($response_login->getBody()->getContents());
        $token = (array)$token;

        return $token;
    }
}
