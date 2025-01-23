<?php

namespace App\Http\Middleware;

use App\Models\Log;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AcessLogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();

        Log::create([
            'ip' => $ip,
            'rota' => $rota
        ]);

        return $next($request);
    }
}
