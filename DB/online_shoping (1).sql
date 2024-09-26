-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2024 at 07:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shoping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$pcWvlrF.Zv7pAKeXwrnD/e1I7mIPouNkADzlkNkw2GT3ikiNehm7y', '2024-07-02 07:00:00', '2024-07-10 07:00:00'),
(2, 'ahmed', 'hossamgaber001001@gmail.com', 'ahmed', '2024-07-03 07:00:00', '2024-07-03 07:00:00'),
(3, 'Ali', 'hossamgaber00100ugzzzzzzzzzz1@gmail.com', 'ddddddddd', '2024-07-03 07:00:00', '2024-07-18 07:00:00'),
(4, 'hossam', 'h@gmail.com', '1212', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `img`, `created_at`, `updated_at`) VALUES
(1, 'category 1', '1720219454.jpg', '2024-07-06 05:44:15', '2024-07-06 05:44:15'),
(2, 'category 2', '1720219475.jpg', '2024-07-06 05:44:35', '2024-07-06 05:44:35'),
(3, 'category 3', '1720219490.jpg', '2024-07-06 05:44:50', '2024-07-06 05:44:50'),
(4, 'category 4', '1720219506.jpg', '2024-07-06 05:45:06', '2024-07-06 05:45:06'),
(5, 'category 5', '1720219531.jpg', '2024-07-06 05:45:31', '2024-07-06 05:45:31'),
(6, 'category 6', '1720219545.jpg', '2024-07-06 05:45:45', '2024-07-06 05:45:45'),
(7, 'category 7', '1720219561.jpg', '2024-07-06 05:46:01', '2024-07-06 05:46:01'),
(8, 'category 8', '1720219576.jpg', '2024-07-06 05:46:17', '2024-07-06 05:46:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2020_03_12_142042_create_admins_table', 1),
(6, '2024_03_12_003755_create_categories_table', 1),
(7, '2024_03_12_003915_create_products_table', 1),
(8, '2024_03_12_003953_create_orders_table', 1),
(9, '2024_03_12_004041_create_order_details_table', 1),
(10, '2024_03_23_150233_create_products_colors_table', 1),
(11, '2024_03_23_150306_create_products_sizes_table', 1),
(12, '2024_03_23_150335_create_products_color_sizes_table', 1),
(13, '2024_03_23_150421_create_product_images_table', 1),
(14, '2024_03_23_150947_create_messages_table', 1),
(15, '2024_03_23_151019_create_newsletters_table', 1),
(16, '2024_04_10_224747_create_transactions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` enum('pending','processing','shipped') NOT NULL DEFAULT 'pending',
  `address` text NOT NULL,
  `payment_status` enum('0','1') NOT NULL DEFAULT '0',
  `total_price` decimal(8,2) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `unit_price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `small_desc` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `information` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `rating` decimal(4,2) NOT NULL,
  `price` int(11) NOT NULL,
  `descount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `small_desc`, `description`, `information`, `name`, `img`, `rating`, `price`, `descount`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias?', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias', 'Product Name Goes Here', '1720219674.jpg', 4.00, 400, 20, '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(2, 1, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias?', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias', 'Product Name Goes Here 2', '1720219717.jpg', 4.00, 300, 20, '2024-07-06 05:48:37', '2024-07-06 05:48:37'),
(3, 1, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias?', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias', 'Product Name Goes Here 3', '1720219757.jpg', 4.00, 200, 20, '2024-07-06 05:49:17', '2024-07-06 05:49:17'),
(4, 2, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias?', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias', 'Product Name Goes Here 4', '1720219800.jpg', 4.00, 200, 20, '2024-07-06 05:50:00', '2024-07-06 05:50:00'),
(5, 1, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias?', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias?', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias?', 'english', 'A', 0.01, 87, 70, '2024-07-11 07:00:00', '2024-07-18 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products_colors`
--

CREATE TABLE `products_colors` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `color` enum('Black','White','Red','Blue','Green') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_colors`
--

INSERT INTO `products_colors` (`id`, `product_id`, `color`, `created_at`, `updated_at`) VALUES
(1, 1, 'Black', '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(2, 1, 'White', '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(3, 1, 'Red', '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(4, 1, 'Blue', '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(5, 1, 'Green', '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(6, 2, 'White', '2024-07-06 05:48:37', '2024-07-06 05:48:37'),
(7, 2, 'Red', '2024-07-06 05:48:37', '2024-07-06 05:48:37'),
(8, 3, 'White', '2024-07-06 05:49:17', '2024-07-06 05:49:17'),
(9, 3, 'Red', '2024-07-06 05:49:17', '2024-07-06 05:49:17'),
(10, 4, 'Black', '2024-07-06 05:50:00', '2024-07-06 05:50:00'),
(11, 4, 'White', '2024-07-06 05:50:00', '2024-07-06 05:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `products_color_sizes`
--

CREATE TABLE `products_color_sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_size_id` int(10) UNSIGNED NOT NULL,
  `product_color_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_color_sizes`
--

INSERT INTO `products_color_sizes` (`id`, `product_size_id`, `product_color_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(2, 2, 1, '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(3, 3, 1, '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(4, 4, 1, '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(5, 1, 2, '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(6, 2, 2, '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(7, 3, 2, '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(8, 4, 2, '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(9, 1, 3, '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(10, 2, 3, '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(11, 3, 3, '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(12, 4, 3, '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(13, 1, 4, '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(14, 2, 4, '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(15, 3, 4, '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(16, 4, 4, '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(17, 1, 5, '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(18, 2, 5, '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(19, 3, 5, '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(20, 4, 5, '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(21, 5, 6, '2024-07-06 05:48:37', '2024-07-06 05:48:37'),
(22, 6, 6, '2024-07-06 05:48:37', '2024-07-06 05:48:37'),
(23, 5, 7, '2024-07-06 05:48:37', '2024-07-06 05:48:37'),
(24, 6, 7, '2024-07-06 05:48:37', '2024-07-06 05:48:37'),
(25, 7, 8, '2024-07-06 05:49:17', '2024-07-06 05:49:17'),
(26, 8, 8, '2024-07-06 05:49:17', '2024-07-06 05:49:17'),
(27, 7, 9, '2024-07-06 05:49:17', '2024-07-06 05:49:17'),
(28, 8, 9, '2024-07-06 05:49:17', '2024-07-06 05:49:17'),
(29, 9, 10, '2024-07-06 05:50:00', '2024-07-06 05:50:00'),
(30, 10, 10, '2024-07-06 05:50:00', '2024-07-06 05:50:00'),
(31, 11, 10, '2024-07-06 05:50:00', '2024-07-06 05:50:00'),
(32, 9, 11, '2024-07-06 05:50:00', '2024-07-06 05:50:00'),
(33, 10, 11, '2024-07-06 05:50:00', '2024-07-06 05:50:00'),
(34, 11, 11, '2024-07-06 05:50:00', '2024-07-06 05:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `products_sizes`
--

CREATE TABLE `products_sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `size` enum('XS','S','M','L','XL') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_sizes`
--

INSERT INTO `products_sizes` (`id`, `product_id`, `size`, `created_at`, `updated_at`) VALUES
(1, 1, 'XS', '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(2, 1, 'S', '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(3, 1, 'M', '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(4, 1, 'L', '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(5, 2, 'S', '2024-07-06 05:48:37', '2024-07-06 05:48:37'),
(6, 2, 'M', '2024-07-06 05:48:37', '2024-07-06 05:48:37'),
(7, 3, 'S', '2024-07-06 05:49:17', '2024-07-06 05:49:17'),
(8, 3, 'M', '2024-07-06 05:49:17', '2024-07-06 05:49:17'),
(9, 4, 'XS', '2024-07-06 05:50:00', '2024-07-06 05:50:00'),
(10, 4, 'S', '2024-07-06 05:50:00', '2024-07-06 05:50:00'),
(11, 4, 'XL', '2024-07-06 05:50:00', '2024-07-06 05:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `img`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '11720219674.jpg', 1, '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(2, '21720219674.jpg', 1, '2024-07-06 05:47:54', '2024-07-06 05:47:54'),
(3, '11720219717.jpg', 2, '2024-07-06 05:48:37', '2024-07-06 05:48:37'),
(4, '21720219717.jpg', 2, '2024-07-06 05:48:37', '2024-07-06 05:48:37'),
(5, '11720219757.jpg', 3, '2024-07-06 05:49:17', '2024-07-06 05:49:17'),
(6, '21720219757.jpg', 3, '2024-07-06 05:49:17', '2024-07-06 05:49:17'),
(7, '11720219800.jpg', 4, '2024-07-06 05:50:00', '2024-07-06 05:50:00'),
(8, '21720219800.jpg', 4, '2024-07-06 05:50:00', '2024-07-06 05:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'hossam gg', 'mohamedf@gmail.com', NULL, '$2y$10$6CtWHDibXT338uWTJOkwEuNl/o.fQVqlXxXCHy5MJ4QAxxNMMZQUy', NULL, '2024-06-08 20:03:15', '2024-06-08 20:03:15'),
(2, 'hossam gaber hamed 2222', 'hossam33@gmail.com', NULL, '$2y$10$dT0dBcFXjskKF5TSgvx/W.TMT.2HKBqFN5pA4kbiOb8lbWuTCB8Zy', NULL, '2024-07-06 05:40:06', '2024-07-06 05:40:06'),
(3, 'hossam gaber', 'hossam@gmail.com', NULL, '$2y$10$IFjnrFRPskvm9J1JnWCWoe4c89GizZ83Ykki4sAJVrlbKOlhBzq5.', NULL, '2024-08-17 21:19:52', '2024-08-17 21:19:52'),
(4, 'hossam', 'hossajkm@gmail.com', NULL, '$2y$10$yrcwRoC469YiTAORCVHaBece2BDQDyrPfxeRdAZ/2EMeTfBD4JsJ2', NULL, '2024-09-14 21:20:26', '2024-09-14 21:20:26'),
(5, 'hossam', 'hossdam@gmail.com', NULL, '$2y$10$Fh8/TNuiJplonRqd/shKLuB1YjW.7/WUQPmNbp6RPw.NYAzMmp34S', NULL, '2024-09-15 00:24:38', '2024-09-15 00:24:38');

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_invoice_id_unique` (`invoice_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `products_colors`
--
ALTER TABLE `products_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_colors_product_id_foreign` (`product_id`);

--
-- Indexes for table `products_color_sizes`
--
ALTER TABLE `products_color_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_color_sizes_product_size_id_foreign` (`product_size_id`),
  ADD KEY `products_color_sizes_product_color_id_foreign` (`product_color_id`);

--
-- Indexes for table `products_sizes`
--
ALTER TABLE `products_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_sizes_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_invoice_id_unique` (`invoice_id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products_colors`
--
ALTER TABLE `products_colors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products_color_sizes`
--
ALTER TABLE `products_color_sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `products_sizes`
--
ALTER TABLE `products_sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_colors`
--
ALTER TABLE `products_colors`
  ADD CONSTRAINT `products_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_color_sizes`
--
ALTER TABLE `products_color_sizes`
  ADD CONSTRAINT `products_color_sizes_product_color_id_foreign` FOREIGN KEY (`product_color_id`) REFERENCES `products_colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_color_sizes_product_size_id_foreign` FOREIGN KEY (`product_size_id`) REFERENCES `products_sizes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_sizes`
--
ALTER TABLE `products_sizes`
  ADD CONSTRAINT `products_sizes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
