<?php

require_once 'vendor/autoload.php';

use Illuminate\Foundation\Application;
use App\Models\Pedido;

// Bootstrap do Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Verificar pedidos
try {
    $totalPedidos = Pedido::count();
    echo "Total de pedidos na base de dados: " . $totalPedidos . PHP_EOL;
    
    if ($totalPedidos > 0) {
        echo "\nÚltimos 5 pedidos:" . PHP_EOL;
        $pedidos = Pedido::orderBy('created_at', 'desc')->limit(5)->get();
        
        foreach ($pedidos as $pedido) {
            echo "- ID: {$pedido->id}, User: {$pedido->user_id}, Código: {$pedido->codigo_rastreamento}, Data: {$pedido->created_at}" . PHP_EOL;
        }
    } else {
        echo "Nenhum pedido encontrado na base de dados." . PHP_EOL;
    }
    
} catch (Exception $e) {
    echo "Erro ao verificar pedidos: " . $e->getMessage() . PHP_EOL;
}