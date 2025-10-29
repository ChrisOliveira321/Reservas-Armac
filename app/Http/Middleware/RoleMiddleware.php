<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware {
    
    public function handle(Request $request, Closure $next, ...$roles): Response {
    $user = $request->user();

    if (!$user) {
        return redirect()->route('login');
    }

    // Se o usuário não for admin e também não estiver nos papéis permitidos
    if ($user->role !== 'admin' && !in_array($user->role, $roles)) {
        abort(403, 'Acesso negado');
    }

    return $next($request);
}

}
