<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class LoginController extends Controller
{
    public function index(Request $request) {
       
        $erro = $request->get('erro');

        if($erro == 1){
            $erro = 'Usuario não está cadastrado';
        } elseif ($erro == 2) {
            $erro = 'Precisa estar autenticado para acessar está rota';
        }

        return view('site.login', ['erro' => $erro]);

    }

    public function salvar(Request $request) {

        $regras = [
            'email' => 'email',
            'senha' => 'required'
        ];

        $feedbacks = [
            'email.email' => 'O e-email precisa estar no formato correto',
            'senha.required' => 'O campo senha está vazio'
        ];

        $request->validate($regras, $feedbacks);

        $email = $request->get('email');
        $senha = $request->get('senha');

        $usuario = User::where('email', $email)->where('password', $senha)->get()->first();

        if(isset($usuario)) {

            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;

            return redirect()->route('adm.index');

        } else {

            return redirect()->route('login.get', ['erro' => 1]);

        }

    }

    public function sair() {

        session_start();
        session_destroy();

        return redirect()->route('pedidos.index');

    }
}
