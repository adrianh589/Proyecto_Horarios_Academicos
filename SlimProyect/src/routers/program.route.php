<?php

use Proyect\src\controllers\ProgramController;
use Proyect\src\routers\answer\answer;

/**
 * Route to get all programs
 */
$app->get('/programs', function ($request, $response, $args) {
    $action = ProgramController::getAll();
    return answer::answer($action, $response);
});

/**
 * Route to get a program by id
 */
$app->get('/programs/{id}', function ($request, $response, $args) {
    $action = ProgramController::getBy($args['id']);
    return answer::answer($action, $response);
});

/**
 * Route to get a program by idPeriod
 */
$app->get('/programs/periods/{idPeriod}', function ($request, $response, $args) {
    $action = ProgramController::getByPeriod($args['idPeriod']);
    return answer::answer($action, $response);
});

/**
 * Route to delete a program by id
 */
$app->delete('/programs/{id}', function ($request, $response, $args) {
    $action = ProgramController::delete($args['id']);
    return answer::answer($action, $response);
});