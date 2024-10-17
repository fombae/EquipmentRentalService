<?php

class Rental {
    private $queryBuilder;

    public function __construct( $queryBuilder ) {
        $this->queryBuilder = $queryBuilder;
    }

    public function createRental( $ncinClient, $refEquipment, $dateRent, $dateReturn ) {
        $sql = 'INSERT INTO rental (ncin_client, ref_equipment, date_rent, date_return) VALUES (?, ?, ?, ?)';
        $this->queryBuilder->executeQuery( $sql, [ $ncinClient, $refEquipment, $dateRent, $dateReturn ] );
        return $this->queryBuilder->getConnection()->lastInsertId();

    }

    public function getAllRentals() {
        $sql = 'SELECT * FROM rental';
        return $this->queryBuilder->fetchAll( $sql );
    }

    public function getRentalById( $ncinClient ) {
        $sql = 'SELECT * FROM rental WHERE ncin_client = ?';
        return $this->queryBuilder->fetchOne( $sql, [ $ncinClient ] );
    }

}