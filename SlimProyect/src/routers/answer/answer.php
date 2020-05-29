<?php namespace Proyect\src\routers\answer;

use Exception;
use Slim\Http\Response;


class answer
{
    public static function answer($action,Response $response){
        try {
            return $response->withStatus(200)
                            ->withHeader('Content-Type', 'application/json')
                            ->write($action);
        }catch (Exception $e) {
            $error = array("message" => "Error in the request");
            return $response->withStatus(500)
                            ->withHeader('Content-Type', 'application/json')
                            ->write($error);
        }
    }
}