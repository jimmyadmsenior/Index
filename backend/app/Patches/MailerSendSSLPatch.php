<?php

namespace App\Patches;

use GuzzleHttp\Client;
use Http\Adapter\Guzzle7\Client as Guzzle7Adapter;

class MailerSendSSLPatch
{
    public static function getCustomHttpClient()
    {
        // Configuração específica para desenvolvimento local
        $config = [
            'verify' => false,
            'timeout' => 60,
            'curl' => [
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_TIMEOUT => 60,
            ]
        ];
        
        $guzzleClient = new Client($config);
        return new Guzzle7Adapter($guzzleClient);
    }
}