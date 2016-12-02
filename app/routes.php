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
    $this->logger->addInfo("index");
    return $this->view->render($response, 'index.html');
});

$app->get('/index', function ($request, $response) {
    return $this->view->render($response, 'index.html');
});

$app->get('/about', function ($request, $response) {
    return $this->view->render($response, 'about.html');
});

$app->get('/contact', function ($request, $response) {
    return $this->view->render($response, 'contact.php');
});

$app->get('/streamit', function ($request, $response) {
    return $this->view->render($response, 'streamit.html');
});

$app->get('/dole', function ($request, $response) {
    return $this->view->render($response, 'dole.html');
});

$app->post('/register', function (Request $request, Response $response) {
    $this->logger->addInfo("Register new user");
    $person = new Person($request->getParsedBody());

    $mapper = new PersonMapper($this->db);
    $success = $mapper->savePerson($person);
    if ($success) {
        $authToken = new AuthToken();
        $authToken->init($person->id);
        $mapper = new AuthTokenMapper($this->db);
        $mapper->saveAuthToken($authToken);
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
            $authToken = new AuthToken();
            $authToken->init($person->id);
            $mapper = new AuthTokenMapper($this->db);
            $mapper->saveAuthToken($authToken);
            return $response->withStatus(200)->
            withHeader('Content-Type', 'application/json')->withJson($authToken);
        } else {
            return $response->withStatus(401);
        }
    } else {
        return $response->withStatus(404);
    }
});

$app->get('/requests', function (Request $request, Response $response) {
    $auth = new Auth();
    $authToken = $auth->authorize($request, $this->db);
    if ($authToken == null) return $response->withStatus(401);

    $mapper = new RequestMapper($this->db);
    return $response->withHeader('Content-Type', 'application/json')
        ->withJson($mapper->getRequestByPersonId($authToken->person_id));
});

$app->post('/saveRequest', function (Request $request, Response $response) {
    $auth = new Auth();
    $authToken = $auth->authorize($request, $this->db);
    if ($authToken == null) return $response->withStatus(401);

    $body = $request->getParsedBody();
    $update = ($body['id']);
    $prayerRequest = new PrayerRequest();
    $prayerRequest->init($body);
    $prayerRequest->person_id = $authToken->person_id;
    $mapper = new RequestMapper($this->db);

    if ($update) {
        $success = $mapper->updateRequest($prayerRequest);
    } else {
        $success = $mapper->saveRequest($prayerRequest);
    }

    if ($success) {
        return $response->withStatus(204);
    } else {
        return $response->withStatus(500);
    }
});

$app->post('/answerRequest', function (Request $request, Response $response) {
    $auth = new Auth();
    $authToken = $auth->authorize($request, $this->db);
    if ($authToken == null) return $response->withStatus(401);

    $body = $request->getParsedBody();
    $update = ($body['id']);
    $answer = new Answer();
    $answer->init($body);
    $mapper = new AnswerMapper($this->db);
    if ($update) {
        $success = $mapper->updateAnswer($answer);
    } else {
        $success = $mapper->saveAnswer($answer);
        $mapper = new RequestMapper($this->db);
        $mapper->markAsAnswered($answer->requestId);
    }

    if ($success) {
        return $response->withStatus(204);
    } else {
        return $response->withStatus(500);
    }
});