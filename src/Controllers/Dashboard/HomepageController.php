<?php

namespace Src\Controllers\Dashboard;

use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Src\Controllers\Controller;
use Src\Models\Dashboard\UserModel;
use Src\Models\Dashboard\TaskModel;

class HomepageController extends Controller
{
    public function index(Request $request, Response $response, $args)
    {
        if (isset($_SESSION['user'])) {
            //
            $user = new UserModel();
            $user = $user->getById($_SESSION['user']['id']);
            //
            $task = new TaskModel();
            $task = $task->getAll();
            //
            $response->getBody()->write($this->twig->view(
                'dashboard/homepage.html.twig',
                [
                'user' => $user,
                'task' => $task
                ]
            ));
            return $response;
        } else {
            return $response->withHeader('Location', '/login')->withStatus(302);
        }
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
