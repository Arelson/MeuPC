<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BuildCompFactory extends Factory
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
            'build_id' => \App\Models\Build::inRandomOrder()->first()->id ?? \App\Models\Build::factory(), // Seleciona uma build aleatória ou cria uma nova se não houver builds
            'componente_id' => \App\Models\Produto::inRandomOrder()->first()->id ?? \App\Models\Produto::factory(), // Seleciona um produto aleatório ou cria um novo se não houver produtos
            'quantidade' => $this->faker->numberBetween(1, 5),
        ];
    }
}
