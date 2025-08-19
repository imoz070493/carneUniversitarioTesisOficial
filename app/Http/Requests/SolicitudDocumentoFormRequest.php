<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolicitudDocumentoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $tipo = $this->get('tipo');

        $fecha_primera_matricula_required = '';
        $ciclo_required = '';
        $periodo_required = '';

        if($tipo=='constancia_primera_matricula'){
            $fecha_primera_matricula_required = 'required';
        }
        if($tipo=='constancia_matricula'){
            $ciclo_required = 'required';
            $periodo_required = 'required';
        }

        return [
            'estudiante_id'=>'required',
            'tipo'=>'required',
            'fecha_primera_matricula'=>$fecha_primera_matricula_required,
            'ciclo'=>$ciclo_required,
            'periodo'=>$periodo_required
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'estudiante_id.required' => 'El :attribute es obligatorio',
            'tipo.required' => 'El :attribute es obligatorio',
            'fecha_primera_matricula.required' => 'La :attribute es obligatorio',
            'ciclo.required' => 'El :attribute es obligatorio',
            'periodo.required' => 'El :attribute es obligatorio',
        ];
    }

    public function attributes()
    {
        return [
            'estudiante_id' => 'estudiante',
            'tipo' => 'tipo de documento',
            'fecha_primera_matricula' => 'fecha de primera matricula',
        ];
    }
}
