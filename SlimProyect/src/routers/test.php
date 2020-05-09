<?php

// Automatically load model files
require_once '../src/models/autoload.php';

//Automatically load controllers files
require_once '../src/controllers/autoload.php';

//Automatically load controllers files
require_once '../src/models/modelsActions/autoload.php';

use Proyect\src\controllers\ScheduleController;
use Proyect\src\controllers\SubjectController;

/**
 * Route to test schedule
 */
$app->get('/test/schedule', function ($request, $response, $args) {

    $result = ScheduleController::generateAcademicsSchedules();

    return $response->withStatus(200)
        ->withHeader('Content-Type', 'application/json')
        ->write($result);

});

/**
 * Route to test subject
 */
$app->get('/test/subjects', function ($request, $response, $args) {
    $result = SubjectController::test();
    return $response->withStatus(200)
        ->withHeader('Content-Type', 'application/json')
        ->write($result);
});



/**
 * Hello route
 */
$app->get('/hello/{name}', function ($request, $response, $args) {
    $response->write("Hello, " . $args['name']);
    return $response;
});