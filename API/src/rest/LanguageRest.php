<?php

use booksea\controllers\LanguageCntr;
use \Slim\Http\Request;
use \Slim\Http\Response;

$app->get('/languages', 'getLanguages');
$app->get('/language/id/{idlanguage}', 'getLanguageById');

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

function getLanguageById(Request $request, Response $response)
{
    try {
        $idlanguage = $request->getAttribute("idlanguage");
        $cntr = new LanguageCntr();
        $language = $cntr->getLanguage($idlanguage);
        $response->withHeader('Content-type', 'application/json')->getBody()->write(json_encode($language, JSON_UNESCAPED_UNICODE));
        return $response;
    } catch (Exception $e) {
        $response->withHeader('Content-type', 'application/json')->withStatus(400)->getBody()->write(json_encode(array("error" => $e->getMessage())));
        return $response;
    }
}