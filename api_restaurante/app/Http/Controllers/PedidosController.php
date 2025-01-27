<?php

namespace App\Http\Controllers;

use App\Models\pedidos;
use App\Models\bebidas;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Models\pagamento;
use App\Models\refeições;

class PedidosController extends Controller
{
    
    public function pedidos(Request $request){

        $bebidas = bebidas::all();
        
        $refeições = refeições::all();

        $pagamento = pagamento::all();

        $msg = $request->query('msg');

        return view('site.pedidos', ['pagamento' => $pagamento, 'bebidas' => $bebidas, 'refeições' => $refeições, 'msg' => $msg]);

    }

    /* pegar dados do input e salvar */
    public function salvar(Request $request){

        $request->validate([

            'nome' => 'required|min:5',
            'refeição' => 'required|min:5',
            'bebida' => 'required|min:5',
            'pagamento_id' => 'required'

        ],
        [
            'required' => 'Insira o(a) :attribute por favor',
            'min' => 'Os dados precisam ter no mínimo 10 caracteres'
        ]
    
        );

        $nameRequest = $request->nome;
        
        //verificar se cliente ja ta cadastrado
        $existClient = Cliente::where('nome', 'like', "%$nameRequest%")->first();
        
        $desconto = false;

        if($existClient) {
            
            //verificar se cliente possui cupons
            if($existClient->cupons == "amida") {

                $desconto = true;
            
            }

            $totalPedido = pedidos::create([
                'nome' => $request->nome,
                'refeição' => $request->refeição,
                'bebida' => $request->bebida,
                'pagamento_id' => $request->pagamento_id,
                'id_cliente' => $existClient->id,
            ]);

            return redirect()->route('pedido.total', ['pedido' => $totalPedido, 'desconto' => $desconto]);

        } else {

            //fazer processo de cadastramento do cliente
            

        }

    }

    /*view para adm*/
    public function indexAdm() {

        return view('site.adm.index');

    }

    public function todosPedidos() {

        //pegar todos os pedidos
        $pedidos = pedidos::paginate(7);

        //return dd($pedidos);
        return view('site.adm.pedidos', ['pedidos' => $pedidos]);

    }

    public function editar(Request $request, $id) {

        $pedidoAnterior = pedidos::where('id', $id)->first();

        $pagamento = pagamento::all();

        return view('site.adm.editar', ['pagamento' => $pagamento, 'pedidoAnterior' => $pedidoAnterior]);

    }

    public function update(Request $request) {

        pedidos::find($request->input('id'))->update($request->all());

        return redirect()->route('adm.pedidos');

    }

    public function deletar(Request $request) {

        pedidos::find($request->id)->delete();

        return redirect()->route('adm.pedidos', ['msg' => 'Produdo deletado com sucesso.']);

    }

}