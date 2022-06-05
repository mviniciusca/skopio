<?php

namespace Src\Controllers\Login;

use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Src\Models\Login\LoginModel;
use Src\Controllers\Controller;

class LoginController extends Controller
{
    public function index(Request $request, Response $response, $args)
    {
        if (isset($_SESSION['user'])) {
            return $response->withHeader('Location', '/')->withStatus(302);
        } else {
            $response->getBody()->write($this->twig->view('login/index.html.twig', []));
            return $response;
        }
    }

    public function login(Request $request, Response $response, $args)
    {
        $login = new LoginModel();
        $login->setUsername($request->getParsedBody()['username']);
        $login->setPassword($request->getParsedBody()['password']);
        $result = $login->login();

        if ($result === false) {
            unset($_SESSION['user']);
            $response->getBody()->write('Erro ao Logar');
            return $response;
        } else {
            $_SESSION['user'] = $result;
            return $response->withHeader('Location', '/login')->withStatus(302);
        }
    }

    public function logout(Request $request, Response $response, $args)
    {
        unset($_SESSION['user']);
        return $response->withHeader('Location', '/login')->withStatus(302);
    }
}
