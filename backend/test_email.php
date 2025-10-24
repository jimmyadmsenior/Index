<?php

require_once 'vendor/autoload.php';

use Illuminate\Support\Facades\Mail;

// Configurar o ambiente Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

try {
    echo "Testando envio de email...\n";
    
    Mail::raw('Este é um teste de email do MailerSend!', function($message) {
        $message->to('jimmycastilho555@gmail.com')
            ->subject('Teste MailerSend - Laravel')
            ->from('jimmycastilho555@gmail.com', 'Index');
    });
    
    echo "✅ Email enviado com sucesso!\n";
    
} catch (Exception $e) {
    echo "❌ Erro ao enviar email: " . $e->getMessage() . "\n";
    echo "Stack trace: " . $e->getTraceAsString() . "\n";
}