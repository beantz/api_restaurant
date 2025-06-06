<?php

namespace App\Http\Controllers;

use App\Models\bebidas;
use App\Models\pedidos;
use App\Models\pedidoTotal;
use App\Models\refeições;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class totalPedido_controller extends Controller
{
    //
    public function principal(Request $request){

        //recuperar o id na url
        $id_pedido = $request->query('pedido');

        //recuperando e passando o obj do pedido total
        $pedido = pedidos::find($id_pedido);

        //retornar nome da refeição
        $comida = refeições::where('nome', $pedido->refeição)->first();
        
        $bebida = bebidas::where('nome', $pedido->bebida)->first();

        //calculando total
        $valorTotal = $comida->preço + $bebida->preço;

        //mandando pro banco
        pedidoTotal::create([
            'nome' => $pedido->nome,
            'refeição_id' => $comida->id,
            'bebida_id' => $bebida->id,
            'total' => $valorTotal
        ]);

        $valorTotalFormatado = number_format($valorTotal, 2, ',', '.');

        //retornando tudo pra view
        return view('totalPedido' , ['nome' => $pedido->nome, 'total' => $valorTotalFormatado, 'bebida' => $bebida->nome, 'comida' => $comida->nome]);

    }
}
