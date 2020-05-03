<?php

  namespace Horarios\Controller;

  use Psr\Http\Message\ResponseInterface as Response;
  use Psr\Http\Message\ServerRequestInterface as Request;

  /**
   * Class SheduleController
   * @package Horarios\Controller
   * @author Adrian Hoyos
   */
  class SheduleController
  {

    public static function generatePosibilities(Request $request, Response $response, $args)
    {
      $result = ScheduleModel::generatePosibilities();//Controller action logic
      $response->getBody()->write(json_encode($result));
      return $response;
    }

  }