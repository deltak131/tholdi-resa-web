<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogHttp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       Log::channel("EchangeClientServeur")
                ->info(
                        [
                            "Adresse IP Ciente"=>$request->getClientIp(),
                            "URL de la requete"=>$request->getRequestUri(),
                            "Method Http"=>$request->getMethod(),
                            "Port"=>$request->getPort(),
                            "Donnee"=>$request->getQueryString()
                        ]
                );
        return $next($request);
    }
}
