<?php

namespace App\Http\Controllers;

use App\Models\bebidas;
use App\Models\pedidos;
use App\Models\pedidoTotal;
use App\Models\refeições;
use Illuminate\Http\Request;

class TotalPedidoController extends Controller
{

    public function principal(Request $request, $desconto = false){

        //recuperar o id na url
        $id_pedido = $request->query('pedido');

        //recuperando e passando o obj do pedido total
        $pedido = pedidos::find($id_pedido);

        //retornar nome da refeição
        $comida = refeições::where('nome', $pedido->refeição)->first();
        
        $bebida = bebidas::where('nome', $pedido->bebida)->first();

        if(is_null($comida) || is_null($bebida)){
            return redirect()->route('pedidos.index', ['msg' => 'Itens inválidos. Insira apenas produtos listados no cardápio.']);
        }

        //calculando total
        $valorTotal = $comida->preço + $bebida->preço;

        if($desconto == true){

            $porcentagem = $valorTotal / 100;

            $menos = $porcentagem * 10;

            $valorTotal = $valorTotal - $menos;

        }

        //mandando pro banco
        $pedido = pedidoTotal::create([
            'nome' => $pedido->nome,
            'refeição_id' => $comida->id,
            'bebida_id' => $bebida->id,
            'total' => $valorTotal
        ]);

        $valorTotalFormatado = number_format($valorTotal, 2, ',', '.');

        //retornando tudo pra view
        return view('site.totalPedido' , ['nome' => $pedido->nome, 'total' => $valorTotalFormatado, 'bebida' => $bebida->nome, 'comida' => $comida->nome, 'id' => $pedido->id]);
        
    }
}
