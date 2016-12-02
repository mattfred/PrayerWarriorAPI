<?php

/**
 * Created by IntelliJ IDEA.
 * User: matthewfrederick
 * Date: 12/1/16
 * Time: 11:16 PM
 */
class Answer
{
    public $id;
    public $requestId;
    public $details;
    public $answeredOn;

    public function __construct()
    {
    }


    public function init(array $array)
    {
        if ($array['id']) {
            $this->id = $array['id'];
        } else {
            $this->id = uniqid();
        }

        $this->requestId = $array['requestId'];
        $this->details = $array['details'];

        if ($array['answeredOn']) {
            $this->answeredOn = $array['answeredOn'];
        } else {
            $this->answeredOn = new DateTime('now', new DateTimeZone('UTC'));
        }
    }
}