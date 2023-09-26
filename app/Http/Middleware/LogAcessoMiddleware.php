<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       // return $next($request);
      $ip = $request->ip();
      $rota = $request->getRequestUri();
     
     LogAcesso::create(['log' => "IP $ip requsitou a rota $rota"]);

     return $next($request);

     
     }
}
