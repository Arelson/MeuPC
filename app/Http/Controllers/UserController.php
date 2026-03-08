<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use App\Services\UserServiice;
use App\Validators\UserValidator;

class UserController extends Controller
{
    protected $UserService;
    protected $UserValidator;

    public function __construct(UserService $userService, UserValidator $userValidator)
    {
        $this->UserService = $userService;
        $this->UserValidator = $userValidator;
    }

    public function index()
    {
        return $this->UserService->getAllUsers();
    }

    public function create()
    {
        return $this->UserService->getAllUsers();
    }

    public function store(Request $request)
    {
        return $this->UserService->createUser($request->all());
    }

    public function show($id)
    {
        return $this->UserService->getUserById($id);
    }

    public function edit($id)
    {
        return $this->UserService->getUserById($id);
    }

    public function update(Request $request, $id)
    {
        return $this->UserService->updateUser($this->UserService->getUserById($id), $request->all());
    }

    public function destroy($id)
    {
        return $this->UserService->deleteUser($id);
    }
}
