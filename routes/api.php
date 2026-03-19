<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BuildController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\BuildCompController;

// Rota para obter os componentes de uma build específica
Route::get('/builds/{id}/components', [BuildCompController::class, 'index']);
// Rota para criar um novo componente para uma build específica
Route::post('/builds/{id}/components', [BuildCompController::class, 'store']);
// Rota para exibir um componente específico de uma build
Route::get('/builds/{id}/components/{componente_id}', [BuildCompController::class, 'show']);
// Rota para editar um componente específico de uma build
Route::put('/builds/{id}/components/{componente_id}', [BuildCompController::class, 'update']);
// Rota para excluir um componente específico de uma build
Route::delete('/builds/{id}/components/{componente_id}', [BuildCompController::class, 'destroy']);


// Rotas para API para evitar a certificação CSRF
// Cria todas as rotas CRUD para os recursos User, Build e Produto
Route::apiResource('users', UserController::class);
Route::apiResource('builds', BuildController::class);
Route::apiResource('produtos', ProdutoController::class);



