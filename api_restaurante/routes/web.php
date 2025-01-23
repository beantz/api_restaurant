<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\TotalPedidoController;
use Illuminate\Support\Facades\Route;

/* middleware global vem primeiro e depois o especifico na rota */
Route::middleware('acesso.log:nome')->get('/pedidos', [PedidosController::class, 'pedidos'])->name('pedidos.index');
Route::post('/pedidos', [PedidosController::class, 'salvar'])->name('pedidos.salvar');
Route::get('/totalpedido', [TotalPedidoController::class, 'principal'])->name('pedido.total');
Route::get('/login', [LoginController::class, 'index'])->name('login.get');
Route::post('/login', [LoginController::class, 'salvar'])->name('login.post');
Route::get('/sair', [LoginController::class, 'sair'])->name('login.sair');

/*rotas para adm (permitir excluir pedidos )*/
Route::middleware('autenticacao')->prefix('/adm')->group( function() {

    Route::get('/', [PedidosController::class, 'indexAdm'])->name('adm.index');
    Route::get('/pedidos', [PedidosController::class, 'todosPedidos'])->name('adm.pedidos');
    /*fazer esses dois ainda*/
    Route::get('/cardapio', [PedidosController::class, 'cardapio'])->name('adm.cardapio');
    Route::get('/clientes', [PedidosController::class, 'clientes'])->name('adm.clientes');

    /*ajeitar essas duas rotas aqui de modo que fique os dois metodos nas mesmas rotas*/
    Route::get('/pedidos/editar/{id}', [PedidosController::class, 'editar'])->name('editar.pedido');
    Route::post('/pedidos/editar/pedido', [PedidosController::class, 'update'])->name('atualizar.pedido');

    Route::get('/pedidos/deletar', [PedidosController::class, 'deletar'])->name('deletar.pedido');

});
