<?php

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

## Public Routes

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write('Homepage');
    return $response;
});

## Private Routes
