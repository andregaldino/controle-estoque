<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CategoriaRequest extends Request
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
            'nome'       => 'required|min:3'
        ];
    }

    public function messages(){
        return [
            'nome.required' => 'O campo nome é obrigatorio.',
            'nome.min' => 'O campo nome deve conter mais de 3 caracteres.',
        ];
    }
}
