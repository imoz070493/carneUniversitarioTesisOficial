<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultaCpeFormRequest extends FormRequest
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
        return [
            'numRuc' => 'required|size:11',
            'codComp' => 'required|size:2',
            'numeroSerie' => 'required|size:4',
            'numero' => 'required',
            'fechaEmision' => 'required',
            'monto' => 'required'
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
            'numRuc.required' => 'El :attribute es obligatorio',
            'numRuc.size' => 'El tamaño del :attribute es 11',
            'codComp.required' => 'El :attribute es obligatorio',
            'codComp.size' => 'El tamaño del :attribute es 2',
            'numeroSerie.required' => 'El :attribute es obligatorio',
            'numeroSerie.size' => 'El tamaño del :attribute es 4',
            'numero.required' => 'El :attribute es obligatorio',
            'fechaEmision.required' => 'El :attribute es obligatorio',
            'monto.required' => 'El :attribute es obligatorio',
        ];
    }

    public function attributes()
    {
        return [
            'numRuc' => 'numero de ruc',
            'codComp' => 'tipo de comprobante',
            'numeroSerie' => 'numero de serie',
            'fechaEmision' => 'fecha de emision',
        ];
    }
}
