<?php

/** Routes */

use Slim\Routing\RouteCollectorProxy;

/** Home */
$app->group('/', function (RouteCollectorProxy $group) {
    $group->get('', ['\Src\Controllers\Dashboard\HomepageController', 'index']);
});

/** Inbox */

$app->get('/inbox', ['\Src\Controllers\Dashboard\InboxController', 'index']);
/** User Routes */

$app->get('/user', ['\Src\Controllers\UserController', 'index']);

/** Login Route */

$app->get('/login', ['\Src\Controllers\Login\LoginController', 'index']);
$app->post('/login', ['\Src\Controllers\Login\LoginController', 'login']);
$app->any('/logout', ['\Src\Controllers\Login\LoginController', 'logout']);
