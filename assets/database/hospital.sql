-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2018 at 06:49 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `accounts_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`accounts_id`, `image`, `name`, `contact`, `email`, `gender`, `address`, `username`, `password`, `role`) VALUES
(1, 'my picture.jpg', 'John David Lozano', '09555773952', 'lozanojohndavid@gmail.com', 'Male', 'Quezon City5345353534534', 'Administrator', '$2y$10$dTZIHSEJ7yFJRv3j9HvupOtZYfkyQNDT8tNCvsTbNWGui.uRXsjJu', 0),
(5, '', 'Jeddahlyn Cabuga', '09265691158', 'cabugajeddahlyn@gmail.com', 'Female', 'Quezon City\r\n', 'jeddah', '$2y$10$rddRx8kzut27CEASuXSfUectym65HHgFN8oOXNMGtX/x01kxnIXcS', 1),
(6, '', 'Judilyn Abcede', '09555773952', 'judilynabcede@gmail.com', 'Female', 'Bulacan City', 'judilyn', '$2y$10$5/SFZiOsP80WsKJ5Rb29POErUvWibuzJo0YuB2j8xD3ytkFX9RNde', 2),
(9, '', 'Janice Millanes', '09555773952', 'janicemillanes@gmail.com', 'Female', 'Bagong Silang Caloocan City', 'janice', '$2y$10$zrg4wXUeAFAuBKjnGXVxbOsZXqvQ7bc0ugKDjh.q9CfQ9jsI9zWXu', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`accounts_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `accounts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
