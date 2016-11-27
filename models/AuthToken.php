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
    public $id;

    /**
     * @var datetime expiration time
     */
    public $expiration;

    /**
     * @var string person id
     */
    public $person_id;

    /**
     * AuthToken constructor.
     * @param $personId string owner of token
     */
    public function __construct()
    {

    }

    public function init($personId)
    {
        $this->setId();
        $this->setExpiration();
        $this->person_id = $personId;
    }

    /**
     * Set a unique id
     */
    public function setId()
    {
        $this->id = uniqid();
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
        $now = new DateTime('now', new DateTimeZone('UTC'));
        return $this->expiration < $now;
    }
}