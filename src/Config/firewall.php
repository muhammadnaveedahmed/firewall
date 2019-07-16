<?php

return [

    'enabled' => env('FIREWALL_ENABLED', true),

    'whitelist' => [],

    'all_middlewares' => [
        'firewall.ip',
        'firewall.lfi',
        'firewall.php',
        'firewall.rfi',
        'firewall.session',
        'firewall.sqli',
        'firewall.xss',
    ],

    'ip' => [
        'requests' => ['all'],
    ],

    'lfi' => [
        'requests' => ['get', 'delete'],
        
        'auto_block' => [
            'attempts' => 3,
            'frequency' => 5 * 60, // 5 minutes
            'period' => 30 * 60, // 30 minutes
        ],
    ],

    'php' => [
        'requests' => ['get', 'post', 'delete'],
        
        'auto_block' => [
            'attempts' => 3,
            'frequency' => 5 * 60, // 5 minutes
            'period' => 30 * 60, // 30 minutes
        ],
    ],

    'rfi' => [
        'requests' => ['get', 'post', 'delete'],
        
        'auto_block' => [
            'attempts' => 3,
            'frequency' => 5 * 60, // 5 minutes
            'period' => 30 * 60, // 30 minutes
        ],
        
        'exceptions' => [],
    ],

    'session' => [
        'requests' => ['get', 'post', 'delete'],
        
        'auto_block' => [
            'attempts' => 3,
            'frequency' => 5 * 60, // 5 minutes
            'period' => 30 * 60, // 30 minutes
        ],
    ],

    'sqli' => [
        'requests' => ['get', 'delete'],
        
        'auto_block' => [
            'attempts' => 3,
            'frequency' => 5 * 60, // 5 minutes
            'period' => 30 * 60, // 30 minutes
        ],
    ],

    'whitelist' => [
        'requests' => ['all'],
    ],

    'xss' => [
        'requests' => ['post', 'put', 'patch'],
        
        'auto_block' => [
            'attempts' => 3,
            'frequency' => 5 * 60, // 5 minutes
            'period' => 30 * 60, // 30 minutes
        ],
    ],

    'models' => [
        'user' => '\App\User',
    ],
    
    'responses' => [

        'block' => [
            'message' => 'Access Denied',
            'code' => 403,
            'view' => null,
            'redirect' => null,
            'abort' => false,
        ],

    ],

    'notifications' => [

        'mail' => [
            'enabled' => true,
            'name' => 'Laravel Firewall',
            'from' => 'firewall@mydomain.com',
            'to' => ['admin@mydomain.com'],
            'subject' => ':fire: Possible attack on :domain',
            'message' => 'A possible :middleware attack on :domain has been detected from :ip address. The following URL has been affected:<br><br>:url<br><br>Regards',
        ],

        'slack' => [
            'enabled' => false,
            'from' => 'Laravel Firewall',
            'to' => '#my-channel',
            'emoji' => ':fire:',
            'message' => 'A possible attack on :domain has been detected.',
        ],

    ],

];
