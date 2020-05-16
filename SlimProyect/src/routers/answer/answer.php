<?php namespace Proyect\src\routers\answer;

use Proyect\src\controllers\ScheduleController;
use Slim\Http\Response;


class answer
{
    public static function answer($action,Response $response){
        try {
            return $response->withJson($action, 200);
        }catch (Exception $e) {
            $error = array("message" => "Error in the request");
            return $response->withJson($error, 500);
        }
    }
}