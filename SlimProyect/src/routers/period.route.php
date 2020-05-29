<?php

use \Proyect\src\controllers\PeriodController;//Load controller
use Proyect\src\routers\answer\answer;

/**
 * Route to get all periods
 */
$app->get('/periods', function ($request, $response, $args) {
    $action = PeriodController::getAll();
    return answer::answer($action, $response);
});
