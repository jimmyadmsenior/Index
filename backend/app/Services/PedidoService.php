<?php

namespace App\Services;

use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Support\Facades\Auth;

class PedidoService
{
    public function criarPedido(array $dados): Pedido
    {
        $codigoRastreamento = $this->gerarCodigoRastreamento();
        
        if ($dados['tipo_compra'] === 'carrinho') {
            return $this->criarPedidoCarrinho($dados, $codigoRastreamento);
        }
        
        return $this->criarPedidoIndividual($dados, $codigoRastreamento);
    }

    private function gerarCodigoRastreamento(): string
    {
        return 'BR' . rand(100000000, 999999999) . 'SEDEX';
    }

    private function criarPedidoCarrinho(array $dados, string $codigo): Pedido
    {
        $carrinho = session()->get('carrinho', []);
        $valorTotal = 0;
        $produtos = [];

        foreach ($carrinho as $id => $item) {
            $produto = Produto::find($id);
            if ($produto) {
                $valorTotal += $produto->preco * $item['quantidade'];
                $produtos[] = [
                    'id' => $produto->id,
                    'nome' => $produto->nome,
                    'preco' => $produto->preco,
                    'quantidade' => $item['quantidade'],
                    'subtotal' => $produto->preco * $item['quantidade']
                ];
            }
        }

        $pedido = Pedido::create([
            'user_id' => Auth::id(),
            'codigo_rastreamento' => $codigo,
            'valor_total' => $valorTotal,
            'produtos' => $produtos,
            'status' => 'processando',
            'observacoes' => $this->gerarObservacoesMetodoPagamento($dados)
        ]);

        // Limpa carrinho após criar pedido
        session()->forget('carrinho');

        return $pedido;
    }

    private function criarPedidoIndividual(array $dados, string $codigo): Pedido
    {
        $produto = Produto::findOrFail($dados['produto_id']);

        return Pedido::create([
            'user_id' => Auth::id(),
            'codigo_rastreamento' => $codigo,
            'valor_total' => $produto->preco,
            'produtos' => [[
                'id' => $produto->id,
                'nome' => $produto->nome,
                'preco' => $produto->preco,
                'quantidade' => 1,
                'subtotal' => $produto->preco
            ]],
            'status' => 'processando',
            'observacoes' => $this->gerarObservacoesMetodoPagamento($dados)
        ]);
    }

    private function gerarObservacoesMetodoPagamento(array $dados): string
    {
        $metodo = ucfirst($dados['metodo_pagamento'] ?? 'pix');
        $observacoes = "Método de pagamento: {$metodo}";
        
        if ($metodo === 'Credito' && isset($dados['parcelas'])) {
            $observacoes .= " - {$dados['parcelas']}x";
        }
        
        return $observacoes;
    }
}