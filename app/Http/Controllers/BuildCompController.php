<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BuildCompService;
use App\Validators\BuildCompValidator;
use App\Repositories\BuildCompRepository;
use App\Services\ProdutoService;

class BuildCompController extends Controller
{
    //
    protected $buildCompService;
    protected $buildCompValidator;
    protected $buildCompRepository;
    protected $produtoService;

    public function __construct(BuildCompService $buildCompService, BuildCompValidator $buildCompValidator, BuildCompRepository $buildCompRepository, ProdutoService $produtoService)
    {
        $this->buildCompService = $buildCompService;
        $this->buildCompValidator = $buildCompValidator;
        $this->buildCompRepository = $buildCompRepository;
        $this->produtoService = $produtoService;
    }

    public function index($id)
    {
       //return $this->buildCompService->listar();

       // Obtém os componentes relacionados à build específica usando o repositório
       //return $this->buildCompRepository->findWhere(['build_id' => $id]);

       $comp = $this->buildCompRepository->findWhere(['build_id' => $id]);

       foreach ($comp as $c) {
           $produto = $this->produtoService->obter($c->componente_id); // Carrega o produto relacionado
           $c->produto_nome = $produto->nome; // Adiciona o nome do produto ao componente
           $c->produto_preco = $produto->preco; // Adiciona o preço do produto ao componente
           $c->produto_tipo = $produto->tipo; // Adiciona a descrição do produto ao componente
           $c->subtotal = $produto->preco * $c->quantidade; // Calcula o subtotal para o componente
       }

       return response()->json(
        [
            'build_id' => $id,
            'componentes' => $comp,
            'subtotal' => $comp->sum('subtotal'), // Calcula o subtotal da build somando os subtotais dos componentes
            //'total' => array_sum(array_column($comp->toArray(), 'subtotal')) // Calcula o total da build somando os subtotais dos componentes
        ]
       );

    }

    public function create()
    {
        return $this->buildCompService->listar();
    }   

    public function store(Request $request)
    {
       return $this->buildCompService->create($request->all());
    }

    public function show($id, $componente_id)
    {
        //return $this->buildCompService->obter($id);
        return $this->buildCompRepository->findWhere(['build_id' => $id, 'componente_id' => $componente_id])->first();// esse fist é necessário porque o findWhere retorna uma coleção, mesmo que haja apenas um resultado, então precisamos pegar o primeiro item da coleção para obter o objeto BuildComp correto
    }

    public function edit($id)
    {
        return $this->buildCompService->obter($id);
    }

    public function update(Request $request, $id, $componente_id)
    {
        return $this->buildCompService->update($request->all(), $componente_id);
    }

    public function destroy($id, $componente_id)
    {
        return $this->buildCompService->destroy($componente_id);
    }
}
