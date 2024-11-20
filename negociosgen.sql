-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 10:15 AM
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
-- Database: `negociosgen`
--

-- --------------------------------------------------------

--
-- Table structure for table `balances`
--

CREATE TABLE `balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balances`
--

INSERT INTO `balances` (`id`, `user_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 5, 1200.00, '2024-11-20 02:08:40', '2024-11-20 02:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bank_name` varchar(191) DEFAULT NULL,
  `account_number` varchar(191) DEFAULT NULL,
  `ifsc_code` varchar(191) DEFAULT NULL,
  `qrcode_path` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`id`, `user_id`, `bank_name`, `account_number`, `ifsc_code`, `qrcode_path`, `created_at`, `updated_at`) VALUES
(7, NULL, NULL, NULL, NULL, 'Commons_QR_code.png', '2024-04-13 23:44:41', '2024-04-13 23:44:41');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title1` varchar(255) DEFAULT NULL,
  `title2` varchar(255) DEFAULT NULL,
  `title3` varchar(255) DEFAULT NULL,
  `button` varchar(255) DEFAULT NULL,
  `link` text DEFAULT NULL,
  `image` varchar(191) NOT NULL,
  `page_banner` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title1`, `title2`, `title3`, `button`, `link`, `image`, `page_banner`, `created_at`, `updated_at`) VALUES
(7, '2024 latest collection test', 'Wheel', 'Body Parts', 's', 'https://bikebros.net/productbyCategory/7', 'uploads/banners/1723702217-mTcMknHgSd.png', NULL, '2024-08-15 06:10:17', '2024-08-15 14:09:16'),
(11, 'Colección 2024', 'Ruedas', 'en oferta', NULL, NULL, 'uploads/banners/1723727116-W9v4hOAxHb.png', NULL, '2024-08-15 13:05:16', '2024-08-15 13:05:16');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `like_count` varchar(255) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `details` mediumtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=published, 0=unpublished',
  `blog_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `meta_title` varchar(191) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `og_image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `uuid`, `user_id`, `like_count`, `title`, `slug`, `short_description`, `details`, `image`, `status`, `blog_category_id`, `meta_title`, `meta_description`, `meta_keywords`, `og_image`, `created_at`, `updated_at`) VALUES
