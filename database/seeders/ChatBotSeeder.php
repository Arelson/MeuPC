<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ChatBot;

class ChatBotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ChatBot::truncate(); // Limpa a tabela antes de inserir novos dados
        // Usuario 1: gamer
        ChatBot::factory()->create([
            'dados_chat' => [
                'finalidade' => 'jogos',
                'nivel_conhecimento' => 'intermediário',
                'prioridade' => 'performance',
                'preferencias' => [
                    'marca_cpu' => 'Intel',
                    'marca_gpu' => 'NVIDIA',
                    'tamanho_ram' => '16GB',
                    'tipo_armazenamento' => 'SSD',
                ],
                'tempo_uso_diario' => '3-4 horas',
                'jogo_alvo' => 'Fortnite',
                'software_alvo' => null,
            ],
        ]);
        
        // Usuario 2: profissional de edição de vídeo
        ChatBot::factory()->create([
            'dados_chat' => [
                'finalidade' => 'edição de vídeo',
                'nivel_conhecimento' => 'avançado',
                'prioridade' => 'equilíbrio',
                'preferencias' => [
                    'marca_cpu' => 'AMD',
                    'marca_gpu' => 'NVIDIA',
                    'tamanho_ram' => '32GB',
                    'tipo_armazenamento' => 'NVMe',
                ],
                'tempo_uso_diario' => '5-6 horas',
                'jogo_alvo' => null,
                'software_alvo' => 'Adobe Premiere',
            ],
        ]);
        
        // Usuario 3: programador
        ChatBot::factory()->create([
            'dados_chat' => [
                'finalidade' => 'programação',
                'nivel_conhecimento' => 'iniciante',
                'prioridade' => 'custo',
                'preferencias' => [
                    'marca_cpu' => 'AMD',
                    'marca_gpu' => 'AMD',
                    'tamanho_ram' => '16GB',
                    'tipo_armazenamento' => 'SSD',
                ],
                'tempo_uso_diario' => '1-2 horas',
                'jogo_alvo' => null,
                'software_alvo' => 'Visual Studio',
            ],
        ]);

        // Usuario 4: uso geral
        ChatBot::factory()->create([
            'dados_chat' => [
                'finalidade' => 'uso geral',
                'nivel_conhecimento' => 'intermediário',
                'prioridade' => 'econômico',
                'preferencias' => [
                    'marca_cpu' => 'Intel',
                    'marca_gpu' => 'AMD',
                    'tamanho_ram' => '8GB',
                    'tipo_armazenamento' => 'HDD',
                ],
                'tempo_uso_diario' => '1-2 horas',
                'jogo_alvo' => null,
                'software_alvo' => null,
            ],
        ]);

        ChatBot::factory()->count(20)->create();
    }
}
