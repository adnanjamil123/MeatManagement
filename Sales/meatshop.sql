-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2021 at 10:59 AM
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
-- Database: `meatshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `meat_admins`
--

CREATE TABLE `meat_admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_allow` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meat_admins`
--

INSERT INTO `meat_admins` (`id`, `name`, `email`, `password`, `is_allow`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'marwan@admin.com', '12345', 0, '2020-12-21 02:33:42', '2020-12-21 02:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `meat_branches`
--

CREATE TABLE `meat_branches` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `vat_code` varchar(255) NOT NULL,
  `is_allow` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meat_branches`
--

INSERT INTO `meat_branches` (`id`, `name`, `country`, `city`, `address`, `vat_code`, `is_allow`, `created_at`, `updated_at`) VALUES
(1, 'Branch No 1', 'SAUDIA ARABIA', 'JEDDAH', 'AL KANDARA', '3485743875422222', 0, '2020-12-21 02:29:21', '2020-12-21 02:29:21'),
(2, 'Branch No 2', 'SAUDIA ARABIA', 'JEDDAH', 'AL KANDARA', '4656575624756645', 0, '2020-12-21 02:30:14', '2020-12-21 02:30:14'),
(3, 'Branch No 3', 'SAUDIA ARABIA', 'JEDDAH', 'AL KANDARA', '4235674675465766', 0, '2020-12-27 18:38:34', '2020-12-27 18:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `meat_expenses`
--

CREATE TABLE `meat_expenses` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `expense_cat_id` int(11) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meat_expenses`
--

INSERT INTO `meat_expenses` (`id`, `date`, `expense_cat_id`, `amount`, `remarks`, `created_at`, `updated_at`) VALUES
(1, '2020-12-01', 1, '250.00', 'ELECTRICITY BILL', '2020-12-27 18:52:36', '2020-12-27 18:52:36'),
(2, '2020-12-16', 2, '200.00', 'WATER', '2020-12-27 18:53:07', '2020-12-27 18:53:07'),
(3, '2020-12-31', 1, '1000.00', 'Bill 1000', '2020-12-27 22:14:51', '2020-12-27 22:14:51');

-- --------------------------------------------------------

--
-- Table structure for table `meat_expense_categories`
--

CREATE TABLE `meat_expense_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_allow` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meat_expense_categories`
--

INSERT INTO `meat_expense_categories` (`id`, `name`, `is_allow`, `created_at`, `updated_at`) VALUES
(1, 'Electricity Bill', 0, '2020-12-21 03:05:35', '2020-12-21 03:05:35'),
(2, 'Water', 0, '2020-12-21 03:05:35', '2020-12-21 03:05:35'),
(3, 'Slatter House Bill', 0, '2020-12-21 03:05:35', '2020-12-21 03:05:35'),
(4, 'Salary Bill', 0, '2020-12-21 03:05:35', '2020-12-21 03:05:35'),
(5, 'Shop Bill', 0, '2020-12-21 03:05:35', '2020-12-21 03:05:35'),
(6, 'General Expense', 0, '2020-12-21 03:05:35', '2020-12-21 03:05:35'),
(7, 'Cosumables', 0, '2020-12-21 03:05:35', '2020-12-21 03:05:35'),
(8, 'ABC', 0, '2020-12-27 18:51:51', '2020-12-27 18:51:51');

-- --------------------------------------------------------

--
-- Table structure for table `meat_invoices`
--

CREATE TABLE `meat_invoices` (
  `id` int(11) NOT NULL,
  `total_wvat` decimal(15,2) NOT NULL,
  `invoice_total` decimal(15,2) NOT NULL,
  `vat_amount` decimal(15,2) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'paid',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meat_invoices`
--

INSERT INTO `meat_invoices` (`id`, `total_wvat`, `invoice_total`, `vat_amount`, `order_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '0.00', '300.00', '45.00', 1, '', '2020-12-27 18:20:03', '2020-12-27 18:20:03'),
(2, '0.00', '35.00', '5.25', 2, '', '2020-12-27 18:20:03', '2020-12-27 18:20:03'),
(3, '0.00', '108.00', '16.20', 3, '', '2020-12-27 18:20:03', '2020-12-27 18:20:03'),
(4, '0.00', '45.00', '6.75', 4, '', '2020-12-27 18:20:03', '2020-12-27 18:20:03'),
(5, '0.00', '251.00', '37.65', 5, '', '2020-12-27 18:20:03', '2020-12-27 18:20:03'),
(6, '0.00', '222.00', '33.30', 6, '', '2020-12-27 18:20:03', '2020-12-27 18:20:03'),
(7, '0.00', '32.00', '4.80', 7, '', '2020-12-27 18:20:03', '2020-12-27 18:20:03'),
(8, '58.65', '69.00', '69.00', 61, 'paid', '2021-01-02 20:31:26', '2021-01-02 20:31:26'),
(9, '58.65', '69.00', '69.00', 62, 'paid', '2021-01-02 20:32:45', '2021-01-02 20:32:45'),
(10, '58.65', '69.00', '69.00', 63, 'paid', '2021-01-02 20:33:06', '2021-01-02 20:33:06'),
(11, '58.65', '69.00', '69.00', 64, 'paid', '2021-01-02 20:35:45', '2021-01-02 20:35:45'),
(12, '58.65', '69.00', '10.35', 65, 'paid', '2021-01-02 20:37:25', '2021-01-02 20:37:25'),
(13, '58.65', '69.00', '10.35', 66, 'paid', '2021-01-02 20:38:15', '2021-01-02 20:38:15'),
(14, '175.95', '207.00', '31.05', 67, 'paid', '2021-01-02 20:43:35', '2021-01-02 20:43:35'),
(15, '58.65', '69.00', '10.35', 68, 'paid', '2021-01-02 20:45:12', '2021-01-02 20:45:12'),
(16, '58.65', '69.00', '10.35', 69, 'paid', '2021-01-02 20:45:33', '2021-01-02 20:45:33'),
(17, '58.65', '69.00', '10.35', 70, 'paid', '2021-01-02 20:45:56', '2021-01-02 20:45:56'),
(18, '58.65', '69.00', '10.35', 71, 'paid', '2021-01-02 20:50:52', '2021-01-02 20:50:52'),
(19, '62.05', '73.00', '10.95', 72, 'paid', '2021-01-03 21:10:56', '2021-01-03 21:10:56'),
(22, '28.90', '34.00', '5.10', 75, 'paid', '2021-01-03 21:19:51', '2021-01-03 21:19:51'),
(23, '107.52', '126.50', '18.98', 76, 'paid', '2021-01-03 21:22:11', '2021-01-03 21:22:11'),
(24, '1047.20', '1232.00', '184.80', 77, 'paid', '2021-01-03 21:23:36', '2021-01-03 21:23:36'),
(25, '181.05', '213.00', '31.95', 78, 'paid', '2021-01-03 21:24:14', '2021-01-03 21:24:14'),
(26, '53.76', '63.25', '9.49', 79, 'paid', '2021-01-03 21:24:37', '2021-01-03 21:24:37'),
(27, '19.55', '23.00', '3.45', 80, 'paid', '2021-01-03 21:26:31', '2021-01-03 21:26:31'),
(28, '53.76', '63.25', '9.49', 81, 'paid', '2021-01-03 21:28:00', '2021-01-03 21:28:00'),
(29, '17.85', '21.00', '3.15', 82, 'paid', '2021-01-03 21:28:48', '2021-01-03 21:28:48'),
(30, '53.76', '63.25', '9.49', 83, 'paid', '2021-01-03 21:30:02', '2021-01-03 21:30:02'),
(31, '53.76', '63.25', '9.49', 84, 'paid', '2021-01-03 21:31:01', '2021-01-03 21:31:01'),
(32, '53.76', '63.25', '9.49', 85, 'paid', '2021-01-03 21:31:31', '2021-01-03 21:31:31'),
(33, '104.55', '123.00', '18.45', 86, 'paid', '2021-01-03 21:33:09', '2021-01-03 21:33:09'),
(34, '53.76', '63.25', '9.49', 87, 'paid', '2021-01-03 21:35:01', '2021-01-03 21:35:01'),
(35, '215.05', '253.00', '37.95', 88, 'paid', '2021-01-03 21:39:29', '2021-01-03 21:39:29'),
(36, '53.76', '63.25', '9.49', 89, 'paid', '2021-01-03 21:40:33', '2021-01-03 21:40:33'),
(37, '161.29', '189.75', '28.46', 90, 'paid', '2021-01-03 21:41:26', '2021-01-03 21:41:26'),
(38, '0.85', '1.00', '0.15', 91, 'paid', '2021-01-03 21:42:58', '2021-01-03 21:42:58'),
(39, '0.85', '1.00', '0.15', 92, 'paid', '2021-01-03 21:43:43', '2021-01-03 21:43:43'),
(40, '53.76', '63.25', '9.49', 93, 'paid', '2021-01-03 21:46:11', '2021-01-03 21:46:11'),
(41, '53.76', '63.25', '9.49', 94, 'paid', '2021-01-03 21:47:34', '2021-01-03 21:47:34'),
(42, '0.85', '1.00', '0.15', 95, 'paid', '2021-01-03 21:52:00', '2021-01-03 21:52:00'),
(43, '39.10', '46.00', '6.90', 96, 'paid', '2021-01-03 21:52:27', '2021-01-03 21:52:27'),
(44, '53.76', '63.25', '9.49', 97, 'paid', '2021-01-04 18:37:05', '2021-01-04 18:37:05'),
(45, '369.75', '435.00', '65.25', 98, 'paid', '2021-01-04 19:08:54', '2021-01-04 19:08:54'),
(46, '180.84', '212.75', '31.91', 99, 'paid', '2021-01-04 19:11:06', '2021-01-04 19:11:06'),
(47, '53.76', '63.25', '9.49', 100, 'paid', '2021-01-04 19:12:56', '2021-01-04 19:12:56'),
(48, '215.05', '253.00', '37.95', 101, 'paid', '2021-01-04 19:13:12', '2021-01-04 19:13:12'),
(49, '10.20', '12.00', '1.80', 102, 'paid', '2021-01-04 19:13:56', '2021-01-04 19:13:56'),
(50, '537.63', '632.50', '94.87', 103, 'paid', '2021-01-04 19:57:12', '2021-01-04 19:57:12'),
(51, '648.12', '762.50', '114.38', 104, 'paid', '2021-01-05 18:47:07', '2021-01-05 18:47:07'),
(52, '53.76', '63.25', '9.49', 105, 'paid', '2021-01-05 21:10:04', '2021-01-05 21:10:04'),
(53, '42.50', '50.00', '7.50', 106, 'paid', '2021-01-05 21:52:24', '2021-01-05 21:52:24'),
(54, '107.52', '126.50', '18.98', 107, 'paid', '2021-01-06 21:35:19', '2021-01-06 21:35:19'),
(55, '0.00', '0.00', '0.00', 108, 'paid', '2021-01-06 21:35:44', '2021-01-06 21:35:44'),
(56, '0.00', '0.00', '0.00', 109, 'paid', '2021-01-06 21:42:41', '2021-01-06 21:42:41');

-- --------------------------------------------------------

--
-- Table structure for table `meat_items`
--

CREATE TABLE `meat_items` (
  `id` int(11) NOT NULL,
  `item_description` varchar(50) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `vat` decimal(15,2) NOT NULL,
  `amount_vat` decimal(15,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `sale_item_id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `uom` varchar(50) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meat_items`
--

INSERT INTO `meat_items` (`id`, `item_description`, `price`, `amount`, `vat`, `amount_vat`, `qty`, `sale_item_id`, `size`, `uom`, `order_id`, `created_at`, `updated_at`) VALUES
(1, '', '100.00', '0.00', '0.00', '0.00', 2, 5, '', '', 1, '2020-12-27 18:12:02', '2020-12-27 18:12:02'),
(2, '', '250.00', '0.00', '0.00', '0.00', 4, 6, '', '', 1, '2020-12-27 18:12:02', '2020-12-27 18:12:02'),
(3, '', '35.00', '0.00', '0.00', '0.00', 5, 8, '', '', 2, '2020-12-27 18:12:02', '2020-12-27 18:12:02'),
(4, '', '32.00', '0.00', '0.00', '0.00', 1, 6, '', '', 3, '2020-12-27 18:12:02', '2020-12-27 18:12:02'),
(5, '', '76.00', '0.00', '0.00', '0.00', 2, 7, '', '', 3, '2020-12-27 18:12:02', '2020-12-27 18:12:02'),
(6, '', '45.00', '0.00', '0.00', '0.00', 7, 5, '', '', 4, '2020-12-27 18:12:02', '2020-12-27 18:12:02'),
(7, '', '65.00', '0.00', '0.00', '0.00', 1, 5, '', '', 5, '2020-12-27 18:12:02', '2020-12-27 18:12:02'),
(8, '', '132.00', '0.00', '0.00', '0.00', 3, 7, '', '', 5, '2020-12-27 18:12:02', '2020-12-27 18:12:02'),
(9, '', '54.00', '0.00', '0.00', '0.00', 3, 6, '', '', 5, '2020-12-27 18:12:02', '2020-12-27 18:12:02'),
(10, '', '198.00', '0.00', '0.00', '0.00', 3, 6, '', '', 6, '2020-12-27 18:12:02', '2020-12-27 18:12:02'),
(11, '', '24.00', '0.00', '0.00', '0.00', 1, 5, '', '', 6, '2020-12-27 18:12:02', '2020-12-27 18:12:02'),
(12, '', '32.00', '0.00', '0.00', '0.00', 1, 8, '', '', 7, '2020-12-27 18:12:02', '2020-12-27 18:12:02'),
(13, ' \n            Raas', '23.00', '19.55', '3.45', '23.00', 1, 13, ' \n            medium', ' \n            NA', 72, '2021-01-03 21:10:56', '2021-01-03 21:10:56'),
(14, ' \n            Nus Ajal', '50.00', '42.50', '7.50', '50.00', 1, 2, ' \n            medium', ' \n            NA', 72, '2021-01-03 21:10:56', '2021-01-03 21:10:56'),
(17, ' \n            Raas', '34.00', '28.90', '5.10', '34.00', 1, 13, ' \n            large', ' \n            NA', 75, '2021-01-03 21:19:51', '2021-01-03 21:19:51'),
(18, ' \n            Laham Safi', '63.25', '107.52', '18.98', '126.50', 2, 8, ' \n             ', ' \n            NA', 76, '2021-01-03 21:22:11', '2021-01-03 21:22:11'),
(19, ' \n            Raas', '1232.00', '1047.20', '184.80', '1232.00', 1, 13, ' \n            medium', ' \n            NA', 77, '2021-01-03 21:23:36', '2021-01-03 21:23:36'),
(20, ' \n            Nus Ajal', '213.00', '181.05', '31.95', '213.00', 1, 2, ' \n            large', ' \n            NA', 78, '2021-01-03 21:24:14', '2021-01-03 21:24:14'),
(21, ' \n            Laham Safi', '63.25', '53.76', '9.49', '63.25', 1, 8, ' \n             ', ' \n            NA', 79, '2021-01-03 21:24:37', '2021-01-03 21:24:37'),
(22, ' \n            Raas', '23.00', '19.55', '3.45', '23.00', 1, 13, ' \n            large', ' \n            NA', 80, '2021-01-03 21:26:31', '2021-01-03 21:26:31'),
(23, ' \n            Laham Safi', '63.25', '53.76', '9.49', '63.25', 1, 8, ' \n             ', ' \n            NA', 81, '2021-01-03 21:28:00', '2021-01-03 21:28:00'),
(24, ' \n            Nus Ajal', '21.00', '17.85', '3.15', '21.00', 1, 2, ' \n            medium', ' \n            NA', 82, '2021-01-03 21:28:48', '2021-01-03 21:28:48'),
(25, ' \n            Laham Safi', '63.25', '53.76', '9.49', '63.25', 1, 8, ' \n             ', ' \n            NA', 83, '2021-01-03 21:30:02', '2021-01-03 21:30:02'),
(26, ' \n            Laham Safi', '63.25', '53.76', '9.49', '63.25', 1, 8, ' \n             ', ' \n            NA', 84, '2021-01-03 21:31:01', '2021-01-03 21:31:01'),
(27, ' \n            Laham Safi', '63.25', '53.76', '9.49', '63.25', 1, 8, ' \n             ', ' \n            NA', 85, '2021-01-03 21:31:31', '2021-01-03 21:31:31'),
(28, ' \n            Nus Ajal', '123.00', '104.55', '18.45', '123.00', 1, 2, ' \n            small', ' \n            NA', 86, '2021-01-03 21:33:09', '2021-01-03 21:33:09'),
(29, ' \n            Laham Safi', '63.25', '53.76', '9.49', '63.25', 1, 8, ' \n             ', ' \n            NA', 87, '2021-01-03 21:34:40', '2021-01-03 21:34:40'),
(30, ' \n            Laham Safi', '63.25', '215.05', '37.95', '253.00', 4, 8, ' \n             ', ' \n            NA', 88, '2021-01-03 21:39:29', '2021-01-03 21:39:29'),
(31, ' \n            Laham Safi', '63.25', '53.76', '9.49', '63.25', 1, 8, ' \n             ', ' \n            NA', 89, '2021-01-03 21:40:33', '2021-01-03 21:40:33'),
(32, ' \n            Laham Safi', '63.25', '161.29', '28.46', '189.75', 3, 8, ' \n             ', ' \n            NA', 90, '2021-01-03 21:41:26', '2021-01-03 21:41:26'),
(33, ' \n            Nus Ajal', '1.00', '0.85', '0.15', '1.00', 1, 2, ' \n            small', ' \n            NA', 91, '2021-01-03 21:42:58', '2021-01-03 21:42:58'),
(34, ' \n            Nus Ajal', '1.00', '0.85', '0.15', '1.00', 1, 2, ' \n            small', ' \n            NA', 92, '2021-01-03 21:43:43', '2021-01-03 21:43:43'),
(35, ' \n            Laham Safi', '63.25', '53.76', '9.49', '63.25', 1, 8, ' \n             ', ' \n            NA', 93, '2021-01-03 21:46:11', '2021-01-03 21:46:11'),
(36, ' \n            Laham Safi', '63.25', '53.76', '9.49', '63.25', 1, 8, ' \n             ', ' \n            NA', 94, '2021-01-03 21:47:34', '2021-01-03 21:47:34'),
(37, ' \n            Nus Ajal', '1.00', '0.85', '0.15', '1.00', 1, 2, ' \n            large', ' \n            NA', 95, '2021-01-03 21:52:00', '2021-01-03 21:52:00'),
(38, ' \n            Fisha', '23.00', '39.10', '6.90', '46.00', 2, 20, ' \n             ', ' \n            NA', 96, '2021-01-03 21:52:27', '2021-01-03 21:52:27'),
(39, ' \n            Laham Ajal Wast', '63.25', '53.76', '9.49', '63.25', 1, 6, ' \n             ', ' \n            NA', 97, '2021-01-04 18:37:05', '2021-01-04 18:37:05'),
(40, ' \n            Ajal Kamil ', '435.00', '369.75', '65.25', '435.00', 1, 1, ' \n            small', ' \n            NA', 98, '2021-01-04 19:08:54', '2021-01-04 19:08:54'),
(41, ' \n            Nus Ajal', '23.00', '19.55', '3.45', '23.00', 1, 2, ' \n            medium', ' \n            NA', 99, '2021-01-04 19:11:06', '2021-01-04 19:11:06'),
(42, ' \n            Laham Safi', '63.25', '161.29', '28.46', '189.75', 3, 8, ' \n             ', ' \n            NA', 99, '2021-01-04 19:11:06', '2021-01-04 19:11:06'),
(43, ' \n            Laham Safi', '63.25', '53.76', '9.49', '63.25', 1, 8, ' \n             ', ' \n            NA', 100, '2021-01-04 19:12:56', '2021-01-04 19:12:56'),
(44, ' \n            Laham Safi', '63.25', '215.05', '37.95', '253.00', 4, 8, ' \n             ', ' \n            NA', 101, '2021-01-04 19:13:12', '2021-01-04 19:13:12'),
(45, ' \n            Raas', '12.00', '10.20', '1.80', '12.00', 1, 13, ' \n            small', ' \n            NA', 102, '2021-01-04 19:13:56', '2021-01-04 19:13:56'),
(46, ' \n            Laham Safi', '63.25', '537.63', '94.87', '632.50', 10, 8, ' \n             ', ' \n            NA', 103, '2021-01-04 19:57:12', '2021-01-04 19:57:12'),
(47, ' \n            Nus Haroof', '556.00', '472.60', '83.40', '556.00', 1, 15, ' \n            full', ' \n            ', 104, '2021-01-05 18:47:06', '2021-01-05 18:47:06'),
(48, ' \n            Laham Safi', '63.25', '107.52', '18.98', '126.50', 2, 8, ' \n             ', ' \n            KG', 104, '2021-01-05 18:47:07', '2021-01-05 18:47:07'),
(49, ' \n            Haroof Kamil ', '56.00', '47.60', '8.40', '56.00', 1, 14, ' \n            quarter', ' \n            ', 104, '2021-01-05 18:47:07', '2021-01-05 18:47:07'),
(50, ' \n            Ajal Kamil ', '24.00', '20.40', '3.60', '24.00', 1, 1, ' \n            medium', ' \n            ', 104, '2021-01-05 18:47:07', '2021-01-05 18:47:07'),
(51, ' \n            Laham Safi', '63.25', '53.76', '9.49', '63.25', 1, 8, ' \n             ', ' \n            KG', 105, '2021-01-05 21:10:04', '2021-01-05 21:10:04'),
(52, ' \n            وصف الصنف', '50.00', '42.50', '7.50', '50.00', 1, 16, ' نصف', ' \n            ', 106, '2021-01-05 21:52:24', '2021-01-05 21:52:24'),
(53, ' \n            Laham Ajal Wast', '63.25', '53.76', '9.49', '63.25', 1, 6, ' \n             ', ' \n            KG', 107, '2021-01-06 21:35:19', '2021-01-06 21:35:19'),
(54, ' \n            Laham Safi', '63.25', '53.76', '9.49', '63.25', 1, 8, ' \n             ', ' \n            KG', 107, '2021-01-06 21:35:19', '2021-01-06 21:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `meat_orders`
--

CREATE TABLE `meat_orders` (
  `id` int(11) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meat_orders`
--

INSERT INTO `meat_orders` (`id`, `invoice_no`, `seller_id`, `branch_id`, `payment_method`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 1, 'CASH', 'pending', '1994-03-15 20:12:38', '2017-05-15 00:20:40'),
(2, 0, 2, 2, 'CREDIT/DEDIT CARD', 'pending', '1980-07-30 09:50:22', '1980-11-02 10:24:43'),
(3, 0, 1, 1, 'CASH', 'pending', '1990-05-09 07:45:07', '2013-10-03 13:38:33'),
(4, 0, 2, 2, 'CREDIT/DEDIT CARD', 'pending', '1989-09-20 05:14:06', '1998-06-13 16:28:40'),
(5, 0, 1, 1, 'CASH', 'pending', '1976-05-01 12:25:49', '2013-08-14 04:59:50'),
(6, 0, 2, 2, 'CREDIT/DEDIT CARD', 'pending', '1988-04-28 18:27:56', '1980-08-04 05:52:45'),
(7, 0, 1, 1, 'CASH', 'pending', '1970-07-19 12:19:02', '2010-01-07 00:15:36'),
(52, 0, 2, 1, '', 'pending', '2021-01-02 19:15:36', '2021-01-02 19:15:36'),
(56, 0, 7, 1, '', 'pending', '2021-01-02 20:04:41', '2021-01-02 20:04:41'),
(57, 0, 7, 1, 'cash', 'pending', '2021-01-02 20:09:25', '2021-01-02 20:09:25'),
(58, 0, 7, 1, 'cash', 'pending', '2021-01-02 20:09:41', '2021-01-02 20:09:41'),
(59, 0, 7, 1, 'atm', 'pending', '2021-01-02 20:11:03', '2021-01-02 20:11:03'),
(60, 0, 7, 1, 'cash', 'pending', '2021-01-02 20:29:08', '2021-01-02 20:29:08'),
(61, 0, 7, 1, 'cash', 'pending', '2021-01-02 20:31:26', '2021-01-02 20:31:26'),
(62, 0, 7, 1, 'cash', 'pending', '2021-01-02 20:32:45', '2021-01-02 20:32:45'),
(63, 0, 7, 1, 'cash', 'pending', '2021-01-02 20:33:06', '2021-01-02 20:33:06'),
(64, 0, 7, 1, 'cash', 'pending', '2021-01-02 20:35:45', '2021-01-02 20:35:45'),
(65, 0, 7, 1, 'cash', 'pending', '2021-01-02 20:37:25', '2021-01-02 20:37:25'),
(66, 0, 7, 1, 'cash', 'pending', '2021-01-02 20:38:15', '2021-01-02 20:38:15'),
(67, 0, 7, 1, 'atm', 'invoiced', '2021-01-02 20:43:35', '2021-01-02 20:43:35'),
(68, 0, 7, 1, 'cash', 'invoiced', '2021-01-02 20:45:12', '2021-01-02 20:45:12'),
(69, 0, 7, 1, 'cash', 'invoiced', '2021-01-02 20:45:33', '2021-01-02 20:45:33'),
(70, 17, 7, 1, 'cash', 'invoiced', '2021-01-02 20:45:56', '2021-01-02 20:45:56'),
(71, 18, 7, 1, 'cash', 'invoiced', '2021-01-02 20:50:52', '2021-01-02 20:50:52'),
(72, 19, 7, 1, 'cash', 'invoiced', '2021-01-03 21:10:56', '2021-01-03 21:10:56'),
(73, 0, 7, 1, 'cash', 'pending', '2021-01-03 21:15:21', '2021-01-03 21:15:21'),
(74, 0, 7, 1, 'cash', 'pending', '2021-01-03 21:17:22', '2021-01-03 21:17:22'),
(75, 22, 7, 1, 'cash', 'invoiced', '2021-01-03 21:19:51', '2021-01-03 21:19:51'),
(76, 23, 7, 1, 'atm', 'invoiced', '2021-01-03 21:22:11', '2021-01-03 21:22:11'),
(77, 24, 7, 1, 'cash', 'invoiced', '2021-01-03 21:23:36', '2021-01-03 21:23:36'),
(78, 25, 7, 1, 'atm', 'invoiced', '2021-01-03 21:24:14', '2021-01-03 21:24:14'),
(79, 26, 7, 1, 'atm', 'invoiced', '2021-01-03 21:24:36', '2021-01-03 21:24:36'),
(80, 27, 7, 1, 'cash', 'invoiced', '2021-01-03 21:26:31', '2021-01-03 21:26:31'),
(81, 28, 7, 1, 'atm', 'invoiced', '2021-01-03 21:28:00', '2021-01-03 21:28:00'),
(82, 29, 7, 1, 'atm', 'invoiced', '2021-01-03 21:28:48', '2021-01-03 21:28:48'),
(83, 30, 7, 1, 'cash', 'invoiced', '2021-01-03 21:30:02', '2021-01-03 21:30:02'),
(84, 31, 7, 1, 'cash', 'invoiced', '2021-01-03 21:31:01', '2021-01-03 21:31:01'),
(85, 32, 7, 1, 'cash', 'invoiced', '2021-01-03 21:31:31', '2021-01-03 21:31:31'),
(86, 33, 7, 1, 'cash', 'invoiced', '2021-01-03 21:33:02', '2021-01-03 21:33:02'),
(87, 34, 7, 1, 'atm', 'invoiced', '2021-01-03 21:34:14', '2021-01-03 21:34:14'),
(88, 35, 7, 1, 'cash', 'invoiced', '2021-01-03 21:39:29', '2021-01-03 21:39:29'),
(89, 36, 7, 1, 'cash', 'invoiced', '2021-01-03 21:40:33', '2021-01-03 21:40:33'),
(90, 37, 7, 1, 'cash', 'invoiced', '2021-01-03 21:41:26', '2021-01-03 21:41:26'),
(91, 38, 7, 1, 'cash', 'invoiced', '2021-01-03 21:42:58', '2021-01-03 21:42:58'),
(92, 39, 7, 1, '', 'invoiced', '2021-01-03 21:43:43', '2021-01-03 21:43:43'),
(93, 40, 7, 1, '', 'invoiced', '2021-01-03 21:46:11', '2021-01-03 21:46:11'),
(94, 41, 7, 1, 'C/D CARD', 'invoiced', '2021-01-03 21:47:34', '2021-01-03 21:47:34'),
(95, 42, 7, 1, 'CREDIT/DEBIT CARD', 'invoiced', '2021-01-03 21:52:00', '2021-01-03 21:52:00'),
(96, 43, 7, 1, 'CASH', 'invoiced', '2021-01-03 21:52:27', '2021-01-03 21:52:27'),
(97, 44, 7, 1, 'CASH', 'invoiced', '2021-01-04 18:37:05', '2021-01-04 18:37:05'),
(98, 45, 7, 1, 'CREDIT/DEBIT CARD', 'invoiced', '2021-01-04 19:08:53', '2021-01-04 19:08:53'),
(99, 46, 7, 1, 'CREDIT/DEBIT CARD', 'invoiced', '2021-01-04 19:11:06', '2021-01-04 19:11:06'),
(100, 47, 7, 1, 'CASH', 'invoiced', '2021-01-04 19:12:56', '2021-01-04 19:12:56'),
(101, 48, 7, 1, 'CASH', 'invoiced', '2021-01-04 19:13:12', '2021-01-04 19:13:12'),
(102, 49, 7, 1, 'CASH', 'invoiced', '2021-01-04 19:13:56', '2021-01-04 19:13:56'),
(103, 50, 7, 1, 'CREDIT/DEBIT CARD', 'invoiced', '2021-01-04 19:57:11', '2021-01-04 19:57:11'),
(104, 51, 7, 1, 'CREDIT/DEBIT CARD', 'invoiced', '2021-01-05 18:47:06', '2021-01-05 18:47:06'),
(105, 52, 7, 1, 'CASH', 'invoiced', '2021-01-05 21:10:04', '2021-01-05 21:10:04'),
(106, 53, 7, 1, 'CREDIT/DEBIT CARD', 'invoiced', '2021-01-05 21:52:24', '2021-01-05 21:52:24'),
(107, 54, 7, 1, 'CASH', 'invoiced', '2021-01-06 21:35:19', '2021-01-06 21:35:19'),
(108, 55, 7, 1, 'CASH', 'invoiced', '2021-01-06 21:35:44', '2021-01-06 21:35:44'),
(109, 56, 7, 1, 'CASH', 'invoiced', '2021-01-06 21:42:41', '2021-01-06 21:42:41');

-- --------------------------------------------------------

--
-- Table structure for table `meat_purchases`
--

CREATE TABLE `meat_purchases` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `purchase_item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meat_purchases`
--

INSERT INTO `meat_purchases` (`id`, `date`, `purchase_item_id`, `qty`, `amount`, `created_at`, `updated_at`) VALUES
(1, '2020-12-01', 1, 34, '50000.00', '2020-12-27 18:54:21', '2020-12-27 18:54:21'),
(2, '2020-12-16', 2, 32, '4000.00', '2020-12-27 18:54:33', '2020-12-27 18:54:33'),
(3, '2020-12-27', 1, 5, '5000.00', '2020-12-27 22:13:00', '2020-12-27 22:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `meat_purchase_items`
--

CREATE TABLE `meat_purchase_items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_allow` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meat_purchase_items`
--

INSERT INTO `meat_purchase_items` (`id`, `name`, `is_allow`, `created_at`, `updated_at`) VALUES
(1, 'Ajal', 0, '2020-12-21 03:03:12', '2020-12-21 03:03:12'),
(2, 'Haroof', 0, '2020-12-21 03:03:12', '2020-12-21 03:03:12'),
(3, 'Hashi', 0, '2020-12-21 03:03:12', '2020-12-21 03:03:12'),
(4, 'Alf Baseem', 0, '2020-12-21 03:03:12', '2020-12-21 03:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `meat_sale_categories`
--

CREATE TABLE `meat_sale_categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `is_allow` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meat_sale_categories`
--

INSERT INTO `meat_sale_categories` (`id`, `cat_name`, `is_allow`, `created_at`, `updated_at`) VALUES
(1, 'General', 0, '2020-12-21 02:35:27', '2020-12-21 02:35:27'),
(2, 'Makhsoos', 0, '2020-12-21 02:35:27', '2020-12-21 02:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `meat_sale_items`
--

CREATE TABLE `meat_sale_items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `unit_type` int(11) NOT NULL COMMENT 'NONE,KG,PC',
  `price_status` int(11) NOT NULL,
  `options_status` int(11) NOT NULL COMMENT 'NONE,(B,S,M),(F,H,Q)',
  `weight_status` int(11) NOT NULL,
  `sale_cat_id` int(11) NOT NULL,
  `is_allow` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meat_sale_items`
--

INSERT INTO `meat_sale_items` (`id`, `name`, `price`, `unit_type`, `price_status`, `options_status`, `weight_status`, `sale_cat_id`, `is_allow`, `created_at`, `updated_at`) VALUES
(1, 'Ajal Kamil ', '0.00', 0, 1, 1, 0, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(2, 'Nus Ajal', '0.00', 0, 1, 1, 0, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(3, 'Rabi Ajal', '0.00', 0, 1, 1, 0, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(4, 'Saman', '0.00', 0, 1, 1, 0, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(5, 'Laham Ajal Baladi ', '50.00', 1, 0, 0, 1, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(6, 'Laham Ajal Wast', '55.00', 1, 0, 0, 1, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(7, 'Laham Ajal Rafigh', '60.00', 1, 0, 0, 1, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(8, 'Laham Safi', '55.00', 1, 0, 0, 1, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(9, 'Faliyah', '0.00', 1, 1, 1, 1, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(10, 'Kibda Ajmal ', '0.00', 1, 1, 0, 1, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(11, 'Alowy', '0.00', 1, 1, 0, 1, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(12, 'Maqarun ', '0.00', 2, 1, 1, 1, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(13, 'Raas', '0.00', 2, 1, 1, 1, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(14, 'Haroof Kamil ', '0.00', 0, 1, 2, 0, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(15, 'Nus Haroof', '0.00', 0, 1, 2, 0, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(16, 'Rabi Haroof', '0.00', 0, 1, 2, 0, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(17, 'Laham Hashi ', '0.00', 1, 1, 1, 1, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(18, 'Kalawi', '0.00', 1, 1, 0, 1, 2, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(19, 'Ajlam', '0.00', 1, 1, 0, 1, 2, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(20, 'Fisha', '0.00', 2, 1, 0, 1, 2, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(21, 'Kirsha', '0.00', 1, 1, 0, 1, 2, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(22, 'Madan', '0.00', 1, 1, 0, 1, 2, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(23, 'Kalb', '0.00', 1, 1, 0, 1, 2, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `meat_sellers`
--

CREATE TABLE `meat_sellers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `is_allow` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meat_sellers`
--

INSERT INTO `meat_sellers` (`id`, `name`, `username`, `email`, `password`, `branch_id`, `is_allow`, `created_at`, `updated_at`) VALUES
(1, 'Seller -1', '', 'seller-1@cashier.com', '12345', 1, 0, '2020-12-21 02:31:07', '2020-12-21 02:31:07'),
(2, 'Seller -2', '', 'seller-2@cashier.com', '12345', 2, 0, '2020-12-21 02:31:07', '2020-12-21 02:31:07'),
(3, 'adnan jamil', '', '', '$2y$10$YRO2shWmXg0gbU7aRWEVOu8dWDGJMO8ItHWAYJXS3oX1ZFe3mJCmG', 1, 0, '2021-01-02 19:37:03', '2021-01-02 19:37:03'),
(4, 'adnan jamil', '', '', '$2y$10$JG1Q7JZ7CV3bXBgvhWTnIOcE5mf1cg4HZ1ox9c0fROZ7E4gFPmkYO', 1, 0, '2021-01-02 19:42:46', '2021-01-02 19:42:46'),
(5, 'adnan jamil', 'admin', '', '$2y$10$Ve1A8we0v45adH3o0u.KEuICUCqResCnzlMx.TgmZlAcBw4rKZFdm', 1, 0, '2021-01-02 19:47:37', '2021-01-02 19:47:37'),
(6, 'adnan jamil', 'admin', '', '$2y$10$vDGCUQKUIu.NogXihiBkduqQPFjBVkDrqXI8rxvgPwp4KEeCKV4c6', 1, 0, '2021-01-02 19:47:54', '2021-01-02 19:47:54'),
(7, 'adnan jamil', 'admin2', '', '$2y$10$qnTN7AeY871YiyClbYIgPerlFMPQ5m7.sno6hyigIAACm2rZrRNwa', 1, 1, '2021-01-02 19:52:02', '2021-01-02 19:52:02');

-- --------------------------------------------------------

--
-- Table structure for table `meat_warehouse`
--

CREATE TABLE `meat_warehouse` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `purchase_item_id` int(11) NOT NULL,
  `available_total_hosh` int(11) NOT NULL,
  `available_maslaq` int(11) NOT NULL,
  `available_remaining_hosh` int(11) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meat_warehouse`
--

INSERT INTO `meat_warehouse` (`id`, `date`, `purchase_item_id`, `available_total_hosh`, `available_maslaq`, `available_remaining_hosh`, `remarks`, `created_at`, `updated_at`) VALUES
(1, '2020-12-01', 1, 100, 12, 88, 'AJAL PURCHASE', '2020-12-27 18:55:20', '2020-12-27 18:55:20'),
(2, '2020-12-01', 1, 12, 8, 2, 'AJA', '2020-12-27 18:55:37', '2020-12-27 18:55:37'),
(3, '2020-12-16', 1, 22, 10, 12, 'HI', '2020-12-27 18:56:09', '2020-12-27 18:56:09'),
(4, '2020-12-01', 2, 30, 12, 18, 'DONE', '2020-12-27 18:56:31', '2020-12-27 18:56:31'),
(5, '2020-12-01', 2, 2, 2, 2, '', '2020-12-27 18:56:48', '2020-12-27 18:56:48'),
(6, '2020-12-16', 3, 20, 19, 1, 'hey', '2020-12-27 19:22:46', '2020-12-27 19:22:46'),
(7, '2020-12-16', 4, 12, 4, 8, 'done', '2020-12-27 19:23:09', '2020-12-27 19:23:09'),
(8, '2020-12-09', 1, 100, 50, 50, 'hjghj', '2020-12-27 22:18:35', '2020-12-27 22:18:35'),
(9, '2020-12-09', 2, 10, 5, 5, '', '2020-12-27 22:19:59', '2020-12-27 22:19:59');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meat_admins`
--
ALTER TABLE `meat_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meat_branches`
--
ALTER TABLE `meat_branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meat_expenses`
--
ALTER TABLE `meat_expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meat_expenses_ibfk_1` (`expense_cat_id`);

--
-- Indexes for table `meat_expense_categories`
--
ALTER TABLE `meat_expense_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meat_invoices`
--
ALTER TABLE `meat_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meat_invoices_ibfk_1` (`order_id`);

--
-- Indexes for table `meat_items`
--
ALTER TABLE `meat_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meat_items_ibfk_1` (`sale_item_id`),
  ADD KEY `meat_items_ibfk_2` (`order_id`);

--
-- Indexes for table `meat_orders`
--
ALTER TABLE `meat_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meat_orders_ibfk_1` (`branch_id`);

--
-- Indexes for table `meat_purchases`
--
ALTER TABLE `meat_purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meat_purchases_ibfk_1` (`purchase_item_id`);

--
-- Indexes for table `meat_purchase_items`
--
ALTER TABLE `meat_purchase_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meat_sale_categories`
--
ALTER TABLE `meat_sale_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meat_sale_items`
--
ALTER TABLE `meat_sale_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meat_sale_items_ibfk_1` (`sale_cat_id`);

--
-- Indexes for table `meat_sellers`
--
ALTER TABLE `meat_sellers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meat_sellers_ibfk_1` (`branch_id`);

--
-- Indexes for table `meat_warehouse`
--
ALTER TABLE `meat_warehouse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meat_warehouse_ibfk_1` (`purchase_item_id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meat_admins`
--
ALTER TABLE `meat_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meat_branches`
--
ALTER TABLE `meat_branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meat_expenses`
--
ALTER TABLE `meat_expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meat_expense_categories`
--
ALTER TABLE `meat_expense_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `meat_invoices`
--
ALTER TABLE `meat_invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `meat_items`
--
ALTER TABLE `meat_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `meat_orders`
--
ALTER TABLE `meat_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `meat_purchases`
--
ALTER TABLE `meat_purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meat_purchase_items`
--
ALTER TABLE `meat_purchase_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `meat_sale_categories`
--
ALTER TABLE `meat_sale_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meat_sale_items`
--
ALTER TABLE `meat_sale_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `meat_sellers`
--
ALTER TABLE `meat_sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `meat_warehouse`
--
ALTER TABLE `meat_warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meat_expenses`
--
ALTER TABLE `meat_expenses`
  ADD CONSTRAINT `meat_expenses_ibfk_1` FOREIGN KEY (`expense_cat_id`) REFERENCES `meat_expense_categories` (`id`);

--
-- Constraints for table `meat_invoices`
--
ALTER TABLE `meat_invoices`
  ADD CONSTRAINT `meat_invoices_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `meat_orders` (`id`);

--
-- Constraints for table `meat_items`
--
ALTER TABLE `meat_items`
  ADD CONSTRAINT `meat_items_ibfk_1` FOREIGN KEY (`sale_item_id`) REFERENCES `meat_sale_items` (`id`),
  ADD CONSTRAINT `meat_items_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `meat_orders` (`id`);

--
-- Constraints for table `meat_orders`
--
ALTER TABLE `meat_orders`
  ADD CONSTRAINT `meat_orders_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `meat_branches` (`id`),
  ADD CONSTRAINT `meat_orders_ibfk_2` FOREIGN KEY (`seller_id`) REFERENCES `meat_sellers` (`id`);

--
-- Constraints for table `meat_purchases`
--
ALTER TABLE `meat_purchases`
  ADD CONSTRAINT `meat_purchases_ibfk_1` FOREIGN KEY (`purchase_item_id`) REFERENCES `meat_purchase_items` (`id`);

--
-- Constraints for table `meat_sale_items`
--
ALTER TABLE `meat_sale_items`
  ADD CONSTRAINT `meat_sale_items_ibfk_1` FOREIGN KEY (`sale_cat_id`) REFERENCES `meat_sale_categories` (`id`);

--
-- Constraints for table `meat_sellers`
--
ALTER TABLE `meat_sellers`
  ADD CONSTRAINT `meat_sellers_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `meat_branches` (`id`);

--
-- Constraints for table `meat_warehouse`
--
ALTER TABLE `meat_warehouse`
  ADD CONSTRAINT `meat_warehouse_ibfk_1` FOREIGN KEY (`purchase_item_id`) REFERENCES `meat_purchase_items` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