(11, 'cce6855f-3f66-4dfb-affc-a6570ca0d2b2', 1, '3', 'Educación financiera para principiantes', 'Educación financiera para principiantes', '<p><span style=\"color: rgb(161, 161, 161); font-family: &quot;Space Grotesk&quot;, sans-serif; font-size: 16px; letter-spacing: normal; background-color: rgb(26, 26, 26);\">Todo lo que necesitas saber\" Resumen: Explicar la importancia de la educación finan', '<h1 class=\"cmo-hacer-un p-2\" style=\"color: rgb(255, 255, 255); font-family: &quot;Space Grotesk&quot;, sans-serif; letter-spacing: normal; background-color: rgb(0, 0, 0);\">Cómo hacer un presupuesto personal</h1><div class=\"ensear-a-los-container p-3 mb-3 rounded\" style=\"color: rgb(255, 255, 255); font-family: &quot;Space Grotesk&quot;, sans-serif; font-size: 16px; letter-spacing: normal; background-color: rgb(0, 0, 0); border-radius: var(--bs-border-radius) !important;\"><p class=\"ensear-a-los\">Enseñar a los lectores a organizar sus ingresos y gastos mensuales para que sepan exactamente a dónde va su dinero y cómo pueden ahorrar.</p><ul class=\"qu-es-un-presupuesto-y-por-qu\" style=\"padding-left: 2rem; margin-bottom: 1rem;\"><li>¿Qué es un presupuesto y por qué necesitas uno?</li><li>Herramientas y métodos para hacer un presupuesto (hojas de cálculo, apps)</li><li>Cómo categorizar tus gastos</li><li>Consejos para cumplir con tu presupuesto</li></ul></div><h1 class=\"cmo-hacer-un p-2\" style=\"color: rgb(255, 255, 255); font-family: &quot;Space Grotesk&quot;, sans-serif; letter-spacing: normal; background-color: rgb(0, 0, 0);\">Diferencia entre activos y pasivos</h1><div class=\"explicar-de-forma-container p-3 mb-3 rounded\" style=\"color: rgb(255, 255, 255); font-family: &quot;Space Grotesk&quot;, sans-serif; font-size: 16px; letter-spacing: normal; background-color: rgb(0, 0, 0); border-radius: var(--bs-border-radius) !important;\"><p class=\"ensear-a-los\">Explicar de forma sencilla qué son los activos y los pasivos, y por qué es fundamental entender esta diferencia para mejorar las finanzas.</p><ul class=\"qu-es-un-presupuesto-y-por-qu\" style=\"padding-left: 2rem; margin-bottom: 1rem;\"><li>¿Qué es un activo?</li><li>¿Qué es un pasivo?</li><li>Ejemplos de activos y pasivos comunes</li><li>Cómo enfocarte en adquirir más activos que pasivos</li></ul></div><h1 class=\"cmo-hacer-un p-2\" style=\"color: rgb(255, 255, 255); font-family: &quot;Space Grotesk&quot;, sans-serif; letter-spacing: normal; background-color: rgb(0, 0, 0);\">Consejos para ahorrar</h1><div class=\"maneras-efectivas-de-container p-3 mb-3 rounded\" style=\"color: rgb(255, 255, 255); font-family: &quot;Space Grotesk&quot;, sans-serif; font-size: 16px; letter-spacing: normal; background-color: rgb(0, 0, 0); border-radius: var(--bs-border-radius) !important;\"><p class=\"ensear-a-los\">10 maneras efectivas de ahorrar dinero cada mes. Resumen: Proporcionar estrategias prácticas y fáciles de aplicar para ayudar a los lectores a ahorrar más dinero cada mes.</p><ul class=\"qu-es-un-presupuesto-y-por-qu\" style=\"padding-left: 2rem; margin-bottom: 1rem;\"><li>Automatiza tus ahorros</li><li>Reduce gastos innecesarios</li><li>Establece metas de ahorro a corto y largo plazo</li><li>Aprovecha las ofertas y descuentos</li></ul></div>', 'uploads/blog/1730110708-w8eD870KbA.png', 1, 7, NULL, NULL, NULL, 'uploads/meta/1730110708-g388yjK1aD.png', '2024-03-29 01:52:10', '2024-11-02 02:37:31'),
(14, '6a627ed5-036d-4f00-b618-099706cb8243', 1, '2', 'Título del Blog', 'Título del Blog', '<p><span style=\"color: rgb(237, 237, 237); font-family: &quot;Space Grotesk&quot;; font-size: 20px; letter-spacing: normal; background-color: rgba(26, 26, 26, 0.7);\">Estamos dedicados a apoyar a nuestros miembros en su camino hacia el éxito.</span></p>', '<p><span style=\"color: rgb(237, 237, 237); font-family: &quot;Space Grotesk&quot;; font-size: 20px; letter-spacing: normal; background-color: rgba(26, 26, 26, 0.7);\">Estamos dedicados a apoyar a nuestros miembros en su camino hacia el éxito.</span></p>', 'uploads/blog/1730111275-XqCCj9GVJ6.png', 0, 7, NULL, NULL, NULL, 'uploads/meta/1730111275-pvT7orRFsT.png', '2024-10-28 03:50:57', '2024-11-02 02:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=active, 0=deactivated',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `uuid`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, '28828707-9415-4068-adef-12641516486a', 'Development', 'development', 1, '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(2, 'ebe375f1-0a4a-4b3a-bf56-028824c9507f', 'IT & Software', 'it-software', 1, '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(3, '61efe125-6f32-4c7a-b6fe-061a3df3dbd2', 'Data Science', 'data-science', 1, '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(5, '911dcac5-1200-4fc4-94f2-2caea6251453', 'Business', 'business', 1, '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(7, 'e0637550-8560-4e2d-b4c4-fddc8b7bf1a6', 'Design', 'design', 1, '2022-12-04 17:05:33', '2022-12-04 17:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1=active, 2=deactivate',
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `blog_id`, `user_id`, `name`, `email`, `comment`, `status`, `parent_id`, `created_at`, `updated_at`) VALUES
(4, 14, 3, NULL, NULL, 'test', 1, NULL, '2024-11-02 01:38:48', '2024-11-02 01:38:48'),
(5, 14, 3, NULL, NULL, 'cxgvsdfsd', 1, NULL, '2024-11-02 01:45:47', '2024-11-02 01:45:47'),
(6, 14, 3, NULL, NULL, 'blog comment test', 1, NULL, '2024-11-02 02:36:27', '2024-11-02 02:36:27'),
(7, 11, 3, NULL, NULL, 'edu', 1, NULL, '2024-11-02 02:37:09', '2024-11-02 02:37:09'),
(8, 14, 5, NULL, NULL, 'wow', 1, NULL, '2024-11-02 02:55:14', '2024-11-02 02:55:14'),
(9, 14, 5, NULL, NULL, 'reh', 1, 5, '2024-11-02 03:03:41', '2024-11-02 03:03:41');

-- --------------------------------------------------------

--
-- Table structure for table `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tag_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_tags`
--

INSERT INTO `blog_tags` (`id`, `blog_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(9, 4, 2, '2024-03-29 00:44:55', '2024-03-29 00:44:55'),
(10, 4, 3, '2024-03-29 00:44:55', '2024-03-29 00:44:55'),
(12, 7, 3, '2024-03-29 01:30:57', '2024-03-29 01:30:57'),
(17, 10, 3, '2024-03-29 01:46:55', '2024-03-29 01:46:55'),
(19, 3, 4, '2024-03-29 05:13:33', '2024-03-29 05:13:33'),
(23, 15, 3, '2024-10-28 03:53:46', '2024-10-28 03:53:46'),
(25, 11, 2, '2024-10-28 04:48:28', '2024-10-28 04:48:28'),
(27, 14, 1, '2024-10-28 05:14:45', '2024-10-28 05:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_feature` varchar(10) NOT NULL DEFAULT 'no' COMMENT 'yes, no',
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(191) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `og_image` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `uuid`, `name`, `image`, `is_feature`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `og_image`, `status`, `created_at`, `updated_at`) VALUES
(30, 'a9cf4942-064e-4b84-8e60-f5d70badf406', 'Tienda General', 'uploads/category/1726331916-0uIksOuW3q.png', 'yes', 'tienda-general', 'Tienda General', 'Tienda General', 'Tienda General', 'uploads/meta/1726331916-f8R4j8V3Fy.png', 1, '2024-09-14 16:38:36', '2024-09-14 16:38:36'),
(31, 'b7ece814-260a-4330-bdc8-e8de6e15fe48', 'Arshcfsd', NULL, 'no', 'Arshcfsd', NULL, NULL, NULL, NULL, 1, '2024-10-30 08:12:33', '2024-10-30 08:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `is_seen` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `sender_id`, `receiver_id`, `campaign_id`, `message`, `is_seen`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 25, 0, 'THIS IS TESTING FROM FULL STACK DEV', 0, '2024-04-08 06:53:24', '2024-04-08 06:53:24', NULL),
(2, 3, 25, 0, 'ret', 0, '2024-04-08 06:55:25', '2024-04-08 06:55:25', NULL),
(3, 3, 25, 0, 'f', 0, '2024-04-08 06:57:24', '2024-04-08 06:57:24', NULL),
(4, 3, 25, 0, 'sd', 0, '2024-04-08 07:02:12', '2024-04-08 07:02:12', NULL),
(5, 3, 25, 0, 'funcking', 0, '2024-04-08 07:02:24', '2024-04-08 07:02:24', NULL),
(6, 3, 25, 0, 'testing 555', 0, '2024-04-08 07:17:49', '2024-04-08 07:17:49', NULL),
(7, 3, 25, 0, 'testing 555', 0, '2024-04-08 07:19:14', '2024-04-08 07:19:14', NULL),
(8, 25, 26, 0, 'hi park', 0, '2024-04-08 09:04:07', '2024-04-08 09:04:07', NULL),
(9, 25, 4, 0, 'how are you alex', 0, '2024-04-08 09:07:35', '2024-04-08 09:07:35', NULL),
(10, 3, 25, 0, 'hey', 0, '2024-04-08 09:08:46', '2024-04-08 09:08:46', NULL),
(11, 3, 25, 0, 'wow', 0, '2024-04-08 09:16:21', '2024-04-08 09:16:21', NULL),
(12, 25, 3, 0, 'sd', 0, '2024-04-08 09:17:32', '2024-04-08 09:17:32', NULL),
(13, 25, 3, 0, 'THIS IS TESTING FROM FULL STACK DEV', 0, '2024-04-08 09:17:55', '2024-04-08 09:17:55', NULL),
(14, 3, 25, 0, 'fgdxgfgdf shitttttttttttttttttttttttt', 0, '2024-04-08 09:18:38', '2024-04-08 09:18:38', NULL),
(15, 25, 3, 0, 'cfgdfg', 0, '2024-04-08 09:21:48', '2024-04-08 09:21:48', NULL),
(16, 3, 25, 0, 'eneough', 0, '2024-04-08 09:24:08', '2024-04-08 09:24:08', NULL),
(17, 25, 3, 0, 'aisa', 0, '2024-04-08 09:24:58', '2024-04-08 09:24:58', NULL),
(18, 3, 25, 0, 'image', 0, '2024-04-08 09:25:28', '2024-04-08 09:25:28', NULL),
(19, 3, 1, 0, 'Hey You', 0, '2024-04-08 12:06:11', '2024-04-08 12:06:11', NULL),
(20, 1, 3, 0, 'what', 0, '2024-04-08 12:06:39', '2024-04-08 12:06:39', NULL),
(21, 3, 1, 0, 'you get my idea', 0, '2024-04-08 12:07:46', '2024-04-08 12:07:46', NULL),
(22, 1, 3, 0, 'now looks good', 0, '2024-04-08 12:59:16', '2024-04-08 12:59:16', NULL),
(23, 3, 1, 0, 'yeah', 0, '2024-04-08 12:59:32', '2024-04-08 12:59:32', NULL),
(24, 1, 3, 0, 'df', 0, '2024-04-08 23:06:18', '2024-04-08 23:06:18', NULL),
(25, 1, 3, 0, 'pusher', 0, '2024-04-08 23:16:08', '2024-04-08 23:16:08', NULL),
(26, 3, 1, 0, 'ok', 0, '2024-04-08 23:17:02', '2024-04-08 23:17:02', NULL),
(27, 1, 3, 0, 'dsf', 0, '2024-04-08 23:17:29', '2024-04-08 23:17:29', NULL),
(28, 1, 3, 0, 'cvbc', 0, '2024-04-08 23:19:30', '2024-04-08 23:19:30', NULL),
(29, 3, 1, 0, 'p', 0, '2024-04-08 23:51:31', '2024-04-08 23:51:31', NULL),
(30, 4, 3, 0, 'hi arsh g', 0, '2024-04-08 23:56:22', '2024-04-08 23:56:22', NULL),
(31, 3, 4, 0, 'yes', 0, '2024-04-08 23:56:39', '2024-04-08 23:56:39', NULL),
(32, 3, 4, 0, 'index', 0, '2024-04-09 00:00:42', '2024-04-09 00:00:42', NULL),
(33, 3, 4, 0, 'dfsd', 0, '2024-04-09 00:01:12', '2024-04-09 00:01:12', NULL),
(34, 4, 3, 0, 'dsfsfgfhgh', 0, '2024-04-09 00:01:21', '2024-04-09 00:01:21', NULL),
(35, 4, 3, 0, 'cha', 0, '2024-04-09 00:04:46', '2024-04-09 00:04:46', NULL),
(36, 3, 4, 0, 'okk', 0, '2024-04-09 00:05:27', '2024-04-09 00:05:27', NULL),
(37, 3, 4, 0, 'n', 0, '2024-04-09 00:06:58', '2024-04-09 00:06:58', NULL),
(38, 4, 3, 0, 'what', 0, '2024-04-09 00:07:18', '2024-04-09 00:07:18', NULL),
(39, 4, 3, 0, 'vcc', 0, '2024-04-09 00:09:39', '2024-04-09 00:09:39', NULL),
(40, 3, 4, 0, 'dfgxcvnjhkjhk', 0, '2024-04-09 00:10:00', '2024-04-09 00:10:00', NULL),
(41, 3, 4, 0, 'difficult', 0, '2024-04-09 00:21:07', '2024-04-09 00:21:07', NULL),
(42, 4, 3, 0, 'where', 0, '2024-04-09 00:22:48', '2024-04-09 00:22:48', NULL),
(43, 4, 3, 0, 'df', 0, '2024-04-09 00:32:55', '2024-04-09 00:32:55', NULL),
(44, 3, 4, 0, 'rtyt', 0, '2024-04-09 00:33:14', '2024-04-09 00:33:14', NULL),
(45, 4, 3, 0, 'chat event', 0, '2024-04-09 00:45:07', '2024-04-09 00:45:07', NULL),
(46, 3, 4, 0, 'k', 0, '2024-04-09 00:45:41', '2024-04-09 00:45:41', NULL),
(47, 4, 3, 0, 'pppppp', 0, '2024-04-09 00:57:55', '2024-04-09 00:57:55', NULL),
(48, 4, 3, 0, 'fuck you', 0, '2024-04-09 01:05:15', '2024-04-09 01:05:15', NULL),
(49, 3, 4, 0, 'bitvh', 0, '2024-04-09 01:05:46', '2024-04-09 01:05:46', NULL),
(50, 3, 4, 0, 'testing', 0, '2024-04-09 01:17:36', '2024-04-09 01:17:36', NULL),
(51, 4, 3, 0, 'mfgfdg', 0, '2024-04-09 01:22:27', '2024-04-09 01:22:27', NULL),
(52, 3, 4, 0, 'fdgd', 0, '2024-04-09 01:23:03', '2024-04-09 01:23:03', NULL),
(53, 4, 3, 0, 'testing 5', 0, '2024-04-09 01:23:32', '2024-04-09 01:23:32', NULL),
(54, 3, 4, 0, 'wow it\'s working fine now', 0, '2024-04-09 01:23:51', '2024-04-09 01:23:51', NULL),
(55, 4, 3, 0, 'congrate', 0, '2024-04-09 01:24:29', '2024-04-09 01:24:29', NULL),
(56, 3, 4, 0, 'really', 0, '2024-04-09 01:24:46', '2024-04-09 01:24:46', NULL),
(57, 4, 3, 0, 'something wrog', 0, '2024-04-09 01:26:11', '2024-04-09 01:26:11', NULL),
(58, 3, 4, 0, 'no', 0, '2024-04-09 01:26:48', '2024-04-09 01:26:48', NULL),
(59, 4, 3, 0, 'dfg', 0, '2024-04-09 01:27:17', '2024-04-09 01:27:17', NULL),
(60, 3, 4, 0, 'dsf', 0, '2024-04-09 01:32:31', '2024-04-09 01:32:31', NULL),
(61, 4, 3, 0, 'ghdfghdf', 0, '2024-04-09 01:32:41', '2024-04-09 01:32:41', NULL),
(62, 3, 4, 0, 'hgj', 0, '2024-04-09 01:32:51', '2024-04-09 01:32:51', NULL),
(63, 3, 4, 0, 'jhkhk', 0, '2024-04-09 01:33:02', '2024-04-09 01:33:02', NULL),
(64, 4, 3, 0, 'ds', 0, '2024-04-09 01:37:44', '2024-04-09 01:37:44', NULL),
(65, 3, 4, 0, 'fgh', 0, '2024-04-09 01:37:57', '2024-04-09 01:37:57', NULL),
(66, 4, 3, 0, 'ghh', 0, '2024-04-09 01:38:04', '2024-04-09 01:38:04', NULL),
(67, 3, 4, 0, 'gfh', 0, '2024-04-09 01:38:08', '2024-04-09 01:38:08', NULL),
(68, 3, 4, 0, 'ghj', 0, '2024-04-09 01:38:36', '2024-04-09 01:38:36', NULL),
(69, 3, 4, 0, 'hjgjg', 0, '2024-04-09 01:40:14', '2024-04-09 01:40:14', NULL),
(70, 4, 3, 0, 'dfgdg', 0, '2024-04-09 01:45:02', '2024-04-09 01:45:02', NULL),
(71, 3, 4, 0, 'h', 0, '2024-04-09 01:52:31', '2024-04-09 01:52:31', NULL),
(72, 4, 3, 0, 'sd', 0, '2024-04-09 01:52:39', '2024-04-09 01:52:39', NULL),
(73, 3, 4, 0, 'final', 0, '2024-04-09 02:01:01', '2024-04-09 02:01:01', NULL),
(74, 4, 3, 0, 'testing', 0, '2024-04-09 02:01:10', '2024-04-09 02:01:10', NULL),
(75, 4, 3, 0, 'notify', 0, '2024-04-09 02:31:55', '2024-04-09 02:31:55', NULL),
(76, 4, 3, 0, 'dfsdfsfsdfds', 0, '2024-04-09 02:41:27', '2024-04-09 02:41:27', NULL),
(77, 3, 4, 0, 'what', 0, '2024-04-09 02:41:51', '2024-04-09 02:41:51', NULL),
(78, 4, 3, 0, 'nnnnnnn', 0, '2024-04-09 02:43:52', '2024-04-09 02:43:52', NULL),
(79, 4, 3, 0, 'adm', 0, '2024-04-09 02:50:39', '2024-04-09 02:50:39', NULL),
(80, 3, 4, 0, 'THIS IS TESTING FROM FULL STACK DEV', 0, '2024-04-09 03:40:08', '2024-04-09 03:40:08', NULL),
(81, 4, 3, 0, 'done', 0, '2024-04-09 03:40:19', '2024-04-09 03:40:19', NULL),
(82, 3, 4, 0, 'check', 0, '2024-04-09 03:45:25', '2024-04-09 03:45:25', NULL),
(83, 4, 3, 0, 'fgdf', 0, '2024-04-09 03:45:56', '2024-04-09 03:45:56', NULL),
(84, 4, 3, 0, 'fdgfhgfhfh', 0, '2024-04-09 03:45:59', '2024-04-09 03:45:59', NULL),
(85, 4, 3, 0, 'ertete', 0, '2024-04-09 03:46:02', '2024-04-09 03:46:02', NULL),
(86, 4, 3, 0, 'iouo', 0, '2024-04-09 03:59:09', '2024-04-09 03:59:09', NULL),
(87, 4, 3, 0, 'bbhhgjghj', 0, '2024-04-09 03:59:14', '2024-04-09 03:59:14', NULL),
(88, 3, 4, 0, 'fghfdgfd', 0, '2024-04-09 04:00:24', '2024-04-09 04:00:24', NULL),
(89, 3, 4, 0, 'vbnvn', 0, '2024-04-09 04:00:29', '2024-04-09 04:00:29', NULL),
(90, 4, 3, 0, 'vbvzzx', 0, '2024-04-09 04:01:05', '2024-04-09 04:01:05', NULL),
(91, 4, 3, 0, 'weqeqe', 0, '2024-04-09 04:01:10', '2024-04-09 04:01:10', NULL),
(92, 4, 3, 0, 'kj;j;jljkl', 0, '2024-04-09 04:01:15', '2024-04-09 04:01:15', NULL),
(93, 3, 4, 0, 'hey whats up', 0, '2024-04-09 07:38:06', '2024-04-09 07:38:06', NULL),
(94, 4, 3, 0, 'just testing chatting feature', 0, '2024-04-09 07:38:26', '2024-04-09 07:38:26', NULL),
(95, 3, 4, 0, 'yeah it\'s working', 0, '2024-04-09 07:38:50', '2024-04-09 07:38:50', NULL),
(96, 4, 3, 0, 'i know but you need to improve chatting system more', 0, '2024-04-09 07:39:27', '2024-04-09 07:39:27', NULL),
(97, 3, 4, 0, 'yeah i will', 0, '2024-04-09 07:39:50', '2024-04-09 07:39:50', NULL),
(98, 4, 3, 0, 'eneough for now', 0, '2024-04-09 07:40:13', '2024-04-09 07:40:13', NULL),
(99, 3, 4, 0, 'ok', 0, '2024-04-09 07:40:21', '2024-04-09 07:40:21', NULL),
(100, 3, 4, 0, 'hi', 0, '2024-04-09 08:02:14', '2024-04-09 08:02:14', NULL),
(101, 4, 3, 0, 'hi', 0, '2024-04-09 08:02:30', '2024-04-09 08:02:30', NULL),
(102, 4, 3, 0, 'mfgfdg', 0, '2024-04-09 08:02:56', '2024-04-09 08:02:56', NULL),
(103, 3, 4, 0, 'rrr', 0, '2024-04-09 08:10:21', '2024-04-09 08:10:21', NULL),
(104, 4, 3, 0, '3333', 0, '2024-04-09 08:10:34', '2024-04-09 08:10:34', NULL),
(105, 3, 4, 0, 'sd', 0, '2024-04-09 08:10:55', '2024-04-09 08:10:55', NULL),
(106, 3, 4, 0, 'sdfa', 0, '2024-04-09 08:11:04', '2024-04-09 08:11:04', NULL),
(107, 4, 3, 0, 'sdd', 0, '2024-04-09 08:11:18', '2024-04-09 08:11:18', NULL),
(108, 3, 4, 0, 'sdf', 0, '2024-04-09 08:11:29', '2024-04-09 08:11:29', NULL),
(109, 4, 3, 0, 'sd', 0, '2024-04-09 08:12:00', '2024-04-09 08:12:00', NULL),
(110, 3, 4, 0, 'dfghf', 0, '2024-04-09 08:12:43', '2024-04-09 08:12:43', NULL),
(111, 4, 3, 0, '[[[', 0, '2024-04-09 08:12:57', '2024-04-09 08:12:57', NULL),
(112, 3, 4, 0, ']]]', 0, '2024-04-09 08:13:14', '2024-04-09 08:13:14', NULL),
(113, 3, 4, 0, 'n', 0, '2024-04-17 01:54:38', '2024-04-17 01:54:38', NULL),
(114, 4, 3, 0, 'd', 0, '2024-04-17 01:55:10', '2024-04-17 01:55:10', NULL),
(115, 4, 3, 0, 'it is working', 0, '2024-04-17 02:00:33', '2024-04-17 02:00:33', NULL),
(116, 3, 4, 0, 'yeah', 0, '2024-04-17 02:01:08', '2024-04-17 02:01:08', NULL),
(117, 4, 3, 0, 'confuse', 0, '2024-04-17 02:03:13', '2024-04-17 02:03:13', NULL),
(118, 3, 4, 0, 'tell me confesiion you have', 0, '2024-04-17 02:04:11', '2024-04-17 02:04:11', NULL),
(119, 3, 1, 0, 'hi', 0, '2024-04-17 02:53:58', '2024-04-17 02:53:58', NULL),
(120, 28, 28, 0, 'fuck you', 0, '2024-04-17 02:58:24', '2024-04-17 02:58:24', NULL),
(121, 4, 28, 0, 'j', 0, '2024-04-17 03:00:31', '2024-04-17 03:00:31', NULL),
(122, 28, 28, 0, 'y', 0, '2024-04-17 03:01:04', '2024-04-17 03:01:04', NULL),
(123, 28, 4, 0, 'THIS IS TESTING FROM FULL STACK DEV', 0, '2024-04-17 03:02:49', '2024-04-17 03:02:49', NULL),
(124, 4, 28, 0, 'sd', 0, '2024-04-17 03:04:51', '2024-04-17 03:04:51', NULL),
(125, 28, 4, 0, 'f', 0, '2024-04-17 03:05:06', '2024-04-17 03:05:06', NULL),
(126, 4, 28, 0, 'FROM', 0, '2024-04-17 03:10:10', '2024-04-17 03:10:10', NULL),
(127, 4, 1, 0, 'd', 0, '2024-04-17 03:13:08', '2024-04-17 03:13:08', NULL),
(128, 1, 4, 0, 'what happen', 0, '2024-04-17 03:14:12', '2024-04-17 03:14:12', NULL),
(129, 29, 4, 0, 'chatting with mail notification', 0, '2024-04-17 03:22:53', '2024-04-17 03:22:53', NULL),
(130, 29, 4, 0, 'chatting with mail notification', 0, '2024-04-17 03:22:57', '2024-04-17 03:22:57', NULL),
(131, 4, 29, 0, 'yeah', 0, '2024-04-17 03:24:34', '2024-04-17 03:24:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `incoming_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `outgoing_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `view` tinyint(4) DEFAULT 2 COMMENT '1=seen,2=not seen',
  `created_user_type` tinyint(4) DEFAULT NULL COMMENT '1=student,2=instructor',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dhanmondi', NULL, NULL),
(2, 1, 'Bannai', NULL, NULL),
(4, 2, 'Zero Point', NULL, NULL),
(5, 3, 'Tomchombridge', NULL, NULL),
(6, 3, 'Cantonment', NULL, NULL),
(7, 4, 'Acton', NULL, NULL),
(8, 4, 'Alamo', NULL, NULL),
(9, 5, 'Albin', NULL, NULL),
(10, 6, 'Bartow', NULL, NULL),
(11, 7, 'Oban', NULL, NULL),
(12, 8, 'Holywood', NULL, NULL),
(13, 9, 'Ely', NULL, NULL),
(14, 1, 'Tejgaon', '2024-06-07 06:12:00', '2024-06-07 06:14:19');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_us_issue_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `short_name` varchar(10) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `flag` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `phonecode` varchar(255) NOT NULL,
  `continent` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `short_name`, `country_name`, `flag`, `slug`, `phonecode`, `continent`, `created_at`, `updated_at`) VALUES
(1, 'BD', 'Bangladesh', '', 'bangladesh', '+88', 'Asia', NULL, NULL),
(2, 'USA', 'United States', '', 'united-states', '+1', 'North America', NULL, NULL),
(3, 'UK', 'United Kingdom', '', 'united-kingdom', '+44', 'Europe', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `category` varchar(191) NOT NULL,
  `video_link` varchar(191) NOT NULL,
  `video_thumbnail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency_code` varchar(255) NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `currency_placement` varchar(255) NOT NULL DEFAULT 'before' COMMENT 'before, after',
  `current_currency` varchar(255) NOT NULL DEFAULT 'no' COMMENT 'on, off',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `currency_code`, `symbol`, `currency_placement`, `current_currency`, `created_at`, `updated_at`) VALUES
(1, 'USD', '$', 'before', 'off', NULL, '2024-10-27 00:58:48'),
(2, 'BDT', '৳', 'before', 'off', NULL, '2024-10-27 00:58:48'),
(3, 'INR', '₹', 'before', 'off', NULL, '2024-10-27 00:58:48'),
(4, 'GBP', '£', 'after', 'off', NULL, '2024-10-27 00:58:48'),
(5, 'MXN', '$', 'before', 'off', NULL, '2024-10-27 00:58:48'),
(6, 'SAR', 'SR', 'before', 'off', NULL, '2024-10-27 00:58:48'),
(7, 'TRY', '₺', 'after', 'off', NULL, '2024-10-27 00:58:48'),
(8, 'ARS', '$', 'before', 'off', NULL, '2024-10-27 00:58:48'),
(9, 'EUR', '€', 'before', 'off', NULL, '2024-10-27 00:58:48'),
(11, 'BS', 'Bs', 'before', 'on', '2024-06-07 04:12:21', '2024-10-27 00:58:48'),
(12, 'Dinars', 'Dinar', 'after', 'off', '2024-06-07 04:20:07', '2024-10-27 00:58:48'),
(18, 'sdad', 'sdad', 'before', 'off', '2024-06-07 05:05:26', '2024-10-27 00:58:48'),
(19, 'cgbfdgg', 'fgdgd', 'before', 'off', '2024-06-07 05:07:56', '2024-10-27 00:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `uuid` char(36) NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `link` varchar(191) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `slug` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `faq_questions`
--

CREATE TABLE `faq_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `answer` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq_questions`
--

INSERT INTO `faq_questions` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'which I enjoy with my whole heart am alone feel?', 'Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a  greater artist than now. When, while the lovely valley with vapour around me, and the meridian.', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(2, 'which I enjoy with my whole heart am alone feel?', 'Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a  greater artist than now. When, while the lovely valley with vapour around me, and the meridian.', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(3, 'which I enjoy with my whole heart am alone feel?', 'Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a  greater artist than now. When, while the lovely valley with vapour around me, and the meridian.', '2022-12-04 17:05:33', '2022-12-04 17:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `forum_categories`
--

CREATE TABLE `forum_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `title` varchar(191) NOT NULL,
  `subtitle` varchar(191) NOT NULL,
  `logo` varchar(191) DEFAULT NULL,
  `slug` varchar(191) NOT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1=active, 0=disable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forum_categories`
--

INSERT INTO `forum_categories` (`id`, `uuid`, `title`, `subtitle`, `logo`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(8, '76ac56d7-5987-463c-819c-24353f23acc2', 'sd', 'sdsad', NULL, 'sd', 1, '2024-11-07 05:58:26', '2024-11-07 05:58:26');

-- --------------------------------------------------------

--
-- Table structure for table `forum_posts`
--

CREATE TABLE `forum_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` text NOT NULL,
  `forum_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1=active, 0=disable',
  `total_seen` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forum_posts`
--

INSERT INTO `forum_posts` (`id`, `uuid`, `user_id`, `title`, `forum_category_id`, `description`, `status`, `total_seen`, `created_at`, `updated_at`) VALUES
(8, '5f69be7d-e69d-4e23-85e5-d6246890cda7', NULL, 'fdgg', 8, 'dfgg', 1, 1, '2024-11-09 02:56:27', '2024-11-09 02:56:28'),
(9, '73bfcbe9-48a1-4807-8160-793f3811f8af', NULL, 'fdgg', 8, 'dfgg', 1, 5, '2024-11-09 02:57:39', '2024-11-09 03:02:17');

-- --------------------------------------------------------

--
-- Table structure for table `forum_post_comments`
--

CREATE TABLE `forum_post_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `forum_post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comment` longtext NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1=active, 0=disable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language` varchar(255) NOT NULL,
  `iso_code` varchar(255) NOT NULL,
  `flag` varchar(255) DEFAULT NULL,
  `rtl` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active,2=inactive',
  `default_language` varchar(255) DEFAULT NULL COMMENT 'on,off',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language`, `iso_code`, `flag`, `rtl`, `status`, `default_language`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 'uploads/flag/1712285391-i4ttmDdVZy.jpg', 0, 2, NULL, '2024-04-03 08:07:55', '2024-04-04 21:19:51'),
(2, 'Spanish', 'esp', 'uploads/flag/1712151497-QzC6JiBxzU.png', 0, 1, NULL, '2024-04-03 08:08:17', '2024-04-03 08:08:17'),
(3, 'Portuguese', 'por', 'uploads/flag/1730284740-nCG3TXpG4B.webp', 0, 1, NULL, '2024-10-30 05:02:08', '2024-10-30 05:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `mail_templates`
--

CREATE TABLE `mail_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alias` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `shortcodes` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail_templates`
--

INSERT INTO `mail_templates` (`id`, `alias`, `name`, `subject`, `body`, `shortcodes`, `status`) VALUES
(10, 'password_reset', 'Restablecer Contraseña', 'Notificación de Restablecimiento de Contraseña', '<div class=\"email-container\">\n<h2 class=\"email-header\">Notificaci&oacute;n de Restablecimiento de Contrase&ntilde;a</h2>\n<p class=\"email-body\">&iexcl;Hola!</p>\n<p class=\"email-body\">Est&aacute;s recibiendo este correo electr&oacute;nico porque hemos recibido una solicitud para restablecer la contrase&ntilde;a de tu cuenta.</p>\n<p class=\"email-body\">Haz clic en el bot&oacute;n de abajo para restablecer tu contrase&ntilde;a:</p>\n<p style=\"text-align: center;\"><a class=\"email-button\" href=\"{{link}}\">Restablecer Contrase&ntilde;a</a></p>\n<p class=\"email-body\">Este enlace para restablecer la contrase&ntilde;a caducar&aacute; en 15 minutos. Si no solicitaste un restablecimiento de contrase&ntilde;a, no es necesario que realices ninguna otra acci&oacute;n.</p>\n<p class=\"email-body\">Saludos cordiales,</p>\n<p class=\"email-body\">El equipo de Negociosgen</p>\n<hr style=\"border-top: 1px solid #ddd; margin: 20px 0;\">\n<p class=\"email-footer\">Recibiste este correo porque te suscribiste a nuestra lista.<br>Darse de baja de futuros correos o actualizar las preferencias de correo.<br>&copy; 2024 Negociosgen. Todos los derechos reservados.</p>\n</div>', '{\n\"link\":\"Password reset link\",\n\"expiry_time\":\"Link expiry time\",\n\"website_name\":\"Your website name\"\n}', 1),
(11, 'email_verification', 'Verificación de Correo Electrónico', 'Verificar Dirección de Correo Electrónico', '<div style=\"max-width: 600px; margin: auto; padding: 20px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); font-family: Arial, sans-serif; line-height: 1.6;\">\n    <h2 style=\"color: #333; text-align: center;\">Verificar dirección de correo electrónico</h2>\n    <p style=\"color: #555;\">¡Hola!</p>\n    <p style=\"color: #555;\">Por favor, haz clic en el enlace de abajo para verificar tu dirección de correo electrónico.</p>\n    \n    <p style=\"text-align: center;\">\n        <a href=\"{{link}}\" style=\"display: inline-block; padding: 12px 24px; background-color: #007bff; color: #ffffff; text-decoration: none; border-radius: 4px;\">Verificar Correo Electrónico</a>\n    </p>\n    \n    <p style=\"color: #555;\">Si no creaste una cuenta, no es necesario que hagas nada más.</p>\n    <p style=\"color: #555;\">Mis mejores deseos,</p>\n    <p style=\"color: #555;\">El equipo de Negociosgen</p>\n    \n    <hr style=\"border-top: 1px solid #ddd; margin: 20px 0;\">\n    \n    <p style=\"color: #999; font-size: 12px; text-align: center;\">\n        Recibiste este correo porque te suscribiste a nuestra lista.<br>\n        Haz clic <a href=\"#\" style=\"color: #007bff; text-decoration: none;\">aquí</a> para darte de baja de futuros correos o actualizar tus preferencias de correo.<br>\n        © 2024 Negociosgen. Todos los derechos reservados.\n    </p>\n</div>\n', '{\"link\":\"Email verification link\",\"website_name\":\"Your website name\"}', 1),
(18, 'welcome', 'Bienvenida', 'Bienvenido a ACELERA', '<div style=\"max-width: 600px; margin: auto; padding: 20px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); font-family: Arial, sans-serif; line-height: 1.6;\">\n    <h2 style=\"color: #333; text-align: center;\">Bienvenidx a Negociosgen</h2>\n    \n    <p style=\"color: #555;\">Hey {{name}},</p>\n    <p style=\"color: #555;\">¡Bienvenido/a a Negociosgen! Estamos muy emocionados de tenerte a bordo.</p>\n    \n    <p style=\"text-align: center;\">\n        <a href=\"{{explore_link}}\" style=\"display: inline-block; padding: 12px 24px; background-color: #007bff; color: #ffffff; text-decoration: none; border-radius: 4px;\">Empieza a explorar</a>\n    </p>\n    \n    <p style=\"color: #555;\">Si tienes alguna pregunta en el camino, no dudes en ponerte en contacto con nuestro equipo de éxito al cliente. Siempre estamos aquí para ayudarte.</p>\n    <p style=\"color: #555;\">Mis mejores deseos,</p>\n    <p style=\"color: #555;\">El equipo de Negociosgen</p>\n    \n    <hr style=\"border-top: 1px solid #ddd; margin: 20px 0;\">\n    \n    <p style=\"color: #999; font-size: 12px; text-align: center;\">\n        Recibiste este correo electrónico porque te suscribiste a nuestra lista.<br>\n        Haz clic <a href=\"#\" style=\"color: #007bff; text-decoration: none;\">aquí</a> para darte de baja de futuros correos o actualizar tus preferencias de correo electrónico.<br>\n        © 2024 Negociosgen. Todos los derechos reservados.\n    </p>\n</div>\n', '{\"name\":\"name\",\"website_name\":\"Your website name\"}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `title`, `url`, `thumbnail`, `created_at`, `updated_at`) VALUES
(105, 'adss', NULL, '/product_images/1730293850.png', '2024-10-30 07:40:50', '2024-10-30 07:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `media_options`
--

CREATE TABLE `media_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `alt_title` text DEFAULT NULL,
  `thumbnail` text DEFAULT NULL,
  `large_image` text DEFAULT NULL,
  `option_value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media_options`
--

INSERT INTO `media_options` (`id`, `title`, `alt_title`, `thumbnail`, `large_image`, `option_value`, `created_at`, `updated_at`) VALUES
(247, 'photo', 'photo', '06082021041147-photo.png', '06082021041147-photo.png', '21950', '2021-08-05 16:41:47', '2021-08-05 16:41:47'),
(331, 'payment', 'payment', '16112021165416-200x200-payment.png', '16112021165416-payment.png', '8212', '2021-11-16 05:24:16', '2021-11-16 05:24:16'),
(441, 'favicon', 'favicon', '24062022060012-favicon.ico', '24062022060012-favicon.ico', '5430', '2022-06-23 18:30:12', '2022-06-23 18:30:12'),
(442, 'logo', 'logo', '24062022060027-200x200-logo.png', '24062022060027-logo.png', '16775', '2022-06-23 18:30:27', '2022-06-23 18:30:27'),
(443, 'h1-layer1', 'h1-layer1', '01072022095731-200x200-h1-layer1.png', '01072022095731-h1-layer1.png', '1040462', '2022-06-30 22:27:31', '2022-06-30 22:27:31'),
(444, 'h1-layer5', 'h1-layer5', '01072022095735-200x200-h1-layer5.png', '01072022095735-h1-layer5.png', '366096', '2022-06-30 22:27:35', '2022-06-30 22:27:35'),
(445, 'h1-layer2', 'h1-layer2', '01072022095745-200x200-h1-layer2.png', '01072022095745-h1-layer2.png', '33634', '2022-06-30 22:27:45', '2022-06-30 22:27:45'),
(446, 'h1-layer3', 'h1-layer3', '01072022095750-200x200-h1-layer3.png', '01072022095750-h1-layer3.png', '50012', '2022-06-30 22:27:50', '2022-06-30 22:27:50'),
(447, 'h1-layer4', 'h1-layer4', '01072022095752-200x200-h1-layer4.png', '01072022095752-h1-layer4.png', '49803', '2022-06-30 22:27:52', '2022-06-30 22:27:52'),
(448, 'h1-layer6', 'h1-layer6', '01072022095755-200x200-h1-layer6.png', '01072022095755-h1-layer6.png', '36640', '2022-06-30 22:27:55', '2022-06-30 22:27:55'),
(449, 'h1-layer7', 'h1-layer7', '01072022095757-200x200-h1-layer7.png', '01072022095757-h1-layer7.png', '46145', '2022-06-30 22:27:57', '2022-06-30 22:27:57'),
(450, 'h1-layer8', 'h1-layer8', '01072022095801-200x200-h1-layer8.png', '01072022095801-h1-layer8.png', '35519', '2022-06-30 22:28:01', '2022-06-30 22:28:01'),
(452, 'vegetables', 'vegetables', '01072022115801-600x600-vegetables.png', '01072022115801-vegetables.png', '184224', '2022-07-01 00:28:01', '2022-07-01 00:28:01'),
(453, 'fruit', 'fruit', '01072022120122-600x600-fruit.png', '01072022120122-fruit.png', '177132', '2022-07-01 00:31:22', '2022-07-01 00:31:22'),
(454, 'nutt-and-seeds', 'nutt-and-seeds', '01072022120255-600x600-nutt-and-seeds.png', '01072022120255-nutt-and-seeds.png', '191746', '2022-07-01 00:32:55', '2022-07-01 00:32:55'),
(455, 'bread-and-bakery', 'bread-and-bakery', '01072022120359-600x600-bread-and-bakery.png', '01072022120359-bread-and-bakery.png', '274261', '2022-07-01 00:33:59', '2022-07-01 00:33:59'),
(456, 'juice', 'juice', '01072022120554-600x600-juice.png', '01072022120554-juice.png', '125565', '2022-07-01 00:35:54', '2022-07-01 00:35:54'),
(457, 'fast-food', 'fast-food', '01072022120657-600x600-fast-food.png', '01072022120657-fast-food.png', '245879', '2022-07-01 00:36:57', '2022-07-01 00:36:57'),
(458, 'milk-and-dairy', 'milk-and-dairy', '01072022120745-600x600-milk-and-dairy.png', '01072022120745-milk-and-dairy.png', '166360', '2022-07-01 00:37:45', '2022-07-01 00:37:45'),
(459, 'fresh-meat', 'fresh-meat', '01072022120831-600x600-fresh-meat.png', '01072022120831-fresh-meat.png', '150740', '2022-07-01 00:38:31', '2022-07-01 00:38:31'),
(460, 'fresh-seafood', 'fresh-seafood', '01072022120911-600x600-fresh-seafood.png', '01072022120911-fresh-seafood.png', '158387', '2022-07-01 00:39:11', '2022-07-01 00:39:11'),
(461, 'dry-food', 'dry-food', '01072022121020-600x600-dry-food.png', '01072022121020-dry-food.png', '172173', '2022-07-01 00:40:20', '2022-07-01 00:40:20'),
(462, 'coffee-and-tea', 'coffee-and-tea', '01072022121100-600x600-coffee-and-tea.png', '01072022121100-coffee-and-tea.png', '157391', '2022-07-01 00:41:00', '2022-07-01 00:41:00'),
(463, 'offer-1', 'offer-1', '17072022160150-200x200-offer-1.png', '17072022160150-offer-1.png', '60795', '2022-07-17 04:31:50', '2022-07-17 04:31:50'),
(464, 'offer-2', 'offer-2', '17072022161053-200x200-offer-2.png', '17072022161053-offer-2.png', '52478', '2022-07-17 04:40:53', '2022-07-17 04:40:53'),
(465, 'offer-3', 'offer-3', '17072022161130-200x200-offer-3.png', '17072022161130-offer-3.png', '61968', '2022-07-17 04:41:30', '2022-07-17 04:41:30'),
(466, 'h1_video_bg', 'h1_video_bg', '17072022175837-200x200-h1_video_bg.jpg', '17072022175837-h1_video_bg.jpg', '340793', '2022-07-17 06:28:38', '2022-07-17 06:28:38'),
(467, 'footer-top', 'footer-top', '22072022102835-200x200-footer-top.jpg', '22072022102835-footer-top.jpg', '90298', '2022-07-21 22:58:35', '2022-07-21 22:58:35'),
(490, '12', '12', '31072022063509-200x200-12.jpg', '31072022063509-12.jpg', '41008', '2022-07-30 19:05:09', '2022-07-30 19:05:09'),
(491, '14', '14', '31072022063515-200x200-14.jpg', '31072022063515-14.jpg', '63049', '2022-07-30 19:05:16', '2022-07-30 19:05:16'),
(494, '3', '3', '31072022063546-200x200-3.jpg', '31072022063546-3.jpg', '46379', '2022-07-30 19:05:46', '2022-07-30 19:05:46'),
(496, '5', '5', '31072022063557-200x200-5.jpg', '31072022063557-5.jpg', '46928', '2022-07-30 19:05:57', '2022-07-30 19:05:57'),
(499, '30', '30', '31072022063653-200x200-30.jpg', '31072022063653-30.jpg', '55133', '2022-07-30 19:06:53', '2022-07-30 19:06:53'),
(500, '29', '29', '31072022063710-200x200-29.jpg', '31072022063710-29.jpg', '61829', '2022-07-30 19:07:10', '2022-07-30 19:07:10'),
(503, '10', '10', '31072022063732-200x200-10.jpg', '31072022063732-10.jpg', '35410', '2022-07-30 19:07:32', '2022-07-30 19:07:32'),
(505, '5', '5', '31072022063751-200x200-5.jpg', '31072022063751-5.jpg', '35048', '2022-07-30 19:07:51', '2022-07-30 19:07:51'),
(507, '2', '2', '31072022063809-200x200-2.jpg', '31072022063809-2.jpg', '63377', '2022-07-30 19:08:09', '2022-07-30 19:08:09'),
(510, '11', '11', '31072022063840-200x200-11.jpg', '31072022063840-11.jpg', '86598', '2022-07-30 19:08:40', '2022-07-30 19:08:40'),
(511, '8', '8', '31072022063845-200x200-8.jpg', '31072022063845-8.jpg', '61285', '2022-07-30 19:08:45', '2022-07-30 19:08:45'),
(512, '2', '2', '31072022063900-200x200-2.jpg', '31072022063900-2.jpg', '75753', '2022-07-30 19:09:00', '2022-07-30 19:09:00'),
(516, '9', '9', '31072022063932-200x200-9.jpg', '31072022063932-9.jpg', '68512', '2022-07-30 19:09:32', '2022-07-30 19:09:32'),
(517, '5', '5', '31072022063945-200x200-5.jpg', '31072022063945-5.jpg', '62257', '2022-07-30 19:09:45', '2022-07-30 19:09:45'),
(520, '1', '1', '31072022064011-200x200-1.jpg', '31072022064011-1.jpg', '57186', '2022-07-30 19:10:11', '2022-07-30 19:10:11'),
(521, '4', '4', '31072022064016-200x200-4.jpg', '31072022064016-4.jpg', '46090', '2022-07-30 19:10:16', '2022-07-30 19:10:16'),
(522, '10', '10', '31072022064024-200x200-10.jpg', '31072022064024-10.jpg', '49349', '2022-07-30 19:10:24', '2022-07-30 19:10:24'),
(526, '27', '27', '31072022064110-200x200-27.jpg', '31072022064110-27.jpg', '62831', '2022-07-30 19:11:10', '2022-07-30 19:11:10'),
(528, '10', '10', '31072022064129-200x200-10.jpg', '31072022064129-10.jpg', '75878', '2022-07-30 19:11:29', '2022-07-30 19:11:29'),
(529, '8', '8', '31072022064141-200x200-8.jpg', '31072022064141-8.jpg', '72609', '2022-07-30 19:11:41', '2022-07-30 19:11:41'),
(531, '11', '11', '31072022064207-200x200-11.jpg', '31072022064207-11.jpg', '73004', '2022-07-30 19:12:07', '2022-07-30 19:12:07'),
(532, '5', '5', '31072022064214-200x200-5.jpg', '31072022064214-5.jpg', '77496', '2022-07-30 19:12:14', '2022-07-30 19:12:14'),
(533, '3', '3', '31072022064218-200x200-3.jpg', '31072022064218-3.jpg', '60534', '2022-07-30 19:12:18', '2022-07-30 19:12:18'),
(536, '7', '7', '01082022172357-400x400-7.jpg', '01082022172357-7.jpg', '56749', '2022-08-01 05:53:57', '2022-08-01 05:53:57'),
(537, '18', '18', '01082022172527-400x400-18.jpg', '01082022172527-18.jpg', '55772', '2022-08-01 05:55:27', '2022-08-01 05:55:27'),
(538, '1', '1', '01082022172600-400x400-1.jpg', '01082022172600-1.jpg', '54636', '2022-08-01 05:56:00', '2022-08-01 05:56:00'),
(539, '24', '24', '01082022172650-400x400-24.jpg', '01082022172650-24.jpg', '62342', '2022-08-01 05:56:51', '2022-08-01 05:56:51'),
(540, '7', '7', '01082022172712-400x400-7.jpg', '01082022172712-7.jpg', '66843', '2022-08-01 05:57:12', '2022-08-01 05:57:12'),
(541, '3', '3', '01082022172737-400x400-3.jpg', '01082022172737-3.jpg', '75007', '2022-08-01 05:57:37', '2022-08-01 05:57:37'),
(542, '3', '3', '01082022172802-400x400-3.jpg', '01082022172802-3.jpg', '43906', '2022-08-01 05:58:03', '2022-08-01 05:58:03'),
(543, '11', '11', '01082022172825-400x400-11.jpg', '01082022172825-11.jpg', '58720', '2022-08-01 05:58:25', '2022-08-01 05:58:25'),
(544, '9', '9', '01082022172846-400x400-9.jpg', '01082022172846-9.jpg', '65534', '2022-08-01 05:58:46', '2022-08-01 05:58:46'),
(545, '1', '1', '01082022172932-400x400-1.jpg', '01082022172932-1.jpg', '59010', '2022-08-01 05:59:32', '2022-08-01 05:59:32'),
(546, '8', '8', '01082022172956-400x400-8.jpg', '01082022172956-8.jpg', '70583', '2022-08-01 05:59:56', '2022-08-01 05:59:56'),
(547, '17', '17', '01082022173019-400x400-17.jpg', '01082022173019-17.jpg', '59888', '2022-08-01 06:00:19', '2022-08-01 06:00:19'),
(548, '9', '9', '01082022173052-400x400-9.jpg', '01082022173052-9.jpg', '69396', '2022-08-01 06:00:52', '2022-08-01 06:00:52'),
(549, '4', '4', '01082022173115-400x400-4.jpg', '01082022173115-4.jpg', '65766', '2022-08-01 06:01:15', '2022-08-01 06:01:15'),
(550, '1', '1', '01082022173141-400x400-1.jpg', '01082022173141-1.jpg', '65230', '2022-08-01 06:01:41', '2022-08-01 06:01:41'),
(551, '4', '4', '01082022173225-400x400-4.jpg', '01082022173225-4.jpg', '33162', '2022-08-01 06:02:25', '2022-08-01 06:02:25'),
(552, '1', '1', '01082022173248-400x400-1.jpg', '01082022173248-1.jpg', '51039', '2022-08-01 06:02:48', '2022-08-01 06:02:48'),
(553, '14', '14', '01082022173741-400x400-14.jpg', '01082022173741-14.jpg', '43219', '2022-08-01 06:07:41', '2022-08-01 06:07:41'),
(555, '4', '4', '01082022174052-400x400-4.jpg', '01082022174052-4.jpg', '61634', '2022-08-01 06:10:52', '2022-08-01 06:10:52'),
(556, '18', '18', '02082022143408-400x400-18.jpg', '02082022143408-18.jpg', '44654', '2022-08-02 03:04:08', '2022-08-02 03:04:08'),
(557, '8', '8', '02082022143457-400x400-8.jpg', '02082022143457-8.jpg', '46149', '2022-08-02 03:04:57', '2022-08-02 03:04:57'),
(558, '5', '5', '02082022143530-400x400-5.jpg', '02082022143530-5.jpg', '51760', '2022-08-02 03:05:30', '2022-08-02 03:05:30'),
(560, '1', '1', '02082022143652-400x400-1.jpg', '02082022143652-1.jpg', '57333', '2022-08-02 03:06:52', '2022-08-02 03:06:52'),
(561, '6', '6', '02082022143742-400x400-6.jpg', '02082022143742-6.jpg', '39486', '2022-08-02 03:07:42', '2022-08-02 03:07:42'),
(562, '4', '4', '02082022143827-400x400-4.jpg', '02082022143827-4.jpg', '42217', '2022-08-02 03:08:27', '2022-08-02 03:08:27'),
(563, '2', '2', '02082022143908-400x400-2.jpg', '02082022143908-2.jpg', '41853', '2022-08-02 03:09:08', '2022-08-02 03:09:08'),
(564, '9', '9', '02082022143955-400x400-9.jpg', '02082022143955-9.jpg', '31239', '2022-08-02 03:09:55', '2022-08-02 03:09:55'),
(565, '4', '4', '02082022144027-400x400-4.jpg', '02082022144027-4.jpg', '35467', '2022-08-02 03:10:27', '2022-08-02 03:10:27'),
(566, '5', '5', '02082022144140-400x400-5.jpg', '02082022144140-5.jpg', '41636', '2022-08-02 03:11:40', '2022-08-02 03:11:40'),
(567, '6', '6', '02082022144221-400x400-6.jpg', '02082022144221-6.jpg', '32997', '2022-08-02 03:12:21', '2022-08-02 03:12:21'),
(568, '4', '4', '02082022144310-400x400-4.jpg', '02082022144310-4.jpg', '38297', '2022-08-02 03:13:10', '2022-08-02 03:13:10'),
(569, '3', '3', '02082022144346-400x400-3.jpg', '02082022144346-3.jpg', '40960', '2022-08-02 03:13:46', '2022-08-02 03:13:46'),
(572, '26', '26', '05082022165653-400x400-26.jpg', '05082022165653-26.jpg', '59629', '2022-08-05 05:26:53', '2022-08-05 05:26:53'),
(578, '1-garlic', '1-garlic', '18082022123324-600x600-1-garlic.jpg', '18082022123324-1-garlic.jpg', '69229', '2022-08-18 01:03:24', '2022-08-18 01:03:24'),
(579, '2-garlic', '2-garlic', '18082022123333-600x600-2-garlic.jpg', '18082022123333-2-garlic.jpg', '71703', '2022-08-18 01:03:33', '2022-08-18 01:03:33'),
(580, '3-garlic', '3-garlic', '18082022123337-600x600-3-garlic.jpg', '18082022123337-3-garlic.jpg', '69346', '2022-08-18 01:03:37', '2022-08-18 01:03:37'),
(581, '4-garlic', '4-garlic', '18082022123536-600x600-4-garlic.jpg', '18082022123536-4-garlic.jpg', '69533', '2022-08-18 01:05:36', '2022-08-18 01:05:36'),
(582, '5-garlic', '5-garlic', '18082022123541-600x600-5-garlic.jpg', '18082022123541-5-garlic.jpg', '61794', '2022-08-18 01:05:41', '2022-08-18 01:05:41'),
(583, '6-garlic', '6-garlic', '18082022123544-600x600-6-garlic.jpg', '18082022123544-6-garlic.jpg', '71937', '2022-08-18 01:05:44', '2022-08-18 01:05:44'),
(584, '1-red-pepper', '1-red-pepper', '18082022135056-600x600-1-red-pepper.jpg', '18082022135056-1-red-pepper.jpg', '67020', '2022-08-18 02:20:56', '2022-08-18 02:20:56'),
(585, '2-red-pepper', '2-red-pepper', '18082022135100-600x600-2-red-pepper.jpg', '18082022135100-2-red-pepper.jpg', '70681', '2022-08-18 02:21:00', '2022-08-18 02:21:00'),
(586, '3-red-pepper', '3-red-pepper', '18082022135103-600x600-3-red-pepper.jpg', '18082022135103-3-red-pepper.jpg', '83263', '2022-08-18 02:21:03', '2022-08-18 02:21:03'),
(587, '4-red-pepper', '4-red-pepper', '18082022135106-600x600-4-red-pepper.jpg', '18082022135106-4-red-pepper.jpg', '97895', '2022-08-18 02:21:06', '2022-08-18 02:21:06'),
(588, '5-red-pepper', '5-red-pepper', '18082022135110-600x600-5-red-pepper.jpg', '18082022135110-5-red-pepper.jpg', '85304', '2022-08-18 02:21:10', '2022-08-18 02:21:10'),
(589, '6-red-pepper', '6-red-pepper', '18082022135113-600x600-6-red-pepper.jpg', '18082022135113-6-red-pepper.jpg', '86126', '2022-08-18 02:21:13', '2022-08-18 02:21:13'),
(590, 'home1-bg-slider', 'home1-bg-slider', '18082022135936-400x400-home1-bg-slider.jpg', '18082022135936-home1-bg-slider.jpg', '46631', '2022-08-18 02:29:36', '2022-08-18 02:29:36'),
(591, 'home1-bg-offer', 'home1-bg-offer', '18082022140338-400x400-home1-bg-offer.jpg', '18082022140338-home1-bg-offer.jpg', '39542', '2022-08-18 02:33:38', '2022-08-18 02:33:38'),
(592, 'footer_bg', 'footer_bg', '18082022140802-400x400-footer_bg.jpg', '18082022140802-footer_bg.jpg', '39542', '2022-08-18 02:38:02', '2022-08-18 02:38:02'),
(593, '1-potato', '1-potato', '18082022140944-600x600-1-potato.jpg', '18082022140944-1-potato.jpg', '64023', '2022-08-18 02:39:44', '2022-08-18 02:39:44'),
(594, '2-potato', '2-potato', '18082022140948-600x600-2-potato.jpg', '18082022140948-2-potato.jpg', '79022', '2022-08-18 02:39:48', '2022-08-18 02:39:48'),
(595, '3-potato', '3-potato', '18082022140954-600x600-3-potato.jpg', '18082022140954-3-potato.jpg', '78839', '2022-08-18 02:39:54', '2022-08-18 02:39:54'),
(596, '4-potato', '4-potato', '18082022140957-600x600-4-potato.jpg', '18082022140957-4-potato.jpg', '78735', '2022-08-18 02:39:57', '2022-08-18 02:39:57'),
(597, '5-potato', '5-potato', '18082022141000-600x600-5-potato.jpg', '18082022141000-5-potato.jpg', '69201', '2022-08-18 02:40:00', '2022-08-18 02:40:00'),
(598, '6-potato', '6-potato', '18082022141004-600x600-6-potato.jpg', '18082022141004-6-potato.jpg', '97305', '2022-08-18 02:40:04', '2022-08-18 02:40:04'),
(599, '7-potato', '7-potato', '18082022141007-600x600-7-potato.jpg', '18082022141007-7-potato.jpg', '99215', '2022-08-18 02:40:08', '2022-08-18 02:40:08'),
(600, '1-lotus-seeds', '1-lotus-seeds', '18082022150003-600x600-1-lotus-seeds.jpg', '18082022150003-1-lotus-seeds.jpg', '76427', '2022-08-18 03:30:03', '2022-08-18 03:30:03'),
(601, '2-lotus-seeds', '2-lotus-seeds', '18082022150007-600x600-2-lotus-seeds.jpg', '18082022150007-2-lotus-seeds.jpg', '62658', '2022-08-18 03:30:07', '2022-08-18 03:30:07'),
(602, '3-lotus-seeds', '3-lotus-seeds', '18082022150010-600x600-3-lotus-seeds.jpg', '18082022150010-3-lotus-seeds.jpg', '72466', '2022-08-18 03:30:10', '2022-08-18 03:30:10'),
(603, '4-lotus-seeds', '4-lotus-seeds', '18082022150026-600x600-4-lotus-seeds.jpg', '18082022150026-4-lotus-seeds.jpg', '57106', '2022-08-18 03:30:26', '2022-08-18 03:30:26'),
(604, '5-lotus-seeds', '5-lotus-seeds', '18082022150029-600x600-5-lotus-seeds.jpg', '18082022150029-5-lotus-seeds.jpg', '83364', '2022-08-18 03:30:29', '2022-08-18 03:30:29'),
(605, '6-lotus-seeds', '6-lotus-seeds', '18082022150032-600x600-6-lotus-seeds.jpg', '18082022150032-6-lotus-seeds.jpg', '86399', '2022-08-18 03:30:32', '2022-08-18 03:30:32'),
(606, '7-lotus-seeds', '7-lotus-seeds', '18082022150036-600x600-7-lotus-seeds.jpg', '18082022150036-7-lotus-seeds.jpg', '75138', '2022-08-18 03:30:36', '2022-08-18 03:30:36'),
(607, '1-pistachio', '1-pistachio', '18082022151446-600x600-1-pistachio.jpg', '18082022151446-1-pistachio.jpg', '77898', '2022-08-18 03:44:46', '2022-08-18 03:44:46'),
(608, '2-pistachio', '2-pistachio', '18082022151450-600x600-2-pistachio.jpg', '18082022151450-2-pistachio.jpg', '111159', '2022-08-18 03:44:50', '2022-08-18 03:44:50'),
(609, '3-pistachio', '3-pistachio', '18082022151452-600x600-3-pistachio.jpg', '18082022151452-3-pistachio.jpg', '79510', '2022-08-18 03:44:53', '2022-08-18 03:44:53'),
(610, '4-pistachio', '4-pistachio', '18082022151457-600x600-4-pistachio.jpg', '18082022151457-4-pistachio.jpg', '74206', '2022-08-18 03:44:57', '2022-08-18 03:44:57'),
(611, '5-pistachio', '5-pistachio', '18082022151500-600x600-5-pistachio.jpg', '18082022151500-5-pistachio.jpg', '77471', '2022-08-18 03:45:00', '2022-08-18 03:45:00'),
(612, '6-pistachio', '6-pistachio', '18082022151502-600x600-6-pistachio.jpg', '18082022151502-6-pistachio.jpg', '92185', '2022-08-18 03:45:02', '2022-08-18 03:45:02'),
(613, '7-pistachio', '7-pistachio', '18082022151504-600x600-7-pistachio.jpg', '18082022151504-7-pistachio.jpg', '70181', '2022-08-18 03:45:04', '2022-08-18 03:45:04'),
(614, '1-walnuts', '1-walnuts', '18082022153802-600x600-1-walnuts.jpg', '18082022153802-1-walnuts.jpg', '98086', '2022-08-18 04:08:02', '2022-08-18 04:08:02'),
(615, '2-walnuts', '2-walnuts', '18082022153806-600x600-2-walnuts.jpg', '18082022153806-2-walnuts.jpg', '83638', '2022-08-18 04:08:06', '2022-08-18 04:08:06'),
(616, '3-walnuts', '3-walnuts', '18082022153808-600x600-3-walnuts.jpg', '18082022153808-3-walnuts.jpg', '83992', '2022-08-18 04:08:08', '2022-08-18 04:08:08'),
(617, '4-walnuts', '4-walnuts', '18082022153810-600x600-4-walnuts.jpg', '18082022153810-4-walnuts.jpg', '104663', '2022-08-18 04:08:10', '2022-08-18 04:08:10'),
(618, '5-walnuts', '5-walnuts', '18082022153812-600x600-5-walnuts.jpg', '18082022153812-5-walnuts.jpg', '67250', '2022-08-18 04:08:12', '2022-08-18 04:08:12'),
(619, '1-milk-splash', '1-milk-splash', '18082022155122-600x600-1-milk-splash.jpg', '18082022155122-1-milk-splash.jpg', '51650', '2022-08-18 04:21:22', '2022-08-18 04:21:22'),
(620, '2-milk-splash', '2-milk-splash', '18082022155126-600x600-2-milk-splash.jpg', '18082022155126-2-milk-splash.jpg', '54281', '2022-08-18 04:21:26', '2022-08-18 04:21:26'),
(621, '3-milk-splash', '3-milk-splash', '18082022155129-600x600-3-milk-splash.jpg', '18082022155129-3-milk-splash.jpg', '54653', '2022-08-18 04:21:29', '2022-08-18 04:21:29'),
(623, '5-milk-splash', '5-milk-splash', '18082022155136-600x600-5-milk-splash.jpg', '18082022155136-5-milk-splash.jpg', '53022', '2022-08-18 04:21:36', '2022-08-18 04:21:36'),
(624, '4-milk-splash', '4-milk-splash', '18082022155447-600x600-4-milk-splash.jpg', '18082022155447-4-milk-splash.jpg', '53873', '2022-08-18 04:24:47', '2022-08-18 04:24:47'),
(625, '1-cheese', '1-cheese', '18082022171458-600x600-1-cheese.jpg', '18082022171458-1-cheese.jpg', '62012', '2022-08-18 05:44:58', '2022-08-18 05:44:58'),
(626, '2-cheese', '2-cheese', '18082022171502-600x600-2-cheese.jpg', '18082022171502-2-cheese.jpg', '63404', '2022-08-18 05:45:02', '2022-08-18 05:45:02'),
(627, '3-cheese', '3-cheese', '18082022171507-600x600-3-cheese.jpg', '18082022171507-3-cheese.jpg', '95590', '2022-08-18 05:45:07', '2022-08-18 05:45:07'),
(628, '4-cheese', '4-cheese', '18082022171511-600x600-4-cheese.jpg', '18082022171511-4-cheese.jpg', '76437', '2022-08-18 05:45:11', '2022-08-18 05:45:11'),
(629, '5-cheese', '5-cheese', '18082022171514-600x600-5-cheese.jpg', '18082022171514-5-cheese.jpg', '71338', '2022-08-18 05:45:14', '2022-08-18 05:45:14'),
(631, '6-cheese', '6-cheese', '18082022171602-600x600-6-cheese.jpg', '18082022171602-6-cheese.jpg', '86087', '2022-08-18 05:46:02', '2022-08-18 05:46:02'),
(632, '7-cheese', '7-cheese', '18082022171605-600x600-7-cheese.jpg', '18082022171605-7-cheese.jpg', '84398', '2022-08-18 05:46:05', '2022-08-18 05:46:05'),
(633, '1-dairy-products', '1-dairy-products', '18082022174441-600x600-1-dairy-products.jpg', '18082022174441-1-dairy-products.jpg', '69181', '2022-08-18 06:14:41', '2022-08-18 06:14:41'),
(634, '2-dairy-products', '2-dairy-products', '18082022174445-600x600-2-dairy-products.jpg', '18082022174445-2-dairy-products.jpg', '77043', '2022-08-18 06:14:45', '2022-08-18 06:14:45'),
(635, '3-dairy-products', '3-dairy-products', '18082022174448-600x600-3-dairy-products.jpg', '18082022174448-3-dairy-products.jpg', '85353', '2022-08-18 06:14:48', '2022-08-18 06:14:48'),
(636, '4-dairy-products', '4-dairy-products', '18082022174452-600x600-4-dairy-products.jpg', '18082022174452-4-dairy-products.jpg', '68236', '2022-08-18 06:14:52', '2022-08-18 06:14:52'),
(637, '5-dairy-products', '5-dairy-products', '18082022174457-600x600-5-dairy-products.jpg', '18082022174457-5-dairy-products.jpg', '97186', '2022-08-18 06:14:57', '2022-08-18 06:14:57'),
(638, '6-dairy-products', '6-dairy-products', '18082022174502-600x600-6-dairy-products.jpg', '18082022174502-6-dairy-products.jpg', '68351', '2022-08-18 06:15:02', '2022-08-18 06:15:02'),
(639, '6-fruit-juice', '6-fruit-juice', '18082022175722-600x600-6-fruit-juice.jpg', '18082022175722-6-fruit-juice.jpg', '76520', '2022-08-18 06:27:22', '2022-08-18 06:27:22'),
(640, '5-fruit-juice', '5-fruit-juice', '18082022175726-600x600-5-fruit-juice.jpg', '18082022175726-5-fruit-juice.jpg', '84859', '2022-08-18 06:27:26', '2022-08-18 06:27:26'),
(641, '4-fruit-juice', '4-fruit-juice', '18082022175730-600x600-4-fruit-juice.jpg', '18082022175730-4-fruit-juice.jpg', '71046', '2022-08-18 06:27:30', '2022-08-18 06:27:30'),
(642, '3-fruit-juice', '3-fruit-juice', '18082022175734-600x600-3-fruit-juice.jpg', '18082022175734-3-fruit-juice.jpg', '76620', '2022-08-18 06:27:34', '2022-08-18 06:27:34'),
(643, '2-fruit-juice', '2-fruit-juice', '18082022175917-600x600-2-fruit-juice.jpg', '18082022175917-2-fruit-juice.jpg', '76224', '2022-08-18 06:29:17', '2022-08-18 06:29:17'),
(644, '2-pomegranate-juice', '2-pomegranate-juice', '18082022180759-600x600-2-pomegranate-juice.jpg', '18082022180759-2-pomegranate-juice.jpg', '91928', '2022-08-18 06:37:59', '2022-08-18 06:37:59'),
(645, '1-pomegranate-juice', '1-pomegranate-juice', '18082022180809-600x600-1-pomegranate-juice.jpg', '18082022180809-1-pomegranate-juice.jpg', '78788', '2022-08-18 06:38:09', '2022-08-18 06:38:09'),
(646, '4-pomegranate-juice', '4-pomegranate-juice', '18082022180824-600x600-4-pomegranate-juice.jpg', '18082022180824-4-pomegranate-juice.jpg', '93754', '2022-08-18 06:38:24', '2022-08-18 06:38:24'),
(647, '3-pomegranate-juice', '3-pomegranate-juice', '18082022180829-600x600-3-pomegranate-juice.jpg', '18082022180829-3-pomegranate-juice.jpg', '84217', '2022-08-18 06:38:29', '2022-08-18 06:38:29'),
(648, '1-cocktail-soft-drink', '1-cocktail-soft-drink', '19082022031029-600x600-1-cocktail-soft-drink.jpg', '19082022031029-1-cocktail-soft-drink.jpg', '65934', '2022-08-18 15:40:29', '2022-08-18 15:40:29'),
(649, '2-cocktail-soft-drink', '2-cocktail-soft-drink', '19082022031032-600x600-2-cocktail-soft-drink.jpg', '19082022031032-2-cocktail-soft-drink.jpg', '68499', '2022-08-18 15:40:32', '2022-08-18 15:40:32'),
(650, '3-cocktail-soft-drink', '3-cocktail-soft-drink', '19082022031036-600x600-3-cocktail-soft-drink.jpg', '19082022031036-3-cocktail-soft-drink.jpg', '96044', '2022-08-18 15:40:36', '2022-08-18 15:40:36'),
(651, '4-cocktail-soft-drink', '4-cocktail-soft-drink', '19082022031039-600x600-4-cocktail-soft-drink.jpg', '19082022031039-4-cocktail-soft-drink.jpg', '69707', '2022-08-18 15:40:39', '2022-08-18 15:40:39'),
(652, '1-snow-crab', '1-snow-crab', '19082022032359-600x600-1-snow-crab.jpg', '19082022032359-1-snow-crab.jpg', '119920', '2022-08-18 15:53:59', '2022-08-18 15:53:59'),
(653, '2-snow-crab', '2-snow-crab', '19082022032402-600x600-2-snow-crab.jpg', '19082022032402-2-snow-crab.jpg', '107453', '2022-08-18 15:54:02', '2022-08-18 15:54:02'),
(654, '3-snow-crab', '3-snow-crab', '19082022032405-600x600-3-snow-crab.jpg', '19082022032405-3-snow-crab.jpg', '87903', '2022-08-18 15:54:05', '2022-08-18 15:54:05'),
(655, '4-snow-crab', '4-snow-crab', '19082022032408-600x600-4-snow-crab.jpg', '19082022032408-4-snow-crab.jpg', '76649', '2022-08-18 15:54:08', '2022-08-18 15:54:08'),
(656, '1-crayfish', '1-crayfish', '19082022035247-600x600-1-crayfish.jpg', '19082022035247-1-crayfish.jpg', '92013', '2022-08-18 16:22:47', '2022-08-18 16:22:47'),
(657, '2-crayfish', '2-crayfish', '19082022035252-600x600-2-crayfish.jpg', '19082022035252-2-crayfish.jpg', '78224', '2022-08-18 16:22:52', '2022-08-18 16:22:52'),
(658, '3-crayfish', '3-crayfish', '19082022035255-600x600-3-crayfish.jpg', '19082022035255-3-crayfish.jpg', '85027', '2022-08-18 16:22:55', '2022-08-18 16:22:55'),
(659, '4-crayfish', '4-crayfish', '19082022035258-600x600-4-crayfish.jpg', '19082022035258-4-crayfish.jpg', '80280', '2022-08-18 16:22:58', '2022-08-18 16:22:58'),
(660, '1-squid', '1-squid', '19082022040651-600x600-1-squid.jpg', '19082022040651-1-squid.jpg', '68159', '2022-08-18 16:36:51', '2022-08-18 16:36:51'),
(661, '2-squid', '2-squid', '19082022040654-600x600-2-squid.jpg', '19082022040654-2-squid.jpg', '63012', '2022-08-18 16:36:54', '2022-08-18 16:36:54'),
(662, '3-squid', '3-squid', '19082022040657-600x600-3-squid.jpg', '19082022040657-3-squid.jpg', '68586', '2022-08-18 16:36:57', '2022-08-18 16:36:57'),
(663, '4-squid', '4-squid', '19082022040700-600x600-4-squid.jpg', '19082022040700-4-squid.jpg', '91243', '2022-08-18 16:37:00', '2022-08-18 16:37:00'),
(664, '1-chicken', '1-chicken', '19082022041622-400x400-1-chicken.jpg', '19082022041622-1-chicken.jpg', '68397', '2022-08-18 16:46:22', '2022-08-18 16:46:22'),
(665, '2-chicken', '2-chicken', '19082022041625-400x400-2-chicken.jpg', '19082022041625-2-chicken.jpg', '69711', '2022-08-18 16:46:25', '2022-08-18 16:46:25'),
(666, '3-chicken', '3-chicken', '19082022041628-400x400-3-chicken.jpg', '19082022041628-3-chicken.jpg', '70607', '2022-08-18 16:46:28', '2022-08-18 16:46:28'),
(667, '4-chicken', '4-chicken', '19082022041949-600x600-4-chicken.jpg', '19082022041949-4-chicken.jpg', '79294', '2022-08-18 16:49:49', '2022-08-18 16:49:49'),
(668, '1-rack-of-lamb', '1-rack-of-lamb', '19082022042756-600x600-1-rack-of-lamb.jpg', '19082022042756-1-rack-of-lamb.jpg', '87603', '2022-08-18 16:57:56', '2022-08-18 16:57:56'),
(669, '2-rack-of-lamb', '2-rack-of-lamb', '19082022042800-600x600-2-rack-of-lamb.jpg', '19082022042800-2-rack-of-lamb.jpg', '69080', '2022-08-18 16:58:00', '2022-08-18 16:58:00'),
(670, '3-rack-of-lamb', '3-rack-of-lamb', '19082022042803-600x600-3-rack-of-lamb.jpg', '19082022042803-3-rack-of-lamb.jpg', '96447', '2022-08-18 16:58:03', '2022-08-18 16:58:03'),
(671, '4-rack-of-lamb', '4-rack-of-lamb', '19082022042805-600x600-4-rack-of-lamb.jpg', '19082022042805-4-rack-of-lamb.jpg', '71427', '2022-08-18 16:58:06', '2022-08-18 16:58:06'),
(672, '2-chicken', '2-chicken', '19082022043756-600x600-2-chicken.jpg', '19082022043756-2-chicken.jpg', '80055', '2022-08-18 17:07:57', '2022-08-18 17:07:57'),
(673, '4-chicken', '4-chicken', '19082022043759-600x600-4-chicken.jpg', '19082022043759-4-chicken.jpg', '91099', '2022-08-18 17:07:59', '2022-08-18 17:07:59'),
(674, '1-raw-chicken-legs', '1-raw-chicken-legs', '19082022043919-600x600-1-raw-chicken-legs.jpg', '19082022043919-1-raw-chicken-legs.jpg', '75564', '2022-08-18 17:09:19', '2022-08-18 17:09:19'),
(675, '3-raw-chicken-legs', '3-raw-chicken-legs', '19082022043922-600x600-3-raw-chicken-legs.jpg', '19082022043922-3-raw-chicken-legs.jpg', '124101', '2022-08-18 17:09:23', '2022-08-18 17:09:23'),
(676, '1-blackberry', '1-blackberry', '19082022044622-400x400-1-blackberry.jpg', '19082022044622-1-blackberry.jpg', '84951', '2022-08-18 17:16:22', '2022-08-18 17:16:22'),
(677, '2-blackberry', '2-blackberry', '19082022044625-400x400-2-blackberry.jpg', '19082022044625-2-blackberry.jpg', '80751', '2022-08-18 17:16:25', '2022-08-18 17:16:25'),
(678, '3-blackberry', '3-blackberry', '19082022044628-400x400-3-blackberry.jpg', '19082022044628-3-blackberry.jpg', '89988', '2022-08-18 17:16:28', '2022-08-18 17:16:28'),
(679, '1-passion', '1-passion', '19082022050242-600x600-1-passion.jpg', '19082022050242-1-passion.jpg', '108207', '2022-08-18 17:32:42', '2022-08-18 17:32:42'),
(680, '2-passion', '2-passion', '19082022050245-600x600-2-passion.jpg', '19082022050245-2-passion.jpg', '105597', '2022-08-18 17:32:46', '2022-08-18 17:32:46'),
(681, '3-passion', '3-passion', '19082022050248-600x600-3-passion.jpg', '19082022050248-3-passion.jpg', '92662', '2022-08-18 17:32:48', '2022-08-18 17:32:48'),
(682, '4-passion', '4-passion', '19082022050251-600x600-4-passion.jpg', '19082022050251-4-passion.jpg', '87726', '2022-08-18 17:32:51', '2022-08-18 17:32:51'),
(683, '1-peach', '1-peach', '19082022051624-600x600-1-peach.jpg', '19082022051624-1-peach.jpg', '92705', '2022-08-18 17:46:24', '2022-08-18 17:46:24'),
(684, '2-peach', '2-peach', '19082022051627-600x600-2-peach.jpg', '19082022051627-2-peach.jpg', '84713', '2022-08-18 17:46:27', '2022-08-18 17:46:27'),
(685, '3-peach', '3-peach', '19082022051631-600x600-3-peach.jpg', '19082022051631-3-peach.jpg', '83777', '2022-08-18 17:46:31', '2022-08-18 17:46:31'),
(686, '4-peach', '4-peach', '19082022051634-600x600-4-peach.jpg', '19082022051634-4-peach.jpg', '90291', '2022-08-18 17:46:34', '2022-08-18 17:46:34'),
(687, '1-pizza', '1-pizza', '19082022052814-600x600-1-pizza.jpg', '19082022052814-1-pizza.jpg', '93117', '2022-08-18 17:58:14', '2022-08-18 17:58:14'),
(688, '2-pizza', '2-pizza', '19082022052817-600x600-2-pizza.jpg', '19082022052817-2-pizza.jpg', '104220', '2022-08-18 17:58:17', '2022-08-18 17:58:17'),
(689, '3-pizza', '3-pizza', '19082022052820-600x600-3-pizza.jpg', '19082022052820-3-pizza.jpg', '100579', '2022-08-18 17:58:20', '2022-08-18 17:58:20'),
(690, '4-pizza', '4-pizza', '19082022052823-600x600-4-pizza.jpg', '19082022052823-4-pizza.jpg', '89992', '2022-08-18 17:58:23', '2022-08-18 17:58:23'),
(691, '1-chicken-wings', '1-chicken-wings', '19082022054547-600x600-1-chicken-wings.jpg', '19082022054547-1-chicken-wings.jpg', '100222', '2022-08-18 18:15:47', '2022-08-18 18:15:47'),
(692, '2-chicken-wings', '2-chicken-wings', '19082022054551-600x600-2-chicken-wings.jpg', '19082022054551-2-chicken-wings.jpg', '77458', '2022-08-18 18:15:51', '2022-08-18 18:15:51'),
(693, '3-chicken-wings', '3-chicken-wings', '19082022054554-600x600-3-chicken-wings.jpg', '19082022054554-3-chicken-wings.jpg', '83574', '2022-08-18 18:15:54', '2022-08-18 18:15:54'),
(694, '4-chicken-wings', '4-chicken-wings', '19082022054557-600x600-4-chicken-wings.jpg', '19082022054557-4-chicken-wings.jpg', '82045', '2022-08-18 18:15:57', '2022-08-18 18:15:57'),
(697, '1-sandwich', '1-sandwich', '19082022093540-600x600-1-sandwich.jpg', '19082022093540-1-sandwich.jpg', '121445', '2022-08-18 22:05:40', '2022-08-18 22:05:40'),
(698, '2-sandwich', '2-sandwich', '19082022093545-600x600-2-sandwich.jpg', '19082022093545-2-sandwich.jpg', '112183', '2022-08-18 22:05:45', '2022-08-18 22:05:45'),
(699, '3-sandwich', '3-sandwich', '19082022093548-600x600-3-sandwich.jpg', '19082022093548-3-sandwich.jpg', '92642', '2022-08-18 22:05:49', '2022-08-18 22:05:49'),
(700, '4-sandwich', '4-sandwich', '19082022093552-600x600-4-sandwich.jpg', '19082022093552-4-sandwich.jpg', '97780', '2022-08-18 22:05:52', '2022-08-18 22:05:52'),
(701, '5-sandwich', '5-sandwich', '19082022093555-600x600-5-sandwich.jpg', '19082022093555-5-sandwich.jpg', '74895', '2022-08-18 22:05:55', '2022-08-18 22:05:55'),
(702, '1-mixed-dry-fruits', '1-mixed-dry-fruits', '19082022094844-400x400-1-mixed-dry-fruits.jpg', '19082022094844-1-mixed-dry-fruits.jpg', '100759', '2022-08-18 22:18:45', '2022-08-18 22:18:45'),
(703, '2-mixed-dry-fruits', '2-mixed-dry-fruits', '19082022094855-400x400-2-mixed-dry-fruits.jpg', '19082022094855-2-mixed-dry-fruits.jpg', '76614', '2022-08-18 22:18:55', '2022-08-18 22:18:55'),
(704, '3-mixed-dry-fruits', '3-mixed-dry-fruits', '19082022094858-400x400-3-mixed-dry-fruits.jpg', '19082022094858-3-mixed-dry-fruits.jpg', '81772', '2022-08-18 22:18:58', '2022-08-18 22:18:58'),
(705, '4-mixed-dry-fruits', '4-mixed-dry-fruits', '19082022094902-400x400-4-mixed-dry-fruits.jpg', '19082022094902-4-mixed-dry-fruits.jpg', '75634', '2022-08-18 22:19:02', '2022-08-18 22:19:02'),
(706, '1-cashews', '1-cashews', '19082022100202-400x400-1-cashews.jpg', '19082022100202-1-cashews.jpg', '72320', '2022-08-18 22:32:02', '2022-08-18 22:32:02'),
(707, '2-cashews', '2-cashews', '19082022100205-400x400-2-cashews.jpg', '19082022100205-2-cashews.jpg', '78948', '2022-08-18 22:32:05', '2022-08-18 22:32:05'),
(708, '3-cashews', '3-cashews', '19082022100208-400x400-3-cashews.jpg', '19082022100208-3-cashews.jpg', '70591', '2022-08-18 22:32:08', '2022-08-18 22:32:08'),
(709, '1-almond-badam', '1-almond-badam', '19082022100759-400x400-1-almond-badam.jpg', '19082022100759-1-almond-badam.jpg', '76824', '2022-08-18 22:37:59', '2022-08-18 22:37:59'),
(710, '2-almond-badam', '2-almond-badam', '19082022100801-400x400-2-almond-badam.jpg', '19082022100801-2-almond-badam.jpg', '73805', '2022-08-18 22:38:01', '2022-08-18 22:38:01'),
(711, '3-almond-badam', '3-almond-badam', '19082022100804-400x400-3-almond-badam.jpg', '19082022100804-3-almond-badam.jpg', '90721', '2022-08-18 22:38:04', '2022-08-18 22:38:04'),
(712, '1-herbal-tea', '1-herbal-tea', '19082022101914-600x600-1-herbal-tea.jpg', '19082022101914-1-herbal-tea.jpg', '64659', '2022-08-18 22:49:15', '2022-08-18 22:49:15'),
(713, '2-herbal-tea', '2-herbal-tea', '19082022101918-600x600-2-herbal-tea.jpg', '19082022101918-2-herbal-tea.jpg', '65182', '2022-08-18 22:49:18', '2022-08-18 22:49:18'),
(714, '3-herbal-tea', '3-herbal-tea', '19082022101920-600x600-3-herbal-tea.jpg', '19082022101920-3-herbal-tea.jpg', '62257', '2022-08-18 22:49:20', '2022-08-18 22:49:20'),
(715, '1-coffee-latte', '1-coffee-latte', '19082022102541-600x600-1-coffee-latte.jpg', '19082022102541-1-coffee-latte.jpg', '71705', '2022-08-18 22:55:41', '2022-08-18 22:55:41'),
(716, '2-coffee-latte', '2-coffee-latte', '19082022102545-600x600-2-coffee-latte.jpg', '19082022102545-2-coffee-latte.jpg', '64828', '2022-08-18 22:55:45', '2022-08-18 22:55:45'),
(717, '1-green-tea', '1-green-tea', '19082022103010-400x400-1-green-tea.jpg', '19082022103010-1-green-tea.jpg', '81500', '2022-08-18 23:00:10', '2022-08-18 23:00:10'),
(718, '2-green-tea', '2-green-tea', '19082022103014-400x400-2-green-tea.jpg', '19082022103014-2-green-tea.jpg', '80422', '2022-08-18 23:00:14', '2022-08-18 23:00:14'),
(719, '3-green-tea', '3-green-tea', '19082022103017-400x400-3-green-tea.jpg', '19082022103017-3-green-tea.jpg', '67458', '2022-08-18 23:00:17', '2022-08-18 23:00:17'),
(720, '2-pastry', '2-pastry', '19082022103844-400x400-2-pastry.jpg', '19082022103844-2-pastry.jpg', '76709', '2022-08-18 23:08:44', '2022-08-18 23:08:44'),
(721, '1-pastry', '1-pastry', '19082022103847-400x400-1-pastry.jpg', '19082022103847-1-pastry.jpg', '63752', '2022-08-18 23:08:47', '2022-08-18 23:08:47'),
(722, '3-pastry', '3-pastry', '19082022103850-400x400-3-pastry.jpg', '19082022103850-3-pastry.jpg', '96196', '2022-08-18 23:08:50', '2022-08-18 23:08:50'),
(723, '1-w-bread', '1-w-bread', '19082022104438-600x600-1-w-bread.jpg', '19082022104438-1-w-bread.jpg', '82945', '2022-08-18 23:14:38', '2022-08-18 23:14:38'),
(724, '2-w-bread', '2-w-bread', '19082022104442-600x600-2-w-bread.jpg', '19082022104442-2-w-bread.jpg', '79438', '2022-08-18 23:14:42', '2022-08-18 23:14:42'),
(725, '3-w-bread', '3-w-bread', '19082022104445-600x600-3-w-bread.jpg', '19082022104445-3-w-bread.jpg', '93877', '2022-08-18 23:14:45', '2022-08-18 23:14:45'),
(726, '1-hand-painted-bread', '1-hand-painted-bread', '19082022104904-600x600-1-hand-painted-bread.jpg', '19082022104904-1-hand-painted-bread.jpg', '79208', '2022-08-18 23:19:04', '2022-08-18 23:19:04'),
(727, '2-hand-painted-bread', '2-hand-painted-bread', '19082022104907-600x600-2-hand-painted-bread.jpg', '19082022104907-2-hand-painted-bread.jpg', '72555', '2022-08-18 23:19:07', '2022-08-18 23:19:07'),
(728, '3-hand-painted-bread', '3-hand-painted-bread', '19082022104911-600x600-3-hand-painted-bread.jpg', '19082022104911-3-hand-painted-bread.jpg', '94362', '2022-08-18 23:19:11', '2022-08-18 23:19:11'),
(737, 'slider-1', 'slider-1', '19082022181217-400x400-slider-1.jpg', '19082022181217-slider-1.jpg', '87168', '2022-08-19 06:42:18', '2022-08-19 06:42:18'),
(739, 'slider-2', 'slider-2', '19082022181336-400x400-slider-2.jpg', '19082022181336-slider-2.jpg', '102493', '2022-08-19 06:43:36', '2022-08-19 06:43:36'),
(743, 'slider_h2_1', 'slider_h2_1', '20082022150916-400x400-slider_h2_1.jpg', '20082022150916-slider_h2_1.jpg', '137276', '2022-08-20 03:39:16', '2022-08-20 03:39:16'),
(744, 'slider_h2_2', 'slider_h2_2', '20082022151519-400x400-slider_h2_2.jpg', '20082022151519-slider_h2_2.jpg', '119365', '2022-08-20 03:45:19', '2022-08-20 03:45:19'),
(753, 'banner_5', 'banner_5', '22082022150919-400x400-banner_5.jpg', '22082022150919-banner_5.jpg', '22454', '2022-08-22 03:39:19', '2022-08-22 03:39:19'),
(754, 'banner_4', 'banner_4', '22082022151023-400x400-banner_4.jpg', '22082022151023-banner_4.jpg', '20568', '2022-08-22 03:40:23', '2022-08-22 03:40:23'),
(755, 'banner-3', 'banner-3', '22082022151100-400x400-banner-3.jpg', '22082022151100-banner-3.jpg', '24255', '2022-08-22 03:41:00', '2022-08-22 03:41:00'),
(756, 'banner-2', 'banner-2', '22082022151301-400x400-banner-2.jpg', '22082022151301-banner-2.jpg', '28504', '2022-08-22 03:43:01', '2022-08-22 03:43:01'),
(757, 'banner_1', 'banner_1', '22082022151335-400x400-banner_1.jpg', '22082022151335-banner_1.jpg', '89410', '2022-08-22 03:43:35', '2022-08-22 03:43:35'),
(758, 'deals_offer', 'deals_offer', '02092022061039-400x400-deals_offer.png', '02092022061039-deals_offer.png', '407063', '2022-09-01 18:40:39', '2022-09-01 18:40:39'),
(759, 'brand-1', 'brand-1', '09092022091517-400x400-brand-1.png', '09092022091517-brand-1.png', '15694', '2022-09-08 21:45:17', '2022-09-08 21:45:17'),
(760, 'brand-2', 'brand-2', '09092022091519-400x400-brand-2.png', '09092022091519-brand-2.png', '57554', '2022-09-08 21:45:20', '2022-09-08 21:45:20'),
(761, 'brand-3', 'brand-3', '09092022091522-400x400-brand-3.png', '09092022091522-brand-3.png', '17331', '2022-09-08 21:45:22', '2022-09-08 21:45:22'),
(762, 'brand-4', 'brand-4', '09092022091524-400x400-brand-4.png', '09092022091524-brand-4.png', '44480', '2022-09-08 21:45:24', '2022-09-08 21:45:24'),
(763, 'brand-5', 'brand-5', '09092022091526-400x400-brand-5.png', '09092022091526-brand-5.png', '14029', '2022-09-08 21:45:26', '2022-09-08 21:45:26'),
(764, 'brand-6', 'brand-6', '09092022091528-400x400-brand-6.png', '09092022091528-brand-6.png', '20563', '2022-09-08 21:45:28', '2022-09-08 21:45:28'),
(765, 'brand-7', 'brand-7', '09092022091535-400x400-brand-7.png', '09092022091535-brand-7.png', '12292', '2022-09-08 21:45:35', '2022-09-08 21:45:35'),
(770, 'blog_12', 'blog_12', '19102022165845-800x800-blog_12.jpg', '19102022165845-blog_12.jpg', '310824', '2022-10-19 05:28:45', '2022-10-19 05:28:45'),
(771, 'blog_11', 'blog_11', '19102022165907-800x800-blog_11.jpg', '19102022165907-blog_11.jpg', '577105', '2022-10-19 05:29:07', '2022-10-19 05:29:07'),
(772, 'blog_10', 'blog_10', '19102022170549-800x800-blog_10.jpg', '19102022170549-blog_10.jpg', '606860', '2022-10-19 05:35:49', '2022-10-19 05:35:49'),
(773, 'blog_9', 'blog_9', '19102022173946-800x800-blog_9.jpg', '19102022173946-blog_9.jpg', '363638', '2022-10-19 06:09:46', '2022-10-19 06:09:46'),
(774, 'blog_8', 'blog_8', '19102022174215-800x800-blog_8.jpg', '19102022174215-blog_8.jpg', '757841', '2022-10-19 06:12:15', '2022-10-19 06:12:15'),
(775, 'blog_7', 'blog_7', '20102022160647-800x800-blog_7.jpg', '20102022160647-blog_7.jpg', '512132', '2022-10-20 04:36:47', '2022-10-20 04:36:47'),
(776, 'blog_6', 'blog_6', '20102022160908-800x800-blog_6.jpg', '20102022160908-blog_6.jpg', '736939', '2022-10-20 04:39:08', '2022-10-20 04:39:08'),
(777, 'blog_5', 'blog_5', '20102022161346-800x800-blog_5.jpg', '20102022161346-blog_5.jpg', '692822', '2022-10-20 04:43:46', '2022-10-20 04:43:46'),
(778, 'blog_4', 'blog_4', '21102022130649-800x800-blog_4.jpg', '21102022130649-blog_4.jpg', '516776', '2022-10-21 01:36:50', '2022-10-21 01:36:50'),
(779, 'blog_3', 'blog_3', '21102022130816-800x800-blog_3.jpg', '21102022130816-blog_3.jpg', '581185', '2022-10-21 01:38:16', '2022-10-21 01:38:16'),
(780, 'blog_2', 'blog_2', '21102022130938-800x800-blog_2.jpg', '21102022130938-blog_2.jpg', '702738', '2022-10-21 01:39:38', '2022-10-21 01:39:38'),
(781, 'blog_1', 'blog_1', '21102022131056-800x800-blog_1.jpg', '21102022131056-blog_1.jpg', '432895', '2022-10-21 01:40:57', '2022-10-21 01:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `message_action`
--

CREATE TABLE `message_action` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `deleted_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_hard_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message_action`
--

INSERT INTO `message_action` (`id`, `conversation_id`, `deleted_by`, `created_at`, `updated_at`, `is_hard_delete`) VALUES
(0, 17, 9, NULL, NULL, 0),
(0, 18, 9, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `metas`
--

CREATE TABLE `metas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `meta_title` mediumtext DEFAULT NULL,
  `meta_description` mediumtext DEFAULT NULL,
  `meta_keyword` mediumtext DEFAULT NULL,
  `og_image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metas`
--

INSERT INTO `metas` (`id`, `uuid`, `slug`, `page_name`, `meta_title`, `meta_description`, `meta_keyword`, `og_image`, `created_at`, `updated_at`) VALUES
(1, '4bcd0b6f-5692-4966-8a4e-8884d72edaa4', 'home', 'Home', 'Home', 'LMSZai Learning management system', 'Lmszai, Lms, Learning, Course', NULL, NULL, '2023-07-18 07:44:59'),
(2, '3c3ef58d-d459-441b-9b90-370f840b2da1', 'course', 'Course List', 'Courses', 'LMSZai Course List', 'Lmszai, Lms, Learning, Course', NULL, NULL, '2023-07-18 07:44:59'),
(5, '62892323-3220-408d-81ea-8875dc1065f4', 'blog', 'Blog List', 'Blog', 'LMSZAI Blog', 'blog, course', NULL, NULL, '2023-07-18 07:44:59'),
(7, '4869c7e6-9635-4203-850a-09a41f4954cc', 'about_us', 'About Us', 'About Us', 'About Us', 'about us', NULL, NULL, '2024-06-07 05:23:20'),
(8, 'b7b70870-0248-4781-a9a3-a76cffefb534', 'contact_us', 'Contact Us', 'Contact Us', 'LMSZAI contact us', 'lmszai, contact us', NULL, NULL, '2023-07-18 07:44:59'),
(9, '07d0a702-7a57-428f-8003-c172679ecbd2', 'support_faq', 'Support Page', 'Support', 'LMSZAI support ticket', 'lmszai, support, ticket', NULL, NULL, '2023-07-18 07:44:59'),
(10, 'f00f9d36-6b9c-47ee-8649-8f50a2f9fe7a', 'privacy_policy', 'Privacy Policy', 'Privacy Policy', 'LMSZAI Privacy Policy', 'lmszai, privacy, policy', NULL, NULL, '2023-07-18 07:44:59'),
(11, 'f74400a5-415f-4604-849e-a03e4896ff99', 'cookie_policy', 'Cookie Policy', 'Cookie Policy', 'LMSZAI Cookie Policy', 'lmszai, cookie, policy', NULL, NULL, '2023-07-18 07:44:59'),
(12, '2e0f0a6e-c573-475c-8913-95e241504c1a', 'faq', 'FAQ', 'FAQ', 'LMSZAI FAQ', 'lmszai, faq', NULL, NULL, '2023-07-18 07:44:59'),
(13, '2e0f0a6e-c573-479c-8913-95e241504c1a', 'terms_and_condition', 'Terms & Conditions', 'Terms & Conditions', 'LMSZAI Terms & Conditions Policy', 'Terms,Conditions', NULL, NULL, '2023-07-18 07:44:59'),
(14, '2e0f0a6e-c573-479c-8913-95e24150000a', 'refund_policy', 'Refund Policy', 'Refund Policy', 'LMSZAI Refund Policy', 'Refund Policies', NULL, NULL, '2023-07-18 07:44:59'),
(51, 'd538d469-265f-44fc-95b9-dc57d10f8c81', 'default', 'Default', 'Demo Title', 'Demo Description', 'Demo Keywords', '', NULL, NULL),
(52, 'a241f1cb-3711-4609-90b2-976cb1ab53f7', 'auth', 'Auth Page', 'Auth Page', 'Auth Page Meta Description', 'Auth Page Meta Keywords', '', NULL, NULL),
(53, '26092a11-6aea-44ce-8880-41b47c692324', 'bundle', 'Bundle List', 'Bundle List', 'Bundle List Page Meta Description', 'Bundle List Page Meta Keywords', '', NULL, NULL),
(54, '42c68cfa-028f-4ffd-b4a0-b8da50978854', 'consultation', 'Consultation List', 'Consultation List', 'Consultation List Page Meta Description', 'Consultation List Page Meta Keywords', '', NULL, NULL),
(55, '857e3c5c-8430-4c5d-b009-e8f7e33dceb0', 'instructor', 'Instructor List', 'Instructor List', 'Instructor List Page Meta Description', 'Instructor List Page Meta Keywords', '', NULL, NULL),
(56, '2f9557c3-c10e-4b47-bf1c-040b6f0182e3', 'saas', 'Saas List', 'Saas List', 'Saas List Page Meta Description', 'Saas List Page Meta Keywords', '', NULL, NULL),
(57, 'b945d05c-d72b-4d1e-838d-f552c769d28f', 'subscription', 'Subscription List', 'Subscription List', 'Subscription List Page Meta Description', 'Subscription List Page Meta Keywords', '', NULL, NULL),
(58, 'a26d5ab1-1fd5-4eeb-9b32-04469f751cbf', 'verify_certificate', 'Verify certificate List', 'Verify certificate List', 'Verify certificate List Page Meta Description', 'Verify certificate List Page Meta Keywords', '', NULL, NULL),
(59, 'e5089c78-bca2-4d57-9cd4-2f3792d09810', 'forum', 'Forum', 'Forum', 'Forum Page Meta Description', 'Forum Page Meta Keywords', '', NULL, NULL);

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_17_112209_add_socialite_fields_to_users_table', 2),
(6, '2023_12_24_999999_add_active_status_to_users', 3),
(7, '2023_12_24_999999_add_avatar_to_users', 3),
(8, '2023_12_24_999999_add_dark_mode_to_users', 3),
(9, '2023_12_24_999999_add_messenger_color_to_users', 3),
(10, '2023_12_24_999999_create_chatify_favorites_table', 3),
(11, '2023_12_24_999999_create_chatify_messages_table', 3),
(12, '2023_12_25_053745_create_orders_table', 4),
(13, '2023_12_25_104906_create_tasks_table', 5),
(14, '2023_12_25_133036_create_purchases_table', 6),
(15, '2023_12_27_043258_create_balances_table', 7),
(16, '2023_12_27_044127_add_balance_to_users_table', 8),
(17, '2023_12_27_080751_create_payments_table', 9),
(18, '2016_06_01_000001_create_oauth_auth_codes_table', 10),
(19, '2016_06_01_000002_create_oauth_access_tokens_table', 10),
(20, '2016_06_01_000003_create_oauth_refresh_tokens_table', 10),
(21, '2016_06_01_000004_create_oauth_clients_table', 10),
(22, '2016_06_01_000005_create_oauth_personal_access_clients_table', 10),
(23, '2024_01_10_085202_create_posting_ads_table', 11),
(24, '2024_01_10_121310_create_images_table', 12),
(25, '2024_01_17_071550_create_banners_table', 13),
(26, '2024_01_17_085258_create_ads_table', 14),
(27, '2024_01_17_104036_create_calendars_table', 15),
(28, '2024_01_17_140951_create_credit_reload_promotions_table', 16),
(29, '2024_01_16_172130_create_attentions_table', 17),
(30, '2024_06_09_091155_create_permissions_table', 18),
(31, '2024_06_24_084835_create_product_variations_table', 19),
(32, '2024_11_03_091345_create_courses_table', 20),
(33, '2024_11_03_095819_add_uuid_to_courses_table', 21),
(34, '2024_11_03_100251_add_video_thumbnail_to_courses_table', 22),
(35, '2024_11_05_055606_create_events_table', 23);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `sender_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `text` varchar(255) NOT NULL,
  `target_url` varchar(255) DEFAULT NULL,
  `is_seen` varchar(255) NOT NULL DEFAULT 'no' COMMENT 'yes, no',
  `user_type` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1=admin, 2=instructor, 3=student',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `uuid`, `sender_id`, `user_id`, `text`, `target_url`, `is_seen`, `user_type`, `created_at`, `updated_at`) VALUES
(1, '99dfced7-5d8a-4d8d-9702-c2378ab1eb5a', 3, 3, 'check', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 03:45:25', '2024-04-09 03:45:46'),
(2, 'f4bee097-3288-40e8-8adf-abd1e5a58657', 4, 4, 'fgdf', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 03:45:56', '2024-04-09 03:47:53'),
(3, '937b1b02-1a2e-40dd-9749-eebf93991939', 4, 4, 'fdgfhgfhfh', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 03:45:59', '2024-04-09 03:56:45'),
(4, 'b3365cc5-49d4-46b1-81b9-786fc06a50cc', 4, 4, 'ertete', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 03:46:02', '2024-04-09 04:00:46'),
(5, '8a3f415c-a530-48c3-a06a-54a56fcacc34', 3, 4, 'iouo', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 03:59:09', '2024-04-09 04:00:46'),
(6, '4d9ac21b-ee2e-4ba3-8835-a8cb86b7275b', 3, 4, 'bbhhgjghj', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 03:59:14', '2024-04-09 04:00:46'),
(7, 'dd6b19c7-b11d-4d03-af23-502e24a7604d', 3, 4, 'fghfdgfd', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 04:00:24', '2024-04-09 04:00:46'),
(8, 'cd593c0f-9d01-48e0-82d5-3cb1a27725ff', 3, 4, 'vbnvn', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 04:00:29', '2024-04-09 04:00:46'),
(9, '4d61e14c-9b78-4ace-8949-4a4ce3684c7b', 4, 3, 'vbvzzx', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 04:01:05', '2024-04-09 04:01:46'),
(10, '30b19b51-2e1b-4d6c-a3f1-830d659bc488', 4, 3, 'weqeqe', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 04:01:10', '2024-04-09 04:01:46'),
(11, '65894d7b-2ddd-4b9c-8285-ae7e172678af', 4, 3, 'kj;j;jljkl', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 04:01:15', '2024-04-09 04:01:46'),
(12, '77a7e377-cd47-41f7-9a04-2edc47bee3ca', 3, 4, 'hey whats up', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 07:38:07', '2024-04-09 08:01:15'),
(13, '37c7b788-0626-44e6-afed-fa936c7e8b89', 4, 3, 'just testing chatting feature', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 07:38:26', '2024-04-09 08:17:27'),
(14, 'ed7c8ce2-5558-44c2-b441-b78570255717', 3, 4, 'yeah it\'s working', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 07:38:50', '2024-04-09 08:01:15'),
(15, '90e1027e-027f-4ce4-aba0-43e38b600a1b', 4, 3, 'i know but you need to improve chatting system more', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 07:39:27', '2024-04-09 08:17:27'),
(16, 'd9d70bea-11ac-43d0-b9da-405547dbda42', 3, 4, 'yeah i will', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 07:39:50', '2024-04-09 08:01:15'),
(17, '7df5d469-67cd-4d79-84a5-1ad247eb0ae9', 4, 3, 'eneough for now', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 07:40:13', '2024-04-09 08:17:27'),
(18, 'ba98d56e-4fe0-4234-83f2-112924797743', 3, 4, 'ok', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 07:40:21', '2024-04-09 08:01:15'),
(19, 'a3916bd7-36bf-48f9-bd96-ec7f7cc05e5a', 3, 4, 'hi', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 08:02:14', '2024-04-09 08:17:58'),
(20, '0531f7f3-1202-477c-af2e-0dddc28146ca', 4, 3, 'hi', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 08:02:30', '2024-04-09 08:17:27'),
(21, '0af3600a-6b67-4faf-ae4a-f18a330b982f', 4, 3, 'mfgfdg', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 08:02:56', '2024-04-09 08:17:27'),
(22, '87fc9dd4-99c8-4813-aba7-0fac9e2d01e8', 3, 4, 'rrr', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 08:10:21', '2024-04-09 08:17:58'),
(23, 'd00fec13-3040-4170-aa96-e7c1173635a9', 4, 3, '3333', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 08:10:34', '2024-04-09 08:17:27'),
(24, 'c915a605-74f6-48b8-8062-d1a24004de91', 3, 4, 'sd', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 08:10:55', '2024-04-09 08:17:58'),
(25, 'cbeb3eaf-8cac-49c5-a7cf-3826d29db7cc', 3, 4, 'sdfa', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 08:11:04', '2024-04-09 08:17:58'),
(26, 'f47f0935-36d2-4e1e-b764-a6dba7a86ae2', 4, 3, 'sdd', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 08:11:18', '2024-04-09 08:17:27'),
(27, '33b7666c-6741-442b-9963-56d9a922128e', 3, 4, 'sdf', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 08:11:29', '2024-04-09 08:17:58'),
(28, '15329116-be2b-4377-afbe-483c10261e6d', 4, 3, 'sd', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 08:12:00', '2024-04-09 08:17:27'),
(29, '9ad2815e-6e71-4853-91ea-0c70bcf0d0ca', 3, 4, 'dfghf', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 08:12:43', '2024-04-09 08:17:58'),
(30, '77159643-7d5d-43d4-867d-6da78f7e32f7', 4, 3, '[[[', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 08:12:57', '2024-04-09 08:17:27'),
(31, 'be0ea40d-2fe9-4d38-9175-ca774b9a4b69', 3, 4, ']]]', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-09 08:13:14', '2024-04-09 08:17:58'),
(32, '16117097-583a-4823-a3d1-5cea773cbbdb', 1, 1, 'Project status is unknown.', 'http://127.0.0.1:8000/project-details/non-qui-dolor-et-et-iste-veniam-1', 'yes', 2, '2024-04-12 01:21:22', '2024-04-17 00:22:03'),
(33, '720ad673-f95a-4147-a2bb-ace8e5be806d', 1, 1, 'Project has been approved.', 'http://127.0.0.1:8000/project-details/unogesic-mr-250mg50mg325mg-tablet-wow', 'yes', 2, '2024-04-12 01:29:28', '2024-04-17 00:22:03'),
(34, '1fbba4c0-e899-497a-bf64-bf9a0e901dc3', 28, 28, 'A new user has registered on the platform.', 'http://127.0.0.1:8000/admin/users', 'yes', 1, '2024-04-12 05:25:38', '2024-06-21 23:24:55'),
(35, '4f3f8f95-9fda-4cbc-a40f-cadbd39efb79', 29, 29, 'A new user has registered on the platform.', 'http://127.0.0.1:8000/admin/users', 'yes', 1, '2024-04-12 05:28:38', '2024-06-21 23:24:51'),
(36, '1b2972b6-a34f-45e3-8043-e39be6969d17', 1, 1, 'Project has been approved.', 'http://127.0.0.1:8000/project-details/audiophile-first-smart-wireless-headphones-1', 'yes', 2, '2024-04-13 21:45:02', '2024-04-17 00:22:03'),
(37, '68c8c01e-0bb9-460c-8692-53bce08fe6e8', 1, 1, 'Project has been approved.', 'http://127.0.0.1:8000/project-details/audiophile-first-smart-wireless-headphones', 'yes', 2, '2024-04-13 21:45:29', '2024-04-17 00:22:03'),
(38, 'f2a4898a-f63c-4cc4-9804-319d6b6ce29a', 1, 1, 'Project has been approved.', 'http://127.0.0.1:8000/project-details/aut-distinctio-molestiae-accusamus-sint-reprehenderit-aut-et-1', 'yes', 2, '2024-04-13 21:47:17', '2024-04-17 00:22:03'),
(39, '0e701640-9d00-47e7-acff-678a0a5dd442', 1, 1, 'Project has been approved.', 'http://127.0.0.1:8000/project-details/dolor-asperiores-suscipit-magni-numquam-1', 'yes', 2, '2024-04-13 21:48:21', '2024-04-17 00:22:03'),
(40, '945fd99f-fd1f-45bb-a305-df95ae620418', 1, 1, 'Project status is unknown.', 'http://127.0.0.1:8000/project-details/iste-qui-deleniti-quidem-velit-dolor-sint-1', 'yes', 2, '2024-04-13 21:49:28', '2024-04-17 00:22:03'),
(41, '03006259-cd24-4ec9-8cba-cd1f0fd3fb3b', 1, 1, 'Project status is unknown.', 'http://127.0.0.1:8000/project-details/unogesic-mr-250mg50mg325mg-tablet-wow-1', 'yes', 2, '2024-04-13 21:49:50', '2024-04-17 00:22:03'),
(42, '08440c65-d55a-491d-b3be-10131ae5497e', 1, 1, 'Project has been approved.', 'http://127.0.0.1:8000/project-details/audiophile-first-smart-wireless-headphones-1', 'yes', 2, '2024-04-16 22:24:19', '2024-04-17 00:22:03'),
(43, '3ab5fb2e-604e-4144-8812-39d87359de80', 1, 1, 'Project has been approved.', 'http://127.0.0.1:8000/project-details/audiophile-first-smart-wireless-headphones', 'yes', 2, '2024-04-16 22:26:36', '2024-04-17 00:22:03'),
(44, 'aeb22589-6655-4cfb-9018-dd5457e19b1f', 29, 29, 'You have a new backer on your Campaign', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-17 01:08:33', '2024-04-17 01:09:03'),
(45, 'f2edce77-d505-49d1-8762-783f91ff4f3f', 29, 28, 'You have a new backer on your Campaign', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-17 01:15:38', '2024-04-17 02:59:18'),
(46, '676bfbf3-c38a-4dbb-bc30-14fab37d6644', 3, 4, 'n', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-17 01:54:38', '2024-04-17 02:00:13'),
(47, '7bc9a622-9000-4a66-b238-010fa74704cc', 4, 3, 'd', 'http://127.0.0.1:8000/chat', 'no', 2, '2024-04-17 01:55:10', '2024-04-17 01:55:10'),
(48, '174fa506-97eb-4e68-a940-46517b90a42f', 4, 3, 'it is working', 'http://127.0.0.1:8000/chat', 'no', 2, '2024-04-17 02:00:33', '2024-04-17 02:00:33'),
(49, 'd741da7c-1860-4d58-b913-7d0868b72fe0', 3, 4, 'yeah', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-17 02:01:08', '2024-04-17 02:01:46'),
(50, '243ec4bb-b9cc-4756-95af-82e545b86f6b', 4, 3, 'confuse', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-17 02:03:13', '2024-04-17 02:03:42'),
(51, 'b7a58765-16fa-4474-8c4c-248f1f7f4aff', 3, 4, 'tell me confesiion you have', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-17 02:04:11', '2024-04-17 02:04:30'),
(52, '1f3b8273-e14f-4fbb-b94f-ed5285f92495', 3, 1, 'hi', 'http://127.0.0.1:8000/chat', 'no', 2, '2024-04-17 02:53:58', '2024-04-17 02:53:58'),
(53, 'aa098a34-fc81-4eb6-9645-22d18f463341', 28, 28, 'fuck you', 'http://127.0.0.1:8000/chat', 'no', 2, '2024-04-17 02:58:24', '2024-04-17 02:58:24'),
(54, '4d8a8dfd-adfe-405d-8a45-9b732c6f4e71', 4, 28, 'j', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-17 03:00:31', '2024-04-17 03:02:39'),
(55, '28b97665-73e3-4d01-bae9-b30da199d9ec', 28, 28, 'y', 'http://127.0.0.1:8000/chat', 'no', 2, '2024-04-17 03:01:04', '2024-04-17 03:01:04'),
(56, '2a491c80-b5c4-4882-a9e9-f179c0abc69e', 28, 4, 'THIS IS TESTING FROM FULL STACK DEV', 'http://127.0.0.1:8000/chat', 'no', 2, '2024-04-17 03:02:49', '2024-04-17 03:02:49'),
(57, '1687b1eb-4be4-4d1d-b348-d720185a51a5', 4, 28, 'sd', 'http://127.0.0.1:8000/chat', 'no', 2, '2024-04-17 03:04:51', '2024-04-17 03:04:51'),
(58, 'd4c37aa2-9c81-4fa4-8e5e-249921514041', 28, 4, 'f', 'http://127.0.0.1:8000/chat', 'no', 2, '2024-04-17 03:05:06', '2024-04-17 03:05:06'),
(59, '1514c365-cdb4-41f6-92bc-0b1131570cd8', 4, 28, 'FROM', 'http://127.0.0.1:8000/chat', 'no', 2, '2024-04-17 03:10:10', '2024-04-17 03:10:10'),
(60, '02a746b3-3ddf-412f-ab46-fc837b34a431', 4, 1, 'd', 'http://127.0.0.1:8000/chat', 'yes', 2, '2024-04-17 03:13:08', '2024-04-17 03:13:59'),
(61, '6c9d61ba-604c-4161-ad90-9ed6ef310fbe', 1, 4, 'what happen', 'http://127.0.0.1:8000/chat', 'no', 2, '2024-04-17 03:14:12', '2024-04-17 03:14:12'),
(62, 'f3a98909-2263-4557-9473-7eb49f40dbf6', 29, 4, 'chatting with mail notification', 'http://127.0.0.1:8000/chat', 'no', 2, '2024-04-17 03:22:56', '2024-04-17 03:22:56'),
(63, '05378e7a-79ea-4538-aa8b-4a50be59ad5a', 29, 4, 'chatting with mail notification', 'http://127.0.0.1:8000/chat', 'no', 2, '2024-04-17 03:22:59', '2024-04-17 03:22:59'),
(64, '564bf604-08b1-4d30-aa9a-0da9388cc1e9', 4, 29, 'yeah', 'http://127.0.0.1:8000/chat', 'no', 2, '2024-04-17 03:24:36', '2024-04-17 03:24:36'),
(65, '9b0a5d7d-8ddd-40e1-9f85-709e566db217', 1, 1, 'A new blog has posted on the platform.', 'http://127.0.0.1:8000/blog_details/T%C3%ADtulo%20del%20Blog', 'no', 2, '2024-10-28 03:50:57', '2024-10-28 03:50:57'),
(66, '81d70b39-7df8-48e0-8b15-8c4af146004a', 1, 1, 'A new blog has posted on the platform.', 'http://127.0.0.1:8000/blog_details/T%C3%ADtulo%20del%20Blog%203', 'no', 2, '2024-10-28 03:52:57', '2024-10-28 03:52:57'),
(67, '7fb7a456-ec87-4831-9cb6-007aad398a97', 3, 3, 'A new user has registered on the platform.', 'http://127.0.0.1:8000/admin/users', 'yes', 1, '2024-10-29 22:26:39', '2024-10-31 02:03:32'),
(68, 'af38da33-730c-4eb3-846d-2a44a88a935b', 4, 4, 'A new user has registered on the platform.', 'http://127.0.0.1:8000/admin/users', 'no', 1, '2024-10-30 06:09:30', '2024-10-30 06:09:30'),
(69, '967e8eb3-f18e-4894-b40c-d8ee30d0ffe0', 5, 5, 'A new user has registered on the platform.', 'http://127.0.0.1:8000/admin/users', 'yes', 1, '2024-10-31 01:23:31', '2024-10-31 02:03:27'),
(70, '4e08702a-5c15-4fce-a8e4-180936fe8504', 1, 5, 'Un nuevo ticket ha sido creado con el siguiente asunto', 'http://127.0.0.1:8000/admin/support-ticket/index', 'no', 1, '2024-11-09 06:34:11', '2024-11-09 06:34:11'),
(71, 'f4b37aec-5a37-4a3c-bdc2-e23beccac76f', 1, 5, 'Un nuevo ticket ha sido creado con el siguiente asunto', 'http://127.0.0.1:8000/admin/support-ticket/index', 'no', 1, '2024-11-09 07:01:08', '2024-11-09 07:01:08'),
(72, 'bfbe02ea-6b51-42f2-bbea-d6a7e38582bd', 1, 5, 'Un nuevo ticket ha sido creado con el siguiente asunto', 'http://127.0.0.1:8000/admin/support-ticket/index', 'yes', 1, '2024-11-09 07:09:47', '2024-11-09 07:10:23'),
(73, '9557ee25-c567-41fd-88a2-c88ce7ec9dc9', 1, 5, 'Un nuevo ticket ha sido creado con el siguiente asunto', 'http://127.0.0.1:8000/admin/support-ticket/index', 'no', 1, '2024-11-09 07:16:43', '2024-11-09 07:16:43'),
(74, '02a81608-c105-4a2a-953b-5c4627daf3bb', 1, 5, 'Un nuevo ticket ha sido creado con el siguiente asunto', 'http://127.0.0.1:8000/admin/support-ticket/index', 'no', 1, '2024-11-09 07:20:10', '2024-11-09 07:20:10'),
(75, '673db4da-5033-4f01-b7c6-ce6e7e91c321', 6, 6, 'A new user has registered on the platform.', 'http://127.0.0.1:8000/admin/users', 'no', 1, '2024-11-20 00:36:58', '2024-11-20 00:36:58'),
(76, '29df9afe-9e56-41c8-b4d4-69947cc88e08', 7, 7, 'A new user has registered on the platform.', 'http://127.0.0.1:8000/admin/users', 'no', 1, '2024-11-20 00:46:16', '2024-11-20 00:46:16'),
(77, '6a7f77d1-68a2-405f-9358-abd376c99680', 8, 8, 'A new user has registered on the platform.', 'http://127.0.0.1:8000/admin/users', 'no', 1, '2024-11-20 00:50:55', '2024-11-20 00:50:55'),
(78, '9d01bfd4-2f70-4292-a3cc-772004f72078', 9, 9, 'A new user has registered on the platform.', 'http://127.0.0.1:8000/admin/users', 'no', 1, '2024-11-20 00:53:52', '2024-11-20 00:53:52'),
(79, 'b6633346-b667-42b5-90cc-01ab1e6790c0', 10, 10, 'A new user has registered on the platform.', 'http://127.0.0.1:8000/admin/users', 'no', 1, '2024-11-20 01:56:58', '2024-11-20 01:56:58'),
(80, 'ec8b1ba3-d9dd-416e-bbd1-ad37c1a5ea58', 11, 11, 'A new user has registered on the platform.', 'http://127.0.0.1:8000/admin/users', 'no', 1, '2024-11-20 02:01:41', '2024-11-20 02:01:41');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `page_title` varchar(500) NOT NULL,
  `page_slug` varchar(500) NOT NULL,
  `page_content` text NOT NULL,
  `page_order` int(3) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_title`, `page_slug`, `page_content`, `page_order`, `status`) VALUES
(2, 'Términos y condiciones', 'terms-of-use', '<p><strong>Use of this site is provided by Demos subject to the following Terms and Conditions:</strong><br />1. Your use constitutes acceptance of these Terms and Conditions as at the date of your first use of the site.<br />2. Demos reserves the rights to change these Terms and Conditions at any time by posting changes online. Your continued use of this site after changes are posted constitutes your acceptance of this agreement as modified.<br />3. You agree to use this site only for lawful purposes, and in a manner which does not infringe the rights, or restrict, or inhibit the use and enjoyment of the site by any third party.<br />4. This site and the information, names, images, pictures, logos regarding or relating to Demos are provided &ldquo;as is&rdquo; without any representation or endorsement made and without warranty of any kind whether express or implied. In no event will Demos be liable for any damages including, without limitation, indirect or consequential damages, or any damages whatsoever arising from the use or in connection with such use or loss of use of the site, whether in contract or in negligence.<br />5. Demos does not warrant that the functions contained in the material contained in this site will be uninterrupted or error free, that defects will be corrected, or that this site or the server that makes it available are free of viruses or bugs or represents the full functionality, accuracy and reliability of the materials.<br />6. Copyright restrictions: please refer to our Creative Commons license terms governing the use of material on this site.<br />7. Demos takes no responsibility for the content of external Internet Sites.<br />8. Any communication or material that you transmit to, or post on, any public area of the site including any data, questions, comments, suggestions, or the like, is, and will be treated as, non-confidential and non-proprietary information.<br />9. If there is any conflict between these Terms and Conditions and rules and/or specific terms of use appearing on this site relating to specific material then the latter shall prevail.<br />10. These terms and conditions shall be governed and construed in accordance with the laws of England and Wales. Any disputes shall be subject to the exclusive jurisdiction of the Courts of England and Wales.<br />11. If these Terms and Conditions are not accepted in full, the use of this site must be terminated immediately.</p>', 2, 1),
(5, 'Contact', 'contact', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing.</p>', 5, 1),
(8, 'test', 'test', '<p>test update</p>', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(7, 'aasifdev5@gmail.com', 'SqagKMZrLr3AzqXLTgryebgXHEX06FQOlUkETb6j', '2023-12-22 08:16:59'),
(8, 'asifarslaan@gmail.com', 'iP3fibOTbjdQz7R1THL7qA16eGpZmInWuzj763sB', '2023-12-18 07:17:16'),
(12, 'flaquit0_mgas_1785@hotmail.com', 'iCy8u3uOntyHsfiir5XtVSYjgWa0UVYr92Y1fOOP', '2024-02-04 00:43:29'),
(13, 'juanartunduaga@gmail.com', 'QtBJ7A3FQD1YpFad2d5K2zb2OSRleCnwjlulaolx', '2024-02-05 18:05:09'),
(14, 'mansilla2244edu@gmail.com', 'QsNSbaePXl8k2pcNMrBm0kajhPt94gYcSrcj4f1r', '2024-02-08 05:26:53'),
(15, 'yasminlopes472@gmail.com', 'lMMe0pXNJ1UTapkQGPnQZuCUX3e6UCQjDo2fFijW', '2024-03-07 15:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `product_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`product_details`)),
  `user_id` int(11) DEFAULT NULL,
  `reward_id` int(11) DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `payment_receipt` text DEFAULT NULL,
  `accepted` tinyint(1) DEFAULT NULL,
  `status` enum('initial','pending','success','failed','declined','dispute') DEFAULT 'initial',
  `payer_email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `name`, `email`, `product_details`, `user_id`, `reward_id`, `amount`, `payment_receipt`, `accepted`, `status`, `payer_email`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Aasif Ahmed', NULL, NULL, 9, NULL, 1000.00, 'payment_receipt/logo.png', 1, 'initial', 'hrnatrajinffdggbvfdgotech@gmail.com', '2024-11-20 01:08:48', '2024-11-20 01:27:59'),
(2, NULL, 'brijlal pawar', NULL, NULL, 11, NULL, 1000.00, 'payment_receipt/socialandrea.png', 0, 'initial', 'brijlalpawar@gmail.com', '2024-11-20 02:02:16', '2024-11-20 02:02:16'),
(3, NULL, 'brijlal pawar', NULL, NULL, 11, NULL, 1000.00, 'payment_receipt/image (4).png', 0, 'initial', 'brijlalpawar@gmail.com', '2024-11-20 02:02:31', '2024-11-20 02:02:31'),
(4, NULL, 'brijlal pawar', NULL, NULL, 11, NULL, 198.00, 'payment_receipt/blog.png', 1, 'initial', 'brijlalpawar@gmail.com', '2024-11-20 02:02:48', '2024-11-20 02:14:25'),
(5, NULL, 'brijlal pawar', NULL, NULL, 11, NULL, 1000.00, 'payment_receipt/pqjvedcnyp9xjpaxk4kv.jpg', 1, 'initial', 'brijlalpawar@gmail.com', '2024-11-20 02:04:06', '2024-11-20 02:12:09'),
(6, NULL, 'brijlal pawar', NULL, NULL, 11, NULL, 1000.00, 'payment_receipt/pqjvedcnyp9xjpaxk4kv.jpg', 1, 'initial', 'brijlalpawar@gmail.com', '2024-11-20 02:04:44', '2024-11-20 02:10:32'),
(7, NULL, 'brijlal pawar', NULL, NULL, 11, NULL, 1000.00, 'payment_receipt/image_750x_65cc96e678ac4.png', 1, 'initial', 'brijlalpawar@gmail.com', '2024-11-20 02:06:59', '2024-11-20 02:08:40');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Application', NULL, '2024-06-09 04:00:39', '2024-06-09 04:37:12'),
(2, 'Global Settings', 1, '2024-06-09 04:01:36', '2024-06-09 04:01:36'),
(3, 'Location Settings', 1, '2024-06-09 04:02:16', '2024-06-09 04:02:16'),
(4, 'Support Tickets', 1, '2024-06-09 04:03:16', '2024-06-09 04:03:16'),
(5, 'Blog', NULL, '2024-06-09 04:03:44', '2024-06-09 04:03:44'),
(6, 'Add Blog', 5, '2024-06-09 04:04:09', '2024-06-09 04:04:09'),
(7, 'Blog Comments', 5, '2024-06-09 04:04:59', '2024-06-09 04:04:59'),
(8, 'Pages', NULL, '2024-06-09 04:05:45', '2024-06-09 04:05:45');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `permissions` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(2, 'Admin', 'web', '2024-04-05 06:43:40', '2024-04-05 06:43:40'),
(3, 'Backer', 'web', '2024-04-05 06:45:26', '2024-04-05 06:45:26'),
(4, 'Alex', 'web', '2024-06-09 07:53:25', '2024-06-09 07:53:25');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(5, 1),
(6, 1),
(8, 1),
(11, 1),
(12, 1),
(14, 1),
(15, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(20, 3),
(21, 1),
(21, 2),
(22, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(27, 2),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(33, 2),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(43, 1),
(44, 1),
(47, 3),
(48, 1),
(50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_key` varchar(255) NOT NULL,
  `option_value` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `option_key`, `option_value`, `created_at`, `updated_at`) VALUES
(1, 'app_name', 'Negociosgen', '2022-12-04 17:05:33', '2024-10-27 00:11:55'),
(2, 'app_email', 'negociosgen@gmail.com', '2022-12-04 17:05:33', '2024-10-27 00:11:55'),
(3, 'app_contact_number', '+591 45626594', '2022-12-04 17:05:33', '2024-10-27 00:11:55'),
(4, 'app_location', 'Bolivia', '2022-12-04 17:05:33', '2024-10-27 00:11:55'),
(5, 'app_date_format', 'd F, Y', '2022-12-04 17:05:33', '2024-10-27 00:11:55'),
(6, 'app_timezone', 'Asia/Dhaka', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(7, 'allow_preloader', '0', '2022-12-04 17:05:33', '2024-06-06 23:23:32'),
(8, 'app_preloader', 'uploads/setting/1730007715-7rQJlv1l3P.svg', '2022-12-04 17:05:33', '2024-10-27 00:11:55'),
(9, 'app_logo', 'uploads/setting/1730007715-7ifbvfCuNf.svg', '2022-12-04 17:05:33', '2024-10-27 00:11:55'),
(10, 'app_fav_icon', 'uploads/setting/1730007715-vXGYdeBKq4.svg', '2022-12-04 17:05:33', '2024-10-27 00:11:55'),
(11, 'app_copyright', 'Negociosgen', '2022-12-04 17:05:33', '2024-10-27 00:11:55'),
(12, 'app_developed', 'AAsif', '2022-12-04 17:05:33', '2024-10-27 00:11:55'),
(13, 'og_title', 'LMSZAI - Learning Management System', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(14, 'og_description', 'Learning Management System', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(15, 'zoom_status', '1', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(16, 'bbb_status', '1', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(17, 'jitsi_status', '1', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(18, 'jitsi_server_base_url', 'https://meet.jit.si/', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(19, 'registration_email_verification', '0', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(20, 'footer_quote', NULL, '2022-12-04 17:05:33', '2024-06-07 01:01:03'),
(21, 'paystack_currency', 'AFA', '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(22, 'paystack_conversion_rate', '1', '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(23, 'paystack_status', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(24, 'PAYSTACK_PUBLIC_KEY', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(25, 'PAYSTACK_SECRET_KEY', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(26, 'paypal_currency', 'AFA', '2022-12-04 17:05:33', '2024-10-27 01:16:43'),
(27, 'paypal_conversion_rate', '15', '2022-12-04 17:05:33', '2024-10-27 01:16:43'),
(28, 'paypal_status', '1', '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(29, 'PAYPAL_MODE', 'sandbox', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(30, 'PAYPAL_CLIENT_ID', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(31, 'PAYPAL_SECRET', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(32, 'stripe_currency', 'AFA', '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(33, 'stripe_conversion_rate', '1', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(34, 'stripe_status', '1', '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(35, 'STRIPE_MODE', 'sandbox', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(36, 'STRIPE_SECRET_KEY', '', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(37, 'STRIPE_PUBLIC_KEY', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(38, 'razorpay_currency', 'AFA', '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(39, 'razorpay_conversion_rate', '1', '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(40, 'razorpay_status', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(41, 'RAZORPAY_KEY', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(42, 'RAZORPAY_SECRET', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(43, 'mollie_currency', 'AFA', '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(44, 'mollie_conversion_rate', '1', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(45, 'mollie_status', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(46, 'MOLLIE_KEY', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(47, 'im_currency', 'AFA', '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(48, 'im_conversion_rate', '1', '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(49, 'im_status', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(50, 'IM_API_KEY', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(51, 'IM_AUTH_TOKEN', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(52, 'IM_URL', 'https://test.instamojo.com/api/1.1/payment-requests/', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(53, 'sslcommerz_currency', 'AFA', '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(54, 'sslcommerz_conversion_rate', '1', '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(55, 'sslcommerz_status', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(56, 'sslcommerz_mode', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(57, 'SSLCZ_STORE_ID', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(58, 'SSLCZ_STORE_PASSWD', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(59, 'MAIL_DRIVER', 'smtp', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(60, 'MAIL_HOST', NULL, '2022-12-04 17:05:33', '2024-10-27 00:59:40'),
(61, 'MAIL_PORT', NULL, '2022-12-04 17:05:33', '2024-10-27 00:59:40'),
(62, 'MAIL_USERNAME', NULL, '2022-12-04 17:05:33', '2024-10-27 00:59:40'),
(63, 'MAIL_PASSWORD', NULL, '2022-12-04 17:05:33', '2024-10-27 00:59:40'),
(64, 'MAIL_ENCRYPTION', 'tls', '2022-12-04 17:05:33', '2024-06-07 06:29:46'),
(65, 'MAIL_FROM_ADDRESS', NULL, '2022-12-04 17:05:33', '2024-10-27 00:59:40'),
(66, 'MAIL_FROM_NAME', NULL, '2022-12-04 17:05:33', '2024-10-27 00:59:40'),
(67, 'MAIL_MAILER', 'smtp', '2022-12-04 17:05:33', '2024-10-27 00:59:40'),
(68, 'update', 'Update', '2022-12-04 17:05:33', '2024-03-07 06:41:34'),
(69, 'sign_up_left_text', NULL, '2022-12-04 17:05:33', '2024-06-07 01:01:03'),
(70, 'sign_up_left_image', 'uploads_demo/home/hero-img.png', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(71, 'forgot_title', NULL, '2022-12-04 17:05:33', '2024-06-07 01:01:03'),
(72, 'forgot_subtitle', NULL, '2022-12-04 17:05:33', '2024-06-07 01:01:03'),
(73, 'forgot_btn_name', NULL, '2022-12-04 17:05:33', '2024-06-07 01:01:03'),
(74, 'facebook_url', NULL, '2022-12-04 17:05:33', '2024-06-07 01:01:03'),
(75, 'twitter_url', NULL, '2022-12-04 17:05:33', '2024-06-07 01:01:03'),
(76, 'linkedin_url', NULL, '2022-12-04 17:05:33', '2024-06-07 01:01:03'),
(77, 'pinterest_url', NULL, '2022-12-04 17:05:33', '2024-06-07 01:01:03'),
(78, 'app_instructor_footer_title', 'Join One Of The World’s Largest Learning Marketplaces.', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(79, 'app_instructor_footer_subtitle', 'Donald valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my tree', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(80, 'get_in_touch_title', NULL, '2022-12-04 17:05:33', '2024-06-07 08:01:53'),
(81, 'send_us_msg_title', NULL, '2022-12-04 17:05:33', '2024-06-07 08:01:53'),
(82, 'contact_us_location', NULL, '2022-12-04 17:05:33', '2024-06-07 08:01:53'),
(83, 'contact_us_email_one', NULL, '2022-12-04 17:05:33', '2024-06-07 08:01:53'),
(84, 'contact_us_email_two', NULL, '2022-12-04 17:05:33', '2024-06-07 08:01:53'),
(85, 'contact_us_phone_one', NULL, '2022-12-04 17:05:33', '2024-06-07 08:01:53'),
(86, 'contact_us_phone_two', NULL, '2022-12-04 17:05:33', '2024-06-07 08:01:53'),
(87, 'contact_us_map_link', NULL, '2022-12-04 17:05:33', '2024-06-07 08:01:53'),
(88, 'contact_us_description', NULL, '2022-12-04 17:05:33', '2024-06-07 08:01:53'),
(89, 'faq_title', 'Frequently Ask Questions.', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(90, 'faq_subtitle', 'CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(91, 'faq_image_title', 'Still no luck?', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(92, 'faq_image', 'uploads_demo/setting\\faq-img.jpg', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(93, 'faq_tab_first_title', 'Item Support', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(94, 'faq_tab_first_subtitle', 'Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a greater artist than now. When, while the lovely valley with vapour around me, and the meridian', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(95, 'faq_tab_sec_title', 'Licensing', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(96, 'faq_tab_sec_subtitle', 'Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a greater artist than now. When, while the lovely valley with vapour around me, and the meridian', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(97, 'faq_tab_third_title', 'Your Account', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(98, 'faq_tab_third_subtitle', 'Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a greater artist than now. When, while the lovely valley with vapour around me, and the meridian', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(99, 'faq_tab_four_title', 'Tax & Complications', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(100, 'faq_tab_four_subtitle', 'Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a greater artist than now. When, while the lovely valley with vapour around me, and the meridian', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(101, 'home_special_feature_first_logo', 'uploads_demo/setting\\feature-icon1.png', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(102, 'home_special_feature_first_title', 'Learn From Experts', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(103, 'home_special_feature_first_subtitle', 'Mornings of spring which I enjoy with my whole heart about the gen', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(104, 'home_special_feature_second_logo', 'uploads_demo/setting/feature-icon2.png', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(105, 'home_special_feature_second_title', 'Earn a Certificate', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(106, 'home_special_feature_second_subtitle', 'Mornings of spring which I enjoy with my whole heart about the gen', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(107, 'home_special_feature_third_logo', 'uploads_demo/setting\\feature-icon3.png', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(108, 'home_special_feature_third_title', '5000+ Courses', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(109, 'home_special_feature_third_subtitle', 'Serenity has taken possession of my entire soul, like these sweet spring', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(110, 'course_logo', 'uploads_demo/setting/courses-heading-img.png', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(111, 'course_title', 'A Broad Selection Of Courses', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(112, 'course_subtitle', 'CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(113, 'bundle_course_logo', 'uploads_demo/setting/bundle-courses-heading-img.png', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(114, 'bundle_course_title', 'Latest Bundle Courses', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(115, 'bundle_course_subtitle', 'CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(116, 'top_category_logo', 'uploads_demo/setting/categories-heading-img.png', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(117, 'top_category_title', 'Our Top Categories', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(118, 'top_category_subtitle', 'CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(119, 'top_instructor_logo', 'uploads_demo/setting\\top-instructor-heading-img.png', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(120, 'top_instructor_title', 'Top Rated Courses From Our Top Instructor.', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(121, 'top_instructor_subtitle', 'CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(122, 'become_instructor_video', 'uploads_demo/setting/test.mp4', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(123, 'become_instructor_video_preview_image', 'uploads_demo/setting/video-poster.jpg', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(124, 'become_instructor_video_logo', 'uploads_demo/setting/top-instructor-heading-img.png', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(125, 'become_instructor_video_title', 'We Only Accept Professional Courses Form Professional Instructors', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(126, 'become_instructor_video_subtitle', 'Noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(127, 'customer_say_logo', 'uploads_demo/setting/customers-say-heading-img.png', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(128, 'customer_say_title', 'What Our Valuable Customers Say.', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(129, 'customer_say_first_name', 'DANIEL JHON', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(130, 'customer_say_first_position', 'UI/UX DESIGNER', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(131, 'customer_say_first_comment_title', 'Great instructor, great course', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(132, 'customer_say_first_comment_description', 'Wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(133, 'customer_say_first_comment_rating_star', '5', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(134, 'customer_say_second_name', 'NORTH', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(135, 'customer_say_second_position', 'DEVELOPER', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(136, 'customer_say_second_comment_title', 'Awesome course & good response', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(137, 'customer_say_second_comment_description', 'Noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(138, 'customer_say_second_comment_rating_star', '4.5', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(139, 'customer_say_third_name', 'HIBRUPATH', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(140, 'customer_say_third_position', 'MARKETER', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(141, 'customer_say_third_comment_title', 'Fantastic course', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(142, 'customer_say_third_comment_description', 'Noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(143, 'customer_say_third_comment_rating_star', '5', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(144, 'achievement_first_logo', 'uploads_demo/setting\\1.png', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(145, 'achievement_first_title', 'Successfully trained', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(146, 'achievement_first_subtitle', '2000+ students', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(147, 'achievement_second_logo', 'uploads_demo/setting\\2.png', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(148, 'achievement_second_title', 'Video courses', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(149, 'achievement_second_subtitle', '2000+ students', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(150, 'achievement_third_logo', 'uploads_demo/setting\\3.png', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(151, 'achievement_third_title', 'Expert instructor', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(152, 'achievement_third_subtitle', '2000+ students', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(153, 'achievement_four_logo', 'uploads_demo/setting\\4.png', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(154, 'achievement_four_title', 'Proudly Received', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(155, 'achievement_four_title', 'Proudly Received', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(156, 'achievement_four_subtitle', '2000+ students', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(157, 'support_faq_title', 'tresting', '2022-12-04 17:05:33', '2024-06-07 07:19:14'),
(158, 'support_faq_subtitle', 'tresting', '2022-12-04 17:05:33', '2024-06-07 07:19:14'),
(159, 'ticket_title', 'tresting', '2022-12-04 17:05:33', '2024-06-07 07:19:14'),
(160, 'ticket_subtitle', 'tresting', '2022-12-04 17:05:33', '2024-06-07 07:19:14'),
(161, 'cookie_button_name', 'Allow cookies', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(162, 'cookie_msg', 'Your experience on this site will be improved by allowing cookies', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(163, 'COOKIE_CONSENT_STATUS', '1', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(164, 'platform_charge', '3', '2022-12-04 17:05:33', '2024-10-27 00:11:55'),
(165, 'sell_commission', '10', '2022-12-04 17:05:33', '2024-10-27 00:11:55'),
(166, 'app_version', '21', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(167, 'current_version', '6.1', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(262, 'currency_id', '11', '2024-03-07 01:46:36', '2024-10-27 00:11:55'),
(263, 'FORCE_HTTPS', 'false', '2024-03-07 01:46:36', '2024-03-07 01:46:36'),
(264, 'language_id', NULL, '2024-03-07 01:46:36', '2024-06-06 23:51:53'),
(265, 'TIMEZONE', 'America/La_Paz', '2024-03-07 01:46:36', '2024-10-27 00:11:55'),
(266, 'pwa_enable', '0', '2024-03-07 01:46:36', '2024-03-07 01:46:36'),
(267, 'instagram_url', NULL, '2024-03-07 01:46:36', '2024-06-07 01:01:03'),
(268, 'tiktok_url', NULL, '2024-03-07 01:46:36', '2024-06-07 01:01:03'),
(269, 'app_black_logo', 'uploads/setting/1709795797-IxH4v3cwdf.png', '2024-03-07 01:46:37', '2024-03-07 01:46:37'),
(270, 'app_pwa_icon', NULL, '2024-03-07 01:46:37', '2024-03-07 01:46:37'),
(271, 'theme', '1', '2024-03-07 06:41:34', '2024-03-07 06:43:45'),
(272, 'mercado_currency', 'AFA', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(273, 'mercado_conversion_rate', '1', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(274, 'mercado_status', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(275, 'MERCADO_PAGO_CLIENT_ID', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(276, 'MERCADO_PAGO_CLIENT_SECRET', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(277, 'flutterwave_currency', 'AFA', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(278, 'flutterwave_conversion_rate', '1', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(279, 'flutterwave_status', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(280, 'FLW_PUBLIC_KEY', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(281, 'FLW_SECRET_KEY', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(282, 'FLW_SECRET_HASH', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(283, 'coinbase_currency', 'AFA', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(284, 'coinbase_conversion_rate', '1', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(285, 'coinbase_status', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(286, 'coinbase_mode', 'sandbox', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(287, 'coinbase_key', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(288, 'zitopay_currency', 'AFA', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(289, 'zitopay_conversion_rate', '1', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(290, 'zitopay_status', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(291, 'zitopay_username', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(292, 'iyzipay_currency', 'AFA', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(293, 'iyzipay_conversion_rate', '1', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(294, 'iyzipay_status', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(295, 'iyzipay_mode', 'sandbox', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(296, 'iyzipay_key', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(297, 'iyzipay_secret', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(298, 'bitpay_currency', 'AFA', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(299, 'bitpay_conversion_rate', '1', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(300, 'bitpay_status', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(301, 'bitpay_mode', 'testnet', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(302, 'bitpay_key', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(303, 'braintree_currency', 'AFA', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(304, 'braintree_conversion_rate', '1', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(305, 'braintree_status', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(306, 'braintree_test_mode', '0', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(307, 'braintree_merchant_id', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(308, 'braintree_public_key', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(309, 'braintree_private_key', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(310, 'app_footer_payment_image', 'uploads/setting/1730007715-eoXZCxfDxI.svg', '2024-10-27 00:11:55', '2024-10-27 00:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dhaka', NULL, NULL),
(2, 1, 'Khulna', NULL, NULL),
(3, 1, 'Comilla', NULL, NULL),
(4, 2, 'California', NULL, NULL),
(5, 2, 'Texas', NULL, NULL),
(6, 2, 'Florida', NULL, NULL),
(7, 3, 'Argyll', NULL, NULL),
(8, 3, 'Belfast', NULL, NULL),
(9, 3, 'Cambridge', NULL, NULL),
(11, 1, 'Khulna', '2024-06-07 05:59:39', '2024-06-07 06:02:22');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `parent_category_id` int(11) DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(191) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `og_image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `uuid`, `parent_category_id`, `category_id`, `name`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `og_image`, `created_at`, `updated_at`) VALUES
(44, 'ecf4cc39-3639-49c4-99bd-9994668c41f9', 9, 3, 'freno mt200', 'freno-mt200', 'freno mt200', 'mt200', 'mt200', 'uploads/meta/1719596399-6qvFp0pEZU.jpg', '2024-06-28 17:39:59', '2024-06-28 17:50:38'),
(53, '7de43eb4-f859-416b-b333-cfbe2bbde783', NULL, 52, 'Child preuba', 'Child-preuba', 'Child preuba', 'Child preuba', 'Child preuba', 'uploads/meta/1723257754-lPN8u3HP0x.png', '2024-08-10 02:42:34', '2024-08-10 02:42:34'),
(58, 'fd2d0d76-390e-437b-a41c-2f0bf99524e5', 15, 0, 'Llanta burro', 'Llanta-burro', 'Llanta burro', 'Llanta burro', 'Llanta burro', 'uploads/meta/1723590042-gFjczrYmBf.jpeg', '2024-08-13 23:00:42', '2024-08-13 23:00:42'),
(59, '1108950a-84c7-437a-b2f9-e6732170a88d', 15, 58, 'rombo', 'rombo', 'rombo', 'rombo', 'rombo', NULL, '2024-08-13 23:01:13', '2024-08-13 23:01:13'),
(62, '9ad33cba-9a94-41be-9a22-71718f0613c1', 19, 0, '29deagosto', '29deagosto', '29deagosto', '29deagosto', '29deagosto', 'uploads/meta/1723763227-mrdb40BySs.jpeg', '2024-08-15 23:07:07', '2024-08-15 23:07:07'),
(63, '0ffc23dc-ec92-4649-9786-19b9e18dbc03', 19, 62, '1995', '1995', '1995', '1995', '1995', 'uploads/meta/1723763268-15p211Zh18.jpeg', '2024-08-15 23:07:48', '2024-08-15 23:07:48'),
(64, '415b25ff-d050-4aa6-891d-7d5654845181', 19, 62, '1222', '1222', NULL, NULL, NULL, NULL, '2024-08-15 23:10:39', '2024-08-15 23:10:39'),
(67, 'c5effd9d-9e39-40c1-9ea6-7346c19a9efc', 19, 0, 'subcat', 'subcat', 'subcat', 'subcat', 'subcat', 'uploads/meta/1723780777-1WOw8Ga9bQ.png', '2024-08-16 03:59:37', '2024-08-16 03:59:37'),
(68, '3d2046ed-f4f6-49fb-baf4-0a480b9c639f', 19, 67, 'childcat', 'childcat', 'childcat', 'childcat', 'childcat', NULL, '2024-08-16 04:00:09', '2024-08-16 04:00:09'),
(69, '9290b665-3717-4e39-8794-9bda8ce23b75', 25, 0, 'Arsh', 'Arsh', 'arsh', 'arsh', 'arsh', NULL, '2024-08-16 04:24:59', '2024-09-04 13:20:04'),
(70, '71a5cbfe-c985-43e7-a184-bbfd80858fa5', 19, 0, 'pruebasub3', 'pruebasub3', 'pruebasub3', 'pruebasub3', 'pruebasub3', 'uploads/meta/1723785002-G3aBx6d0FN.png', '2024-08-16 05:10:02', '2024-08-16 05:10:02'),
(71, 'e9c564f2-de7e-4c1d-abcc-d85aff8b4e11', 19, 0, 'Subcat2', 'Subcat2', 'Subcat2', 'Subcat2', 'Subcat2', 'uploads/meta/1723786291-4FqPI5VBKe.png', '2024-08-16 05:31:31', '2024-08-16 05:31:31'),
(72, '39bbb804-8f29-4b8c-8b92-b947dbd8b16e', 19, 71, 'childcat2', 'childcat2', 'childcat2', 'childcat2', 'childcat2', NULL, '2024-08-16 05:32:00', '2024-08-16 05:32:00'),
(73, '29df4a76-42c1-4eaa-b461-85e94ca83919', 19, 0, 'subprueba', 'subprueba', 'subprueba', 'subprueba', 'subprueba', 'uploads/meta/1723810621-HffDFZKf5n.jpg', '2024-08-16 12:17:01', '2024-08-16 12:17:01'),
(74, '69f68086-e711-4618-914b-c99f0aed4592', 19, 73, 'childprueba', 'childprueba', 'childprueba', 'childprueba', 'childprueba', NULL, '2024-08-16 12:17:39', '2024-08-16 12:17:39'),
(75, '00c505c1-87d2-42ad-bbdb-b61719e46c0e', 20, 0, 'Silhouette', 'Silhouette', 'Silhouette', 'Silhouette', 'Silhouette', 'uploads/meta/1723813794-akLzOUDO9e.jpeg', '2024-08-16 13:09:54', '2024-08-16 13:09:54'),
(76, '4763fe5c-db81-49e5-98e9-029ecb4877c7', 20, 75, 'Cameo4', 'Cameo4', 'Cameo4', 'Cameo4', 'Cameo4', NULL, '2024-08-16 13:10:14', '2024-08-16 13:10:14'),
(77, 'dd480a4d-4c22-42a2-8a4a-50e9e7a41251', 21, 0, 'TIENDA 1', 'TIENDA-1', 'TIENDA 1', 'TIENDA 1', 'TIENDA 1', 'uploads/meta/1724342941-s6iAdUfQlA.jpeg', '2024-08-22 16:09:01', '2024-08-22 16:09:01'),
(78, '68feb447-da8e-4313-8241-e9c047757690', 21, 77, 'Neco', 'Neco', 'Neco', 'Neco', 'Neco', NULL, '2024-08-22 16:09:29', '2024-08-22 16:09:29'),
(79, '880fa0f9-80ca-4a2c-acb1-800025cae89b', 22, 0, 'SubCateSep', 'SubCateSep', 'SubCateSep', 'SubCateSep', 'SubCateSep', 'uploads/meta/1725370686-xYsYkp1k8r.jpg', '2024-09-03 13:38:06', '2024-09-03 13:38:06'),
(80, '10e76f81-03c1-4500-9e80-5f29fe090de1', 22, 79, 'Enero', 'Enero', 'Enero', 'Enero', 'Enero', NULL, '2024-09-03 13:39:13', '2024-09-03 13:39:13'),
(81, '80672d94-30e6-48cf-80bf-f9a41d946055', 22, 79, 'Febrero', 'Febrero', 'Febrero', 'Febrero', 'Febrero', NULL, '2024-09-03 13:39:39', '2024-09-03 13:39:39'),
(83, 'd1f657df-8a99-474c-8864-a636655d3102', 9, 69, 'testing cheild', 'testing-cheild', 'testing cheild', 'testing cheild', 'testing cheild', NULL, '2024-09-04 04:42:32', '2024-09-04 04:42:32'),
(86, '51abc97e-cd8e-4a09-bfa9-a39329e2374b', 9, 0, 'subcategory testasd', 'subcategory-testasd', 'subcategory test', 'subcategory test', 'subcategory test', NULL, '2024-09-04 05:18:35', '2024-09-04 05:19:04'),
(87, '9766a727-28de-4ec9-bddf-bbb93367d9be', 9, 86, 'childcategory test final', 'childcategory-test-final', 'childcategory test', 'childcategory test', 'childcategory test', NULL, '2024-09-04 05:24:16', '2024-09-04 05:24:51'),
(88, '46534f41-15b2-4600-9071-d83190c40b6a', 24, 0, 'sdfadsad', 'sdfadsad', 'sdfadsad', 'sdfadsad', 'sdfadsad', NULL, '2024-09-04 13:13:57', '2024-09-04 13:13:57'),
(89, 'f410f72d-b29a-4dcf-a1de-35e67782ae5a', 25, 69, 'asdadsadadsadadsad', 'asdadsadadsadadsad', NULL, NULL, NULL, NULL, '2024-09-04 13:20:56', '2024-09-04 13:20:56'),
(90, '878dbb64-d688-4f81-bfc3-bdd5bf4d7ab3', 26, 0, 'Días', 'Días', 'Días', 'Días', 'Días', 'uploads/meta/1725465943-WVnyJQYVce.jpg', '2024-09-04 16:05:43', '2024-09-04 16:05:43'),
(91, '0c63434d-700b-4f1b-804c-9319cbb368cd', 26, 90, 'Lunes', 'Lunes', 'Lunes', 'Lunes', 'Lunes', NULL, '2024-09-04 16:06:04', '2024-09-04 16:06:04'),
(92, 'f2da7143-9160-4f9e-ace0-d60a8d5a166a', 26, 90, 'Martes', 'Martes', 'Martes', 'Martes', 'Martes', NULL, '2024-09-04 16:06:25', '2024-09-04 16:06:25'),
(93, 'd8328afd-5f0e-451d-8fac-1f8657d43f7b', 26, 90, 'Miercoles', 'Miercoles', 'Miercoles', 'Miercoles', 'Miercoles', NULL, '2024-09-04 16:06:45', '2024-09-04 16:06:45'),
(164, '0e738fca-a05a-45d2-97c7-9a43d6bcaf17', 7, 0, 'Arshfdfrt', 'Arshfdfrt', NULL, NULL, NULL, NULL, '2024-10-30 08:00:02', '2024-10-30 08:03:08'),
(165, 'cdd6cdf7-c206-411a-9d4f-f8e8b7aed740', 14, 0, 'fgsdfsa', 'fgsdfsa', NULL, NULL, NULL, NULL, '2024-10-30 08:01:05', '2024-10-30 08:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `support_ticket_questions`
--

CREATE TABLE `support_ticket_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `answer` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_ticket_questions`
--

INSERT INTO `support_ticket_questions` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, '¿Cómo me registro en la plataforma?', 'Para registrarte, simplemente haz clic en el botón \"Registrarse\" en la parte superior de la página. Completa los campos con tu información personal y sigue los pasos para activar tu cuenta.', '2022-12-04 17:05:33', '2024-11-07 02:08:40'),
(2, '¿Qué beneficios obtengo al ser miembro?', 'Como miembro, tendrás acceso ilimitado a todos nuestros cursos de desarrollo personal, coaching, entrenamientos y seminarios. Además, podrás generar ingresos extra a través de nuestro sistema de afiliados multinivel y disfrutar de descuentos en diversas empresas asociadas.', '2022-12-04 17:05:33', '2024-11-07 02:08:40'),
(3, '¿Cómo puedo acceder a los cursos y coaching?', 'Una vez que te hayas registrado y activado tu membresía, podrás acceder a todos los cursos y sesiones de coaching directamente desde tu panel de usuario. Los videos estarán disponibles para ver en cualquier momento.', '2022-12-04 17:05:33', '2024-11-07 02:08:40'),
(4, '¿Qué es el sistema de afiliados multinivel?', 'Nuestro sistema de afiliados multinivel te permite ganar comisiones recomendando nuestra plataforma a otras personas. A medida que tus referidos se registran y compran membresías, podrás recibir ganancias en varios niveles de profundidad.', '2022-12-04 17:05:33', '2024-11-07 02:08:40'),
(5, '¿Cómo puedo generar ingresos extra?', 'Puedes generar ingresos extra recomendando la plataforma a otros a través del sistema de marketing multinivel. Además, tendrás acceso a herramientas exclusivas que te ayudarán a promover nuestro contenido y crecer tu red de contactos.', '2022-12-04 17:05:33', '2024-11-07 02:08:40');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `uuid`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'd45fd1e7-a1e0-4d3f-954d-bd56dc95e48f', 'Design', 'design', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(2, '90bfec22-452f-42f4-b9aa-03c053aecc24', 'Development', 'development', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(3, 'b375ca10-66e9-43c1-8593-a6bdcc8ab3d9', 'IT', 'it', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(4, 'eecd9f5d-f023-4fe2-afcb-23b9ccc558b9', 'Programming', 'programming', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(5, '8f9fbd32-7878-443a-a531-faf1c4428b31', 'Travel', 'travel', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(6, '235b8c44-a340-4929-a48c-6238314d6af4', 'Music', 'music', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(7, '36ec1ef2-5bca-4d06-9446-a5d8ab6abdab', 'Digital marketing', 'digital-marketing', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(8, 'd8dc6caa-b578-49f6-aaca-e25783afe34b', 'Science', 'science', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(9, '346c01be-ab53-406f-acc4-73c5fddc0b6f', 'Math', 'math', '2022-12-04 17:05:33', '2022-12-04 17:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `percentage` double(12,3) NOT NULL,
  `is_publish` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `title`, `percentage`, `is_publish`, `created_at`, `updated_at`) VALUES
(38, 'VAT', 59.000, 1, '2021-09-14 05:49:52', '2024-06-25 00:48:28'),
(41, 'GST', 15.000, NULL, '2024-06-25 01:28:31', '2024-06-25 01:28:31'),
(42, 'GST', 35.000, NULL, '2024-06-25 01:30:09', '2024-06-25 01:30:09');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `ticket_number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1=Open, 2=Closed',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `related_service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `priority_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `uuid`, `ticket_number`, `name`, `email`, `subject`, `status`, `user_id`, `department_id`, `related_service_id`, `priority_id`, `created_at`, `updated_at`) VALUES
(12, '430f9845-4c6f-42c5-92cb-e4725b543f76', 'TCK-672F59AF68576', 'aasif', 'aasifdev5@gmail.com', 'i need to know abot gen', 1, 5, 2, 4, 1, '2024-11-09 07:16:39', '2024-11-09 07:16:39'),
(13, 'ed8262de-f76b-4ca9-b999-5f7327c23fad', 'TCK-672F5A7FB7BBA', 'aasif', 'aasifdev5@gmail.com', 'Welcome to Sky Forecasting', 1, 5, 2, 4, 1, '2024-11-09 07:20:07', '2024-11-09 07:20:07');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_departments`
--

CREATE TABLE `ticket_departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_departments`
--

INSERT INTO `ticket_departments` (`id`, `uuid`, `name`, `created_at`, `updated_at`) VALUES
(2, '0697c6e0-dfca-45df-aead-3500fe1cbfe3', 'it', '2024-11-07 02:10:04', '2024-11-07 02:10:04');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_messages`
--

CREATE TABLE `ticket_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sender_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reply_admin_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_messages`
--

INSERT INTO `ticket_messages` (`id`, `ticket_id`, `sender_user_id`, `reply_admin_user_id`, `message`, `file`, `created_at`, `updated_at`) VALUES
(5, 6, NULL, 1, 'test', NULL, '2024-11-09 06:34:43', '2024-11-09 06:34:43'),
(6, 12, NULL, 1, 'gen is course lareaning platforma nd mlm', NULL, '2024-11-11 00:55:10', '2024-11-11 00:55:10'),
(7, 12, NULL, 5, 'how can i earn from it', NULL, '2024-11-11 00:56:38', '2024-11-11 00:56:38'),
(8, 12, NULL, 1, 'by refering course', NULL, '2024-11-11 01:27:40', '2024-11-11 01:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_priorities`
--

CREATE TABLE `ticket_priorities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_priorities`
--

INSERT INTO `ticket_priorities` (`id`, `uuid`, `name`, `created_at`, `updated_at`) VALUES
(1, '69cbc017-10dd-4d8e-823b-ce097a2dc092', 'Important', '2024-06-07 07:38:48', '2024-06-07 07:38:48'),
(2, '3531867a-fcda-4185-bf5d-8fda554cc86e', 'Important', '2024-06-07 07:39:04', '2024-06-07 07:39:04'),
(3, 'b1ccffbc-01f7-4fbd-bd81-bedb258e3b3f', 'very important', '2024-11-07 02:09:48', '2024-11-07 02:09:48');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_related_services`
--

CREATE TABLE `ticket_related_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_related_services`
--

INSERT INTO `ticket_related_services` (`id`, `uuid`, `name`, `created_at`, `updated_at`) VALUES
(4, '80e3aa9f-69d7-48d3-a39e-8ca644321269', 'sad', '2024-11-07 02:09:27', '2024-11-07 02:09:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `account_type` varchar(255) DEFAULT NULL,
  `balance` varchar(255) DEFAULT NULL,
  `is_subscribed` tinyint(1) DEFAULT NULL,
  `refer` varchar(255) DEFAULT NULL,
  `is_online` tinyint(4) DEFAULT 0,
  `last_seen` timestamp NULL DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `role` int(11) DEFAULT 2,
  `permissions` varchar(255) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `custom_password` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(191) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `status` int(11) DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `is_system` tinyint(4) DEFAULT 0,
  `id_number` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `language` varchar(191) NOT NULL DEFAULT '''en''',
  `is_super_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `profile_photo`, `account_type`, `balance`, `is_subscribed`, `refer`, `is_online`, `last_seen`, `birth_date`, `role`, `permissions`, `name`, `email`, `email_verified_at`, `password`, `custom_password`, `mobile_number`, `about`, `city`, `facebook`, `instagram`, `linkedin`, `twitter`, `address`, `is_active`, `status`, `remember_token`, `ip_address`, `is_system`, `id_number`, `country`, `created_by`, `deleted_at`, `language`, `is_super_admin`, `created_at`, `updated_at`) VALUES
(1, NULL, '149071.png', 'admin', NULL, 0, NULL, 1, '2024-11-20 02:07:49', NULL, 1, NULL, 'SUPER ADMINISTRADOR', 'gen@negociosgen.com', '2023-03-23 07:45:02', '$2y$10$2Xg3cj6N2RMrVNhMvzL6hu5vkvjZ.zOMsFrTICTE40rT1paV6CtP6', '987654321', '8878326802', NULL, 'bolivia', NULL, NULL, NULL, NULL, 'sdfafa', 1, 1, NULL, '127.0.0.1', 1, '1', '1', NULL, NULL, 'es', 1, '2023-03-23 07:45:02', '2024-11-20 02:07:49'),
(3, NULL, NULL, 'affiliate', NULL, 1, NULL, 0, '2024-11-19 23:33:38', '2024-10-16', 2, NULL, 'Aasif Ahmeds', 'arstech2a@gmail.com', NULL, '$2y$10$yfNz3sJ2P3d31JhNkPve8.L.rVsISl81scG5DGvgB8pcfQUZd9l.e', NULL, '591591591', 'df', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '127.0.0.1', 0, '1', NULL, NULL, NULL, '\'en\'', 0, '2024-10-29 22:26:33', '2024-11-20 03:33:38'),
(5, NULL, NULL, 'affiliate', '1200', 1, NULL, 0, '2024-11-19 23:30:42', '2024-10-03', 2, NULL, 'muskan bano', 'aasifdev5@gmail.com', NULL, '$2y$10$5WrZoZLUyhoaTA31IeC6O.0TcQbGbll6WxK6oA/foGEt8vxGjvV/a', NULL, '591', NULL, '14', NULL, NULL, NULL, NULL, '722 azad nagar indore', 1, 1, NULL, NULL, 0, '45', '1', NULL, NULL, '\'en\'', 0, '2024-10-31 01:23:24', '2024-11-20 03:30:42'),
(6, NULL, NULL, 'affiliate', NULL, NULL, NULL, 0, NULL, '2024-11-20', 2, NULL, 'Aasif Ahmed', 'hrnatrajdfsinfotech@gmail.com', NULL, '$2y$10$1d.I9JhZ3wp1WNix7lxFA.L5J5vIXgrttg9e.rDX4xHMgy2VfVxgG', NULL, '5919589642080', NULL, '12', NULL, NULL, NULL, NULL, '722 azad nagar indore', 1, 1, NULL, '127.0.0.1', 0, '', '1', NULL, NULL, '\'en\'', 0, '2024-11-20 00:36:57', '2024-11-20 00:36:57'),
(7, NULL, NULL, 'affiliate', NULL, NULL, NULL, 0, NULL, '2024-11-19', 2, NULL, 'Aasif Ahmed', 'hrnatrajinfmbvnotech@gmail.com', NULL, '$2y$10$dUOlOwtjE3eTrkg6FuelNuX8l2NH/WaPx9lqk/07G/sBMsfR4DuES', NULL, '59154285285', NULL, '12', NULL, NULL, NULL, NULL, '722 azad nagar indore', 1, 1, NULL, '127.0.0.1', 0, '', '1', NULL, NULL, '\'en\'', 0, '2024-11-20 00:46:16', '2024-11-20 00:46:16'),
(8, NULL, NULL, 'affiliate', NULL, NULL, NULL, 0, NULL, '2024-11-20', 2, NULL, 'Aasif Ahmed', 'hrnatrajinffdggfdgotech@gmail.com', NULL, '$2y$10$6I.z1YM8jLYN39OKqJkWOOxdEWGZfPp7M32liMruXyX3u/GdzRw8a', NULL, '5919589642080', NULL, '12', NULL, NULL, NULL, NULL, '722 azad nagar indore', 1, 1, NULL, '127.0.0.1', 0, '', '1', NULL, NULL, '\'en\'', 0, '2024-11-20 00:50:55', '2024-11-20 00:50:55'),
(9, NULL, NULL, 'affiliate', NULL, NULL, NULL, 0, NULL, '2024-11-20', 2, NULL, 'Aasif Ahmed', 'hrnatrajinffdggbvfdgotech@gmail.com', NULL, '$2y$10$OahB7QIcZU15Nb6fOX3rwu2Dgj.sHJHiuuF88s9WV.WYwI/f8RXn2', NULL, '5919589642080', NULL, '12', NULL, NULL, NULL, NULL, '722 azad nagar indore', 1, 1, NULL, '127.0.0.1', 0, '', '1', NULL, NULL, '\'en\'', 0, '2024-11-20 00:53:52', '2024-11-20 00:53:52'),
(10, NULL, NULL, 'affiliate', NULL, 1, '5', 0, NULL, '2024-11-20', 2, NULL, 'uzair Ahmed', 'uzair@gmail.com', NULL, '$2y$10$gViB4B9TMHM4EVRiYfTT1uPNZ0V8cnl2CnXpPjJZiS5Mbb.kWr4hS', NULL, '5919589642080', NULL, '14', NULL, NULL, NULL, NULL, '722 azad nagar indore', 1, 1, NULL, '127.0.0.1', 0, '', '1', NULL, NULL, '\'en\'', 0, '2024-11-20 01:56:58', '2024-11-20 01:56:58'),
(11, NULL, NULL, 'affiliate', NULL, 1, '5', 0, '2024-11-19 22:43:08', '2024-11-20', 2, NULL, 'brijlal pawar', 'brijlalpawar@gmail.com', NULL, '$2y$10$Bs8qb4ijGgUjFpXiTdNU2uxKN59NL7UjQ6S8fxVV9ZbeRhu6tvQbq', NULL, '5914353535353', NULL, '11', NULL, NULL, NULL, NULL, '722 azad nagar indore', 1, 1, NULL, '127.0.0.1', 0, '', '1', NULL, NULL, '\'en\'', 0, '2024-11-20 02:01:41', '2024-11-20 02:43:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balances`
--
ALTER TABLE `balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_uuid_unique` (`uuid`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_uuid_unique` (`uuid`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_uuid_unique` (`uuid`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_uuid_unique` (`uuid`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`uuid`),
  ADD UNIQUE KEY `events_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faq_questions`
--
ALTER TABLE `faq_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_categories`
--
ALTER TABLE `forum_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `forum_categories_uuid_unique` (`uuid`);

--
-- Indexes for table `forum_posts`
--
ALTER TABLE `forum_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `forum_posts_uuid_unique` (`uuid`);

--
-- Indexes for table `forum_post_comments`
--
ALTER TABLE `forum_post_comments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `forum_post_comments_uuid_unique` (`uuid`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_language_unique` (`language`),
  ADD UNIQUE KEY `languages_iso_code_unique` (`iso_code`);

--
-- Indexes for table `mail_templates`
--
ALTER TABLE `mail_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_options`
--
ALTER TABLE `media_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metas`
--
ALTER TABLE `metas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `metas_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `notifications_uuid_unique` (`uuid`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subcategories_uuid_unique` (`uuid`);

--
-- Indexes for table `support_ticket_questions`
--
ALTER TABLE `support_ticket_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_uuid_unique` (`uuid`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tickets_uuid_unique` (`uuid`);

--
-- Indexes for table `ticket_departments`
--
ALTER TABLE `ticket_departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_departments_uuid_unique` (`uuid`);

--
-- Indexes for table `ticket_messages`
--
ALTER TABLE `ticket_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_priorities`
--
ALTER TABLE `ticket_priorities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_priorities_uuid_unique` (`uuid`);

--
-- Indexes for table `ticket_related_services`
--
ALTER TABLE `ticket_related_services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_related_services_uuid_unique` (`uuid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_name_index` (`name`),
  ADD KEY `users_email_index` (`email`),
  ADD KEY `users_phone_index` (`mobile_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balances`
--
ALTER TABLE `balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq_questions`
--
ALTER TABLE `faq_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `forum_categories`
--
ALTER TABLE `forum_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `forum_posts`
--
ALTER TABLE `forum_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `forum_post_comments`
--
ALTER TABLE `forum_post_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mail_templates`
--
ALTER TABLE `mail_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `media_options`
--
ALTER TABLE `media_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=783;

--
-- AUTO_INCREMENT for table `metas`
--
ALTER TABLE `metas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `support_ticket_questions`
--
ALTER TABLE `support_ticket_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ticket_departments`
--
ALTER TABLE `ticket_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ticket_messages`
--
ALTER TABLE `ticket_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ticket_priorities`
--
ALTER TABLE `ticket_priorities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ticket_related_services`
--
ALTER TABLE `ticket_related_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
