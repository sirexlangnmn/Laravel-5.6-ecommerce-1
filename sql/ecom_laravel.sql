-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2018 at 02:20 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `banner_id` int(10) UNSIGNED NOT NULL,
  `banner_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_tagline` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`banner_id`, `banner_title`, `banner_tagline`, `banner_description`, `banner_link`, `banner_image`, `banner_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 'Shopper', 'E-Commerce Website', 'Check our new and elegant Women\'s wear. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '/products/women', '2247.jpg', 1, '2018-09-17 10:13:07', '2018-09-17 10:23:02', NULL),
(13, 'Shopper', 'E-Commerce Website', 'Check our new and outstanding Men\'s wear.  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '/products/men', '44850.jpg', 1, '2018-09-17 10:14:40', '2018-09-17 10:23:15', NULL),
(14, 'Shopper', 'E-Commerce Website', 'Check out my crush ^_^', '/products/beautiful-ladies', '50883.jpg', 1, '2018-09-17 10:16:00', '2018-09-17 10:23:25', NULL),
(15, 'ddas', 'adad', 'adad', 'asdad', '33610.jpg', 0, '2018-09-17 10:35:18', '2018-09-17 10:37:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `prod_attrib_id` int(11) NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cart_id`, `product_id`, `prod_attrib_id`, `size`, `product_quantity`, `user_email`, `session_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(14, 12, 25, 'Large', 1, '', 'DZAFgDLKGbUieJN3fG6a18D5N6cphMU8IACb9a73', NULL, NULL, NULL),
(15, 12, 25, 'Large', 2, '', 'PAdPes7frCUobFTckz2nADpQyBLV0VeRD0pCe5DB', NULL, NULL, NULL),
(21, 2, 7, 'Large', 1, '', 'PAdPes7frCUobFTckz2nADpQyBLV0VeRD0pCe5DB', NULL, NULL, NULL),
(22, 2, 5, 'Small', 1, '', 'PAdPes7frCUobFTckz2nADpQyBLV0VeRD0pCe5DB', NULL, NULL, NULL),
(23, 12, 23, 'Small', 1, '', 'PAdPes7frCUobFTckz2nADpQyBLV0VeRD0pCe5DB', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category`, `parent_id`, `description`, `url`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Men', 0, 'All Men Wear and Accessories', 'men', 1, NULL, '2018-09-08 00:45:28', '2018-09-08 21:46:43', NULL),
(2, 'Women', 0, 'All Women Wear and Accessories', 'women', 1, NULL, '2018-09-08 00:45:28', '2018-09-08 21:46:34', NULL),
(3, 'Kids', 0, 'All Kids Wear and Accessories', 'kids', 1, NULL, '2018-09-08 00:45:28', '2018-09-08 21:46:24', NULL),
(4, 'Electronic Gadgets', 0, 'All Computer, Mobile, and other Electronic Gadgets', 'computer-mobile-gadgets', 1, NULL, '2018-09-08 00:45:29', '2018-09-08 00:45:29', NULL),
(5, 'Households', 0, 'All households item and products', 'households', 1, NULL, '2018-09-08 00:45:29', '2018-09-08 21:46:14', NULL),
(6, 'Food and Drinks', 0, 'All Food and Drinks', 'food-and-drinks', 1, NULL, '2018-09-08 00:45:29', '2018-09-08 21:46:01', NULL),
(7, 'Transport Unit', 0, 'All Types of Vehicles', 'transport-unit', 1, NULL, '2018-09-08 00:45:29', '2018-09-08 21:45:46', NULL),
(8, 'Beautiful Ladies', 0, 'All Beautiful Ladies', 'beautiful-ladies', 1, NULL, '2018-09-08 00:45:29', '2018-09-10 17:40:34', NULL),
(9, 'Academics Item', 0, 'All Academics Item', 'academics-item', 1, NULL, '2018-09-08 00:45:29', '2018-09-08 21:47:16', NULL),
(10, 'T-Shirt', 1, 'All Men\'s T-Shirt', 'men-t-shirt', 1, NULL, '2018-09-08 00:45:29', '2018-09-08 21:52:23', NULL),
(11, 'Pants', 1, 'All Men\'s Pants', 'men-pants', 1, NULL, '2018-09-08 00:45:29', '2018-09-08 00:45:29', NULL),
(12, 'Blouse', 2, 'All Women\'s Blouse', 'women-blouse', 1, NULL, '2018-09-08 00:45:29', '2018-09-08 00:45:29', NULL),
(13, 'Shorts', 2, 'All Women\'s Shorts', 'women-shorts', 1, NULL, '2018-09-08 00:45:29', '2018-09-08 00:45:29', NULL),
(14, 'Shorts', 3, 'All Kid\'s Shorts', 'kids-shorts-', 1, NULL, '2018-09-08 00:45:29', '2018-09-08 00:45:29', NULL),
(15, 'Computer', 4, 'All Computer', 'electronic-gadgets-computer', 1, NULL, '2018-09-08 00:45:29', '2018-09-08 21:42:10', NULL),
(16, 'Mobiles', 4, 'All Mobiles', 'electronic-gadgets-mobiles', 1, NULL, '2018-09-08 00:45:29', '2018-09-08 21:42:46', NULL),
(17, 'Washing Machine', 5, 'All Washing Machine', 'households-washing-machine', 1, NULL, '2018-09-08 00:45:29', '2018-09-08 00:45:29', NULL),
(18, 'TV', 5, 'All TV', 'househods-tv', 1, NULL, '2018-09-08 00:45:29', '2018-09-08 00:45:29', NULL),
(19, 'Wine', 6, 'All Wines', 'food-and-drinks-wine', 1, NULL, '2018-09-08 00:45:29', '2018-09-08 00:45:29', NULL),
(20, 'Cakes', 6, 'All Cakes', 'food-and-drinks-cakes', 1, NULL, '2018-09-08 00:45:29', '2018-09-08 00:45:29', NULL),
(21, 'Van', 7, 'All Van', 'transport-unit-van', 1, NULL, '2018-09-08 00:45:29', '2018-09-08 00:45:29', NULL),
(22, 'Car', 7, 'All Cars', 'transport-unit-car', 1, NULL, '2018-09-08 00:45:29', '2018-09-08 00:45:29', NULL),
(23, 'Books', 9, 'All Books', 'academics-item-books', 1, NULL, '2018-09-08 00:45:30', '2018-09-08 00:45:30', NULL),
(24, 'Notebook', 9, 'All Notebooks', 'academics-item-notebooks', 1, NULL, '2018-09-08 00:45:30', '2018-09-08 00:45:30', NULL),
(25, 'Crush', 8, 'Crush Description', 'beautiful-ladies-crush', 1, NULL, '2018-09-09 22:27:28', '2018-09-10 17:40:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(10) UNSIGNED NOT NULL,
  `coupon_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `amount_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `coupon_title`, `coupon_code`, `amount`, `amount_type`, `expiry_date`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(14, 'test', '1Pbz7EtXjcL4kObuwhuO9Q048KsXJuo7DLJ5Cz9CcXkrmtSjM0', 12.00, 'Percentage', '2018-09-10', 1, '2018-09-15 10:30:10', '2018-09-15 10:30:10', NULL),
(15, 'test 23', 'hs1oQ70MLfuC60ihQDZ9LyMqvQMVzXD1waXk29gnj1cMb7XJIt', 500.00, 'Fixed', '2018-10-31', 1, '2018-09-15 10:30:29', '2018-09-15 12:57:23', NULL),
(16, 'test 55', 'r91x9hjgq1w7G7MMsmED7rUtoqpQid3bwNuz7bSHDhRCYaroll', 20.00, 'Percentage', '2018-10-30', 0, '2018-09-15 11:49:44', '2018-09-15 11:49:44', NULL),
(17, 'asd', 'cuOUykowoiQh6rKFKN4ZU0rY5vqPzIGDYxph82QXjDYrGvLJq0', 20.00, 'Percentage', '2018-09-16', 1, '2018-09-15 12:01:31', '2018-09-15 12:57:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2018_09_02_205707_create_categories_table', 1),
(14, '2018_09_04_094015_create_products_table', 1),
(15, '2018_09_07_064307_create_products_attributes_table', 1),
(16, '2018_09_11_153413_create_products_images_table', 2),
(17, '2018_09_13_141622_create_cart_table', 3),
(18, '2018_09_14_174842_create_coupons_table', 4),
(21, '2018_09_15_091308_create_carts_table', 5),
(22, '2018_09_17_063852_create_banners_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `prod_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_and_care` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_price` double(8,2) NOT NULL,
  `prod_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `prod_name`, `prod_code`, `prod_color`, `prod_desc`, `material_and_care`, `prod_price`, `prod_image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 10, 'T-shirt', 't-shirt-blue-250', 'Mix Blue and Red', 'Mix Blue and Red T-shirt desc', 'For sophisticated Men. Hand wash only.', 250.00, '82463.png', 1, '2018-09-08 00:50:06', '2018-09-11 01:47:42', NULL),
(2, 10, 'Cotton T-Shirt', 'cts-rw-150', 'Mix Red and White', 'Mix Red and White Cotton T-Shirt Desc', 'This T-shirt is build of pure cotton. Hand wash only.', 150.00, '78346.png', 1, '2018-09-08 00:52:43', '2018-09-11 01:44:34', NULL),
(3, 12, 'Cotton Blouse', 'cb-vi-150', 'Violet', 'Cotton Blouse Desc', 'This Blouse is build of pure cotton. Flexible to fit in user body structure. Hand wash only', 150.00, '70461.png', 1, '2018-09-08 00:54:28', '2018-09-11 01:45:19', NULL),
(4, 12, 'Cotton Blouse', 'cb-pi-180', 'Pink', 'Cotton Blouse Desc', '', 180.00, '33935.png', 1, '2018-09-08 00:55:17', '2018-09-08 00:55:17', NULL),
(5, 14, 'Cotton Shorts', 'cs-assrt-50', 'Assorted', 'Cotton SHorts Desc', '', 50.00, '85755.png', 1, '2018-09-08 00:56:27', '2018-09-08 00:56:27', NULL),
(6, 15, 'Computer Set', 'comset-25000', 'Black', 'Complet set of Computer Desc', 'I7 Core processor, 8GB Ram, 1TB HardDrive', 25000.00, '28959.jpg', 1, '2018-09-08 00:57:59', '2018-09-11 01:46:16', NULL),
(7, 17, 'Washing Machine', 'wm-wh-15000', 'White and Blue', 'Waching Machine', 'qwqwqwq', 15000.00, '41385.jpg', 1, '2018-09-08 00:59:52', '2018-09-11 01:46:49', NULL),
(8, 18, 'TV', 'htv-bla-45000', 'Black', 'TV Desc', '', 45000.00, '12987.jpg', 1, '2018-09-08 01:00:42', '2018-09-08 01:00:42', NULL),
(9, 19, 'Wine', 'fadw-2500', 'Violet', 'Wine Desc', '', 2500.00, '56426.jpg', 1, '2018-09-08 01:01:54', '2018-09-10 16:10:48', NULL),
(11, 22, 'Car', 'tuc-500000', 'Red', 'Car Desc', '', 500000.00, '42372.JPG', 1, '2018-09-08 01:03:45', '2018-09-10 16:10:10', NULL),
(12, 25, 'Daphne Zaballero', 'Crush', 'Maputi', 'Crush', 'Crush Mac 2121', 8.00, '1639.jpg', 1, '2018-09-08 01:05:11', '2018-09-13 05:51:38', NULL),
(13, 25, 'Daphne Zaballero', 'Crush', 'Maputi', 'Crush', 'Crush Mac', 8.00, '75918.jpg', 1, '2018-09-08 01:07:07', '2018-09-13 05:52:45', NULL),
(14, 25, 'Daphne Zaballero', 'Crush', 'Maputi', 'Crush', 'Crush Mac', 8.00, '55002.jpg', 0, '2018-09-08 01:08:01', '2018-09-13 05:58:29', NULL),
(15, 25, 'Daphne Zaballero', 'dzcode', 'dz pc', 'dz desc', 'dz mac', 1212.00, '73040.jpg', 1, '2018-09-13 03:07:00', '2018-09-13 04:42:16', NULL),
(16, 25, 'Daphne Zaballero', 'dz2 pc', 'dz2 color', 'dz2 desc', 'dz2 mac', 88.00, '32600.jpg', 0, '2018-09-13 03:13:08', '2018-09-13 04:34:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_attributes`
--

CREATE TABLE `products_attributes` (
  `prod_attrib_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_attributes`
--

INSERT INTO `products_attributes` (`prod_attrib_id`, `product_id`, `sku`, `size`, `price`, `stock`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 't-shirt-blue-250-S', 'Small', 1110.00, 0, '2018-09-10 20:30:26', '2018-09-12 11:52:58', NULL),
(2, 1, 't-shirt-blue-250-M', 'Medium', 2220.00, 2, '2018-09-10 20:31:10', '2018-09-12 11:52:58', NULL),
(3, 1, 't-shirt-blue-250-L', 'Large', 3330.00, 0, '2018-09-10 20:32:33', '2018-09-12 11:52:58', NULL),
(4, 1, 't-shirt-blue-250-XL', 'Extra Large', 4440.00, 0, '2018-09-10 20:32:56', '2018-09-12 11:52:58', NULL),
(5, 2, 'cts-rw-150-S', 'Small', 191.00, 22, '2018-09-10 21:22:09', '2018-09-12 10:51:49', NULL),
(6, 2, 'cts-rw-150-M', 'Medium', 191.00, 22, '2018-09-10 21:22:36', '2018-09-12 10:51:49', NULL),
(7, 2, 'cts-rw-150-L', 'Large', 191.00, 22, '2018-09-10 21:22:59', '2018-09-12 10:51:49', NULL),
(14, 14, 'Crush-L', 'Large', 12.00, 12, '2018-09-12 16:01:17', '2018-09-12 16:01:17', NULL),
(15, 14, 'Crush-S', 'Small', 33.00, 33, '2018-09-12 16:01:52', '2018-09-12 16:01:52', NULL),
(16, 14, 'Crush-M', 'Medium', 22.00, 44, '2018-09-12 16:02:21', '2018-09-12 16:02:21', NULL),
(17, 16, 'asd code-S', 'Small', 77.00, 77, '2018-09-12 16:03:06', '2018-09-12 16:03:06', NULL),
(18, 16, 'asd code-M', 'Medium', 88.00, 88, '2018-09-12 16:03:25', '2018-09-12 16:03:25', NULL),
(19, 16, 'asd code-L', 'Large', 88.00, 88, '2018-09-12 16:03:37', '2018-09-12 16:03:37', NULL),
(20, 13, 'Crush-S', 'Small', 12.00, 12, '2018-09-12 16:08:27', '2018-09-12 16:08:27', NULL),
(21, 13, 'Crush-M', 'Medium', 22.00, 22, '2018-09-12 16:08:59', '2018-09-12 16:08:59', NULL),
(22, 13, 'Crush-L', 'Large', 44.00, 44, '2018-09-12 16:09:14', '2018-09-12 16:09:14', NULL),
(23, 12, 'Crush-S', 'Small', 12121.00, 1, '2018-09-12 16:10:26', '2018-09-14 02:37:36', NULL),
(24, 12, 'Crush-M', 'Medium', 44.00, 2, '2018-09-12 16:10:44', '2018-09-14 02:37:36', NULL),
(25, 12, 'Crush-L', 'Large', 44444.00, 3, '2018-09-12 16:11:01', '2018-09-14 02:37:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE `products_images` (
  `prod_image_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `prod_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`prod_image_id`, `product_id`, `prod_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(22, 2, '12605.png', '2018-09-11 19:24:43', '2018-09-11 19:24:43', NULL),
(23, 2, '40692.png', '2018-09-11 19:24:45', '2018-09-11 19:24:45', NULL),
(24, 2, '28584.png', '2018-09-11 19:24:47', '2018-09-11 19:24:47', NULL),
(25, 2, '16547.png', '2018-09-11 19:24:49', '2018-09-11 19:24:49', NULL),
(26, 2, '24895.png', '2018-09-11 19:24:51', '2018-09-11 19:24:51', NULL),
(27, 3, '44006.png', '2018-09-11 19:58:25', '2018-09-11 19:58:25', NULL),
(28, 3, '31437.png', '2018-09-11 19:58:27', '2018-09-11 19:58:27', NULL),
(29, 3, '30120.png', '2018-09-11 19:58:28', '2018-09-11 19:58:28', NULL),
(30, 3, '15010.png', '2018-09-11 19:58:30', '2018-09-11 19:58:30', NULL),
(31, 3, '48560.png', '2018-09-11 19:58:31', '2018-09-11 19:58:31', NULL),
(32, 4, '94125.png', '2018-09-11 20:33:18', '2018-09-11 20:33:18', NULL),
(33, 4, '70578.png', '2018-09-11 20:33:19', '2018-09-11 20:33:19', NULL),
(34, 4, '81286.png', '2018-09-11 20:33:20', '2018-09-11 20:33:20', NULL),
(35, 4, '53675.png', '2018-09-11 20:33:22', '2018-09-11 20:33:22', NULL),
(36, 4, '57803.png', '2018-09-11 20:33:23', '2018-09-11 20:33:23', NULL),
(37, 4, '71698.png', '2018-09-11 20:33:24', '2018-09-11 20:33:24', NULL),
(43, 1, '19574.png', '2018-09-11 22:29:40', '2018-09-11 22:29:40', NULL),
(44, 1, '29199.png', '2018-09-11 22:29:42', '2018-09-11 22:29:42', NULL),
(45, 1, '46498.png', '2018-09-11 22:29:44', '2018-09-11 22:29:44', NULL),
(46, 1, '17109.png', '2018-09-11 22:29:45', '2018-09-11 22:29:45', NULL),
(47, 1, '76955.png', '2018-09-11 22:29:47', '2018-09-11 22:29:47', NULL),
(48, 14, '38835.jpg', '2018-09-12 16:06:56', '2018-09-12 16:06:56', NULL),
(49, 14, '17077.jpg', '2018-09-12 16:06:57', '2018-09-12 16:06:57', NULL),
(50, 14, '28917.jpg', '2018-09-12 16:06:58', '2018-09-12 16:06:58', NULL),
(51, 14, '51341.jpg', '2018-09-12 16:06:58', '2018-09-12 16:06:58', NULL),
(52, 14, '16969.jpg', '2018-09-12 16:06:59', '2018-09-12 16:06:59', NULL),
(53, 13, '60495.jpg', '2018-09-12 16:09:48', '2018-09-12 16:09:48', NULL),
(54, 13, '47929.jpg', '2018-09-12 16:09:48', '2018-09-12 16:09:48', NULL),
(55, 13, '38090.jpg', '2018-09-12 16:09:49', '2018-09-12 16:09:49', NULL),
(56, 13, '12172.jpg', '2018-09-12 16:09:50', '2018-09-12 16:09:50', NULL),
(57, 13, '495.jpg', '2018-09-12 16:09:50', '2018-09-12 16:09:50', NULL),
(58, 13, '18524.jpg', '2018-09-12 16:09:51', '2018-09-12 16:09:51', NULL),
(59, 12, '19025.jpg', '2018-09-12 16:12:01', '2018-09-12 16:12:01', NULL),
(60, 12, '42517.jpg', '2018-09-12 16:12:02', '2018-09-12 16:12:02', NULL),
(61, 12, '12563.jpg', '2018-09-12 16:12:03', '2018-09-12 16:12:03', NULL),
(62, 12, '97511.jpg', '2018-09-12 16:12:04', '2018-09-12 16:12:04', NULL),
(63, 12, '4830.jpg', '2018-09-12 16:12:04', '2018-09-12 16:12:04', NULL),
(64, 12, '6227.jpg', '2018-09-12 16:12:05', '2018-09-12 16:12:05', NULL),
(65, 12, '29712.jpg', '2018-09-12 16:12:06', '2018-09-12 16:12:06', NULL),
(66, 12, '48821.jpg', '2018-09-12 16:12:07', '2018-09-12 16:12:07', NULL),
(67, 16, '26432.jpg', '2018-09-13 04:27:16', '2018-09-13 04:27:16', NULL),
(68, 16, '22895.jpg', '2018-09-13 04:27:16', '2018-09-13 04:27:16', NULL),
(69, 16, '75819.jpg', '2018-09-13 04:27:17', '2018-09-13 04:27:17', NULL),
(70, 16, '44335.jpg', '2018-09-13 04:27:18', '2018-09-13 04:27:18', NULL),
(71, 16, '36854.jpg', '2018-09-13 04:27:19', '2018-09-13 04:27:19', NULL),
(72, 16, '93046.jpg', '2018-09-13 04:27:20', '2018-09-13 04:27:20', NULL),
(73, 16, '89497.jpg', '2018-09-13 04:27:20', '2018-09-13 04:27:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'John Lorenz Ruizo', 'imlorenzruizo@gmail.com', '$2y$10$/hVKjS/ASSpyjUK/KPTMgeBQllxuk0sx2XXV6SCUPdm7ZtwrcIfyK', 1, NULL, '2018-09-08 00:45:10', '2018-09-08 00:45:10', NULL),
(2, 'Federex Potolin', 'potolin.federex@gmail.com', '$2y$10$Gj.tXZFi/2E2RtvJ48rk2.hxboVqDWVg6yVJOSe784L10wqQRrAVq', 1, NULL, '2018-09-08 00:45:11', '2018-09-08 00:45:11', NULL),
(3, 'Daphne Zaballero', 'zaballero.daphne@gmail.com', '$2y$10$LlIDcKoXuWNL1b4atrbVf.raPG/mUd31fyIqUWKSHst95B7lG4anS', 1, NULL, '2018-09-08 00:45:11', '2018-09-08 00:45:11', NULL),
(4, 'asd', 'asd@gmail.com', 'asd', 1, NULL, '2018-09-17 11:48:50', '2018-09-17 11:48:50', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `products_attributes`
--
ALTER TABLE `products_attributes`
  ADD PRIMARY KEY (`prod_attrib_id`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`prod_image_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `banner_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products_attributes`
--
ALTER TABLE `products_attributes`
  MODIFY `prod_attrib_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `prod_image_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
