<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class BuildValidator.
 *
 * @package namespace App\Validators;
 */
class BuildCompValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'build_id|required',
            'componente_id|required',
            'quantidade|required|integer|min:1',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'build_id|required',
            'componente_id|required',
            'quantidade|required|integer|min:1',
        ],

    ];

    protected $messages = [
        'build_id.required' => 'O campo build é obrigatório.',
        'componente_id.required' => 'O campo componente é obrigatório.',
        'quantidade.required' => 'O campo quantidade é obrigatório.',
    ];

    protected $attributes = [
        'build_id' => 'build',
        'componente_id' => 'componente',
        'quantidade' => 'quantidade',
    ];
}
