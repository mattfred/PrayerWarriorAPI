<?php

/**
 * Created by IntelliJ IDEA.
 * User: matthewfrederick
 * Date: 11/24/16
 * Time: 9:57 PM
 */
class AuthTokenMapper extends Mapper
{
    /**
     * Save an authToken. Previously saved auth tokens for person will first be deleted.
     *
     * @param $authToken AuthToken token to be saved
     * @return mixed boolean
     */
    public function saveAuthToken($authToken) {
        $this->deleteAuthTokenByPersonId($authToken->personId);
        $query = $this->db->prepare("INSERT INTO token VALUES (?, ?, ?)");
        $success = $query->execute(array($authToken->id, $authToken->expiration->format('Y/m/d H:i:s'),
            $authToken->personId));
        return $success;
    }

    /**
     * Get an authToken by token id
     *
     * @param $tokenId string
     * @return mixed AuthToken
     */
    public function getAuthToken($tokenId) {
        $query = $this->db->prepare("SELECT * FROM token WHERE id = ?");
        $query->execute(array($tokenId));
        $authToken = $query->fetchObject();
        return $authToken;
    }

    /**
     * Deletes any previously saved authToken for a person
     *
     * @param $personId string person Id
     * @return mixed boolean
     */
    public function deleteAuthTokenByPersonId($personId) {
        $query = $this->db->prepare("DELETE FROM token WHERE person_id = ?");
        $success = $query->execute(array($personId));
        return $success;
    }

}