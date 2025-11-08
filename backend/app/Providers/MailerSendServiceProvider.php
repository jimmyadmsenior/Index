<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MailerSend\LaravelDriver\MailerSendTransport;
use GuzzleHttp\Client;

class MailerSendServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // Modifica a configuração do Guzzle para o MailerSend
        $this->app->resolving(MailerSendTransport::class, function ($transport) {
            // Força o uso de configuração SSL desabilitada
            if (config('app.env') === 'local') {
                $this->configurarGuzzleParaSSL();
            }
        });
    }
    
    private function configurarGuzzleParaSSL()
    {
        // Define configurações globais do Guzzle para ignorar SSL
        $defaultConfig = [
            'verify' => false,
            'curl' => [
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_TIMEOUT => 60,
            ]
        ];
        
        // Aplica configurações globalmente para este request
        $_ENV['GUZZLE_CURL_OPTIONS'] = json_encode([
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
        ]);
    }
}