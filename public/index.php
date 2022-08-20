<?php

session_start();
use Slim\Factory\AppFactory;

require '../vendor/autoload.php';

$app = AppFactory::create();

require '../src/Routes/Web.php';

$app->run();
