<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
/**
 * Created by IntelliJ IDEA.
 * User: matthewfrederick
 * Date: 11/26/16
 * Time: 11:39 PM
 */
class Auth
{
    public function __construct()
    {
    }


    public function authorize(Request $request, $db)
    {
        $header = $request->getHeader('Authorization');
        $header = array_values($header)[0];
        if ($header == null) return null;
        $mapper = new AuthTokenMapper($db);
        $authToken = $mapper->getAuthToken($header);
        if ($authToken == null || $authToken->isExpired()) return null;
        return $authToken;
    }

}