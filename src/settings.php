<?php
$config = parse_ini_file('../config/databaseConfig.ini');
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        //pdo settings
        'pdo' => [
            'host_name' => $config['hostname'],
            'db_name' =>  $config['dbname'],
            'user_name' => $config['username'],
            'password' => $config['password'],
        ] 
    ],
];
