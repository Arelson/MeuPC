<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PerfilPC;

class PerfilPCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    protected $perfis = [
        [
            'nome' => 'Gamer',
            'descricao' => 'Perfil voltado para jogos, com foco em desempenho gráfico e processador potente.',
        ],
        [
            'nome' => 'Edição de Vídeo',
            'descricao' => 'Perfil ideal para edição de vídeos, com ênfase em processadores multi-core e placas de vídeo robustas.',
        ],
        [
            'nome' => 'Uso Geral',
            'descricao' => 'Perfil para uso cotidiano, como navegação na internet, trabalho de escritório e consumo de mídia.',
        ],
        [
            'nome' => 'Estação de Trabalho',
            'descricao' => 'Perfil para profissionais que precisam de alto desempenho para tarefas como modelagem 3D, CAD e simulações.',
         ],
         [
            'nome' => 'Home Theater PC (HTPC)',
            'descricao' => 'Perfil para computadores voltados para entretenimento doméstico, com foco em reprodução de mídia e baixo consumo de energia.',
        ],
        [
            'nome' => 'Servidor',
            'descricao' => 'Perfil para servidores domésticos ou empresariais, com ênfase em estabilidade, armazenamento e capacidade de rede.',
        ],
        [
            'nome' => 'Custo-Benefício',
            'descricao' => 'Perfil para usuários que buscam um equilíbrio entre desempenho e preço, ideal para tarefas diárias e jogos casuais.',
        ],
        [
            'nome' => 'Entusiasta',
            'descricao' => 'Perfil para usuários que desejam o máximo desempenho possível, com componentes de ponta e overclocking.',
        ],
    ];

    public function run(): void
    {
        //
        PerfilPC::truncate(); // Limpa a tabela antes de inserir novos dados

        foreach ($this->perfis as $perfil) {
            PerfilPC::updateOrCreate(
                ['nome' => $perfil['nome']], // Verifica se já existe um perfil com o mesmo nome
                ['descricao' => $perfil['descricao']] // Atualiza a descrição se o perfil já existir
            );
        }
    }
}
