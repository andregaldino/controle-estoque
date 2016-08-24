<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FuncionarioRequest extends Request
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
                    'cpf'       => 'required|min:3|unique:funcionarios,cpf',
                    'empresa'       => 'required|exists:empresas,id',
                    'cargo'       => 'required|exists:cargos,id'
                ];
                break;
            }
            case 'PUT':
                return [
                    'id'       => 'required|numeric|exists:funcionarios',
                    'nome'       => 'required|min:3',
                    'cpf'       => 'required|min:3|unique:funcionarios,cpf',
                    'empresa'       => 'required|exists:empresas,id',
                    'cargo'       => 'required|exists:cargos,id'
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

            'cpf.required' => 'O campo cpf é obrigatorio.',
            'cpf.min' => 'O campo cpf deve conter mais de 3 caracteres.',
            'cpf.unique' => 'O cpf já existe no sistema',


            'empresa.required' => 'O campo empresa é obrigatorio.',
            'empresa.exists' => 'O campo empresa informado não existe',

            'cargo.required' => 'O campo cargo é obrigatorio.',
            'cargo.exists' => 'O campo cargo informado não existe',
        ];
    }
}
