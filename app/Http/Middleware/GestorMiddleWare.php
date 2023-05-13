<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GestorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && ($request->user()->Tipus == 'gestor' || $request->user()->Tipus == 'director')) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Acceso denegado.');
    }
}

