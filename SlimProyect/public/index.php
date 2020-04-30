<?php

require '../vendor/autoload.php';

$app = new Slim\App();

$app->get('/hello/{name}', function ($request, $response, $args) {
    $response->write("Hello, " . $args['name']);
    return $response;
});

/**
 * Route to test app
 */
$app->get('/test', function ($request, $response, $args) {
    echo "<h1>Que se dice</h1>";
});

$app->run();