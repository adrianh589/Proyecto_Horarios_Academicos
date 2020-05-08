<?php

require '../vendor/autoload.php';

$app = new Slim\App();

// Automatically load routers files
require_once '../src/routers/autoload.php';

$app->run();