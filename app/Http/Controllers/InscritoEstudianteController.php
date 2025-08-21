<?php

namespace App\Http\Controllers;

use App\Convocatoria;
use App\Estudiante;
use App\Http\Requests\InscritoEstudianteFormRequest;
use App\Inscrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InscritoEstudianteController extends Controller
{
    public function store(InscritoEstudianteFormRequest $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();
        $convocatoria_actual = Convocatoria::whereNull('activo')->first();
        // $data['convocatoria_id'] = $convocatoria_actual->id;
        // $data['folder'] = $convocatoria_actual->folder;

        try{
            DB::beginTransaction();

            // \Log::info("ID: ".\Auth::user()->estudiante_id);
            $estudiante_id = \Auth::user()->estudiante_id;
            $estudiante = Estudiante::findOrFail($estudiante_id);

            $data_inscrito = [
                'codigo_estudiante' => $estudiante->codigo_estudiante,
                'convocatoria_id' => $convocatoria_actual->id,
                'estudiante_id' => $estudiante_id,
                'foto_validado' => false,
                'voucher_validado' => false,
                'folder' => $convocatoria_actual->folder,                
                'new_document_voucher' => $data['new_document_voucher'],
                'duplicado' => false,
                'credencial_validado' => "no_validado",
                'numero_recibo' => $data['numero_recibo'],
                'usar_foto_anterior' => $data['usar_foto_anterior'],
            ];

            if($data['usar_foto_anterior']){
                $ultima_inscripcion = Inscrito::obtenerUltimaInscripcionEstudiante($estudiante_id);
                $data_inscrito['foto_anterior'] = $ultima_inscripcion->folder."/1_validado/".$ultima_inscripcion->foto;
                $data_inscrito['foto_validado'] = '1';
            }else{
                $data_inscrito['new_document'] = $data['new_document'];
            }

            $data_estudiante = [
                'id' => $estudiante_id,
                'correo_personal' => $data['correo_personal'],
                'telefono1' => $data['telefono1'],
                'telefono2' => isset($data['telefono2'])?$data['telefono2']:null,
            ];

            \Log::info($data_inscrito);
            $estudiante_update = Estudiante::guardarDatos($data_estudiante);
            $inscrito = Inscrito::guardarDatosPerfilEstudiante($data_inscrito);
            DB::commit();
            return response()->json([
                'cod_sunat' => 0,
                'msj_sunat' => 'Construido y enviado',
                'inscrito_id' => $inscrito->id
            ],200);
    	}catch(\Exception $e){
			DB::rollback();
            \Log::info($e);
            return response()->json([
                'message' => 'No se puede registrar la venta',
                'error' => $e
            ], 500);
    	}

        
    }
}
