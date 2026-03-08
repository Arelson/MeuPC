<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BuildController;
use App\Http\Controllers\ProdutoController;

// Rotas para API para evitar a certificação CSRF
// Cria todas as rotas CRUD para os recursos User, Build e Produto
Route::apiResource('users', UserController::class);
Route::apiResource('builds', BuildController::class);
Route::apiResource('produtos', ProdutoController::class);
