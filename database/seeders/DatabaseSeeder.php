<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Importa a facade DB para executar comandos SQL

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // Desativa as verificações de chave estrangeira
        // Aqui você pode chamar outros seeders para popular o banco de dados com dados iniciais. Por exemplo:

        $this->call([
            ProdutoSeeder::class,
            UserSeeder::class,
            PerfilPCSeeder::class,
            BuildSeeder::class,
            BuildCompSeeder::class,
            ChatBotSeeder::class,
        ]);

        //User::factory()->count(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
    }
}
