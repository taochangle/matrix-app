<?php

declare(strict_types=1);

$db = require __DIR__ . '/database.php';

return [
    'paths' => [
        'migrations' => __DIR__ . '/../database/migrations',
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment'     => 'development',
        'development' => [
            'adapter'   => $db['driver'],
            'host'      => $db['host'],
            'name'      => $db['database'],
            'user'      => $db['username'],
            'pass'      => $db['password'],
            'port'      => $db['port'],
            'charset'   => $db['charset'],
        ],
    ],
];
