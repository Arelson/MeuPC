<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PerfilPC extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Define a relação entre PerfilPC e ChatBot
    public function chatBots()
    {
        return $this->hasMany(ChatBot::class);
    }
}
