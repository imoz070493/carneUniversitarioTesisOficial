<?php

namespace App\Http\Controllers;

use App\DetalleEnvio;
use App\DocumentoEnvio;
use App\Http\Requests\DocumentoEnvioFormRequest;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Http\Request;

class DocumentoEnvioController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $per_page = $request->per_page;

        $documentos_envios = DocumentoEnvio::listarDocumentosEnviados($buscar, $criterio, $per_page);
        $pendientes = 0;
        
        return [
            'pagination' => [
                'total' => $documentos_envios->total(),
                'current_page' => $documentos_envios->currentPage(),
                'per_page' => $documentos_envios->perPage(),
                'last_page' => $documentos_envios->lastPage(),
                'from' => $documentos_envios->firstItem(),
                'to' => $documentos_envios->lastItem(),
                'pendiente' => $pendientes,
            ],
            'documentos_envios' => $documentos_envios
        ];
    }

    public function indexDetalle(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $per_page = $request->per_page;
        $documento_envio_id = $request->documento_envio_id;

        $detalles_envios = DetalleEnvio::listarDetallesEnviados($buscar, $criterio, -1, $documento_envio_id);
        
        return [
            // 'pagination' => [
            //     'total' => $detalles_envios->total(),
            //     'current_page' => $detalles_envios->currentPage(),
            //     'per_page' => $detalles_envios->perPage(),
            //     'last_page' => $detalles_envios->lastPage(),
            //     'from' => $detalles_envios->firstItem(),
            //     'to' => $detalles_envios->lastItem(),
            // ],
            'detalles_envios' => $detalles_envios
        ];
    }

    public function store(DocumentoEnvioFormRequest $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        $solicitudes = explode("\n",$data['estudiantes']);
        $id = app(Dispatcher::class)->dispatch(new \App\Jobs\Logger([1,2]));
        // $response = \App\Jobs\Logger::Dispatch();
        \Log::info("Response JOB: ".$id);
        // \Log::info($response->getJobId());

        $documento_envio = DocumentoEnvio::guardarDatos($data);
        
        $solicitud = [];
        $i = count($solicitudes) - 1;
        for ($i; $i >= 0; $i--) {
            $solicitud = explode("\t",$solicitudes[$i]);
            DetalleEnvio::guardarDatos([
                'codigo' => $solicitud[1],
                'nombre_estudiante' => $solicitud[2],
                'estado' => 'enviado',
                'documento_envio_id' => $documento_envio->id
            ]);
        }

        return 2;
    }

    public function enviar(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        return DocumentoEnvio::guardarDatos([
            'id' => $data['id'],
            'carta' => $data['carta'],
            'fecha_envio_facultad' => $data['fecha_envio_facultad'],
            'estado' => 'facultad',
        ]);
    }

    public function recibir(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        return DocumentoEnvio::guardarDatos([
            'id' => $data['id'],
            'fecha_recibido' => \Carbon\Carbon::now(),
            'estado' => 'recibido',
        ]);
    }

    public function update(DocumentoEnvioFormRequest $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        return DocumentoEnvio::guardarDatos($data);
    }
}
