<?php

// Automatically load model files
require_once '../models/autoload.php';

//Automatically load controllers files
require_once '../controllers/autoload.php';

/**
 * Route to test app
 */
$app->get('/test', function ($request, $response, $args) {

MatterController::test();

});

/**
 * Hello route
 */
$app->get('/hello/{name}', function ($request, $response, $args) {
    $response->write("Hello, " . $args['name']);
    return $response;
});