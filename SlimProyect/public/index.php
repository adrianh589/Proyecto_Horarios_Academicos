<?php

require '../vendor/autoload.php';

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$c = new \Slim\Container($configuration);
$app = new Slim\App($c);

// Automatically load routers files
require_once '../src/routers/autoload.php';

$app->run();