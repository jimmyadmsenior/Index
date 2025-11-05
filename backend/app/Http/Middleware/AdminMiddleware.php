<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('user.login');
        }

        // Verificar se o usuário é admin (você pode ajustar esta lógica)
        // Por exemplo, verificar se o email é do admin ou se tem um campo is_admin
        $adminEmails = ['admin@exemplo.com', 'jimmyadmsenior@gmail.com'];
        
        if (!in_array(Auth::user()->email, $adminEmails)) {
            abort(403, 'Acesso não autorizado.');
        }

        return $next($request);
    }
}