<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produto;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $produtoEspecifico = [
            [
                'tipo' => 'processador',
                'nome' => 'Intel Core i9-13900K',
                'preco' => 599.99,
                'TDP' => 125,
                'descricao' => 'O Intel Core i9-13900K é um processador de última geração da Intel, projetado para oferecer desempenho excepcional em jogos e tarefas intensivas. Com 24 núcleos e 32 threads, ele é capaz de lidar com multitarefas pesadas e oferecer uma experiência de jogo suave. Seu TDP de 125W garante eficiência energética, enquanto a arquitetura avançada proporciona velocidades de clock impressionantes. Ideal para entusiastas de PC e gamers que buscam o melhor desempenho possível.'
            ],
            [
                'tipo' => 'placa-mãe',
                'nome' => 'ASUS ROG Strix Z690-E',
                'preco' => 399.99,
                'TDP' => 125,
                'descricao' => 'A placa-mãe ASUS ROG Strix Z690-E é uma placa-mãe de alto desempenho da ASUS, projetada para suportar os processadores mais recentes da Intel. Com suporte para memória DDR4 de alta velocidade e conectividade PCIe 4.0, ela oferece uma base sólida para um sistema de computador de ponta.'
            ]
        ];
        
        Produto::truncate(); // Limpa a tabela antes de inserir novos dados
        // Esse foreach percorre o array $produtoEspecifico e cria um registro no banco de dados para cada produto usando o método create() do modelo Produto. 
        // O método create() é uma forma conveniente de inserir dados no banco de dados, pois ele aceita um array associativo onde as chaves correspondem aos nomes das colunas na tabela do banco de dados.
        // $produtoEspecifico as $produto é a sintaxe do foreach, onde $produtoEspecifico é o array que contém os produtos específicos e $produto é a variável que representa cada item individualmente durante a iteração.
        foreach ($produtoEspecifico as $produto) {
            Produto::create($produto);
        }
        
        Produto::factory()->count(200)->create();
        
    }
}
