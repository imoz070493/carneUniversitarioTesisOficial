<?php

namespace App\Http\Requests;

use App\Convocatoria;
use Illuminate\Foundation\Http\FormRequest;

class MatriculaImportFormRequest extends FormRequest
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
            'excel_document' => 'required',
            'periodo_academico_id' => 'required',
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
            'excel_document.required' => 'El :attribute es obligatorio',
            'periodo_academico_id.required' => 'El :attribute es obligatorio'
        ];
    }

    public function attributes()
    {
        return [
            'excel_document' => 'documento de excel',
            'periodo_academico_id' => 'periodo academico',
        ];
    }
}
