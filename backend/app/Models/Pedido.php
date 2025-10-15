<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Pedido extends Model
{
    protected $fillable = [
        'user_id',
        'codigo_rastreamento',
        'valor_total',
        'produtos',
        'status',
        'data_envio',
        'data_entrega',
        'transportadora',
        'observacoes'
    ];

    protected $casts = [
        'produtos' => 'array',
        'data_envio' => 'datetime',
        'data_entrega' => 'datetime',
        'valor_total' => 'decimal:2'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Simulação de progresso do pedido
    public function getProgressoAttribute()
    {
        $agora = now();
        $criadoEm = $this->created_at;
        
        // Simula progressão baseada no tempo desde a criação
        $horasPassadas = $criadoEm->diffInHours($agora);
        
        if ($horasPassadas < 2) {
            return [
                'status' => 'processando',
                'descricao' => 'Pedido sendo processado',
                'porcentagem' => 25,
                'proxima_atualizacao' => 'Em até 2 horas'
            ];
        } elseif ($horasPassadas < 24) {
            return [
                'status' => 'separacao',
                'descricao' => 'Produtos sendo separados',
                'porcentagem' => 50,
                'proxima_atualizacao' => 'Em até 24 horas'
            ];
        } elseif ($horasPassadas < 72) {
            return [
                'status' => 'transporte',
                'descricao' => 'Em transporte',
                'porcentagem' => 75,
                'proxima_atualizacao' => 'Em até 3 dias'
            ];
        } else {
            return [
                'status' => 'entregue',
                'descricao' => 'Pedido entregue',
                'porcentagem' => 100,
                'proxima_atualizacao' => 'Concluído'
            ];
        }
    }

    // Histórico simulado de eventos
    public function getHistoricoAttribute()
    {
        $criadoEm = $this->created_at;
        $historico = [];

        // Pedido criado
        $historico[] = [
            'data' => $criadoEm,
            'evento' => 'Pedido realizado',
            'descricao' => 'Pedido confirmado e pagamento aprovado',
            'local' => 'São Paulo - SP'
        ];

        // Processamento (2 horas depois)
        if ($criadoEm->diffInHours(now()) >= 2) {
            $historico[] = [
                'data' => $criadoEm->addHours(2),
                'evento' => 'Em separação',
                'descricao' => 'Produtos sendo separados no estoque',
                'local' => 'Centro de Distribuição - SP'
            ];
        }

        // Envio (24 horas depois)
        if ($criadoEm->diffInHours(now()) >= 24) {
            $historico[] = [
                'data' => $criadoEm->addHours(24),
                'evento' => 'Produto despachado',
                'descricao' => 'Saiu para entrega via SEDEX',
                'local' => 'Centro de Distribuição - SP'
            ];
        }

        // Em trânsito (48 horas depois)
        if ($criadoEm->diffInHours(now()) >= 48) {
            $historico[] = [
                'data' => $criadoEm->addHours(48),
                'evento' => 'Em trânsito',
                'descricao' => 'Objeto em trânsito para cidade de destino',
                'local' => 'Centro de Distribuição - RJ'
            ];
        }

        // Entregue (72 horas depois)
        if ($criadoEm->diffInHours(now()) >= 72) {
            $historico[] = [
                'data' => $criadoEm->addHours(72),
                'evento' => 'Entregue',
                'descricao' => 'Objeto entregue ao destinatário',
                'local' => 'Endereço de entrega'
            ];
        }

        return collect($historico)->sortByDesc('data')->values()->all();
    }
}
