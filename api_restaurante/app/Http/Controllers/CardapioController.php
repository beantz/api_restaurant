<?php

namespace App\Http\Controllers;

use App\Models\bebidas;
use App\Models\refeições;
use Illuminate\Http\Request;

class CardapioController extends Controller
{
    public function index() {

        /*metodo withTrashed necessario pois estou usando o softDeletes*/
        $bebidas = bebidas::withTrashed()->whereNull('deleted_at')->simplePaginate(3);

        $refeições = refeições::withTrashed()->whereNull('deleted_at')->simplePaginate(3);

        $msg = 'Bem vindo de volta adm!';

        return view('site.adm.cardapio-index', ['bebidas' => $bebidas, 'refeições' => $refeições, 'msg' => $msg]);
        
    }

    public function create($tipo) {

        return view('site.adm.criar-cardapio', ['tipo' => $tipo]);

    }

    public function store(Request $request, $tipo) {

        if($tipo == 'refeição') {

            refeições::create($request->except(['deleted_at']));
            
        } elseif ($tipo == 'bebida') {
            
            bebidas::create($request->except(['deleted_at']));
        }

        return redirect()->route('adm.cardapio', ['msg' => 'Dado inserido com sucesso!']);

    }

    public function editar($id, $tipo) {

        $data = '';

        if($tipo == 'refeição') {

            $data = refeições::find($id);
            
        } elseif ($tipo == 'bebida') {
            
            $data = bebidas::find($id);
        }

        //retornar a view com os dados pra serem atualizados
        return view('site.adm.editar-cardapio', ['data' => $data, 'tipo' => $tipo]);

    }

    public function update(Request $request, $tipo) {

        $data = '';

        if($tipo == 'refeição') {

            $data = refeições::find($request->id);
            
        } elseif ($tipo == 'bebida') {
            
            $data = bebidas::find($request->id);
        }

        $data->update($request->all());

        return redirect()->route('adm.cardapio', ['msg' => 'Dado Atualizado com sucesso!']);
        
    }

    public function destroy($id, $tipo) {

        if($tipo == 'refeição') {

            refeições::withTrashed()->find($id)->delete();
            
        } elseif ($tipo == 'bebida') {
            
            bebidas::withTrashed()->find($id)->delete();
        }

        $msg = 'Dado Deletado com sucesso!';

        return redirect()->route('adm.cardapio', ['msg' => $msg]);

    }
}
