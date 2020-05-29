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
