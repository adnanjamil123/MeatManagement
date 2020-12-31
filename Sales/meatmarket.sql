-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2020 at 04:27 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meatmarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(10) UNSIGNED NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `branch_name`, `location`) VALUES
(1000, 'Al aziziah', 'Jeddah'),
(1001, 'AL ZAIDI', 'MMAKAKH');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_no` int(50) NOT NULL,
  `order_no` int(50) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'paid',
  `total_wvat` decimal(10,2) NOT NULL,
  `vat` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_no`, `order_no`, `date`, `status`, `total_wvat`, `vat`, `total`) VALUES
(10038, 1315, '2020-12-28 17:31:27', 'paid', '42.50', '7.50', '50.00'),
(10039, 1316, '2020-12-28 17:35:23', 'paid', '42.50', '7.50', '50.00'),
(10040, 1317, '2020-12-28 17:35:50', 'paid', '42.50', '7.50', '50.00'),
(10041, 1318, '2020-12-28 17:37:00', 'paid', '42.50', '7.50', '50.00'),
(10042, 1319, '2020-12-28 17:44:43', 'paid', '425.00', '75.00', '500.00'),
(10043, 1320, '2020-12-28 17:50:27', 'paid', '42.50', '7.50', '50.00'),
(10044, 1323, '2020-12-28 18:02:25', 'paid', '42.50', '7.50', '50.00'),
(10045, 1324, '2020-12-29 15:56:01', 'paid', '42.50', '7.50', '50.00'),
(10046, 1325, '2020-12-29 16:07:29', 'paid', '42.50', '7.50', '50.00'),
(10047, 1326, '2020-12-29 16:07:39', 'paid', '0.00', '0.00', '0.00'),
(10048, 1327, '2020-12-29 16:07:40', 'paid', '0.00', '0.00', '0.00'),
(10049, 1328, '2020-12-29 17:12:51', 'paid', '0.00', '0.00', '0.00'),
(10050, 1329, '2020-12-29 18:51:43', 'paid', '42.50', '7.50', '50.00'),
(10055, 1330, '2020-12-30 17:55:33', 'paid', '170.00', '30.00', '200.00'),
(10056, 1331, '2020-12-30 17:59:23', 'paid', '127.50', '22.50', '150.00'),
(10057, 1332, '2020-12-30 17:59:50', 'paid', '42.50', '7.50', '50.00'),
(10058, 1333, '2020-12-30 18:02:19', 'paid', '85.00', '15.00', '100.00'),
(10059, 1334, '2020-12-30 18:03:04', 'paid', '42.50', '7.50', '50.00'),
(10060, 1335, '2020-12-30 18:04:01', 'paid', '42.50', '7.50', '50.00'),
(10061, 1336, '2020-12-30 18:04:33', 'paid', '42.50', '7.50', '50.00'),
(10062, 1337, '2020-12-30 18:05:27', 'paid', '42.50', '7.50', '50.00'),
(10063, 1338, '2020-12-30 18:06:58', 'paid', '42.50', '7.50', '50.00'),
(10064, 1339, '2020-12-30 18:07:00', 'paid', '42.50', '7.50', '50.00'),
(10065, 1340, '2020-12-30 18:08:25', 'paid', '382.50', '67.50', '450.00'),
(10066, 1341, '2020-12-30 18:09:16', 'paid', '637.50', '112.50', '750.00'),
(10067, 1342, '2020-12-30 18:11:24', 'paid', '42.50', '7.50', '50.00'),
(10068, 1343, '2020-12-30 18:18:39', 'paid', '0.00', '0.00', '0.00'),
(10069, 1344, '2020-12-30 18:25:43', 'paid', '0.00', '0.00', '0.00'),
(10070, 1345, '2020-12-30 18:26:21', 'paid', '0.00', '0.00', '0.00'),
(10071, 1346, '2020-12-30 18:28:03', 'paid', '0.00', '0.00', '0.00'),
(10072, 1347, '2020-12-30 18:28:07', 'paid', '0.00', '0.00', '0.00'),
(10073, 1348, '2020-12-30 18:29:45', 'paid', '42.50', '7.50', '50.00'),
(10074, 1349, '2020-12-30 18:33:54', 'paid', '42.50', '7.50', '50.00'),
(10075, 1350, '2020-12-30 18:40:01', 'paid', '42.50', '7.50', '50.00'),
(10076, 1351, '2020-12-30 18:41:48', 'paid', '609.45', '107.55', '717.00'),
(10077, 1352, '2020-12-30 18:50:24', 'paid', '637.50', '112.50', '750.00'),
(10078, 1353, '2020-12-30 19:11:56', 'paid', '42.50', '7.50', '50.00'),
(10079, 1354, '2020-12-30 19:14:20', 'paid', '85.00', '15.00', '100.00'),
(10080, 1355, '2020-12-30 19:18:19', 'paid', '212.50', '37.50', '250.00'),
(10081, 1356, '2020-12-30 19:27:30', 'paid', '42.50', '7.50', '50.00'),
(10082, 1357, '2020-12-30 19:38:47', 'paid', '467.50', '82.50', '550.00');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_code` int(50) UNSIGNED NOT NULL,
  `cetegory_id` int(10) UNSIGNED NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `uom` varchar(50) NOT NULL,
  `selling_price` decimal(10,2) UNSIGNED DEFAULT NULL,
  `item_size` tinyint(1) NOT NULL DEFAULT 0,
  `quantity_fixed` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `app_price` decimal(10,2) UNSIGNED NOT NULL DEFAULT 0.00 COMMENT 'selling price for apps only.',
  `app_status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'status for app to allow or not(1= allow)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_code`, `cetegory_id`, `display_name`, `uom`, `selling_price`, `item_size`, `quantity_fixed`, `status`, `app_price`, `app_status`) VALUES
