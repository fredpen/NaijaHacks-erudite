-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 22, 2018 at 08:28 PM
-- Server version: 5.7.23
-- PHP Version: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `id` int(100) NOT NULL,
  `userId` int(100) NOT NULL,
  `product` varchar(500) NOT NULL,
  `location` varchar(500) NOT NULL,
  `size` varchar(500) NOT NULL,
  `age` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `resources` varchar(500) NOT NULL,
  `collateral` varchar(500) NOT NULL,
  `duration` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`id`, `userId`, `product`, `location`, `size`, `age`, `date`, `resources`, `collateral`, `duration`) VALUES
(17, 35, 'Primarily Cocoa and some shea butter', 'Lofom House,21 Mobolaji Bank Anthony Way , Opposite Ikeja Military , Cantonment,Maryland , Lagos , Nigeria.', '20 Hectares of Cocoa Plantation', 'More than two (2) years', '2018-10-21 10:11:15', '15 bags of NPK fertilizers', 'A land worth of #500,000 ', 12),
(18, 36, 'Majorly poultry - birds and turkeys', 'Landmark Towers , 5B Water Corporation Road , Oniru Estate, Kaduna , Nigeria.', '2000 birds and 100 Turkeys', 'less than a year', '2018-10-21 10:15:27', 'Am in need of a plot of land to move my pigs to', 'A two uncompleted duplex at kaduna', 12),
(19, 37, 'Potatoes and tomatoes', ' Road Safety Road, PMB 8,	Yenagoa,	Bayelsa	State.', '2 hectares of farmland', 'More than two (2) years', '2018-10-21 10:20:04', 'I need to tractors for ridging of my 2 hectares of land - payment is immediate', 'A farm land of 4 hectares', 6),
(20, 38, 'Cassava', ' C/o Bayelsa State Newspaper Corporation, Ovom, PMB 117, ,	Yenagoa,	Bayelsa	State.', '3 hectares of farm land', 'less than a year', '2018-10-21 10:22:18', '5 able body to plant cassava - payment is immediate', '1 million secured loan from bank', 6),
(21, 35, 'Primarily Cocoa and some shea butter', 'Lofom House,21 Mobolaji Bank Anthony Way , Opposite Ikeja Military , Cantonment,Maryland , Lagos , Nigeria.', '20 Hectares of Cocoa Plantation', 'More than two (2) years', '2018-10-21 10:11:15', '15 bags of NPK fertilizers', 'A land worth of #500,000 ', 12),
(22, 35, 'Majorly poultry - birds and turkeys', 'Landmark Towers , 5B Water Corporation Road , Oniru Estate, Kaduna , Nigeria.', '2000 birds and 100 Turkeys', 'less than a year', '2018-10-21 10:15:27', 'Am in need of a plot of land to move my pigs to', 'A two uncompleted duplex at kaduna', 12),
(23, 35, 'Potatoes and tomatoes', ' Road Safety Road, PMB 8,	Yenagoa,	Bayelsa	State.', '2 hectares of farmland', 'More than two (2) years', '2018-10-21 10:20:04', 'I need to tractors for ridging of my 2 hectares of land - payment is immediate', 'A farm land of 4 hectares', 6),
(24, 36, 'Cassava', ' C/o Bayelsa State Newspaper Corporation, Ovom, PMB 117, ,	Yenagoa,	Bayelsa	State.', '3 hectares of farm land', 'less than a year', '2018-10-21 10:22:18', '5 able body to plant cassava - payment is immediate', '1 million secured loan from bank', 6),
(25, 37, 'Primarily Cocoa and some shea butter', 'Lofom House,21 Mobolaji Bank Anthony Way , Opposite Ikeja Military , Cantonment,Maryland , Lagos , Nigeria.', '20 Hectares of Cocoa Plantation', 'More than two (2) years', '2018-10-21 10:11:15', '15 bags of NPK fertilizers', 'A land worth of #500,000 ', 12),
(26, 38, 'Majorly poultry - birds and turkeys', 'Landmark Towers , 5B Water Corporation Road , Oniru Estate, Kaduna , Nigeria.', '2000 birds and 100 Turkeys', 'less than a year', '2018-10-21 10:15:27', 'Am in need of a plot of land to move my pigs to', 'A two uncompleted duplex at kaduna', 12),
(27, 35, 'Potatoes and tomatoes', ' Road Safety Road, PMB 8,	Yenagoa,	Bayelsa	State.', '2 hectares of farmland', 'More than two (2) years', '2018-10-21 10:20:04', 'I need to tractors for ridging of my 2 hectares of land - payment is immediate', 'A farm land of 4 hectares', 6),
(28, 36, 'Cassava', ' C/o Bayelsa State Newspaper Corporation, Ovom, PMB 117, ,	Yenagoa,	Bayelsa	State.', '3 hectares of farm land', 'less than a year', '2018-10-21 10:22:18', '5 able body to plant cassava - payment is immediate', '1 million secured loan from bank', 6),
(29, 37, 'Primarily Cocoa and some shea butter', 'Lofom House,21 Mobolaji Bank Anthony Way , Opposite Ikeja Military , Cantonment,Maryland , Lagos , Nigeria.', '20 Hectares of Cocoa Plantation', 'More than two (2) years', '2018-10-21 10:11:15', '15 bags of NPK fertilizers', 'A land worth of #500,000 ', 12),
(30, 38, 'Majorly poultry - birds and turkeys', 'Landmark Towers , 5B Water Corporation Road , Oniru Estate, Kaduna , Nigeria.', '2000 birds and 100 Turkeys', 'less than a year', '2018-10-21 10:15:27', 'Am in need of a plot of land to move my pigs to', 'A two uncompleted duplex at kaduna', 12),
(31, 35, 'Potatoes and tomatoes', ' Road Safety Road, PMB 8,	Yenagoa,	Bayelsa	State.', '2 hectares of farmland', 'More than two (2) years', '2018-10-21 10:20:04', 'I need to tractors for ridging of my 2 hectares of land - payment is immediate', 'A farm land of 4 hectares', 6),
(32, 36, 'Cassava', ' C/o Bayelsa State Newspaper Corporation, Ovom, PMB 117, ,	Yenagoa,	Bayelsa	State.', '3 hectares of farm land', 'less than a year', '2018-10-21 10:22:18', '5 able body to plant cassava - payment is immediate', '1 million secured loan from bank', 6),
(33, 37, 'Primarily Cocoa and some shea butter', 'Lofom House,21 Mobolaji Bank Anthony Way , Opposite Ikeja Military , Cantonment,Maryland , Lagos , Nigeria.', '20 Hectares of Cocoa Plantation', 'More than two (2) years', '2018-10-21 10:11:15', '15 bags of NPK fertilizers', 'A land worth of #500,000 ', 12),
(34, 35, 'Majorly poultry - birds and turkeys', 'Landmark Towers , 5B Water Corporation Road , Oniru Estate, Kaduna , Nigeria.', '2000 birds and 100 Turkeys', 'less than a year', '2018-10-21 10:15:27', 'Am in need of a plot of land to move my pigs to', 'A two uncompleted duplex at kaduna', 12),
(35, 36, 'Potatoes and tomatoes', ' Road Safety Road, PMB 8,	Yenagoa,	Bayelsa	State.', '2 hectares of farmland', 'More than two (2) years', '2018-10-21 10:20:04', 'I need to tractors for ridging of my 2 hectares of land - payment is immediate', 'A farm land of 4 hectares', 6),
(36, 37, 'Cassava', ' C/o Bayelsa State Newspaper Corporation, Ovom, PMB 117, ,	Yenagoa,	Bayelsa	State.', '3 hectares of farm land', 'less than a year', '2018-10-21 10:22:18', '5 able body to plant cassava - payment is immediate', '1 million secured loan from bank', 6);

