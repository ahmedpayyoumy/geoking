<?php

return [
    'prefix' => env('SUPERVISOR_PREFIX', 'ls-laravel-worker'),
    'service_name' => env('SUPERVISOR_SERVICE_NAME', 'supervisord'),
    'config_path' => env('SUPERVISOR_CONFIG_PATH', '/etc/supervisord.d'),
    'config_ext' => env('SUPERVISOR_CONFIG_EXT', 'ini'),
    'php_bin' => env('SUPERVISOR_PHP_BIN', 'php'),

    'defaults' => [
        'enabled' => true,
        'artisan' => false,
        'process_name' => '%(program_name)s_%(process_num)02d',
        'command' => '',
        'autostart' => 'true',
        'autorestart' => 'true',
        'stopasgroup' => 'true',
        'killasgroup' => 'true',
        'user' => env('SUPERVISOR_USER', 'httpd'),
        'numprocs' => '1',
        'redirect_stderr' => 'true',
        'stopwaitsecs' => '3600',
    ],

    'commands' => [
        'queue-default' => [
            'artisan' => true,
            'command' => 'queue:listen --queue=default --timeout=86400 --tries=1',
        ],
    ],
];