(1001, 102, 'نص عجل', '', NULL, 1, 1, 1, '0.00', 1),
(1002, 102, 'عجل ربع', '', NULL, 1, 1, 1, '0.00', 1),
(1003, 102, 'لحم عجل بلدي', 'KG', '43.48', 0, 0, 1, '0.00', 1),
(1004, 102, 'ثمن', 'KG', NULL, 0, 0, 1, '0.00', 1),
(1005, 102, 'عجل كامل', '', NULL, 1, 1, 1, '0.00', 1),
(1006, 102, 'لحم عجل وسط', 'KG', NULL, 0, 0, 1, '0.00', 1),
(1007, 102, 'راس', 'Pc', NULL, 1, 1, 0, '0.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_no` int(50) UNSIGNED NOT NULL,
  `invoice_no` int(50) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user` int(10) UNSIGNED NOT NULL,
  `branch` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `payment_type` varchar(50) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'cash',
  `status` varchar(50) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'pending',
  `customer` int(50) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_no`, `invoice_no`, `date`, `user`, `branch`, `payment_type`, `status`, `customer`) VALUES
(1315, 10038, '2020-12-28 17:31:27', 108, '1000', 'atm', 'invoiced', 0),
(1316, 10039, '2020-12-28 17:35:23', 108, '1000', 'cash', 'invoiced', 0),
(1317, 10040, '2020-12-28 17:35:50', 108, '1000', 'cash', 'invoiced', 0),
(1318, 10041, '2020-12-28 17:37:00', 108, '1000', 'atm', 'invoiced', 0),
(1319, 10042, '2020-12-28 17:44:43', 108, '1000', 'atm', 'invoiced', 0),
(1320, 10043, '2020-12-28 17:50:27', 108, '1000', 'cash', 'invoiced', 0),
(1321, 0, '2020-12-28 18:00:32', 108, '1000', 'cash', 'pending', 0),
(1322, 0, '2020-12-28 18:01:24', 108, '1000', 'cash', 'pending', 0),
(1323, 10044, '2020-12-28 18:02:25', 107, '1000', 'cash', 'invoiced', 0),
(1324, 10045, '2020-12-29 15:56:01', 107, '1000', 'cash', 'invoiced', 0),
(1325, 10046, '2020-12-29 16:07:28', 107, '1000', 'cash', 'invoiced', 0),
(1326, 10047, '2020-12-29 16:07:39', 107, '1000', 'cash', 'invoiced', 0),
(1327, 10048, '2020-12-29 16:07:40', 107, '1000', 'cash', 'invoiced', 0),
(1328, 10049, '2020-12-29 17:12:51', 107, '1000', 'cash', 'invoiced', 0),
(1329, 10050, '2020-12-29 18:51:42', 107, '1000', 'cash', 'invoiced', 0),
(1330, 10055, '2020-12-30 17:55:33', 108, '1000', 'atm', 'invoiced', 0),
(1331, 10056, '2020-12-30 17:59:23', 108, '1000', 'cash', 'invoiced', 0),
(1332, 10057, '2020-12-30 17:59:50', 108, '1000', 'cash', 'invoiced', 0),
(1333, 10058, '2020-12-30 18:02:19', 108, '1000', 'cash', 'invoiced', 0),
(1334, 10059, '2020-12-30 18:03:04', 108, '1000', 'cash', 'invoiced', 0),
(1335, 10060, '2020-12-30 18:04:00', 108, '1000', 'cash', 'invoiced', 0),
(1336, 10061, '2020-12-30 18:04:33', 108, '1000', 'cash', 'invoiced', 0),
(1337, 10062, '2020-12-30 18:05:27', 108, '1000', 'cash', 'invoiced', 0),
(1338, 10063, '2020-12-30 18:06:58', 108, '1000', 'cash', 'invoiced', 0),
(1339, 10064, '2020-12-30 18:07:00', 108, '1000', 'cash', 'invoiced', 0),
(1340, 10065, '2020-12-30 18:08:25', 108, '1000', 'atm', 'invoiced', 0),
(1341, 10066, '2020-12-30 18:09:16', 108, '1000', 'cash', 'invoiced', 0),
(1342, 10067, '2020-12-30 18:11:24', 108, '1000', 'atm', 'invoiced', 0),
(1343, 10068, '2020-12-30 18:18:39', 108, '1000', 'cash', 'invoiced', 0),
(1344, 10069, '2020-12-30 18:25:42', 108, '1000', 'cash', 'invoiced', 0),
(1345, 10070, '2020-12-30 18:26:21', 108, '1000', 'cash', 'invoiced', 0),
(1346, 10071, '2020-12-30 18:28:03', 108, '1000', 'cash', 'invoiced', 0),
(1347, 10072, '2020-12-30 18:28:07', 108, '1000', 'cash', 'invoiced', 0),
(1348, 10073, '2020-12-30 18:29:45', 108, '1000', 'cash', 'invoiced', 0),
(1349, 10074, '2020-12-30 18:33:54', 108, '1000', 'cash', 'invoiced', 0),
(1350, 10075, '2020-12-30 18:40:01', 108, '1000', 'cash', 'invoiced', 0),
(1351, 10076, '2020-12-30 18:41:48', 107, '1000', 'atm', 'invoiced', 0),
(1352, 10077, '2020-12-30 18:50:24', 107, '1000', 'cash', 'invoiced', 0),
(1353, 10078, '2020-12-30 19:11:56', 107, '1000', 'atm', 'invoiced', 0),
(1354, 10079, '2020-12-30 19:14:20', 107, '1000', 'atm', 'invoiced', 0),
(1355, 10080, '2020-12-30 19:18:19', 109, '1001', 'atm', 'invoiced', 0),
(1356, 10081, '2020-12-30 19:27:30', 111, '1001', 'cash', 'invoiced', 0),
(1357, 10082, '2020-12-30 19:38:47', 107, '1000', 'cash', 'invoiced', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_no` int(50) UNSIGNED NOT NULL,
  `item` int(50) UNSIGNED NOT NULL,
  `item_description` varchar(50) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) UNSIGNED NOT NULL,
  `vat` decimal(10,2) UNSIGNED NOT NULL,
  `amount_vat` decimal(10,2) UNSIGNED NOT NULL COMMENT 'this is total including vat.',
  `size` varchar(50) NOT NULL,
  `uom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `date`, `order_no`, `item`, `item_description`, `quantity`, `price`, `amount`, `vat`, `amount_vat`, `size`, `uom`) VALUES
