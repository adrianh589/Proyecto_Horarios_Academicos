<?php

use Proyect\src\controllers\ScheduleController;
use Proyect\src\routers\answer\answer;





/**
 * Hello route
 */
$app->get('/hello/{name}', function ($request, $response, $args) {
    $response->write("Hello, " . $args['name']);
    return $response;
});