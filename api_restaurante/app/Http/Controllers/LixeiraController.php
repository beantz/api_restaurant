<?php

namespace App\Http\Controllers;

use App\Models\bebidas;
use App\Models\Cliente;
use App\Models\pedidos;
use App\Models\pedidoTotal;
use App\Models\refeições;
use Illuminate\Http\Request;

class LixeiraController extends Controller
{
    //retornar dados deletados
    public function dataDeletes(Request $request) {

        $msg = $request->input('msg');

        if($msg == 1) {
            $msg = 'tipo de dado inválido';
        }

        if($msg == 2) {
            $msg = 'Dado excluido com sucesso';
        }

        if($msg == 3) {
            $msg = 'Dado restaurado com sucesso';
        }

        $clientesDeletados = Cliente::onlyTrashed()->get();
        $bebidasDeletados = bebidas::onlyTrashed()->get();
        $refeicoesDeletados = refeições::onlyTrashed()->get();

        return view('site.adm.dados-deletados', ['clientesDeletados' => $clientesDeletados, 
                                            'bebidasDeletados' => $bebidasDeletados, 
                                            'refeicoesDeletados' => $refeicoesDeletados, 'msg' => $msg]);

    }

    public function destroy($id, $type) {

        $id_int = (int)$id;
        //identificar o tipo de dado a ser excluido
        if($type == 'clientes') {

            $cliente = Cliente::withTrashed()->where('id', $id_int)->first();

            //excluir automaticamente todos os pedidos q esse cliente fez
            pedidos::where('cliente_id', $cliente->id)->delete();

            Cliente::withTrashed()->find($id)->forceDelete();

        } elseif ($type == 'bebidas') {

            $bebida = bebidas::withTrashed()->where('id', $id)->first();

            //excluir automaticamente todos os pedidos q essa bebida está incluida fez
            pedidoTotal::where('bebida_id', $bebida->id)->delete();

            bebidas::withTrashed()->find($id)->forceDelete();

        } elseif ($type == 'refeições') {
            refeições::withTrashed()->find($id)->forceDelete();
            
        } else {
            return redirect()->route('dados.deletados', ['msg' => 1]);
        }

        return redirect()->route('dados.deletados', ['msg' => 2]);

    }

    public function restore($id, $type) {

        if($type == 'clientes') {

            //restaurar dado excluido
            Cliente::withTrashed()->find($id)->restore();

        } elseif ($type == 'bebidas') {

            bebidas::withTrashed()->find($id)->restore();

        } elseif ($type == 'refeições') {

            refeições::withTrashed()->find($id)->restore();
            
        } else {
            return redirect()->route('dados.deletados', ['msg' => 1]);
        }

        return redirect()->route('dados.deletados', ['msg' => 3]);

    }
}
