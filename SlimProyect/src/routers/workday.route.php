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