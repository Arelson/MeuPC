<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BuildCompService;
use App\Validators\BuildCompValidator;
use App\Repositories\BuildCompRepository;

class BuildCompController extends Controller
{
    //
    protected $buildCompService;
    protected $buildCompValidator;
    protected $buildCompRepository;

    public function __construct(BuildCompService $buildCompService, BuildCompValidator $buildCompValidator, BuildCompRepository $buildCompRepository)
    {
        $this->buildCompService = $buildCompService;
        $this->buildCompValidator = $buildCompValidator;
        $this->buildCompRepository = $buildCompRepository;
    }

    public function index($id)
    {
       //return $this->buildCompService->listar();

       // Obtém os componentes relacionados à build específica usando o repositório
       return $this->buildCompRepository->findWhere(['build_id' => $id]);

    }

    public function create()
    {
        return $this->buildCompService->listar();
    }   

    public function store(Request $request)
    {
       return $this->buildCompService->create($request->all());
    }

    public function show($id)
    {
        return $this->buildCompService->obter($id);
    }

    public function edit($id)
    {
        return $this->buildCompService->obter($id);
    }

    public function update(Request $request, $id)
    {
        return $this->buildCompService->update($id, $request->all());
    }

    public function destroy($id)
    {
        return $this->buildCompService->destroy($id);
    }
}
