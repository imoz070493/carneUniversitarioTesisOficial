<?php

namespace App\Http\Controllers;

use App\ConsultaDocumento;
use App\Empresa;
use Illuminate\Http\Request;
use Peru\Jne\DniFactory;
use App\Http\Requests\PeruConsultRequest;
use App\PersonaDni;
use Peru\Sunat\RucFactory;

class PeruConsultController extends Controller
{
    public function index(PeruConsultRequest $request){
        $type = $request->get('type');
        $num_document = $request->get('num_document');
        $origen = $request->get('origen');

        if(!$origen) return null;

        $consulta_documento = ConsultaDocumento::guardarDatos([
            'type' => $type,
            'num_document' => $num_document,
            'origen' => $origen,
            'estado' => 'fallido',
        ]);

        if($type == '1'){

            $persona = PersonaDni::obtenerPersonaDni($num_document);

            if($persona){
                ConsultaDocumento::guardarDatos([
                    'id' => $consulta_documento->id,
                    'estado' => 'exito'
                ]);
                return $persona;
            }

            $factory = new DniFactory();
            $cs = $factory->create();
    
            $person = $cs->get($num_document);
            if (!$person) {
                echo 'Not found';
                return;
            }

            $data_persona = [
                'dni' => $person->dni,
                'nombres' => $person->nombres,
                'apellidoPaterno' => $person->apellidoPaterno,
                'apellidoMaterno' => $person->apellidoMaterno,
                'codVerifica' => $person->codVerifica,
                'origen' => $origen
            ];
            PersonaDni::create($data_persona);

            ConsultaDocumento::guardarDatos([
                'id' => $consulta_documento->id,
                'estado' => 'exito'
            ]);

            return response()->json(
                $person
            );
        }elseif(($type == '3')){

            $factory = new RucFactory();
            $cs = $factory->create();

            $company = $cs->get($num_document);
            if (!$company) {
                echo 'Not found';
                return;
            }

            $data_empresa = [
                'ruc'=> $company->ruc,
                'razonSocial'=> $company->razonSocial,
                'nombreComercial'=> $company->nombreComercial,
                'telefonos'=> json_encode($company->telefonos),
                'tipo'=> $company->tipo,
                'estado'=> $company->estado,
                'condicion'=> $company->condicion,
                'direccion'=> $company->direccion,
                'departamento'=> $company->departamento,
                'provincia'=> $company->provincia,
                'distrito'=> $company->distrito,
                'fechaInscripcion'=> $company->fechaInscripcion?substr($company->fechaInscripcion,0,10):'',
                'sistEmsion'=> $company->sistEmsion,
                'sistContabilidad'=> $company->sistContabilidad,
                'actExterior'=> $company->actExterior,
                'actEconomicas'=> json_encode($company->actEconomicas),
                'cpPago'=> json_encode($company->cpPago),
                'sistElectronica'=> json_encode($company->sistElectronica),
                'fechaEmisorFe'=> $company->fechaEmisorFe?substr($company->fechaEmisorFe,0,10):'',
                'cpeElectronico'=> json_encode($company->cpeElectronico),
                'fechaPle'=> $company->fechaPle?substr($company->fechaPle,0,10):'',
                'padrones'=> json_encode($company->padrones),
                'fechaBaja'=> $company->fechaBaja,
                'profesion'=> $company->profesion,
                'origen'=> $origen,
            ];

            $empresa = Empresa::where('ruc',$num_document)->first();

            if($empresa) $data_empresa['id'] = $empresa->id;

            Empresa::guardarDatos($data_empresa);

            ConsultaDocumento::guardarDatos([
                'id' => $consulta_documento->id,
                'estado' => 'exito'
            ]);

            return response()->json(
                $company
            );
        }
        echo json_encode(['message' => 'tipo de documento invalido']);
    }
}