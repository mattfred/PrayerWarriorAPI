<?php

/**
 * Created by IntelliJ IDEA.
 * User: matthewfrederick
 * Date: 11/25/16
 * Time: 5:23 PM
 *
 * Prayer request object
 */
class Request
{
    const PRIORITY_NONE = 0;
    const PRIORITY_LOW = 1;
    const PRIORITY_MED = 2;
    const PRIORITY_HIGH = 3;

    /**
     * @var string id
     */
    public $id;

    /**
     * @var string title
     */
    public $title;

    /**
     * @var string details
     */
    public $details;

    /**
     * @var int priority
     */
    public $priority;

    /**
     * @var string person id
     */
    public $person_id;

    /**
     * @var bool is request public
     */
    public $public;

    /**
     * @var bool is request deleted
     */
    public $deleted;

    /**
     * @var bool is request answered
     */
    public $answered;

    /**
     * @var DateTime date time request was created
     */
    public $created_on;

    public function __construct()
    {
    }

    /**
     * Request init.
     *
     * @param $title string
     * @param $details string
     * @param $priority int
     * @param $personId string
     * @param $isPublic bool
     */
    public function init($title, $details, $priority, $personId, $isPublic)
    {
        $this->id = uniqid();
        $this->title = $title;
        $this->details = $details;
        $this->priority = $priority;
        $this->person_id = $personId;
        $this->public = $isPublic;
        $this->answered = false;
        $this->deleted = false;
        $this->created_on = new DateTime('now', new DateTimeZone('UTC'));
    }
}