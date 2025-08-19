<?php

namespace App\Http\Controllers;

use App\Helpers\Import\PersonaDniImport;
use App\Http\Requests\PersonaDniFormRequest;
use App\Http\Requests\PersonaDniImportFormRequest;
use App\PersonaDni;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PersonaDniController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $per_page = $request->per_page;

        $personas_dnis = PersonaDni::listarPersonasDnis($buscar, $criterio, $per_page);

        return [
            'pagination' => [
                'total' => $personas_dnis->total(),
                'current_page' => $personas_dnis->currentPage(),
                'per_page' => $personas_dnis->perPage(),
                'last_page' => $personas_dnis->lastPage(),
                'from' => $personas_dnis->firstItem(),
                'to' => $personas_dnis->lastItem(),
            ],
            'personas_dnis' => $personas_dnis
        ];
    }

    public function store(PersonaDniFormRequest $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        return PersonaDni::guardarDatos($data);
    }

    public function update(PersonaDniFormRequest $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        return PersonaDni::guardarDatos($data);
    }

    public function importar(PersonaDniImportFormRequest $request)
    {
        $data = $request->all();

        // LOG::info($data);

        $filename = PersonaDniImport::guardarExcel($request->excel_document);

        $response = PersonaDniImport::guardarDatos($filename);
        // \Log::info(gettype($response));
        if (gettype($response) == 'object') {
            /* enviar el resultado */
            return $response;
            // return response()->json([
            //     'message' => 'importado correctamente',
            //     'data' => $data,
            //     'id' => $response,
            // ]);
        } else {
            $array_errores = [];
            
            for($i=0;$i<count($response);$i++){
                $objecto_error = new \stdClass();
                $objecto_error->id = $i + 1;
                $objecto_error->descripcion = $response[$i];
                array_push($array_errores,$objecto_error);
            }

            return response()->json([
                'message' => 'error al importar',
                'data' => $array_errores,
            ], 500);
        }
    }

    public function descargarPlantilla(Request $request)
    {
        $data = $request->all();

        // LOG::info($data);

        $ruta_document = public_path().'/document/personas.xlsx';

        $response =  new StreamedResponse(
            function () use ($ruta_document) {
                print file_get_contents($ruta_document);
            }
        );
        $response->headers->set('Content-Type', 'application/vnd.ms-excel');
        $response->headers->set('Content-Disposition', 'attachment;filename="personas.xlsx"');
        $response->headers->set('Cache-Control', 'max-age=0');
        return $response;
    }
}
