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
    public function saveAuthToken($authToken)
    {
        $this->deleteAuthTokenByPersonId($authToken->personId);
        $query = $this->db->prepare("INSERT INTO token VALUES (?, ?, ?)");
        $success = $query->execute(array($authToken->id, $authToken->expiration->format(Mapper::DATE_FORMAT),
            $authToken->person_id));
        return $success;
    }

    /**
     * Get an authToken by token id
     *
     * @param $id string
     * @return mixed AuthToken
     */
    public function getAuthToken($id)
    {
        $query = $this->db->prepare("SELECT * FROM token WHERE id = ?");
        $query->execute([$id]);
        if ($query->rowcount() < 1) return null;
        $authToken = $query->fetchObject(AuthToken::class);
        $authToken->expiration = new DateTime($authToken->expiration, new DateTimeZone('UTC'));
        return $authToken;
    }

    /**
     * Deletes any previously saved authToken for a person
     *
     * @param $personId string person Id
     * @return mixed boolean
     */
    public function deleteAuthTokenByPersonId($personId)
    {
        $query = $this->db->prepare("DELETE FROM token WHERE person_id = ?");
        $success = $query->execute(array($personId));
        return $success;
    }

}