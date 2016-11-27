<?php

/**
 * Created by IntelliJ IDEA.
 * User: matthewfrederick
 * Date: 11/25/16
 * Time: 11:09 PM
 */
class RequestMapper extends Mapper
{
    public function getRequestByPersonId($personId) {
        $query = $this->db->prepare("SELECT * FROM request WHERE person_id = ? AND isDeleted = FALSE AND isAnswered = FALSE");
        $query->execute(array($personId));
        $results = $query->fetchAll();
        return $results;
    }

    public function saveRequest($request) {
        $query = $this->db->prepare("INSERT INTO request VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $success = $query->execute(array($request->id, $request->title, $request->details, $request->priority,
            $request->personId, $request->isPublic, $request->isAnswered, $request->isDeleted,
            $request->createdOn->format(Mapper::DATE_FORMAT)));
        return $success;
    }
}