<?php


use \Proyect\src\controllers\SemesterController;
use Proyect\src\routers\answer\answer;

/**
 * Route to get all workdays
 */
$app->get('/semesters', function ($request, $response, $args) {
    $action = SemesterController::getAll();
    return answer::answer($action, $response);
});