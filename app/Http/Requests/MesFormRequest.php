<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MesFormRequest extends FormRequest
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
            'nome' => 'required|min:3|max:30'
        ];
    }

    public function messages()
    {
        return[
            'nome.required' => 'O campo nome não pode estar vazio',
            'nome.min'=> 'O campo nome deve conter no minímo 3 caracter',
            'nome.max'=> 'O campo nome deve conter no máximo 30 caracter'
        ];

    }
}
