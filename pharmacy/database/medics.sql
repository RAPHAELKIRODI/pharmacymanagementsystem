-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2022 at 06:10 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `today` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sold`
--

INSERT INTO `sold` (`id`, `item`, `quantity`, `today`) VALUES
(1, 1, 2, '2022-09-01 15:43:51'),
(2, 1, 2, '2022-09-01 16:01:45'),
(3, 2, 1, '2022-09-01 16:06:46');

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
  `date_supplied` date NOT NULL,
  `supplier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `item_name`, `quantity`, `price`, `total_amount`, `date_supplied`, `supplier`) VALUES
(1, 'coldril syrup 100ml', 1, 1900, 7600, '2022-08-31', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(2, 'dr.cold syrup 100ml', 2, 2200, 11000, '2022-08-31', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(3, 'Zentuss syrup 100ml', 2, 2100, 4200, '2022-08-31', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(4, 'zeculf Herbal Remedy 100ml', 1, 1900, 7600, '2022-08-31', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(5, 'Totolyn cough syrup 100ml', 1, 1000, 2000, '2022-08-31', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(6, 'Junior care cough syrup 100ml', 0, 2400, 7200, '2022-08-31', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(7, 'Good Morning syrup 100ml', 1, 1900, 7600, '2022-08-31', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(8, 'Chest  cough syrup 100ml', 1, 4200, 8400, '2022-08-31', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(9, 'Emdelyn expectorant 100ml(ADULT)', 1, 2200, 8800, '2022-08-31', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(10, 'Salbutamol oral syp 100ml (ASTHAMOL)', 4, 1000, 2000, '2022-08-31', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(11, 'zenkof syrup 100ml', 2, 2200, 11000, '2022-08-31', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(12, 'Koflyn Junior syrup 100ml', 2, 1300, 6500, '2022-08-31', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(13, 'Koflyn Adult syrup 100ml', 2, 1300, 6500, '2022-08-31', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(14, 'Mucolyn Adult 100ml', 2, 1900, 9500, '2022-08-31', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(15, 'Mucolyn Paediatric syp 100ml', 2, 1900, 9500, '2022-08-31', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(16, 'Sediton Syp (yellow) 100ml', 0, 2000, 6000, '2022-08-31', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(17, 'Sediton green cough linctures 100ml', 0, 2500, 7500, '2022-08-31', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(18, 'Delased Syp Pediatric(Bottle)', 0, 2100, 6300, '2022-08-31', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(19, 'Delased Syp Chesty(Non-Drowsy)', 5, 2100, 4200, '2022-08-31', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(20, 'Azithromycine Susp(Azilin) 200mg/5ml', 0, 2300, 6900, '2022-08-31', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(21, 'Erythromycin Susp 100ml', 2, 1400, 7000, '2022-08-31', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(22, 'Cephalexin Syp(Inlexin) 125mg/100ml', 0, 2000, 6000, '2022-08-31', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(23, 'Ped Zinc Tab 20mg 10s-(Tab)', 0, 550, 1650, '2022-08-31', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(24, 'Epherdrine Nasaldrop Adult(ISORYN-15ml)', 5, 1500, 3000, '2022-08-31', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(25, 'Epherdrine Nasaldrop ped(ISORYN-15ml)', 3, 1500, 3000, '2022-08-31', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(26, 'Nystatin Oral Susp 30ml', -1, 1500, 3000, '2022-08-31', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(27, 'Promethazine (Allerzine) Syrup 100ml', -1, 1950, 3900, '2022-08-31', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(28, 'Promethazine Tab 10mg', -2, 3200, 3200, '2022-08-31', 'JITEGEMEE TRADING CO.LTD-HESHIMA P'),
(29, 'Panadol', -1, 500, 1000, '2022-09-01', 'Msd');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
