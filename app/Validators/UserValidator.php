<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class UserValidator.
 *
 * @package namespace App\Validators;
 */
class UserValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */

    // Regras de validação para criação e atualização de usuários
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required', // O campo nome é obrigatório
            'email' => 'required|email|unique:users', // O email deve ser único na tabela users
            'password' => 'required|min:6', // A senha deve conter no mínimo 6 caracteres
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,{id}', // O email deve ser único na tabela users
            'password' => 'nullable|min:6', // A senha deve conter no mínimo 6 caracteres
        ],
    ];

    // Mensagens de erro personalizadas para as regras de validação
    protected $messages = [
        'name.required' => 'O campo nome é obrigatório.',
        'email.required' => 'O campo email é obrigatório.',
        'email.email' => 'O campo email deve ser um endereço de email válido.',
        'email.unique' => 'O email já está em uso.',
        'password.required' => 'O campo senha é obrigatório.',
        'password.min' => 'A senha deve conter no mínimo 6 caracteres.',
    ];

    // Atributos personalizados para os campos de validação
    protected $attributes = [
        'name' => 'nome',
        'email' => 'email',
        'password' => 'senha',
    ];
}
