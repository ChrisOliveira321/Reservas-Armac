<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoordenadorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica se está logado e se é coordenador
        if (!Auth::check() || Auth::user()->role !== 'coordenador') {
            return redirect('/login'); // ou qualquer página de erro
        }

        return $next($request);
    }
}
