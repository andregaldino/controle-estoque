<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequestLogin extends Request
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
                    'email'       => 'required|min:3',
                    'password'       => 'required|min:6'
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
            'email.required' => 'O campo email é obrigatorio.',
            'email.min' => 'O campo email deve conter mais de 3 caracteres.',
            
            'password.required' => 'O campo password é obrigatorio.',
            'password.min' => 'O campo password deve conter mais de 6 caracteres.',
        ];
    }
}
