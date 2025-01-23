<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /* vai verificar se dados de email e senha existem no banco e inserir na superglobao session */
        session_start();
        
        if(isset($_SESSION['email']) && $_SESSION['email'] != ''){

            return $next($request);

        } else {

            return redirect()->route('login.get', ['erro' => 2]);

        }

    }
}
