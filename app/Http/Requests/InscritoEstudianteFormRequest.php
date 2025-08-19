<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InscritoEstudianteFormRequest extends FormRequest
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
        if($this->get('usar_foto_anterior'))
            $new_document = '';
        else
            $new_document = 'required';

        return [
            // 'tipo_documento' => 'required',
            // 'numero_documento' => 'required',
            'numero_recibo' => 'required',
            'correo_personal' => 'required',
            'correo_personal' => 'required',
            'telefono1' => 'required',
            'telefono2' => '',
            'usar_foto_anterior' => 'required',
            // 'escuela_profesional' => 'required',
            // 'codigo_estudiante' => 'required',
            // 'nombres' => 'required',
            // 'apellido_paterno' => 'required',
            // 'apellido_materno' => 'required',
            // 'sexo' => 'required',
            // 'foto_validado' => 'required',
            // 'duplicado' => 'required',
            'new_document' => $new_document,
            'new_document_voucher' => "required",

            /* 'dni' => [
                'required',
                'max:8',
                function ($attribute, $value, $fail) {
                    $dni = $this->get('dni');

                    if(!$this->get('id')){
                        //Nuevo
                        $persona = Inscrito::join('convocatorias as c','inscritos.convocatoria_id','=','c.id')
                                                ->join('estudiantes as e','inscritos.estudiante_id','=','e.id')
                                                ->whereNull('c.activo')
                                                ->where('e.dni',$dni)
                                                ->get();

                        if(count($persona)>0)
                            $fail('Ya esta registrado esta persona con este numero de documento');

                    }else{
                        //Editar
                        $persona = Inscrito::join('estudiantes as e','inscritos.estudiante_id','=','e.id')
                                                ->select(
                                                    'inscritos.id',
                                                    'e.dni'
                                                )
                                                ->where('inscritos.id',$this->get('id'))
                                                ->first();

                        if($persona->dni!=$dni){
                            $dni = Inscrito::join('estudiantes as e','inscritos.estudiante_id','=','e.id')
                                                ->where('e.dni',$dni)
                                                ->get();

                            if($persona)
                                $fail('Ya esta registrado esta persona con este numero de documento');
                        }
                    }

                }
            ], */
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
            // 'tipo_documento.required' => 'Seleccione el :attribute es obligatorio',
            // 'numero_documento.required' => 'El :attribute es obligatorio',
            'numero_recibo.required' => 'El :attribute es obligatorio',
            'correo_personal.required' => 'El :attribute es obligatorio',
            'telefono1.required' => 'El :attribute es obligatorio',
            'telefono2.required' => 'El :attribute es obligatorio',
            'usar_foto_anterior.required' => 'El :attribute es obligatorio',
            'new_document.required' => 'Es obligatorio adjuntar la :attribute',
            'new_document_voucher.required' => 'Es obligatorio adjuntar el :attribute',
            // 'escuela_profesional.required' => 'La :attribute es obligatorio',
            // 'codigo_estudiante.required' => 'El :attribute es obligatorio',
            // 'nombres.required' => 'Los :attribute es obligatorio',
            // 'apellido_paterno.required' => 'El :attribute es obligatorio',
            // 'apellido_materno.required' => 'El :attribute es obligatorio',
            // 'sexo.required' => 'El :attribute es obligatorio',
            // 'dni.max' => 'La longitud maxima del :attribute es 8',
            // 'dni.required' => 'El :attribute es obligatorio',
            // 'new_document.required' => 'La :attribute es obligatorio',
        ];
    }

    public function attributes()
    {
        return [
            'telefono1' => 'telefono 1',
            'telefono2' => 'telefono 2',
            'new_document' => 'foto',
            'new_document_voucher' => 'voucher',
        ];
    }
}
