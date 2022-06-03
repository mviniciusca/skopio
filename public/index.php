<?php

session_start();

use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->addErrorMiddleware(true, true, true);

require __DIR__ . '/../app/Routes/Web.php';

$app->run();
