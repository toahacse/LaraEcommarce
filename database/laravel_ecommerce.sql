-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2021 at 08:12 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Super Admin' COMMENT 'Admin|Super Admin',
  `remember_token` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `phone_no`, `avatar`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Toaha', 'toahacse@gmail.com', '$2y$10$D72MkLGXcfGE5sS89CLkHeQgqcCdSILKzc8.TIIztc3Mfv6eGRH3i', '122', NULL, 'Super Admin', 'bQh3bO9Wk8uAZelvA8nRdn71egHRAk3mNDMeJfxHHyLxml90y40NLVMRNnRw', '2020-06-01 01:02:13', '2020-06-01 01:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `image`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Sony', NULL, '1590126553.jpg', NULL, '2020-05-21 23:49:13', '2020-05-21 23:49:13'),
(2, 'Others', NULL, '1590126568.jpg', NULL, '2020-05-21 23:49:28', '2020-05-21 23:49:28');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `order_id`, `ip_address`, `product_quantity`, `created_at`, `updated_at`) VALUES
(33, 10, NULL, 17, '::1', 1, '2020-06-28 08:24:38', '2020-06-28 08:24:57'),
(34, 13, NULL, 17, '::1', 1, '2020-06-28 08:24:40', '2020-06-28 08:24:57'),
(35, 8, NULL, 17, '::1', 1, '2020-06-28 08:24:42', '2020-06-28 08:24:57');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', NULL, '1590126597.jpg', NULL, '2020-05-21 23:49:57', '2020-05-21 23:49:57'),
(2, 'Cloth', NULL, '1590126615.jpg', NULL, '2020-05-21 23:50:15', '2020-05-21 23:50:15'),
(3, 'Women', NULL, '1590126636.jpg', 2, '2020-05-21 23:50:36', '2020-05-21 23:50:36'),
(4, 'Man', NULL, '1590126655.jpg', 2, '2020-05-21 23:50:55', '2020-05-21 23:50:55'),
(5, 'Sony', NULL, '1593351463.jpg', 1, '2020-06-28 07:37:15', '2020-06-28 07:37:43'),
(6, 'watch', NULL, '1593351598.jpg', NULL, '2020-06-28 07:39:58', '2020-06-28 07:39:58'),
(7, 'Rolex', NULL, '1593351709.jpg', 6, '2020-06-28 07:41:49', '2020-06-28 07:42:05'),
(8, 'Baby Cloth', NULL, '1593352114.jpg', 2, '2020-06-28 07:48:34', '2020-06-28 07:48:34');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `division_id`, `created_at`, `updated_at`) VALUES
(1, 'Chattogram Sadar', 2, '2020-05-21 23:48:39', '2020-05-21 23:48:39'),
(3, 'Chattogram Jela', 2, '2020-06-26 23:34:29', '2020-06-26 23:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `priority`, `created_at`, `updated_at`) VALUES
(2, 'Chattogram', 2, '2020-05-21 23:48:26', '2020-05-21 23:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_04_30_072035_create_products_table', 1),
(5, '2020_05_03_093308_create_categories_table', 1),
(6, '2020_05_03_093347_create_brands_table', 1),
(8, '2020_05_03_094714_create_product_images_table', 1),
(9, '2020_05_10_120409_create_divisions_table', 1),
(10, '2020_05_10_120456_create_districts_table', 1),
(11, '2020_05_10_130457_create_payments_table', 1),
(12, '2020_05_15_111640_create_orders_table', 1),
(13, '2020_05_15_111719_create_carts_table', 1),
(14, '2020_05_20_111322_create_settings_table', 1),
(15, '2020_05_03_093435_create_admins_table', 2),
(16, '2020_06_27_102349_create_sliders_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `is_seen_by_admin` tinyint(1) NOT NULL DEFAULT '0',
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_charge` varchar(111) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '60',
  `custom_discount` varchar(111) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `ip_address`, `name`, `phone_no`, `shipping_address`, `email`, `message`, `is_paid`, `is_completed`, `is_seen_by_admin`, `transaction_id`, `created_at`, `updated_at`, `shipping_charge`, `custom_discount`) VALUES
(17, 1, 1, '::1', 'Md. Ismat Toaha cse', '01728104757', 'new', 'toahacse@gmail.com', NULL, 0, 0, 1, NULL, '2020-06-28 08:24:57', '2020-06-28 08:25:11', '60', '0');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` tinyint(4) NOT NULL DEFAULT '1',
  `short_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `image`, `priority`, `short_name`, `no`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Cash_in', 'cash.jpg', 1, 'cash_in', NULL, NULL, NULL, NULL),
(2, 'Bkash', 'bkash.jpg', 2, 'bkash', '01728104757', 'personal', NULL, NULL),
(3, 'Rocket', 'rocketjpg', 3, 'rocke', '01728104757', 'personal', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `price` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `offer_price` int(11) DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `title`, `description`, `slug`, `quantity`, `price`, `status`, `offer_price`, `admin_id`, `created_at`, `updated_at`) VALUES
(5, 4, 2, 'Shirt', 'Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....\r\n\r\nVery well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....\r\n\r\nVery well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....', 'shirt', 10, 500, 0, NULL, 1, '2020-06-28 07:27:46', '2020-06-28 07:27:46'),
(6, 4, 2, 'Shirt', 'Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product.... Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product.... Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....', 'shirt', 20, 400, 0, NULL, 1, '2020-06-28 07:29:31', '2020-06-28 07:29:31'),
(7, 3, 2, 'Shari', 'Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product.... Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product.... Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....', 'shari', 50, 800, 0, NULL, 1, '2020-06-28 07:31:03', '2020-06-28 07:31:03'),
(8, 3, 2, 'Shari', 'Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product.... Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product.... Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....', 'shari', 60, 1200, 0, NULL, 1, '2020-06-28 07:31:45', '2020-06-28 07:31:45'),
(9, 5, 1, 'Headphone', 'Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product.... Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product.... Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....', 'headphone', 20, 200, 0, NULL, 1, '2020-06-28 07:32:54', '2020-06-28 07:38:49'),
(10, 5, 1, 'USB-Cable', 'Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product.... Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product.... Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....', 'usb-cable', 30, 100, 0, NULL, 1, '2020-06-28 07:35:57', '2020-06-28 07:38:21'),
(11, 7, 2, 'Rolex', 'Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product.... Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product.... Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....', 'rolex', 30, 800, 0, NULL, 1, '2020-06-28 07:43:36', '2020-06-28 07:43:36'),
(12, 7, 2, 'Rolex', 'Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product.... Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product.... Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....', 'rolex', 20, 1200, 0, NULL, 1, '2020-06-28 07:44:22', '2020-06-28 07:44:22'),
(13, 8, 2, 'Tops', 'Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product.... Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product.... Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....', 'tops', 22, 600, 0, NULL, 1, '2020-06-28 07:49:49', '2020-06-28 07:49:49'),
(14, 8, 2, 'Shirt', 'Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product.... Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product.... Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....Very well Product....', 'shirt', 20, 300, 0, NULL, 1, '2020-06-28 07:50:35', '2020-06-28 07:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(6, 5, '15933508660.jpg', '2020-06-28 07:27:46', '2020-06-28 07:27:46'),
(7, 5, '15933508661.jpg', '2020-06-28 07:27:46', '2020-06-28 07:27:46'),
(8, 6, '15933509710.jpg', '2020-06-28 07:29:31', '2020-06-28 07:29:31'),
(9, 6, '15933509711.jpg', '2020-06-28 07:29:31', '2020-06-28 07:29:31'),
(10, 7, '15933510630.jpg', '2020-06-28 07:31:03', '2020-06-28 07:31:03'),
(11, 7, '15933510631.jpg', '2020-06-28 07:31:03', '2020-06-28 07:31:03'),
(12, 8, '15933511050.jpg', '2020-06-28 07:31:45', '2020-06-28 07:31:45'),
(13, 8, '15933511051.jpg', '2020-06-28 07:31:45', '2020-06-28 07:31:45'),
(14, 9, '15933511740.jpg', '2020-06-28 07:32:54', '2020-06-28 07:32:54'),
(15, 9, '15933511741.jpg', '2020-06-28 07:32:54', '2020-06-28 07:32:54'),
(16, 10, '15933513570.jpg', '2020-06-28 07:35:57', '2020-06-28 07:35:57'),
(17, 10, '15933513571.jpg', '2020-06-28 07:35:58', '2020-06-28 07:35:58'),
(18, 11, '15933518160.jpg', '2020-06-28 07:43:36', '2020-06-28 07:43:36'),
(19, 11, '15933518161.jpg', '2020-06-28 07:43:36', '2020-06-28 07:43:36'),
(20, 12, '15933518620.jpg', '2020-06-28 07:44:22', '2020-06-28 07:44:22'),
(21, 12, '15933518621.jpg', '2020-06-28 07:44:22', '2020-06-28 07:44:22'),
(22, 13, '15933521890.jpg', '2020-06-28 07:49:50', '2020-06-28 07:49:50'),
(23, 13, '15933521901.jpg', '2020-06-28 07:49:50', '2020-06-28 07:49:50'),
(24, 14, '15933522350.jpg', '2020-06-28 07:50:35', '2020-06-28 07:50:35'),
(25, 14, '15933522351.jpg', '2020-06-28 07:50:35', '2020-06-28 07:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` bigint(20) UNSIGNED NOT NULL DEFAULT '100',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `email`, `phone`, `address`, `shipping_cost`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 100, '2020-05-22 06:02:26', '2020-05-22 06:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` tinyint(3) UNSIGNED NOT NULL DEFAULT '10',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `button_text`, `button_link`, `priority`, `created_at`, `updated_at`) VALUES
(5, 'Well Shopping', '1593350357.jpg', NULL, NULL, 1, '2020-06-28 07:19:17', '2020-06-28 07:19:17'),
(6, 'Big discount', '1593350405.jpg', NULL, NULL, 2, '2020-06-28 07:20:05', '2020-06-28 07:20:05'),
(7, 'Big Online shopping mall', '1593350446.jpg', NULL, NULL, 3, '2020-06-28 07:20:46', '2020-06-28 07:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL COMMENT 'Division table ID',
  `district_id` int(10) UNSIGNED NOT NULL COMMENT 'District table ID',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0=inactive | 1=active | 2=Ban',
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `phone_no`, `email`, `email_verified_at`, `password`, `street_address`, `division_id`, `district_id`, `status`, `ip_address`, `avatar`, `shipping_address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md. Ismat Toaha', 'cse', 'md-ismat-toahacse', '01728104757', 'toahacse@gmail.com', NULL, '$2y$10$Fo2DuVmnKX3s85QMnRmQMe45KK4yF2vZ3e4JbCb0WE7zEaRgOZDiO', 'Muradpur,Chattogram', 2, 1, 1, '::1', NULL, 'new', 'n292Ate1ZZjG3n64N2QAaJifW2KsKAcKzdiTO66LuQgscnFTwmso6GwwbCsL', '2020-05-21 23:58:35', '2020-06-03 02:35:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_order_id_foreign` (`order_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_division_id_foreign` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_short_name_unique` (`short_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_phone_no_unique` (`phone_no`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
