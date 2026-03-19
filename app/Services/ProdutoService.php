<?php

namespace App\Services;

use App\Repositories\ProdutoRepositoryRepository;
use App\Validators\ProdutoValidator;
use Exception;


class ProdutoService
{
    protected $repository;
    protected $validator;

    public function __construct(ProdutoRepositoryRepository $repository, ProdutoValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function create(array $data)
    {
        try {
            $this->validator->with($data)->passesOrFail('create');
            return $this->repository->create($data);
        } catch (Exception $e) {
            throw new Exception('Erro ao criar produto: ' . $e->getMessage());
        }
    }

    public function getAll()
    {
        return $this->repository->all();
    }

    public function obter(int $id)
    {
        $produto = $this->repository->find($id);
        
        if (!$produto) {
            throw new Exception('Produto não encontrado');
        }
        
        return $produto;
    }

    public function delete(int $id)
    {
        try {
            $produto = $this->repository->find($id);
            
            if (!$produto) {
                throw new Exception('Produto não encontrado');
            }
            
            return $this->repository->delete($id);
        } catch (Exception $e) {
            throw new Exception('Erro ao deletar produto: ' . $e->getMessage());
        }
    }

    public function update(int $id, array $data)
    {
        try {
            $this->validator->with($data)->passesOrFail('update');
            $produto = $this->repository->find($id);
            
            if (!$produto) {
                throw new Exception('Produto não encontrado');
            }
            
            return $this->repository->update($data, $id);
        } catch (Exception $e) {
            throw new Exception('Erro ao atualizar produto: ' . $e->getMessage());
        }
    }
}