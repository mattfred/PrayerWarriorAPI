<?php

/**
 * Created by IntelliJ IDEA.
 * User: Matthew
 * Date: 11/21/2016
 * Time: 7:59 PM
 */

class PersonMapper extends Mapper
{
    public function savePerson($person) {
        $query = $this->db->prepare("INSERT INTO person VALUES (?, ?, ?, ?, ?, ?)");
        $success = $query->execute(array($person->id, $person->first, $person->last, $person->email, $person->salt, $person->username));
        return $success;
    }

    public function getPersonByUsername($username) {
        $query = $this->db->prepare("SELECT * FROM person WHERE username = ?");
        $query->execute(array($username));
        $person = $query->fetchObject();
        return $person;
    }
}