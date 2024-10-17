<?php
// ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );
require_once( 'config/config.php' );
include_once( 'controller/QueryBuilder.php' );
include_once( 'model/Client.php' );
include_once( 'model/Equipment.php' );
include_once( 'model/Rental.php' );

$db = new Database();
$queryBuilder = new QueryBuilder( $db );
$connection = $queryBuilder->getConnection();
$clientModel = new Client( $queryBuilder );
$equipmentModel = new Equipment( $queryBuilder );
$rentalModel = new Rental( $queryBuilder );

function render_template($templateName,$params=array()) {

	ob_start();
	extract($params);
	include($templateName);
	$render_data = ob_get_clean();
	return $render_data;

}

function getAllEquipments( $equipmentModel ) {
    $equipments = $equipmentModel->getAllEquipments();
    if ( !empty( $equipments ) ) {
        {
            return $equipments;

        }

        return [];
    }
}


function getEquipmentById( $equipmentModel, $ref ) {
    $equipment = $equipmentModel->getEquipmentById( $ref );
    if ( !empty( $equipment ) ) {       
        return $equipment;
    } else {
		return false;
	}
}

function updateEquipment($equipmentModel, $ref, $available )  {
	$updateEquipment = $equipmentModel->updateEquipment( $ref, $available );
	if ( !empty( $updateEquipment ) ) {       
        return true;
    } else {
		return false;
	}
}
function getClientById( $clientModel, $ncin ) {
    $checkClient = $clientModel->getClientById( $ncin );
    if ( !empty( $checkClient ) ) {       
        return true;
    } else {
		return false;
	}
}

function createRental( $rentalModel, $ncinClient, $refEquipment, $dateRent, $dateReturn ) {
	$createRentalRecord = $rentalModel->createRental( $ncinClient, $refEquipment, $dateRent, $dateReturn );	 
	if ( $createRentalRecord == 0)  { 		    
        return true;
    } else {
		return false;
	}
}

function getRentalById( $rentalModel, $ncinClient ) {
    $checkRental = $rentalModel->getRentalById( $ncinClient );
    if ( !empty( $checkRental ) ) {       
        return true;
    } else {
		return false;
	}
}
function getAllRentals( $rentalModel ) {
    $rentals = $rentalModel->getAllRentals();
    if ( !empty( $rentals ) ) {
        {
            return $rentals;

        }

        return [];
    }
}

function getAllStistics($rentalModel )  {
	$rentals = getAllRentals( $rentalModel );
	if ( !empty( $rentals ) ) {       
        return $rentals;
    } else {
		return false;
	}
}