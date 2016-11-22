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

    public function __construct(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        } else {
            $this->id = uniqid();
        }

        $this->first = $data['first'];
        $this->last = $data['last'];
        $this->username = $data['username'];
        $this->password = $data['password'];
        $this->email = $data['email'];
        $this->setSalt();
    }

    public function setSalt()
    {
        $this->salt = password_hash($this->password, PASSWORD_BCRYPT);
    }
}