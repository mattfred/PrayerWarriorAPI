<?php

/**
 * Created by IntelliJ IDEA.
 * User: matthewfrederick
 * Date: 11/24/16
 * Time: 9:57 PM
 */
class AuthTokenMapper extends Mapper
{
    public function saveAuthToken($authToken) {
        $query = $this->db->perpare("INSERT INTO token VALUES (?, ?, ?)");
        $success = $query->execute(array($authToken->id, $authToken->expiration, $authToken->personId));
        return $success;
    }

    public function getAuthToken($tokenId) {
        $query = $this->db->prepare("SELECT * FROM token WHERE id = ?");
        $query->execute(array($tokenId));
        $authToken = $query->fetchObject();
        return $authToken;
    }

}