<?php

use booksea\controllers\GenreCntr;
use \Slim\Http\Request;
use \Slim\Http\Response;

$app->get('/getGenres', 'getGenres');

function getGenres(Request $request, Response $response)
{
    try {
        $cntr = new GenreCntr();
        $genres = $cntr->listGenres();

        $response->withHeader('Content-type', 'application/json')->getBody()->write(json_encode($genres, JSON_UNESCAPED_UNICODE));
        return $response;
    } catch (Exception $e) {
        $response->withHeader('Content-type', 'application/json')->withStatus(400)->getBody()->write(json_encode(array("error" => $e->getMessage())));
        return $response;
    }
}