<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckCocinero
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica si está logueado y si tiene un registro en la tabla cocinero
        if (Auth::check() && Auth::user()->cocinero) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Acceso denegado. Área exclusiva de cocina.');
    }
}
