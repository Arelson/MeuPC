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
            'build_id' => \App\Models\Build::factory(),
            'componente_id' => \App\Models\Produto::factory(),
            'quantidade' => $this->faker->numberBetween(1, 5),
        ];
    }
}
