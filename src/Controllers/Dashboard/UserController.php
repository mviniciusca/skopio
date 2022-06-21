<?php

namespace Src\Controllers\Dashboard;

use Slim\Psr7\Response;
use Slim\Psr7\Request;
use Src\Controllers\Controller;
use Src\Models\Dashboard\UserModel;
use Src\Models\UserModel as ModelsUserModel;

class UserController extends Controller
{
    public function index(Request $request, Response $response, $args)
    {
        $user = new UserModel();
        $users = $user->getAll();

        $response->getBody()->write($this->twig->view('dashboard/user.html.twig', [
            'users' => $users
        ]));
        return $response;
    }

    public function show(Request $request, Response $response, $args)
    {
        $user = new UserModel();
        $user = $user->getById($args['id']);

        $response->getBody()->write($this->twig->view('dashboard/user.html.twig', [
            'user' => $user
        ]));
        return $response;
    }

    public function store(Request $request, Response $response, $args)
    {
        $crateUser = new UserModel();
        $data = [
            'level'    => $crateUser->setLevel(),
            'status'   => $crateUser->setStatus(),
            'user_id'  => $crateUser->setUserId(),
            'username' => $crateUser->setUsername($request->getParsedBody()['username']),
            'password' => $crateUser->setPassword($request->getParsedBody()['passcode']),
            'email'    => $crateUser->setEmail($request->getParsedBody()['email'])
        ];
        $crateUser->create($data);
        return $response->withHeader('Location', '/user')->withStatus(302);
    }

    public function update(Request $request, Response $response, $args)
    {
    }

    public function delete(Request $request, Response $response, $args)
    {
    }
}
