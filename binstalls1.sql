-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2023 at 05:42 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `binstalls1`
--

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `contract_id` int(11) NOT NULL,
  `tenant_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `contract_status` int(11) NOT NULL COMMENT '0=expired 1=active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`contract_id`, `tenant_id`, `start_date`, `end_date`, `contract_status`) VALUES
(1, 1, '2023-10-15', '2023-12-31', 0),
(2, 2, '2023-10-16', '2023-12-31', 0),
(3, 3, '2023-10-16', '2023-12-31', 1),
(4, 1, '2024-01-01', '2024-12-31', 0),
(5, 1, '2025-01-01', '2025-12-31', 1),
(6, 4, '2023-10-20', '2023-12-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_log`
--

CREATE TABLE `login_log` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout_time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_log`
--

INSERT INTO `login_log` (`log_id`, `user_id`, `login_time`, `logout_time`) VALUES
(1, 1, '2023-09-23 03:17:34', '2023-10-22 16:45:17'),
(2, 11, '2023-09-23 03:25:08', '2023-10-17 19:18:21'),
(3, 11, '2023-09-23 03:32:44', '2023-10-17 19:18:21'),
(4, 11, '2023-10-10 14:17:47', '2023-10-17 19:18:21'),
(5, 11, '2023-10-10 14:59:22', '2023-10-17 19:18:21'),
(6, 11, '2023-10-11 06:20:24', '2023-10-17 19:18:21'),
(7, 11, '2023-10-11 14:13:06', '2023-10-17 19:18:21'),
(8, 11, '2023-10-17 12:39:47', '2023-10-17 19:18:21'),
(9, 11, '2023-10-17 16:16:12', '2023-10-17 19:18:21'),
(10, 11, '2023-10-17 17:03:37', '2023-10-17 19:18:21'),
(11, 11, '2023-10-17 17:18:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `market_section`
--

CREATE TABLE `market_section` (
  `market_section_id` int(11) NOT NULL,
  `section_name` varchar(125) NOT NULL,
  `img_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `market_section`
--

INSERT INTO `market_section` (`market_section_id`, `section_name`, `img_url`) VALUES
(1, 'Meat Section', 'wet_market.png'),
(2, 'Vegetable Section', 'wet_market.png'),
(3, 'Wet Section', 'wet_market.png'),
(4, 'Block 1', 'B1.png'),
(5, 'Block 2', 'B2.png'),
(6, 'Block 3', 'B3.png'),
(7, 'Block 4', 'B4.png'),
(8, 'Block 5', 'B5-B8.png'),
(9, 'Block 6', 'B5-B8.png'),
(10, 'Block 7', 'B5-B8.png'),
(11, 'Block 8', 'B5-B8.png'),
(12, 'Fish Sectiontest', '');

-- --------------------------------------------------------

--
-- Table structure for table `payments_tbl`
--

