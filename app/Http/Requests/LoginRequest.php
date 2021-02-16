<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(){ //tem que ser esse nome
        //retornando as regras
        return [
            'text_usuario' => ['required', 'email'],
            'text_senha' => ['required', 'min:3', 'max:20']
        ];
    }

    public function messages(){ //tem que ser esse nome
        //retornando as senhas
        return [
            'text_usuario.required' => 'o usuario é de preenchimento obrigatorio',
            'text_usuario.email' => 'o usuario tem que ser um email válido',
            'text_senha.required' => 'senha é obrigatoria',
            'text_senha.min' => ' A senha tem que ter no mínimo :min caracteres',
            'text_senha.max' => ' A senha tem que ter no maximo :max caracteres'
        ];
    }
}
