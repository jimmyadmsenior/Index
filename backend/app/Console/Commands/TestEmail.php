<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestEmail extends Command
{
    protected $signature = 'test:email {email}';
    protected $description = 'Teste de envio de email';

    public function handle()
    {
        $email = $this->argument('email');
        
        $this->info('🔧 Configurando SSL para desenvolvimento...');
        
        // Configuração temporária para SSL
        $streamContext = stream_context_create([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ]
        ]);
        
        try {
            $this->info('📧 Tentando enviar email via MailerSend API...');
            
            Mail::raw('Este é um teste de configuração do MailerSend API.', function ($message) use ($email) {
                $message->to($email)
                        ->subject('Teste MailerSend - Configuração');
            });
            
            $this->info('✅ E-mail enviado com sucesso para: ' . $email);
            
        } catch (\Exception $e) {
            $this->error('❌ Erro ao enviar e-mail: ' . $e->getMessage());
            $this->info('🔍 Detalhes do erro para debug:');
            $this->line($e->getTraceAsString());
        }
    }
}