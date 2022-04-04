-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2022 at 09:36 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '2022-04-03 11:17:08', '$2y$10$0iC3bOy.heoKMDYpcc.SGOrq01rYiKXFctEkydaiMeDYKvhTumhbG', 'kUxZiP3rkz', '2022-04-03 11:17:09', '2022-04-03 11:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Acer', '2022-04-03 17:35:58', '2022-04-03 17:35:58'),
(2, 'Apple', '2022-04-03 17:37:37', '2022-04-03 17:37:37');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', '2022-04-03 17:25:33', '2022-04-03 17:25:33'),
(2, 'Laptop gaming', '2022-04-03 17:26:26', '2022-04-04 00:16:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(18, '2014_10_12_000000_create_users_table', 1),
(19, '2014_10_12_100000_create_password_resets_table', 1),
(20, '2019_08_19_000000_create_failed_jobs_table', 1),
(21, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(22, '2022_04_03_020131_create_admins_table', 1),
(23, '2022_04_03_021235_create_categories_table', 1),
(24, '2022_04_03_021320_create_brands_table', 1),
(25, '2022_04_03_021344_create_suppliers_table', 1),
(26, '2022_04_03_021345_create_products_table', 1),
(27, '2022_04_03_181318_create_orders_table', 1),
(28, '2022_04_03_181335_create_order_details_table', 1),
(29, '2022_04_04_035420_add_type_column_to_products_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `sale_price` int(11) NOT NULL DEFAULT 0,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `sale_price`, `start_date`, `end_date`, `category_id`, `brand_id`, `supplier_id`, `url`, `description`, `qty`, `status`, `created_at`, `updated_at`, `type`) VALUES
(1, 'Laptop Gaming Acer Aspire 7 A715 42G R4XX', 17290000, 0, NULL, NULL, 2, 1, 1, '/storage/images/products/aspire_a715__3__7cddf7dd053c444f9ca44f30fcd70d67.webp', '<h2><strong><span style=\"font-size:22px\">Thông số kỹ thuật:</span></strong></h2>\r\n\r\n<div class=\"scroll-table\" style=\"box-sizing: border-box; max-width: 100%; font-family: &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">\r\n<table border=\"1\" cellspacing=\"0\" class=\"mce-item-table table table-bordered\" style=\"border-collapse:collapse; border-spacing:0px; border:1px solid rgb(238, 238, 238); font-family:roboto,sans-serif; font-size:13px; height:500px; line-height:20px; margin-bottom:20px; max-width:100%; min-width:500px; width:1200px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:228.927px\"><strong><span style=\"font-size:16px\"><a href=\"https://gearvn.com/collections/cpu-bo-vi-xu-ly\" style=\"box-sizing: border-box; color: rgb(66, 139, 202); text-decoration-line: none; background: transparent; max-width: 100%;\"><span style=\"color:rgb(0, 0, 0)\">CPU</span></a></span></strong></td>\r\n			<td style=\"vertical-align:top; width:970.073px\"><span style=\"font-size:16px\">AMD Ryzen 5 – 5500U (6 nhân 12 luồng)</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:228.927px\"><strong><span style=\"font-size:16px\"><a href=\"https://gearvn.com/collections/ram-laptop\" style=\"box-sizing: border-box; color: rgb(66, 139, 202); text-decoration-line: none; background: transparent; max-width: 100%;\"><span style=\"color:rgb(0, 0, 0)\">RAM</span></a></span></strong></td>\r\n			<td style=\"vertical-align:top; width:970.073px\"><span style=\"font-size:16px\">8GB DDR4 (2x SO-DIMM socket, up to 32GB SDRAM)</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:228.927px\"><strong><span style=\"font-size:16px\"><a href=\"https://gearvn.com/collections/ssd-o-cung-the-ran\" style=\"box-sizing: border-box; color: rgb(66, 139, 202); text-decoration-line: none; background: transparent; max-width: 100%;\"><span style=\"color:rgb(0, 0, 0)\">Ổ cứng</span></a></span></strong></td>\r\n			<td style=\"vertical-align:top; width:970.073px\"><span style=\"font-size:16px\">256GB PCIe® NVMe™ M.2 SSD</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:228.927px\"><strong><span style=\"font-size:16px\"><a href=\"https://gearvn.com/collections/vga-card-man-hinh\" style=\"box-sizing: border-box; color: rgb(66, 139, 202); text-decoration-line: none; background: transparent; max-width: 100%;\"><span style=\"color:rgb(0, 0, 0)\">Card đồ họa</span></a></span></strong></td>\r\n			<td style=\"vertical-align:top; width:970.073px\"><span style=\"font-size:16px\">NVIDIA GeForce GTX 1650 4GB GDDR6</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:228.927px\"><strong><span style=\"font-size:16px\"><a href=\"https://gearvn.com/collections/man-hinh\" style=\"box-sizing: border-box; color: rgb(66, 139, 202); text-decoration-line: none; background: transparent; max-width: 100%;\"><span style=\"color:rgb(0, 0, 0)\">Màn hình</span></a></span></strong></td>\r\n			<td style=\"vertical-align:top; width:970.073px\"><span style=\"font-size:16px\">15.6\" FHD (1920 x 1080) IPS, Anti-Glare, 60Hz</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:228.927px\"><strong><span style=\"font-size:16px\"><span style=\"color:rgb(0, 0, 0)\">Cổng giao tiếp</span></span></strong></td>\r\n			<td style=\"vertical-align:top; width:970.073px\"><span style=\"font-size:16px\"><span style=\"color:rgb(0, 0, 0)\">1x USB 3.0</span><br />\r\n			<span style=\"color:rgb(0, 0, 0)\">1x USB Type C</span><br />\r\n			<span style=\"color:rgb(0, 0, 0)\">2x USB 2.0</span><br />\r\n			<span style=\"color:rgb(0, 0, 0)\">1x HDMI</span><br />\r\n			<span style=\"color:rgb(0, 0, 0)\">1x RJ45</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:228.927px\"><strong><span style=\"font-size:16px\"><a href=\"https://gearvn.com/collections/hdd-o-cung-pc\" style=\"box-sizing: border-box; color: rgb(66, 139, 202); text-decoration-line: none; background: transparent; max-width: 100%;\"><span style=\"color:rgb(0, 0, 0)\">Ổ quang</span></a></span></strong></td>\r\n			<td style=\"vertical-align:top; width:970.073px\"><span style=\"font-size:16px\"><span style=\"color:rgb(0, 0, 0)\">None</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:228.927px\"><strong><span style=\"font-size:16px\"><a href=\"https://gearvn.com/collections/thiet-bi-tai-nghe-loa-audio-chuyen-nghiep\" style=\"box-sizing: border-box; color: rgb(66, 139, 202); text-decoration-line: none; background: transparent; max-width: 100%;\"><span style=\"color:rgb(0, 0, 0)\">Audio</span></a></span></strong></td>\r\n			<td style=\"vertical-align:top; width:970.073px\"><span style=\"font-size:16px\">True Harmony; Dolby® Audio Premium</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:228.927px\"><strong><span style=\"font-size:16px\"><span style=\"color:rgb(0, 0, 0)\">Đọc thẻ nhớ</span></span></strong></td>\r\n			<td style=\"vertical-align:top; width:970.073px\"><span style=\"font-size:16px\"><span style=\"color:rgb(0, 0, 0)\">None</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:228.927px\"><strong><span style=\"font-size:16px\"><span style=\"color:rgb(0, 0, 0)\">Chuẩn LAN</span></span></strong></td>\r\n			<td style=\"vertical-align:top; width:970.073px\"><span style=\"font-size:16px\"><span style=\"color:rgb(0, 0, 0)\">10/100/1000/Gigabits Base T</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:228.927px\"><strong><span style=\"font-size:16px\"><span style=\"color:rgb(0, 0, 0)\">Chuẩn WIFI</span></span></strong></td>\r\n			<td style=\"vertical-align:top; width:970.073px\"><span style=\"font-size:16px\">Wi-Fi 6(Gig+)(802.11ax) (2x2)</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:228.927px\"><strong><span style=\"font-size:16px\"><span style=\"color:rgb(0, 0, 0)\">Bluetooth</span></span></strong></td>\r\n			<td style=\"vertical-align:top; width:970.073px\"><span style=\"font-size:16px\"><span style=\"color:rgb(0, 0, 0)\">v5.0</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:228.927px\"><strong><span style=\"font-size:16px\"><a href=\"https://gearvn.com/collections/webcam\" style=\"box-sizing: border-box; color: rgb(66, 139, 202); text-decoration-line: none; background: transparent; max-width: 100%;\"><span style=\"color:rgb(0, 0, 0)\">Webcam</span></a></span></strong></td>\r\n			<td style=\"vertical-align:top; width:970.073px\"><span style=\"font-size:16px\"><span style=\"color:rgb(0, 0, 0)\">HD Webcam</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:228.927px\"><strong><span style=\"font-size:16px\"><span style=\"color:rgb(0, 0, 0)\">Hệ điều hành</span></span></strong></td>\r\n			<td style=\"vertical-align:top; width:970.073px\"><span style=\"font-size:16px\"><a href=\"https://gearvn.com/collections/window\" style=\"box-sizing: border-box; color: rgb(66, 139, 202); text-decoration-line: none; background: transparent; max-width: 100%;\"><span style=\"color:rgb(0, 0, 0)\">Windows 11 Home</span></a></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:228.927px\"><strong><span style=\"font-size:16px\"><span style=\"color:rgb(0, 0, 0)\">Pin</span></span></strong></td>\r\n			<td style=\"vertical-align:top; width:970.073px\"><span style=\"font-size:16px\">4 Cell 48Whr</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:228.927px\"><strong><span style=\"font-size:16px\"><span style=\"color:rgb(0, 0, 0)\">Trọng lượng</span></span></strong></td>\r\n			<td style=\"vertical-align:top; width:970.073px\"><span style=\"font-size:16px\"><span style=\"color:rgb(0, 0, 0)\">2.1 kg</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:228.927px\"><strong><span style=\"font-size:16px\"><span style=\"color:rgb(0, 0, 0)\">Màu sắc</span></span></strong></td>\r\n			<td style=\"vertical-align:top; width:970.073px\"><span style=\"font-size:16px\">Đen, Có đèn bàn phím</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:228.927px\"><strong><span style=\"font-size:16px\"><span style=\"color:rgb(0, 0, 0)\">Kích thước</span></span></strong></td>\r\n			<td style=\"vertical-align:top; width:970.073px\"><span style=\"font-size:16px\">363.4 x 254.5 x 23.25 (mm)</span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', 100, 1, '2022-04-03 23:54:14', '2022-04-04 00:20:21', 0),
(2, 'MacBook Air M1 7GPU 8GB 256GB - Gold', 28490000, 23990000, '2022-04-04', '2022-04-06', 1, 2, 2, '/storage/images/products/mbp-silver-select-202011.jpg', '<h2><span style=\"font-size:24px\"><strong>MacBook Air M1 2020 7GPU 8GB 256GB MGND3SA/A - Gold</strong></span></h2>\r\n\r\n<p><span style=\"font-size:18px\"><strong>THÔNG SỐ KĨ THUẬT :&nbsp;</strong></span></p>\r\n\r\n<div class=\"scroll-table\" style=\"box-sizing: border-box; max-width: 100%; font-family: &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">\r\n<table border=\"1\" cellpadding=\"3\" cellspacing=\"0\" class=\"table table-bordered\" id=\"tblGeneralAttribute\" style=\"border-collapse:collapse; border-spacing:0px; border:1px solid rgb(238, 238, 238); font-family:roboto,sans-serif; font-size:13px; line-height:20px; margin-bottom:20px; margin-left:auto; margin-right:auto; max-width:100%; min-width:500px; width:1258px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:319px\"><span style=\"color:rgb(52, 152, 219)\"><u><span style=\"font-size:16px\"><strong>CPU</strong></span></u></span></td>\r\n			<td style=\"vertical-align:top; width:510px\"><span style=\"font-size:16px\">M1&nbsp; 8CPU 7GPU</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:319px\"><span style=\"color:rgb(52, 152, 219)\"><u><span style=\"font-size:16px\"><strong>RAM</strong></span></u></span></td>\r\n			<td style=\"vertical-align:top; width:510px\"><span style=\"font-size:16px\">8GB</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:319px\"><span style=\"color:rgb(52, 152, 219)\"><u><span style=\"font-size:16px\"><strong>Ổ lưu trữ:</strong></span></u></span></td>\r\n			<td style=\"vertical-align:top; width:510px\"><span style=\"font-size:16px\">256GB SSD</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:319px\"><span style=\"color:rgb(52, 152, 219)\"><u><span style=\"font-size:16px\"><strong>Card đồ họa</strong></span></u></span></td>\r\n			<td style=\"vertical-align:top; width:510px\"><span style=\"font-size:16px\">M1&nbsp; 8CPU 7GPU</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:319px\"><span style=\"color:rgb(52, 152, 219)\"><u><span style=\"font-size:16px\"><strong>Màn hình</strong></span></u></span></td>\r\n			<td style=\"vertical-align:top; width:510px\"><span style=\"font-size:16px\">Retina 13.3 inch (2560x1600) IPS Led Backlit True Tone</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:319px\"><span style=\"color:rgb(52, 152, 219)\"><u><span style=\"font-size:16px\"><strong>Bàn phím</strong></span></u></span></td>\r\n			<td style=\"vertical-align:top; width:510px\"><span style=\"font-size:16px\">Magic Keyboard, có LED</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:319px\"><span style=\"font-size:16px\"><strong><span style=\"color:rgb(0, 0, 0)\">Audio</span></strong></span></td>\r\n			<td style=\"vertical-align:top; width:510px\"><span style=\"font-size:16px\">Stereo speakers</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:319px\"><span style=\"font-size:16px\"><strong><span style=\"color:rgb(0, 0, 0)\">Đọc thẻ nhớ</span></strong></span></td>\r\n			<td style=\"vertical-align:top; width:510px\"><span style=\"font-size:16px\">None</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:319px\"><span style=\"font-size:16px\"><strong>Kết nối có dây (LAN)</strong></span></td>\r\n			<td style=\"vertical-align:top; width:510px\"><span style=\"font-size:16px\">None</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:319px\"><span style=\"font-size:16px\"><strong>Kết nối không dây</strong></span></td>\r\n			<td style=\"vertical-align:top; width:510px\"><span style=\"font-size:16px\">Wifi 802.11ac - Bluetooth 5.0</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:319px\"><span style=\"font-size:16px\"><strong><a href=\"https://gearvn.com/collections/webcam\" style=\"box-sizing: border-box; color: rgb(66, 139, 202); text-decoration-line: none; background: transparent; max-width: 100%;\" target=\"_blank\"><span style=\"color:rgb(0, 0, 0)\">Webcam</span></a></strong></span></td>\r\n			<td style=\"vertical-align:top; width:510px\"><span style=\"font-size:16px\">720p HD</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:319px\"><span style=\"font-size:16px\"><strong><span style=\"color:rgb(0, 0, 0)\">Cổng giao tiếp</span></strong></span></td>\r\n			<td style=\"vertical-align:top; width:510px\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p><span style=\"font-size:16px\">* Two Thunderbolt / USB 4 ports with support for::<br />\r\n			* Charging, DisplayPort, Thunderbolt 3 (up to 40 Gbps)<br />\r\n			* USB-C 3.1 Gen 2 (up to 10 Gbps)</span></p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:319px\"><span style=\"font-size:16px\"><strong><span style=\"color:rgb(0, 0, 0)\">Hệ điều hành</span></strong></span></td>\r\n			<td style=\"vertical-align:top; width:510px\"><span style=\"font-size:16px\">Mac OS</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:319px\"><span style=\"font-size:16px\"><strong><span style=\"color:rgb(0, 0, 0)\">Pin</span></strong></span></td>\r\n			<td style=\"vertical-align:top; width:510px\"><span style=\"font-size:16px\">* Up to 15 hours wireless web<br />\r\n			* Up to 18 hours Apple TV app movie playback<br />\r\n			* Built-in 49.9‑watt‑hour lithium‑polymer battery<br />\r\n			* 30W USB-C Power Adapter;&nbsp;</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:319px\"><span style=\"font-size:16px\"><strong><span style=\"color:rgb(0, 0, 0)\">Trọng lượng</span></strong></span></td>\r\n			<td style=\"vertical-align:top; width:510px\"><span style=\"font-size:16px\">1.4 kg</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:319px\"><span style=\"font-size:16px\"><strong><span style=\"color:rgb(0, 0, 0)\">Kích thước</span></strong></span></td>\r\n			<td style=\"vertical-align:top; width:510px\"><span style=\"font-size:16px\">304 x 212 x 4.1 mm</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:319px\"><span style=\"font-size:16px\"><strong>Màu sắc</strong></span></td>\r\n			<td style=\"vertical-align:top; width:510px\"><span style=\"font-size:16px\">Vàng</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:319px\"><span style=\"font-size:16px\"><strong>Bảo mật</strong></span></td>\r\n			<td style=\"vertical-align:top; width:510px\"><span style=\"font-size:16px\">Bảo mật dấu vân tay</span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', 100, 1, '2022-04-04 00:31:47', '2022-04-04 00:31:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Nhà cung cấp Acer', 'acer@gmail.com', 'TP.HCM', '0123456789', '2022-04-03 17:44:01', '2022-04-03 17:44:01'),
(2, 'Nhà cung cấp Apple', 'apple@gmail.com', 'Hà Nội', '0917391142', '2022-04-03 17:44:42', '2022-04-03 17:44:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_index` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_index` (`order_id`),
  ADD KEY `order_details_product_id_index` (`product_id`);

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
  ADD KEY `products_category_id_index` (`category_id`),
  ADD KEY `products_brand_id_index` (`brand_id`),
  ADD KEY `products_supplier_id_index` (`supplier_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_email_unique` (`email`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
