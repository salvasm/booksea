<?php

use booksea\controllers\UserCntr;
use \Slim\Http\Request;
use \Slim\Http\Response;

$app->post('/login', 'login');
$app->get('/users', 'getUsers');
$app->get('/user/{username}', 'getUserDetails');


function login(Request $request, Response $response)
{
    try {
        $cntr = new UserCntr();

        $body = $request->getParsedBody();
        $username = $body["username"];
        $password = $body["password"];

        $login = $cntr->login($username, $password);

        $response->withHeader('Content-type', 'application/json')->getBody()->write(json_encode($login, JSON_UNESCAPED_UNICODE));
        return $response;
    } catch (Exception $e) {
        $response->withHeader('Content-type', 'application/json')->withStatus(400)->getBody()->write(json_encode(array("error" => $e->getMessage())));
        return $response;
    }
}

function getUsers(Request $request, Response $response)
{
    try {
        $cntr = new UserCntr();
        $users = $cntr->listUsers();

        $response->withHeader('Content-type', 'application/json')->getBody()->write(json_encode($users, JSON_UNESCAPED_UNICODE));
        return $response;
    } catch (Exception $e) {
        $response->withHeader('Content-type', 'application/json')->withStatus(400)->getBody()->write(json_encode(array("error" => $e->getMessage())));
        return $response;
    }
}

function getUserDetails(Request $request, Response $response)
{
    try {
        $username = $request->getAttribute("username");
        $cntr = new UserCntr();
        $user = $cntr->getUserProfile($username);
        $response->withHeader('Content-type', 'application/json')->getBody()->write(json_encode($user, JSON_UNESCAPED_UNICODE));
        return $response;
    } catch (Exception $e) {
        $response->withHeader('Content-type', 'application/json')->withStatus(400)->getBody()->write(json_encode(array("error" => $e->getMessage())));
        return $response;
    }
}