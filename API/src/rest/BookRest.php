<?php

use booksea\controllers\BookCntr;

$app->get('/getBooks', 'getBooks');
$app->post('/addBook', 'addBook');
$app->put('/updateBook', 'updateBook');
$app->put('/removeBook', 'removeBook');
$app->get('/getBookDetails/{idbook}', 'getBookDetails');

function getBooks($request, $response, $args)
{
    $cntr = new BookCntr();
    $books = $cntr->listBooks();

    $response->getBody()->write(var_export($books, true));
    return $response;
}

function getBookDetails($request, $response, $args)
{
    $idbook = (int)$args['idbook'];
    $cntr = new BookCntr();
    $book = $cntr->getBook($idbook);

    $response->getBody()->write(var_export($book, true));
    return $response;
}


function addBook($request, $response, $args)
{
    $cntr = new BookCntr();

    return $response
        ->withHeader('Content-type', 'application/json')
        ->getBody()
        ->write(
            json_encode(
                $cntr->addBook(
                    $request->getParsedBody()
                )
            )
        );

}