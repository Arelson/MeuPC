<?php

namespace App\Services;

use App\Repositories\BuildRepositoryRepository;
use App\Validators\BuildValidator;
use Exception;


class BuildService
{
    protected BuildRepositoryRepository $repository;
    protected BuildValidator $validator;

    public function __construct(BuildRepositoryRepository $repository, BuildValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function create(array $data)
    {
        try {
            $validated = $this->validator->with($data)->passesOrFail('create'); //Usando os metodos de validação do Prettus para validar os dados antes de criar a build
            return $this->repository->create($data);
        } catch (Exception $e) {
            throw new Exception('Erro ao criar build: ' . $e->getMessage());
        }
    }

    public function listar()
    {
        return $this->repository->all();
    }
    
    public function obter(int $id)
    {
        try {
            return $this->repository->findOrFail($id);
        } catch (Exception $e) {
            throw new Exception('Build não encontrada: ' . $e->getMessage());
        }
    }

    public function destroy(int $id)
    {
        try {
            $this->repository->delete($id);
            return true;
        } catch (Exception $e) {
            throw new Exception('Erro ao deletar build: ' . $e->getMessage());
        }
    }

    public function update(int $id, array $data)
    {
        try {
            $build = $this->repository->findOrFail($id);
            $validated = $this->validator->with($data)->passesOrFail('update');
            return $this->repository->update($data, $id);
        } catch (Exception $e) {
            throw new Exception('Erro ao atualizar build: ' . $e->getMessage());
        }
    }
}