CREATE TABLE `payments_tbl` (
  `paymentid` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `ornumber` int(9) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `paymentdate` date NOT NULL,
  `paymenttime` time NOT NULL DEFAULT current_timestamp(),
  `month_first` date NOT NULL,
  `month_second` date NOT NULL,
  `amount` float NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments_tbl`
--

INSERT INTO `payments_tbl` (`paymentid`, `tenant_id`, `ornumber`, `timestamp`, `paymentdate`, `paymenttime`, `month_first`, `month_second`, `amount`, `userid`) VALUES
(9, 1, 1234567, '2023-10-18 15:38:30', '2023-10-18', '23:38:30', '2023-10-01', '2023-10-31', 5000, 1),
(10, 4, 1234567, '2023-10-20 15:54:58', '2023-10-20', '23:54:58', '2023-10-01', '2023-10-30', 5000, 1),
(11, 1, 1234567, '2023-10-21 01:03:37', '2023-11-03', '09:03:37', '2023-11-01', '2023-10-31', 5000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `rent_id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `stall_id` int(11) NOT NULL,
  `rent_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`rent_id`, `tenant_id`, `stall_id`, `rent_status`) VALUES
(1, 1, 104, 0),
(2, 2, 104, 0),
(3, 3, 104, 0),
(4, 4, 104, 0),
(5, 5, 105, 0),
(6, 6, 104, 0),
(7, 7, 104, 0),
(8, 8, 112, 0),
(9, 9, 105, 0),
(10, 10, 104, 0),
(11, 1, 105, 1),
(12, 2, 104, 0),
(13, 3, 109, 1),
(14, 4, 104, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rental_tbl`
--

CREATE TABLE `rental_tbl` (
  `stall_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `stallno` int(11) NOT NULL,
  `monthly_fee` float NOT NULL,
  `size` varchar(35) NOT NULL,
  `description` varchar(455) NOT NULL,
  `status` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rental_tbl`
--

INSERT INTO `rental_tbl` (`stall_id`, `section_id`, `stallno`, `monthly_fee`, `size`, `description`, `status`, `image`) VALUES
(1, 1, 1, 5000, '15 sq.meters', 'WET MARKET', 'Available', 'hanging-pork-meat-butcher-shop-stall-trang-thailand-febuary-nd-huai-yod-fresh-food-market-febuary-56334619.jpg'),
(2, 1, 2, 5000, '15 sq.meters', 'WET MARKET', 'Available', 'hanging-pork-meat-butcher-shop-stall-trang-thailand-febuary-nd-huai-yod-fresh-food-market-febuary-56334619.jpg'),
(3, 1, 3, 5000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(4, 1, 4, 5000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(5, 1, 5, 5000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(6, 1, 6, 5000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(7, 1, 7, 5000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(8, 1, 8, 5000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(9, 1, 9, 5000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(10, 1, 10, 5000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(11, 1, 11, 5000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(12, 1, 12, 5000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(13, 1, 13, 5000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(14, 1, 14, 5000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(15, 1, 15, 5000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(16, 1, 16, 5000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(17, 1, 17, 5000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(18, 1, 18, 5000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(19, 1, 19, 5000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(20, 1, 20, 5000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(21, 1, 21, 5000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(22, 1, 22, 5000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(23, 1, 23, 5000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(24, 1, 24, 5000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(25, 1, 25, 5000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(26, 2, 1, 4000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(27, 2, 2, 4000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(28, 2, 3, 4000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(29, 2, 4, 4000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(30, 2, 5, 4000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(31, 2, 6, 4000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(32, 2, 7, 4000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(33, 2, 8, 4000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(34, 2, 9, 4000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(35, 2, 10, 4000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(36, 2, 11, 4000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(37, 2, 12, 4000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(38, 2, 13, 4000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(39, 2, 14, 4000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(40, 2, 15, 4000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(41, 2, 16, 4000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(42, 2, 17, 4000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(43, 2, 18, 4000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(44, 2, 19, 4000, '15 sq.meters', 'WET MARKET', 'Available', 'no_image.png'),
(45, 2, 20, 4000, '15 sq.meters', 'WET MARKET VEGETABLES', 'Available', 'fruits and vegetable.jpg'),
(46, 2, 21, 4000, '15 sq.meters', 'WET MARKET VEGETABLES', 'Available', 'no_image.png'),
(47, 2, 22, 4000, '15 sq.meters', 'WET MARKET VEGETABLES', 'Available', 'no_image.png'),
(48, 2, 23, 4000, '15 sq.meters', 'WET MARKET VEGETABLES', 'Available', 'no_image.png'),
(49, 2, 24, 4000, '15 sq.meters', 'WET MARKET VEGETABLES', 'Available', 'no_image.png'),
(50, 2, 25, 4000, '15 sq.meters', 'WET MARKET VEGETABLES', 'Available', 'no_image.png'),
(51, 2, 26, 4000, '15 sq.meters', 'WET MARKET VEGETABLES', 'Available', 'no_image.png'),
(52, 2, 27, 4000, '15 sq.meters', 'WET MARKET VEGETABLES', 'Available', 'no_image.png'),
(53, 2, 28, 4000, '15 sq.meters', 'WET MARKET VEGETABLES', 'Available', 'no_image.png'),
(54, 2, 29, 4000, '15 sq.meters', 'WET MARKET VEGETABLES', 'Available', 'no_image.png'),
(55, 2, 30, 4000, '15 sq.meters', 'WET MARKET VEGETABLES', 'Available', 'no_image.png'),
(56, 3, 1, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(57, 3, 2, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(58, 3, 3, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(59, 3, 4, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(60, 3, 5, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(61, 3, 6, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(62, 3, 7, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(63, 3, 8, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(64, 3, 9, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(65, 3, 10, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(66, 3, 11, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(67, 3, 12, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(68, 3, 13, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(69, 3, 14, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(70, 3, 15, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(71, 3, 16, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(72, 3, 17, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(73, 3, 18, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(74, 3, 19, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(75, 3, 20, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(76, 3, 21, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(77, 3, 22, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(78, 3, 23, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(79, 3, 24, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(80, 3, 25, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(81, 3, 26, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(82, 3, 27, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(83, 3, 28, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(84, 3, 29, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(85, 3, 30, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(86, 3, 31, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(87, 3, 32, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(88, 3, 33, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(89, 3, 34, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(90, 3, 35, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(91, 3, 36, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(92, 3, 37, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(93, 3, 38, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(94, 3, 39, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(95, 3, 40, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(96, 3, 41, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(97, 3, 42, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(98, 3, 43, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(99, 3, 44, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(100, 3, 45, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(101, 3, 46, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(102, 3, 47, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(103, 3, 48, 4000, '15 sq.meters', 'FISH/SEAFOODS ', 'Available', 'no_image.png'),
(104, 4, 1, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses ', 'Occupied', 'handicraft-1-640x352.jpg'),
(105, 4, 2, 8000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Occupied', 'IMG20230909175133.jpg'),
(106, 4, 3, 8000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(107, 4, 4, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(108, 4, 5, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(109, 4, 6, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Occupied', 'no_image.png'),
(110, 4, 7, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(111, 4, 8, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(112, 4, 9, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(113, 4, 10, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'drug store.jpg'),
(114, 4, 11, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(115, 4, 12, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(116, 4, 13, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(117, 4, 14, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(118, 4, 15, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(119, 4, 16, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(120, 4, 17, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(121, 4, 18, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(122, 4, 19, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(123, 4, 20, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(124, 4, 21, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(125, 4, 22, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(126, 4, 23, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(127, 5, 1, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(128, 5, 2, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(129, 5, 3, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(130, 5, 4, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(131, 5, 5, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(132, 5, 6, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(133, 5, 7, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(134, 5, 8, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(135, 5, 9, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(136, 5, 10, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(137, 5, 11, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(138, 5, 12, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(139, 5, 13, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(140, 5, 14, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(141, 5, 15, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(142, 5, 16, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(143, 5, 17, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(144, 5, 18, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(145, 5, 19, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(146, 5, 20, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(147, 5, 21, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(148, 5, 22, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(149, 5, 23, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(150, 5, 24, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(151, 5, 25, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(152, 5, 26, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(153, 5, 27, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(154, 5, 28, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(155, 5, 29, 6000, '15 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(156, 6, 1, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(157, 6, 2, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(158, 6, 3, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(159, 6, 4, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(160, 6, 5, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(161, 6, 6, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(162, 6, 7, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(163, 6, 8, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(164, 6, 9, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(165, 6, 10, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(166, 6, 11, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(167, 6, 12, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(168, 6, 13, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(169, 6, 14, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(170, 6, 15, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(171, 6, 16, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(172, 6, 17, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(173, 6, 18, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(174, 6, 19, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(175, 6, 20, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(176, 6, 21, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(177, 6, 22, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(178, 6, 23, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(179, 6, 24, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(180, 6, 25, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(181, 6, 26, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(182, 6, 27, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(183, 6, 28, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(184, 6, 29, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(185, 6, 30, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(186, 6, 31, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(187, 6, 32, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(188, 6, 33, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(189, 6, 34, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(190, 6, 35, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(191, 6, 36, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(192, 6, 37, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(193, 6, 38, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(194, 6, 39, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(195, 6, 40, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(196, 6, 41, 5000, '13 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(197, 7, 1, 4000, '11 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(198, 7, 2, 5000, '11 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(199, 7, 3, 5000, '11 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(200, 7, 4, 5000, '11 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(201, 7, 5, 5000, '11 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(202, 7, 6, 5000, '11 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(203, 7, 7, 5000, '11 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(204, 7, 8, 5000, '11 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(205, 7, 9, 5000, '11 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(206, 7, 10, 5000, '11 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(207, 7, 11, 5000, '11 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(208, 7, 12, 5000, '11 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(209, 7, 13, 5000, '11 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(210, 7, 14, 5000, '11 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(211, 7, 15, 5000, '11 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(212, 7, 16, 5000, '11 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(213, 7, 17, 5000, '11 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(214, 7, 18, 5000, '11 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(215, 7, 19, 5000, '11 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(216, 7, 20, 4000, '11 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(217, 7, 21, 4000, '11 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(218, 7, 22, 4000, '11 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(219, 7, 23, 4000, '11 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(220, 7, 24, 4000, '11 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(221, 7, 25, 4000, '11 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(222, 7, 26, 4000, '11 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(223, 8, 1, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(224, 8, 2, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(225, 8, 3, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(226, 8, 4, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(227, 8, 5, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(228, 8, 6, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(229, 8, 7, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(230, 8, 8, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(231, 8, 9, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(232, 8, 10, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(233, 9, 1, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(234, 9, 2, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(235, 9, 3, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(236, 9, 4, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(237, 9, 5, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(238, 9, 6, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(239, 9, 7, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(240, 9, 8, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(241, 9, 9, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(242, 9, 10, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(243, 10, 1, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(244, 10, 2, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(245, 10, 3, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(246, 10, 4, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(247, 10, 5, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(248, 10, 6, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(249, 10, 7, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(250, 10, 8, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(251, 10, 9, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(252, 10, 10, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(253, 11, 1, 3000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(254, 11, 2, 3000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(255, 11, 3, 4500, '11 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(256, 11, 4, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(257, 11, 5, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(258, 11, 6, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(259, 11, 7, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(260, 11, 8, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(261, 11, 9, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(262, 11, 10, 4000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(263, 11, 11, 3000, '10 sq.meters', 'Stall block  suit different purposes or businesses', 'Available', 'no_image.png'),
(264, 12, 1, 25000, '25x10', 'test', 'Maintenance', 'no_image.png');

-- --------------------------------------------------------

--
-- Table structure for table `request_tbl`
--

CREATE TABLE `request_tbl` (
  `req_id` int(11) NOT NULL,
  `req_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(60) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `section_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_tbl`
--

INSERT INTO `request_tbl` (`req_id`, `req_date`, `status`, `lastname`, `firstname`, `gender`, `contact`, `address`, `productname`, `message`, `section_id`, `userid`) VALUES
(69, '2023-10-17 16:50:18', 'read', 'test', 'Genabe', 'Male', '213213', 'Purok 9, Brgy.Aguisan Near boundery', '321321', 'test', 5, 1),
(70, '2023-10-17 17:00:54', 'read', '314314', 'dsfsdf', 'Male', '213213', 'sdfs', 'TEST', 'test', 4, 1),
(71, '2023-10-19 04:02:29', 'read', 'testttt', 'testttt', 'Male', '321321', 'sdf', 'TEST', 'test', 2, 1),
(72, '2023-10-22 10:30:00', 'read', 'Genabe', 'Don', 'Male', '312321', 'test', 'TRY', 'test', 1, 1),
(73, '2023-10-22 11:43:04', 'unread', 'Everly', 'sadasda', 'Female', '231312', 'asdasdsa', 'DAS', 'dada', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sms_tbl`
--

CREATE TABLE `sms_tbl` (
  `msg_id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL,
  `contact_no` varchar(30) NOT NULL,
  `date_time_sent` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `message` text NOT NULL,
  `tname` varchar(255) NOT NULL,
  `rname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sms_tbl`
--

INSERT INTO `sms_tbl` (`msg_id`, `tenant_id`, `req_id`, `contact_no`, `date_time_sent`, `message`, `tname`, `rname`) VALUES
(6, 0, 0, '09672958595', '2023-04-10 11:59:14', 'try', '', ''),
(7, 0, 0, '09672958595', '2023-04-11 16:04:58', 'hatdog', '', ''),
(8, 0, 0, '09672958595', '2023-04-12 13:26:05', 'test test 1', '', ''),
(9, 0, 0, '12345678901', '2023-04-18 00:35:49', 'want', '', ''),
(10, 0, 0, '96729585953', '2023-05-04 09:39:10', 'test', '', ''),
(11, 0, 0, '96729585953', '2023-05-10 14:55:18', 'Hi mister cristobal\nhere is your account ID\n2\nlogin with your contact number', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tconcerns`
--

CREATE TABLE `tconcerns` (
  `concernid` int(11) NOT NULL,
  `rentalid` int(11) NOT NULL,
  `tenantid` int(11) NOT NULL,
  `concerns` longtext NOT NULL,
  `concern_type` varchar(125) NOT NULL,
  `status` int(11) NOT NULL,
  `date_time_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tconcerns`
--

INSERT INTO `tconcerns` (`concernid`, `rentalid`, `tenantid`, `concerns`, `concern_type`, `status`, `date_time_created`, `userid`) VALUES
(1, 0, 3, 'test', 'Stalls', 1, '2023-10-18 12:40:05', 1),
(2, 0, 3, 'test', 'Electricity', 1, '2023-10-18 12:53:51', 1),
(3, 0, 3, 'test', 'Other', 2, '2023-10-18 12:52:22', 1),
(4, 0, 3, 'wala lang', 'Stalls', 0, '2023-10-18 12:58:36', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `tenantid` int(11) NOT NULL,
  `stall_id` int(11) NOT NULL,
  `business_name` varchar(155) NOT NULL,
  `stall_category` varchar(50) NOT NULL,
  `tenant_lname` varchar(255) NOT NULL,
  `tenant_fname` varchar(255) NOT NULL,
  `tenant_midname` varchar(255) NOT NULL,
  `tenant_gender` varchar(255) NOT NULL,
  `age` varchar(30) NOT NULL,
  `civil_status` varchar(30) NOT NULL,
  `birthdate` date NOT NULL,
  `phoneno` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date_registered` date NOT NULL,
  `reminder` int(11) NOT NULL COMMENT '0=notified 1=not notified 2=Past Due'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`tenantid`, `stall_id`, `business_name`, `stall_category`, `tenant_lname`, `tenant_fname`, `tenant_midname`, `tenant_gender`, `age`, `civil_status`, `birthdate`, `phoneno`, `address`, `date_registered`, `reminder`) VALUES
(1, 105, 'test', 'test', 'GENABE', 'CRISTOBAL', 'MELINDA', 'MALE', '35', 'Single', '2002-12-31', '09672958595', 'PUROK 9, BRGY.AGUISAN NEAR BOUNDERY', '2023-10-15', 0),
(2, 104, 'test', 'test', 'EVERLY', 'CRISTOBAL', 'MELINDA', 'MALE', '35', 'Single', '2002-12-31', '9672958595', 'PUROK 9, BRGY.AGUISAN NEAR BOUNDERY', '2023-10-16', 0),
(3, 109, 'test', 'test', 'JOHN', 'MICHAEL', 'ARCANGEL', 'MALE', '35', 'Single', '2002-12-01', '09672958595', 'TEST', '2023-10-16', 0),
(4, 104, 'dasdsa', 'Pharmacy', '3', '32', '123', 'MALE', '35', 'Single', '2002-12-01', '12345678901', 'SDF', '2023-10-20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tenant_status`
--

CREATE TABLE `tenant_status` (
  `tenant_status_id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `date_started` date NOT NULL,
  `date_ended` date NOT NULL,
  `tenant_status` int(11) NOT NULL COMMENT '0 = not renting 1 = currently renting'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenant_status`
--

INSERT INTO `tenant_status` (`tenant_status_id`, `tenant_id`, `date_started`, `date_ended`, `tenant_status`) VALUES
(1, 1, '2023-10-16', '0000-00-00', 1),
(2, 2, '2023-10-17', '2023-10-17', 0),
(3, 3, '2023-10-17', '0000-00-00', 1),
(4, 4, '2023-10-20', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `pwd` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `lname`, `fname`, `username`, `usertype`, `email`, `phone`, `pwd`) VALUES
(1, 'Genabe', 'Don', 'admin', 'Admin', 'genabedoncristobal@gmail.com', '09672958595', '$2y$10$PgwHv1NLqe6Qhj4b0PrZd.jTuDs6OL7PIS7TIDOr.mZWsJBbQo1Tq'),
(11, 'impure', 'kin', 'staff', 'Staff', 'kingimpure1@gmail.com', '12345678901', '$2y$10$RdcM22NaBa8Mdv7kGKU/tOcD8cB0K7p2FDArr3Cd./rGt8K3oxWW.'),
(12, 'Tabia', 'John Michael', 'staff123', 'Staff', 'johnmichaeltabia@gmail.com', '09672958595', '$2y$10$RLl4ZKyy8rVwIow6tCC/1uwZnEjq40zNtpx9AE2IyeKRFOMpU.xua'),
(14, 'ralph', 'bardollo', 'staffralph', 'Staff', 's@gmail.com', '12345678901', '$2y$10$j8EuF2U6okswU9xwr2eb8ewX0JNilIjdAoJa3bVyptQmg8eoEbq9m');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`contract_id`);

--
-- Indexes for table `login_log`
--
ALTER TABLE `login_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `market_section`
--
ALTER TABLE `market_section`
  ADD PRIMARY KEY (`market_section_id`);

--
-- Indexes for table `payments_tbl`
--
ALTER TABLE `payments_tbl`
  ADD PRIMARY KEY (`paymentid`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`rent_id`);

--
-- Indexes for table `rental_tbl`
--
ALTER TABLE `rental_tbl`
  ADD PRIMARY KEY (`stall_id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `request_tbl`
--
ALTER TABLE `request_tbl`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `sms_tbl`
--
ALTER TABLE `sms_tbl`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `tconcerns`
--
ALTER TABLE `tconcerns`
  ADD PRIMARY KEY (`concernid`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`tenantid`);

--
-- Indexes for table `tenant_status`
--
ALTER TABLE `tenant_status`
  ADD PRIMARY KEY (`tenant_status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `contract_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login_log`
--
ALTER TABLE `login_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `market_section`
--
ALTER TABLE `market_section`
  MODIFY `market_section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payments_tbl`
--
ALTER TABLE `payments_tbl`
  MODIFY `paymentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `rent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rental_tbl`
--
ALTER TABLE `rental_tbl`
  MODIFY `stall_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT for table `request_tbl`
--
ALTER TABLE `request_tbl`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `sms_tbl`
--
ALTER TABLE `sms_tbl`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tconcerns`
--
ALTER TABLE `tconcerns`
  MODIFY `concernid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `tenantid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tenant_status`
--
ALTER TABLE `tenant_status`
  MODIFY `tenant_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login_log`
--
ALTER TABLE `login_log`
  ADD CONSTRAINT `login_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
