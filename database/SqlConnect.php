<?php

/**
 * Class used to create a database connection
 */

require 'config.php';

class SqlConnect
{
    /**
     * @var PDO database connection
     */
    protected $db;

    /**
     * @var string db host
     */
    private $host;

    /**
     * @var string db username
     */
    private $user;

    /**
     * @var string db password
     */
    private $pass;

    /**
     * SqlConnect constructor.
     */
    public function __construct()
    {
        $this->loadConfig();
        $this->connect();
    }

    /**
     * Loads the db configuration properties
     */
    private function loadConfig() {
        $config = new config();
        $this->host = $config->host;
        $this->user = $config->user;
        $this->pass = $config->pass;
    }

    /**
     * @return PDO returns the database object
     */
    public function getDb() {
        if ( is_object( $this->db ) ) {
            return $this->db;
        } else {
            die('There was a database problem');
        }
    }

    /**
     * Removes the database connection
     */
    public function __destruct() {
        $this->db = null;
    }

    /**
     * Connects to the database
     */
    private function connect() {
        if ( !empty( $this->db ) && is_object( $this->db ) ) {
            return;
        }

        try {
            $settings = array(
                PDO::ATTR_TIMEOUT       => "5",
                //PDO::ATTR_EMULATE_PERPARES    => false,
                PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC,
                PDO::ATTR_PERSISTENT        => false
            );

            $this->db = new PDO( $this->host, $this->user, $this->pass, $settings );
        } catch ( PDOException $e ) {
            exit( $e->getMessage() );
        }
    }
}