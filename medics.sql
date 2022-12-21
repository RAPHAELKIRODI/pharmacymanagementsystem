-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2022 at 02:31 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medics`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(3, 'yohana', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

-- --------------------------------------------------------

--
-- Table structure for table `sold`
--

CREATE TABLE `sold` (
  `id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `today` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sold`
--

INSERT INTO `sold` (`id`, `item`, `quantity`, `today`) VALUES
(1, 1, 2, '2022-09-01 15:43:51'),
(12, 34, 5, '2022-09-02 06:51:44'),
(13, 34, 3, '2022-09-02 06:52:54'),
(14, 35, 3, '2022-09-02 06:54:48'),
(15, 35, 59, '2022-09-02 07:04:51'),
(16, 35, 10, '2022-09-02 07:05:49'),
(17, 35, 10, '2022-09-02 07:07:03'),
(18, 39, 10, '2022-09-02 07:10:04'),
(19, 39, 5, '2022-09-02 07:14:24'),
(20, 39, 3, '2022-09-02 07:17:14'),
(21, 39, 1, '2022-09-02 07:18:27'),
(22, 39, 1, '2022-09-02 07:20:53'),
(23, 40, 1, '2022-09-02 07:50:27'),
(24, 40, 4, '2022-09-02 07:51:28'),
(25, 41, 5, '2022-09-02 07:56:12'),
(26, 41, 2, '2022-09-02 08:12:51'),
(27, 42, 5, '2022-09-02 08:13:36'),
(28, 42, 6, '2022-09-02 12:18:07');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `total_amount` int(255) NOT NULL,
  `date_supplied` timestamp NOT NULL DEFAULT current_timestamp(),
  `supplier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `item_name`, `quantity`, `price`, `total_amount`, `date_supplied`, `supplier`) VALUES
(1, 'coldril syrup 100ml', -149, 1900, 7600, '2022-08-30 21:00:00', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(26, 'Nystatin Oral Susp 30ml', -151, 1500, 3000, '2022-08-30 21:00:00', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(34, 'Action tab', -110, 1000, 10000, '2022-09-01 21:00:00', 'Bus terminal'),
(35, 'ALU  P/18-(Tab)', -20, 200, 20000, '2022-09-01 21:00:00', 'heshima pharmacy'),
(36, 'Burnox', -114, 1500, 9000, '2022-09-01 21:00:00', 'juve'),
(37, 'ALU 20/120 P24(IPCA)(Tab)', -115, 7000, 35000, '2022-09-01 21:00:00', 'B/Mkapa'),
(38, 'ALU 20/120 P24(IPCA)(Tab)', -115, 7000, 35000, '2022-09-01 21:00:00', 'B/Mkapa'),
(39, 'Chest cough tab', -10, 500, 10000, '2022-09-01 21:00:00', 'Bus terminal'),
(40, 'Dawa tatu', 0, 1000, 10000, '2022-09-01 21:00:00', 'Bus terminal'),
(41, 'Chest  cough syrup 100ml', 3, 1000, 10000, '2022-09-01 21:00:00', 'Chawa'),
(42, 'coldril syrup 100ml', 4, 1500, 30000, '2022-09-01 21:00:00', 'Bus terminal'),
(43, 'psv', 0, 1600, 8000, '2022-09-01 21:00:00', 'heshima pharmacy');

-- --------------------------------------------------------

--
-- Table structure for table `wastage`
--

CREATE TABLE `wastage` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `cost` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wastage`
--

INSERT INTO `wastage` (`id`, `name`, `quantity`, `cost`) VALUES
(1, 'Burnox', 2, 1200),
(2, 'Dawa tatu', 3, 10000),
(3, 'Dawa tatu', 3, 10000),
(4, 'cetirizine 10 mg', 10, 1200),
(5, 'burnox', 2, 2000),
(6, 'burnox', 2, 2000),
(7, 'septrine', 3, 2000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `sold`
--
ALTER TABLE `sold`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_fk` (`item`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `wastage`
--
ALTER TABLE `wastage`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sold`
--
ALTER TABLE `sold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `wastage`
--
ALTER TABLE `wastage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sold`
--
ALTER TABLE `sold`
  ADD CONSTRAINT `item_fk` FOREIGN KEY (`item`) REFERENCES `stock` (`stock_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
