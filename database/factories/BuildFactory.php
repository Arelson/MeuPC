<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Build>
 */
class BuildFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id' => User::inRandomOrder()->first()->id ?? 1, // Atribui um user_id aleatório de um usuário existente
            'nome' => $this->faker->sentence(3), // Gera um nome aleatório para o build
            'Orcamento' => $this->faker->randomFloat(2, 100, 10000), // Gera um orçamento aleatório entre 100 e 10000
            'descricao' => $this->faker->sentence(15), // Gera uma descrição aleatória para o build

        ];
    }
}
