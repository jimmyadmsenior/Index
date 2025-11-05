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
        \Log::info('CompraController finalizar - INICIADO');
        
        $user = Auth::user();
        \Log::info('CompraController finalizar - Usuario:', ['user_id' => $user ? $user->id : 'null']);

        // Debug: Log dos dados recebidos
        \Log::info('CompraController finalizar - Dados recebidos:', $request->all());

        try {
            // Validação básica
            $request->validate([
                'tipo_compra' => 'required|in:produto,carrinho',
                'metodo_pagamento' => 'nullable|string',
                'produto_id' => 'required_if:tipo_compra,produto|exists:produtos,id',
                'produtos' => 'required_if:tipo_compra,carrinho|array',
                'total' => 'required_if:tipo_compra,carrinho|numeric|min:0'
            ]);
            \Log::info('CompraController finalizar - Validação passou');

        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('CompraController finalizar - Erro de validação:', [
                'errors' => $e->errors(),
                'data' => $request->all()
            ]);
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        try {
            \Log::info('CompraController finalizar - Criando pedido');
            // Cria o pedido usando o service
            $pedido = $this->pedidoService->criarPedido($request->all());
            \Log::info('CompraController finalizar - Pedido criado:', ['codigo' => $pedido->codigo_rastreamento]);

            // Envia e-mail de confirmação
            try {
                Mail::to($user->email)->send(new CompraFinalizadaMail($user, $pedido));
                \Log::info('CompraController finalizar - Email enviado');
            } catch (\Exception $mailError) {
                \Log::warning('CompraController finalizar - Erro ao enviar email:', ['error' => $mailError->getMessage()]);
            }
            
            // Envia WhatsApp se o usuário tiver telefone cadastrado
            $this->enviarWhatsApp($user, $pedido);

            \Log::info('CompraController finalizar - Redirecionando para compra finalizada');
            return redirect()->route('compra.finalizada', ['codigo' => $pedido->codigo_rastreamento])
                ->with('success', 'Compra realizada com sucesso!');

        } catch (\Exception $e) {
            \Log::error('Erro ao processar compra:', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->with('error', 'Erro ao processar sua compra. Tente novamente.')
                ->withInput();
        }
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
            
            // Envia e-mail (desabilitado temporariamente por problemas de rede)
            try {
                // TEMPORÁRIO: Comentado devido a bloqueio de porta SMTP
                // Mail::to($user->email)->send(new CompraFinalizadaMail($produto, $codigoRastreamento));
                \Log::info('Email seria enviado para: ' . $user->email . ' - Código: ' . $codigoRastreamento);
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

            // Envia o e-mail (desabilitado temporariamente por problemas de rede)
            try {
                // TEMPORÁRIO: Comentado devido a bloqueio de porta SMTP
                // Mail::to($user->email)->send(new CompraFinalizadaMail($produto, $codigoRastreamento));
                \Log::info('Email seria enviado para: ' . $user->email . ' - Código: ' . $codigoRastreamento);
            } catch (\Exception $e) {
                \Log::error('Erro ao enviar email individual (não crítico):', ['error' => $e->getMessage()]);
                // Continua mesmo se o email falhar - pedido já foi salvo
            }
        }

        // Redireciona para a página de compra finalizada
        \Log::info('CompraController finalizar - Redirecionando para compra finalizada');
        
        // Passa o código de rastreamento via sessão para mostrar na tela
        session(['codigo_rastreamento' => $codigoRastreamento, 'email_usuario' => $user->email]);
        
    }
    
    /**
     * Envia notificação via WhatsApp usando n8n
     */
    private function enviarWhatsApp($user, $pedido)
    {
        \Log::info('=== INICIANDO ENVIO WHATSAPP ===', [
            'user_id' => $user->id,
            'telefone' => $user->telefone,
            'codigo_pedido' => $pedido->codigo_rastreamento
        ]);

        // Verifica se o usuário tem telefone cadastrado
        if (!$user->telefone) {
            \Log::error('WhatsApp não enviado: usuário sem telefone cadastrado', ['user_id' => $user->id]);
            return;
        }

        try {
            $webhook_url = 'https://jimmyadmpleno.app.n8n.cloud/webhook/purchase-confirmation';
            \Log::info('WhatsApp - URL do webhook:', ['url' => $webhook_url]);
            
            $data = [
                'nome' => $user->name,
                'telefone' => $user->telefone,
                'codigo_rastreamento' => $pedido->codigo_rastreamento,
                'valor_total' => $pedido->valor_total,
                'data_compra' => $pedido->created_at->format('d/m/Y H:i')
            ];
            \Log::info('WhatsApp - Dados a serem enviados:', $data);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $webhook_url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Content-Length: ' . strlen(json_encode($data))
            ]);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);

            \Log::info('WhatsApp - Enviando requisição...');
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $curlError = curl_error($ch);
            curl_close($ch);

            \Log::info('WhatsApp - Resposta recebida:', [
                'http_code' => $httpCode,
                'response' => $response,
                'curl_error' => $curlError
            ]);

            if ($httpCode === 200) {
                \Log::info('=== WhatsApp enviado com sucesso ===', ['user_id' => $user->id, 'telefone' => $user->telefone]);
            } else {
                \Log::error('=== ERRO ao enviar WhatsApp ===', [
                    'http_code' => $httpCode, 
                    'response' => $response,
                    'curl_error' => $curlError
                ]);
            }

        } catch (\Exception $e) {
            \Log::error('Exceção ao enviar WhatsApp: ' . $e->getMessage());
        }
    }
}