(143, '2020-12-28 17:31:27', 1315, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(144, '2020-12-28 17:35:23', 1316, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(145, '2020-12-28 17:35:50', 1317, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(146, '2020-12-28 17:37:00', 1318, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(147, '2020-12-28 17:44:43', 1319, 1002, ' \n            عجل ربع', 1, '500.00', '425.00', '75.00', '500.00', ' \n            medium', ' \n            '),
(148, '2020-12-28 17:50:27', 1320, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(149, '2020-12-28 18:02:25', 1323, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(150, '2020-12-29 15:56:01', 1324, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(151, '2020-12-29 16:07:29', 1325, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(152, '2020-12-29 18:51:43', 1329, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(205, '2020-12-30 17:55:33', 1330, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(206, '2020-12-30 17:55:33', 1330, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(207, '2020-12-30 17:55:33', 1330, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(208, '2020-12-30 17:55:33', 1330, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(209, '2020-12-30 17:59:23', 1331, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(210, '2020-12-30 17:59:23', 1331, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(211, '2020-12-30 17:59:23', 1331, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(212, '2020-12-30 17:59:50', 1332, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(213, '2020-12-30 18:02:19', 1333, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(214, '2020-12-30 18:02:19', 1333, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(215, '2020-12-30 18:03:04', 1334, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(216, '2020-12-30 18:04:01', 1335, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(217, '2020-12-30 18:04:33', 1336, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(218, '2020-12-30 18:05:27', 1337, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(219, '2020-12-30 18:06:58', 1338, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(220, '2020-12-30 18:07:00', 1339, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(221, '2020-12-30 18:08:25', 1340, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(222, '2020-12-30 18:08:25', 1340, 1002, ' \n            عجل ربع', 1, '400.00', '340.00', '60.00', '400.00', ' \n            medium', ' \n            '),
(223, '2020-12-30 18:09:16', 1341, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(224, '2020-12-30 18:09:16', 1341, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(225, '2020-12-30 18:09:16', 1341, 1005, ' \n            عجل كامل', 1, '600.00', '510.00', '90.00', '600.00', ' \n            large', ' \n            '),
(226, '2020-12-30 18:09:16', 1341, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(227, '2020-12-30 18:11:24', 1342, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(228, '2020-12-30 18:29:45', 1348, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(229, '2020-12-30 18:33:54', 1349, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(230, '2020-12-30 18:40:01', 1350, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(231, '2020-12-30 18:41:48', 1351, 1005, ' \n            عجل كامل', 1, '500.00', '425.00', '75.00', '500.00', ' \n            large', ' \n            '),
(232, '2020-12-30 18:41:48', 1351, 1003, ' \n            لحم عجل بلدي', 2, '50.00', '85.00', '15.00', '100.00', ' \n             ', ' \n            KG'),
(233, '2020-12-30 18:41:48', 1351, 1001, ' \n            نص عجل', 1, '67.00', '56.95', '10.05', '67.00', ' \n            medium', ' \n            '),
(234, '2020-12-30 18:41:48', 1351, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(235, '2020-12-30 18:50:24', 1352, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(236, '2020-12-30 18:50:24', 1352, 1003, ' \n            لحم عجل بلدي', 4, '50.00', '170.00', '30.00', '200.00', ' \n             ', ' \n            KG'),
(237, '2020-12-30 18:50:24', 1352, 1006, ' \n            لحم عجل وسط', 1, '500.00', '425.00', '75.00', '500.00', ' \n             ', ' \n            KG'),
(238, '2020-12-30 19:11:56', 1353, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(239, '2020-12-30 19:14:20', 1354, 1004, ' \n            ثمن', 2, '50.00', '85.00', '15.00', '100.00', ' \n             ', ' \n            KG'),
(240, '2020-12-30 19:18:19', 1355, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(241, '2020-12-30 19:18:19', 1355, 1006, ' \n            لحم عجل وسط', 4, '50.00', '170.00', '30.00', '200.00', ' \n             ', ' \n            KG'),
(242, '2020-12-30 19:27:30', 1356, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(243, '2020-12-30 19:38:47', 1357, 1003, ' \n            لحم عجل بلدي', 1, '50.00', '42.50', '7.50', '50.00', ' \n             ', ' \n            KG'),
(244, '2020-12-30 19:38:47', 1357, 1005, ' \n            عجل كامل', 1, '500.00', '425.00', '75.00', '500.00', ' \n            medium', ' \n            ');

-- --------------------------------------------------------

--
-- Table structure for table `stock_cetegory`
--

CREATE TABLE `stock_cetegory` (
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `cetegory_id` int(10) UNSIGNED NOT NULL,
  `item_cetegory` varchar(50) NOT NULL,
  `is_sellable` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `is_purchaseable` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_cetegory`
--

INSERT INTO `stock_cetegory` (`created_at`, `cetegory_id`, `item_cetegory`, `is_sellable`, `is_purchaseable`) VALUES
('2020-12-13 16:15:30', 102, 'عجل', 1, 1),
('2020-12-13 18:18:15', 103, 'علف برسيم', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` int(10) UNSIGNED NOT NULL,
  `tax_name` varchar(50) NOT NULL,
  `tax_value` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`id`, `tax_name`, `tax_value`) VALUES
(100, 'VAT', '0.15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `role` varchar(50) NOT NULL DEFAULT 'normal',
  `branch_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `user_password`, `active`, `role`, `branch_id`) VALUES
(107, 'adnan jamil', 'admin', '$2y$10$RLtkhHnBnYqiaaAiSQDj9uE6uYQly0l6D8Zy.R7TXYJNWjKH76dg.', 1, 'normal', 1000),
(108, 'Ali jamil', 'admin2', '$2y$10$UZIkRYAirVY61tXLJFh.QuQs6WNZ0x5/ylaIpuvO9JR8Q9/iPQG1G', 1, 'normal', 1000),
(109, 'omer jamil', 'omer', '$2y$10$3i.VA.yNM4S3KK2H/ymGCO/VL3RndOBIO9SG/DoYVNKVFMb.GLH3O', 1, 'normal', 1001),
(111, 'عدنان جميل', 'admin1234', '$2y$10$Bhu6SibL6cPYyp4RxKhhe.6DiRzpX9Ceh6usAfstA6857sYNhFbaq', 1, 'normal', 1001);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_no`),
  ADD KEY `invoice-order` (`order_no`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_code`),
  ADD KEY `cetegory_id` (`cetegory_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_no`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item` (`item`),
  ADD KEY `order` (`order_no`);

--
-- Indexes for table `stock_cetegory`
--
ALTER TABLE `stock_cetegory`
  ADD PRIMARY KEY (`cetegory_id`),
  ADD UNIQUE KEY `item_cetegory` (`item_cetegory`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `index_username` (`username`),
  ADD KEY `branch` (`branch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_no` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10083;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_code` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1010;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_no` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1358;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `stock_cetegory`
--
ALTER TABLE `stock_cetegory`
  MODIFY `cetegory_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice-order` FOREIGN KEY (`order_no`) REFERENCES `orders` (`order_no`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`cetegory_id`) REFERENCES `stock_cetegory` (`cetegory_id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `item` FOREIGN KEY (`item`) REFERENCES `items` (`item_code`),
  ADD CONSTRAINT `order` FOREIGN KEY (`order_no`) REFERENCES `orders` (`order_no`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `branch` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
