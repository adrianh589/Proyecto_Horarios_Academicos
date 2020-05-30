<?php

use Proyect\src\controllers\SubjectController;//Load controller
use Proyect\src\routers\answer\answer;

/**
 * Route to get all subjects
 */
$app->get('/subjects', function ($request, $response, $args) {
    $action = SubjectController::getAll();
    return answer::answer($action, $response);
});

/**
 * Route to get all semesters
 */
$app->get('/subjects/semesters', function ($request, $response, $args) {
    $action = SubjectController::getSemesters();
    return answer::answer($action, $response);
});

/**
 * Route to get subject by nrc
 */
$app->get('/subjects/{nrc}', function ($request, $response, $args) {
    $action = SubjectController::getBy($args['nrc']);
    return answer::answer($action, $response);
});

/**
 * Route to get subject by period
 */
$app->get('/subjects/periods/{idPeriod}', function ($request, $response, $args) {
    $action = SubjectController::getByProgram($args['idPeriod']);
    return answer::answer($action, $response);
});

/**
 * Route to get subject by program
 */
$app->get('/subjects/programs/{idProgram}', function ($request, $response, $args) {
    $action = SubjectController::getByProgram($args['idProgram']);
    return answer::answer($action, $response);
});

/**
 * Route to delete a subject by id
 */
$app->delete('/subjects/{id}', function ($request, $response, $args) {
    $action = SubjectController::delete($args['id']);
    return answer::answer($action, $response);
});