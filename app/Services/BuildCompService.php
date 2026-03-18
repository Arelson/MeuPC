<?php

namespace App\Services;

use App\Repositories\BuildCompRepository;
use App\Validators\BuildCompValidator;
use Exception;


class BuildCompService
{
    protected BuildCompRepository $repository;
    protected BuildCompValidator $validator;

    public function __construct(BuildCompRepository $repository, BuildCompValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function create(array $data)
    {
        try {
            $validated = $this->validator->validate($data);
            return $this->repository->create($validated);
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
            throw new Exception('Erro ao deletar componente: ' . $e->getMessage());
        }
    }

    public function update(int $id, array $data)
    {
        try {
            $build = $this->repository->findOrFail($id);
            $validated = $this->validator->validate($data);
            return $this->repository->update($id, $validated);
        } catch (Exception $e) {
            throw new Exception('Erro ao atualizar componente: ' . $e->getMessage());
        }
    }
}