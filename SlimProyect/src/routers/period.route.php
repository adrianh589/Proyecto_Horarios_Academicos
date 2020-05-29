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


/**
 * Route to get delete a period by id
 */
$app->delete('/periods/{id}', function ($request, $response, $args) {
    $action = PeriodController::delete($args['id']);
    return answer::answer($action, $response);
});
