-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2022 at 07:04 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be15_cr11_petadoption_markobogdanovic`
--
CREATE DATABASE IF NOT EXISTS `be15_cr11_petadoption_markobogdanovic` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be15_cr11_petadoption_markobogdanovic`;

-- --------------------------------------------------------

--
-- Table structure for table `adoption`
--

CREATE TABLE `adoption` (
  `adoption_id` int(11) NOT NULL,
  `fk_animal_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `adoption_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `animal_id` int(11) NOT NULL,
  `animal_name` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `picture` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `discription` text NOT NULL,
  `size` enum('big','medium','small') NOT NULL,
  `age` int(30) NOT NULL,
  `breed` varchar(30) NOT NULL,
  `available` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`animal_id`, `animal_name`, `location`, `picture`, `address`, `discription`, `size`, `age`, `breed`, `available`) VALUES
(1, 'Diona', 'Vienna', 'dog1.png', 'Pfeiffergasse 3', 'Even though Doina was someones pet, she was never given a name', 'small', 1, 'Dog', 3),
(2, 'Pera', 'Vienna', 'dog2.png', 'Pfeiffergasse 8', 'Even though Doina was someones pet, she was never given a name', 'medium', 5, 'Dog', 2),
(3, 'Bill', 'Vienna', 'dog3.png', 'Bussgasse 6', 'Even though Doina was someones pet, she was never given a name', 'big', 11, 'Dog', 4),
(4, 'Sandra', 'Vienna', 'dog4.png', 'Mariagasse 9', 'Even though Doina was someones pet, she was never given a name', 'big', 9, 'Dog', 5),
(5, 'Fill', 'Vienna', 'parrot1.png', 'Hallostrasse 12', 'Parrots are birds of the order Psittaciformes. There are roughly 372 species in 86 genera and they are found in most tropical and subtropical regions', 'big', 3, 'Parrot', 6),
(6, 'Laura', 'Vienna', 'parrot2.png', 'Hallostrasse 12', 'Parrots are birds of the order Psittaciformes. There are roughly 372 species in 86 genera and they are found in most tropical and subtropical regions', 'small', 1, 'Parrot', 2),
(7, 'Miu', 'Vienna', 'cat1.png', 'Miuagasse 1', 'Cats are very affectionate animals and love children as well as adults', 'small', 1, 'Cat', 3),
(8, 'Mileva', 'Vienna', 'cat2.png', 'Miuagasse 1', 'Cats are very affectionate animals and love children as well as adults', 'big', 5, 'Cat', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(150) NOT NULL,
  `picture` varchar(150) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `password`, `date_of_birth`, `email`, `address`, `picture`, `status`) VALUES
(1, 'Test', 'Test', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', '2022-02-02', 'test@mail.com', 'TestTest', 'avatar.png', 'adm'),
(2, 'Marko', 'Bogdanovic', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2022-05-05', 'marko@gmail.com', 'Markopfoiggg', 'avatar.png', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoption`
--
ALTER TABLE `adoption`
  ADD PRIMARY KEY (`adoption_id`),
  ADD KEY `fk_animal_id` (`fk_animal_id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animal_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoption`
--
ALTER TABLE `adoption`
  MODIFY `adoption_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoption`
--
ALTER TABLE `adoption`
  ADD CONSTRAINT `adoption_ibfk_1` FOREIGN KEY (`fk_animal_id`) REFERENCES `animals` (`animal_id`),
  ADD CONSTRAINT `adoption_ibfk_2` FOREIGN KEY (`fk_user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
