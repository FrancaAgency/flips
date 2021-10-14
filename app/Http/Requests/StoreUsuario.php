<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuario extends FormRequest
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
         
            'documento' => 'required|integer|min:7|unique:App\Models\Usuario,doc',
            'nombres' => 'required|string|min:3',
            'apellidos' => 'required|string|min:3',
            'telefono' => 'required|integer|min:10',
            'correo' => "required|regex:/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/|unique:App\Models\Usuario,correo",
            'cuidad' => 'required|string|min:3',
            'direccion' => 'required|min:3',
            'password' => 'required|min:8',
        ];
    }

    public function attributes()
    {
        return [
            'documento' => 'documento del usuario',
            'nombres' => 'nombre del usuario',
            'apellidos' => 'apellidos de usuario',
            'telefono' => 'telefono del usuario',
            'correo' => "correo del usuario",
            'cuidad' => 'cuidad del usuario',
            'direccion' => 'direccion del usuario',
            'password' => 'contraseña del usuario',
        ];
    }

    public function messages()
    {
        return [

            'documento.required' => 'El :attributes es obligatorio.',
            'documento.integer' => 'El :attributes debe ser numerico.',
            'documento.min' => 'El :attributes debe tener minimo 7 numeros.',
            'documento.unique' => 'El :attributes ya existe.',
            'nombres.required' => 'El :attributes es obligatorio.',
            'nombres.string' => 'El :attributes no debe tener números.',
            'nombres.min' => 'El :attributes es muy corto.',
            'apellidos.required' => 'El :attributes es obligatorio.',
            'apellidos.string' => 'El :attributes no debe tener números.',
            'apellidos.min' => 'El :attributes es muy corto.',
            'telefono.required' => 'El :attributes es obligatorio.',
            'telefono.integer' => 'El :attributes debe ser numerico.',
            'telefono.min' => 'El :attributes es invalido.',
            'correo.required' => 'El :attributes es obligatorio.',
            'correo.regex' => 'El :attributes en invalido.',
            'correo.unique' => 'El :attributes ya existe.',
            'cuidad.required' => 'La :attributes es obligatoria.',
            'cuidad.string' => 'La :attributes no debe tener números.',
            'cuidad.min' => 'La :attributes es muy corta.',
            'direccion.required' => 'La :attributes es obligatoria.',
            'direccion.min' => 'La :attributes es muy corta.',
            'password.required' => 'La :attributes es obligatoria.',
            'password.min' => 'La :attributes es muy corta.',
        ];
    }
}
