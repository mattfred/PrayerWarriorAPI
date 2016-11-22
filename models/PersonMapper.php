<?php

/**
 * Created by IntelliJ IDEA.
 * User: Matthew
 * Date: 11/21/2016
 * Time: 7:59 PM
 */

class PersonMapper extends Mapper
{
    public function getPeople() {
        $sql = "SELECT * FROM person";
        $stmp = $this->db->query($sql);

        $result = [];
        while($row = $stmp->fetch()) {
            $result[] = new Person($row);
        }
        return $result;
    }
}