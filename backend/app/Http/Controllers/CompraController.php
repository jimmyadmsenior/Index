<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompraFinalizadaMail;
use App\Models\Produto;
use App\Models\Pedido;
use App\Services\PedidoService;
use App\Http\Requests\CompraRequest;

class CompraController extends Controller
{
    protected $pedidoService;

    public function __construct(PedidoService $pedidoService)
    {
        $this->pedidoService = $pedidoService;
    }

    public function finalizar(Request $request)
    {
        // Usar o método legado mais estável por enquanto
        return $this->finalizarLegado($request);
    }

    // Método mantido para compatibilidade
    public function finalizarLegado(Request $request)
    {
        $user = Auth::user();
        $codigoRastreamento = 'BR' . rand(100000000, 999999999) . 'SEDEX';

        // Debug: Log dos dados recebidos
        \Log::info('CompraController finalizar - Dados recebidos:', $request->all());

        // Captura método de pagamento
        $metodoPagamento = $request->input('metodo_pagamento', 'pix');
        
        // Log informações do pagamento
        if (in_array($metodoPagamento, ['credito', 'debito'])) {
            \Log::info('Pagamento com cartão:', [
                'metodo' => $metodoPagamento,
                'nome_cartao' => $request->input('nome_cartao'),
                'numero_cartao_masked' => '****-****-****-' . substr($request->input('numero_cartao', ''), -4),
                'parcelas' => $request->input('parcelas', 1)
            ]);
        }

        // Verifica se é compra do carrinho ou produto individual
        $tipoCompra = $request->input('tipo_compra', 'produto');
        
        \Log::info('CompraController finalizar - Tipo de compra:', ['tipo' => $tipoCompra]);
        
        if ($tipoCompra === 'carrinho') {
            // Compra do carrinho completo
            $carrinho = session()->get('carrinho', []);
            $produtos = $request->input('produtos', []);
            
            if (empty($carrinho) || empty($produtos)) {
                return redirect()->route('carrinho.index')->with('error', 'Carrinho vazio. Adicione produtos antes de finalizar a compra.');
            }
            
            // Pega o primeiro produto para o e-mail (ou você pode modificar o mail para múltiplos produtos)
            $primeiroProdutoId = array_key_first($carrinho);
            $produto = Produto::find($primeiroProdutoId);
            
            if (!$produto) {
                return redirect()->route('carrinho.index')->with('error', 'Produto não encontrado.');
            }
            
            // Calcula valor total
            $valorTotal = 0;
            foreach ($carrinho as $id => $item) {
                $prod = Produto::find($id);
                if ($prod) {
                    $valorTotal += $prod->preco * $item['quantidade'];
                }
            }
            
            // Prepara dados dos produtos para salvar
            $produtosPedido = [];
            foreach ($carrinho as $id => $item) {
                $prod = Produto::find($id);
                if ($prod) {
                    $produtosPedido[] = [
                        'id' => $prod->id,
                        'nome' => $prod->nome,
                        'preco' => $prod->preco,
                        'quantidade' => $item['quantidade'],
                        'subtotal' => $prod->preco * $item['quantidade']
                    ];
                }
            }

            // Salva o pedido no banco de dados PRIMEIRO (antes de tentar enviar email)
            \Log::info('Tentando salvar pedido do carrinho:', [
                'user_id' => $user->id,
                'codigo_rastreamento' => $codigoRastreamento,
                'valor_total' => $valorTotal,
                'produtos_count' => count($produtosPedido)
            ]);
            
            try {
                $observacoes = 'Método de pagamento: ' . ucfirst($metodoPagamento);
                if ($metodoPagamento === 'credito' && $request->input('parcelas')) {
                    $observacoes .= ' - ' . $request->input('parcelas') . 'x';
                }
                
                $pedido = Pedido::create([
                    'user_id' => $user->id,
                    'codigo_rastreamento' => $codigoRastreamento,
                    'valor_total' => $valorTotal,
                    'produtos' => $produtosPedido,
                    'status' => 'processando',
                    'observacoes' => $observacoes
                ]);
                
                \Log::info('Pedido do carrinho salvo com sucesso:', ['pedido_id' => $pedido->id, 'codigo' => $codigoRastreamento]);
                
                // Limpa o carrinho após salvar o pedido
                session()->forget('carrinho');
                
            } catch (\Exception $e) {
                \Log::error('Erro ao salvar pedido:', ['error' => $e->getMessage()]);
                return redirect()->route('carrinho.index')->with('error', 'Erro ao processar pedido. Tente novamente.');
            }
            
            // Envia e-mail de confirmação
            try {
                Mail::to($user->email)->send(new CompraFinalizadaMail($pedido, $codigoRastreamento));
                \Log::info('Email enviado com sucesso para: ' . $user->email . ' - Código: ' . $codigoRastreamento);
            } catch (\Exception $e) {
                \Log::error('Erro ao enviar email (não crítico):', ['error' => $e->getMessage()]);
                // Continua mesmo se o email falhar - pedido já foi salvo
            }
            
        } else {
            // Compra de produto individual
            $produto = Produto::find($request->produto_id);
            if (!$produto) {
                return redirect('/carrinho')->with('error', 'Produto não encontrado. Selecione um produto antes de finalizar a compra.');
            }
            
            // Salva o pedido no banco de dados PRIMEIRO (antes de tentar enviar email)
            \Log::info('Tentando salvar pedido individual:', [
                'user_id' => $user->id,
                'codigo_rastreamento' => $codigoRastreamento,
                'valor_total' => $produto->preco,
                'produto_id' => $produto->id
            ]);
            
            try {
                $observacoes = 'Método de pagamento: ' . ucfirst($metodoPagamento);
                if ($metodoPagamento === 'credito' && $request->input('parcelas')) {
                    $observacoes .= ' - ' . $request->input('parcelas') . 'x';
                }
                
                $pedido = Pedido::create([
                    'user_id' => $user->id,
                    'codigo_rastreamento' => $codigoRastreamento,
                    'valor_total' => $produto->preco,
                    'produtos' => [[
                        'id' => $produto->id,
                        'nome' => $produto->nome,
                        'preco' => $produto->preco,
                        'quantidade' => 1,
                        'subtotal' => $produto->preco
                    ]],
                    'status' => 'processando',
                    'observacoes' => $observacoes
                ]);
                
                \Log::info('Pedido individual salvo com sucesso:', ['pedido_id' => $pedido->id, 'codigo' => $codigoRastreamento]);
                
            } catch (\Exception $e) {
                \Log::error('Erro ao salvar pedido individual:', ['error' => $e->getMessage()]);
                return redirect()->route('produtos.index')->with('error', 'Erro ao processar pedido. Tente novamente.');
            }

            // Envia o e-mail de confirmação
            try {
                Mail::to($user->email)->send(new CompraFinalizadaMail($pedido, $codigoRastreamento));
                \Log::info('Email enviado com sucesso para: ' . $user->email . ' - Código: ' . $codigoRastreamento);
            } catch (\Exception $e) {
                \Log::error('Erro ao enviar email individual (não crítico):', ['error' => $e->getMessage()]);
                // Continua mesmo se o email falhar - pedido já foi salvo
            }
        }

        // Redireciona para a página de compra finalizada
        \Log::info('CompraController finalizar - Redirecionando para compra finalizada');
        
        return redirect()->route('compra.finalizada', ['codigo' => $codigoRastreamento])
                ->with('success', 'Compra realizada com sucesso!');
    }
}