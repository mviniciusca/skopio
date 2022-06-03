<?php

namespace Src\Controllers\Dashboard;

use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Src\Controllers\Controller;

class HomepageController extends Controller
{
    public function index(Request $request, Response $response, $args)
    {
        $response->getBody()->write($this->twig->view('dashboard/base.html.twig', []));
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
