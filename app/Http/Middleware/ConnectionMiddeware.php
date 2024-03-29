<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class ConnectionMiddeware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->guest()) {
            Flashy::error('Vous devez être connecté !');
            return redirect('/');
        }
        return $next($request);
    }
}
