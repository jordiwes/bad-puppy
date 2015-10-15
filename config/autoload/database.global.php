<?php

return [
    'service_manager' => [
        'factories' => [
            'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
        ],
    ],
    'db' => [
        'driver'    => 'pdo',
        'dsn'       => 'mysql:dbname=world;host=127.0.0.1',
        'username'  => 'root',
        'password'  => '',
    ],

];
