<?php

/**
 * Created by IntelliJ IDEA.
 * User: matthewfrederick
 * Date: 11/20/16
 * Time: 2:33 PM
 */
class LoginRequest
{
    public $username;
    public $password;

    public function __construct(array $data)
    {
        $this->username = $data['username'];
        $this->password = $data['password'];
    }
}