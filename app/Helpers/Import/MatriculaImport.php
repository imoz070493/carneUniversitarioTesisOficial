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

class MatriculaImport{
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

    public static function guardarDatos($fileName, $periodo_academico_id){
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
        $fila_inicio_lectura = 2;
		$errors = [];
		for ($row = $fila_inicio_lectura; $row <= $highestRow; $row++) {
			//Validar CODIGO
			if(!self::validarCodigo($objWorksheet->getCellByColumnAndRow(2, $row)->getFormattedValue())){
				array_push($errors,"El codigo: ".$objWorksheet->getCellByColumnAndRow(2, $row)." de la fila: ".$row." ya existe.");
			}
            //Validar NUMERO DE DOCUMENTO
            if(!self::validarNumeroDocumento($objWorksheet->getCellByColumnAndRow(3, $row)->getFormattedValue())){
				array_push($errors,"El numero de documento: ".$objWorksheet->getCellByColumnAndRow(3, $row)." de la fila: ".$row." ya existe.");
			}
            //Validar APELLIDO PATERNO
            if(!self::validarApellidoPaterno($objWorksheet->getCellByColumnAndRow(4, $row)->getFormattedValue())){
				array_push($errors,"El apellido paterno: ".$objWorksheet->getCellByColumnAndRow(4, $row)." de la fila: ".$row." ya existe.");
			}
            //Validar APELLIDO MATERNO
            if(!self::validarApellidoMaterno($objWorksheet->getCellByColumnAndRow(5, $row)->getFormattedValue())){
				array_push($errors,"El apellido materno: ".$objWorksheet->getCellByColumnAndRow(5, $row)." de la fila: ".$row." ya existe.");
			}
            //Validar NOMBRES
            if(!self::validarNombres($objWorksheet->getCellByColumnAndRow(6, $row)->getFormattedValue())){
				array_push($errors,"Los nombres: ".$objWorksheet->getCellByColumnAndRow(6, $row)." de la fila: ".$row." ya existe.");
			}
            //Validar GENERO
            if(!self::validarSexo($objWorksheet->getCellByColumnAndRow(7, $row)->getFormattedValue())){
				array_push($errors,"El sexo: ".$objWorksheet->getCellByColumnAndRow(7, $row)." de la fila: ".$row." ya existe.");
			}
            //Validar FACULTAD
            if(!self::validarFacultad($objWorksheet->getCellByColumnAndRow(8, $row)->getFormattedValue())){
				array_push($errors,"La facultad: ".$objWorksheet->getCellByColumnAndRow(8, $row)." de la fila: ".$row." ya existe.");
			}
            //Validar ESCUELA PROFESIONAL
            if(!self::validarEscuelaProfesional($objWorksheet->getCellByColumnAndRow(9, $row)->getFormattedValue())){
				array_push($errors,"La escuela profesional: ".$objWorksheet->getCellByColumnAndRow(9, $row)." de la fila: ".$row." ya existe.");
			}
		}
        

        $carga_matricula = CargaMatricula::where('document',$fileName)->first();
        if(count($errors)>0){
            CargaMatricula::guardarDatos([
                'id' => $carga_matricula->id,
                'errores' => $errors,
                'estado' => 'con_error',
            ]);
            return $errors;
        }

        //guardar datos
        //\Log::info("Dias Mes: ".$numero_dias_mes);

        $array_matriculas = [];
        for ($row = $fila_inicio_lectura; $row <= $highestRow; $row++) {
            //Obtenemos una fila de datos del excel
            $codigo_estudiante = $objWorksheet->getCellByColumnAndRow(2, $row)->getFormattedValue();
            $numero_documento = $objWorksheet->getCellByColumnAndRow(3, $row)->getFormattedValue();
            $apellido_paterno = $objWorksheet->getCellByColumnAndRow(4, $row)->getFormattedValue();
            $apellido_materno = $objWorksheet->getCellByColumnAndRow(5, $row)->getFormattedValue();
            $nombres = $objWorksheet->getCellByColumnAndRow(6, $row)->getFormattedValue();
            $sexo = $objWorksheet->getCellByColumnAndRow(7, $row)->getFormattedValue();
            $facultad = $objWorksheet->getCellByColumnAndRow(8, $row)->getFormattedValue();
            $escuela_profesional = $objWorksheet->getCellByColumnAndRow(9, $row)->getFormattedValue();
            $inscrito = Inscrito::obtenerUltimaInscripcion($codigo_estudiante);

            array_push($array_matriculas,[
                'codigo_estudiante' => $codigo_estudiante,
                'numero_documento' => $numero_documento,
                'apellido_paterno' => $apellido_paterno,
                'apellido_materno' => $apellido_materno,
                'nombres' => $nombres,
                'sexo' => $sexo,
                'facultad' => $facultad,
                'escuela_profesional' => $escuela_profesional,
                'fecha_expiracion' => $inscrito?$inscrito->fecha_expiracion:null
            ]);
        }

        // Validamos codigo duplicados
        // $codigo_old;
        // for ($i=0; $i < count($array_matriculas); $i++) {
        //     $codigo_old = $array_matriculas[$i]['codigo_estudiante'];
        //     for ($j=0; $j < count($array_matriculas); $j++) {
        //         if($i!=$j){
        //             if($codigo_old == $array_matriculas[$j]['codigo_estudiante']){
        //                 array_push($errors,"El codigo: ".$codigo_old." se duplica en  la fila: ".($i+1)." y ".($j+1));
        //             }
        //         }
        //     }
        // }

        if(count($errors)>0){
            CargaMatricula::guardarDatos([
                'id' => $carga_matricula->id,
                'errores' => $errors,
                'estado' => 'con_error',
            ]);
            return $errors;
        }

        if(count($errors)==0 && count($array_matriculas)==0){
            array_push($errors,"El excel esta vacio");
            CargaMatricula::guardarDatos([
                'id' => $carga_matricula->id,
                'errores' => $errors,
                'estado' => 'con_error',
            ]);
            return $errors;
        }

        try{
            DB::beginTransaction();

            // Preparando variables generales
            $usuarios_creados = [];
            for ($i=0; $i < count($array_matriculas); $i++) {
                // ESTUDIANTES
                $estudiante = Estudiante::where('codigo_estudiante',$array_matriculas[$i]['codigo_estudiante'])->first();

                if($estudiante){
                    //Editar
                    Estudiante::guardarDatos([
                        'facultad' => $array_matriculas[$i]['facultad'],
                        'escuela_profesional' => $array_matriculas[$i]['escuela_profesional'],
                        'dni' => $array_matriculas[$i]['numero_documento'],
                        'codigo_estudiante' => $array_matriculas[$i]['codigo_estudiante'],
                        'apellido_paterno' => $array_matriculas[$i]['apellido_paterno'],
                        'apellido_materno' => $array_matriculas[$i]['apellido_materno'],
                        'nombres' => $array_matriculas[$i]['nombres'],
                        'sexo' => $array_matriculas[$i]['sexo'],
                        'id' => $estudiante->id
                    ]);
                }else{
                    // Nuevo
                    $estudiante = Estudiante::guardarDatos([
                        'facultad' => $array_matriculas[$i]['facultad'],
                        'escuela_profesional' => $array_matriculas[$i]['escuela_profesional'],
                        'dni' => $array_matriculas[$i]['numero_documento'],
                        'codigo_estudiante' => $array_matriculas[$i]['codigo_estudiante'],
                        'apellido_paterno' => $array_matriculas[$i]['apellido_paterno'],
                        'apellido_materno' => $array_matriculas[$i]['apellido_materno'],
                        'nombres' => $array_matriculas[$i]['nombres'],
                        'sexo' => $array_matriculas[$i]['sexo'],
                    ]);

                    $usuario = User::create([
                        'name' => $array_matriculas[$i]['nombres']." ".$array_matriculas[$i]['apellido_paterno']." ".$array_matriculas[$i]['apellido_materno'],
                        'email' => $array_matriculas[$i]['codigo_estudiante']."@unajma.edu.pe",
                        'usuario' => $array_matriculas[$i]['codigo_estudiante'],
                        'password' => bcrypt($array_matriculas[$i]['numero_documento']),
                        'estado' => "activo",
                        'estudiante_id' => $estudiante->id,
                        // 'role_id' => '3',//Estudiante
                    ]);

                    array_push($usuarios_creados,$usuario->id);                    
                }

                $matricula = Matricula::where('codigo_estudiante',$array_matriculas[$i]['codigo_estudiante'])
                                            ->where('periodo_academico_id',$periodo_academico_id)
                                            ->first();
                // MATRICULAS
                // Registrar Articulos
                if($matricula){
                    $matricula_id = $matricula->id;

                    Matricula::guardarDatos([
                        'codigo_estudiante' => $array_matriculas[$i]['codigo_estudiante'],
                        'periodo_academico_id' => $periodo_academico_id,
                        'estudiante_id' => $estudiante->id,
                        'fecha_expiracion' => $array_matriculas[$i]['fecha_expiracion'],
                        'id' => $matricula_id,
                    ]);
                }else{
                    $matricula_id = Matricula::guardarDatos([
                        'codigo_estudiante' => $array_matriculas[$i]['codigo_estudiante'],
                        'periodo_academico_id' => $periodo_academico_id,
                        'estudiante_id' => $estudiante->id,
                        'fecha_expiracion' => $array_matriculas[$i]['fecha_expiracion']
                    ])->id;
                }

            }

            CargaMatricula::guardarDatos([
                'id' => $carga_matricula->id,
                'estado' => 'completado',
            ]);

            DB::commit();
            foreach ($usuarios_creados as $key => $value) {
                $usuario_nuevo = User::findOrFail($value);
                $usuario_nuevo->assignRole('estudiante');
            }

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

    public static function validarCodigo($codigo){
        if(!$codigo)
            return false;
        else
            return true;
    }

    public static function validarNumeroDocumento($numero_documento){
        if(!$numero_documento)
            return false;
        else
            return true;
    }

    public static function validarApellidoPaterno($apellido_paterno){
        if(!$apellido_paterno)
            return false;
        else
            return true;
    }

    public static function validarApellidoMaterno($apellido_materno){
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