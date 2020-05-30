<?php

use Proyect\src\controllers\ScheduleController;//Load controller
use Proyect\src\routers\answer\answer;//Load answer

/**
 * Route to test schedule
 */
$app->get('/schedules', function ($request, $response, $args) {//Falta
    $action = ScheduleController::generateAcademicSchedules();
    return answer::answer($action, $response);
    session_destroy();  //Unset all sessions
});


