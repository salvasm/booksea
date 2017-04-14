<?php

use booksea\controllers\BookCntr;
use \Slim\Http\Response;
use \Slim\Http\Request;

$app->get('/getBooks', 'getBooks');
$app->post('/addBook', 'addBook');
$app->put('/updateBook', 'updateBook');
$app->put('/removeBook', 'removeBook');
$app->get('/getBookDetails/{idbook}', 'getBookDetails');

function getBooks(Request $request, Response $response)
{
    try {
        $cntr = new BookCntr();
        $books = $cntr->listBooks();

        $response->withHeader('Content-type', 'application/json')->getBody()->write(json_encode($books));
        return $response;
    } catch (Exception $e) {
        $response->withHeader('Content-type', 'application/json')->withStatus(400)->getBody()->write(json_encode(array("error" => $e->getMessage())));
        return $response;
    }
}

function getBookDetails(Request $request, Response $response)
{
    try {
        $idbook = $request->getAttribute("idbook");
        $cntr = new BookCntr();
        $book = $cntr->getBook($idbook);
        $response->withHeader('Content-type', 'application/json')->getBody()->write(json_encode($book));
        return $response;
    } catch (Exception $e) {
        $response->withHeader('Content-type', 'application/json')->withStatus(400)->getBody()->write(json_encode(array("error" => $e->getMessage())));
        return $response;
    }
}

function addBook(Request $request, Response $response)
{
    try {
        $title = null;
        $author = null;
        $date = null;
        $body = $request->getParsedBody();
        if (isset($body["title"])) {
            $title = $body["title"];
        }
        if (isset($body["author"])) {
            $author = $body["author"];
        }
        if (isset($body["date"])) {
            $date = new DateTime($body["date"]);
        }
        $cntr = new BookCntr();
        $cntr->addBook($title, $author, $date);
        $response->withHeader('Content-type', 'application/json')->getBody()->write(json_encode(array("msg"=>"Book has been inserted correctly")));

    } catch (Exception $e) {
        $response->withHeader('Content-type', 'application/json')->withStatus(400)->getBody()->write(json_encode(array("error" => $e->getMessage())));
        return $response;
    }
}

function removeBook (Request $request, Response $response)
{
    try {
        $body = $request->getParsedBody();
        if (isset($body["idbook"])) {
            $idbook = $body["idbook"];
        }
        $cntr = new BookCntr();
        $cntr->removeBook($idbook);
        $response->withHeader('Content-type', 'application/json')->getBody()->write(json_encode(array("msg"=>"Book has been removed")));
    } catch (Exception $e) {
        $response->withHeader('Content-type', 'application/json')->withStatus(400)->getBody()->write(json_encode(array("error" => $e->getMessage())));
        return $response;
    }
}

function updateBook (Request $request, Response $response)
{
    try {
        $idbook = null;
        $title = null;
        $author = null;
        $date = null;
        $body = $request->getParsedBody();
        if (isset($body["idbook"])) {
            $idbook = $body["idbook"];
        }
        if (isset($body["title"])) {
            $title = $body["title"];
        }
        if (isset($body["author"])) {
            $author = $body["author"];
        }
        if (isset($body["date"])) {
            $date = new DateTime($body["date"]);
        }
        $cntr = new BookCntr();
        $cntr->updateBook($idbook, $title, $author, $date);
        $response->withHeader('Content-type', 'application/json')->getBody()->write(json_encode(array("msg"=>"Book has been modified correctly")));
    } catch (Exception $e) {
        $response->withHeader('Content-type', 'application/json')->withStatus(400)->getBody()->write(json_encode(array("error" => $e->getMessage())));
        return $response;
    }
}