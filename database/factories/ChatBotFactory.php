<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PerfilPC;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChatBot>
 */
class ChatBotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement(['em_andamento', 'finalizado', 'abandonado']);
        $dataCriacao = $this->faker->dateTimeBetween('-1 month', 'now');

        // Simular dados do chat como um array de mensagens
        $dadosChat = [
            'finalidade' => $this->faker->randomElement(['jogos', 'trabalho', 'edição de vídeo', 'uso geral', 'programação']),
            'nivel_conhecimento' => $this->faker->randomElement(['iniciante', 'intermediário', 'avançado']),
            'prioridade' => $this->faker->randomElement(['performance', 'custo', 'equilíbrio', 'econômico']),
            'preferencias' => [
                'marca_cpu' => $this->faker->randomElement(['Intel', 'AMD']),
                'marca_gpu' => $this->faker->randomElement(['NVIDIA', 'AMD']),
                'tamanho_ram' => $this->faker->randomElement(['8GB', '16GB', '32GB', '64GB']),
                'tipo_armazenamento' => $this->faker->randomElement(['HDD', 'SSD', 'NVMe']),
            ],
            'tempo_uso_diario' => $this->faker->randomElement(['1-2 horas', '3-4 horas', '5-6 horas', 'mais de 6 horas']),
            'jogo_alvo' => $this->faker->randomElement(['Fortnite', 'Call of Duty', 'Minecraft', 'League of Legends', 'Outros']),
            'software_alvo' => $this->faker->randomElement(['Adobe Premiere', 'AutoCAD', 'Visual Studio', 'Outros']),

        ];
        return [
            //
            'user_id' => \App\Models\User::inRandomOrder()->first()->id ?? 1, // Atribui um user_id aleatório de um usuário existente   
            'perfil_pc_id' => PerfilPC::inRandomOrder()->first()->id ?? 1, // Associa um perfil PC aleatório
            'dados_chat' => $dadosChat,
            'custo_total' => $this->faker->randomFloat(2, 1000, 20000), // Custo total aleatório entre 1000 e 10000
            'data_criacao' => $dataCriacao,
            'status' => $status,
            'data_finalizacao' => $status === 'finalizado' ? $this->faker->dateTimeBetween($dataCriacao, 'now') : null, // Data de finalização apenas se o status for finalizado
            'build_gerada_id' => $status === 'finalizado' ? \App\Models\Build::factory() : null, // Relaciona a build gerada apenas se o status for finalizado
        ];
    }
}
