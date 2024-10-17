<?php

class Client {
    private $queryBuilder;

    public function __construct( $queryBuilder ) {
        $this->queryBuilder = $queryBuilder;
    }

    public function createClient( $ncin, $name, $firstName, $phoneNumber ) {
        $sql = 'INSERT INTO clients (ncin, name, first_name, phone_number) VALUES (?, ?, ?, ?)';
        $this->queryBuilder->executeQuery( $sql, [ $ncin, $name, $firstName, $phoneNumber ] );
        return $this->queryBuilder->getConnection()->lastInsertId();
    }

    public function getAllClients() {
        $sql = 'SELECT * FROM clients';
        return $this->queryBuilder->fetchAll( $sql );
    }

    public function getClientById( $ncin ) {
        $sql = 'SELECT * FROM clients WHERE ncin = ?';
        return $this->queryBuilder->fetchOne( $sql, [ $ncin ] );
    }

    public function updateClient( $ncin, $name, $firstName, $phoneNumber ) {
        $sql = 'UPDATE clients SET name = ?, first_name = ?, phone_number = ? WHERE ncin = ?';
        return $this->queryBuilder->executeQuery( $sql, [ $name, $firstName, $phoneNumber, $ncin ] );
    }

    public function deleteClient( $ncin ) {
        $sql = 'DELETE FROM clients WHERE ncin = ?';
        return $this->queryBuilder->executeQuery( $sql, [ $ncin ] );
    }
}