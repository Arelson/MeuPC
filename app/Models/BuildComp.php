<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BuildComp extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'build_id',
        'componente_id',
        'quantidade',
    ];

    // Define a relação entre BuildComp e Build
    public function build()
    {
        return $this->belongsTo(Build::class);
    }
    // Define a relação entre BuildComp e Produto
    public function produto()
    {
        return $this->belongsTo(Produto::class, 'componente_id');//ter cuidado com o nome da chave estrangeira, deve ser o mesmo que o nome do campo na tabela build_comps   
    }
}
