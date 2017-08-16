<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use booksea\controllers\JWTCntr;


require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App();

// Books
include "rest/BookRest.php";
// Languages
include "rest/LanguageRest.php";
// Authors
include "rest/AuthorRest.php";
// Genres
include "rest/GenreRest.php";
// Formats
include "rest/FormatRest.php";

$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write("BookSea API 1.0.0");
    return $response;
});

$app->run();
