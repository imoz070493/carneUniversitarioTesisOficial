<?php

namespace App\Http\Requests;

use App\Empresa;
use Illuminate\Foundation\Http\FormRequest;

class EmpresaFormRequest extends FormRequest
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
            'razonSocial' => 'required',
            'nombreComercial' => 'required',
            'ruc' => [
                'required',
                'size:11',
                function ($attribute, $value, $fail) {
                    $ruc = $this->get('ruc');

                    if(!$this->get('id')){
                        //Nuevo
                        $empresa = Empresa::where('ruc',$ruc)
                                                ->get();

                        if(count($empresa)>0)
                            $fail('Ya esta registrado esta empresa con este numero de documento');

                    }else{
                        //Editar
                        $empresa = Empresa::findOrFail($this->get('id'));

                        if($empresa->ruc!=$ruc){
                            $dni = Empresa::where('ruc',$ruc)
                                                    ->get();

                            if($empresa)
                                $fail('Ya esta registrado esta empresa con este numero de documento');
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
            'razonSocial.required' => 'Los :attribute es obligatorio',
            'nombreComercial.required' => 'El :attribute es obligatorio',
            'ruc.required' => 'El :attribute es obligatorio',
            'ruc.size' => 'La longitud del :attribute es 11',
        ];
    }

    public function attributes()
    {
        return [
            'ruc' => 'numero de documento',
            'razonSocial' => 'razon social',
            'nombreComercial' => 'nombre comercial',
        ];
    }
}
