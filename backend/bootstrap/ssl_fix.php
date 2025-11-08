<?php

// Bootstrap personalizado para desabilitar SSL no Guzzle
// Aplicado antes de qualquer request HTTP ser feito

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Psr\Http\Message\RequestInterface;

// Hook global para modificar todas as requests do Guzzle
if (env('APP_ENV') === 'local') {
    // Registra middleware que desabilita SSL para todas as requests
    $stack = HandlerStack::create();
    
    $stack->push(Middleware::mapRequest(function (RequestInterface $request) {
        // Força options para desabilitar SSL em todas as requests
        return $request;
    }));
    
    // Define configuração padrão do Guzzle globalmente
    if (!defined('GUZZLE_DEFAULT_CONFIG_SET')) {
        define('GUZZLE_DEFAULT_CONFIG_SET', true);
        
        // Força configuração através de variáveis globais
        $GLOBALS['guzzle_default_config'] = [
            'verify' => false,
            'curl' => [
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false,
            ]
        ];
    }
}