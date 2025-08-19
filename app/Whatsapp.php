<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Whatsapp extends Model
{
    protected function sendMessage($to, $message)
    {
        $token = "EAAzEfYxLFyUBOwf7zjMIemYfz4qrGTqRE9DiB7jDsr0aGCjQ4awFCm2mOUMKuNhhHklQZChm5wTVAN9jMdPGKD1b0H9xpmZCoEnXjXIjlrUCudEDne8CG64GATeYUZBi9ivss5md92JvAnbWfZCoMOmKUZBvpZAJi57bcnjYKeuAgZBXFS8eD1UKIZCZAggwsjRtFtYO6pQgpdXFWphQvPht6Pgq72E4ZD";
        $phoneId = "459235423943630";

        // $response = Http::withToken($token)->post("https://graph.facebook.com/v20.0/$phoneId/messages", [
        //     'messaging_product' => 'whatsapp',
        //     'to' => $to,
        //     'type' => 'text',
        //     'text' => ['body' => $message],
        // ]);

        $response = Http::withToken($token)->post("https://graph.facebook.com/v20.0/$phoneId/messages", [
            'messaging_product' => 'whatsapp',
            'to' => $to,
            'type' => 'template',
            'template' => [
                'name' => "comunicado_carne",
                'language' => ['code' => "en_US"],
                // Opcional: agregar variables dinámicas en el cuerpo del mensaje
                'components' => [
                    [
                        'type' => 'body',
                        // 'parameters' => [
                        //     [
                        //         'type' => 'text',
                        //         'text' => 'Valor 1 para la plantilla'
                        //     ],
                        //     [
                        //         'type' => 'text',
                        //         'text' => 'Valor 2 para la plantilla'
                        //     ],
                        //     [
                        //         'type' => 'text',
                        //         'text' => 'Valor 2 para la plantilla'
                        //     ],
                            // Agrega más parámetros según la cantidad de variables en tu plantilla
                        // ]
                    ]
                ]
            ]
        ]);

        if ($response->successful()) {
            $data = $response->json();
            // Aquí puedes acceder al contenido de la respuesta
            dd($data);
        }
    }
}
