<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $userEspecifico = [
            [
                'name' => 'Arlison Gaspar',
                'email' => 'arlison.gaspar@example.com',
                'password' => bcrypt('password')
            ]
        ];
        
        User::truncate(); // Limpa a tabela antes de inserir novos dados
        foreach ($userEspecifico as $user) {
            User::create($user);
        }

        User::factory()->count(50)->create();
    }
}
