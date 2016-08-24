<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SaidaRequest extends Request
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
        if($this->has('max'))
            $max = $this->input('max');
        switch($this->method())
        {
            case 'GET':
                break;
            case 'DELETE':
                break;
            case 'POST':
            {
                return [
                    'id'       => 'required|numeric|exists:produtos',
                    'funcionario'       => 'required|numeric|exists:funcionarios,id',
                    'data'       => 'required|date_format:d/m/Y',
                    'qntd'       => 'required|numeric|max:'.$max,
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

        'funcionario.required' => 'O campo funcionario é obrigatorio.',
        'funcionario.numeric' => 'O campo funcionario deve ser numerico',
        'funcionario.exists' => 'O campo funcionario informado não existe',


        'qntd.required' => 'O campo quantidade é obrigatorio.',
        'qntd.min' => 'O campo quantidade deve conter no minimo 1 unidade.',
        'qntd.numeric' => 'O campo quantidade deve ser numerico',
        'qntd.max' => 'Quantidade no estoque indisponivel'
        ];
    }
}
