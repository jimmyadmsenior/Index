<?php

namespace App\Services;

use App\Models\User;
use App\Models\Pedido;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    private $instanceId;
    private $token;
    private $baseUrl;
    private $timeout;

    public function __construct()
    {
        $this->instanceId = config('ultramsg.instance_id');
        $this->token = config('ultramsg.token');
        $this->baseUrl = config('ultramsg.base_url');
        $this->timeout = config('ultramsg.timeout');
    }

    /**
     * Enviar mensagem de confirmação de compra
     */
    public function enviarConfirmacaoCompra(User $user, Pedido $pedido): bool
    {
        if (!$user->telefone) {
            Log::warning('WhatsApp não enviado: usuário sem telefone', ['user_id' => $user->id]);
            return false;
        }

        try {
            $telefone = $this->formatarTelefone($user->telefone);
            $mensagem = $this->criarMensagemCompra($user, $pedido);

            return $this->enviarMensagem($telefone, $mensagem);

        } catch (\Exception $e) {
            Log::error('Erro ao enviar WhatsApp: ' . $e->getMessage(), [
                'user_id' => $user->id,
                'pedido_id' => $pedido->id
            ]);
            return false;
        }
    }

    /**
     * Formatar número de telefone para padrão internacional UltraMsg
     */
    private function formatarTelefone(string $telefone): string
    {
        // Remove caracteres não numéricos
        $telefone = preg_replace('/[^0-9]/', '', $telefone);

        Log::info('WhatsApp: Formatando telefone', [
            'original' => $telefone,
            'tamanho' => strlen($telefone)
        ]);

        // Se já tem 13 dígitos e começa com 55, está correto
        if (strlen($telefone) === 13 && str_starts_with($telefone, '55')) {
            $telefoneFormatado = $telefone; // UltraMsg sem +
        }
        // Se tem 11 dígitos (DDD + número), adiciona código do país
        elseif (strlen($telefone) === 11) {
            $telefoneFormatado = '55' . $telefone; // UltraMsg sem +
        }
        // Se tem 10 dígitos, adiciona 9 no meio (celulares antigos) + código do país
        elseif (strlen($telefone) === 10) {
            $ddd = substr($telefone, 0, 2);
            $numero = substr($telefone, 2);
            $telefoneFormatado = '55' . $ddd . '9' . $numero; // UltraMsg sem +
        }
        // Se não tem código do país, adiciona
        elseif (!str_starts_with($telefone, '55')) {
            $telefoneFormatado = '55' . $telefone; // UltraMsg sem +
        } else {
            $telefoneFormatado = $telefone; // UltraMsg sem +
        }

        Log::info('WhatsApp: Telefone formatado', [
            'original' => $telefone,
            'formatado' => $telefoneFormatado
        ]);

        return $telefoneFormatado;
    }

    /**
     * Criar mensagem de confirmação de compra
     */
    private function criarMensagemCompra(User $user, Pedido $pedido): string
    {
        $produtos_lista = '';
        foreach ($pedido->produtos as $produto) {
            $produtos_lista .= "• {$produto['nome']} - Qtd: {$produto['quantidade']} - R$ " . number_format($produto['subtotal'], 2, ',', '.') . "\n";
        }

        $mensagem = "🛍️ *Compra Confirmada!*\n\n";
        $mensagem .= "Olá *{$user->name}*!\n\n";
        $mensagem .= "Sua compra foi confirmada com sucesso!\n\n";
        $mensagem .= "*📦 Produtos:*\n{$produtos_lista}\n";
        $mensagem .= "*💰 Total:* R$ " . number_format($pedido->valor_total, 2, ',', '.') . "\n";
        $mensagem .= "*📋 Código de Rastreamento:* {$pedido->codigo_rastreamento}\n";
        $mensagem .= "*📅 Data da Compra:* {$pedido->created_at->format('d/m/Y H:i')}\n\n";
        $mensagem .= "Obrigado por comprar conosco! 🎉";

        return $mensagem;
    }

    /**
     * Enviar mensagem via API UltraMsg
     */
    private function enviarMensagem(string $telefone, string $mensagem): bool
    {
        // URL correta baseada na imagem: https://api.ultramsg.com/instance149213/messages/chat
        $url = "{$this->baseUrl}/instance{$this->instanceId}/messages/chat";

        $data = [
            'token' => $this->token,
            'to' => $telefone,
            'body' => $mensagem,
            'priority' => 1,
            'referenceId' => uniqid()
        ];

        Log::info('WhatsApp: Enviando mensagem', [
            'telefone' => $telefone,
            'url' => $url,
            'token' => substr($this->token, 0, 8) . '...',
            'preview' => substr($mensagem, 0, 50) . '...'
        ]);

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($data),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/x-www-form-urlencoded'
            ],
            CURLOPT_TIMEOUT => $this->timeout,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_FOLLOWLOCATION => true
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);

        Log::info('WhatsApp: Resposta da API', [
            'http_code' => $httpCode,
            'response' => $response,
            'curl_error' => $curlError ?: 'Nenhum'
        ]);

        if ($curlError) {
            Log::error('WhatsApp: Erro cURL', ['error' => $curlError]);
            return false;
        }

        if ($httpCode === 200) {
            $responseData = json_decode($response, true);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                Log::error('WhatsApp: Resposta JSON inválida', ['response' => $response]);
                return false;
            }
            
            // UltraMsg pode retornar diferentes formatos de resposta de sucesso
            if (isset($responseData['sent']) && $responseData['sent'] === true) {
                Log::info('WhatsApp enviado com sucesso (formato 1)', [
                    'telefone' => $telefone,
                    'message_id' => $responseData['id'] ?? 'N/A'
                ]);
                return true;
            }
            
            // Formato alternativo de resposta
            if (isset($responseData['status']) && $responseData['status'] === 'success') {
                Log::info('WhatsApp enviado com sucesso (formato 2)', [
                    'telefone' => $telefone,
                    'response' => $responseData
                ]);
                return true;
            }
            
            // Se chegou aqui mas tem HTTP 200, pode ser sucesso mesmo assim
            Log::info('WhatsApp: HTTP 200 recebido', ['response' => $responseData]);
            return true;
        }

        Log::error('Falha ao enviar WhatsApp', [
            'telefone' => $telefone,
            'http_code' => $httpCode,
            'response' => $response
        ]);

        return false;
    }
}