<?php

namespace App\Observers;

use App\Models\Pedido;
use Illuminate\Support\Facades\Log;

class PedidoObserver
{
    /**
     * Handle the Pedido "created" event.
     */
    public function created(Pedido $pedido): void
    {
        Log::info('Novo pedido criado', [
            'pedido_id' => $pedido->id,
            'user_id' => $pedido->user_id,
            'codigo_rastreamento' => $pedido->codigo_rastreamento,
            'valor_total' => $pedido->valor_total,
            'status' => $pedido->status,
            'created_at' => $pedido->created_at,
            'ip' => request()?->ip(),
            'user_agent' => request()?->userAgent()
        ]);
    }

    /**
     * Handle the Pedido "updating" event.
     */
    public function updating(Pedido $pedido): void
    {
        $changes = $pedido->getDirty();
        
        if (!empty($changes)) {
            Log::info('Pedido sendo atualizado', [
                'pedido_id' => $pedido->id,
                'codigo_rastreamento' => $pedido->codigo_rastreamento,
                'changes' => $changes,
                'original' => $pedido->getOriginal(),
                'updated_by' => auth()?->id(),
                'updated_at' => now()
            ]);
        }
    }

    /**
     * Handle the Pedido "updated" event.
     */
    public function updated(Pedido $pedido): void
    {
        // Notificação específica para mudanças de status
        if ($pedido->wasChanged('status')) {
            Log::info('Status do pedido alterado', [
                'pedido_id' => $pedido->id,
                'codigo_rastreamento' => $pedido->codigo_rastreamento,
                'status_anterior' => $pedido->getOriginal('status'),
                'status_atual' => $pedido->status,
                'user_id' => $pedido->user_id
            ]);

            // Aqui você pode adicionar notificações para o usuário
            // Exemplo: enviar e-mail de atualização de status
        }
    }

    /**
     * Handle the Pedido "deleted" event.
     */
    public function deleted(Pedido $pedido): void
    {
        Log::warning('Pedido deletado', [
            'pedido_id' => $pedido->id,
            'codigo_rastreamento' => $pedido->codigo_rastreamento,
            'valor_total' => $pedido->valor_total,
            'deleted_by' => auth()?->id(),
            'deleted_at' => now()
        ]);
    }
}