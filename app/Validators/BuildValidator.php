<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class BuildValidator.
 *
 * @package namespace App\Validators;
 */
class BuildValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'nome' => 'required',
            'Orcamento' => 'required',
            'descricao' => 'required',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'nome' => 'required',
            'Orcamento' => 'required',
            'descricao' => 'required',
        ],

    ];

    protected $messages = [
        'nome.required' => 'O campo nome é obrigatório.',
        'Orcamento.required' => 'O campo orçamento é obrigatório.',
        'descricao.required' => 'O campo descrição é obrigatório.',
    ];

    protected $attributes = [
        'nome' => 'nome',
        'Orcamento' => 'orçamento',
        'descricao' => 'descrição',
    ];
}
