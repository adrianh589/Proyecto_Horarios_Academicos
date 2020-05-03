<?php

// Automatically load model files
  require_once '../AutoloaderSourceCode.php';

  use Horarios\Controller\MatterController;

  $app->addErrorMiddleware(true, true, true);

  /**
   * Route to test app
   */
  $app->get('/test', function ($request, $response, $args) {

    MatterController::test($request, $response, $args);

  });

  /**
   * Hello route
   */
  $app->get('/hello/{name}', function ($request, $response, $args) {
    $response->write("Hello, " . $args['name']);
    return $response;
  });