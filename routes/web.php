<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\VendasController;
use Illuminate\Support\Facades\Route;


Route::get('/', function() {
    return view('index');
});

Route::prefix('dashboard')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    // Cadastro Create
});

// Produtos
Route::prefix('produtos')->group(function() {
    Route::get('/', [ProdutosController::class, 'index'])->name('produto.index');
    // Cadastro Create
    Route::get('/cadastrarProduto', [ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produto');
    Route::post('/cadastrarProduto', [ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produto');
    // Atualiza Update
    Route::get('/atualizarProduto/{id}', [ProdutosController::class, 'atualizarProduto'])->name('atualizar.produto');
    Route::put('/atualizarProduto/{id}', [ProdutosController::class, 'atualizarProduto'])->name('atualizar.produto');
    // Deleta Delete
    Route::delete('/delete', [ProdutosController::class, 'delete'])->name('produto.delete');
});

// Clientes
Route::prefix('clientes')->group(function() {
    Route::get('/', [ClientesController::class, 'index'])->name('cliente.index');
    // Cadastro Create
    Route::get('/cadastrarCliente', [ClientesController::class, 'cadastrarCliente'])->name('cadastrar.cliente');
    Route::post('/cadastrarCliente', [ClientesController::class, 'cadastrarCliente'])->name('cadastrar.cliente');
    // Atualiza Update
    Route::get('/atualizarCliente/{id}', [ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');
    Route::put('/atualizarCliente/{id}', [ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');
    // Deleta Delete
    Route::delete('/delete', [ClientesController::class, 'delete'])->name('cliente.delete');
});

// Vendas
Route::prefix('vendas')->group(function() {
    Route::get('/', [VendasController::class, 'index'])->name('venda.index');
    // Cadastro Create
    Route::get('/cadastrarVenda', [VendasController::class, 'cadastrarVenda'])->name('cadastrar.venda');
    Route::post('/cadastrarVenda', [VendasController::class, 'cadastrarVenda'])->name('cadastrar.venda');
    // Caso necessário atualizar venda antes de Entregue!
    // // Atualiza Update
    // Route::get('/atualizarVenda/{id}', [VendasController::class, 'atualizarVenda'])->name('atualizar.venda');
    // Route::put('/atualizarVenda/{id}', [VendasController::class, 'atualizarVenda'])->name('atualizar.venda');
    // // Deleta Delete
    // Route::delete('/delete', [VendasController::class, 'delete'])->name('venda.delete');

    Route::get('/enviaComprovantePorEmail/{id}', [VendasController::class, 'enviaComprovantePorEmail'])->name('enviaComprovantePorEmail.venda');
});
