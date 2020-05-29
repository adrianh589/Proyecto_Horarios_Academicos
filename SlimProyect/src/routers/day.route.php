<?php

use Proyect\src\controllers\DayController;
use Proyect\src\routers\answer\answer;

/**
 * Route to get all days
 */
$app->get('/days', function ($request, $response, $args) {
    $action = DayController::getAll();
    return answer::answer($action, $response);
});

/**
 * Route to get a day by id
 */
$app->get('/days/{nrc}', function ($request, $response, $args) {
    $action = DayController::getBy($args['nrc']);
    return answer::answer($action, $response);
});

/**
 * Route to delete a day by id
 */
$app->delete('/days/{id}', function ($request, $response, $args) {
    $action = DayController::delete($args['id']);
    return answer::answer($action, $response);
});
