<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Build;
Use App\Models\Produto;
Use App\Models\BuildComp;

class BuildCompSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pegando todos os builds e produtos para criar as relações
        $buids = Build::all();
        $produtos = Produto::all();
        
        // Vrificando se existem builds e produtos para evitar erros
        if($buids->isEmpty() || $produtos->isEmpty()) {
            $this->command->info('Nenhum build ou produto encontrado. Certifique-se de rodar os seeders de Build e Produto primeiro.');
            return;
        }

        BuildComp::truncate(); // Limpa a tabela antes de inserir novos dados

        foreach ($buids as $build) {
            // Criando de 1 a 3 componentes para cada build
            $numComponents = rand(6, 8);

            // Selecionando produtos aleatórios para compor o build, unindo a quantidade de componentes com a quantidade de produtos disponíveis
            // sem repetir produtos para o mesmo build
            $produtosSelecionados = $produtos->random(min($numComponents, $produtos->count()));
            // Criando as relações entre o build e os componentes selecionados
            foreach ($produtosSelecionados as $produto) {
                BuildComp::create([
                    'build_id' => $build->id,
                    'componente_id' => $produto->id,
                    'quantidade' => in_array($produto->tipo, ['memória-ram', 'cooler']) ? rand(1, 2) : rand(1, 5), // Quantidade aleatória entre 1 e 5
                ]);
            }
        }
    }

}
