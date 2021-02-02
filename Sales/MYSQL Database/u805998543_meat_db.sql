-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 02, 2021 at 12:16 AM
-- Server version: 10.4.14-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u805998543_meat_db`
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
(1, 'admin', 'marwan@admin.com', 'marwan12345', 0, '2020-12-21 02:33:42', '2020-12-21 02:33:42');

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
(1, 'ملك العجول الرضيعة', 'SAUDIA ARABIA', 'JEDDAH', 'AL KANDARA', '30030208860003', 0, '2020-12-21 02:29:21', '2020-12-21 02:29:21');

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
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(8, 'Hosh', 0, '2021-02-01 16:25:33', '2021-02-01 16:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `meat_invoices`
--

CREATE TABLE `meat_invoices` (
  `id` int(11) NOT NULL,
  `invoice_total` decimal(15,2) NOT NULL,
  `vat_amount` decimal(15,2) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `total_wvat` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `meat_items`
--

CREATE TABLE `meat_items` (
  `id` int(11) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `qty` decimal(15,2) NOT NULL,
  `sale_item_id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `item_description` varchar(200) NOT NULL,
  `uom` varchar(50) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `vat` decimal(15,2) NOT NULL,
  `amount_vat` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `meat_orders`
--

CREATE TABLE `meat_orders` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `invoice_no` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `name` varchar(255) NOT NULL,
  `is_allow` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meat_sale_categories`
--

INSERT INTO `meat_sale_categories` (`id`, `name`, `is_allow`, `created_at`, `updated_at`) VALUES
(1, 'General', 0, '2020-12-21 02:35:27', '2020-12-21 02:35:27'),
(2, 'Mahmoos', 0, '2020-12-21 02:35:27', '2020-12-21 02:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `meat_sale_items`
--

CREATE TABLE `meat_sale_items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `unit_type` int(11) NOT NULL COMMENT '0 = None, 1 = Kg, 2 = Piece',
  `price_status` int(11) NOT NULL COMMENT '0 = Static Price, 1 = Dynamic Price',
  `options_status` int(11) NOT NULL COMMENT '0 = None, 1 = Small, Medium, Big, 2 = Half, Quarter, Full',
  `weight_status` int(11) NOT NULL COMMENT '0 = Not Quantity Based, 1 = Quantity Based',
  `sale_cat_id` int(11) NOT NULL,
  `is_allow` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meat_sale_items`
--

INSERT INTO `meat_sale_items` (`id`, `name`, `price`, `unit_type`, `price_status`, `options_status`, `weight_status`, `sale_cat_id`, `is_allow`, `created_at`, `updated_at`) VALUES
(1, 'عجل كامل', '0.00', 0, 1, 1, 0, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(2, 'نص عجل', '0.00', 0, 1, 1, 0, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(3, 'ربع عجل', '0.00', 0, 1, 1, 0, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(4, 'ثمن', '0.00', 0, 1, 1, 0, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(5, 'لحم عجل بلدي', '43.48', 1, 0, 0, 1, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(6, 'لحم عجل وسط', '47.83', 1, 0, 0, 1, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(7, 'لحم عجل رضيع', '52.17', 1, 0, 0, 1, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(8, 'لحم صافي', '47.83', 1, 0, 0, 1, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(9, 'فيليه', '0.00', 1, 1, 1, 1, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(10, 'كبده عجل', '0.00', 1, 1, 0, 1, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(11, 'عكاوي', '0.00', 1, 1, 0, 1, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(12, 'مقادم', '0.00', 2, 1, 1, 1, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(13, 'راس', '0.00', 2, 1, 1, 1, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(14, 'خروف كامل', '0.00', 0, 1, 2, 0, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(15, 'نص خروف', '0.00', 0, 1, 2, 0, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(16, 'ربع خروف', '0.00', 0, 1, 2, 0, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(17, 'لحم حاشي', '0.00', 1, 1, 1, 1, 1, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(18, 'كلاوي', '0.00', 1, 1, 0, 1, 2, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(19, 'عظم', '0.00', 1, 1, 0, 1, 2, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(20, 'فشة', '0.00', 2, 1, 0, 1, 2, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(21, 'كرشة', '0.00', 1, 1, 0, 1, 2, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(22, 'مصران', '0.00', 1, 1, 0, 1, 2, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15'),
(23, 'قلب', '0.00', 1, 1, 0, 1, 2, 0, '2020-12-21 02:48:15', '2020-12-21 02:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `meat_sellers`
--

CREATE TABLE `meat_sellers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `is_allow` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meat_sellers`
--

INSERT INTO `meat_sellers` (`id`, `name`, `email`, `password`, `branch_id`, `is_allow`, `created_at`, `updated_at`, `username`) VALUES
(1, 'سراج', 'cashier1', '$2y$10$7md2udBuNkQ9dibxmNqm4uhL456pvrOuJOEDjWGXuaE4wsTNPiZLq', 1, 0, '2020-12-21 02:31:07', '2020-12-21 02:31:07', 'cashier1');

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

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` int(11) NOT NULL,
  `tax_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_value` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  ADD KEY `meat_expenses_ibfk_1` (`expense_cat_id`),
  ADD KEY `seller_id` (`seller_id`);

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
  ADD KEY `meat_orders_ibfk_1` (`branch_id`),
  ADD KEY `meat_orders_ibfk_2` (`seller_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meat_expenses`
--
ALTER TABLE `meat_expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meat_expense_categories`
--
ALTER TABLE `meat_expense_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `meat_invoices`
--
ALTER TABLE `meat_invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meat_items`
--
ALTER TABLE `meat_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meat_orders`
--
ALTER TABLE `meat_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meat_purchases`
--
ALTER TABLE `meat_purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meat_warehouse`
--
ALTER TABLE `meat_warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meat_expenses`
--
ALTER TABLE `meat_expenses`
  ADD CONSTRAINT `meat_expenses_ibfk_1` FOREIGN KEY (`expense_cat_id`) REFERENCES `meat_expense_categories` (`id`),
  ADD CONSTRAINT `meat_expenses_ibfk_2` FOREIGN KEY (`seller_id`) REFERENCES `meat_sellers` (`id`);

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
