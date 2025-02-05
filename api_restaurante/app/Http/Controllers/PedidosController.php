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

        $clientes = Cliente::all();

        $msg = $request->query('msg');

        return view('site.pedidos', ['pagamento' => $pagamento, 'bebidas' => $bebidas, 'refeições' => $refeições, 'msg' => $msg, 'clientes' => $clientes]);

    }

    /* pegar dados do input e salvar */
    public function salvar(Request $request){

        $request->validate([

            'refeição' => 'required|min:5',
            'bebida' => 'required|min:5',
            'pagamento_id' => 'required',
            'cliente_id' => 'exists:clientes,id|required'

        ],
        [
            'required' => 'Insira o(a) :attribute por favor',
            'min' => 'Os dados precisam ter no mínimo 10 caracteres',
            'cliente_id.exists' => 'Você precisa inserir dados do cliente'
        ]);
        
        //verificar se cliente ja ta cadastrado
        $cliente = Cliente::where('id', $request->cliente_id)->first();
        
        $desconto = false;

        if($cliente) {

            //verificar se cliente possui cupons
            if($cliente->cupons == "amida") {

                $desconto = true;
            
            }

            $totalPedido = pedidos::create([
                'cliente_id' => $cliente->id,
                'refeição' => $request->refeição,
                'bebida' => $request->bebida,
                'pagamento_id' => $request->pagamento_id,
            ]);

            //atualizando a coluna de quantidade de pedidos sozinha no banco
            $cliente->quantidade_pedidos++;
            $cliente->update(['quantidade_pedidos' => $cliente->quantidade_pedidos]);

            return redirect()->route('pedido.total', ['pedido' => $totalPedido, 'desconto' => $desconto]);

        } else {

            //redirecionar para formulario de cliente se cadastrar
            return redirect()->route('cliente.create', ['msg' => 1]);
            
        }

    }

    /*view para adm*/
    public function indexAdm() {

        return view('site.adm.index');

    }

    public function todosPedidos() {

        //pegar todos os pedidos
        $pedidos = pedidos::with(['cliente', 'pagamento'])->paginate(7);

        //return dd($pedidos);
        return view('site.adm.pedidos', ['pedidos' => $pedidos]);

    }

    public function editar($id) {

        $pedidoAnterior = pedidos::where('id', $id)->first();

        $pagamento = pagamento::all();

        $clientes = Cliente::all();

        return view('site.adm.editar', ['pagamento' => $pagamento, 'pedidoAnterior' => $pedidoAnterior, 'clientes' => $clientes]);

    }

    public function update(Request $request) {

        pedidos::find($request->input('id'))->update($request->all());

        return redirect()->route('adm.pedidos');

    }

    public function deletar(Request $request) {

        pedidos::find($request->id)->delete();

        return redirect()->route('adm.pedidos', ['msg' => 'Produdo deletado com sucesso.']);

    }

    //retornar view para pesquisar
    public function pesquisarPedidos() {

        return view('site.pesquisar');

    }

    public function listar(Request $request) {

        $pedidos = pedidos::where('refeição', 'like' , $request->input('search').'%')->paginate(4);

        //retornar pedidos para uma rota get
        return view('site.listar-pedidos', ['pedidos' => $pedidos, 'request' => $request->all()]);

    }
    
}