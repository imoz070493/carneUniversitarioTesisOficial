<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';

    protected $primaryKey = 'id';

    protected $fillable = [
        'ruc',
        'razonSocial',
        'nombreComercial',
        'telefonos',
        'tipo',
        'estado',
        'condicion',
        'direccion',
        'departamento',
        'provincia',
        'distrito',
        'fechaInscripcion',
        'sistEmsion',
        'sistContabilidad',
        'actExterior',
        'actEconomicas',
        'cpPago',
        'sistElectronica',
        'fechaEmisorFe',
        'cpeElectronico',
        'fechaPle',
        'padrones',
        'fechaBaja',
        'profesion',
        'origen',
    ];

    public static function guardarDatos($datos){
        $data = [];

        if (array_key_exists('ruc', $datos)) $data['ruc'] = $datos['ruc'];
        if (array_key_exists('razonSocial', $datos)) $data['razonSocial'] = $datos['razonSocial'];
        if (array_key_exists('nombreComercial', $datos)) $data['nombreComercial'] = $datos['nombreComercial'];
        if (array_key_exists('telefonos', $datos)) $data['telefonos'] = $datos['telefonos'];
        if (array_key_exists('tipo', $datos)) $data['tipo'] = $datos['tipo'];
        if (array_key_exists('estado', $datos)) $data['estado'] = $datos['estado'];
        if (array_key_exists('condicion', $datos)) $data['condicion'] = $datos['condicion'];
        if (array_key_exists('direccion', $datos)) $data['direccion'] = $datos['direccion'];
        if (array_key_exists('departamento', $datos)) $data['departamento'] = $datos['departamento'];
        if (array_key_exists('provincia', $datos)) $data['provincia'] = $datos['provincia'];
        if (array_key_exists('distrito', $datos)) $data['distrito'] = $datos['distrito'];
        if (array_key_exists('fechaInscripcion', $datos)) $data['fechaInscripcion'] = $datos['fechaInscripcion'];
        if (array_key_exists('sistEmsion', $datos)) $data['sistEmsion'] = $datos['sistEmsion'];
        if (array_key_exists('sistContabilidad', $datos)) $data['sistContabilidad'] = $datos['sistContabilidad'];
        if (array_key_exists('actExterior', $datos)) $data['actExterior'] = $datos['actExterior'];
        if (array_key_exists('actEconomicas', $datos)) $data['actEconomicas'] = $datos['actEconomicas'];
        if (array_key_exists('cpPago', $datos)) $data['cpPago'] = $datos['cpPago'];
        if (array_key_exists('sistElectronica', $datos)) $data['sistElectronica'] = $datos['sistElectronica'];
        if (array_key_exists('fechaEmisorFe', $datos)) $data['fechaEmisorFe'] = $datos['fechaEmisorFe'];
        if (array_key_exists('cpeElectronico', $datos)) $data['cpeElectronico'] = $datos['cpeElectronico'];
        if (array_key_exists('fechaPle', $datos)) {
            if($datos['fechaPle']) $data['fechaPle'] = $datos['fechaPle'];            
        }
        if (array_key_exists('padrones', $datos)) $data['padrones'] = $datos['padrones'];
        if (array_key_exists('fechaBaja', $datos)) $data['fechaBaja'] = $datos['fechaBaja'];
        if (array_key_exists('profesion', $datos)) $data['profesion'] = $datos['profesion'];
        if (array_key_exists('origen', $datos)) $data['origen'] = $datos['origen'];


        if(isset($datos['id'])){
            $empresa = Empresa::findOrFail($datos['id']);
            $empresa->update($data);
        }else{
            $empresa = new Empresa();
            $empresa = $empresa->create($data);
        }

        return $empresa;
    }

    public static function listarEmpresas($buscar='', $criterio='nombre', $per_page='5'){
        $empresas = Empresa::select(
                                'id',
                                'ruc',
                                'razonSocial',
                                'nombreComercial',
                                'telefonos',
                                'tipo',
                                'estado',
                                'condicion',
                                'direccion',
                                'departamento',
                                'provincia',
                                'distrito',
                                'fechaInscripcion',
                                'sistEmsion',
                                'sistContabilidad',
                                'actExterior',
                                'actEconomicas',
                                'cpPago',
                                'sistElectronica',
                                'fechaEmisorFe',
                                'cpeElectronico',
                                'fechaPle',
                                'padrones',
                                'fechaBaja',
                                'profesion',
                                'origen',
                                'created_at'
                            );

            if($buscar!=''){
                if($criterio=='todos'){
                    $empresas = $empresas->where(function($query)use($buscar){
                        $query->orWhere('ruc','like','%'.$buscar.'%');
                        $query->orWhere('razonSocial','like','%'.$buscar.'%');
                        $query->orWhere('nombreComercial','like','%'.$buscar.'%');
                    });
                }else{
                    $empresas = $empresas->where($criterio,'like','%'.$buscar.'%');
                }
            }

        $empresas = $empresas->orderBy('created_at','desc')
                                ->paginate($per_page);

        return $empresas;
    }
}
