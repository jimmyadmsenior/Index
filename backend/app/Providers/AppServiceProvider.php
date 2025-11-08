<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Pedido;
use App\Observers\PedidoObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Registra observer para auditoria de pedidos
        Pedido::observe(PedidoObserver::class);
        
        // Configura SSL para desenvolvimento local APENAS para este projeto
        if (config('app.env') === 'local') {
            $this->configurarSSLParaDesenvolvimento();
            $this->configurarCurlGlobal();
        }
    }
    
    /**
     * Configura SSL para desenvolvimento local
     */
    private function configurarSSLParaDesenvolvimento()
    {
        // Caminho para o certificado baixado
        $cacertPath = base_path('config/cacert.pem');
        
        if (file_exists($cacertPath)) {
            // Configura cURL para usar o certificado
            ini_set('curl.cainfo', $cacertPath);
            ini_set('openssl.cafile', $cacertPath);
            
            // Define contexto SSL global com certificado
            $contextOptions = [
                "ssl" => [
                    "verify_peer" => true,
                    "verify_peer_name" => true,
                    "allow_self_signed" => false,
                    "cafile" => $cacertPath
                ],
            ];
            
            // Define como contexto padrão
            stream_context_set_default($contextOptions);
            
            // Para Guzzle/HTTP requests em geral
            putenv('SSL_CERT_FILE=' . $cacertPath);
            putenv('SSL_CERT_DIR=');
        }
    }
    
    /**
     * Configura cURL especificamente para ignorar SSL
     */
    private function configurarCurlGlobal()
    {
        // Define opções padrão do cURL para este processo
        if (function_exists('curl_setopt_array')) {
            // Força configurações cURL através de constantes globais
            if (!defined('CURLOPT_SSL_VERIFYPEER_DISABLED')) {
                define('CURLOPT_SSL_VERIFYPEER_DISABLED', true);
                
                // Hook para modificar requests Guzzle
                if (class_exists('\GuzzleHttp\RequestOptions')) {
                    // Define configuração global para Guzzle
                    $_ENV['GUZZLE_HTTP_VERIFY'] = '0';
                    $_SERVER['GUZZLE_HTTP_VERIFY'] = '0';
                    putenv('GUZZLE_HTTP_VERIFY=0');
                }
            }
            
            // Configura cURL global para este processo PHP
            putenv('CURL_SSL_VERIFYPEER=0');
            putenv('CURL_SSL_VERIFYHOST=0');
            
            // Para Windows específicamente
            if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                ini_set('curl.cainfo', '');
                ini_set('openssl.cafile', '');
            }
        }
    }
}
