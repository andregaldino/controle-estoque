<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EPIRequest extends Request
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
                    'medida'       => 'required',
                    'categoria'       => 'required|exists:categorias,id',
                    'min'       => 'numeric',
                    'ca'       => 'numeric',
                ];
                break;
            }
            case 'PUT':
                return [
                    'id'       => 'required|numeric|exists:produtos',
                    'nome'       => 'required|min:3',
                    'medida'       => 'required',
                    'categoria'       => 'required|exists:categorias,id',
                    'ca'       => 'numeric',
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

            'medida.required' => 'O campo tamanho é obrigatorio.',

            'categoria.required' => 'O campo categoria é obrigatorio.',
            'categoria.exists' => 'O campo categoria informado não existe',          

            'min.numeric' => 'O campo minimo para lembrete deve ser numerico',
            'ca.numeric' => 'O campo CA deve ser numerico',
        ];
    }
}
