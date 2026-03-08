<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProdutoService;
use App\Validators\ProdutoValidator;

class ProdutoController extends Controller
{
    //
    protected $produtoService;
    protected $produtoValidator;

    public function __construct(ProdutoService $produtoService, ProdutoValidator $produtoValidator)
    {
        $this->produtoService = $produtoService;
        $this->produtoValidator = $produtoValidator;
    }

    public function index()
    {
        return $this->produtoService->getAll();
    }

    public function create()
    {
        return $this->produtoService->getAll();
    }

    public function store(Request $request)
    {
        return $this->produtoService->create($request->all());
    }

    public function show($id)
    {
        return $this->produtoService->obter($id);
    }

    public function edit($id)
    {
        return $this->produtoService->obter($id);
    }

    public function update(Request $request, $id)
    {
        return $this->produtoService->update($id, $request->all());
    }

    public function destroy($id)
    {
        return $this->produtoService->delete($id);
    }
}
