-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2021 at 09:55 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_auth`
--

-- --------------------------------------------------------

--
-- Table structure for table `cruise_table`
--

CREATE TABLE `cruise_table` (
  `id` int(11) NOT NULL,
  `voyage_id` varchar(255) DEFAULT NULL,
  `voyage_cod` varchar(255) DEFAULT NULL,
  `suite_category_cod` varchar(255) DEFAULT NULL,
  `suite_category` varchar(255) DEFAULT NULL,
  `currency_cod` varchar(255) DEFAULT NULL,
  `cruise_only_fare` varchar(255) DEFAULT NULL,
  `bundle_fare` varchar(255) DEFAULT NULL,
  `early_booking_bonus` varchar(255) DEFAULT NULL,
  `early_booking_perc` varchar(255) DEFAULT NULL,
  `suite_availability` varchar(255) DEFAULT NULL,
  `single_supplement_perc` varchar(255) DEFAULT NULL,
  `has_vs_saving` varchar(255) DEFAULT NULL,
  `vs_saving` varchar(255) DEFAULT NULL,
  `gateway_zone` varchar(255) DEFAULT NULL,
  `rt_economy_price_flag` varchar(255) DEFAULT NULL,
  `rt_economy_price` varchar(255) DEFAULT NULL,
  `rt_economy_price_promo_flag` varchar(255) DEFAULT NULL,
  `rt_economy_price_promo` varchar(255) DEFAULT NULL,
  `rt_business_price_flag` varchar(255) DEFAULT NULL,
  `rt_business_price` varchar(255) DEFAULT NULL,
  `rt_business_price_promo_flag` varchar(255) DEFAULT NULL,
  `rt_business_price_promo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cruise_table`
--
ALTER TABLE `cruise_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cruise_table`
--
ALTER TABLE `cruise_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
