<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConvocatoriaFormRequest extends FormRequest
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
            'nombre'=>'required',
            'fecha_inicio'=>'required',
            'fecha_fin'=>'required',
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
            'nombre.required' => 'El :attribute es obligatorio',
            'fecha_inicio.required' => 'La :attribute es obligatorio',
            'fecha_fin.required' => 'La :attribute es obligatorio',
        ];
    }

    public function attributes()
    {
        return [
            'nombre' => 'nombre',
        ];
    }
}
