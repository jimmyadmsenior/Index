<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SecurePayment
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifica se o usuário está autenticado
        if (!Auth::check()) {
            Log::warning('Tentativa de acesso a pagamento sem autenticação', [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'url' => $request->url()
            ]);

            return redirect()->route('user.login')
                ->with('error', 'Você precisa estar logado para realizar pagamentos.');
        }

        // Verifica se há produtos no carrinho ou produto específico
        if ($this->isCarrinhoPayment($request) && !$this->hasCarrinho()) {
            return redirect()->route('carrinho.index')
                ->with('error', 'Carrinho vazio. Adicione produtos antes de continuar.');
        }

        // Log de tentativa de pagamento
        Log::info('Acesso a página de pagamento', [
            'user_id' => Auth::id(),
            'ip' => $request->ip(),
            'metodo' => $request->input('metodo_pagamento'),
            'tipo_compra' => $request->input('tipo_compra')
        ]);

        return $next($request);
    }

    private function isCarrinhoPayment(Request $request): bool
    {
        return $request->input('tipo_compra') === 'carrinho' || 
               $request->route()->getName() === 'carrinho.pagamento';
    }

    private function hasCarrinho(): bool
    {
        $carrinho = session()->get('carrinho', []);
        return !empty($carrinho);
    }
}