<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SaidaBuscaRequest extends Request
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
                    'datainicio'       => 'required|date_format:d/m/Y',
                    'datafinal'       => 'required|date_format:d/m/Y|after:datainicio',
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
        'datainicio.required' => 'O campo datai nicio é obrigatorio.',
        'datainicio.date_format' => 'O campo data inicio deve ser : DIA/MES/ANO',

        'datafinal.required' => 'O campo data final é obrigatorio.',
        'datafinal.date_format' => 'O campo data final deve ser : DIA/MES/ANO',
        'datafinal.after'   => 'A data de inicio deve ser menor que a data final'
        ];
    }
}
