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

$app->post('/register', function (Request $request, Response $response) {
    $this->logger->addInfo("Register new user");
    $person = new Person($request->getParsedBody());

    $mapper = new PersonMapper($this->db);
    $success = $mapper->savePerson($person);
    if ($success) {
        $authToken = new AuthToken($person->id);
        return $response->withStatus(200)->withHeader('Content-Type', 'application/json')->withJson($authToken);
    } else {
        return $response->withStatus(500);
    }

});

$app->post('/login', function (Request $request, Response $response) {
    $this->logger->addInfo("Login User");
    $loginRequest = new LoginRequest($request->getParsedBody());
    $mapper = new PersonMapper($this->db);
    $person = $mapper->getPersonByUsername($loginRequest->username);
    if ($person != null) {
        $match = password_verify($loginRequest->password, $person->salt);
        if ($match) {
            $authToken = new AuthToken($person->id);
            return $response->withStatus(200)->withHeader('Content-Type', 'application/json')->withJson($authToken);
        } else {
            return $response->withStatus(401);
        }
    } else {
        return $response->withStatus(404);
    }
});