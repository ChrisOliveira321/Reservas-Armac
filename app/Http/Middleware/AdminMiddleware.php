<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            abort(403, 'Acesso negado.');
        }

        if (!in_array(Auth::user()->role, ['admin', 'coordenador'])) {
            abort(403, 'Acesso negado.');
        }

        return $next($request);
    }
}

