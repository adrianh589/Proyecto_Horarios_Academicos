<?php

  require '../vendor/autoload.php';

  $configuration = [
    'settings' => [
      'displayErrorDetails' => true,
    ],
  ];
  $c = new \Slim\Container($configuration);
  $app = new Slim\App($c);


  $app->add(
    function ($request, $response, $next) {
      $method = $request->getMethod();
      if ($method === 'OPTIONS') {
        $response = new Slim\Psr7\Response();
        $response->getBody()->write('{"status": "ok"}');
        return $response
          ->withStatus(200)
          ->withHeader('Content-Type', 'application/json; charset=utf-8')
          ->withHeader('Access-Control-Allow-Origin', '*')
          ->withHeader('access-control-allow-credentials', 'true')
          ->withHeader('Access-Control-Allow-Headers', ' X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method')
          ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
      } else {
        $response = $next($request, $response);
        return $response
          ->withHeader('Content-Type', 'application/json; charset=utf-8')
          ->withHeader('Access-Control-Allow-Origin', '*')
          ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
      }
    }
  );

// Automatically load routers files
require_once '../src/routers/autoload.php';

  $app->run();