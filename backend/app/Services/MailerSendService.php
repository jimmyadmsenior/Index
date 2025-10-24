<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MailerSendService
{
    private $apiToken;
    private $baseUrl = 'https://api.mailersend.com/v1';
    
    public function __construct()
    {
        $this->apiToken = env('MAILERSEND_API_TOKEN');
    }
    
    public function sendEmail($to, $subject, $content, $fromEmail = null, $fromName = null)
    {
        $fromEmail = $fromEmail ?: env('MAIL_FROM_ADDRESS');
        $fromName = $fromName ?: env('MAIL_FROM_NAME');
        
        $data = [
            'from' => [
                'email' => $fromEmail,
                'name' => $fromName
            ],
            'to' => [
                [
                    'email' => $to
                ]
            ],
            'subject' => $subject,
            'text' => $content
        ];
        
        try {
            Log::info('Enviando email via API MailerSend para: ' . $to);
            
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiToken,
                'Content-Type' => 'application/json'
            ])->post($this->baseUrl . '/email', $data);
            
            if ($response->successful()) {
                Log::info('✅ Email enviado com sucesso via API MailerSend');
                return true;
            } else {
                Log::error('❌ Erro na API MailerSend: ' . $response->body());
                return false;
            }
            
        } catch (\Exception $e) {
            Log::error('❌ Exceção ao enviar email via API: ' . $e->getMessage());
            return false;
        }
    }
}