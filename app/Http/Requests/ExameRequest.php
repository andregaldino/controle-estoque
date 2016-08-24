<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ExameRequest extends Request
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
        switch($this->method())
        {
            case 'GET':
                break;
            case 'DELETE':
                break;
            case 'POST':
            {
                return [
                    'nome'       => 'required|min:3',
                    'sigla'       => 'required|min:3',
                    'duracao'       => 'required|min:3|numeric',
                ];
                break;
            }
            case 'PUT':
                return [
                    'nome'       => 'required|min:3',
                    'id'       => 'required|numeric|exists:cargos',
                    'sigla'       => 'required|min:3',
                    'duracao'       => 'required|min:3|numeric',
                ];
                break;
            case 'PATCH':
                break;
            default:
            break;
        }

    }

    public function messages(){
        return [
        'nome.required' => 'O campo nome é obrigatorio.',
        'nome.min' => 'O campo nome deve conter mais de 3 caracteres.',
        
        'id.required' => 'O campo id é obrigatorio.',
        'id.numeric' => 'O campo id deve ser numerico',
        'id.exists' => 'O campo id informado não existe',

        'sigla.required' => 'O campo sigla é obrigatorio.',
        'sigla.min' => 'O campo sigla deve conter mais de 3 caracteres.',

        'duracao.required' => 'O campo duracao é obrigatorio.',
        'duracao.min' => 'O campo duracao deve conter mais de 3 caracteres.',
        'duracao.numeric' => 'O campo duracao deve ser numerico',
        ];
    }
}
