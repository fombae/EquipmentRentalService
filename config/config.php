<?php

class Database {

    private $hostDev = 'localhost:3306';
    private $dbDev = 'equipement_leisuredb';
    private $userDev = 'root';
    private $passDev = '';

    private $pdo;

    public function __construct() {
        $this->pdo = $this->connectDB();
    }

    // Connecting to the Database.

    public function connectDB() {
        try {
            $pdo = new PDO( "mysql:host={$this->hostDev};dbname={$this->dbDev}", $this->userDev, $this->passDev );
            $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

            return $pdo;
            // Return the PDO instance
        } catch ( PDOException $e ) {
            echo 'Connection failed: ' . $e->getMessage();
            return null;
            // Return null on failure
        }
    }

    // Method to get the PDO instance

    public function getConnection() {
        return $this->pdo;
    }
}

