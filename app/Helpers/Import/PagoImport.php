<?php
namespace App\Helpers\Import;

use App\CargaMatricula;
use App\Convocatoria;
use App\Estudiante;
use App\Inscrito;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;

use PhpOffice\PhpSpreadsheet\Spreadsheet;

use Illuminate\Support\Facades\Log;
use DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Matricula;
use App\User;
use App\Usuario;

class PagoImport{
    public static function guardarExcel($document_excel){
		$exploded = explode(',',$document_excel);
        $decoded = base64_decode($exploded[1]);

        if(strpos($exploded[0],'vnd.openxmlformats-officedocument.spreadsheetml.sheet')){
            $extension = 'xlsx';
        }else{
            $extension = '';
        }

        $fileName = Str::random().'.'.$extension;

		// if (!file_exists(Storage::disk('imports')) {
        //     mkdir(Storage::disk('imports'), 0777);
        // }
		// $path = public_path().'/document/imports/'.$fileName;

        // file_put_contents($path, $decoded);
        Storage::disk('imports')->put($fileName, $decoded);

        //INSERTAR MEDIANTE MODELO
        // DB::table("document")->insert('path')

        return $fileName;
	}

    public static function guardarDatos($fileName, $convocatoria_id){
		// LOG::info("Filename: ".$fileName);

		$path = public_path().'/storage/imports/'.$fileName;
        // $path = Storage::url('app/public/imports/'.$fileName);

		$reader = new Xlsx();
		$spreadsheet = $reader->load($path);
		$objWorksheet = $spreadsheet->getActiveSheet();
		$highestRow = $objWorksheet->getHighestRow();
		
		$name_sheet = $objWorksheet->getTitle();
		// $exploded = explode('-',$name_sheet);
		// $agno = $exploded[0];
		// $mes = $exploded[1];

		// Log::info("Nombre Hoja: ".$objWorksheet->getTitle());
		// $numero_dias_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $agno) + 10;
        $fila_inicio_lectura = 1;
		$errors = [];
		for ($row = $fila_inicio_lectura; $row <= $highestRow; $row++) {
            //Validar Codigo Estudiante
            if(!self::validarCodigoEstudiante($objWorksheet->getCellByColumnAndRow(1, $row)->getFormattedValue())){
				array_push($errors,"El codigo de estudiante: ".$objWorksheet->getCellByColumnAndRow(7, $row)." de la fila: ".$row." es invalido.");
			}           
		}
        

        // PARA UNA POSTERIOR IMPLEMENTACION
        // $carga_matricula = CargaMatricula::where('document',$fileName)->first();
        // if(count($errors)>0){
        //     CargaMatricula::guardarDatos([
        //         'id' => $carga_matricula->id,
        //         'errores' => $errors,
        //         'estado' => 'con_error',
        //     ]);
        //     return $errors;
        // }

        //guardar datos
        //\Log::info("Dias Mes: ".$numero_dias_mes);

        // 1, 2, 4, 7
        $array_pagos = [];
        for ($row = $fila_inicio_lectura; $row <= $highestRow; $row++) {
            //Obtenemos una fila de datos del excel
            $codigo_estudiante = $objWorksheet->getCellByColumnAndRow(1, $row)->getFormattedValue();
            // $inscrito = Inscrito::obtenerUltimaInscripcion($codigo_estudiante);

            array_push($array_pagos,[
                'codigo_estudiante' => $codigo_estudiante,
            ]);
        }

        if(count($errors)>0){\Log::info($errors);
            // CargaMatricula::guardarDatos([
            //     'id' => $carga_matricula->id,
            //     'errores' => $errors,
            //     'estado' => 'con_error',
            // ]);
            return $errors;
        }

        if(count($errors)==0 && count($array_pagos)==0){
            array_push($errors,"El excel esta vacio");
            // CargaMatricula::guardarDatos([
            //     'id' => $carga_matricula->id,
            //     'errores' => $errors,
            //     'estado' => 'con_error',
            // ]);
            return $errors;
        }

        try{
            DB::beginTransaction();

            foreach ($array_pagos as $key => $pago) {
                \DB::table('inscritos')->where('convocatoria_id',$convocatoria_id)
                                    ->where(function($query){
                                        $query->orWhereNull('voucher_validado');
                                        $query->orWhere('voucher_validado',false);
                                    })
                                    ->where('codigo_estudiante',$pago['codigo_estudiante'])
                                    ->update(['voucher_validado'=>true]);
            }

            // CargaMatricula::guardarDatos([
            //     'id' => $carga_matricula->id,
            //     'estado' => 'completado',
            // ]);

            DB::commit();

            return 2;
        }catch(\Exception $e){
			DB::rollback();
            \Log::info($e->getMessage());
            throw ($e);
            // return response()->json([
            //     'message' => $e->getMessage(),
            //     'error' => $e
            // ], 500);
    	}
	}

    public static function calcularTotalCompra($datos){
        $total_compra = 0;

        foreach ($datos as $key => $value) {
            $total_compra += floatval($value['stock'])*floatval($value['precio_compra']);
        }

        return $total_compra;
    }

    public static function validarSerie($codigo){
        if(!$codigo)
            return false;
        else
            return true;
    }

    public static function validarNumeroRecibo($numero_recibo){
        if(!$numero_recibo)
            return false;
        else
            return true;
    }

    public static function validarTotal($apellido_paterno){
        if(!$apellido_paterno)
            return false;
        else
            return true;
    }

    public static function validarCodigoEstudiante($apellido_materno){
        if(!$apellido_materno)
            return false;
        else
            return true;
    }

    public static function validarNombres($nombres){
        if(!$nombres)
            return false;
        else
            return true;
    }

    public static function validarSexo($sexo){
        if(!$sexo)
            return false;
        else
            return true;
    }

    public static function validarFacultad($facultad){
        if(!$facultad)
            return false;
        else
            return true;
    }    

    public static function validarEscuelaProfesional($escuela_profesional){
        if(!$escuela_profesional)
            return false;
        else
            return true;
    }    
}