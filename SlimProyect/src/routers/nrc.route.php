<?php

use Proyect\src\controllers\NrcController;
use Proyect\src\routers\answer\answer;

/**
 * Route to get all nrcs
 */
$app->get('/nrcs', function ($request, $response, $args) {
    $action = NrcController::getAll();
    return answer::answer($action, $response);
});

/**
 * Route to get a nrc by id
 */
$app->get('/nrcs/{id}', function ($request, $response, $args) {
    $action = NrcController::getBy($args['id']);
    return answer::answer($action, $response);
});

/**
 * Route to delete a nrc by id
 */
$app->delete('/nrcs/{id}', function ($request, $response, $args) {
    $action = NrcController::delete($args['id']);
    return answer::answer($action, $response);
});