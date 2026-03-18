<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produto extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        'tipo',
        'nome',
        'preco',
        'TDP',
        'descricao',
    ];
    // Define os casts para garantir que os tipos de dados sejam corretamente interpretados
    protected $casts = [
        'preco' => 'decimal:2',
        'TDP' => 'integer',
    ];

    // Define a relação entre Produto e BuildComp
    public function buildComps()
    {
        return $this->hasMany(BuildComp::class, 'componente_id');//ter cuidado com o nome da chave estrangeira, deve ser o mesmo que o nome do campo na tabela build_comps
    }

    public function builds()
    {
        return $this->belongsToMany(Build::class, 'build_comps', 'componente_id', 'build_id')
                    ->withPivot('quantidade');
    }
}
