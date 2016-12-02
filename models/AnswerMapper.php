<?php

/**
 * Created by IntelliJ IDEA.
 * User: matthewfrederick
 * Date: 12/1/16
 * Time: 11:17 PM
 */
class AnswerMapper extends Mapper
{
    public function getAnswerByRequestId($requestId) {
        $query = $this->db->prepare("SELECT * FROM answers WHERE requestId = ?");
        $query->execute(array($requestId));
        $results = $query->fetchObject(Answer::class);
        return $results;
    }

    public function saveAnswer($answer) {
        $query = $this->db->prepare("INSERT INTO answers VALUES (?, ?, ?, ?)");
        $success = $query->execute(array($answer->id, $answer->requestId, $answer->details,
            $answer->answeredOn->format(Mapper::DATE_FORMAT)));
        return $success;
    }

    public function updateAnswer($answer) {
        $query = $this->db->prepare("UPDATE answers SET details = ? WHERE id = ?");
        $success = $query->execute(array($answer->details, $answer->id));
        return $success;
    }
}