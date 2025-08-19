<?php

namespace App\Http\Requests;

use App\PersonaDni;
use Illuminate\Foundation\Http\FormRequest;

class PersonaDniFormRequest extends FormRequest
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
            'nombres' => 'required',
            'apellidoPaterno' => 'required',
            'apellidoMaterno' => 'required',
            'codVerifica' => 'required',
            'dni' => [
                'required',
                'max:8',
                function ($attribute, $value, $fail) {
                    $dni = $this->get('dni');

                    if(!$this->get('id')){
                        //Nuevo
                        $persona = PersonaDni::where('dni',$dni)
                                                ->get();

                        if(count($persona)>0)
                            $fail('Ya esta registrado esta persona con este numero de documento');

                    }else{
                        //Editar
                        $persona = PersonaDni::findOrFail($this->get('id'));

                        if($persona->dni!=$dni){
                            $dni = PersonaDni::where('dni',$dni)
                                                    ->get();

                            if($persona)
                                $fail('Ya esta registrado este persona con este numero de documento');
                        }
                    }

                }
            ],
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
            'nombres.required' => 'Los :attribute es obligatorio',
            'apellidoPaterno.required' => 'El :attribute es obligatorio',
            'apellidoMaterno.required' => 'El :attribute es obligatorio',
            'codVerifica.required' => 'El :attribute es obligatorio',
            'dni.required' => 'El :attribute es obligatorio',
            'dni.max' => 'La longitud maxima del :attribute es 8',
        ];
    }

    public function attributes()
    {
        return [
            'dni' => 'numero de documento',
            'apellidoPaterno' => 'apellido paterno',
            'apellidoMaterno' => 'apellido materno',
            'codVerifica' => 'codigo de verificacion',
        ];
    }
}
