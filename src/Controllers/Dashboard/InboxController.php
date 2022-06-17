<?php

namespace Src\Controllers\Dashboard;

use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Src\Controllers\Controller;

class InboxController extends Controller
{
    public function index(Request $request, Response $response, $args)
    {
        $response->getBody()->write($this->twig->view('dashboard/inbox.html.twig', []));
        return $response;
    }
}
