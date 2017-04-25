<?php

use booksea\controllers\LanguageCntr;
use \Slim\Http\Request;
use \Slim\Http\Response;

$app->get('/getLanguages', 'getLanguages');

function getLanguages(Request $request, Response $response)
{
    try {
        $cntr = new LanguageCntr();
        $languages = $cntr->listLanguages();

        $response->withHeader('Content-type', 'application/json')->getBody()->write(json_encode($languages, JSON_UNESCAPED_UNICODE));
        return $response;
    } catch (Exception $e) {
        $response->withHeader('Content-type', 'application/json')->withStatus(400)->getBody()->write(json_encode(array("error" => $e->getMessage())));
        return $response;
    }
}