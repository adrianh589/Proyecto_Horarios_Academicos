<?php

use Proyect\src\controllers\ProgramController;
use Proyect\src\routers\answer\answer;

/**
 * Route to get all programs
 */
$app->get('/programs', function ($request, $response, $args) {
    $action = ProgramController::getAll();
    return answer::answer($action, $response);
});