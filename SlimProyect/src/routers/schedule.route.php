<?php

use Proyect\src\controllers\ScheduleController;//Load controller
use Proyect\src\routers\answer\answer;//Load answer

/**
 * Route to generate academics schedles with all posibilities
 */
$app->post('/schedules', function ($request, $response, $args) {

    $parseBody = json_decode($request->getBody(), true);
    //$action = ScheduleController::generateAcademicSchedules($parseBody['schedules']);
    $action = ScheduleController::generateAcademicSchedules(array("ISUMBG083"));
    return answer::answer($action, $response);

});


