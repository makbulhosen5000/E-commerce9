-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 19, 2022 at 02:37 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

DROP TABLE IF EXISTS `abouts`;
CREATE TABLE IF NOT EXISTS `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, NULL, '2022-04-11 12:14:59', '2022-04-11 12:14:59');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `brands_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Bangladeshi', 1, 1, '2022-04-14 04:50:12', '2022-04-23 14:52:53'),
(3, 'Indian', 1, 1, '2022-04-15 12:17:21', '2022-04-23 14:53:07'),
(4, 'China', 1, NULL, '2022-04-23 14:53:39', '2022-04-23 14:53:39'),
(5, 'Bata', 1, NULL, '2022-05-02 10:33:00', '2022-05-02 10:33:00'),
(6, 'Apex', 1, NULL, '2022-05-02 10:33:46', '2022-05-02 10:33:46'),
(7, 'lotto', 1, NULL, '2022-05-02 10:34:22', '2022-05-02 10:34:22');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 'Electronics', NULL, NULL, '2022-04-11 14:42:11', '2022-04-11 14:42:11'),
(5, 'education', NULL, 1, '2022-04-11 14:42:27', '2022-04-14 04:34:46'),
(6, 'Foods', 1, NULL, '2022-04-14 04:36:02', '2022-04-14 04:36:02'),
(8, 'Cloths', 1, NULL, '2022-04-29 22:45:42', '2022-04-29 22:45:42'),
(9, 'Shoes', 1, NULL, '2022-05-02 10:35:28', '2022-05-02 10:35:28'),
(10, 'Table', 1, NULL, '2022-05-05 00:31:35', '2022-05-05 00:31:35');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
CREATE TABLE IF NOT EXISTS `colors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `colors_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Red', 1, NULL, '2022-04-22 14:05:46', '2022-04-22 14:05:46'),
(2, 'White', 1, NULL, '2022-04-23 15:20:46', '2022-04-23 15:20:46'),
(3, 'Yellow', 1, NULL, '2022-04-23 15:20:59', '2022-04-23 15:20:59'),
(4, 'Green', 1, NULL, '2022-04-23 15:21:09', '2022-04-23 15:21:09'),
(5, 'Black', 1, NULL, '2022-05-02 10:36:49', '2022-05-02 10:36:49'),
(6, 'Gray', 1, NULL, '2022-05-02 10:36:57', '2022-05-02 10:36:57'),
(7, 'Orange', 1, NULL, '2022-05-02 10:37:03', '2022-05-02 10:37:03'),
(8, 'Pink', 1, NULL, '2022-05-02 10:37:09', '2022-05-02 10:37:09');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `address`, `phone`, `email`, `facebook`, `twitter`, `linkedin`, `youtube`, `google`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Bosila,Mohammadpur,Dhaka', '01782283171', 'mhakash5000@gmail.com', 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.linkedin.com/in/md-makbul-hosen-5620b1158/', 'https://www.youtube.com', NULL, NULL, NULL, '2022-05-10 08:59:25', '2022-05-10 08:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `massage` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `phone`, `email`, `massage`, `created_at`, `updated_at`) VALUES
(1, 'dsdfds', '265446546', 'akash@gmail.com', 'dsfd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `count_down_timers`
--

DROP TABLE IF EXISTS `count_down_timers`;
CREATE TABLE IF NOT EXISTS `count_down_timers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `launch_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `count_down_timers`
--

INSERT INTO `count_down_timers` (`id`, `title`, `launch_date`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Timer', '2022-05-19 20:14:00', 0, '2022-05-17 08:12:31', '2022-05-17 08:14:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

DROP TABLE IF EXISTS `logos`;
CREATE TABLE IF NOT EXISTS `logos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `image`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, '1652196049.png', NULL, NULL, '2022-05-10 09:20:49', '2022-05-10 09:20:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2020_05_01_104950_create_logos_table', 1),
(6, '2020_05_02_045646_create_sliders_table', 1),
(7, '2020_05_03_140713_create_contacts_table', 1),
(8, '2020_05_03_170016_create_abouts_table', 1),
(9, '2020_05_08_144512_create_contact_us_table', 1),
(10, '2022_04_11_162200_create_categories_table', 2),
(11, '2022_04_14_101043_create_brands_table', 3),
(14, '2022_04_15_172626_create_sizes_table', 4),
(15, '2022_04_15_173432_create_colors_table', 4),
(16, '2022_04_20_192327_create_products_table', 5),
(17, '2022_04_20_193429_create_product_sizes_table', 5),
(18, '2022_04_20_193516_create_product_colors_table', 5),
(19, '2022_04_20_193640_create_product_sub_images_table', 5),
(20, '2022_04_22_191915_create_count_down_timers_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci,
  `long_desc` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `name`, `slug`, `price`, `short_desc`, `long_desc`, `image`, `created_at`, `updated_at`) VALUES
(5, 8, 1, 'T-Shirt', 't-shirt', 500, 'Good Quality', 'djfssdkjf asdfsdf gfgf', '202205011556about-02.jpg', '2022-05-01 09:56:18', '2022-05-15 11:18:16'),
(6, 8, 4, 'Jacket', 'jacket', 2000, 'fhfghgfh', 'hgfghggfdgdfgdf hgfghggfdgdfgdf hgfghggfdgdfgdf hgfghggfdgdfgdf hgfghggfdgdfgdf', '202205011602gallery-03.jpg', '2022-05-01 10:02:37', '2022-05-15 11:25:57'),
(7, 9, 6, 'Apex14', NULL, 2000, 'good quality', 'good quality with proved', '202205021640product-09.jpg', '2022-05-02 10:40:57', '2022-05-02 10:40:57'),
(8, 8, 1, 'Shirt', NULL, 500, 'ssdsdfdsf', 'sdfds sdfdsf', '202205021643product-03.jpg', '2022-05-02 10:43:20', '2022-05-02 10:43:20'),
(9, 8, 1, 'Blezer', NULL, 2500, 'ssdfds', 'sdf', '202205021646product-07.jpg', '2022-05-02 10:46:03', '2022-05-02 10:46:03'),
(10, 4, 4, 'deskfan1', NULL, 5000, 'df', NULL, '202205021650deskfan1.jpg', '2022-05-02 10:50:03', '2022-05-02 10:50:03'),
(11, 4, 3, 'giar', NULL, 5000, 'dsfds', NULL, '202205021653giar.jpg', '2022-05-02 10:53:51', '2022-05-02 10:53:51'),
(12, 8, 1, 'Pant', NULL, 2000, 'sdf', NULL, '202205021657product-07.jpg', '2022-05-02 10:57:00', '2022-05-02 10:57:00'),
(13, 9, 3, 'Lotto', NULL, 400, 'dsfds', NULL, '202205021658gallery-03.jpg', '2022-05-02 10:58:49', '2022-05-02 10:58:49'),
(14, 4, 3, 'ZigMP', NULL, 200, 'fgg', NULL, '202205021702vU1N3.jpg', '2022-05-02 11:02:24', '2022-05-02 11:02:24'),
(15, 4, 1, 'pistonsilver', NULL, 500, 'dffd', 'fdsfsdfdsf', '202205021703pistonsilver.jpg', '2022-05-02 11:03:39', '2022-05-02 11:03:39'),
(16, 4, 1, 'piston', 'piston', 500, 'regfdf', 'dfgdfgfdgfd', '202205050621pS6ct.jpg', '2022-05-05 00:21:00', '2022-05-05 00:21:00'),
(17, 10, 1, 'full width table', 'full-width-table', 1000, 'sdfsdfadsf', 'ssdfdsfdf', '2022050506421.jpg', '2022-05-05 00:42:24', '2022-05-05 00:42:24'),
(18, 10, 4, 'china-table', 'china-table', 500, 'tgfdgfds', 'asfddsfdsf', '2022050506542.png', '2022-05-05 00:54:38', '2022-05-05 00:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

DROP TABLE IF EXISTS `product_colors`;
CREATE TABLE IF NOT EXISTS `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(22, 8, 5, '2022-05-02 10:43:20', '2022-05-02 10:43:20'),
(35, 5, 3, '2022-05-15 11:18:16', '2022-05-15 11:18:16'),
(37, 6, 2, '2022-05-15 11:25:57', '2022-05-15 11:25:57'),
(34, 5, 2, '2022-05-15 11:18:16', '2022-05-15 11:18:16'),
(21, 7, 6, '2022-05-02 10:40:57', '2022-05-02 10:40:57'),
(36, 6, 1, '2022-05-15 11:25:57', '2022-05-15 11:25:57'),
(23, 9, 1, '2022-05-02 10:46:03', '2022-05-02 10:46:03'),
(24, 9, 2, '2022-05-02 10:46:03', '2022-05-02 10:46:03'),
(25, 10, 2, '2022-05-02 10:50:03', '2022-05-02 10:50:03'),
(26, 11, 2, '2022-05-02 10:53:51', '2022-05-02 10:53:51'),
(27, 12, 2, '2022-05-02 10:57:00', '2022-05-02 10:57:00'),
(28, 13, 5, '2022-05-02 10:58:49', '2022-05-02 10:58:49'),
(29, 16, 2, '2022-05-05 00:21:00', '2022-05-05 00:21:00'),
(30, 16, 3, '2022-05-05 00:21:00', '2022-05-05 00:21:00'),
(31, 17, 3, '2022-05-05 00:46:46', '2022-05-05 00:46:46'),
(32, 17, 5, '2022-05-05 00:46:46', '2022-05-05 00:46:46'),
(33, 18, 2, '2022-05-05 00:54:38', '2022-05-05 00:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

DROP TABLE IF EXISTS `product_sizes`;
CREATE TABLE IF NOT EXISTS `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `size_id`, `created_at`, `updated_at`) VALUES
(39, 5, 3, '2022-05-15 11:18:16', '2022-05-15 11:18:16'),
(38, 5, 1, '2022-05-15 11:18:16', '2022-05-15 11:18:16'),
(41, 6, 4, '2022-05-15 11:25:57', '2022-05-15 11:25:57'),
(40, 6, 3, '2022-05-15 11:25:57', '2022-05-15 11:25:57'),
(26, 8, 3, '2022-05-02 10:43:20', '2022-05-02 10:43:20'),
(25, 7, 10, '2022-05-02 10:40:57', '2022-05-02 10:40:57'),
(27, 9, 2, '2022-05-02 10:46:03', '2022-05-02 10:46:03'),
(28, 9, 4, '2022-05-02 10:46:03', '2022-05-02 10:46:03'),
(29, 10, 9, '2022-05-02 10:50:03', '2022-05-02 10:50:03'),
(30, 11, 10, '2022-05-02 10:53:51', '2022-05-02 10:53:51'),
(31, 12, 1, '2022-05-02 10:57:00', '2022-05-02 10:57:00'),
(32, 13, 9, '2022-05-02 10:58:49', '2022-05-02 10:58:49'),
(33, 14, 7, '2022-05-02 11:02:24', '2022-05-02 11:02:24'),
(34, 15, 9, '2022-05-02 11:03:39', '2022-05-02 11:03:39'),
(35, 16, 7, '2022-05-05 00:21:00', '2022-05-05 00:21:00'),
(36, 17, 11, '2022-05-05 00:46:46', '2022-05-05 00:46:46'),
(37, 18, 11, '2022-05-05 00:54:38', '2022-05-05 00:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_images`
--

DROP TABLE IF EXISTS `product_sub_images`;
CREATE TABLE IF NOT EXISTS `product_sub_images` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `sub_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sub_images`
--

INSERT INTO `product_sub_images` (`id`, `product_id`, `sub_image`, `created_at`, `updated_at`) VALUES
(14, 7, '202205021640product-09.jpg', '2022-05-02 10:40:57', '2022-05-02 10:40:57'),
(10, 5, '202205011556gallery-02.jpg', '2022-05-01 09:56:18', '2022-05-01 09:56:18'),
(11, 5, '202205011556item-cart-01.jpg', '2022-05-01 09:56:18', '2022-05-01 09:56:18'),
(12, 6, '202205011602banner-05.jpg', '2022-05-01 10:02:37', '2022-05-01 10:02:37'),
(13, 6, '202205011602blog-02.jpg', '2022-05-01 10:02:37', '2022-05-01 10:02:37'),
(15, 8, '202205021643product-02.jpg', '2022-05-02 10:43:20', '2022-05-02 10:43:20'),
(16, 8, '202205021643product-07.jpg', '2022-05-02 10:43:20', '2022-05-02 10:43:20'),
(17, 8, '202205021643product-11.jpg', '2022-05-02 10:43:20', '2022-05-02 10:43:20'),
(18, 9, '202205021646banner-02.jpg', '2022-05-02 10:46:03', '2022-05-02 10:46:03'),
(19, 9, '202205021646gallery-01.jpg', '2022-05-02 10:46:03', '2022-05-02 10:46:03'),
(20, 9, '202205021646product-detail-02.jpg', '2022-05-02 10:46:03', '2022-05-02 10:46:03'),
(21, 10, '202205021650dmogE.jpg', '2022-05-02 10:50:03', '2022-05-02 10:50:03'),
(22, 10, '202205021650HT4Cs.jpg', '2022-05-02 10:50:03', '2022-05-02 10:50:03'),
(23, 11, '202205021653g.jpg', '2022-05-02 10:53:51', '2022-05-02 10:53:51'),
(24, 11, '202205021653giar.jpg', '2022-05-02 10:53:51', '2022-05-02 10:53:51'),
(25, 12, '202205021657gallery-02.jpg', '2022-05-02 10:57:00', '2022-05-02 10:57:00'),
(26, 12, '202205021657gallery-03.jpg', '2022-05-02 10:57:00', '2022-05-02 10:57:00'),
(27, 12, '202205021657gallery-08.jpg', '2022-05-02 10:57:00', '2022-05-02 10:57:00'),
(28, 13, '202205021658gallery-08.jpg', '2022-05-02 10:58:49', '2022-05-02 10:58:49'),
(29, 13, '202205021658product-detail-01.jpg', '2022-05-02 10:58:49', '2022-05-02 10:58:49'),
(30, 14, '202205021702Kkami.png', '2022-05-02 11:02:24', '2022-05-02 11:02:24'),
(31, 14, '202205021702NDx2y.jpg', '2022-05-02 11:02:24', '2022-05-02 11:02:24'),
(32, 14, '202205021702vU1N3.jpg', '2022-05-02 11:02:24', '2022-05-02 11:02:24'),
(33, 15, '202205021703pS6ct.jpg', '2022-05-02 11:03:39', '2022-05-02 11:03:39'),
(34, 15, '202205021703ZigMP.jpg', '2022-05-02 11:03:39', '2022-05-02 11:03:39'),
(35, 16, '202205050621pistonsilver.jpg', '2022-05-05 00:21:00', '2022-05-05 00:21:00'),
(36, 16, '202205050621pS6ct.jpg', '2022-05-05 00:21:00', '2022-05-05 00:21:00'),
(37, 16, '202205050621ZigMP.jpg', '2022-05-05 00:21:00', '2022-05-05 00:21:00'),
(38, 18, '2022050506541.jpg', '2022-05-05 00:54:38', '2022-05-05 00:54:38'),
(39, 18, '2022050506543.png', '2022-05-05 00:54:38', '2022-05-05 00:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

DROP TABLE IF EXISTS `sizes`;
CREATE TABLE IF NOT EXISTS `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sizes_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'M', 1, NULL, '2022-04-19 15:07:08', '2022-04-19 15:07:08'),
(2, 'L', 1, NULL, '2022-04-19 15:07:42', '2022-04-19 15:07:42'),
(3, 'XL', 1, NULL, '2022-04-19 15:07:57', '2022-04-19 15:07:57'),
(4, 'S', 1, NULL, '2022-04-19 15:08:04', '2022-04-19 15:08:04'),
(5, 'Full-length', 1, NULL, '2022-05-02 10:29:09', '2022-05-02 10:29:09'),
(6, '10 inch', 1, NULL, '2022-05-02 10:30:24', '2022-05-02 10:30:24'),
(7, '11 inch', 1, NULL, '2022-05-02 10:30:31', '2022-05-02 10:30:31'),
(8, '12 inch', 1, NULL, '2022-05-02 10:30:38', '2022-05-02 10:30:38'),
(9, '13 inch', 1, NULL, '2022-05-02 10:30:46', '2022-05-02 10:30:46'),
(10, '14 inch', 1, NULL, '2022-05-02 10:30:51', '2022-05-02 10:30:51'),
(11, '24 inches long by 24 inches wide', 1, NULL, '2022-05-05 00:29:52', '2022-05-05 00:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `sort_title`, `long_title`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(6, '1651508612.jpg', 'Beautiful Sofa', 'Beauty of Your Room', NULL, NULL, '2022-05-02 10:23:32', '2022-05-02 10:23:32'),
(5, '1651508583.jpg', 'Beautiful Sofa', 'Beauty of Your Room', NULL, NULL, '2022-05-02 10:23:03', '2022-05-02 10:23:03'),
(7, '1651508637.jpg', 'Beautiful Sofa', 'Beauty of Your Room', NULL, NULL, '2022-05-02 10:23:57', '2022-05-02 10:23:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `phone`, `email`, `email_verified_at`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'mh akash', '01989139570', 'mhakash5000@gmail.com', NULL, '$2y$10$YsHi3g8um1Mo8Tmnc9zg.uKDSwbCITY2XzUNnmBlc0QPruRuCDVsW', NULL, NULL, '2022-04-11 11:04:56', '2022-04-11 11:04:56');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
