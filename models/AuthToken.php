<?php

/**
 * Created by IntelliJ IDEA.
 * User: matthewfrederick
 * Date: 11/20/16
 * Time: 1:25 PM
 */
class AuthToken
{
    /**
     * @var string token id
     */
    public $token;

    /**
     * @var datetime expiration time
     */
    public $expiration;

    /**
     * @var string person id
     */
    public $personId;

    /**
     * AuthToken constructor.
     * @param $personId string owner of token
     */
    public function __construct($personId)
    {
        $this->token = uniqid();
        $this->personId = $personId;
        $this->setExpiration();
    }

    /**
     * set expiration date to 5 hours in the future
     */
    public function setExpiration()
    {
        $this->expiration = new DateTime('now', new DateTimeZone('UTC'));
        $this->expiration->add(new DateInterval('PT5H'));
    }

    /**
     * Check to see if token is expired
     * @return bool
     */
    public function isExpired()
    {
        $now = new DateTime("now");
        return $this->expiration < $now;
    }
}