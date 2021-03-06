<?php

use booksea\controllers\BookCntr;
use \Slim\Http\Response;
use \Slim\Http\Request;

$app->get('/books', 'getBooks'); // Get the books URI
$app->post('/addBook', 'addBook'); // Create a book URI
$app->put('/book/id/{idbook}', 'updateBook'); // Update a book URI
$app->put('/removeBook', 'removeBook'); // Delete a book URI
$app->get('/book/id/{idbook}', 'getBookDetails'); // Get a book details URI

function getBooks(Request $request, Response $response)
{
    try {
        $cntr = new BookCntr();
        $books = $cntr->listBooks();

        $response->withHeader('Content-type', 'application/json')->getBody()->write(json_encode($books, JSON_UNESCAPED_UNICODE));
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
        $response->withHeader('Content-type', 'application/json')->getBody()->write(json_encode($book, JSON_UNESCAPED_UNICODE));
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
        $author_data = null;
        $year = null;
        $isbn13 = null;
        $isbn10 = null;
        $language = null;
        $notes = null;
        $summary = null;
        $updated = null;
        $publisher = null;
        $format = null;
        $edition = null;
        $lent = null;
        $body = $request->getParsedBody();

        if (isset($body["title"])) {
            $title = $body["title"];
        }
        if (isset($body["author_data"])) {
            $author_data = $body["author_data"];
        }
        if (isset($body["year"])) {
            $year = $body["year"];
        }
        if (isset($body["isbn13"])) {
            $isbn13 = $body["isbn13"];
        }
        if (isset($body["isbn10"])) {
            $isbn10 = $body["isbn10"];
        }
        if (isset($body["language"])) {
            $language = $body["language"];
        }
        if (isset($body["notes"])) {
            $notes = $body["notes"];
        }
        if (isset($body["summary"])) {
            $summary = $body["summary"];
        }
        if (isset($body["publisher"])) {
            $publisher = $body["publisher"];
        }
        if (isset($body["format"])) {
            $format = $body["format"];
        }
        if (isset($body["edition"])) {
            $edition = $body["edition"];
        }
        if (isset($body["lent"])) {
            $lent = $body["lent"];
        }

        $cntr = new BookCntr();
        $cntr->addBook($title, $author_data, $year, $isbn13, $isbn10, $language, $notes, $summary, $updated, $publisher, $format, $edition, $lent);
        $response->withHeader('Content-type', 'application/json')->getBody()->write(json_encode(array("msg"=>"Book has been inserted correctly"), JSON_UNESCAPED_UNICODE));

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
        $response->withHeader('Content-type', 'application/json')->getBody()->write(json_encode(array("msg"=>"Book has been removed"), JSON_UNESCAPED_UNICODE));
    } catch (Exception $e) {
        $response->withHeader('Content-type', 'application/json')->withStatus(400)->getBody()->write(json_encode(array("error" => $e->getMessage())));
        return $response;
    }
}

function updateBook (Request $request, Response $response)
{
    try {
//        $idbook = null;
        $title = null;
        $author_data = null;
        $year = null;
        $isbn13 = null;
        $isbn10 = null;
        $language = null;
        $notes = null;
        $summary = null;
        $updated = null;
        $publisher = null;
        $format = null;
        $edition = null;
        $lent = null;
        $body = $request->getParsedBody();

        if (isset($body["title"])) {
            $title = $body["title"];
        }
        if (isset($body["author_data"])) {
            $author_data = $body["author_data"];
        }
        if (isset($body["year"])) {
            $year = $body["year"];
        }
        if (isset($body["isbn13"])) {
            $isbn13 = $body["isbn13"];
        }
        if (isset($body["isbn10"])) {
            $isbn10 = $body["isbn10"];
        }
        if (isset($body["language"])) {
            $language = $body["language"];
        }
        if (isset($body["notes"])) {
            $notes = $body["notes"];
        }
        if (isset($body["summary"])) {
            $summary = $body["summary"];
        }
        if (isset($body["publisher"])) {
            $publisher = $body["publisher"];
        }
        if (isset($body["format"])) {
            $format = $body["format"];
        }
        if (isset($body["edition"])) {
            $edition = $body["edition"];
        }


        $idbook = $request->getAttribute("idbook");
        $cntr = new BookCntr();
        $cntr->updateBook($idbook, $title, $author_data, $year, $isbn13, $isbn10, $language, $notes, $summary, $updated, $publisher, $format, $edition, $lent);
        $response->withHeader('Content-type', 'application/json')->getBody()->write(json_encode(array("msg"=>"Book has been modified correctly"), JSON_UNESCAPED_UNICODE));

    } catch (Exception $e) {
        $response->withHeader('Content-type', 'application/json')->withStatus(400)->getBody()->write(json_encode(array("error" => $e->getMessage())));
        return $response;
    }
}