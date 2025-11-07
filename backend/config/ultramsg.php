<?php

return [
    /*
    |--------------------------------------------------------------------------
    | UltraMsg API Configuration
    |--------------------------------------------------------------------------
    |
    | Configurações para integração com a API do UltraMsg para envio de
    | mensagens WhatsApp automatizadas.
    |
    */

    'instance_id' => env('ULTRAMSG_INSTANCE_ID', '149213'),
    'token' => env('ULTRAMSG_TOKEN', 'c9s2z7gnvdl8ikl'),
    'base_url' => env('ULTRAMSG_BASE_URL', 'https://api.ultramsg.com'),
    
    /*
    |--------------------------------------------------------------------------
    | Message Configuration
    |--------------------------------------------------------------------------
    */
    
    'default_country_code' => '55', // Brasil
    'timeout' => 30, // seconds
];