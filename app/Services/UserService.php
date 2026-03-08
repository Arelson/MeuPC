<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepositoryEloquentRepository;
use App\Validators\UserValidator;
use Illuminate\Support\Facades\Hash;
use Prettus\Validator\Exceptions\ValidatorException;

class UserService
{
    public function __construct(
        private UserRepositoryEloquentRepository $repository,
        private UserValidator $validator
    ) {}

    public function createUser(array $data): User
    {
        try {
            $this->validator->validateCreate($data);

            return $this->repository->create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        } catch (ValidatorException $e) {
            throw $e;
        }
    }

    Public function getAllUsers()
    {
        return $this->repository->all();
    }

    public function getUserById($id): User
    {
        return $this->repository->find($id);
    }

    public function deleteUser($id): void
    {
        $this->repository->delete($id);
    }
    
    public function updateUser(User $user, array $data): User
    {
        try {
            $this->validator->validateUpdate($data);

            $this->repository->update($user->id, [
                'name' => $data['name'] ?? $user->name,
                'email' => $data['email'] ?? $user->email,
                'password' => isset($data['password']) ? Hash::make($data['password']) : $user->password,
            ]);

            return $this->repository->findById($user->id);
        } catch (ValidatorException $e) {
            throw $e;
        }
    }
}
