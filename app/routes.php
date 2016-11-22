<?php
/**
 * Created by IntelliJ IDEA.
 * User: Matthew
 * Date: 11/21/2016
 * Time: 7:37 PM
 */
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$app->get('/', function ($request, $response) {
    return 'Prayer Warrior API';
});

$app->get('/matthew', function (Request $request, Response $response) {
    $this->logger->addInfo("matthew endpoint");
    $mapper = new PersonMapper($this->db);
    $people = $mapper->getPeople();

    $newResponse = $response->withStatus(200)->withHeader('Content-Type', 'application/json')->withJson($people);
    return $newResponse;
});