-- --------------------------------------------------------

--
-- Table structure for table `investor`
--

CREATE TABLE `investor` (
  `id` int(100) NOT NULL,
  `userId` int(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `resources` varchar(500) NOT NULL,
  `duration` int(100) NOT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `rate` int(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investor`
--

INSERT INTO `investor` (`id`, `userId`, `date`, `resources`, `duration`, `quantity`, `rate`, `image`) VALUES
(16, 33, '2018-10-21 08:58:04', 'I want to loan out a 2hectares of land at at Kuje Abuja. Serious farmers only', 12, NULL, 0, NULL),
(17, 34, 'df', 'Two thousand cocoa seeds for swap with cashew nuts. Interested farmer should contact me for immediate negotiation', 12, '2000', 10, NULL),
(18, 34, 'ss', 'Two pure breed of boar ready to be used for cross breeding in exchange for piglets', 3, '10000', 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `firstName` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `category` varchar(10) NOT NULL,
  `date` varchar(255) NOT NULL,
  `id` int(255) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`firstName`, `lastname`, `email`, `password`, `category`, `date`, `id`, `contact`, `image`) VALUES
('Falaq', 'Amaka', 'falq@yahoo.com', '15e5c87b18c1289d45bb4a72961b58e8', 'farmer', '2018-10-21 09:37:38', 35, '08012345678', 'farmer1'),
('Adejumo', 'Aliero', 'LoreneKMontoya@rhyta.com', '15e5c87b18c1289d45bb4a72961b58e8', 'farmer', '2018-10-21 09:58:56', 36, '08110546625', 'farmer2'),
('Chidinma', 'Okafor', 'johsdnsnow@gmail.com', '15e5c87b18c1289d45bb4a72961b58e8', 'Investor', '2018-10-21 10:00:36', 37, '08110546625', 'farmer3'),
('Hassana', 'Kabir', 'hassankabur@gmail.com', '15e5c87b18c1289d45bb4a72961b58e8', 'Investor', '2018-10-21 10:01:42', 38, '1125750', 'farmer4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investor`
--
ALTER TABLE `investor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `investor`
--
ALTER TABLE `investor`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
