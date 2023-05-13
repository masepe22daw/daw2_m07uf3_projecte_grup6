<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GestorDirectorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && ( $request->user()->Tipus == 'director')) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Acceso denegado.');
    }
}

