<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pedido;

class UpdatePedidoPayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pedido:update-payment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Atualizar dados de pagamento do pedido existente';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $pedido = Pedido::first();
        
        if ($pedido) {
            $pedido->metodo_pagamento = 'pix';
            $pedido->status_pagamento = 'aprovado';
            $pedido->save();
            
            $this->info("Pedido #{$pedido->id} atualizado:");
            $this->line("- Método de pagamento: {$pedido->metodo_pagamento}");
            $this->line("- Status de pagamento: {$pedido->status_pagamento}");
        } else {
            $this->error('Nenhum pedido encontrado!');
        }
    }
}
