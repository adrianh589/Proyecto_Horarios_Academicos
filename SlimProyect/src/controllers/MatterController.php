<?php

  namespace Horarios\Controller;
use Horarios\Constants\Constants;
  use Horarios\Dao\BaseModelDao;
  use Horarios\Model\MatterModel;
  use Psr\Http\Message\ResponseInterface as Response;
  use Psr\Http\Message\ServerRequestInterface as Request;

  /**
   * Class MatterController
   * @package Horarios\Controller
   * @author Adrian Hoyos
   */
  class MatterController
  {

    public static function test(Request $request, Response $response, $args)
    {
      $baseDao = new BaseModelDao();
      $baseDao->findAll();
      $matter = new MatterModel();
      $matter->setNrc("3460");
      $matter->setName("Arquitectura de Software");
      $matter->setModality("Presencial");
      $matter->setWorkday("Tarde");
      $response->getBody()->write(json_encode($matter));

      return $response;

    }

  }