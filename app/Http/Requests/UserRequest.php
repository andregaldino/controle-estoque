<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
                    'email'       => 'required|min:3|unique:users,email',
                    'first_name'       => 'required|min:3',
                    'last_name'       => 'required|min:3',
                    'password'       => 'required|min:6|confirmed'
                    'password_confirmation'       => 'required|min:6'
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
            'email.unique' => 'O email informado ja esta em uso.',


            'first_name.required' => 'O campo Primeiro Nome é obrigatorio.',
            'first_name.min' => 'O campo Primeiro Nome deve conter mais de 3 caracteres.',

            'last_name.required' => 'O campo Ultimo Nome é obrigatorio.',
            'last_name.min' => 'O campo Ultimo Nome deve conter mais de 3 caracteres.',
            
            'password.required' => 'O campo password é obrigatorio.',
            'password.min' => 'O campo password deve conter mais de 3 caracteres.',
            'password.confirmed' => 'Os campos password e password confirm não são iguais.',

            'password_confirmation.required' => 'O campo password confirmation é obrigatorio.',
            'password_confirmation.min' => 'O campo password confirmation deve conter mais de 3 caracteres.',
        ];
    }
}
