<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDatospersonalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        //con el envio de un usuario autentificado en el create_blade
        //ahora se carga un condición si esta autentificado
        //pasara y sino se va a rechazar
        if ($this->user_id == auth()->user()->id) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'user_id'=>'required',
            'distrito'=>'required',
            'namedireccion'=>'required',
            'listarole_id'=>'required',
            'ejecutora_id'=>'required',
            'provincia_id'=>'required',
            'sector_id'=>'required',
        ];
    }
}
