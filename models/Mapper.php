<?php

/**
 * Created by IntelliJ IDEA.
 * User: Matthew
 * Date: 11/21/2016
 * Time: 7:59 PM
 */
abstract class Mapper
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
}