<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\ChatBot;
use App\Models\BuildComp;

class Build extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nome',
        'Orcamento',
        'descricao',
    ];

    protected $casts = [
        'Orcamento' => 'decimal:2',
        'data_criacao' => 'datetime',
    ];

    // Define a relação entre Build e User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chatBot()
    {
        return $this->hasOne(ChatBot::class, 'build_gerada_id');
    }

    public function componentes()
    {
        return $this->hasMany(BuildComp::class, 'build_id');
    }

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'build_comps', 'build_id', 'componente_id')
                    ->withPivot('quantidade');
    }
}
