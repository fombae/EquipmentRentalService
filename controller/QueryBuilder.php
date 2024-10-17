<?php

class QueryBuilder {
    private $connection;

    public function __construct( $db ) {
        $this->connection = $db->getConnection();
    }

    public function executeQuery( $sql, $params = [] ) {
        try {
            $stmt = $this->connection->prepare( $sql );
            $stmt->execute( $params );
            return $stmt;
        } catch ( PDOException $e ) {
            echo 'Query failed: ' . $e->getMessage();
            return null;
        }
    }

    public function fetchAll( $sql, $params = [] ) {
        $stmt = $this->executeQuery( $sql, $params );
        return $stmt ? $stmt->fetchAll( PDO::FETCH_ASSOC ) : [];
    }

    public function fetchOne( $sql, $params = [] ) {
        $stmt = $this->executeQuery( $sql, $params );
        return $stmt ? $stmt->fetch( PDO::FETCH_ASSOC ) : null;
    }

    public function getConnection() {
        return $this->connection;
    }

}

