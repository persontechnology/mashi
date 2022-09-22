<?php

namespace App\Http\Requests\Usuario\Socio;

use Illuminate\Foundation\Http\FormRequest;
use Elegant\Sanitizer\Laravel\SanitizesInput;

class RqActualizar extends FormRequest
{
    use SanitizesInput;
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
            'id'=>'required|exists:users,id',
            'email'=>'nullable|string|max:255|unique:users,email,'.$this->input('id'),
            'nombres'=>'required|string|max:255',
            'apellidos'=>'required|string|max:255',
            'cedula'=>'required|string|max:255|ecuador:personal_identification|unique:users,cedula,'.$this->input('id'),
            'provincia'=>'required|string|max:255',
            'canton'=>'required|string|max:255',
            'parroquia'=>'required|string|max:255',
            'recinto'=>'required|string|max:255',
            'direccion'=>'required|string|max:255',
            'telefono'=>'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:6',
            'celular'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'lugar_nacimiento'=>'required|string|max:255',
            'fecha_nacimiento'=>'date',
            'nacionalidad'=>'required|string|max:255',
            'estado_civil'=>'required|in:Soltero,Casado,Divorciado,Viuido,Unión libre',
            'nombre_conyuge'=>'nullable|string|max:255',
            'cedula_conyuge'=>'nullable|string|max:255',
            'celular_conyuge'=>'nullable|string|max:255',
            'foto'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sexo'=>'required|in:Hombre,Mujer',
        ];
    }
    
    
    public function filters()
    {
        return [
            'apellidos' => 'uppercase',
            'nombres'=>'uppercase',
            'provincia'=>'uppercase',
            'canton'=>'uppercase',
            'parroquia'=>'uppercase',
            'recinto'=>'uppercase',
            'direccion'=>'uppercase',
            'nacionalidad'=>'uppercase',
            'email'=>['trim', 'empty_string_to_null', 'lowercase'],
            'lugar_nacimiento'=>'uppercase',
            'nombre_conyuge'=>'uppercase',
        ];
    }
    public function messages()
    {
        return [
            'cedula.ecuador' => 'El campo :attribute no tiene el formato de país correspondiente. (Ecuador)',
        ];
    }
}
