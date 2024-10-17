<?php

class Equipment {
    private $queryBuilder;

    public function __construct( $queryBuilder ) {
        $this->queryBuilder = $queryBuilder;
    }

    public function createEquipment( $name, $email ) {
        $sql = 'INSERT INTO equipment (name, email) VALUES (?, ?)';
        $this->queryBuilder->executeQuery( $sql, [ $name, $email ] );
        return $this->queryBuilder->getConnection()->lastInsertId();
    }

    public function getAllEquipments() {
        $sql = 'SELECT * FROM equipment';
        return $this->queryBuilder->fetchAll( $sql );
    }

    public function getEquipmentById( $ref ) {
        $sql = 'SELECT * FROM equipment WHERE ref = ?';
        return $this->queryBuilder->fetchOne( $sql, [ $ref ] );
    }

    public function updateEquipment( $ref, $available ) {
        $sql = 'UPDATE equipment SET available = ? WHERE ref = ?';
        return $this->queryBuilder->executeQuery( $sql, [ $available, $ref ] );
    }

    public function deleteEquipment( $ref ) {
        $sql = 'DELETE FROM equipment WHERE ref = ?';
        return $this->queryBuilder->executeQuery( $sql, [ $ref ] );
    }
}