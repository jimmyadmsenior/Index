<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (! $request->expectsJson()) {
            // Debug: log qual rota está sendo acessada
            \Log::info('Authenticate middleware - rota: ' . $request->path());
            
            // Se for uma rota de admin, redireciona para admin login
            if ($request->is('admin/*')) {
                \Log::info('Redirecionando para admin.login');
                return route('admin.login');
            }
            
            // Para outras rotas, redireciona para user login
            \Log::info('Redirecionando para login');
            return route('login');
        }
        
        return null;
    }
}