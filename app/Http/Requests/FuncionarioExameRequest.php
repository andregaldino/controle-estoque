<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FuncionarioExameRequest extends Request
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
                    'id'       => 'required|numeric|exists:funcionarios',
                    'data'       => 'required|date_format:d/m/Y',
                    'exames'       => 'required|exists:exames,id'
                ];
                break;
            }
            case 'PUT':
                break;
            case 'PATCH':
                break;
            default:
            break;
        }

    }

    public function messages(){
        return [
        'data.required' => 'O campo data é obrigatorio.',
        'data.date_format' => 'O campo data deve ser : DIA/MES/ANO',
        
        'id.required' => 'O campo id é obrigatorio.',
        'id.numeric' => 'O campo id deve ser numerico',
        'id.exists' => 'O campo id informado não existe',

        'exames.required' => 'O campo exame é obrigatorio.',
        'exames.exists' => 'O campo exame informado não existe',
        ];
    }
}
