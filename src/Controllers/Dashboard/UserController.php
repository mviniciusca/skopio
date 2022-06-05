<?php

namespace Src\Controllers\Dashboard;

use Slim\Psr7\Response;
use Slim\Psr7\Request;
use Src\Controllers\Controller;

class UserController extends Controller
{
    public function index(Request $request, Response $response, $args)
    {
        $response->getBody()->write($this->twig->view('', []));
        return $response;
    }

    public function show(Request $request, Response $response, $args)
    {
    }

    public function create(Request $request, Response $response, $args)
    {
    }

    public function update(Request $request, Response $response, $args)
    {
    }

    public function delete(Request $request, Response $response, $args)
    {
    }
}
