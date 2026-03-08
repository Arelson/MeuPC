<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PerfilPC>
 */
class PerfilPCFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         $perfis = [
            'Gamer' => 'Para jogos de alto desempenho',
            'Profissional' => 'Para trabalho com edição de vídeo, 3D e renderização',
            'Estudante' => 'Para estudos e tarefas básicas',
            'Home Office' => 'Para trabalho remoto e produtividade',
            'Entusiasta' => 'Para usuários que buscam o máximo desempenho',
            'Custo-Benefício' => 'Melhor performance pelo menor preço',
            'Servidor' => 'Para hospedagem e serviços 24/7',
            'HTPC' => 'Para home theater e mídia',
        ];
        // Gerar um nome de perfil único a partir dos perfis definidos
        $nome = $this->faker->unique()->randomElement(array_keys($perfis));

        return [
            //
            'nome' => $nome,
            'descricao' => $perfis[$nome] ?? $this->faker->sentence(), // Se o nome do perfil não estiver no array, gera uma descrição aleatória
            // o ?? é um operador de coalescência nula que retorna a descrição do perfil se existir, ou uma frase aleatória caso contrário.


        ];
    }
}
