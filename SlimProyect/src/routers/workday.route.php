<?php

use Proyect\src\controllers\WorkdayController;
use Proyect\src\routers\answer\answer;

/**
 * Route to get all workdays
 */
$app->get('/workdays', function ($request, $response, $args) {
    $action = WorkdayController::getAll();
    return answer::answer($action, $response);
});

/**
 * Route to delete a nrc by id
 */
$app->delete('/workdays/{id}', function ($request, $response, $args) {
    $action = WorkdayController::delete($args['id']);
    return answer::answer($action, $response);
});