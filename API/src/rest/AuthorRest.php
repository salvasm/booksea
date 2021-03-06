<?php

use booksea\controllers\AuthorCntr;
use \Slim\Http\Request;
use \Slim\Http\Response;

$app->get('/authors', 'getAuthors');
$app->get('/author/id/{idauthor}', 'getAuthorDetails');

function getAuthors(Request $request, Response $response)
{
    try {
        $cntr = new AuthorCntr();
        $authors = $cntr->listAuthors();

        $response->withHeader('Content-type', 'application/json')->getBody()->write(json_encode($authors, JSON_UNESCAPED_UNICODE));
        return $response;
    } catch (Exception $e) {
        $response->withHeader('Content-type', 'application/json')->withStatus(400)->getBody()->write(json_encode(array("error" => $e->getMessage())));
        return $response;
    }
}

function getAuthorDetails(Request $request, Response $response)
{
    try {
        $idbook = $request->getAttribute("idauthor");
        $cntr = new AuthorCntr();
        $author = $cntr->getAuthor($idbook);
        $response->withHeader('Content-type', 'application/json')->getBody()->write(json_encode($author, JSON_UNESCAPED_UNICODE));
        return $response;
    } catch (Exception $e) {
        $response->withHeader('Content-type', 'application/json')->withStatus(400)->getBody()->write(json_encode(array("error" => $e->getMessage())));
        return $response;
    }
}