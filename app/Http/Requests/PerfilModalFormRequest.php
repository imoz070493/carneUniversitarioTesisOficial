<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class PerfilModalFormRequest extends FormRequest
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
            'old_password' => [
                'required',
                function ($attribute, $value, $fail) {
                    $user = \Auth::user();
                    $old_password = $this->get('old_password');
                    if (!Hash::check($value, $user->password)) {
                        $fail('Contraseña Incorrecta');
                    }                    
                }
            ],
            'new_password' => ['required','confirmed'],
            'new_password_confirmation' => 'required',
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
            'old_password.required' => 'La :attribute es obligatorio',
            'new_password.required' => 'La :attribute es obligatorio',
            'new_password.confirmed' => 'La confirmacion de la :attribute no es la misma',
            'new_password_confirmation.required' => 'El campo :attribute es obligatorio',
        ];
    }

    public function attributes()
    {
        return [
            'old_password' => 'contraseña actual',
            'new_password' => 'contraseña nueva',
            'new_password_confirmation' => 'confirmar contraseña nueva',
        ];
    }
}
