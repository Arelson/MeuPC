<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ProdutoValidator.
 *
 * @package namespace App\Validators;
 */
class ProdutoValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */

    /*protected $tiposPermitidos =[
        'processador',
        'placa-mãe',
        'memória-ram',
        'placa-de-vídeo',
        'armazenamento',
        'fonte',
        'gabinete',
        'cooler'
    ];*/

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required|numeric',
            'quantidade' => 'required|integer',
            'tipo' => 'required|in:processador,placa-mãe,memória-ram,placa-de-vídeo,armazenamento,fonte,gabinete,cooler',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required|numeric',
            'quantidade' => 'required|integer',
            'tipo' => 'required|in:processador,placa-mãe,memória-ram,placa-de-vídeo,armazenamento,fonte,gabinete,cooler',
            
        ],
    ];

    protected $messages = [
        'nome.required' => 'O campo nome é obrigatório.',
        'descricao.required' => 'O campo descrição é obrigatório.',
        'preco.required' => 'O campo preço é obrigatório.',
        'preco.numeric' => 'O campo preço deve ser um número.',
        'quantidade.required' => 'O campo quantidade é obrigatório.',
        'quantidade.integer' => 'O campo quantidade deve ser um número inteiro.',
        'tipo.required' => 'O campo tipo é obrigatório.',
        'tipo.in' => 'O campo tipo deve ser um dos seguintes: processador, placa-mãe, memória RAM, placa de vídeo, armazenamento, fonte, gabinete ou cooler.',
    ];

    protected $attributes = [
        'nome' => 'nome',
        'descricao' => 'descrição',
        'preco' => 'preço',
        'quantidade' => 'quantidade',
        'tipo' => 'tipo',
    ];
  
}
