<?php
/**
 * Created by IntelliJ IDEA.
 * User: matthewfrederick
 * Date: 11/20/16
 * Time: 1:53 PM
 */

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$method = $_SERVER['REQUEST_METHOD'];
$loginRequest = json_decode(file_get_contents('php://input'));

if ($method == 'POST') {
    $cxn = new SqlConnect();
    $db = $cxn->getDb();

    $query = $db->prepare("SELECT * FROM person WHERE username = ?");
    $query->execute(array($loginRequest->username));
    $person = $query->fetchObject(Person::class);
    if ($person != null) {
        $match = password_verify($loginRequest->password, $person->salt);
        if ($match) {
            $authToken = new AuthToken($person->id);
            echo json_encode($authToken);
        } else {
            echo json_encode('false');
        }
    }
} else {
    http_response_code(404);
}
