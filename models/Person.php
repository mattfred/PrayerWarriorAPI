<?php

/**
 * Created by IntelliJ IDEA.
 * User: matthewfrederick
 * Date: 11/19/16
 * Time: 1:03 AM
 */
class Person
{
    public $id;
    public $first;
    public $last;
    public $username;
    private $password;
    public $email;
    public $salt;

    public function fromRequestBody($f, $l, $e, $u, $p)
    {
        $this->id = uniqid();
        $this->first = $f;
        $this->last = $l;
        $this->username = $u;
        $this->password = $p;
        $this->email = $e;
        $this->setSalt();
    }

    public function setSalt()
    {
        $this->salt = password_hash($this->password, PASSWORD_BCRYPT);
    }
}