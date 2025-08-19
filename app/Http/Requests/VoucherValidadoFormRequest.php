<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoucherValidadoFormRequest extends FormRequest
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
        if($this->get('id')){
            $new_document = '';
            $telefono1 = '';
        }else{
            $new_document = 'required';
            $telefono1 = 'required';
        }

        return [
            'id' => 'required',
            'voucher_validado' => 'required',
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
            'voucher_validado.required' => 'La :attribute es obligatorio',
        ];
    }

    public function attributes()
    {
        return [
            
        ];
    }
}
