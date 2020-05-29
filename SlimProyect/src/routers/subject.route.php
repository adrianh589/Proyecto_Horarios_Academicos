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