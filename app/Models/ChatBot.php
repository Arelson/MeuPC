<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;  

class ChatBot extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'user_id',
        'perfil_pc_id',
        'dados_chat',
        'custo_total',
        'data_criacao',
        'data_finalizacao',
        'build_gerada_id',
    ];

    protected $casts = [
        'dados_chat' => 'array', // Converte o campo dados_chat para um array automaticamente
        'data_criacao' => 'datetime',
        'data_finalizacao' => 'datetime',
        'custo_total' => 'decimal:2',
    ];

    // Define a relação entre ChatBot e User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Define a relação entre ChatBot e PerfilPC
    public function perfilPC()
    {
        return $this->belongsTo(PerfilPC::class);
    }
    // Define a relação entre ChatBot e Build (build gerada)
    public function buildGerada()
    {
        return $this->belongsTo(Build::class, 'build_gerada_id');
    }
}
