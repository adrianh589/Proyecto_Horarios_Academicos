<?php

use Proyect\src\controllers\NrcController;
use Proyect\src\routers\answer\answer;

/**
 * Route to get all periods
 */
$app->get('/nrcs', function ($request, $response, $args) {
    $action = NrcController::getAll();
    return answer::answer($action, $response);
});