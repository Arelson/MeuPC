<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tipo = [
            'processador',
            'placa-mãe', 
            'memória-ram',
            'placa-de-vídeo',
            'armazenamento',
            'fonte',
            'gabinete',
            'cooler'
            ];

        $nomePorTipo = [
            'processador' => ['Intel Core i9-13900K', 'AMD Ryzen 9 7950X', 'Intel Core i7-13700K', 'AMD Ryzen 7 7700X'],
            'placa-mãe' => ['ASUS ROG Strix Z690-E', 'MSI MPG B550 Gaming Edge', 'Gigabyte Aorus X570 Master', 'ASUS TUF Gaming B660M-PLUS'],
            'memória-ram' => ['Corsair Vengeance LPX 16GB (2x8GB) DDR4-3200', 'G.Skill Trident Z RGB 32GB (2x16GB) DDR4-3600', 'Kingston HyperX Fury 16GB (2x8GB) DDR4-2666', 'Crucial Ballistix 32GB (2x16GB) DDR4-3000'],
            'placa-de-vídeo' => ['NVIDIA GeForce RTX 4090', 'AMD Radeon RX 7900 XTX', 'NVIDIA GeForce RTX 4080', 'AMD Radeon RX 7800 XT'],
            'armazenamento' => ['Samsung 970 EVO Plus 1TB NVMe SSD', 'Western Digital Blue 2TB HDD', 'Crucial MX500 500GB SATA SSD', 'Seagate Barracuda 4TB HDD'],
            'fonte' => ['Corsair RM850x 850W 80 Plus Gold', 'EVGA SuperNOVA 750 G5, 80 Plus Gold 750W', 'Seasonic Focus GX-650, 80 Plus Gold, 650W', 'Cooler Master MWE Gold 650 V2, 80 Plus Gold, 650W'],
            'gabinete' => ['NZXT H510 Elite', 'Corsair iCUE 4000X RGB', 'Fractal Design Meshify C', 'Phanteks Eclipse P400A Digital'],
            'cooler' => ['Noctua NH-D15 chromax.black, Cooler de Ar com Dual Fan', 'Corsair iCUE H150i Elite Capellix, Cooler Líquido All-in-One de 360mm RGB', 'be quiet! Dark Rock Pro 4, Cooler de Ar com Dual Fan', 'NZXT Kraken X63, Cooler Líquido All-in-One de 280mm RGB']
        ];
        // inicializa o tipo do produto com um valor aleatório do array $tipo
        $tipoEscolhido = $this->faker->randomElement($tipo);

        // Depois, verifica se existem nomes para o tipo escolhido e 
        // seleciona um nome aleatório correspondente. 
        // Se não houver nomes definidos para o tipo, gera um nome genérico usando $this->faker->word()
        // o isset() é usado para verificar se a chave existe no array $nomePorTipo, evitando erros caso o tipo escolhido não tenha um array de nomes definido.
        if(isset($nomePorTipo[$tipoEscolhido])) {
            $nomeEscolhido = $this->faker->randomElement($nomePorTipo[$tipoEscolhido]);
        } else {
            $nomeEscolhido = $this->faker->word();
        }
        return [
            //
            'tipo' => $tipoEscolhido,
            'nome' => $nomeEscolhido,
            'preco' => $this->faker->randomFloat(2, 100, 5000), // Gera um preço aleatório entre 100 e 5000 com 2 casas decimais
            'TDP' => $this->faker->optional(0.6)->numberBetween(50, 350), // Gera um TDP aleatório entre 50 e 350
            'descricao' => $this->faker->paragraph() // Gera uma descrição aleatória

        ];
    }
}
