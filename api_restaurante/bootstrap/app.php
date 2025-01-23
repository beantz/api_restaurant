<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )

    ->withMiddleware(function (Middleware $middleware) {
        //definindo globais
        $middleware->use([
            //App\Http\Middleware\AcessLogMiddleware::class,
            //App\Http\Middleware\AutenticacaoMiddleware::class
        ]);

        //definindo apelidos
        $middleware->alias([
            'acesso.log' => App\Http\Middleware\AcessLogMiddleware::class,
            'autenticacao' => App\Http\Middleware\AutenticacaoMiddleware::class
        ]);

        //definindo a grupo especifico como web ou api
        $middleware->web(append:[
            App\Http\Middleware\AcessLogMiddleware::class
        ]);
        
    })
    
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
