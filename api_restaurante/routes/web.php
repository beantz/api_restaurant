<?php

use App\Http\Controllers\CardapioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\IngredientesController;
use App\Http\Controllers\LixeiraController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\RefeiçõesIngredientesController;
use App\Http\Controllers\TotalPedidoController;
use Illuminate\Support\Facades\Route;

/* middleware global vem primeiro e depois o especifico na rota */
Route::middleware('acesso.log:nome')->get('/pedidos', [PedidosController::class, 'pedidos'])->name('pedidos.index');
Route::post('/pedidos', [PedidosController::class, 'salvar'])->name('pedidos.salvar');
Route::get('/totalpedido/{desconto?}', [TotalPedidoController::class, 'principal'])->name('pedido.total');
Route::get('/login', [LoginController::class, 'index'])->name('login.get');
Route::post('/login', [LoginController::class, 'salvar'])->name('login.post');
Route::get('/sair', [LoginController::class, 'sair'])->name('login.sair');

//clientes(vai poder se cadastrar, editar o proprio perfil, se excluir e fazer pedidos)
Route::resource('/cliente', ClienteController::class);

/*rotas para adm (permitir excluir pedidos )*/
Route::middleware('autenticacao')->prefix('/adm')->group( function() {

    Route::get('/', [PedidosController::class, 'indexAdm'])->name('adm.index');

    Route::get('/pedidos', [PedidosController::class, 'todosPedidos'])->name('adm.pedidos');
    Route::get('/pedidos/editar/{id}', [PedidosController::class, 'editar'])->name('editar.pedido');
    Route::post('/pedidos/editar/pedido', [PedidosController::class, 'update'])->name('atualizar.pedido');
    Route::get('/pedidos/deletar', [PedidosController::class, 'deletar'])->name('deletar.pedido');

    Route::resource('/refeiçãoIngredientes', RefeiçõesIngredientesController::class);
    Route::resource('/ingredientes', IngredientesController::class);

    Route::get('/pedidos/pesquisar', [PedidosController::class, 'pesquisarPedidos'])->name('pesquisar.pedidos');
    Route::get('/pedidos/listar', [PedidosController::class, 'listar'])->name('pegar.pedidos');
    
    Route::get('/cardapio', [CardapioController::class, 'index'])->name('adm.cardapio');
    Route::get('/cardapio/criar/{tipo}', [CardapioController::class, 'create'])->name('criar.cardapio');
    Route::post('/cardapio/criar/{tipo}', [CardapioController::class, 'store'])->name('create.cardapio');
    Route::get('/cardapio/editar/{id}/{tipo}', [CardapioController::class, 'editar'])->name('editar.cardapio');
    Route::post('/cardapio/editar/{tipo}', [CardapioController::class, 'update'])->name('atualizar.cardapio');
    Route::get('/cardapio/delete/{id}/{tipo}', [CardapioController::class, 'destroy'])->name('delete.cardapio');

    //lixeira
    Route::get('/lixeira', [LixeiraController::class, 'dataDeletes'])->name('dados.deletados');
    Route::get('/lixeira/restaurar/{id}/{type}', [LixeiraController::class, 'restore'])->name('dados.restaurar');
    Route::delete('/lixeira/deletar/{id}/{type}', [LixeiraController::class, 'destroy'])->name('dados.deletar');

});
