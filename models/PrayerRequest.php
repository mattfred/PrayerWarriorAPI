<?php

/**
 * Created by IntelliJ IDEA.
 * User: matthewfrederick
 * Date: 11/25/16
 * Time: 5:23 PM
 *
 * Prayer request object
 */
class PrayerRequest
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
    public $isPublic;

    /**
     * @var bool is request deleted
     */
    public $isDeleted;

    /**
     * @var bool is request answered
     */
    public $isAnswered;

    /**
     * @var DateTime date time request was created
     */
    public $createdOn;

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

        $this->title = $array['title'];
        $this->details = $array['details'];
        $this->priority = $array['priority'];
        $this->isPublic = $array['isPublic'];

        if ($array['isAnswered']) {
            $this->isAnswered = $array['isAnswered'];
        } else {
            $this->isAnswered = false;
        }

        if ($array['isDeleted']) {
            $this->isDeleted = $array['isDeleted'];
        } else {
            $this->isDeleted = false;
        }

        if ($array['createdOn']) {
            $this->createdOn = $array['createdOn'];
        } else {
            $this->createdOn = new DateTime('now', new DateTimeZone('UTC'));
        }
    }
}