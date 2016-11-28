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
            $request->person_id, $request->isPublic, $request->isAnswered, $request->isDeleted,
            $request->createdOn->format(Mapper::DATE_FORMAT)));
        return $success;
    }

    public function updateRequest($request) {
        $query = $this->db->prepare("UPDATE request SET title = ?, details = ?, priority = ?, isPublic = ?, isDeleted = ?,
          isAnswered = ? WHERE id = ?");
        $success = $query->execute(array($request->title, $request->details, $request->priority, $request->isPublic,
            $request->isDeleted, $request->isAnswered, $request->id));
        return $success;
    }
}