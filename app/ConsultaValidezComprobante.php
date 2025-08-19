<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class ConsultaValidezComprobante extends Model
{
    public static function consultaComprobante($datos){
        $proveedor = new Client([
            'base_uri' => 'https://api.sunat.gob.pe',
            // 'timeout' => 20.0
        ]);

        $token = static::obtenerTokenLocal();

        // $data = '{"numRuc" : "20564091571","codComp" : "01","numeroSerie" : "F001","numero" : "380","fechaEmision" : "12/01/2022","monto" : "80"}';
        $data = '{"numRuc" : "'.$datos['numRuc'].'","codComp" : "'.$datos['codComp'].'","numeroSerie" : "'.$datos['numeroSerie'].'","numero" : "'.$datos['numero'].'","fechaEmision" : "'.$datos['fechaEmision'].'","monto" : "'.$datos['monto'].'"}';
        $token = 'Bearer '.$token;
        \Log::info($data);
        
        $result = static::sunatValidInvoice($proveedor, $token, $data);

        \Log::info($result);

        return $result;
    }

    public static function sunatValidInvoice($proveedor, $token, $data){
        try {
            $response_document = $proveedor->request('post', '/v1/contribuyente/contribuyentes/10729144385/validarcomprobante', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'Authorization' => $token
                ],
                'body' => $data
            ]);
            $respuesta = $response_document->getBody()->getContents();
            return $respuesta;
        } catch (ClientException $e) {
            // \Log::info($e->getResponse()->getStatusCode());
            // \Log::info($e->getResponse()->getReasonPhrase());
            return $e->getResponse()->getStatusCode();
        }
    }

    public static function obtenerTokenLocal(){
        $token_bd = SunatToken::obtenerTokenActual();

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
                $token = static::obtenerTokenSunat();

                $expired_at = \Carbon\Carbon::now()->addSeconds(3600);
                SunatToken::actualizarToken();
                SunatToken::guardarDatos(['token'=>$token['access_token'],'expired_at'=>$expired_at]);

                return $token['access_token'];
            }

        }else{
            // No existe token en BD
            $token = static::obtenerTokenSunat();
            $expired_at = \Carbon\Carbon::now()->addSeconds(3600);
            SunatToken::actualizarToken();
            SunatToken::guardarDatos(['token'=>$token['access_token'],'expired_at'=>$expired_at]);
            return $token['access_token'];
        }
    }

    public static function obtenerTokenSunat(){
        \Log::info("--------------------ObtenerTokenSunat--------------------");
        $proveedor = new Client([
            'base_uri' => 'https://api-seguridad.sunat.gob.pe',
            // 'timeout' => 20.0
        ]);

        $response_login = $proveedor->request('post', 'v1/clientesextranet/d52dc3e1-780b-4354-a09b-cfd10dc0c5b1/oauth2/token/', [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'scope' => 'https://api.sunat.gob.pe/v1/contribuyente/contribuyentes',
                'client_id' => 'd52dc3e1-780b-4354-a09b-cfd10dc0c5b1',
                'client_secret' => 'MFIZEy9TxLSEAhQGjVbZbw=='
            ]
        ]);

        $token = json_decode($response_login->getBody()->getContents());
        $token = (array)$token;

        return $token;
    }
}
