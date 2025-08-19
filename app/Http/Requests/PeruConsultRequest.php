<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeruConsultRequest extends FormRequest
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
        $type = $this->get('type');

        if($type=='1')
            $size = '|size:8';
        else if($type=='3')
            $size = '|size:11';
        else
            $size = '';

        return [
            'type' => 'required',
            'num_document' => 'required'.$size,
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        $type = $this->get('type');

        if($type=='1')
            $size = '8';
        else if($type=='3')
            $size = '11';
        else
            $size = '';

        return [
            'type.required' => 'El :attribute es obligatorio',
            'num_document.required' => 'El :attribute es obligatorio',
            'num_document.size' => 'El :attribute debe tener '.$size.' digitos',
        ];
    }

    public function attributes()
    {
        return [
            'type' => 'tipo de documento',
            'num_document' => 'numero de documento',
        ];
    }
}
