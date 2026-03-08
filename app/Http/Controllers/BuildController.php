<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BuildService;
use App\Validators\BuildValidator;

class BuildController extends Controller
{
    //
    protected $buildService;

    public function __construct(BuildService $buildService)
    {
        $this->buildService = $buildService;
    }

    public function index()
    {
       return $this->buildService->listar();
    }

    public function create()
    {
        return $this->buildService->listar();
    }   

    public function store(Request $request)
    {
       return $this->buildService->create($request->all());
    }

    public function show($id)
    {
        return $this->buildService->obter($id);
    }

    public function edit($id)
    {
        return $this->buildService->obter($id);
    }

    public function update(Request $request, $id)
    {
        return $this->buildService->update($id, $request->all());
    }

    public function destroy($id)
    {
        return $this->buildService->destroy($id);
    }
}
