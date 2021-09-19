-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2021 at 05:21 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `income`
--

-- --------------------------------------------------------

--
-- Table structure for table `main`
--

CREATE TABLE `main` (
  `date` date DEFAULT NULL,
  `info` varchar(500) DEFAULT NULL,
  `buy` int(11) DEFAULT NULL,
  `sell` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main`
--

INSERT INTO `main` (`date`, `info`, `buy`, `sell`) VALUES
('2021-09-16', 'Mobil Agya', 110000000, 130000000),
('2021-07-19', 'Motor', 50000000, 55000000),
('2020-08-13', 'Mobil pisto', 90000000, 100000000),
('2021-09-24', 'Mobil crv', 95000000, 100000000);

-- --------------------------------------------------------

--
-- Table structure for table `profit`
--

CREATE TABLE `profit` (
  `date` date DEFAULT NULL,
  `profit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profit`
--

INSERT INTO `profit` (`date`, `profit`) VALUES
('2021-09-16', 19656768),
('2021-07-19', 4880000),
('2020-08-13', 9580000),
('2021-09-24', 4880000);

-- --------------------------------------------------------

--
-- Table structure for table `spending`
--

CREATE TABLE `spending` (
  `no` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spending`
--

INSERT INTO `spending` (`no`, `date`, `name`, `amount`) VALUES
(0, '2021-09-16', 'cat', 80000),
(1, '2021-09-16', 'bensin', 60000),
(0, '2021-07-19', 'ban', 20000),
(1, '2021-07-19', 'rante', 100000),
(0, '2020-08-13', 'oli', 100000),
(1, '2020-08-13', 'bemper', 120000),
(2, '2021-09-16', 'oli', 200000),
(2, '2020-08-13', 'penyok', 200000),
(0, '2021-09-24', 'bensin', 120000),
(3, '2021-09-16', 'cat', 3232);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
