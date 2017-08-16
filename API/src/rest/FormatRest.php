<?php

use booksea\controllers\FormatCntr;
use \Slim\Http\Request;
use \Slim\Http\Response;

$app->get('/formats', 'getFormats');
$app->get('/format/id/{idformat}', 'getFormatDetails');

function getFormats(Request $request, Response $response)
{
    try {
        $cntr = new FormatCntr();
        $formats = $cntr->listFormats();

        $response->withHeader('Content-type', 'application/json')->getBody()->write(json_encode($formats, JSON_UNESCAPED_UNICODE));
        return $response;
    } catch (Exception $e) {
        $response->withHeader('Content-type', 'application/json')->withStatus(400)->getBody()->write(json_encode(array("error" => $e->getMessage())));
        return $response;
    }
}

function getFormatDetails(Request $request, Response $response)
{
    try {
        $idformat = $request->getAttribute("idformat");
        $cntr = new FormatCntr();
        $format = $cntr->getFormat($idformat);
        $response->withHeader('Content-type', 'application/json')->getBody()->write(json_encode($format, JSON_UNESCAPED_UNICODE));
        return $response;
    } catch (Exception $e) {
        $response->withHeader('Content-type', 'application/json')->withStatus(400)->getBody()->write(json_encode(array("error" => $e->getMessage())));
        return $response;
    }
}