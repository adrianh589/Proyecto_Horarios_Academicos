<?php

  use Horarios\Controller\MatterController;
  use Psr\Http\Message\ResponseInterface as Response;
  use Psr\Http\Message\ServerRequestInterface as Request;
  use Slim\Factory\AppFactory;

// Automatically load model files
  require_once __DIR__ . '/vendor/autoload.php';
  require_once __DIR__ . '/AutoloaderSourceCode.php';

  $app = AppFactory::create();

// Add Routing Middleware
  $app->addRoutingMiddleware();
  $app->addErrorMiddleware(true, true, true);

  /**
   * Route to test app
   */
  $app->get('/test', function ($request, $response, $args) {

    return MatterController::test($request, $response, $args);

  });

  /**
   * Hello route
   */
  $app->get('/hello/{name}', function ($request, $response, $args) {
    $response->write("Hello, " . $args['name']);
    return $response;
  });
  /**
   * Hello route
   */
  $app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello World");
    return $response;
  });

  $app->run();