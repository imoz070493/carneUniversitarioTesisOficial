<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentoEnvioFormRequest extends FormRequest
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
            'carta'=>'required',
            'facultad'=>'required',
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
            'carta.required' => 'La :attribute es obligatorio',
            'facultad.required' => 'La :attribute es obligatorio',
        ];
    }

    public function attributes()
    {
        return [
            'carta' => 'carta',
            'facultad' => 'facultad',
        ];
    }
}
