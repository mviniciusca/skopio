<?php

namespace Src\Controllers;

use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Src\Models\BooksModel;
use App\Services\Functions\Validator;

class BooksController extends Controller
{
    /**
     * Index Method
     *
     * @param Request $request
     * @param Response $response
     * @param [type] $args
     * @return void
     */
    public function index(Request $request, Response $response, $args)
    {
        $books = new BooksModel();
        $response->getBody()->write($this->twig->view('books/index.html.twig', [
            'books' => $books->getByOrder(),
            ]));
        return $response;
    }
    /**
     * Show a book
     *
     * @param Request $request
     * @param Response $response
     * @param [type] $args
     * @return void
     */
    public function show(Request $request, Response $response, $args)
    {

        $show = new BooksModel();
        $response->getBody()->write($this->twig->view('books/show.html.twig', [
            'book' => $show->getById($args['id']),
        ]));
        return $response;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Response $response
     * @param [type] $args
     * @return void
     */
    public function store(Request $request, Response $response, $args)
    {
        if (isset($request->getParsedBody()['create'])) {
                $data = [
                    'author' => Validator::textValidator($request->getParsedBody()['author']),
                    'year'   => Validator::textValidator($request->getParsedBody()['year']),
                    'genre'  => Validator::textValidator($request->getParsedBody()['genre']),
                    'title'  => Validator::checkboxValidator($request->getParsedBody()['title']),
                ];
                $crate = new BooksModel();
                $crate->create($data);
                return $response->withHeader('Location', '/')->withStatus(302);
        }
        if (!isset($request->getParsedBody()['create'])) {
            $response->getBody()->write($this->twig->view('books/create.html.twig', []));
            return $response;
        }
    }
    /**
     * Update a book
     *
     * @param Request $request
     * @param Response $response
     * @param [type] $args
     * @return void
     */
    public function update(Request $request, Response $response, $args)
    {
        $update = new BooksModel();
        $data = [
            'id'     => $request->getParsedBody()['id'],
            'author' => $request->getParsedBody()['author'],
            'title'  => $request->getParsedBody()['title'],
            'year'   => $request->getParsedBody()['year'],
            'genre'  => $request->getParsedBody()['genre'],
        ];
        $update->update($request->getParsedBody()['id'], $data);
        return $response->withHeader('Location', '/')->withStatus(302);
    }
    /**
     * Delete book
     *
     * @param Request $request
     * @param Response $response
     * @param [type] $args
     * @return void
     */
    public function delete(Request $request, Response $response, $args)
    {
        $delete = new BooksModel();
        $delete->delete($request->getParsedBody()['id']);
        return $response->withHeader('Location', '/')->withStatus(302);
    }
}
