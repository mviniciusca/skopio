<?php

use Slim\Routing\RouteCollectorProxy;

$app->get('/', ['\Src\Controllers\BooksController', 'index']);

/** Dashboard Routes */
$app->group('/dashboard', function (RouteCollectorProxy $group) {
    $group->get('', ['\Src\Controllers\Dashboard\HomepageController', 'index']);
});


/** User Routes */

$app->get('/user', ['\Src\Controllers\UserController', 'index']);


/** Book Routes */
$app->group('/books', function (RouteCollectorProxy $group) {
    $group->any('/new', ['\Src\Controllers\BooksController', 'store']);
    $group->any('/show/{id}', ['\Src\Controllers\BooksController', 'show']);
    $group->post('/delete/{id}', ['\Src\Controllers\BooksController', 'delete']);
    $group->post('/update/{id}', ['\Src\Controllers\BooksController', 'update']);
});
