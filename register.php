<?php
/**
 * Created by IntelliJ IDEA.
 * User: matthewfrederick
 * Date: 11/20/16
 * Time: 2:58 PM
 */

require 'models/Person.php';
require 'models/LoginRequest.php';
require 'database/SqlConnect.php';
require 'models/AuthToken.php';

$method = $_SERVER['REQUEST_METHOD'];
$personBody = json_decode(file_get_contents('php://input'));
$person = new Person();
$person->fromRequestBody($personBody->first, $personBody->last, $personBody->email, $personBody->username, $personBody->password);

if ($method == 'POST') {
    $cxn = new SqlConnect();
    $db = $cxn->getDb();

    $query = $db->prepare("INSERT INTO Person VALUES (?, ?, ?, ?, ?, ?)");
    $success = $query->execute(array($person->id, $person->first, $person->last, $person->email, $person->salt, $person->username));
    if ($success){
        $authToken = new AuthToken($person->id);
        echo json_encode($authToken);
    }
} else {
    http_response_code(404);
}