-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 16, 2024 at 09:35 PM
-- Server version: 8.0.31
-- PHP Version: 8.1.13

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `equipement_leisuredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `ncin` varchar(50) NOT NULL,
  `name` varchar(256) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `phone_mnumber` int NOT NULL,
  PRIMARY KEY (`ncin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`ncin`, `name`, `first_name`, `phone_mnumber`) VALUES
('CLT255', 'Nji', 'Nde', 0),
('CLT256', 'Fombae', 'Bull', 45789612),
('CLT257', 'Clobert', 'Nugji', 0),
('CLT258', 'Adama', 'Jonson', 0),
('CLT259', 'Rolins', 'Gilbert', 0);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE IF NOT EXISTS `equipment` (
  `ref` varchar(10) NOT NULL,
  `label` varchar(50) NOT NULL,
  `hourly_price` int NOT NULL,
  `available` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`ref`, `label`, `hourly_price`, `available`) VALUES
('Jsk01', 'Jet-Ski', 25, 'N'),
('Pch76', 'Parachute', 15, 'N'),
('Ped01', 'Individual Pedal Boat', 10, 'N'),
('Ped02', 'Double Pedal Boat', 18, 'O');

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

DROP TABLE IF EXISTS `rental`;
CREATE TABLE IF NOT EXISTS `rental` (
  `ncin_client` varchar(50) NOT NULL,
  `ref_equipment` varchar(10) NOT NULL,
  `date_rent` timestamp NOT NULL,
  `date_return` timestamp NOT NULL,
  PRIMARY KEY (`ncin_client`),
  KEY `fk_equipment_id` (`ref_equipment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rental`
--

INSERT INTO `rental` (`ncin_client`, `ref_equipment`, `date_rent`, `date_return`) VALUES
('CLT257', 'Ped01', '2024-10-16 20:30:51', '2024-10-17 20:30:51');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rental`
--
ALTER TABLE `rental`
  ADD CONSTRAINT `fk_client_id` FOREIGN KEY (`ncin_client`) REFERENCES `clients` (`ncin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_equipment_id` FOREIGN KEY (`ref_equipment`) REFERENCES `equipment` (`ref`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
