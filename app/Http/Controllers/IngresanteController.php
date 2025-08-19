<?php

namespace App\Http\Controllers;

use App\Helpers\Import\IngresanteImport;
use App\Http\Controllers\Reportes\FichaMatriculaMasivaPdf;
use App\Http\Requests\IngresanteImportFormRequest;
use Illuminate\Http\Request;

class IngresanteController extends Controller
{
    public function importar(IngresanteImportFormRequest $request)
    {
        $data = $request->all();

        // LOG::info($data);

        try{
            $filename = IngresanteImport::guardarExcel($request->excel_document);

            $data = IngresanteImport::guardarDatos($filename);
            
            // LLENANDO OBJETO BUILPDF
            $file = new \stdClass();
            $file->fecha_hora_impresion = \Carbon\Carbon::now()->format('d-m-Y H:i:s');

            $file->name_file = "Fichas de Matricula";

            $datos = [
                'file' => $file,
                'data' => $data
            ];


            $response = FichaMatriculaMasivaPdf::buildReport($datos);

            return $response;
            // \Log::info(gettype($response));

            if(gettype($response)=='object'){
                \Log::info("Imprimiendo");
                throw ($response);
            }

            if ($response == 2) {
                /* enviar el resultado */
                return response()->json([
                    'message' => 'importado correctamente',
                    'data' => $data,
                    'id' => $response,
                ]);
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
        }catch(\Exception $e){
            \Log::info($e);
            \Log::info($e->getMessage());

            $message = 'Ha ocurrido un error al importar el excel';

            $message = "";$code="";
            if($e->getMessage()=='sin_periodo_actual'){
                $code = 'sin_periodo_actual';
                $message = "No se ha registrado un periodo activo, por favor dirijase al menu configuracion.";
            }

            if($e->getMessage()=='excel_vacio'){
                $code = 'excel_vacio';
                $message = "El excel se encuentra vacio.";
            }

            return response()->json([
                'message' => $message,
                'error' => $e,
                'code' => $code
            ], 500);
    	}
    }
}
