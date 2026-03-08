<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BuildController;
use App\Http\Controllers\ProdutoController;

Route::get('/', function () {
    return view('welcome');
});

// Rotas para Users
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

// Rotas para Builds
Route::get('/builds', [BuildController::class, 'index']);
Route::get('/builds/{id}', [BuildController::class, 'show']);
Route::post('/builds', [BuildController::class, 'store']);
Route::delete('/builds/{id}', [BuildController::class, 'destroy']);

// Rotas para Produtos
Route::get('/produtos', [ProdutoController::class, 'index']);
Route::get('/produtos/{id}', [ProdutoController::class, 'show']);
Route::post('/produtos', [ProdutoController::class, 'store']);
Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy']);
