-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2024 at 01:41 PM
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
(22, 18, 55.00, '2024-01-31 17:48:53', '2024-01-31 17:48:53'),
(24, 3, 11.00, '2024-03-15 03:29:02', '2024-03-22 03:29:32'),
(25, 18, 350.00, '2024-03-22 03:14:58', '2024-03-22 03:14:58'),
(26, 9, 52.00, '2024-03-22 18:58:09', '2024-03-22 19:00:47');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title1`, `title2`, `title3`, `button`, `link`, `image`, `created_at`, `updated_at`) VALUES
(7, '2024 latest collection test', 'Wheel', 'Body Parts', 's', 'https://bikebros.net/productbyCategory/7', 'uploads/banners/1723702217-mTcMknHgSd.png', '2024-08-15 06:10:17', '2024-08-15 14:09:16'),
(8, 'shanamo', 'accessories', 'lut', NULL, NULL, 'uploads/banners/1723703009-rFhKNqEMO7.png', '2024-08-15 06:19:06', '2024-08-15 06:23:29'),
(11, 'Colección 2024', 'Ruedas', 'en oferta', NULL, NULL, 'uploads/banners/1723727116-W9v4hOAxHb.png', '2024-08-15 13:05:16', '2024-08-15 13:05:16');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user_id` bigint(20) NOT NULL,
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

INSERT INTO `blogs` (`id`, `uuid`, `user_id`, `title`, `slug`, `short_description`, `details`, `image`, `status`, `blog_category_id`, `meta_title`, `meta_description`, `meta_keywords`, `og_image`, `created_at`, `updated_at`) VALUES
(11, 'cce6855f-3f66-4dfb-affc-a6570ca0d2b2', 1, 'Educación financiera para principiantes', 'Educación financiera para principiantes', '<p><span style=\"color: rgb(161, 161, 161); font-family: &quot;Space Grotesk&quot;, sans-serif; font-size: 16px; letter-spacing: normal; background-color: rgb(26, 26, 26);\">Todo lo que necesitas saber\" Resumen: Explicar la importancia de la educación finan', '<h1 class=\"cmo-hacer-un p-2\" style=\"color: rgb(255, 255, 255); font-family: &quot;Space Grotesk&quot;, sans-serif; letter-spacing: normal; background-color: rgb(0, 0, 0);\">Cómo hacer un presupuesto personal</h1><div class=\"ensear-a-los-container p-3 mb-3 rounded\" style=\"color: rgb(255, 255, 255); font-family: &quot;Space Grotesk&quot;, sans-serif; font-size: 16px; letter-spacing: normal; background-color: rgb(0, 0, 0); border-radius: var(--bs-border-radius) !important;\"><p class=\"ensear-a-los\">Enseñar a los lectores a organizar sus ingresos y gastos mensuales para que sepan exactamente a dónde va su dinero y cómo pueden ahorrar.</p><ul class=\"qu-es-un-presupuesto-y-por-qu\" style=\"padding-left: 2rem; margin-bottom: 1rem;\"><li>¿Qué es un presupuesto y por qué necesitas uno?</li><li>Herramientas y métodos para hacer un presupuesto (hojas de cálculo, apps)</li><li>Cómo categorizar tus gastos</li><li>Consejos para cumplir con tu presupuesto</li></ul></div><h1 class=\"cmo-hacer-un p-2\" style=\"color: rgb(255, 255, 255); font-family: &quot;Space Grotesk&quot;, sans-serif; letter-spacing: normal; background-color: rgb(0, 0, 0);\">Diferencia entre activos y pasivos</h1><div class=\"explicar-de-forma-container p-3 mb-3 rounded\" style=\"color: rgb(255, 255, 255); font-family: &quot;Space Grotesk&quot;, sans-serif; font-size: 16px; letter-spacing: normal; background-color: rgb(0, 0, 0); border-radius: var(--bs-border-radius) !important;\"><p class=\"ensear-a-los\">Explicar de forma sencilla qué son los activos y los pasivos, y por qué es fundamental entender esta diferencia para mejorar las finanzas.</p><ul class=\"qu-es-un-presupuesto-y-por-qu\" style=\"padding-left: 2rem; margin-bottom: 1rem;\"><li>¿Qué es un activo?</li><li>¿Qué es un pasivo?</li><li>Ejemplos de activos y pasivos comunes</li><li>Cómo enfocarte en adquirir más activos que pasivos</li></ul></div><h1 class=\"cmo-hacer-un p-2\" style=\"color: rgb(255, 255, 255); font-family: &quot;Space Grotesk&quot;, sans-serif; letter-spacing: normal; background-color: rgb(0, 0, 0);\">Consejos para ahorrar</h1><div class=\"maneras-efectivas-de-container p-3 mb-3 rounded\" style=\"color: rgb(255, 255, 255); font-family: &quot;Space Grotesk&quot;, sans-serif; font-size: 16px; letter-spacing: normal; background-color: rgb(0, 0, 0); border-radius: var(--bs-border-radius) !important;\"><p class=\"ensear-a-los\">10 maneras efectivas de ahorrar dinero cada mes. Resumen: Proporcionar estrategias prácticas y fáciles de aplicar para ayudar a los lectores a ahorrar más dinero cada mes.</p><ul class=\"qu-es-un-presupuesto-y-por-qu\" style=\"padding-left: 2rem; margin-bottom: 1rem;\"><li>Automatiza tus ahorros</li><li>Reduce gastos innecesarios</li><li>Establece metas de ahorro a corto y largo plazo</li><li>Aprovecha las ofertas y descuentos</li></ul></div>', 'uploads/blog/1730110708-w8eD870KbA.png', 1, 7, NULL, NULL, NULL, 'uploads/meta/1730110708-g388yjK1aD.png', '2024-03-29 01:52:10', '2024-10-28 04:48:28'),
(14, '6a627ed5-036d-4f00-b618-099706cb8243', 1, 'Título del Blog', 'Título del Blog', '<p><span style=\"color: rgb(237, 237, 237); font-family: &quot;Space Grotesk&quot;; font-size: 20px; letter-spacing: normal; background-color: rgba(26, 26, 26, 0.7);\">Estamos dedicados a apoyar a nuestros miembros en su camino hacia el éxito.</span></p>', '<p><span style=\"color: rgb(237, 237, 237); font-family: &quot;Space Grotesk&quot;; font-size: 20px; letter-spacing: normal; background-color: rgba(26, 26, 26, 0.7);\">Estamos dedicados a apoyar a nuestros miembros en su camino hacia el éxito.</span></p>', 'uploads/blog/1730111275-XqCCj9GVJ6.png', 0, 7, NULL, NULL, NULL, 'uploads/meta/1730111275-pvT7orRFsT.png', '2024-10-28 03:50:57', '2024-10-28 05:14:45');

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
(7, '90cd37ac-b804-4095-a471-3651ec40718a', 'Bicicleta', 'uploads/category/1720419591-OiolP0oVX7.svg', 'no', 'Bicicleta', 'Bicicleta', 'Bicicleta', 'Bicicleta', 'uploads/meta/1720419591-rFBebR3bND.svg', 1, '2022-12-04 17:05:33', '2024-07-08 06:19:51'),
(14, '86008391-2012-4caa-8a23-671590e5ce89', 'SHIMANO', 'uploads/category/1725847911-KbzFNUSZ4Y.png', 'yes', 'SHIMANO', 'SHIMANO', 'SHIMANO', 'SHIMANO', 'uploads/meta/1725847911-hr65AJbAZ7.png', 1, '2024-03-31 01:43:56', '2024-09-09 02:11:51'),
(30, 'a9cf4942-064e-4b84-8e60-f5d70badf406', 'Tienda General', 'uploads/category/1726331916-0uIksOuW3q.png', 'yes', 'tienda-general', 'Tienda General', 'Tienda General', 'Tienda General', 'uploads/meta/1726331916-f8R4j8V3Fy.png', 1, '2024-09-14 16:38:36', '2024-09-14 16:38:36');

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
(1, 'English', 'en', 'uploads/flag/1712285391-i4ttmDdVZy.jpg', 0, 1, NULL, '2024-04-03 08:07:55', '2024-04-04 21:19:51'),
(2, 'Spanish', 'esp', 'uploads/flag/1712151497-QzC6JiBxzU.png', 0, 1, NULL, '2024-04-03 08:08:17', '2024-04-03 08:08:17');

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
  `shortcodes` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail_templates`
--

INSERT INTO `mail_templates` (`id`, `alias`, `name`, `subject`, `body`, `shortcodes`, `status`) VALUES
(10, 'password_reset', 'Restablecer Contraseña', 'Notificación de Restablecimiento de Contraseña', '<p><strong>Reset Password Notification</strong></p><p><img src=\"../../../logo-removebg-preview.png\" alt=\"\"></p><h2><strong>Hello!</strong></h2><p>You are receiving this email because we received a password reset request for your account, please click on the link below to reset your password.</p><p><a href=\"{{link}}\">{{link}}</a></p><p>This password reset link will expire in <strong>15</strong> minutes. If you did not request a password reset, no further action is required.</p><p><strong>Best Regards</strong></p><p><strong>BIKEBROS Team</strong></p><p>&nbsp;<a href=\"https://www.instagram.com/skyforecasting/\"><img src=\"https://skyforecasting.net/help-center/media/images/ofBRYlvT1cu30VS_1700260141.png\"></a> <a href=\"https://twitter.com/skyforecasting\"><img src=\"https://skyforecasting.net/help-center/media/images/lSr0pUYldGRD46h_1700260215.png\"></a> <img src=\"https://skyforecasting.net/help-center/media/images/pk8iEq2c7f3mICO_1700260869.png\"> <img src=\"https://skyforecasting.net/help-center/media/images/krFVCzRVOornVih_1700260896.png\"></p><p>You received this email because you subscribed to our list.<br>&nbsp;<a href=\"https://skyforecasting.net/unsubscribepage/unsubscribe.html\">Unsubscribe</a> from future emails or update email preferences.<br>© 2024 BIKEBROS. All Rights Reserved.</p><p>&nbsp;</p><p><br>&nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p><p>&nbsp;</p>', '{\n\"link\":\"Password reset link\",\n\"expiry_time\":\"Link expiry time\",\n\"website_name\":\"Your website name\"\n}', 1),
(11, 'email_verification', 'Verificación de Correo Electrónico', 'Verificar Dirección de Correo Electrónico', '<p><strong>Verify Email Address</strong></p><p><img src=\"../../../logo-removebg-preview.png\" alt=\"\"></p><h2>Hello!</h2><p>Please click on the link below to verify your email address.</p><p><a href=\"{{link}}\">{{link}}</a></p><p>If you did not create an account, no further action is required.</p><p><br><strong>Best Regards</strong></p><p><strong>BIKEBROS&nbsp;Team</strong></p><p>&nbsp;<a href=\"https://www.instagram.com/skyforecasting/\"><img src=\"https://skyforecasting.net/help-center/media/images/ofBRYlvT1cu30VS_1700260141.png\"></a> <a href=\"https://twitter.com/skyforecasting\"><img src=\"https://skyforecasting.net/help-center/media/images/lSr0pUYldGRD46h_1700260215.png\"></a> <a href=\"https://www.facebook.com/profile.php?id=61553152322786\"><img src=\"https://skyforecasting.net/help-center/media/images/pk8iEq2c7f3mICO_1700260869.png\"></a> <a href=\"https://www.youtube.com/channel/UCscdHPJ4f79CAmiO2f9gJoA\"><img src=\"https://skyforecasting.net/help-center/media/images/krFVCzRVOornVih_1700260896.png\"></a></p><p>You received this email because you subscribed to our list.<br>&nbsp;<a href=\"https://skyforecasting.net/unsubscribepage/unsubscribe.html\">Unsubscribe</a> from future emails or update email preferences.<br>© 2024 BIKEBROS. All Rights Reserved.</p>', '{\"link\":\"Email verification link\",\"website_name\":\"Your website name\"}', 1),
(18, 'welcome', 'Bienvenida', 'Bienvenido a BIKEBROS', '<h2><strong>Bienvenido a BikeBros</strong></h2><p><strong><img src=\"../../../logo-removebg-preview.png\" alt=\"\"></strong></p><p>Hola {{name}},&nbsp;</p><p>Welcome to &nbsp;<strong>ACELERA</strong>! We’re so excited to have you on board.</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Start Exploring</p><p>If you have any questions along the way, don’t hesitate to reach out to our customer success team. We’re always here to help.</p><p><br><strong>Best Regards</strong></p><p><strong>ACELERA&nbsp; Team</strong></p><p>&nbsp;<a href=\"https://www.instagram.com/skyforecasting/\"><img src=\"https://skyforecasting.net/help-center/media/images/ofBRYlvT1cu30VS_1700260141.png\"></a> <a href=\"https://twitter.com/skyforecasting\"><img src=\"https://skyforecasting.net/help-center/media/images/lSr0pUYldGRD46h_1700260215.png\"></a> <a href=\"https://www.facebook.com/profile.php?id=61553152322786\"><img src=\"https://skyforecasting.net/help-center/media/images/pk8iEq2c7f3mICO_1700260869.png\"></a> <a href=\"https://www.youtube.com/channel/UCscdHPJ4f79CAmiO2f9gJoA\"><img src=\"https://skyforecasting.net/help-center/media/images/krFVCzRVOornVih_1700260896.png\"></a></p><p>You received this email because you subscribed to our list.<br>&nbsp;<a href=\"https://skyforecasting.net/unsubscribepage/unsubscribe.html\">Unsubscribe</a> from future emails or update email preferences.<br>© 2024 &nbsp;ACELERA. All Rights Reserved.</p>', '{\"name\":\"name\",\"website_name\":\"Your website name\"}', 1);

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
(6, 'Lente sp216bk.png', NULL, '/product_images/1723123242.png', '2024-08-08 13:20:42', '2024-08-08 13:20:42'),
(7, 'Lente sp216bk.png', NULL, '/product_images/1723258698.png', '2024-08-10 02:58:18', '2024-08-10 02:58:18'),
(8, '10164.png', NULL, '/product_images/1723259082.png', '2024-08-10 03:04:42', '2024-08-10 03:04:42'),
(9, 'sp216bl.png', NULL, '/product_images/1723259357.png', '2024-08-10 03:09:17', '2024-08-10 03:09:17'),
(10, 'sp216az', NULL, '/product_images/1723259586.png', '2024-08-10 03:13:06', '2024-08-10 03:13:06'),
(11, 'sp216ne', NULL, '/product_images/1723259685.png', '2024-08-10 03:14:45', '2024-08-10 03:14:45'),
(12, 'dfsd', NULL, '/product_images/1723269252.png', '2024-08-10 05:54:12', '2024-08-10 05:54:12'),
(25, 'blue', NULL, '/product_images/1723782797.png', '2024-08-16 04:33:17', '2024-08-16 04:33:17'),
(26, 'black', NULL, '/product_images/1723783123.png', '2024-08-16 04:38:43', '2024-08-16 04:38:43'),
(27, 'black', NULL, '/product_images/1723783127.png', '2024-08-16 04:38:47', '2024-08-16 04:38:47'),
(28, 'IMAGEN MOTO', NULL, '/product_images/1723783158.png', '2024-08-16 04:39:18', '2024-08-16 04:39:18'),
(29, 'blue', NULL, '/product_images/1723783923.png', '2024-08-16 04:52:03', '2024-08-16 04:52:03'),
(30, 'black', NULL, '/product_images/1723784365.png', '2024-08-16 04:59:25', '2024-08-16 04:59:25'),
(31, 'caja', NULL, '/product_images/1723787010.png', '2024-08-16 05:43:30', '2024-08-16 05:43:30'),
(32, 'moto', NULL, '/product_images/1723787146.png', '2024-08-16 05:45:46', '2024-08-16 05:45:46'),
(33, 'dedo medio rojo.jpeg', NULL, '/product_images/1723998018.jpeg', '2024-08-18 16:20:18', '2024-08-18 16:20:18'),
(34, 'dedo medio negro.jpeg', NULL, '/product_images/1723998046.jpeg', '2024-08-18 16:20:46', '2024-08-18 16:20:46'),
(35, 'azul', NULL, '/product_images/1724144284.png', '2024-08-20 08:58:04', '2024-08-20 08:58:04'),
(36, 'azul', NULL, '/product_images/1724144285.png', '2024-08-20 08:58:05', '2024-08-20 08:58:05'),
(37, 'azul', NULL, '/product_images/1724144334.png', '2024-08-20 08:58:54', '2024-08-20 08:58:54'),
(38, 'azul', NULL, '/product_images/1724144335.png', '2024-08-20 08:58:55', '2024-08-20 08:58:55'),
(39, 'klklll', NULL, '/product_images/1724144485.png', '2024-08-20 09:01:25', '2024-08-20 09:01:25'),
(40, 'jhkhjkjhkhj', NULL, '/product_images/1724144693.png', '2024-08-20 09:04:53', '2024-08-20 09:04:53'),
(41, 'cfgdfgrd', NULL, '/product_images/1724145313.png', '2024-08-20 09:15:13', '2024-08-20 09:15:13'),
(42, 'solocolor', NULL, '/product_images/1725315792.png', '2024-09-02 22:23:12', '2024-09-02 22:23:12'),
(43, 'negro1', NULL, '/product_images/1725373800.jpg', '2024-09-03 14:30:00', '2024-09-03 14:30:00'),
(44, 'negro2', NULL, '/product_images/1725373827.jpg', '2024-09-03 14:30:27', '2024-09-03 14:30:27'),
(45, 'negro3', NULL, '/product_images/1725374027.jpg', '2024-09-03 14:33:47', '2024-09-03 14:33:47'),
(46, 'verde1', NULL, '/product_images/1725374048.jpeg', '2024-09-03 14:34:08', '2024-09-03 14:34:08'),
(47, 'verde2', NULL, '/product_images/1725374069.jpeg', '2024-09-03 14:34:29', '2024-09-03 14:34:29'),
(48, 'verde3', NULL, '/product_images/1725374089.jpg', '2024-09-03 14:34:49', '2024-09-03 14:34:49'),
(49, 'rojo1', NULL, '/product_images/1725374111.jpeg', '2024-09-03 14:35:11', '2024-09-03 14:35:11'),
(50, 'rojo2', NULL, '/product_images/1725374131.png', '2024-09-03 14:35:31', '2024-09-03 14:35:31'),
(51, 'rojo3', NULL, '/product_images/1725374152.jpg', '2024-09-03 14:35:52', '2024-09-03 14:35:52'),
(52, 'calculadoraa', NULL, '/product_images/1725374328.jpg', '2024-09-03 14:38:48', '2024-09-03 14:38:48'),
(53, 'Boligrafo', NULL, '/product_images/1725374348.jpeg', '2024-09-03 14:39:08', '2024-09-03 14:39:08'),
(55, 'tx2', NULL, '/product_images/1725460469.png', '2024-09-04 14:34:29', '2024-09-04 14:34:29'),
(56, 'tx1', NULL, '/product_images/1725464417.png', '2024-09-04 15:40:17', '2024-09-04 15:40:17'),
(57, 'p1', NULL, '/product_images/1725543350.png', '2024-09-05 13:35:50', '2024-09-05 13:35:50'),
(58, 'Imagen prueba tienda general', NULL, '/product_images/1726332085.png', '2024-09-14 16:41:25', '2024-09-14 16:41:25'),
(59, '1. MF-TZ500-7', NULL, '/product_images/1726606154.png', '2024-09-17 20:49:14', '2024-09-17 20:49:14'),
(60, '2. MF-TZ500-7', NULL, '/product_images/1726606181.png', '2024-09-17 20:49:41', '2024-09-17 20:49:41'),
(61, '3.RD-TZ500-GS', NULL, '/product_images/1726606215.png', '2024-09-17 20:50:15', '2024-09-17 20:50:15'),
(62, '4. SL-TZ500-7R', NULL, '/product_images/1726606295.png', '2024-09-17 20:51:35', '2024-09-17 20:51:35'),
(63, '5. FD-TY601-L6', NULL, '/product_images/1726606323.png', '2024-09-17 20:52:03', '2024-09-17 20:52:03'),
(64, '6. RD-TY200-GS', NULL, '/product_images/1726606351.png', '2024-09-17 20:52:31', '2024-09-17 20:52:31'),
(65, '7. RD-TY500-SGS', NULL, '/product_images/1726606383.png', '2024-09-17 20:53:03', '2024-09-17 20:53:03'),
(66, '8. BR-TX805', NULL, '/product_images/1726606401.png', '2024-09-17 20:53:21', '2024-09-17 20:53:21'),
(67, '9. ST-EF41-7R', NULL, '/product_images/1726606424.png', '2024-09-17 20:53:44', '2024-09-17 20:53:44'),
(68, '10. SL-M315-8R', NULL, '/product_images/1726606467.jpeg', '2024-09-17 20:54:27', '2024-09-17 20:54:27'),
(69, '11. RD-M3100-SGS', NULL, '/product_images/1726606561.png', '2024-09-17 20:56:01', '2024-09-17 20:56:01'),
(70, '12. SL-M3100-L', NULL, '/product_images/1726606589.png', '2024-09-17 20:56:29', '2024-09-17 20:56:29'),
(71, '13. SL-M3100-R', NULL, '/product_images/1726606621.png', '2024-09-17 20:57:01', '2024-09-17 20:57:01'),
(72, '14. CS-LG300', NULL, '/product_images/1726606944.png', '2024-09-17 21:02:24', '2024-09-17 21:02:24'),
(73, '15. FC-U4010-2', NULL, '/product_images/1726606979.png', '2024-09-17 21:02:59', '2024-09-17 21:02:59'),
(74, '16. FC-U6000-1', NULL, '/product_images/1726607009.png', '2024-09-17 21:03:29', '2024-09-17 21:03:29'),
(75, '17. FD-U4000-L', NULL, '/product_images/1726607044.png', '2024-09-17 21:04:04', '2024-09-17 21:04:04'),
(76, '18. RD-U4000', NULL, '/product_images/1726607078.png', '2024-09-17 21:04:38', '2024-09-17 21:04:38'),
(77, '19. SL-U4000-9R', NULL, '/product_images/1726610986.png', '2024-09-17 22:09:46', '2024-09-17 22:09:46'),
(78, '20. SL-U4000-L', NULL, '/product_images/1726611022.png', '2024-09-17 22:10:22', '2024-09-17 22:10:22'),
(79, '21. BRMT410KTBLM4100-L', NULL, '/product_images/1726611081.png', '2024-09-17 22:11:21', '2024-09-17 22:11:21'),
(80, '22. BRMT420KTBLM4100-L', NULL, '/product_images/1726611138.png', '2024-09-17 22:12:18', '2024-09-17 22:12:18'),
(81, '23. BRMT410KTBLM4100-L', NULL, '/product_images/1726611161.png', '2024-09-17 22:12:41', '2024-09-17 22:12:41'),
(82, '24. BRMT420KTBLM4100-L', NULL, '/product_images/1726611183.png', '2024-09-17 22:13:03', '2024-09-17 22:13:03'),
(83, '25. BRM6100KTBLM6100-L', NULL, '/product_images/1726611250.png', '2024-09-17 22:14:10', '2024-09-17 22:14:10'),
(84, '26. BRM6120KTBLM6100-L', NULL, '/product_images/1726611289.png', '2024-09-17 22:14:49', '2024-09-17 22:14:49'),
(85, '27. BRM6100KTBLM6100-L', NULL, '/product_images/1726611310.png', '2024-09-17 22:15:10', '2024-09-17 22:15:10'),
(86, '28. BRM6120KTBLM6100-L', NULL, '/product_images/1726611329.png', '2024-09-17 22:15:29', '2024-09-17 22:15:29'),
(87, '29. CN-M6100', NULL, '/product_images/1726611374.png', '2024-09-17 22:16:14', '2024-09-17 22:16:14'),
(88, '30. CS-M6100-12', NULL, '/product_images/1726611399.png', '2024-09-17 22:16:39', '2024-09-17 22:16:39'),
(89, '31. FD-M4100-M', NULL, '/product_images/1726611431.png', '2024-09-17 22:17:11', '2024-09-17 22:17:11'),
(90, '32. FD-M5100-M', NULL, '/product_images/1726611457.png', '2024-09-17 22:17:38', '2024-09-17 22:17:38'),
(91, '33. RD-M5100-SGS', NULL, '/product_images/1726611483.png', '2024-09-17 22:18:03', '2024-09-17 22:18:03'),
(92, '34. RD-M6100-SGS', NULL, '/product_images/1726611553.png', '2024-09-17 22:19:13', '2024-09-17 22:19:13'),
(93, '35. SL-M5100-L', NULL, '/product_images/1726611576.png', '2024-09-17 22:19:36', '2024-09-17 22:19:36'),
(94, '36. BRM7100JTBLM7100-L', NULL, '/product_images/1726611640.png', '2024-09-17 22:20:40', '2024-09-17 22:20:40'),
(95, '37. BRM7100JTBLM7100-L', NULL, '/product_images/1726611761.png', '2024-09-17 22:22:41', '2024-09-17 22:22:41'),
(96, '38. CS-M7100-12', NULL, '/product_images/1726611780.png', '2024-09-17 22:23:00', '2024-09-17 22:23:00'),
(97, '39. RD-M7100-SGS', NULL, '/product_images/1726611799.png', '2024-09-17 22:23:19', '2024-09-17 22:23:19'),
(98, '40. P-SL-M7000-11-R', NULL, '/product_images/1726612421.png', '2024-09-17 22:33:41', '2024-09-17 22:33:41'),
(99, '41. BRM8100KTBLM8100-L', NULL, '/product_images/1726612449.png', '2024-09-17 22:34:09', '2024-09-17 22:34:09'),
(100, '42. BRM8100KTBLM8100-L', NULL, '/product_images/1726612542.png', '2024-09-17 22:35:42', '2024-09-17 22:35:42'),
(101, '43. SM-CRM85_36T', NULL, '/product_images/1726612569.png', '2024-09-17 22:36:09', '2024-09-17 22:36:09'),
(102, '44. CS-M8100-12', NULL, '/product_images/1726612606.png', '2024-09-17 22:36:46', '2024-09-17 22:36:46'),
(103, '45. RD-M8100-SGS', NULL, '/product_images/1726612631.png', '2024-09-17 22:37:11', '2024-09-17 22:37:11'),
(104, '46. P-SL-M640', NULL, '/product_images/1726612654.png', '2024-09-17 22:37:34', '2024-09-17 22:37:34');

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
(31, '2024_06_24_084835_create_product_variations_table', 19);

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
(66, '81d70b39-7df8-48e0-8b15-8c4af146004a', 1, 1, 'A new blog has posted on the platform.', 'http://127.0.0.1:8000/blog_details/T%C3%ADtulo%20del%20Blog%203', 'no', 2, '2024-10-28 03:52:57', '2024-10-28 03:52:57');

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
(1, 'About', 'about', '<h2>About US</h2>', 1, 1),
(2, 'Términos y condiciones', 'terms-of-use', '<p><strong>Use of this site is provided by Demos subject to the following Terms and Conditions:</strong><br />1. Your use constitutes acceptance of these Terms and Conditions as at the date of your first use of the site.<br />2. Demos reserves the rights to change these Terms and Conditions at any time by posting changes online. Your continued use of this site after changes are posted constitutes your acceptance of this agreement as modified.<br />3. You agree to use this site only for lawful purposes, and in a manner which does not infringe the rights, or restrict, or inhibit the use and enjoyment of the site by any third party.<br />4. This site and the information, names, images, pictures, logos regarding or relating to Demos are provided &ldquo;as is&rdquo; without any representation or endorsement made and without warranty of any kind whether express or implied. In no event will Demos be liable for any damages including, without limitation, indirect or consequential damages, or any damages whatsoever arising from the use or in connection with such use or loss of use of the site, whether in contract or in negligence.<br />5. Demos does not warrant that the functions contained in the material contained in this site will be uninterrupted or error free, that defects will be corrected, or that this site or the server that makes it available are free of viruses or bugs or represents the full functionality, accuracy and reliability of the materials.<br />6. Copyright restrictions: please refer to our Creative Commons license terms governing the use of material on this site.<br />7. Demos takes no responsibility for the content of external Internet Sites.<br />8. Any communication or material that you transmit to, or post on, any public area of the site including any data, questions, comments, suggestions, or the like, is, and will be treated as, non-confidential and non-proprietary information.<br />9. If there is any conflict between these Terms and Conditions and rules and/or specific terms of use appearing on this site relating to specific material then the latter shall prevail.<br />10. These terms and conditions shall be governed and construed in accordance with the laws of England and Wales. Any disputes shall be subject to the exclusive jurisdiction of the Courts of England and Wales.<br />11. If these Terms and Conditions are not accepted in full, the use of this site must be terminated immediately.</p>', 2, 1),
(3, 'política de privacidad', 'privacy-policy', '<p class=\\\"MsoNormal\\\" style=\\\"text-align: center;\\\" align=\\\"center\\\"><strong style=\\\"mso-bidi-font-weight: normal;\\\"><span lang=\\\"es\\\">Pol&iacute;tica de Privacidad de SocialCitas</span></strong></p>\r\n<p class=\\\"MsoNormal\\\"><span lang=\\\"es\\\">&nbsp;</span></p>\r\n<p class=\\\"MsoNormal\\\"><span lang=\\\"es\\\"><span style=\\\"mso-spacerun: yes;\\\">&nbsp;</span>&Uacute;ltima actualizaci&oacute;n: 29/ 01 /2024</span></p>\r\n<p class=\\\"MsoNormal\\\"><span lang=\\\"es\\\">&nbsp;</span></p>\r\n<p class=\\\"MsoNormal\\\"><span lang=\\\"es\\\">Bienvenido/a a SocialCitas, un servicio de anuncios clasificados dise&ntilde;ado para conectar a anunciantes y usuarios interesados. Por favor, toma un momento para revisar nuestra pol&iacute;tica de privacidad y entender c&oacute;mo gestionamos la informaci&oacute;n.</span></p>\r\n<p class=\\\"MsoNormal\\\"><span lang=\\\"es\\\">&nbsp;</span></p>\r\n<p class=\\\"MsoNormal\\\"><strong style=\\\"mso-bidi-font-weight: normal;\\\"><span lang=\\\"es\\\"><span style=\\\"mso-spacerun: yes;\\\">&nbsp;</span>1. Informaci&oacute;n Recopilada: </span></strong></p>\r\n<p class=\\\"MsoNormal\\\"><span lang=\\\"es\\\">&nbsp;</span></p>\r\n<p class=\\\"MsoNormal\\\"><span lang=\\\"es\\\">Recopilamos informaci&oacute;n que los usuarios proporcionan voluntariamente, como detalles de contacto, preferencias y detalles de anuncios. Esta informaci&oacute;n se utiliza para mejorar la experiencia de los usuarios y facilitar la conexi&oacute;n entre anunciantes y clientes potenciales.</span></p>\r\n<p class=\\\"MsoNormal\\\"><span lang=\\\"es\\\">&nbsp;</span></p>\r\n<p class=\\\"MsoNormal\\\"><strong style=\\\"mso-bidi-font-weight: normal;\\\"><span lang=\\\"es\\\"><span style=\\\"mso-spacerun: yes;\\\">&nbsp;</span>2. Uso de la Informaci&oacute;n: </span></strong></p>\r\n<p class=\\\"MsoNormal\\\"><span lang=\\\"es\\\">&nbsp;</span></p>\r\n<p class=\\\"MsoNormal\\\"><span lang=\\\"es\\\">La informaci&oacute;n recopilada se utiliza para optimizar la calidad de nuestros servicios y facilitar transacciones entre anunciantes y usuarios. No compartimos informaci&oacute;n personal con terceros sin el consentimiento expreso del usuario, excepto cuando sea requerido por la ley.</span></p>\r\n<p class=\\\"MsoNormal\\\"><span lang=\\\"es\\\">&nbsp;</span></p>\r\n<p class=\\\"MsoNormal\\\"><strong style=\\\"mso-bidi-font-weight: normal;\\\"><span lang=\\\"es\\\"><span style=\\\"mso-spacerun: yes;\\\">&nbsp;</span>3. Funci&oacute;n de Intermediario: </span></strong></p>\r\n<p class=\\\"MsoNormal\\\"><span lang=\\\"es\\\">&nbsp;</span></p>\r\n<p class=\\\"MsoNormal\\\"><span lang=\\\"es\\\">SocialCitas act&uacute;a como intermediario entre anunciantes y usuarios. No asumimos responsabilidad por las acciones, resultados o consecuencias que puedan surgir de las interacciones entre usuarios, incluyendo las citas de encuentros.</span></p>\r\n<p class=\\\"MsoNormal\\\"><span lang=\\\"es\\\">&nbsp;</span></p>\r\n<p class=\\\"MsoNormal\\\"><strong style=\\\"mso-bidi-font-weight: normal;\\\"><span lang=\\\"es\\\"><span style=\\\"mso-spacerun: yes;\\\">&nbsp;</span>4. Responsabilidad del Usuario: </span></strong></p>\r\n<p class=\\\"MsoNormal\\\"><span lang=\\\"es\\\">&nbsp;</span></p>\r\n<p class=\\\"MsoNormal\\\"><span lang=\\\"es\\\">Todos los usuarios aceptan que cualquier encuentro agendado a trav&eacute;s de nuestro servicio es de su entera responsabilidad. SocialCitas no se hace responsable de lo que ocurra durante estas citas.</span></p>\r\n<p class=\\\"MsoNormal\\\"><span lang=\\\"es\\\">&nbsp;</span></p>\r\n<p class=\\\"MsoNormal\\\"><strong style=\\\"mso-bidi-font-weight: normal;\\\"><span lang=\\\"es\\\"><span style=\\\"mso-spacerun: yes;\\\">&nbsp;</span>5. Seguridad de la Informaci&oacute;n: </span></strong></p>\r\n<p class=\\\"MsoNormal\\\"><span lang=\\\"es\\\">&nbsp;</span></p>\r\n<p class=\\\"MsoNormal\\\"><span lang=\\\"es\\\">Implementamos medidas de seguridad para proteger la informaci&oacute;n recopilada. A pesar de nuestros esfuerzos, no podemos garantizar la seguridad completa. Los usuarios deben tomar precauciones adicionales al compartir informaci&oacute;n sensible.</span></p>\r\n<p class=\\\"MsoNormal\\\"><span lang=\\\"es\\\">&nbsp;</span></p>\r\n<p class=\\\"MsoNormal\\\"><strong style=\\\"mso-bidi-font-weight: normal;\\\"><span lang=\\\"es\\\"><span style=\\\"mso-spacerun: yes;\\\">&nbsp;</span>6. Cambios en la Pol&iacute;tica: </span></strong></p>\r\n<p class=\\\"MsoNormal\\\"><span lang=\\\"es\\\">&nbsp;</span></p>\r\n<p class=\\\"MsoNormal\\\"><span lang=\\\"es\\\">Nos reservamos el derecho de actualizar esta pol&iacute;tica en cualquier momento. Cambios significativos se comunicar&aacute;n a los usuarios a trav&eacute;s de la plataforma.</span></p>\r\n<p class=\\\"MsoNormal\\\"><span lang=\\\"es\\\">&nbsp;</span></p>\r\n<p class=\\\"MsoNormal\\\"><strong style=\\\"mso-bidi-font-weight: normal;\\\"><span lang=\\\"es\\\"><span style=\\\"mso-spacerun: yes;\\\">&nbsp;</span>7. Contacto: </span></strong></p>\r\n<p class=\\\"MsoNormal\\\"><span lang=\\\"es\\\">&nbsp;</span></p>\r\n<p class=\\\"MsoNormal\\\"><span lang=\\\"es\\\">Para consultas sobre la pol&iacute;tica de privacidad, por favor cont&aacute;ctanos en </span><span lang=\\\"es\\\" style=\\\"font-size: 10.5pt; line-height: 115%; font-family: Roboto; mso-fareast-font-family: Roboto; mso-bidi-font-family: Roboto; color: #1f1f1f; background: #E9EEF6;\\\">socialcitas127@gmail.com</span></p>\r\n<p class=\\\"MsoNormal\\\"><span lang=\\\"es\\\">&nbsp;</span></p>\r\n<p class=\\\"MsoNormal\\\"><span lang=\\\"es\\\">Gracias por confiar en SocialCitas. Estamos comprometidos a proteger tu privacidad y proporcionar un servicio seguro y confiable.</span></p>', 3, 1),
(4, 'FAQ', 'faq', '<p>Coming Soon</p>', 4, 1),
(5, 'Contact', 'contact', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing.</p>', 5, 1);

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
(1, 1, 'Maribel Prueba', NULL, '[{\"product_id\":\"307\",\"quantity\":\"4\",\"price\":\"15.00\",\"size\":\"Estandar\",\"sku\":\"FrutaEsta\"},{\"product_id\":\"307\",\"quantity\":\"1\",\"price\":\"15.00\",\"size\":\"Muy Peque\\u00f1o\",\"sku\":\"FrutaMuyPeq\"},{\"product_id\":\"307\",\"quantity\":\"1\",\"price\":\"15.00\",\"size\":\"Estandar\",\"sku\":\"FrutaEsta\"},{\"product_id\":\"307\",\"quantity\":\"1\",\"price\":\"15.00\",\"size\":\"Muy Peque\\u00f1o\",\"sku\":\"FrutaMuyPeq\"},{\"product_id\":\"304\",\"quantity\":\"1\",\"price\":\"15.00\",\"size\":\"default-size\",\"sku\":\"YoguetaRojo\"},{\"product_id\":\"305\",\"quantity\":\"1\",\"price\":\"15.00\",\"size\":\"default-size\",\"sku\":\"YoguetaVerde\"}]', 40, NULL, 135.00, NULL, 0, 'initial', 'ml.urquizo@gmail.com', '2024-09-04 16:36:44', '2024-09-04 16:36:44'),
(2, 2, 'Maribel Prueba', NULL, '[{\"product_id\":\"310\",\"quantity\":\"1\",\"price\":\"15.00\",\"size\":\"Mediano\",\"sku\":\"MixMedRed\"},{\"product_id\":\"311\",\"quantity\":\"1\",\"price\":\"15.00\",\"size\":\"Mediano\",\"sku\":\"MixMedGreen\"},{\"product_id\":\"310\",\"quantity\":\"1\",\"price\":\"15.00\",\"size\":\"XXL\",\"sku\":\"MixXXLRed\"},{\"product_id\":\"311\",\"quantity\":\"1\",\"price\":\"15.00\",\"size\":\"XXL\",\"sku\":\"MixXXLGreen\"}]', 40, NULL, 60.00, NULL, 0, 'initial', 'ml.urquizo@gmail.com', '2024-09-04 16:55:20', '2024-09-04 16:55:20'),
(3, 3, 'Ivan', NULL, '[{\"product_id\":\"321\",\"quantity\":\"5\",\"price\":\"50.00\",\"size\":\"peque\\u00f1o\",\"sku\":\"guante2verdepe\"},{\"product_id\":\"331\",\"quantity\":\"3\",\"price\":\"35.00\",\"size\":\"mediano\",\"sku\":\"cami123negromed\"},{\"product_id\":\"330\",\"quantity\":\"1\",\"price\":\"35.00\",\"size\":\"mediano\",\"sku\":\"cami123blancomed\"}]', 44, NULL, 390.00, NULL, 0, 'initial', 'jago1410@gmail.com', '2024-09-05 13:12:37', '2024-09-05 13:12:37'),
(4, 4, 'Maribel Prueba', NULL, '[{\"product_id\":\"330\",\"quantity\":\"1\",\"price\":\"35.00\",\"size\":\"peque\\u00f1o\",\"sku\":\"cami123blancope\"},{\"product_id\":\"331\",\"quantity\":\"1\",\"price\":\"35.00\",\"size\":\"peque\\u00f1o\",\"sku\":\"cami123negrope\"},{\"product_id\":\"330\",\"quantity\":\"1\",\"price\":\"35.00\",\"size\":\"mediano\",\"sku\":\"cami123blancomed\"},{\"product_id\":\"331\",\"quantity\":\"1\",\"price\":\"35.00\",\"size\":\"mediano\",\"sku\":\"cami123negromed\"},{\"product_id\":\"307\",\"quantity\":\"1\",\"price\":\"15.00\",\"size\":\"Muy Peque\\u00f1o\",\"sku\":\"FrutaMuyPeq\"}]', 40, NULL, 155.00, NULL, 0, 'initial', 'ml.urquizo@gmail.com', '2024-09-05 19:54:58', '2024-09-05 19:54:58'),
(5, 5, 'Daniela Yujra Callizaya', NULL, '[{\"product_id\":\"3058\",\"quantity\":\"1\",\"price\":\"215.00\",\"size\":\"default-size\",\"sku\":\"S208BK-L\"}]', 45, NULL, 215.00, NULL, 0, 'initial', 'danielay.callizaya@gmail.com', '2024-09-17 15:24:01', '2024-09-17 15:24:01'),
(6, 6, 'Daniela Yujra Callizaya', NULL, '[{\"product_id\":\"3059\",\"quantity\":\"1\",\"price\":\"290.00\",\"size\":\"default-size\",\"sku\":\"S210BK-L\"},{\"product_id\":\"3135\",\"quantity\":\"1\",\"price\":\"25.00\",\"size\":\"default-size\",\"sku\":\"TLLRA\"}]', 45, NULL, 315.00, NULL, 0, 'initial', 'danielay.callizaya@gmail.com', '2024-09-17 15:26:01', '2024-09-17 15:26:01'),
(7, 7, 'Ivan', NULL, '[{\"product_id\":\"3225\",\"quantity\":\"13\",\"price\":\"400.00\",\"size\":\"default-size\",\"sku\":\"ZN1001-R\"}]', 44, NULL, 5200.00, NULL, 0, 'initial', 'jago1410@gmail.com', '2024-09-17 18:47:48', '2024-09-17 18:47:48'),
(8, 8, 'Maribel Prueba', NULL, '[{\"product_id\":\"2801\",\"quantity\":\"4\",\"price\":\"140.00\",\"size\":\"default-size\",\"sku\":\"ESLM3158RA\"},{\"product_id\":\"2802\",\"quantity\":\"2\",\"price\":\"90.00\",\"size\":\"default-size\",\"sku\":\"ESLTZ5007PA\"},{\"product_id\":\"2806\",\"quantity\":\"3\",\"price\":\"220.00\",\"size\":\"default-size\",\"sku\":\"ESTEF41P7AL\"}]', 40, NULL, 1400.00, NULL, 0, 'initial', 'ml.urquizo@gmail.com', '2024-09-18 02:02:18', '2024-09-18 02:02:18'),
(9, 9, 'Ivan Ayala Quispe', NULL, '[{\"product_id\":\"2906\",\"quantity\":\"5\",\"price\":\"175.00\",\"size\":\"default-size\",\"sku\":\"ISLM5100RAP\"}]', 41, NULL, 875.00, NULL, 0, 'initial', '1iayalaq1@gmail.com', '2024-09-25 21:31:58', '2024-09-25 21:31:58');

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
(1, 'f9ec5844-335b-4b4e-b47e-cdfcec086803', 7, 0, 'Llanta', 'Llanta', 'Llanta', 'Llanta', 'Llanta', 'uploads/meta/1721184693-ZWB3mf93IJ.png', '2024-06-25 01:50:30', '2024-07-17 02:51:33'),
(2, 'f76206e5-8d59-4cd7-bb29-1e3e022fda6a', 7, 0, 'Accesorios', 'Accesorios', 'Accesorios', 'Accesorios', 'Accesorios', 'uploads/meta/1721181017-wDnXZ9y8Fm.svg', '2024-06-25 01:51:19', '2024-07-17 01:50:17'),
(3, 'e0fb190e-2bad-4b44-8a2b-fffb564baeef', 7, 0, 'Partes', 'Partes', 'Partes', 'Partes', 'Partes', 'uploads/meta/1721186194-0er1x931bQ.png', '2024-06-25 01:51:39', '2024-07-17 03:16:34'),
(4, 'ecb485c6-5c94-4a35-af58-0e0e8ce78995', 7, 0, 'Bicicletas Enteras', 'Bicicletas-Enteras', 'Bicicletas Enteras', 'Bicicletas Enteras', 'Bicicletas Enteras', 'uploads/meta/1721181343-sfTU6xX6yp.svg', '2024-06-25 01:51:58', '2024-07-17 01:55:43'),
(6, 'cb1f26c7-e929-4f96-8650-47c123b4681a', 7, 4, 'Viking X', 'Viking-X', 'Viking X', 'Viking X', 'Viking X', NULL, '2024-06-28 11:41:13', '2024-06-28 11:41:13'),
(7, '5dda2d9c-5c5f-4985-b2fc-8f2fcddba2e6', 7, 4, 'Gary Fisher', 'Gary-Fisher', 'Gary Fisher', 'Gary Fisher', 'Gary Fisher', NULL, '2024-06-28 11:41:42', '2024-06-28 11:41:42'),
(8, '68becc36-18ea-4f9e-a51f-b04fee0dec11', 7, 3, 'Cuadro', 'Cuadro', 'Cuadro', 'Cuadro', 'Cuadro', NULL, '2024-06-28 11:45:08', '2024-06-28 11:45:08'),
(9, '1827d80f-f609-40a9-8ee7-4755eb2eb357', 7, 3, 'Horquilla', 'Horquilla', 'Horquilla', 'Horquilla', 'Horquilla', NULL, '2024-06-28 11:45:37', '2024-06-28 11:45:37'),
(10, '38aa6413-082d-4452-97b5-243ec1af1731', 7, 3, 'Mazo', 'Mazo', 'Mazo', 'Mazo', 'Mazo', NULL, '2024-06-28 11:46:09', '2024-06-28 11:46:09'),
(11, '78066c4c-31f5-4b43-9382-aab95cf50cb1', 7, 3, 'Tija', 'Tija', 'Tija', 'Tija', 'Tija', NULL, '2024-06-28 11:47:10', '2024-06-28 11:47:10'),
(12, 'c0fc3bee-e191-4535-b259-ad1a341f33a3', 7, 3, 'Estrella', 'Estrella', 'Estrella', 'Estrella', 'Estrella', NULL, '2024-06-28 11:47:40', '2024-06-28 11:47:40'),
(13, '86adcd54-0c7a-4734-8258-8d16cd07b07d', 7, 3, 'Chicharra', 'Chicharra', 'Chicharra', 'Chicharra', 'Chicharra', NULL, '2024-06-28 11:48:12', '2024-06-28 11:48:12'),
(14, '88ab1f29-f894-48d6-a37a-477deb344c1f', 7, 3, 'Freno', 'Freno', 'Freno', 'Freno', 'Freno', NULL, '2024-06-28 11:48:42', '2024-06-28 11:48:42'),
(15, '0d80346a-8cc4-4814-9f4e-eca0d69db320', 7, 3, 'Caja Trasera', 'Caja-Trasera', 'Caja Trasera', 'Caja Trasera', 'Caja Trasera', NULL, '2024-06-28 11:49:15', '2024-06-28 11:49:15'),
(16, '8387d893-7f7b-4bac-938e-6a92373015b5', 7, 3, 'Caja de cambio', 'Caja-de-cambio', 'Caja de cambio', 'Caja de cambio', 'Caja de cambio', NULL, '2024-06-28 11:49:52', '2024-06-28 11:49:52'),
(17, '579d09e2-e175-434b-b789-dbcfe24732bb', 7, 3, 'Descarrilador', 'Descarrilador', 'Descarrilador', 'Descarrilador', 'Descarrilador', NULL, '2024-06-28 11:50:19', '2024-06-28 11:50:19'),
(18, '4bfde5b6-55ef-45ec-8dd1-59d0117a33d0', 7, 3, 'Cubeta Central', 'Cubeta-Central', 'Cubeta Central', 'Cubeta Central', 'Cubeta Central', NULL, '2024-06-28 11:50:45', '2024-06-28 11:50:45'),
(19, '09ba0d55-56f9-4210-885f-c0071933c7af', 7, 3, 'Cubeta de Horquilla', 'Cubeta-de-Horquilla', 'Cubeta de Horquilla', 'Cubeta de Horquilla', 'Cubeta de Horquilla', NULL, '2024-06-28 11:51:37', '2024-06-28 11:51:37'),
(20, 'a59da9c1-e412-4292-b6d0-469852f017ce', 7, 3, 'Manubrio', 'Manubrio', 'Manubrio', 'Manubrio', 'Manubrio', NULL, '2024-06-28 11:51:58', '2024-06-28 11:51:58'),
(21, 'e6ee250a-38cb-4412-acbf-babe0026d7b4', 7, 3, 'Plato', 'Plato', 'Plato', 'Plato', 'Plato', NULL, '2024-06-28 11:52:41', '2024-06-28 11:52:41'),
(22, '8c491a53-1049-46a8-a43f-ebd3d95e1807', 7, 3, 'Disco de freno', 'Disco-de-freno', 'Disco de freno', 'Disco de freno', 'Disco de freno', NULL, '2024-06-28 11:53:06', '2024-06-28 11:53:06'),
(23, 'a06b3d2f-166b-4706-9e69-d2fd3a72165d', 7, 3, 'Pastilla', 'Pastilla', 'Pastilla', 'Pastilla', 'Pastilla', NULL, '2024-06-28 11:53:57', '2024-06-28 11:53:57'),
(24, '22a48fd5-9dae-4a43-8da2-b13091c461c8', 7, 3, 'Cadena', 'Cadena', 'Cadena', 'Cadena', 'Cadena', NULL, '2024-06-28 11:54:25', '2024-06-28 11:54:25'),
(25, '025e6b75-bc80-4680-980c-c4a0c1333a22', 7, 3, 'Sillin', 'Sillin', 'Sillin', 'Sillin', 'Sillin', NULL, '2024-06-28 11:54:50', '2024-06-28 11:54:50'),
(26, '680bf08b-9d94-4488-b94f-716f6d84e2ce', 7, 3, 'Radio', 'Radio', 'Radio', 'Radio', 'Radio', NULL, '2024-06-28 11:55:13', '2024-06-28 11:55:13'),
(27, '1c809053-44e8-4a7d-b062-11c8e1945f9d', 7, 3, 'Steam', 'Steam', 'Steam', 'Steam', 'Steam', NULL, '2024-06-28 11:55:52', '2024-06-28 11:55:52'),
(28, 'ced8a4c9-227e-4130-8586-cb0691350221', 7, 3, 'Amortiguador', 'Amortiguador', 'Amortiguador', 'Amortiguador', 'Amortiguador', NULL, '2024-06-28 11:56:15', '2024-06-28 11:56:15'),
(29, 'b21a0d23-e4b8-4c26-9aaa-79b79a72de05', 7, 3, 'Palanca', 'Palanca', 'Palanca', 'Palanca', 'Palanca', NULL, '2024-06-28 11:56:38', '2024-06-28 11:56:38'),
(30, '9e38871b-3612-42c9-9239-2e6870676612', 7, 3, 'Pedal', 'Pedal', 'Pedal', 'Pedal', 'Pedal', NULL, '2024-06-28 11:57:11', '2024-06-28 11:57:11'),
(31, '73dd2e04-303b-40af-813f-a5f359691795', 7, 2, 'Lentes', 'Lentes', 'Lentes', 'Lentes', 'Lentes', NULL, '2024-06-28 11:57:40', '2024-06-28 11:57:40'),
(32, 'c3df8cb1-6c37-4cb7-b515-f2f024993841', 7, 2, 'Luz', 'Luz', 'Luz', 'Luz', 'Luz', NULL, '2024-06-28 11:58:12', '2024-06-28 11:58:12'),
(33, 'd009b69f-719c-4ebb-8523-176161aabc8f', 7, 2, 'Bocina', 'Bocina', 'Bocina', 'Bocina', 'Bocina', NULL, '2024-06-28 11:58:45', '2024-06-28 11:58:45'),
(34, 'c4690a59-2b42-436a-a9f4-8724780ed104', 7, 2, 'Inflador', 'Inflador', 'Inflador', 'Inflador', 'Inflador', NULL, '2024-06-28 11:59:27', '2024-06-28 11:59:27'),
(35, '6665560b-8a99-42b9-8107-628eb7e323bb', 7, 2, 'Bolsas', 'Bolsas', 'Bolsas', 'Bolsas', 'Bolsas', NULL, '2024-06-28 11:59:59', '2024-06-28 11:59:59'),
(36, '679e2925-a507-4be3-ab3c-a43988601750', 7, 2, 'Portabotellon', 'Portabotellon', 'Portabotellon', 'Portabotellon', 'Portabotellon', NULL, '2024-06-28 12:00:31', '2024-06-28 12:00:31'),
(37, '63431cc8-0827-488e-9461-e1c995b7de98', 7, 2, 'Botellon', 'Botellon', 'Botellon', 'Botellon', 'Botellon', NULL, '2024-06-28 12:01:00', '2024-06-28 12:01:00'),
(38, '94bee6d8-2d15-462b-9a52-1f19f7661cd2', 7, 2, 'Ciclocomputador', 'Ciclocomputador', 'Ciclocomputador', 'Ciclocomputador', 'Ciclocomputador', NULL, '2024-06-28 12:01:33', '2024-06-28 12:01:33'),
(39, '3016d480-7a29-43a2-af64-6b7ed5bf3228', 7, 2, 'Grip', 'Grip', 'Grip', 'Grip', 'Grip', NULL, '2024-06-28 12:02:01', '2024-06-28 12:02:01'),
(40, '5c3650c2-e548-42b4-bb5d-6a32438573f9', 7, 2, 'Cinta protectora', 'Cinta-protectora', 'Cinta protectora', 'Cinta protectora', 'Cinta protectora', NULL, '2024-06-28 12:02:33', '2024-06-28 12:02:33'),
(41, '511612c2-23c0-4fd0-9457-7c6a42ac644c', 7, 1, 'Llanta', 'Llanta', 'Llanta', 'Llanta', 'Llanta', '', '2024-06-28 12:03:21', '2024-07-17 00:48:17'),
(42, '92e50482-28a5-4375-bbcc-4ce0b2d0abbe', 7, 1, 'Camara', 'Camara', 'Camara', 'Camara', 'Camara', NULL, '2024-06-28 12:03:50', '2024-06-28 12:03:50'),
(44, 'ecf4cc39-3639-49c4-99bd-9994668c41f9', 9, 3, 'freno mt200', 'freno-mt200', 'freno mt200', 'mt200', 'mt200', 'uploads/meta/1719596399-6qvFp0pEZU.jpg', '2024-06-28 17:39:59', '2024-06-28 17:50:38'),
(53, '7de43eb4-f859-416b-b333-cfbe2bbde783', NULL, 52, 'Child preuba', 'Child-preuba', 'Child preuba', 'Child preuba', 'Child preuba', 'uploads/meta/1723257754-lPN8u3HP0x.png', '2024-08-10 02:42:34', '2024-08-10 02:42:34'),
(57, '12cd2d03-e4da-464a-9127-1e714706e59e', 14, 55, 'Caja Trasera.', 'Caja-Trasera', 'Caja Trasera.', 'Caja Trasera.', 'Caja Trasera.', NULL, '2024-08-13 22:58:55', '2024-08-13 23:05:54'),
(58, 'fd2d0d76-390e-437b-a41c-2f0bf99524e5', 15, 0, 'Llanta burro', 'Llanta-burro', 'Llanta burro', 'Llanta burro', 'Llanta burro', 'uploads/meta/1723590042-gFjczrYmBf.jpeg', '2024-08-13 23:00:42', '2024-08-13 23:00:42'),
(59, '1108950a-84c7-437a-b2f9-e6732170a88d', 15, 58, 'rombo', 'rombo', 'rombo', 'rombo', 'rombo', NULL, '2024-08-13 23:01:13', '2024-08-13 23:01:13'),
(61, '5d281134-ab5c-4435-b22e-ebcb038a6e69', 14, 55, 'Freno.', 'Freno', 'Freno.', 'Freno.', 'Freno.', 'uploads/meta/1723640551-rIkLqm5CLE.jpg', '2024-08-14 13:02:31', '2024-08-14 13:02:31'),
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
(82, '48ba20b4-c6bb-4bcd-9945-db6f1f62c026', 7, 1, 'sdfsdfsdfsdf', 'sdfsdfsdfsdf', 'sdfsadsadsa', 'sadsadad', 'asdsada', NULL, '2024-09-04 03:30:28', '2024-09-04 03:30:28'),
(83, 'd1f657df-8a99-474c-8864-a636655d3102', 9, 69, 'testing cheild', 'testing-cheild', 'testing cheild', 'testing cheild', 'testing cheild', NULL, '2024-09-04 04:42:32', '2024-09-04 04:42:32'),
(86, '51abc97e-cd8e-4a09-bfa9-a39329e2374b', 9, 0, 'subcategory testasd', 'subcategory-testasd', 'subcategory test', 'subcategory test', 'subcategory test', NULL, '2024-09-04 05:18:35', '2024-09-04 05:19:04'),
(87, '9766a727-28de-4ec9-bddf-bbb93367d9be', 9, 86, 'childcategory test final', 'childcategory-test-final', 'childcategory test', 'childcategory test', 'childcategory test', NULL, '2024-09-04 05:24:16', '2024-09-04 05:24:51'),
(88, '46534f41-15b2-4600-9071-d83190c40b6a', 24, 0, 'sdfadsad', 'sdfadsad', 'sdfadsad', 'sdfadsad', 'sdfadsad', NULL, '2024-09-04 13:13:57', '2024-09-04 13:13:57'),
(89, 'f410f72d-b29a-4dcf-a1de-35e67782ae5a', 25, 69, 'asdadsadadsadadsad', 'asdadsadadsadadsad', NULL, NULL, NULL, NULL, '2024-09-04 13:20:56', '2024-09-04 13:20:56'),
(90, '878dbb64-d688-4f81-bfc3-bdd5bf4d7ab3', 26, 0, 'Días', 'Días', 'Días', 'Días', 'Días', 'uploads/meta/1725465943-WVnyJQYVce.jpg', '2024-09-04 16:05:43', '2024-09-04 16:05:43'),
(91, '0c63434d-700b-4f1b-804c-9319cbb368cd', 26, 90, 'Lunes', 'Lunes', 'Lunes', 'Lunes', 'Lunes', NULL, '2024-09-04 16:06:04', '2024-09-04 16:06:04'),
(92, 'f2da7143-9160-4f9e-ace0-d60a8d5a166a', 26, 90, 'Martes', 'Martes', 'Martes', 'Martes', 'Martes', NULL, '2024-09-04 16:06:25', '2024-09-04 16:06:25'),
(93, 'd8328afd-5f0e-451d-8fac-1f8657d43f7b', 26, 90, 'Miercoles', 'Miercoles', 'Miercoles', 'Miercoles', 'Miercoles', NULL, '2024-09-04 16:06:45', '2024-09-04 16:06:45'),
(95, '4fe065d0-7959-421f-97fd-17576ffbb128', 14, 0, 'Acera', 'Acera', 'Acera', 'Acera', 'Acera', 'uploads/meta/1725850772-ICPiuD6oAM.png', '2024-09-09 02:59:32', '2024-09-09 03:05:05'),
(96, '1a918a96-e4b6-46ce-9086-17a99e478596', 14, 0, 'Alivio', 'Alivio', 'Alivio', 'Alivio', 'Alivio', 'uploads/meta/1725850821-8c5eV1NL7Z.png', '2024-09-09 03:00:21', '2024-09-09 03:05:28'),
(97, '7dbe1a72-3cf9-40fe-a80c-68d7c0d9f9a6', 14, 0, 'Altus', 'Altus', 'Altus', 'Altus', 'Altus', 'uploads/meta/1725850846-wPYMEGuaXx.png', '2024-09-09 03:00:46', '2024-09-09 03:05:45'),
(98, 'f97146d4-84a3-415c-a5f9-5ee1ca59534f', 14, 0, 'Claris', 'Claris', 'Claris', 'Claris', 'Claris', 'uploads/meta/1725850901-N46f2midUh.png', '2024-09-09 03:01:41', '2024-09-09 03:01:41'),
(99, 'c5bf5d99-dcc7-4030-ae97-976688ec919e', 14, 0, 'Cues', 'Cues', 'Cues', 'Cues', 'Cues', 'uploads/meta/1725851258-u0xoNmuxhQ.png', '2024-09-09 03:07:38', '2024-09-09 03:07:38'),
(100, '27209c92-f9bd-446d-990f-51a1f28d6874', 14, 0, 'Deore', 'Deore', 'Deore', 'Deore', 'Deore', 'uploads/meta/1725851277-SlfDWmUzW3.png', '2024-09-09 03:07:57', '2024-09-09 03:07:57'),
(101, 'd215ac35-f13d-4586-91ff-22ba017f7612', 14, 0, 'Deore 10s', 'Deore-10s', 'Deore 10s', 'Deore 10s', 'Deore 10s', 'uploads/meta/1725851299-zDYdsuSuOO.png', '2024-09-09 03:08:19', '2024-09-09 03:08:19'),
(102, 'e6ae9756-1abf-42e4-9d94-9d8ba77c0ab5', 14, 0, 'Deore 11s', 'Deore-11s', 'Deore 11s', 'Deore 11s', 'Deore 11s', 'uploads/meta/1725851323-Brq6M6i1kc.png', '2024-09-09 03:08:43', '2024-09-09 03:08:43'),
(103, '9f64075c-f3c9-401f-8d9e-27c782d20822', 14, 0, 'Deore 12s', 'Deore-12s', 'Deore 12s', 'Deore 12s', 'Deore 12s', 'uploads/meta/1725851346-mJ3gMTznup.png', '2024-09-09 03:09:06', '2024-09-09 03:09:06'),
(104, '41e71a43-ad13-4522-a55e-e945885f32df', 14, 0, 'Deore XT', 'Deore-XT', 'Deore XT', 'Deore XT', 'Deore XT', 'uploads/meta/1725851364-a3AMv76hUO.png', '2024-09-09 03:09:24', '2024-09-09 03:09:24'),
(105, '15e3a52d-3fb9-4c8c-ba9c-f98f1494ddb8', 14, 0, 'Dura-Ace', 'Dura-Ace', 'Dura-Ace', 'Dura-Ace', 'Dura-Ace', 'uploads/meta/1725851401-fMhhMs9Tiu.png', '2024-09-09 03:10:01', '2024-09-09 03:10:01'),
(106, '5557d478-28e7-48ab-b995-f2eca187b48b', 14, 0, 'Essa', 'Essa', 'Essa', 'Essa', 'Essa', 'uploads/meta/1725851439-cGIKyzZIPm.png', '2024-09-09 03:10:39', '2024-09-09 03:10:39'),
(107, '0e88112c-753a-4108-91ec-cba3b2d8b40b', 14, 0, 'Saint', 'Saint', 'Saint', 'Saint', 'Saint', 'uploads/meta/1725851459-HubXVeZSvn.png', '2024-09-09 03:10:59', '2024-09-09 03:10:59'),
(108, '0b755065-7c30-42b7-88be-dc8b76658483', 14, 0, 'Slx', 'Slx', 'Slx', 'Slx', 'Slx', 'uploads/meta/1725851480-3731J2PHsW.png', '2024-09-09 03:11:20', '2024-09-09 03:11:20'),
(109, '3834cde1-8ec5-4230-9a46-1508b7fffbca', 14, 0, 'Sora', 'Sora', 'Sora', 'Sora', 'Sora', 'uploads/meta/1725851499-GN0CzPTZBi.png', '2024-09-09 03:11:39', '2024-09-09 03:11:39'),
(110, 'c2f714ab-282d-4329-824b-f134019d034d', 14, 0, 'Tiagra', 'Tiagra', 'Tiagra', 'Tiagra', 'Tiagra', 'uploads/meta/1725851518-5So0HPlh4l.png', '2024-09-09 03:11:58', '2024-09-09 03:11:58'),
(111, '1d956dc1-e2f9-4da5-994c-ae387ef5e39c', 14, 0, 'Tourney', 'Tourney', 'Tourney', 'Tourney', 'Tourney', 'uploads/meta/1725851549-bMVD7hFEDo.png', '2024-09-09 03:12:29', '2024-09-09 03:12:29'),
(112, 'dcf1203d-b680-4fb7-ba4f-ea9f88dcc39e', 14, 0, 'Tourney TX', 'Tourney-TX', 'Tourney TX', 'Tourney TX', 'Tourney TX', 'uploads/meta/1725851571-iKmhlH8w55.png', '2024-09-09 03:12:51', '2024-09-09 03:12:51'),
(113, 'aa65c004-a790-406f-8560-eb673dd2206b', 14, 0, 'Tourney TZ', 'Tourney-TZ', 'Tourney TZ', 'Tourney TZ', 'Tourney TZ', 'uploads/meta/1725851593-ELJQO2dxrc.png', '2024-09-09 03:13:13', '2024-09-09 03:13:13'),
(114, '34020b0a-860d-42c7-bae2-1bd3e71d0e56', 14, 0, 'Xtr', 'Xtr', 'Xtr', 'Xtr', 'Xtr', 'uploads/meta/1725851614-Ja2RIIO5aE.png', '2024-09-09 03:13:34', '2024-09-09 03:13:34'),
(115, 'c65a1866-94e2-43ff-8b5c-7582ff8699f7', 14, 0, 'Ultegra', 'Ultegra', 'Ultegra', 'Ultegra', 'Ultegra', 'uploads/meta/1725851639-8rOUCTlJGe.png', '2024-09-09 03:13:59', '2024-09-09 03:13:59'),
(116, 'e0a31f65-3b38-43ad-9de7-f23eb8a294fe', 14, 0, 'Zee', 'Zee', 'Zee', 'Zee', 'Zee', 'uploads/meta/1725851661-N0JYvKCSpB.png', '2024-09-09 03:14:21', '2024-09-09 03:14:21'),
(117, 'fe696d27-ac06-4f45-a449-a751a1a61417', 14, 0, '105', '105', '105', '105', '105', 'uploads/meta/1725851679-1IajTa0aPb.png', '2024-09-09 03:14:39', '2024-09-09 03:14:39'),
(118, 'd6c78762-5259-4c64-9d26-f0233371a59f', 14, 99, 'Bielas', 'Bielas', 'Bielas', 'Bielas', 'Bielas', NULL, '2024-09-09 03:17:21', '2024-09-09 03:17:21'),
(119, '88151b1a-8071-45e5-88b2-723b3d74ec1d', 14, 111, 'Bottom', 'Bottom', 'Bottom', 'Bottom', 'Bottom', NULL, '2024-09-09 03:19:19', '2024-09-09 03:19:19'),
(120, '96a2bf01-0b47-4891-88ef-990b3509aead', 14, 102, 'Bottom', 'Bottom', 'Bottom', 'Bottom', 'Bottom', NULL, '2024-09-09 03:19:37', '2024-09-09 03:19:37'),
(121, '5bcacfdb-4039-40ed-aef0-c2a14779a0fe', 14, 103, 'Cadena', 'Cadena', 'Cadena', 'Cadena', 'Cadena', NULL, '2024-09-09 03:20:06', '2024-09-09 03:20:06'),
(122, '1721aeae-72d9-4759-aa4b-68c20c911a9a', 14, 100, 'Cadena', 'Cadena', 'Cadena', 'Cadena', 'Cadena', NULL, '2024-09-09 03:20:28', '2024-09-09 03:20:28'),
(123, '8b33669b-fb60-4d27-afc8-d210f0794adc', 14, 117, 'Cadena', 'Cadena', 'Cadena', 'Cadena', 'Cadena', NULL, '2024-09-09 03:20:44', '2024-09-09 03:20:44'),
(124, 'f07fe00a-a9cf-421d-a680-2c69095b7a49', 14, 108, 'Cadena', 'Cadena', 'Cadena', 'Cadena', 'Cadena', NULL, '2024-09-09 03:21:45', '2024-09-09 03:21:45'),
(125, 'af4527a9-d37e-46b3-9653-ced0d5d53812', 14, 99, 'Cadena', 'Cadena', 'Cadena', 'Cadena', 'Cadena', NULL, '2024-09-09 03:22:01', '2024-09-09 03:22:01'),
(126, '3f3b2aff-7591-4773-8781-14d7d434334d', 14, 113, 'Caja Trasera', 'Caja-Trasera', 'Caja Trasera', 'Caja Trasera', 'Caja Trasera', NULL, '2024-09-09 03:22:31', '2024-09-09 03:22:31'),
(127, '6fb1b961-358c-4db0-8128-c6767350ad45', 14, 111, 'Caja Trasera', 'Caja-Trasera', 'Caja Trasera', 'Caja Trasera', 'Caja Trasera', NULL, '2024-09-09 03:22:48', '2024-09-09 03:22:48'),
(128, '729b0ded-1ee3-4b7e-b507-1b0b0629f59b', 14, 96, 'Caja Trasera', 'Caja-Trasera', 'Caja Trasera', 'Caja Trasera', 'Caja Trasera', NULL, '2024-09-09 03:23:08', '2024-09-09 03:23:08'),
(129, '09e84941-a652-4031-896c-d73733a142e8', 14, 100, 'Caja Trasera', 'Caja-Trasera', 'Caja Trasera', 'Caja Trasera', 'Caja Trasera', NULL, '2024-09-09 03:23:40', '2024-09-09 03:23:40'),
(130, 'ccaf40ec-6668-4d14-8d56-e5010c335514', 14, 108, 'Caja Trasera', 'Caja-Trasera', 'Caja Trasera', 'Caja Trasera', 'Caja Trasera', NULL, '2024-09-09 03:23:56', '2024-09-09 03:23:56'),
(131, '6a859046-2550-47f9-b565-3affd66f47d4', 14, 104, 'Caja Trasera', 'Caja-Trasera', 'Caja Trasera', 'Caja Trasera', 'Caja Trasera', NULL, '2024-09-09 03:24:13', '2024-09-09 03:24:13'),
(132, '4a7af059-c7d9-4a0e-b1bb-13ef958a08ec', 14, 112, 'Caliper', 'Caliper', 'Caliper', 'Caliper', 'Caliper', NULL, '2024-09-09 03:24:41', '2024-09-09 03:24:41'),
(133, 'cb34697c-6f20-4b6a-a2b1-5c220a1feaf3', 14, 113, 'Chicharra', 'Chicharra', 'Chicharra', 'Chicharra', 'Chicharra', NULL, '2024-09-09 03:25:07', '2024-09-09 03:25:07'),
(134, 'ca8cffb2-4b1f-4140-baba-938e0142774a', 14, 99, 'Chicharra', 'Chicharra', 'Chicharra', 'Chicharra', 'Chicharra', NULL, '2024-09-09 03:25:28', '2024-09-09 03:25:28'),
(135, 'ac35540a-fb1b-42ad-b34f-4a26c472ac8b', 14, 100, 'Chicharra', 'Chicharra', 'Chicharra', 'Chicharra', 'Chicharra', NULL, '2024-09-09 03:26:40', '2024-09-09 03:26:40'),
(136, '733f8de7-9e72-47de-a1ff-5f335a3ced28', 14, 108, 'Chicharra', 'Chicharra', 'Chicharra', 'Chicharra', 'Chicharra', NULL, '2024-09-09 03:26:59', '2024-09-09 03:26:59'),
(137, '89929cf6-1d04-4cf3-9e4e-3c21ba05f542', 14, 104, 'Chicharra', 'Chicharra', 'Chicharra', 'Chicharra', 'Chicharra', NULL, '2024-09-09 03:27:26', '2024-09-09 03:27:26'),
(138, '03743e4c-6a73-4613-88d3-f480e5203ebd', 14, 117, 'Chicharra', 'Chicharra', 'Chicharra', 'Chicharra', 'Chicharra', NULL, '2024-09-09 03:27:41', '2024-09-09 03:27:41'),
(139, 'fea68273-dbe0-49f9-8da3-7e2c0589f11b', 14, 111, 'Descarrilador', 'Descarrilador', 'Descarrilador', 'Descarrilador', 'Descarrilador', NULL, '2024-09-09 03:28:16', '2024-09-09 03:28:16'),
(140, 'a538c021-fd02-49ef-80d7-6ae525425fdf', 14, 99, 'Descarrilador', 'Descarrilador', 'Descarrilador', 'Descarrilador', 'Descarrilador', NULL, '2024-09-09 03:28:33', '2024-09-09 03:28:33'),
(141, '24745557-39ee-47ae-99de-315a95f0bce4', 14, 100, 'Descarrilador', 'Descarrilador', 'Descarrilador', 'Descarrilador', 'Descarrilador', NULL, '2024-09-09 03:28:54', '2024-09-09 03:28:54'),
(142, '3296a360-7eb8-4d5b-9379-9070d01bef75', 14, 109, 'Descarrilador', 'Descarrilador', 'Descarrilador', 'Descarrilador', 'Descarrilador', NULL, '2024-09-09 03:29:13', '2024-09-09 03:29:13'),
(143, '03cb6e38-2217-481f-bbfa-13b0278787fd', 14, 110, 'Descarrilador', 'Descarrilador', 'Descarrilador', 'Descarrilador', 'Descarrilador', NULL, '2024-09-09 03:29:32', '2024-09-09 03:29:32'),
(144, 'c22c2ff5-3f49-4e91-8445-5d9d6851c453', 14, 96, 'Disco de Freno', 'Disco-de-Freno', 'Disco de Freno', 'Disco de Freno', 'Disco de Freno', NULL, '2024-09-09 03:29:59', '2024-09-09 03:29:59'),
(145, '542aafe5-2331-4a22-9d14-96a32862e4a9', 14, 100, 'Frenos', 'Frenos', 'Frenos', 'Frenos', 'Frenos', NULL, '2024-09-09 03:30:31', '2024-09-09 03:30:31'),
(146, 'c525bdc9-20ee-4765-8216-0a6bfed98e74', 14, 108, 'Frenos', 'Frenos', 'Frenos', 'Frenos', 'Frenos', NULL, '2024-09-09 03:30:55', '2024-09-09 03:30:55'),
(147, 'f6134bae-bf16-4d86-87dc-1bb8309410b2', 14, 104, 'Frenos', 'Frenos', 'Frenos', 'Frenos', 'Frenos', NULL, '2024-09-09 03:31:13', '2024-09-09 03:31:13'),
(148, '224f8d14-fc50-4131-bf6a-8abdfde214fd', 14, 109, 'Frenos', 'Frenos', 'Frenos', 'Frenos', 'Frenos', NULL, '2024-09-09 03:31:32', '2024-09-09 03:31:32'),
(149, 'c85626e8-e89a-49f9-8248-6dca2f705876', 14, 106, 'Cadena', 'Cadena', 'Cadena', 'Cadena', 'Cadena', NULL, '2024-09-09 03:32:50', '2024-09-09 03:32:50'),
(150, 'f1f4fd6e-7f80-424c-a35b-6044b9f37a86', 14, 104, 'Plato', 'Plato', 'Plato', 'Plato', 'Plato', NULL, '2024-09-09 03:33:23', '2024-09-09 03:33:23'),
(151, '6295bdc5-3535-4e46-826e-ffe8f926fd64', 14, 115, 'Roldanas', 'Roldanas', 'Roldanas', 'Roldanas', 'Roldanas', NULL, '2024-09-09 03:33:45', '2024-09-09 03:33:45'),
(152, '13f4cb6e-d3df-4893-a730-9f38f571f477', 14, 113, 'Shifter', 'Shifter', 'Shifter', 'Shifter', 'Shifter', NULL, '2024-09-09 03:34:07', '2024-09-09 03:34:07'),
(153, '5c9c2ae6-b59c-4382-b640-d106146fe3fe', 14, 111, 'Shifter', 'Shifter', 'Shifter', 'Shifter', 'Shifter', NULL, '2024-09-09 03:34:25', '2024-09-09 03:34:25'),
(154, 'f657b71b-cb83-4a7b-8522-f411f161cb2b', 14, 97, 'Shifter', 'Shifter', 'Shifter', 'Shifter', 'Shifter', NULL, '2024-09-09 03:34:41', '2024-09-09 03:34:41'),
(155, '30fe2da3-1ce5-4abb-b050-fcf68c1537cc', 14, 96, 'Shifter', 'Shifter', 'Shifter', 'Shifter', 'Shifter', NULL, '2024-09-09 03:34:56', '2024-09-09 03:34:56'),
(156, '4cad675b-5991-4acd-8c6d-384b9bfed952', 14, 99, 'Shifter', 'Shifter', 'Shifter', 'Shifter', 'Shifter', NULL, '2024-09-09 03:35:16', '2024-09-09 03:35:16'),
(157, '34671d9d-ab2f-41d7-a5f7-e4c8e7d3913f', 14, 102, 'Shifter', 'Shifter', 'Shifter', 'Shifter', 'Shifter', NULL, '2024-09-09 03:35:30', '2024-09-09 03:35:30'),
(158, 'a7911c7e-2450-42c7-a132-801551fe39a2', 14, 108, 'Shifter', 'Shifter', 'Shifter', 'Shifter', 'Shifter', NULL, '2024-09-09 03:35:46', '2024-09-09 03:35:46'),
(159, 'd729c683-65bc-40cc-a5fb-a17400932879', 14, 116, 'Shifter', 'Shifter', 'Shifter', 'Shifter', 'Shifter', NULL, '2024-09-09 03:36:01', '2024-09-09 03:36:01'),
(160, 'd0916ebd-4720-4730-9ee4-47e6ab111994', 14, 0, 'B2', 'B2', NULL, NULL, NULL, 'uploads/meta/1725892864-f9VulAZE1l.png', '2024-09-09 14:40:22', '2024-09-09 14:41:04'),
(161, '48465c50-7487-4282-951e-4a31bb59f5cc', 30, 0, 'Rio Seco', 'Rio-Seco', 'Rio Seco', 'Rio Seco', 'Rio Seco', 'uploads/meta/1726332197-c0c1DZlmry.jpg', '2024-09-14 16:43:17', '2024-09-14 16:43:17'),
(162, '52a42c6d-0964-496a-b7ca-f7a9c0b3623f', 30, 161, 'Sucursal 1', 'Sucursal-1', 'Sucursal 1', 'Sucursal 1', 'Sucursal 1', NULL, '2024-09-14 16:43:32', '2024-09-14 16:43:32'),
(163, '368e9bc2-83a4-40fe-bfe7-1255df3a57c4', 14, 112, 'Shifter', 'Shifter', 'Shifter', 'Shifter', 'Shifter', NULL, '2024-09-17 22:45:07', '2024-09-17 22:45:07');

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
(1, 'Where can I see the status of my refund?', 'In the Refund Status column you can see the date your refund request was submitted or when it was processed.', '2022-12-04 17:05:33', '2024-06-09 01:10:31'),
(2, 'When will I receive my refund?', 'Refund requests are submitted immediately to your payment processor or financial institution after Udemy has received and processed your request. It may take  5 to 10 business days or longer to post the funds in your account, depending on your financial institution or location.', '2022-12-04 17:05:33', '2024-06-09 01:10:31'),
(3, 'Why was my refund request denied?', 'All eligible courses purchased on Udemy can be refunded within 30 days, provided the request meets the guidelines in our refund policy.', '2022-12-04 17:05:33', '2024-06-09 01:10:31'),
(4, 'What is a “credit refund”?', 'In cases where a transaction is not eligible for a refund to your original payment method, the refund will be granted using LMSZAI Credit', '2022-12-04 17:05:33', '2024-06-09 01:10:31'),
(5, 'Where can I see the status of my refund?', 'In the Refund Status column you can see the date your refund request was submitted or when it was processed.', '2022-12-04 17:05:33', '2024-06-09 01:10:31'),
(6, 'When will I receive my refund?', 'Refund requests are submitted immediately to your payment processor or financial institution after Udemy has received and processed your request. It may take  5 to 10 business days or longer to post the funds in your account, depending on your financial institution or location.', '2022-12-04 17:05:33', '2024-06-09 01:10:31'),
(7, 'Why was my refund request denied?', 'All eligible courses purchased on Udemy can be refunded within 30 days, provided the request meets the guidelines in our refund policy.', '2022-12-04 17:05:33', '2024-06-09 01:10:31'),
(8, 'What is a “credit refund”?', 'In cases where a transaction is not eligible for a refund to your original payment method, the refund will be granted using LMSZAI Credit', '2022-12-04 17:05:33', '2024-06-09 01:10:31');

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
(2, '3531867a-fcda-4185-bf5d-8fda554cc86e', 'Important', '2024-06-07 07:39:04', '2024-06-07 07:39:04');

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

-- --------------------------------------------------------

--
-- Table structure for table `time_logs`
--

CREATE TABLE `time_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_logs`
--

INSERT INTO `time_logs` (`id`, `user_id`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 33, '2024-07-06 09:31:31', '2024-07-06 15:34:14', '2024-07-06 09:31:31', '2024-07-06 09:31:31'),
(2, 32, '2024-07-06 10:12:13', '2024-07-06 10:25:27', '2024-07-06 10:12:13', '2024-07-06 10:25:27'),
(3, 33, '2024-07-07 06:23:22', '2024-07-07 06:24:19', '2024-07-07 06:23:22', '2024-07-07 06:24:19'),
(4, 33, '2024-07-07 06:27:24', '2024-07-07 06:34:39', '2024-07-07 06:27:24', '2024-07-07 06:34:39'),
(5, 33, '2024-07-07 06:38:22', NULL, '2024-07-07 06:38:22', '2024-07-07 06:38:22'),
(6, 33, '2024-07-07 06:51:57', '2024-07-07 07:26:31', '2024-07-07 06:51:57', '2024-07-07 07:26:31'),
(7, 32, '2024-07-07 07:29:05', '2024-07-07 08:09:37', '2024-07-07 07:29:05', '2024-07-07 08:09:37'),
(8, 33, '2024-07-07 07:33:45', '2024-07-07 07:36:02', '2024-07-07 07:33:45', '2024-07-07 07:36:02'),
(9, 33, '2024-07-07 07:44:58', '2024-07-07 07:48:09', '2024-07-07 07:44:58', '2024-07-07 07:48:09'),
(10, 33, '2024-07-07 08:09:27', NULL, '2024-07-07 08:09:27', '2024-07-07 08:09:27'),
(11, 33, '2024-07-07 08:09:52', NULL, '2024-07-07 08:09:52', '2024-07-07 08:09:52'),
(12, 33, '2024-07-07 09:07:12', '2024-07-07 13:09:21', '2024-07-07 09:07:12', '2024-07-07 13:09:21'),
(13, 33, '2024-07-07 15:13:00', '2024-07-07 15:14:29', '2024-07-07 15:13:00', '2024-07-07 15:14:29'),
(14, 33, '2024-07-07 15:28:51', NULL, '2024-07-07 15:28:51', '2024-07-07 15:28:51'),
(15, 33, '2024-07-07 16:06:19', NULL, '2024-07-07 16:06:19', '2024-07-07 16:06:19'),
(16, 32, '2024-07-07 16:10:12', NULL, '2024-07-07 16:10:12', '2024-07-07 16:10:12'),
(17, 33, '2024-07-08 03:56:27', NULL, '2024-07-08 03:56:27', '2024-07-08 03:56:27'),
(18, 33, '2024-07-08 04:53:15', '2024-07-08 04:56:45', '2024-07-08 04:53:15', '2024-07-08 04:56:45'),
(19, 33, '2024-07-08 05:01:39', NULL, '2024-07-08 05:01:39', '2024-07-08 05:01:39'),
(20, 33, '2024-07-08 07:57:51', NULL, '2024-07-08 07:57:51', '2024-07-08 07:57:51'),
(21, 40, '2024-07-08 12:02:51', NULL, '2024-07-08 12:02:51', '2024-07-08 12:02:51'),
(22, 33, '2024-07-08 16:56:36', NULL, '2024-07-08 16:56:36', '2024-07-08 16:56:36'),
(23, 40, '2024-07-08 17:44:31', '2024-07-08 17:52:04', '2024-07-08 17:44:31', '2024-07-08 17:52:04'),
(24, 33, '2024-07-09 01:35:56', NULL, '2024-07-09 01:35:56', '2024-07-09 01:35:56'),
(25, 33, '2024-07-09 05:41:21', NULL, '2024-07-09 05:41:21', '2024-07-09 05:41:21'),
(26, 33, '2024-07-09 15:19:51', NULL, '2024-07-09 15:19:51', '2024-07-09 15:19:51'),
(27, 33, '2024-07-09 20:42:28', NULL, '2024-07-09 20:42:28', '2024-07-09 20:42:28'),
(28, 33, '2024-07-10 04:03:30', NULL, '2024-07-10 04:03:30', '2024-07-10 04:03:30'),
(29, 33, '2024-07-10 07:38:50', '2024-07-10 07:41:54', '2024-07-10 07:38:50', '2024-07-10 07:41:54'),
(30, 44, '2024-07-10 07:59:46', NULL, '2024-07-10 07:59:46', '2024-07-10 07:59:46'),
(31, 33, '2024-07-10 09:24:30', NULL, '2024-07-10 09:24:30', '2024-07-10 09:24:30'),
(32, 40, '2024-07-10 13:28:14', NULL, '2024-07-10 13:28:14', '2024-07-10 13:28:14'),
(33, 44, '2024-07-10 14:24:03', NULL, '2024-07-10 14:24:03', '2024-07-10 14:24:03'),
(34, 40, '2024-07-10 15:02:07', NULL, '2024-07-10 15:02:07', '2024-07-10 15:02:07'),
(35, 40, '2024-07-10 17:39:35', NULL, '2024-07-10 17:39:35', '2024-07-10 17:39:35'),
(36, 44, '2024-07-11 00:37:43', NULL, '2024-07-11 00:37:43', '2024-07-11 00:37:43'),
(37, 33, '2024-07-11 05:01:07', '2024-07-11 06:13:18', '2024-07-11 05:01:07', '2024-07-11 06:13:18'),
(38, 34, '2024-07-11 06:15:36', NULL, '2024-07-11 06:15:36', '2024-07-11 06:15:36'),
(39, 33, '2024-07-11 15:42:40', NULL, '2024-07-11 15:42:40', '2024-07-11 15:42:40'),
(40, 44, '2024-07-11 20:30:30', NULL, '2024-07-11 20:30:30', '2024-07-11 20:30:30'),
(41, 33, '2024-07-11 22:21:11', NULL, '2024-07-11 22:21:11', '2024-07-11 22:21:11'),
(42, 44, '2024-07-12 02:13:40', NULL, '2024-07-12 02:13:40', '2024-07-12 02:13:40'),
(43, 33, '2024-07-12 03:00:42', '2024-07-12 03:01:19', '2024-07-12 03:00:42', '2024-07-12 03:01:19'),
(44, 34, '2024-07-12 03:02:38', NULL, '2024-07-12 03:02:38', '2024-07-12 03:02:38'),
(45, 33, '2024-07-13 01:42:37', NULL, '2024-07-13 01:42:37', '2024-07-13 01:42:37'),
(46, 34, '2024-07-13 11:28:22', '2024-07-13 13:03:05', '2024-07-13 11:28:22', '2024-07-13 13:03:05'),
(47, 33, '2024-07-13 13:03:17', NULL, '2024-07-13 13:03:17', '2024-07-13 13:03:17'),
(48, 33, '2024-07-13 17:09:18', NULL, '2024-07-13 17:09:18', '2024-07-13 17:09:18'),
(49, 40, '2024-07-13 23:09:49', NULL, '2024-07-13 23:09:49', '2024-07-13 23:09:49'),
(50, 44, '2024-07-13 23:29:10', NULL, '2024-07-13 23:29:10', '2024-07-13 23:29:10'),
(51, 34, '2024-07-14 03:27:22', NULL, '2024-07-14 03:27:22', '2024-07-14 03:27:22'),
(52, 44, '2024-07-14 07:02:27', NULL, '2024-07-14 07:02:27', '2024-07-14 07:02:27'),
(53, 34, '2024-07-15 03:05:01', '2024-07-15 04:58:58', '2024-07-15 03:05:01', '2024-07-15 04:58:58'),
(54, 40, '2024-07-15 04:24:48', NULL, '2024-07-15 04:24:48', '2024-07-15 04:24:48'),
(55, 44, '2024-07-15 04:41:12', NULL, '2024-07-15 04:41:12', '2024-07-15 04:41:12'),
(56, 34, '2024-07-15 06:15:22', NULL, '2024-07-15 06:15:22', '2024-07-15 06:15:22'),
(57, 34, '2024-07-15 09:03:49', NULL, '2024-07-15 09:03:49', '2024-07-15 09:03:49'),
(58, 44, '2024-07-15 13:23:17', '2024-07-15 14:09:44', '2024-07-15 13:23:17', '2024-07-15 14:09:44'),
(59, 34, '2024-07-16 09:09:53', NULL, '2024-07-16 09:09:53', '2024-07-16 09:09:53'),
(60, 33, '2024-07-16 15:22:44', NULL, '2024-07-16 15:22:44', '2024-07-16 15:22:44'),
(61, 33, '2024-07-16 15:22:44', NULL, '2024-07-16 15:22:44', '2024-07-16 15:22:44'),
(62, 33, '2024-07-16 21:54:22', '2024-07-16 22:33:22', '2024-07-16 21:54:22', '2024-07-16 22:33:22'),
(63, 40, '2024-07-16 21:56:53', NULL, '2024-07-16 21:56:53', '2024-07-16 21:56:53'),
(64, 44, '2024-07-16 22:42:31', NULL, '2024-07-16 22:42:31', '2024-07-16 22:42:31'),
(65, 34, '2024-07-17 00:11:30', NULL, '2024-07-17 00:11:30', '2024-07-17 00:11:30'),
(66, 40, '2024-07-17 00:58:25', NULL, '2024-07-17 00:58:25', '2024-07-17 00:58:25'),
(67, 44, '2024-07-17 02:40:03', '2024-07-17 02:52:36', '2024-07-17 02:40:03', '2024-07-17 02:52:36'),
(68, 44, '2024-07-17 02:52:39', '2024-07-17 02:53:16', '2024-07-17 02:52:39', '2024-07-17 02:53:16'),
(69, 44, '2024-07-17 02:53:19', '2024-07-17 02:53:28', '2024-07-17 02:53:19', '2024-07-17 02:53:28'),
(70, 33, '2024-07-17 03:06:46', '2024-07-17 03:10:27', '2024-07-17 03:06:46', '2024-07-17 03:10:27'),
(71, 33, '2024-07-17 03:10:51', '2024-07-17 03:18:46', '2024-07-17 03:10:51', '2024-07-17 03:18:46'),
(72, 34, '2024-07-17 06:22:00', NULL, '2024-07-17 06:22:00', '2024-07-17 06:22:00'),
(73, 40, '2024-07-17 12:00:50', NULL, '2024-07-17 12:00:50', '2024-07-17 12:00:50'),
(74, 34, '2024-07-17 13:38:53', NULL, '2024-07-17 13:38:53', '2024-07-17 13:38:53'),
(75, 34, '2024-07-17 14:04:55', NULL, '2024-07-17 14:04:55', '2024-07-17 14:04:55'),
(76, 40, '2024-07-17 15:58:20', NULL, '2024-07-17 15:58:20', '2024-07-17 15:58:20'),
(77, 44, '2024-07-18 19:19:29', '2024-07-18 19:50:41', '2024-07-18 19:19:29', '2024-07-18 19:50:41'),
(78, 40, '2024-07-18 19:39:19', NULL, '2024-07-18 19:39:19', '2024-07-18 19:39:19'),
(79, 44, '2024-07-18 20:04:18', '2024-07-18 20:05:05', '2024-07-18 20:04:18', '2024-07-18 20:05:05'),
(80, 33, '2024-07-18 20:13:53', '2024-07-18 20:14:36', '2024-07-18 20:13:53', '2024-07-18 20:14:36'),
(81, 33, '2024-07-18 20:14:39', '2024-07-18 20:14:52', '2024-07-18 20:14:39', '2024-07-18 20:14:52'),
(82, 44, '2024-07-18 20:17:45', '2024-07-18 20:22:39', '2024-07-18 20:17:45', '2024-07-18 20:22:39'),
(83, 34, '2024-07-19 05:19:15', '2024-07-19 05:22:33', '2024-07-19 05:19:15', '2024-07-19 05:22:33'),
(84, 34, '2024-07-19 05:25:49', NULL, '2024-07-19 05:25:49', '2024-07-19 05:25:49'),
(85, 33, '2024-07-19 15:54:54', '2024-07-19 16:39:01', '2024-07-19 15:54:54', '2024-07-19 16:39:01'),
(86, 33, '2024-07-19 16:39:52', '2024-07-19 16:40:27', '2024-07-19 16:39:52', '2024-07-19 16:40:27'),
(87, 33, '2024-07-19 16:43:11', NULL, '2024-07-19 16:43:11', '2024-07-19 16:43:11'),
(88, 33, '2024-07-20 03:06:32', NULL, '2024-07-20 03:06:32', '2024-07-20 03:06:32'),
(89, 34, '2024-07-20 04:52:31', NULL, '2024-07-20 04:52:31', '2024-07-20 04:52:31'),
(90, 33, '2024-07-20 11:01:22', NULL, '2024-07-20 11:01:22', '2024-07-20 11:01:22'),
(91, 34, '2024-07-20 11:24:13', NULL, '2024-07-20 11:24:13', '2024-07-20 11:24:13'),
(92, 33, '2024-07-20 11:37:45', NULL, '2024-07-20 11:37:45', '2024-07-20 11:37:45'),
(93, 40, '2024-07-20 14:46:40', NULL, '2024-07-20 14:46:40', '2024-07-20 14:46:40'),
(94, 34, '2024-07-21 03:00:00', NULL, '2024-07-21 03:00:00', '2024-07-21 03:00:00'),
(95, 33, '2024-07-21 17:07:19', NULL, '2024-07-21 17:07:19', '2024-07-21 17:07:19'),
(96, 34, '2024-07-22 08:45:41', NULL, '2024-07-22 08:45:41', '2024-07-22 08:45:41'),
(97, 34, '2024-07-22 09:07:42', NULL, '2024-07-22 09:07:42', '2024-07-22 09:07:42'),
(98, 34, '2024-07-22 13:32:06', NULL, '2024-07-22 13:32:06', '2024-07-22 13:32:06'),
(99, 34, '2024-07-22 13:39:42', NULL, '2024-07-22 13:39:42', '2024-07-22 13:39:42'),
(100, 34, '2024-07-22 13:50:22', NULL, '2024-07-22 13:50:22', '2024-07-22 13:50:22'),
(101, 34, '2024-07-22 13:59:42', '2024-07-22 14:00:10', '2024-07-22 13:59:42', '2024-07-22 14:00:10'),
(102, 34, '2024-07-22 14:01:36', NULL, '2024-07-22 14:01:36', '2024-07-22 14:01:36'),
(103, 34, '2024-07-22 14:12:45', NULL, '2024-07-22 14:12:45', '2024-07-22 14:12:45'),
(104, 34, '2024-07-22 14:21:29', NULL, '2024-07-22 14:21:29', '2024-07-22 14:21:29'),
(105, 34, '2024-07-22 14:38:51', NULL, '2024-07-22 14:38:51', '2024-07-22 14:38:51'),
(106, 34, '2024-07-22 14:51:56', NULL, '2024-07-22 14:51:56', '2024-07-22 14:51:56'),
(107, 34, '2024-07-22 15:03:29', NULL, '2024-07-22 15:03:29', '2024-07-22 15:03:29'),
(108, 34, '2024-07-22 15:09:17', NULL, '2024-07-22 15:09:17', '2024-07-22 15:09:17'),
(109, 34, '2024-07-22 15:20:16', NULL, '2024-07-22 15:20:16', '2024-07-22 15:20:16'),
(110, 34, '2024-07-22 15:24:24', NULL, '2024-07-22 15:24:24', '2024-07-22 15:24:24'),
(111, 34, '2024-07-22 15:35:47', '2024-07-22 15:35:59', '2024-07-22 15:35:47', '2024-07-22 15:35:59'),
(112, 34, '2024-07-22 15:40:01', NULL, '2024-07-22 15:40:01', '2024-07-22 15:40:01'),
(113, 34, '2024-07-22 15:51:51', NULL, '2024-07-22 15:51:51', '2024-07-22 15:51:51'),
(114, 34, '2024-07-22 16:11:30', NULL, '2024-07-22 16:11:30', '2024-07-22 16:11:30'),
(115, 34, '2024-07-22 16:18:20', NULL, '2024-07-22 16:18:20', '2024-07-22 16:18:20'),
(116, 34, '2024-07-22 16:24:23', NULL, '2024-07-22 16:24:23', '2024-07-22 16:24:23'),
(117, 33, '2024-07-22 21:17:46', NULL, '2024-07-22 21:17:46', '2024-07-22 21:17:46'),
(118, 40, '2024-07-23 02:00:14', NULL, '2024-07-23 02:00:14', '2024-07-23 02:00:14'),
(119, 40, '2024-07-23 02:24:24', NULL, '2024-07-23 02:24:24', '2024-07-23 02:24:24'),
(120, 34, '2024-07-23 07:12:28', NULL, '2024-07-23 07:12:28', '2024-07-23 07:12:28'),
(121, 34, '2024-07-23 07:52:13', '2024-07-23 07:53:17', '2024-07-23 07:52:13', '2024-07-23 07:53:17'),
(122, 34, '2024-07-23 08:04:24', '2024-07-23 08:06:20', '2024-07-23 08:04:24', '2024-07-23 08:06:20'),
(123, 33, '2024-07-23 09:06:48', '2024-07-23 09:08:47', '2024-07-23 09:06:48', '2024-07-23 09:08:47'),
(124, 34, '2024-07-23 09:10:25', '2024-07-23 09:11:30', '2024-07-23 09:10:25', '2024-07-23 09:11:30'),
(125, 40, '2024-07-23 16:18:43', '2024-07-23 16:19:44', '2024-07-23 16:18:43', '2024-07-23 16:19:44'),
(126, 33, '2024-07-23 16:54:20', '2024-07-23 16:55:03', '2024-07-23 16:54:20', '2024-07-23 16:55:03'),
(127, 40, '2024-07-23 17:11:32', '2024-07-23 17:13:23', '2024-07-23 17:11:32', '2024-07-23 17:13:23'),
(128, 40, '2024-07-23 21:42:33', '2024-07-23 21:44:12', '2024-07-23 21:42:33', '2024-07-23 21:44:12'),
(129, 41, '2024-07-24 03:58:45', '2024-07-24 03:59:50', '2024-07-24 03:58:45', '2024-07-24 03:59:50'),
(130, 40, '2024-07-26 14:02:11', '2024-07-26 14:05:52', '2024-07-26 14:02:11', '2024-07-26 14:05:52'),
(131, 40, '2024-07-26 14:05:57', '2024-07-26 14:08:51', '2024-07-26 14:05:57', '2024-07-26 14:08:51'),
(132, 40, '2024-07-26 14:08:57', '2024-07-26 14:10:06', '2024-07-26 14:08:57', '2024-07-26 14:10:06'),
(133, 40, '2024-07-26 14:10:32', '2024-07-26 14:12:06', '2024-07-26 14:10:32', '2024-07-26 14:12:06'),
(134, 40, '2024-07-26 23:37:08', '2024-07-26 23:41:02', '2024-07-26 23:37:08', '2024-07-26 23:41:02'),
(135, 40, '2024-07-26 23:41:53', '2024-07-26 23:43:08', '2024-07-26 23:41:53', '2024-07-26 23:43:08'),
(136, 34, '2024-07-27 04:02:24', '2024-07-27 04:04:14', '2024-07-27 04:02:24', '2024-07-27 04:04:14'),
(137, 34, '2024-07-27 04:07:24', '2024-07-27 04:09:05', '2024-07-27 04:07:24', '2024-07-27 04:09:05'),
(138, 34, '2024-07-27 04:11:34', '2024-07-27 04:12:47', '2024-07-27 04:11:34', '2024-07-27 04:12:47'),
(139, 33, '2024-07-27 04:16:16', '2024-07-27 04:18:05', '2024-07-27 04:16:16', '2024-07-27 04:18:05'),
(140, 33, '2024-07-27 04:19:18', '2024-07-27 04:20:36', '2024-07-27 04:19:18', '2024-07-27 04:20:36'),
(141, 33, '2024-07-27 04:24:50', '2024-07-27 04:26:32', '2024-07-27 04:24:50', '2024-07-27 04:26:32'),
(142, 33, '2024-07-27 04:26:48', '2024-07-27 04:27:55', '2024-07-27 04:26:48', '2024-07-27 04:27:55'),
(143, 33, '2024-07-27 04:29:49', '2024-07-27 04:31:25', '2024-07-27 04:29:49', '2024-07-27 04:31:25'),
(144, 34, '2024-07-27 04:37:42', '2024-07-27 04:39:03', '2024-07-27 04:37:42', '2024-07-27 04:39:03'),
(145, 34, '2024-07-27 04:42:02', '2024-07-27 04:43:24', '2024-07-27 04:42:02', '2024-07-27 04:43:24'),
(146, 34, '2024-07-27 04:50:04', '2024-07-27 04:51:23', '2024-07-27 04:50:04', '2024-07-27 04:51:23'),
(147, 40, '2024-07-27 14:20:25', '2024-07-27 14:22:45', '2024-07-27 14:20:25', '2024-07-27 14:22:45'),
(148, 34, '2024-07-29 14:50:50', '2024-07-29 14:52:43', '2024-07-29 14:50:50', '2024-07-29 14:52:43'),
(149, 34, '2024-07-29 14:54:43', NULL, '2024-07-29 14:54:43', '2024-07-29 14:54:43'),
(150, 33, '2024-07-29 15:12:19', NULL, '2024-07-29 15:12:19', '2024-07-29 15:12:19'),
(151, 33, '2024-07-29 17:45:59', '2024-07-29 18:45:03', '2024-07-29 17:45:59', '2024-07-29 18:45:03'),
(152, 33, '2024-07-29 18:45:07', '2024-07-29 18:45:19', '2024-07-29 18:45:07', '2024-07-29 18:45:19'),
(153, 44, '2024-07-29 18:45:30', '2024-07-29 18:48:14', '2024-07-29 18:45:30', '2024-07-29 18:48:14'),
(154, 40, '2024-07-29 19:04:58', NULL, '2024-07-29 19:04:58', '2024-07-29 19:04:58'),
(155, 40, '2024-07-29 19:08:18', NULL, '2024-07-29 19:08:18', '2024-07-29 19:08:18'),
(156, 40, '2024-07-29 20:16:48', NULL, '2024-07-29 20:16:48', '2024-07-29 20:16:48'),
(157, 34, '2024-07-30 04:41:07', '2024-07-30 05:32:08', '2024-07-30 04:41:07', '2024-07-30 05:32:08'),
(158, 34, '2024-07-30 05:43:18', '2024-07-30 06:17:10', '2024-07-30 05:43:18', '2024-07-30 06:17:10'),
(159, 34, '2024-07-30 06:31:55', '2024-07-30 06:41:06', '2024-07-30 06:31:55', '2024-07-30 06:41:06'),
(160, 34, '2024-07-30 06:45:11', '2024-07-30 06:46:42', '2024-07-30 06:45:11', '2024-07-30 06:46:42'),
(161, 34, '2024-07-30 06:52:22', '2024-07-30 06:54:15', '2024-07-30 06:52:22', '2024-07-30 06:54:15'),
(162, 34, '2024-07-30 07:03:40', '2024-07-30 07:05:01', '2024-07-30 07:03:40', '2024-07-30 07:05:01'),
(163, 34, '2024-07-30 07:07:56', '2024-07-30 07:09:01', '2024-07-30 07:07:56', '2024-07-30 07:09:01'),
(164, 34, '2024-07-30 07:11:03', '2024-07-30 07:12:07', '2024-07-30 07:11:03', '2024-07-30 07:12:07'),
(165, 34, '2024-07-30 07:21:07', '2024-07-30 07:26:37', '2024-07-30 07:21:07', '2024-07-30 07:26:37'),
(166, 34, '2024-07-30 07:46:32', '2024-07-30 08:09:03', '2024-07-30 07:46:32', '2024-07-30 08:09:03'),
(167, 40, '2024-08-03 02:02:53', '2024-08-03 02:04:25', '2024-08-03 02:02:53', '2024-08-03 02:04:25'),
(168, 40, '2024-08-03 02:10:22', '2024-08-03 02:12:36', '2024-08-03 02:10:22', '2024-08-03 02:12:36'),
(169, 40, '2024-08-03 13:57:13', '2024-08-03 13:58:18', '2024-08-03 13:57:13', '2024-08-03 13:58:18'),
(170, 40, '2024-08-03 13:58:35', NULL, '2024-08-03 13:58:35', '2024-08-03 13:58:35'),
(171, 40, '2024-08-03 15:48:25', '2024-08-03 16:03:37', '2024-08-03 15:48:25', '2024-08-03 16:03:37'),
(172, 44, '2024-08-03 15:48:44', '2024-08-03 15:52:01', '2024-08-03 15:48:44', '2024-08-03 15:52:01'),
(173, 33, '2024-08-03 15:53:55', '2024-08-03 15:55:35', '2024-08-03 15:53:55', '2024-08-03 15:55:35'),
(174, 33, '2024-08-03 15:58:17', '2024-08-03 16:05:22', '2024-08-03 15:58:17', '2024-08-03 16:05:22'),
(175, 40, '2024-08-03 16:07:09', '2024-08-03 16:08:15', '2024-08-03 16:07:09', '2024-08-03 16:08:15'),
(176, 40, '2024-08-03 16:09:10', NULL, '2024-08-03 16:09:10', '2024-08-03 16:09:10'),
(177, 33, '2024-08-05 15:10:07', '2024-08-05 15:16:05', '2024-08-05 15:10:07', '2024-08-05 15:16:05'),
(178, 34, '2024-08-06 06:54:04', '2024-08-06 07:00:52', '2024-08-06 06:54:04', '2024-08-06 07:00:52'),
(179, 34, '2024-08-06 07:03:58', '2024-08-06 07:07:53', '2024-08-06 07:03:58', '2024-08-06 07:07:53'),
(180, 34, '2024-08-06 07:18:28', '2024-08-06 07:32:49', '2024-08-06 07:18:28', '2024-08-06 07:32:49'),
(181, 40, '2024-08-07 20:07:24', '2024-08-07 20:26:41', '2024-08-07 20:07:24', '2024-08-07 20:26:41'),
(182, 44, '2024-08-08 01:01:30', '2024-08-08 01:07:43', '2024-08-08 01:01:30', '2024-08-08 01:07:43'),
(183, 44, '2024-08-08 01:39:28', '2024-08-08 03:34:20', '2024-08-08 01:39:28', '2024-08-08 03:34:20'),
(184, 44, '2024-08-08 03:43:11', '2024-08-08 03:45:13', '2024-08-08 03:43:11', '2024-08-08 03:45:13'),
(185, 44, '2024-08-08 03:50:43', '2024-08-08 03:51:58', '2024-08-08 03:50:43', '2024-08-08 03:51:58'),
(186, 44, '2024-08-08 03:53:46', '2024-08-08 04:08:49', '2024-08-08 03:53:46', '2024-08-08 04:08:49'),
(187, 44, '2024-08-08 13:03:12', '2024-08-08 13:04:20', '2024-08-08 13:03:12', '2024-08-08 13:04:20'),
(188, 33, '2024-08-08 15:11:34', '2024-08-08 15:27:25', '2024-08-08 15:11:34', '2024-08-08 15:27:25'),
(189, 44, '2024-08-10 02:36:39', '2024-08-10 02:37:09', '2024-08-10 02:36:39', '2024-08-10 02:37:09'),
(190, 33, '2024-08-10 02:43:44', '2024-08-10 02:44:15', '2024-08-10 02:43:44', '2024-08-10 02:44:15'),
(191, 44, '2024-08-10 02:46:23', '2024-08-10 02:47:06', '2024-08-10 02:46:23', '2024-08-10 02:47:06'),
(192, 44, '2024-08-10 03:19:59', NULL, '2024-08-10 03:19:59', '2024-08-10 03:19:59'),
(193, 44, '2024-08-10 03:20:10', NULL, '2024-08-10 03:20:10', '2024-08-10 03:20:10'),
(194, 33, '2024-08-10 03:20:26', NULL, '2024-08-10 03:20:26', '2024-08-10 03:20:26'),
(195, 44, '2024-08-10 03:20:44', NULL, '2024-08-10 03:20:44', '2024-08-10 03:20:44'),
(196, 40, '2024-08-10 03:21:43', NULL, '2024-08-10 03:21:43', '2024-08-10 03:21:43'),
(197, 33, '2024-08-10 03:22:08', NULL, '2024-08-10 03:22:08', '2024-08-10 03:22:08'),
(198, 33, '2024-08-10 03:22:58', NULL, '2024-08-10 03:22:58', '2024-08-10 03:22:58'),
(199, 34, '2024-08-10 03:23:24', NULL, '2024-08-10 03:23:24', '2024-08-10 03:23:24'),
(200, 33, '2024-08-10 03:24:04', NULL, '2024-08-10 03:24:04', '2024-08-10 03:24:04'),
(201, 33, '2024-08-10 03:24:26', NULL, '2024-08-10 03:24:26', '2024-08-10 03:24:26'),
(202, 33, '2024-08-10 03:28:33', NULL, '2024-08-10 03:28:33', '2024-08-10 03:28:33'),
(203, 34, '2024-08-10 03:29:30', '2024-08-10 03:50:24', '2024-08-10 03:29:30', '2024-08-10 03:50:24'),
(204, 33, '2024-08-10 03:31:44', NULL, '2024-08-10 03:31:44', '2024-08-10 03:31:44'),
(205, 44, '2024-08-10 03:49:52', '2024-08-10 03:50:53', '2024-08-10 03:49:52', '2024-08-10 03:50:53'),
(206, 44, '2024-08-10 03:51:29', NULL, '2024-08-10 03:51:29', '2024-08-10 03:51:29'),
(207, 34, '2024-08-10 03:52:49', NULL, '2024-08-10 03:52:49', '2024-08-10 03:52:49'),
(208, 44, '2024-08-10 04:14:43', '2024-08-10 04:16:33', '2024-08-10 04:14:43', '2024-08-10 04:16:33'),
(209, 44, '2024-08-10 04:17:35', '2024-08-10 04:19:39', '2024-08-10 04:17:35', '2024-08-10 04:19:39'),
(210, 34, '2024-08-10 05:12:47', '2024-08-10 05:15:51', '2024-08-10 05:12:47', '2024-08-10 05:15:51'),
(211, 34, '2024-08-10 05:16:15', '2024-08-10 05:26:59', '2024-08-10 05:16:15', '2024-08-10 05:26:59'),
(212, 34, '2024-08-10 05:27:20', '2024-08-10 05:44:52', '2024-08-10 05:27:20', '2024-08-10 05:44:52'),
(213, 34, '2024-08-10 06:43:22', '2024-08-10 06:59:04', '2024-08-10 06:43:22', '2024-08-10 06:59:04'),
(214, 34, '2024-08-10 06:59:59', '2024-08-10 07:11:24', '2024-08-10 06:59:59', '2024-08-10 07:11:24'),
(215, 34, '2024-08-10 07:15:51', '2024-08-10 07:20:15', '2024-08-10 07:15:51', '2024-08-10 07:20:15'),
(216, 34, '2024-08-10 07:20:32', '2024-08-10 07:21:44', '2024-08-10 07:20:32', '2024-08-10 07:21:44'),
(217, 34, '2024-08-10 07:22:07', '2024-08-10 07:39:59', '2024-08-10 07:22:07', '2024-08-10 07:39:59'),
(218, 34, '2024-08-10 07:41:39', '2024-08-10 08:00:07', '2024-08-10 07:41:39', '2024-08-10 08:00:07'),
(219, 34, '2024-08-10 08:01:59', '2024-08-10 08:04:27', '2024-08-10 08:01:59', '2024-08-10 08:04:27'),
(220, 34, '2024-08-10 08:04:52', '2024-08-10 08:07:05', '2024-08-10 08:04:52', '2024-08-10 08:07:05'),
(221, 34, '2024-08-10 08:10:08', '2024-08-10 08:39:03', '2024-08-10 08:10:08', '2024-08-10 08:39:03'),
(222, 34, '2024-08-10 08:43:57', '2024-08-10 08:47:29', '2024-08-10 08:43:57', '2024-08-10 08:47:29'),
(223, 34, '2024-08-10 08:59:58', '2024-08-10 09:08:34', '2024-08-10 08:59:58', '2024-08-10 09:08:34'),
(224, 34, '2024-08-10 09:10:13', '2024-08-10 09:59:01', '2024-08-10 09:10:13', '2024-08-10 09:59:01'),
(225, 44, '2024-08-10 16:47:17', '2024-08-10 16:48:48', '2024-08-10 16:47:17', '2024-08-10 16:48:48'),
(226, 44, '2024-08-10 17:03:17', '2024-08-10 17:04:30', '2024-08-10 17:03:17', '2024-08-10 17:04:30'),
(227, 33, '2024-08-10 17:13:31', '2024-08-10 17:14:37', '2024-08-10 17:13:31', '2024-08-10 17:14:37'),
(228, 34, '2024-08-10 17:30:14', '2024-08-10 17:33:14', '2024-08-10 17:30:14', '2024-08-10 17:33:14'),
(229, 33, '2024-08-10 18:22:32', '2024-08-10 18:24:53', '2024-08-10 18:22:32', '2024-08-10 18:24:53'),
(230, 40, '2024-08-10 21:31:34', NULL, '2024-08-10 21:31:34', '2024-08-10 21:31:34'),
(231, 40, '2024-08-11 04:10:43', NULL, '2024-08-11 04:10:43', '2024-08-11 04:10:43'),
(232, 34, '2024-08-11 06:20:36', '2024-08-11 06:53:52', '2024-08-11 06:20:36', '2024-08-11 06:53:52'),
(233, 34, '2024-08-11 06:56:49', NULL, '2024-08-11 06:56:49', '2024-08-11 06:56:49'),
(234, 34, '2024-08-11 07:10:35', NULL, '2024-08-11 07:10:35', '2024-08-11 07:10:35'),
(235, 34, '2024-08-11 07:13:30', '2024-08-11 07:35:23', '2024-08-11 07:13:30', '2024-08-11 07:35:23'),
(236, 34, '2024-08-11 07:35:40', '2024-08-11 07:40:13', '2024-08-11 07:35:40', '2024-08-11 07:40:13'),
(237, 34, '2024-08-11 07:43:11', '2024-08-11 07:48:34', '2024-08-11 07:43:11', '2024-08-11 07:48:34'),
(238, 34, '2024-08-11 07:50:38', '2024-08-11 07:56:20', '2024-08-11 07:50:38', '2024-08-11 07:56:20'),
(239, 34, '2024-08-11 07:56:39', '2024-08-11 07:59:33', '2024-08-11 07:56:39', '2024-08-11 07:59:33'),
(240, 34, '2024-08-11 08:00:29', '2024-08-11 08:32:10', '2024-08-11 08:00:29', '2024-08-11 08:32:10'),
(241, 34, '2024-08-11 08:32:56', '2024-08-11 08:58:42', '2024-08-11 08:32:56', '2024-08-11 08:58:42'),
(242, 34, '2024-08-11 11:53:01', '2024-08-11 11:55:36', '2024-08-11 11:53:01', '2024-08-11 11:55:36'),
(243, 34, '2024-08-11 14:37:13', '2024-08-11 14:54:50', '2024-08-11 14:37:13', '2024-08-11 14:54:50'),
(244, 34, '2024-08-11 14:55:16', '2024-08-11 15:56:40', '2024-08-11 14:55:16', '2024-08-11 15:56:40'),
(245, 33, '2024-08-11 15:59:42', '2024-08-11 16:01:00', '2024-08-11 15:59:42', '2024-08-11 16:01:00'),
(246, 33, '2024-08-11 16:05:07', NULL, '2024-08-11 16:05:07', '2024-08-11 16:05:07'),
(247, 33, '2024-08-11 16:06:28', '2024-08-11 16:07:48', '2024-08-11 16:06:28', '2024-08-11 16:07:48'),
(248, 33, '2024-08-11 17:00:43', '2024-08-11 17:16:00', '2024-08-11 17:00:43', '2024-08-11 17:16:00'),
(249, 34, '2024-08-11 17:18:08', NULL, '2024-08-11 17:18:08', '2024-08-11 17:18:08'),
(250, 34, '2024-08-11 17:25:47', NULL, '2024-08-11 17:25:47', '2024-08-11 17:25:47'),
(251, 33, '2024-08-11 17:34:07', NULL, '2024-08-11 17:34:07', '2024-08-11 17:34:07'),
(252, 40, '2024-08-11 23:52:04', NULL, '2024-08-11 23:52:04', '2024-08-11 23:52:04'),
(253, 33, '2024-08-12 00:49:40', NULL, '2024-08-12 00:49:40', '2024-08-12 00:49:40'),
(254, 40, '2024-08-12 01:19:24', NULL, '2024-08-12 01:19:24', '2024-08-12 01:19:24'),
(255, 33, '2024-08-12 01:20:32', '2024-08-12 01:25:27', '2024-08-12 01:20:32', '2024-08-12 01:25:27'),
(256, 33, '2024-08-12 01:29:35', '2024-08-12 01:30:37', '2024-08-12 01:29:35', '2024-08-12 01:30:37'),
(257, 34, '2024-08-12 04:01:37', '2024-08-12 04:17:23', '2024-08-12 04:01:37', '2024-08-12 04:17:23'),
(258, 34, '2024-08-12 04:21:10', '2024-08-12 04:35:09', '2024-08-12 04:21:10', '2024-08-12 04:35:09'),
(259, 34, '2024-08-12 04:35:35', '2024-08-12 05:24:32', '2024-08-12 04:35:35', '2024-08-12 05:24:32'),
(260, 34, '2024-08-12 05:24:52', '2024-08-12 05:43:11', '2024-08-12 05:24:52', '2024-08-12 05:43:11'),
(261, 33, '2024-08-13 15:11:59', '2024-08-13 15:15:50', '2024-08-13 15:11:59', '2024-08-13 15:15:50'),
(262, 40, '2024-08-13 15:22:46', NULL, '2024-08-13 15:22:46', '2024-08-13 15:22:46'),
(263, 33, '2024-08-13 15:22:52', '2024-08-13 15:23:54', '2024-08-13 15:22:52', '2024-08-13 15:23:54'),
(264, 40, '2024-08-13 15:23:28', '2024-08-13 15:30:06', '2024-08-13 15:23:28', '2024-08-13 15:30:06'),
(265, 44, '2024-08-13 15:23:41', NULL, '2024-08-13 15:23:41', '2024-08-13 15:23:41'),
(266, 44, '2024-08-13 15:23:44', NULL, '2024-08-13 15:23:44', '2024-08-13 15:23:44'),
(267, 44, '2024-08-13 15:23:52', '2024-08-13 15:29:36', '2024-08-13 15:23:52', '2024-08-13 15:29:36'),
(268, 44, '2024-08-13 15:30:18', '2024-08-13 15:31:27', '2024-08-13 15:30:18', '2024-08-13 15:31:27'),
(269, 40, '2024-08-13 15:32:13', '2024-08-13 15:33:13', '2024-08-13 15:32:13', '2024-08-13 15:33:13'),
(270, 44, '2024-08-13 15:32:15', '2024-08-13 15:33:16', '2024-08-13 15:32:15', '2024-08-13 15:33:16'),
(271, 40, '2024-08-13 15:34:11', '2024-08-13 15:37:49', '2024-08-13 15:34:11', '2024-08-13 15:37:49'),
(272, 44, '2024-08-13 15:34:18', '2024-08-13 15:36:33', '2024-08-13 15:34:18', '2024-08-13 15:36:33'),
(273, 44, '2024-08-13 15:37:23', '2024-08-13 15:38:37', '2024-08-13 15:37:23', '2024-08-13 15:38:37'),
(274, 44, '2024-08-13 15:38:57', '2024-08-13 15:44:50', '2024-08-13 15:38:57', '2024-08-13 15:44:50'),
(275, 40, '2024-08-13 15:39:41', '2024-08-13 15:40:46', '2024-08-13 15:39:41', '2024-08-13 15:40:46'),
(276, 40, '2024-08-13 15:43:00', '2024-08-13 15:44:42', '2024-08-13 15:43:00', '2024-08-13 15:44:42'),
(277, 33, '2024-08-13 15:51:45', '2024-08-13 16:25:17', '2024-08-13 15:51:45', '2024-08-13 16:25:17'),
(278, 34, '2024-08-13 16:13:29', NULL, '2024-08-13 16:13:29', '2024-08-13 16:13:29'),
(279, 34, '2024-08-13 16:24:30', '2024-08-13 16:40:17', '2024-08-13 16:24:30', '2024-08-13 16:40:17'),
(280, 34, '2024-08-13 16:41:00', '2024-08-13 16:45:27', '2024-08-13 16:41:00', '2024-08-13 16:45:27'),
(281, 34, '2024-08-13 16:45:50', '2024-08-13 17:01:42', '2024-08-13 16:45:50', '2024-08-13 17:01:42'),
(282, 34, '2024-08-13 17:05:18', '2024-08-13 17:21:13', '2024-08-13 17:05:18', '2024-08-13 17:21:13'),
(283, 44, '2024-08-13 17:07:39', NULL, '2024-08-13 17:07:39', '2024-08-13 17:07:39'),
(284, 44, '2024-08-13 17:10:44', '2024-08-13 17:11:45', '2024-08-13 17:10:44', '2024-08-13 17:11:45'),
(285, 34, '2024-08-13 17:26:16', '2024-08-13 17:31:57', '2024-08-13 17:26:16', '2024-08-13 17:31:57'),
(286, 34, '2024-08-13 17:41:14', '2024-08-13 17:45:12', '2024-08-13 17:41:14', '2024-08-13 17:45:12'),
(287, 44, '2024-08-13 17:45:26', '2024-08-13 17:50:54', '2024-08-13 17:45:26', '2024-08-13 17:50:54'),
(288, 34, '2024-08-13 17:47:25', '2024-08-13 17:59:15', '2024-08-13 17:47:25', '2024-08-13 17:59:15'),
(289, 44, '2024-08-13 17:50:59', NULL, '2024-08-13 17:50:59', '2024-08-13 17:50:59'),
(290, 44, '2024-08-13 17:51:06', NULL, '2024-08-13 17:51:06', '2024-08-13 17:51:06'),
(291, 34, '2024-08-13 17:59:41', '2024-08-13 18:02:34', '2024-08-13 17:59:41', '2024-08-13 18:02:34'),
(292, 44, '2024-08-13 18:01:07', '2024-08-13 18:02:08', '2024-08-13 18:01:07', '2024-08-13 18:02:08'),
(293, 44, '2024-08-13 18:04:29', '2024-08-13 18:05:36', '2024-08-13 18:04:29', '2024-08-13 18:05:36'),
(294, 34, '2024-08-13 18:09:07', '2024-08-13 18:37:59', '2024-08-13 18:09:07', '2024-08-13 18:37:59'),
(295, 44, '2024-08-13 18:14:48', '2024-08-13 18:16:17', '2024-08-13 18:14:48', '2024-08-13 18:16:17'),
(296, 44, '2024-08-13 18:20:54', '2024-08-13 18:22:11', '2024-08-13 18:20:54', '2024-08-13 18:22:11'),
(297, 44, '2024-08-13 18:23:09', '2024-08-13 18:24:40', '2024-08-13 18:23:09', '2024-08-13 18:24:40'),
(298, 40, '2024-08-13 19:49:52', NULL, '2024-08-13 19:49:52', '2024-08-13 19:49:52'),
(299, 44, '2024-08-13 20:52:15', '2024-08-13 20:53:54', '2024-08-13 20:52:15', '2024-08-13 20:53:54'),
(300, 44, '2024-08-13 20:53:57', NULL, '2024-08-13 20:53:57', '2024-08-13 20:53:57'),
(301, 40, '2024-08-13 22:16:36', '2024-08-13 22:33:33', '2024-08-13 22:16:36', '2024-08-13 22:33:33'),
(302, 40, '2024-08-13 22:34:38', NULL, '2024-08-13 22:34:38', '2024-08-13 22:34:38'),
(303, 40, '2024-08-13 22:36:49', NULL, '2024-08-13 22:36:49', '2024-08-13 22:36:49'),
(304, 40, '2024-08-13 22:47:04', '2024-08-13 22:55:48', '2024-08-13 22:47:04', '2024-08-13 22:55:48'),
(305, 40, '2024-08-13 22:57:05', '2024-08-13 23:23:24', '2024-08-13 22:57:05', '2024-08-13 23:23:24'),
(306, 44, '2024-08-13 23:06:46', '2024-08-13 23:11:27', '2024-08-13 23:06:46', '2024-08-13 23:11:27'),
(307, 44, '2024-08-13 23:11:42', '2024-08-13 23:16:09', '2024-08-13 23:11:42', '2024-08-13 23:16:09'),
(308, 44, '2024-08-13 23:22:16', '2024-08-13 23:23:38', '2024-08-13 23:22:16', '2024-08-13 23:23:38'),
(309, 44, '2024-08-13 23:27:48', '2024-08-13 23:44:22', '2024-08-13 23:27:48', '2024-08-13 23:44:22'),
(310, 40, '2024-08-13 23:31:05', '2024-08-13 23:34:00', '2024-08-13 23:31:05', '2024-08-13 23:34:00'),
(311, 40, '2024-08-13 23:37:19', '2024-08-13 23:42:45', '2024-08-13 23:37:19', '2024-08-13 23:42:45'),
(312, 40, '2024-08-13 23:43:15', NULL, '2024-08-13 23:43:15', '2024-08-13 23:43:15'),
(313, 40, '2024-08-13 23:47:59', '2024-08-14 03:14:24', '2024-08-13 23:47:59', '2024-08-14 03:14:24'),
(314, 34, '2024-08-14 03:34:46', '2024-08-14 03:38:51', '2024-08-14 03:34:46', '2024-08-14 03:38:51'),
(315, 34, '2024-08-14 03:43:00', NULL, '2024-08-14 03:43:00', '2024-08-14 03:43:00'),
(316, 34, '2024-08-14 04:08:48', '2024-08-14 04:20:41', '2024-08-14 04:08:48', '2024-08-14 04:20:41'),
(317, 34, '2024-08-14 04:20:55', '2024-08-14 05:04:11', '2024-08-14 04:20:55', '2024-08-14 05:04:11'),
(318, 44, '2024-08-14 06:44:42', NULL, '2024-08-14 06:44:42', '2024-08-14 06:44:42'),
(319, 44, '2024-08-14 06:47:12', '2024-08-14 06:48:25', '2024-08-14 06:47:12', '2024-08-14 06:48:25'),
(320, 44, '2024-08-14 06:52:33', '2024-08-14 06:53:41', '2024-08-14 06:52:33', '2024-08-14 06:53:41'),
(321, 44, '2024-08-14 06:54:55', '2024-08-14 06:55:56', '2024-08-14 06:54:55', '2024-08-14 06:55:56'),
(322, 44, '2024-08-14 06:59:14', '2024-08-14 07:02:32', '2024-08-14 06:59:14', '2024-08-14 07:02:32'),
(323, 44, '2024-08-14 07:06:37', '2024-08-14 07:10:57', '2024-08-14 07:06:37', '2024-08-14 07:10:57'),
(324, 44, '2024-08-14 07:14:37', '2024-08-14 07:16:19', '2024-08-14 07:14:37', '2024-08-14 07:16:19'),
(325, 44, '2024-08-14 07:29:04', '2024-08-14 07:31:05', '2024-08-14 07:29:04', '2024-08-14 07:31:05'),
(326, 44, '2024-08-14 07:33:35', '2024-08-14 07:34:43', '2024-08-14 07:33:35', '2024-08-14 07:34:43'),
(327, 34, '2024-08-14 07:41:51', NULL, '2024-08-14 07:41:51', '2024-08-14 07:41:51'),
(328, 34, '2024-08-14 07:46:16', '2024-08-14 08:03:11', '2024-08-14 07:46:16', '2024-08-14 08:03:11'),
(329, 40, '2024-08-14 12:52:46', '2024-08-14 13:00:42', '2024-08-14 12:52:46', '2024-08-14 13:00:42'),
(330, 40, '2024-08-14 13:02:49', '2024-08-14 13:05:18', '2024-08-14 13:02:49', '2024-08-14 13:05:18'),
(331, 40, '2024-08-14 13:05:32', NULL, '2024-08-14 13:05:32', '2024-08-14 13:05:32'),
(332, 40, '2024-08-14 14:48:24', '2024-08-14 14:52:43', '2024-08-14 14:48:24', '2024-08-14 14:52:43'),
(333, 40, '2024-08-14 18:11:53', NULL, '2024-08-14 18:11:53', '2024-08-14 18:11:53'),
(334, 40, '2024-08-14 18:12:27', NULL, '2024-08-14 18:12:27', '2024-08-14 18:12:27'),
(335, 44, '2024-08-14 21:43:33', '2024-08-14 21:54:06', '2024-08-14 21:43:33', '2024-08-14 21:54:06'),
(336, 44, '2024-08-14 21:54:22', '2024-08-14 22:05:41', '2024-08-14 21:54:22', '2024-08-14 22:05:41'),
(337, 44, '2024-08-14 22:19:54', '2024-08-14 22:22:08', '2024-08-14 22:19:54', '2024-08-14 22:22:08'),
(338, 34, '2024-08-15 03:13:59', '2024-08-15 03:20:57', '2024-08-15 03:13:59', '2024-08-15 03:20:57'),
(339, 34, '2024-08-15 03:21:13', '2024-08-15 03:30:22', '2024-08-15 03:21:13', '2024-08-15 03:30:22'),
(340, 34, '2024-08-15 03:32:53', '2024-08-15 03:37:51', '2024-08-15 03:32:53', '2024-08-15 03:37:51'),
(341, 34, '2024-08-15 03:39:53', '2024-08-15 03:54:01', '2024-08-15 03:39:53', '2024-08-15 03:54:01'),
(342, 34, '2024-08-15 03:57:18', NULL, '2024-08-15 03:57:18', '2024-08-15 03:57:18'),
(343, 34, '2024-08-15 03:57:26', '2024-08-15 04:06:47', '2024-08-15 03:57:26', '2024-08-15 04:06:47'),
(344, 34, '2024-08-15 04:07:06', '2024-08-15 04:12:56', '2024-08-15 04:07:06', '2024-08-15 04:12:56'),
(345, 34, '2024-08-15 04:14:36', '2024-08-15 04:23:58', '2024-08-15 04:14:36', '2024-08-15 04:23:58'),
(346, 34, '2024-08-15 04:24:38', '2024-08-15 04:33:17', '2024-08-15 04:24:38', '2024-08-15 04:33:17'),
(347, 34, '2024-08-15 04:33:39', '2024-08-15 04:35:15', '2024-08-15 04:33:39', '2024-08-15 04:35:15'),
(348, 34, '2024-08-15 05:05:56', '2024-08-15 05:33:29', '2024-08-15 05:05:56', '2024-08-15 05:33:29'),
(349, 34, '2024-08-15 05:37:03', '2024-08-15 05:40:06', '2024-08-15 05:37:03', '2024-08-15 05:40:06'),
(350, 34, '2024-08-15 06:30:22', '2024-08-15 06:37:14', '2024-08-15 06:30:22', '2024-08-15 06:37:14'),
(351, 44, '2024-08-15 12:49:21', NULL, '2024-08-15 12:49:21', '2024-08-15 12:49:21'),
(352, 44, '2024-08-15 12:50:11', '2024-08-15 12:54:50', '2024-08-15 12:50:11', '2024-08-15 12:54:50'),
(353, 44, '2024-08-15 13:04:43', '2024-08-15 13:05:21', '2024-08-15 13:04:43', '2024-08-15 13:05:21'),
(354, 44, '2024-08-15 13:05:27', '2024-08-15 13:06:32', '2024-08-15 13:05:27', '2024-08-15 13:06:32'),
(355, 34, '2024-08-15 13:10:32', '2024-08-15 13:33:13', '2024-08-15 13:10:32', '2024-08-15 13:33:13'),
(356, 44, '2024-08-15 13:46:35', '2024-08-15 13:48:01', '2024-08-15 13:46:35', '2024-08-15 13:48:01'),
(357, 34, '2024-08-15 14:08:32', NULL, '2024-08-15 14:08:32', '2024-08-15 14:08:32'),
(358, 34, '2024-08-15 14:19:47', NULL, '2024-08-15 14:19:47', '2024-08-15 14:19:47'),
(359, 34, '2024-08-15 14:23:58', NULL, '2024-08-15 14:23:58', '2024-08-15 14:23:58'),
(360, 44, '2024-08-15 14:27:04', '2024-08-15 14:42:26', '2024-08-15 14:27:04', '2024-08-15 14:42:26'),
(361, 34, '2024-08-15 14:31:05', '2024-08-15 14:38:33', '2024-08-15 14:31:05', '2024-08-15 14:38:33'),
(362, 34, '2024-08-15 14:41:31', '2024-08-15 15:19:45', '2024-08-15 14:41:31', '2024-08-15 15:19:45'),
(363, 33, '2024-08-15 16:23:39', NULL, '2024-08-15 16:23:39', '2024-08-15 16:23:39'),
(364, 34, '2024-08-15 16:29:36', '2024-08-15 16:43:47', '2024-08-15 16:29:36', '2024-08-15 16:43:47'),
(365, 34, '2024-08-15 16:45:00', '2024-08-15 17:14:49', '2024-08-15 16:45:00', '2024-08-15 17:14:49'),
(366, 34, '2024-08-15 17:15:05', '2024-08-15 17:25:47', '2024-08-15 17:15:05', '2024-08-15 17:25:47'),
(367, 34, '2024-08-15 17:26:04', '2024-08-15 17:33:42', '2024-08-15 17:26:04', '2024-08-15 17:33:42'),
(368, 34, '2024-08-15 17:33:59', '2024-08-15 17:49:38', '2024-08-15 17:33:59', '2024-08-15 17:49:38'),
(369, 34, '2024-08-15 17:52:22', NULL, '2024-08-15 17:52:22', '2024-08-15 17:52:22'),
(370, 33, '2024-08-15 18:00:49', NULL, '2024-08-15 18:00:49', '2024-08-15 18:00:49'),
(371, 40, '2024-08-15 22:43:43', NULL, '2024-08-15 22:43:43', '2024-08-15 22:43:43'),
(372, 40, '2024-08-15 22:49:39', '2024-08-15 22:59:46', '2024-08-15 22:49:39', '2024-08-15 22:59:46'),
(373, 40, '2024-08-15 23:03:35', '2024-08-15 23:05:25', '2024-08-15 23:03:35', '2024-08-15 23:05:25'),
(374, 40, '2024-08-15 23:05:59', '2024-08-15 23:09:59', '2024-08-15 23:05:59', '2024-08-15 23:09:59'),
(375, 40, '2024-08-15 23:10:52', NULL, '2024-08-15 23:10:52', '2024-08-15 23:10:52'),
(376, 44, '2024-08-15 23:17:36', '2024-08-15 23:20:37', '2024-08-15 23:17:36', '2024-08-15 23:20:37'),
(377, 44, '2024-08-15 23:20:42', '2024-08-15 23:21:51', '2024-08-15 23:20:42', '2024-08-15 23:21:51'),
(378, 44, '2024-08-15 23:21:56', '2024-08-15 23:26:50', '2024-08-15 23:21:56', '2024-08-15 23:26:50'),
(379, 44, '2024-08-15 23:27:14', '2024-08-15 23:42:27', '2024-08-15 23:27:14', '2024-08-15 23:42:27'),
(380, 34, '2024-08-16 04:00:11', '2024-08-16 04:24:43', '2024-08-16 04:00:11', '2024-08-16 04:24:43'),
(381, 44, '2024-08-16 04:00:45', '2024-08-16 04:02:18', '2024-08-16 04:00:45', '2024-08-16 04:02:18'),
(382, 44, '2024-08-16 04:26:15', '2024-08-16 04:27:26', '2024-08-16 04:26:15', '2024-08-16 04:27:26'),
(383, 34, '2024-08-16 04:28:43', '2024-08-16 05:12:21', '2024-08-16 04:28:43', '2024-08-16 05:12:21'),
(384, 44, '2024-08-16 04:42:57', '2024-08-16 04:46:55', '2024-08-16 04:42:57', '2024-08-16 04:46:55'),
(385, 44, '2024-08-16 04:47:59', '2024-08-16 04:58:35', '2024-08-16 04:47:59', '2024-08-16 04:58:35'),
(386, 44, '2024-08-16 05:00:26', '2024-08-16 05:19:48', '2024-08-16 05:00:26', '2024-08-16 05:19:48'),
(387, 34, '2024-08-16 05:27:11', '2024-08-16 05:58:48', '2024-08-16 05:27:11', '2024-08-16 05:58:48'),
(388, 44, '2024-08-16 05:32:11', '2024-08-16 05:33:45', '2024-08-16 05:32:11', '2024-08-16 05:33:45'),
(389, 44, '2024-08-16 05:34:22', '2024-08-16 05:35:55', '2024-08-16 05:34:22', '2024-08-16 05:35:55'),
(390, 44, '2024-08-16 05:36:32', '2024-08-16 05:37:45', '2024-08-16 05:36:32', '2024-08-16 05:37:45'),
(391, 44, '2024-08-16 05:38:07', '2024-08-16 05:39:44', '2024-08-16 05:38:07', '2024-08-16 05:39:44'),
(392, 44, '2024-08-16 05:47:45', '2024-08-16 05:49:02', '2024-08-16 05:47:45', '2024-08-16 05:49:02'),
(393, 44, '2024-08-16 05:51:23', '2024-08-16 05:55:53', '2024-08-16 05:51:23', '2024-08-16 05:55:53'),
(394, 34, '2024-08-16 05:59:11', '2024-08-16 06:15:00', '2024-08-16 05:59:11', '2024-08-16 06:15:00'),
(395, 34, '2024-08-16 08:52:21', '2024-08-16 09:34:03', '2024-08-16 08:52:21', '2024-08-16 09:34:03'),
(396, 34, '2024-08-16 09:41:12', '2024-08-16 09:43:08', '2024-08-16 09:41:12', '2024-08-16 09:43:08'),
(397, 34, '2024-08-16 10:16:35', '2024-08-16 10:43:46', '2024-08-16 10:16:35', '2024-08-16 10:43:46'),
(398, 40, '2024-08-16 12:18:02', NULL, '2024-08-16 12:18:02', '2024-08-16 12:18:02'),
(399, 34, '2024-08-16 13:07:36', NULL, '2024-08-16 13:07:36', '2024-08-16 13:07:36'),
(400, 40, '2024-08-16 13:11:29', '2024-08-16 13:18:49', '2024-08-16 13:11:29', '2024-08-16 13:18:49'),
(401, 34, '2024-08-16 13:16:14', '2024-08-16 13:55:19', '2024-08-16 13:16:14', '2024-08-16 13:55:19'),
(402, 40, '2024-08-16 13:20:26', '2024-08-16 13:35:58', '2024-08-16 13:20:26', '2024-08-16 13:35:58'),
(403, 40, '2024-08-16 13:38:28', '2024-08-16 13:39:41', '2024-08-16 13:38:28', '2024-08-16 13:39:41'),
(404, 40, '2024-08-16 13:40:52', '2024-08-16 13:52:27', '2024-08-16 13:40:52', '2024-08-16 13:52:27'),
(405, 40, '2024-08-16 13:53:28', NULL, '2024-08-16 13:53:28', '2024-08-16 13:53:28'),
(406, 44, '2024-08-16 13:54:54', '2024-08-16 14:01:44', '2024-08-16 13:54:54', '2024-08-16 14:01:44'),
(407, 40, '2024-08-16 14:02:08', '2024-08-16 14:09:14', '2024-08-16 14:02:08', '2024-08-16 14:09:14'),
(408, 44, '2024-08-16 14:03:30', '2024-08-16 14:15:40', '2024-08-16 14:03:30', '2024-08-16 14:15:40'),
(409, 44, '2024-08-16 14:32:51', '2024-08-16 14:34:15', '2024-08-16 14:32:51', '2024-08-16 14:34:15'),
(410, 44, '2024-08-16 20:26:30', '2024-08-16 20:42:47', '2024-08-16 20:26:30', '2024-08-16 20:42:47'),
(411, 34, '2024-08-17 06:22:27', '2024-08-17 06:53:04', '2024-08-17 06:22:27', '2024-08-17 06:53:04'),
(412, 44, '2024-08-17 06:37:39', '2024-08-17 06:40:09', '2024-08-17 06:37:39', '2024-08-17 06:40:09'),
(413, 44, '2024-08-17 06:40:19', '2024-08-17 06:41:27', '2024-08-17 06:40:19', '2024-08-17 06:41:27'),
(414, 44, '2024-08-17 06:48:32', '2024-08-17 07:04:37', '2024-08-17 06:48:32', '2024-08-17 07:04:37'),
(415, 34, '2024-08-17 07:04:54', '2024-08-17 07:18:53', '2024-08-17 07:04:54', '2024-08-17 07:18:53'),
(416, 34, '2024-08-17 07:19:10', '2024-08-17 07:52:48', '2024-08-17 07:19:10', '2024-08-17 07:52:48'),
(417, 34, '2024-08-17 07:53:17', '2024-08-17 08:13:43', '2024-08-17 07:53:17', '2024-08-17 08:13:43'),
(418, 34, '2024-08-17 08:16:23', '2024-08-17 08:39:27', '2024-08-17 08:16:23', '2024-08-17 08:39:27'),
(419, 34, '2024-08-17 08:39:58', '2024-08-17 08:58:50', '2024-08-17 08:39:58', '2024-08-17 08:58:50'),
(420, 34, '2024-08-17 09:05:12', '2024-08-17 09:21:34', '2024-08-17 09:05:12', '2024-08-17 09:21:34'),
(421, 34, '2024-08-17 09:26:46', '2024-08-17 09:39:38', '2024-08-17 09:26:46', '2024-08-17 09:39:38'),
(422, 34, '2024-08-17 09:43:38', '2024-08-17 09:52:32', '2024-08-17 09:43:38', '2024-08-17 09:52:32'),
(423, 34, '2024-08-17 09:52:46', '2024-08-17 10:35:43', '2024-08-17 09:52:46', '2024-08-17 10:35:43'),
(424, 34, '2024-08-17 10:37:38', '2024-08-17 11:43:57', '2024-08-17 10:37:38', '2024-08-17 11:43:57'),
(425, 34, '2024-08-17 11:44:18', '2024-08-17 12:10:28', '2024-08-17 11:44:18', '2024-08-17 12:10:28'),
(426, 44, '2024-08-17 12:25:05', NULL, '2024-08-17 12:25:05', '2024-08-17 12:25:05'),
(427, 34, '2024-08-18 05:49:34', '2024-08-18 06:26:52', '2024-08-18 05:49:34', '2024-08-18 06:26:52'),
(428, 34, '2024-08-18 07:20:16', '2024-08-18 07:39:47', '2024-08-18 07:20:16', '2024-08-18 07:39:47'),
(429, 44, '2024-08-18 14:32:21', '2024-08-18 14:41:02', '2024-08-18 14:32:21', '2024-08-18 14:41:02'),
(430, 40, '2024-08-18 14:34:12', NULL, '2024-08-18 14:34:12', '2024-08-18 14:34:12'),
(431, 40, '2024-08-18 14:40:04', NULL, '2024-08-18 14:40:04', '2024-08-18 14:40:04'),
(432, 44, '2024-08-18 14:46:49', NULL, '2024-08-18 14:46:49', '2024-08-18 14:46:49'),
(433, 40, '2024-08-18 14:48:09', '2024-08-18 15:55:23', '2024-08-18 14:48:09', '2024-08-18 15:55:23'),
(434, 34, '2024-08-18 14:48:22', NULL, '2024-08-18 14:48:22', '2024-08-18 14:48:22'),
(435, 34, '2024-08-18 15:15:30', '2024-08-18 15:25:15', '2024-08-18 15:15:30', '2024-08-18 15:25:15'),
(436, 44, '2024-08-18 15:27:46', '2024-08-18 15:29:13', '2024-08-18 15:27:46', '2024-08-18 15:29:13'),
(437, 44, '2024-08-18 15:36:12', '2024-08-18 15:52:20', '2024-08-18 15:36:12', '2024-08-18 15:52:20'),
(438, 34, '2024-08-18 15:37:52', '2024-08-18 15:39:34', '2024-08-18 15:37:52', '2024-08-18 15:39:34'),
(439, 40, '2024-08-18 15:55:33', NULL, '2024-08-18 15:55:33', '2024-08-18 15:55:33'),
(440, 40, '2024-08-18 16:17:46', NULL, '2024-08-18 16:17:46', '2024-08-18 16:17:46'),
(441, 40, '2024-08-18 16:22:14', '2024-08-18 16:24:06', '2024-08-18 16:22:14', '2024-08-18 16:24:06'),
(442, 44, '2024-08-18 19:59:09', '2024-08-18 20:03:36', '2024-08-18 19:59:09', '2024-08-18 20:03:36'),
(443, 44, '2024-08-18 23:19:47', '2024-08-18 23:25:46', '2024-08-18 23:19:47', '2024-08-18 23:25:46'),
(444, 44, '2024-08-18 23:26:21', '2024-08-18 23:28:34', '2024-08-18 23:26:21', '2024-08-18 23:28:34'),
(445, 44, '2024-08-19 00:03:15', '2024-08-19 00:21:41', '2024-08-19 00:03:15', '2024-08-19 00:21:41'),
(446, 44, '2024-08-19 03:53:25', '2024-08-19 04:03:18', '2024-08-19 03:53:25', '2024-08-19 04:03:18'),
(447, 44, '2024-08-19 04:03:30', '2024-08-19 04:19:35', '2024-08-19 04:03:30', '2024-08-19 04:19:35'),
(448, 44, '2024-08-19 04:34:22', '2024-08-19 04:48:32', '2024-08-19 04:34:22', '2024-08-19 04:48:32'),
(449, 34, '2024-08-19 04:46:22', '2024-08-19 04:59:16', '2024-08-19 04:46:22', '2024-08-19 04:59:16'),
(450, 34, '2024-08-19 05:01:48', '2024-08-19 05:26:26', '2024-08-19 05:01:48', '2024-08-19 05:26:26'),
(451, 34, '2024-08-19 05:32:43', '2024-08-19 05:34:37', '2024-08-19 05:32:43', '2024-08-19 05:34:37'),
(452, 34, '2024-08-19 05:34:56', '2024-08-19 05:57:01', '2024-08-19 05:34:56', '2024-08-19 05:57:01'),
(453, 40, '2024-08-19 06:34:59', NULL, '2024-08-19 06:34:59', '2024-08-19 06:34:59'),
(454, 44, '2024-08-19 11:02:26', '2024-08-19 11:22:26', '2024-08-19 11:02:26', '2024-08-19 11:22:26'),
(455, 34, '2024-08-19 11:48:48', '2024-08-19 12:07:13', '2024-08-19 11:48:48', '2024-08-19 12:07:13'),
(456, 40, '2024-08-19 11:56:13', NULL, '2024-08-19 11:56:13', '2024-08-19 11:56:13'),
(457, 34, '2024-08-19 12:14:06', '2024-08-19 12:33:21', '2024-08-19 12:14:06', '2024-08-19 12:33:21'),
(458, 34, '2024-08-19 12:49:19', '2024-08-19 12:57:22', '2024-08-19 12:49:19', '2024-08-19 12:57:22'),
(459, 34, '2024-08-19 12:58:16', '2024-08-19 13:27:06', '2024-08-19 12:58:16', '2024-08-19 13:27:06'),
(460, 34, '2024-08-19 13:27:20', '2024-08-19 14:20:17', '2024-08-19 13:27:20', '2024-08-19 14:20:17'),
(461, 44, '2024-08-19 14:08:15', '2024-08-19 14:11:40', '2024-08-19 14:08:15', '2024-08-19 14:11:40'),
(462, 44, '2024-08-19 14:12:40', '2024-08-19 14:28:40', '2024-08-19 14:12:40', '2024-08-19 14:28:40'),
(463, 44, '2024-08-19 14:32:20', '2024-08-19 14:33:20', '2024-08-19 14:32:20', '2024-08-19 14:33:20'),
(464, 44, '2024-08-19 14:42:33', '2024-08-19 14:45:57', '2024-08-19 14:42:33', '2024-08-19 14:45:57'),
(465, 34, '2024-08-19 15:04:14', '2024-08-19 15:31:57', '2024-08-19 15:04:14', '2024-08-19 15:31:57'),
(466, 34, '2024-08-20 06:15:41', '2024-08-20 07:48:21', '2024-08-20 06:15:41', '2024-08-20 07:48:21'),
(467, 34, '2024-08-20 08:00:04', '2024-08-20 08:17:32', '2024-08-20 08:00:04', '2024-08-20 08:17:32'),
(468, 33, '2024-08-20 08:40:32', NULL, '2024-08-20 08:40:32', '2024-08-20 08:40:32'),
(469, 44, '2024-08-20 08:46:01', '2024-08-20 08:48:24', '2024-08-20 08:46:01', '2024-08-20 08:48:24'),
(470, 44, '2024-08-20 08:48:27', '2024-08-20 08:51:31', '2024-08-20 08:48:27', '2024-08-20 08:51:31'),
(471, 34, '2024-08-20 08:53:22', '2024-08-20 08:54:47', '2024-08-20 08:53:22', '2024-08-20 08:54:47'),
(472, 40, '2024-08-20 21:46:48', '2024-08-20 21:47:50', '2024-08-20 21:46:48', '2024-08-20 21:47:50'),
(473, 40, '2024-08-20 21:52:22', '2024-08-20 21:53:23', '2024-08-20 21:52:22', '2024-08-20 21:53:23'),
(474, 34, '2024-08-22 06:13:36', '2024-08-22 06:15:58', '2024-08-22 06:13:36', '2024-08-22 06:15:58'),
(475, 40, '2024-08-22 16:11:04', '2024-08-22 16:37:16', '2024-08-22 16:11:04', '2024-08-22 16:37:16'),
(476, 40, '2024-08-22 16:37:25', '2024-08-22 16:56:47', '2024-08-22 16:37:25', '2024-08-22 16:56:47'),
(477, 44, '2024-08-22 19:29:18', '2024-08-22 19:58:39', '2024-08-22 19:29:18', '2024-08-22 19:58:39'),
(478, 44, '2024-08-23 02:47:05', '2024-08-23 02:50:00', '2024-08-23 02:47:05', '2024-08-23 02:50:00'),
(479, 44, '2024-08-23 03:09:53', '2024-08-23 03:11:33', '2024-08-23 03:09:53', '2024-08-23 03:11:33'),
(480, 34, '2024-08-23 03:18:21', '2024-08-23 03:33:44', '2024-08-23 03:18:21', '2024-08-23 03:33:44'),
(481, 34, '2024-08-23 03:40:45', '2024-08-23 03:56:01', '2024-08-23 03:40:45', '2024-08-23 03:56:01'),
(482, 34, '2024-08-23 04:16:02', '2024-08-23 04:59:17', '2024-08-23 04:16:02', '2024-08-23 04:59:17'),
(483, 34, '2024-08-23 06:04:40', '2024-08-23 06:53:07', '2024-08-23 06:04:40', '2024-08-23 06:53:07'),
(484, 34, '2024-08-23 06:53:27', NULL, '2024-08-23 06:53:27', '2024-08-23 06:53:27'),
(485, 34, '2024-08-23 09:08:23', NULL, '2024-08-23 09:08:23', '2024-08-23 09:08:23'),
(486, 44, '2024-08-23 12:12:30', '2024-08-23 12:13:39', '2024-08-23 12:12:30', '2024-08-23 12:13:39'),
(487, 44, '2024-08-23 12:15:48', '2024-08-23 12:18:05', '2024-08-23 12:15:48', '2024-08-23 12:18:05'),
(488, 34, '2024-08-23 12:21:22', NULL, '2024-08-23 12:21:22', '2024-08-23 12:21:22'),
(489, 40, '2024-08-23 14:56:46', '2024-08-23 15:55:52', '2024-08-23 14:56:46', '2024-08-23 15:55:52'),
(490, 34, '2024-08-24 04:04:56', '2024-08-24 04:16:53', '2024-08-24 04:04:56', '2024-08-24 04:16:53'),
(491, 34, '2024-08-24 04:19:53', '2024-08-24 04:44:24', '2024-08-24 04:19:53', '2024-08-24 04:44:24'),
(492, 44, '2024-08-24 04:57:14', '2024-08-24 04:58:20', '2024-08-24 04:57:14', '2024-08-24 04:58:20'),
(493, 44, '2024-08-24 05:18:54', '2024-08-24 05:20:02', '2024-08-24 05:18:54', '2024-08-24 05:20:02'),
(494, 34, '2024-08-24 05:46:26', '2024-08-24 05:47:29', '2024-08-24 05:46:26', '2024-08-24 05:47:29'),
(495, 34, '2024-08-24 05:48:00', '2024-08-24 06:07:08', '2024-08-24 05:48:00', '2024-08-24 06:07:08'),
(496, 44, '2024-08-24 05:54:02', '2024-08-24 06:00:12', '2024-08-24 05:54:02', '2024-08-24 06:00:12'),
(497, 44, '2024-08-24 06:15:22', NULL, '2024-08-24 06:15:22', '2024-08-24 06:15:22'),
(498, 34, '2024-08-24 06:20:49', '2024-08-24 06:23:55', '2024-08-24 06:20:49', '2024-08-24 06:23:55'),
(499, 34, '2024-08-24 06:25:32', '2024-08-24 06:28:39', '2024-08-24 06:25:32', '2024-08-24 06:28:39'),
(500, 34, '2024-08-24 06:28:55', '2024-08-24 06:45:33', '2024-08-24 06:28:55', '2024-08-24 06:45:33'),
(501, 44, '2024-08-24 06:45:23', '2024-08-24 06:46:34', '2024-08-24 06:45:23', '2024-08-24 06:46:34'),
(502, 44, '2024-08-24 06:53:14', '2024-08-24 06:54:15', '2024-08-24 06:53:14', '2024-08-24 06:54:15'),
(503, 34, '2024-08-24 06:56:46', NULL, '2024-08-24 06:56:46', '2024-08-24 06:56:46'),
(504, 44, '2024-08-24 06:56:46', '2024-08-24 06:58:30', '2024-08-24 06:56:46', '2024-08-24 06:58:30'),
(505, 34, '2024-08-24 07:10:31', '2024-08-24 07:12:34', '2024-08-24 07:10:31', '2024-08-24 07:12:34'),
(506, 44, '2024-08-24 07:12:43', '2024-08-24 07:14:42', '2024-08-24 07:12:43', '2024-08-24 07:14:42'),
(507, 34, '2024-08-24 07:12:54', '2024-08-24 07:37:59', '2024-08-24 07:12:54', '2024-08-24 07:37:59'),
(508, 34, '2024-08-24 07:45:28', '2024-08-24 07:59:45', '2024-08-24 07:45:28', '2024-08-24 07:59:45'),
(509, 40, '2024-08-24 16:09:42', NULL, '2024-08-24 16:09:42', '2024-08-24 16:09:42'),
(510, 44, '2024-08-24 16:43:04', '2024-08-24 16:44:29', '2024-08-24 16:43:04', '2024-08-24 16:44:29'),
(511, 44, '2024-08-24 16:44:36', '2024-08-24 16:45:45', '2024-08-24 16:44:36', '2024-08-24 16:45:45'),
(512, 44, '2024-08-24 16:48:30', '2024-08-24 17:03:42', '2024-08-24 16:48:30', '2024-08-24 17:03:42'),
(513, 34, '2024-08-24 17:01:25', '2024-08-24 17:03:56', '2024-08-24 17:01:25', '2024-08-24 17:03:56'),
(514, 34, '2024-08-24 17:05:08', NULL, '2024-08-24 17:05:08', '2024-08-24 17:05:08'),
(515, 44, '2024-08-24 17:07:55', '2024-08-24 17:13:21', '2024-08-24 17:07:55', '2024-08-24 17:13:21'),
(516, 34, '2024-08-24 17:11:14', '2024-08-24 17:19:01', '2024-08-24 17:11:14', '2024-08-24 17:19:01'),
(517, 44, '2024-08-24 17:13:31', '2024-08-24 17:14:41', '2024-08-24 17:13:31', '2024-08-24 17:14:41'),
(518, 34, '2024-08-24 17:19:21', '2024-08-24 17:35:29', '2024-08-24 17:19:21', '2024-08-24 17:35:29'),
(519, 44, '2024-08-24 21:40:27', '2024-08-24 21:42:03', '2024-08-24 21:40:27', '2024-08-24 21:42:03'),
(520, 44, '2024-08-24 23:52:57', NULL, '2024-08-24 23:52:57', '2024-08-24 23:52:57'),
(521, 34, '2024-08-25 02:24:36', '2024-08-25 02:45:18', '2024-08-25 02:24:36', '2024-08-25 02:45:18'),
(522, 34, '2024-08-25 02:46:34', '2024-08-25 02:53:44', '2024-08-25 02:46:34', '2024-08-25 02:53:44'),
(523, 34, '2024-08-25 02:54:05', '2024-08-25 02:55:24', '2024-08-25 02:54:05', '2024-08-25 02:55:24');
INSERT INTO `time_logs` (`id`, `user_id`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(524, 34, '2024-08-25 02:56:39', '2024-08-25 02:58:12', '2024-08-25 02:56:39', '2024-08-25 02:58:12'),
(525, 34, '2024-08-25 03:01:28', '2024-08-25 03:21:37', '2024-08-25 03:01:28', '2024-08-25 03:21:37'),
(526, 34, '2024-08-25 03:21:51', '2024-08-25 03:29:23', '2024-08-25 03:21:51', '2024-08-25 03:29:23'),
(527, 34, '2024-08-25 03:29:52', '2024-08-25 03:36:44', '2024-08-25 03:29:52', '2024-08-25 03:36:44'),
(528, 44, '2024-08-25 04:40:00', '2024-08-25 04:41:26', '2024-08-25 04:40:00', '2024-08-25 04:41:26'),
(529, 34, '2024-08-25 04:40:18', '2024-08-25 04:41:47', '2024-08-25 04:40:18', '2024-08-25 04:41:47'),
(530, 34, '2024-08-25 04:42:12', '2024-08-25 05:09:08', '2024-08-25 04:42:12', '2024-08-25 05:09:08'),
(531, 44, '2024-08-25 04:50:19', '2024-08-25 04:51:26', '2024-08-25 04:50:19', '2024-08-25 04:51:26'),
(532, 44, '2024-08-25 04:58:04', '2024-08-25 04:59:11', '2024-08-25 04:58:04', '2024-08-25 04:59:11'),
(533, 44, '2024-08-25 04:59:27', '2024-08-25 05:01:29', '2024-08-25 04:59:27', '2024-08-25 05:01:29'),
(534, 44, '2024-08-25 05:08:33', '2024-08-25 05:10:06', '2024-08-25 05:08:33', '2024-08-25 05:10:06'),
(535, 44, '2024-08-25 05:18:41', '2024-08-25 05:20:13', '2024-08-25 05:18:41', '2024-08-25 05:20:13'),
(536, 44, '2024-08-25 05:22:29', '2024-08-25 05:31:05', '2024-08-25 05:22:29', '2024-08-25 05:31:05'),
(537, 44, '2024-08-25 05:32:25', '2024-08-25 05:35:51', '2024-08-25 05:32:25', '2024-08-25 05:35:51'),
(538, 44, '2024-08-25 05:35:54', '2024-08-25 05:37:30', '2024-08-25 05:35:54', '2024-08-25 05:37:30'),
(539, 34, '2024-08-25 01:59:15', '2024-08-25 02:31:52', '2024-08-25 05:59:15', '2024-08-25 06:31:52'),
(540, 34, '2024-08-25 03:27:26', '2024-08-25 03:37:12', '2024-08-25 07:27:26', '2024-08-25 07:37:12'),
(541, 34, '2024-08-25 03:38:57', '2024-08-25 03:40:19', '2024-08-25 07:38:57', '2024-08-25 07:40:19'),
(542, 44, '2024-08-25 03:41:31', '2024-08-25 03:57:15', '2024-08-25 07:41:31', '2024-08-25 07:57:15'),
(543, 34, '2024-08-25 03:58:39', '2024-08-25 04:07:10', '2024-08-25 07:58:39', '2024-08-25 08:07:10'),
(544, 34, '2024-08-25 04:07:29', '2024-08-25 04:27:02', '2024-08-25 08:07:29', '2024-08-25 08:27:02'),
(545, 44, '2024-08-25 15:48:30', '2024-08-25 15:49:32', '2024-08-25 19:48:30', '2024-08-25 19:49:32'),
(546, 44, '2024-08-25 15:51:02', '2024-08-25 16:06:44', '2024-08-25 19:51:02', '2024-08-25 20:06:44'),
(547, 44, '2024-08-25 19:01:44', '2024-08-25 19:03:51', '2024-08-25 23:01:44', '2024-08-25 23:03:51'),
(548, 44, '2024-08-25 19:06:16', '2024-08-25 19:15:33', '2024-08-25 23:06:16', '2024-08-25 23:15:33'),
(549, 44, '2024-08-25 19:25:04', NULL, '2024-08-25 23:25:04', '2024-08-25 23:25:04'),
(550, 40, '2024-08-29 14:42:46', '2024-08-29 14:43:48', '2024-08-29 18:42:46', '2024-08-29 18:43:48'),
(551, 44, '2024-08-30 06:16:44', '2024-08-30 06:36:52', '2024-08-30 10:16:44', '2024-08-30 10:36:52'),
(552, 44, '2024-08-30 06:40:17', '2024-08-30 06:50:51', '2024-08-30 10:40:17', '2024-08-30 10:50:51'),
(553, 44, '2024-08-30 06:50:56', '2024-08-30 07:07:24', '2024-08-30 10:50:56', '2024-08-30 11:07:24'),
(554, 44, '2024-08-30 07:58:52', '2024-08-30 08:20:29', '2024-08-30 11:58:52', '2024-08-30 12:20:29'),
(555, 44, '2024-08-30 16:28:11', '2024-08-30 16:43:49', '2024-08-30 20:28:11', '2024-08-30 20:43:49'),
(556, 34, '2024-08-30 23:56:08', '2024-08-31 00:03:23', '2024-08-31 03:56:08', '2024-08-31 04:03:23'),
(557, 34, '2024-08-31 00:19:31', '2024-08-31 00:22:39', '2024-08-31 04:19:31', '2024-08-31 04:22:39'),
(558, 34, '2024-08-31 00:33:35', '2024-08-31 00:52:02', '2024-08-31 04:33:35', '2024-08-31 04:52:02'),
(559, 34, '2024-08-31 01:04:00', '2024-08-31 01:09:35', '2024-08-31 05:04:00', '2024-08-31 05:09:35'),
(560, 34, '2024-08-31 01:12:01', '2024-08-31 01:17:32', '2024-08-31 05:12:01', '2024-08-31 05:17:32'),
(561, 34, '2024-08-31 01:21:48', '2024-08-31 01:27:34', '2024-08-31 05:21:48', '2024-08-31 05:27:34'),
(562, 34, '2024-08-31 01:28:17', '2024-08-31 01:45:21', '2024-08-31 05:28:17', '2024-08-31 05:45:21'),
(563, 34, '2024-08-31 01:58:30', '2024-08-31 02:10:53', '2024-08-31 05:58:30', '2024-08-31 06:10:53'),
(564, 34, '2024-08-31 02:12:15', '2024-08-31 02:34:41', '2024-08-31 06:12:15', '2024-08-31 06:34:41'),
(565, 44, '2024-09-01 22:41:22', '2024-09-01 22:58:37', '2024-09-02 02:41:22', '2024-09-02 02:58:37'),
(566, 44, '2024-09-02 09:34:37', '2024-09-02 09:46:28', '2024-09-02 13:34:37', '2024-09-02 13:46:28'),
(567, 44, '2024-09-02 09:53:17', NULL, '2024-09-02 13:53:17', '2024-09-02 13:53:17'),
(568, 44, '2024-09-02 09:56:28', '2024-09-02 09:57:34', '2024-09-02 13:56:28', '2024-09-02 13:57:34'),
(569, 34, '2024-09-02 10:40:38', '2024-09-02 10:43:18', '2024-09-02 14:40:38', '2024-09-02 14:43:18'),
(570, 44, '2024-09-02 11:09:24', '2024-09-02 11:15:52', '2024-09-02 15:09:24', '2024-09-02 15:15:52'),
(571, 34, '2024-09-02 11:17:58', '2024-09-02 11:32:58', '2024-09-02 15:17:58', '2024-09-02 15:32:58'),
(572, 44, '2024-09-02 11:24:09', '2024-09-02 11:25:24', '2024-09-02 15:24:09', '2024-09-02 15:25:24'),
(573, 34, '2024-09-02 11:36:56', '2024-09-02 12:01:09', '2024-09-02 15:36:56', '2024-09-02 16:01:09'),
(574, 44, '2024-09-02 12:15:20', '2024-09-02 12:27:56', '2024-09-02 16:15:20', '2024-09-02 16:27:56'),
(575, 44, '2024-09-02 12:28:25', '2024-09-02 12:34:32', '2024-09-02 16:28:25', '2024-09-02 16:34:32'),
(576, 33, '2024-09-02 12:34:37', '2024-09-02 12:41:24', '2024-09-02 16:34:37', '2024-09-02 16:41:24'),
(577, 33, '2024-09-02 12:42:02', '2024-09-02 12:44:44', '2024-09-02 16:42:02', '2024-09-02 16:44:44'),
(578, 33, '2024-09-02 12:44:46', '2024-09-02 12:53:01', '2024-09-02 16:44:46', '2024-09-02 16:53:01'),
(579, 33, '2024-09-02 12:55:47', '2024-09-02 13:14:59', '2024-09-02 16:55:47', '2024-09-02 17:14:59'),
(580, 33, '2024-09-02 18:04:33', '2024-09-02 18:16:09', '2024-09-02 22:04:33', '2024-09-02 22:16:09'),
(581, 33, '2024-09-02 18:16:15', '2024-09-02 18:21:24', '2024-09-02 22:16:15', '2024-09-02 22:21:24'),
(582, 44, '2024-09-02 18:25:21', '2024-09-02 18:43:19', '2024-09-02 22:25:21', '2024-09-02 22:43:19'),
(583, 44, '2024-09-03 00:28:52', '2024-09-03 00:42:00', '2024-09-03 04:28:52', '2024-09-03 04:42:00'),
(584, 34, '2024-09-03 00:34:28', '2024-09-03 00:40:59', '2024-09-03 04:34:28', '2024-09-03 04:40:59'),
(585, 34, '2024-09-03 00:41:41', '2024-09-03 00:46:12', '2024-09-03 04:41:41', '2024-09-03 04:46:12'),
(586, 44, '2024-09-03 00:42:26', '2024-09-03 00:45:24', '2024-09-03 04:42:26', '2024-09-03 04:45:24'),
(587, 44, '2024-09-03 00:48:37', '2024-09-03 00:50:34', '2024-09-03 04:48:37', '2024-09-03 04:50:34'),
(588, 34, '2024-09-03 01:02:07', '2024-09-03 01:03:52', '2024-09-03 05:02:07', '2024-09-03 05:03:52'),
(589, 34, '2024-09-03 01:09:32', NULL, '2024-09-03 05:09:32', '2024-09-03 05:09:32'),
(590, 40, '2024-09-03 09:34:16', '2024-09-03 09:37:28', '2024-09-03 13:34:16', '2024-09-03 13:37:28'),
(591, 40, '2024-09-03 09:38:12', '2024-09-03 09:39:22', '2024-09-03 13:38:12', '2024-09-03 13:39:22'),
(592, 40, '2024-09-03 09:39:43', '2024-09-03 09:40:44', '2024-09-03 13:39:43', '2024-09-03 13:40:44'),
(593, 40, '2024-09-03 09:49:28', '2024-09-03 09:55:39', '2024-09-03 13:49:28', '2024-09-03 13:55:39'),
(594, 40, '2024-09-03 10:00:14', '2024-09-03 10:07:56', '2024-09-03 14:00:14', '2024-09-03 14:07:56'),
(595, 40, '2024-09-03 10:48:30', '2024-09-03 11:17:07', '2024-09-03 14:48:30', '2024-09-03 15:17:07'),
(596, 40, '2024-09-03 11:33:44', '2024-09-03 11:49:18', '2024-09-03 15:33:44', '2024-09-03 15:49:18'),
(597, 44, '2024-09-03 16:27:22', '2024-09-03 16:28:22', '2024-09-03 20:27:22', '2024-09-03 20:28:22'),
(598, 34, '2024-09-03 22:10:58', '2024-09-03 22:27:30', '2024-09-04 02:10:58', '2024-09-04 02:27:30'),
(599, 34, '2024-09-03 22:30:52', '2024-09-03 22:35:56', '2024-09-04 02:30:52', '2024-09-04 02:35:56'),
(600, 44, '2024-09-03 22:40:23', '2024-09-03 22:41:33', '2024-09-04 02:40:23', '2024-09-04 02:41:33'),
(601, 34, '2024-09-03 22:59:33', '2024-09-03 23:00:36', '2024-09-04 02:59:33', '2024-09-04 03:00:36'),
(602, 44, '2024-09-03 23:45:52', '2024-09-03 23:56:21', '2024-09-04 03:45:52', '2024-09-04 03:56:21'),
(603, 44, '2024-09-03 23:59:04', '2024-09-04 00:03:22', '2024-09-04 03:59:04', '2024-09-04 04:03:22'),
(604, 44, '2024-09-04 00:03:32', '2024-09-04 00:12:42', '2024-09-04 04:03:32', '2024-09-04 04:12:42'),
(605, 34, '2024-09-04 00:15:10', '2024-09-04 00:30:48', '2024-09-04 04:15:10', '2024-09-04 04:30:48'),
(606, 34, '2024-09-04 00:42:06', '2024-09-04 00:58:06', '2024-09-04 04:42:06', '2024-09-04 04:58:06'),
(607, 34, '2024-09-04 01:26:36', '2024-09-04 01:42:58', '2024-09-04 05:26:36', '2024-09-04 05:42:58'),
(608, 44, '2024-09-04 09:13:35', '2024-09-04 09:45:30', '2024-09-04 13:13:35', '2024-09-04 13:45:30'),
(609, 34, '2024-09-04 09:22:58', '2024-09-04 09:25:21', '2024-09-04 13:22:58', '2024-09-04 13:25:21'),
(610, 34, '2024-09-04 09:28:18', '2024-09-04 09:42:14', '2024-09-04 13:28:18', '2024-09-04 13:42:14'),
(611, 44, '2024-09-04 09:49:37', '2024-09-04 09:57:44', '2024-09-04 13:49:37', '2024-09-04 13:57:44'),
(612, 44, '2024-09-04 09:59:16', '2024-09-04 10:01:54', '2024-09-04 13:59:16', '2024-09-04 14:01:54'),
(613, 34, '2024-09-04 10:02:23', '2024-09-04 10:04:29', '2024-09-04 14:02:23', '2024-09-04 14:04:29'),
(614, 34, '2024-09-04 10:08:54', '2024-09-04 10:11:09', '2024-09-04 14:08:54', '2024-09-04 14:11:09'),
(615, 44, '2024-09-04 10:11:51', '2024-09-04 10:13:20', '2024-09-04 14:11:51', '2024-09-04 14:13:20'),
(616, 44, '2024-09-04 10:15:47', '2024-09-04 10:17:09', '2024-09-04 14:15:47', '2024-09-04 14:17:09'),
(617, 44, '2024-09-04 10:18:43', '2024-09-04 10:21:00', '2024-09-04 14:18:43', '2024-09-04 14:21:00'),
(618, 34, '2024-09-04 10:20:05', '2024-09-04 10:38:15', '2024-09-04 14:20:05', '2024-09-04 14:38:15'),
(619, 44, '2024-09-04 10:32:07', '2024-09-04 10:33:37', '2024-09-04 14:32:07', '2024-09-04 14:33:37'),
(620, 44, '2024-09-04 10:33:41', '2024-09-04 10:35:48', '2024-09-04 14:33:41', '2024-09-04 14:35:48'),
(621, 44, '2024-09-04 10:36:01', '2024-09-04 10:39:10', '2024-09-04 14:36:01', '2024-09-04 14:39:10'),
(622, 44, '2024-09-04 10:40:52', '2024-09-04 10:41:57', '2024-09-04 14:40:52', '2024-09-04 14:41:57'),
(623, 44, '2024-09-04 10:48:01', '2024-09-04 10:52:55', '2024-09-04 14:48:01', '2024-09-04 14:52:55'),
(624, 34, '2024-09-04 10:50:53', '2024-09-04 10:56:08', '2024-09-04 14:50:53', '2024-09-04 14:56:08'),
(625, 44, '2024-09-04 10:58:50', '2024-09-04 11:11:53', '2024-09-04 14:58:50', '2024-09-04 15:11:53'),
(626, 34, '2024-09-04 11:01:06', '2024-09-04 11:09:58', '2024-09-04 15:01:06', '2024-09-04 15:09:58'),
(627, 44, '2024-09-04 11:13:36', '2024-09-04 11:17:39', '2024-09-04 15:13:36', '2024-09-04 15:17:39'),
(628, 34, '2024-09-04 11:18:24', '2024-09-04 11:39:42', '2024-09-04 15:18:24', '2024-09-04 15:39:42'),
(629, 44, '2024-09-04 11:19:27', '2024-09-04 11:20:33', '2024-09-04 15:19:27', '2024-09-04 15:20:33'),
(630, 44, '2024-09-04 11:23:12', '2024-09-04 11:24:17', '2024-09-04 15:23:12', '2024-09-04 15:24:17'),
(631, 44, '2024-09-04 11:25:35', '2024-09-04 11:26:54', '2024-09-04 15:25:35', '2024-09-04 15:26:54'),
(632, 44, '2024-09-04 11:32:36', '2024-09-04 11:39:34', '2024-09-04 15:32:36', '2024-09-04 15:39:34'),
(633, 44, '2024-09-04 11:41:20', '2024-09-04 11:42:32', '2024-09-04 15:41:20', '2024-09-04 15:42:32'),
(634, 40, '2024-09-04 12:22:20', '2024-09-04 12:39:41', '2024-09-04 16:22:20', '2024-09-04 16:39:41'),
(635, 40, '2024-09-04 12:39:50', '2024-09-04 12:41:45', '2024-09-04 16:39:50', '2024-09-04 16:41:45'),
(636, 40, '2024-09-04 12:53:47', '2024-09-04 13:09:23', '2024-09-04 16:53:47', '2024-09-04 17:09:23'),
(637, 40, '2024-09-04 13:16:33', '2024-09-04 13:18:41', '2024-09-04 17:16:33', '2024-09-04 17:18:41'),
(638, 40, '2024-09-04 13:19:13', '2024-09-04 13:34:19', '2024-09-04 17:19:13', '2024-09-04 17:34:19'),
(639, 34, '2024-09-05 05:46:10', '2024-09-05 05:56:10', '2024-09-05 09:46:10', '2024-09-05 09:56:10'),
(640, 44, '2024-09-05 06:51:21', '2024-09-05 07:13:21', '2024-09-05 10:51:21', '2024-09-05 11:13:21'),
(641, 44, '2024-09-05 07:42:08', '2024-09-05 07:48:06', '2024-09-05 11:42:08', '2024-09-05 11:48:06'),
(642, 44, '2024-09-05 07:55:39', '2024-09-05 07:56:51', '2024-09-05 11:55:39', '2024-09-05 11:56:51'),
(643, 44, '2024-09-05 07:57:11', '2024-09-05 07:58:14', '2024-09-05 11:57:11', '2024-09-05 11:58:14'),
(644, 44, '2024-09-05 07:58:50', '2024-09-05 07:59:52', '2024-09-05 11:58:50', '2024-09-05 11:59:52'),
(645, 44, '2024-09-05 08:00:44', '2024-09-05 08:02:25', '2024-09-05 12:00:44', '2024-09-05 12:02:25'),
(646, 44, '2024-09-05 08:03:46', '2024-09-05 08:05:21', '2024-09-05 12:03:46', '2024-09-05 12:05:21'),
(647, 44, '2024-09-05 08:05:31', NULL, '2024-09-05 12:05:31', '2024-09-05 12:05:31'),
(648, 34, '2024-09-05 08:07:05', '2024-09-05 08:41:12', '2024-09-05 12:07:05', '2024-09-05 12:41:12'),
(649, 44, '2024-09-05 08:15:23', '2024-09-05 08:16:37', '2024-09-05 12:15:23', '2024-09-05 12:16:37'),
(650, 44, '2024-09-05 08:16:42', '2024-09-05 08:17:57', '2024-09-05 12:16:42', '2024-09-05 12:17:57'),
(651, 44, '2024-09-05 08:19:15', '2024-09-05 08:20:34', '2024-09-05 12:19:15', '2024-09-05 12:20:34'),
(652, 44, '2024-09-05 08:27:32', '2024-09-05 09:02:43', '2024-09-05 12:27:32', '2024-09-05 13:02:43'),
(653, 44, '2024-09-05 09:09:57', '2024-09-05 09:11:00', '2024-09-05 13:09:57', '2024-09-05 13:11:00'),
(654, 44, '2024-09-05 09:11:35', '2024-09-05 09:27:50', '2024-09-05 13:11:35', '2024-09-05 13:27:50'),
(655, 44, '2024-09-05 09:32:12', '2024-09-05 09:33:26', '2024-09-05 13:32:12', '2024-09-05 13:33:26'),
(656, 44, '2024-09-05 09:36:31', '2024-09-05 09:37:44', '2024-09-05 13:36:31', '2024-09-05 13:37:44'),
(657, 44, '2024-09-05 09:38:05', '2024-09-05 09:39:39', '2024-09-05 13:38:05', '2024-09-05 13:39:39'),
(658, 44, '2024-09-05 09:42:23', '2024-09-05 09:43:25', '2024-09-05 13:42:23', '2024-09-05 13:43:25'),
(659, 44, '2024-09-05 09:43:29', '2024-09-05 09:44:58', '2024-09-05 13:43:29', '2024-09-05 13:44:58'),
(660, 44, '2024-09-05 09:45:44', '2024-09-05 09:55:54', '2024-09-05 13:45:44', '2024-09-05 13:55:54'),
(661, 44, '2024-09-05 09:59:39', NULL, '2024-09-05 13:59:39', '2024-09-05 13:59:39'),
(662, 44, '2024-09-05 10:05:04', '2024-09-05 10:25:13', '2024-09-05 14:05:04', '2024-09-05 14:25:13'),
(663, 40, '2024-09-05 15:40:03', '2024-09-05 15:42:09', '2024-09-05 19:40:03', '2024-09-05 19:42:09'),
(664, 40, '2024-09-05 15:47:54', '2024-09-05 15:48:55', '2024-09-05 19:47:54', '2024-09-05 19:48:55'),
(665, 40, '2024-09-05 15:51:32', '2024-09-05 16:16:04', '2024-09-05 19:51:32', '2024-09-05 20:16:04'),
(666, 40, '2024-09-05 16:55:15', '2024-09-05 16:56:27', '2024-09-05 20:55:15', '2024-09-05 20:56:27'),
(667, 40, '2024-09-06 15:32:55', '2024-09-06 15:33:56', '2024-09-06 19:32:55', '2024-09-06 19:33:56'),
(668, 40, '2024-09-08 08:25:38', NULL, '2024-09-08 12:25:38', '2024-09-08 12:25:38'),
(669, 40, '2024-09-08 21:32:34', '2024-09-08 21:34:39', '2024-09-09 01:32:34', '2024-09-09 01:34:39'),
(670, 40, '2024-09-08 21:37:22', '2024-09-08 22:12:07', '2024-09-09 01:37:22', '2024-09-09 02:12:07'),
(671, 40, '2024-09-08 22:12:13', '2024-09-08 22:58:24', '2024-09-09 02:12:13', '2024-09-09 02:58:24'),
(672, 40, '2024-09-08 22:58:31', '2024-09-08 23:02:46', '2024-09-09 02:58:31', '2024-09-09 03:02:46'),
(673, 40, '2024-09-08 23:05:58', '2024-09-08 23:52:16', '2024-09-09 03:05:58', '2024-09-09 03:52:16'),
(674, 40, '2024-09-08 23:52:28', '2024-09-08 23:53:46', '2024-09-09 03:52:28', '2024-09-09 03:53:46'),
(675, 40, '2024-09-08 23:54:40', '2024-09-09 00:05:20', '2024-09-09 03:54:40', '2024-09-09 04:05:20'),
(676, 40, '2024-09-09 00:06:07', NULL, '2024-09-09 04:06:07', '2024-09-09 04:06:07'),
(677, 40, '2024-09-09 00:11:44', '2024-09-09 00:13:00', '2024-09-09 04:11:44', '2024-09-09 04:13:00'),
(678, 40, '2024-09-09 00:13:23', NULL, '2024-09-09 04:13:23', '2024-09-09 04:13:23'),
(679, 40, '2024-09-09 00:13:53', '2024-09-09 00:15:07', '2024-09-09 04:13:53', '2024-09-09 04:15:07'),
(680, 40, '2024-09-09 00:16:09', NULL, '2024-09-09 04:16:09', '2024-09-09 04:16:09'),
(681, 40, '2024-09-09 00:22:45', '2024-09-09 00:39:04', '2024-09-09 04:22:45', '2024-09-09 04:39:04'),
(682, 40, '2024-09-09 02:10:55', NULL, '2024-09-09 06:10:55', '2024-09-09 06:10:55'),
(683, 40, '2024-09-09 09:50:43', NULL, '2024-09-09 13:50:43', '2024-09-09 13:50:43'),
(684, 40, '2024-09-09 10:41:19', '2024-09-09 10:56:40', '2024-09-09 14:41:19', '2024-09-09 14:56:40'),
(685, 44, '2024-09-09 10:41:38', '2024-09-09 10:44:01', '2024-09-09 14:41:38', '2024-09-09 14:44:01'),
(686, 44, '2024-09-09 10:44:13', '2024-09-09 10:52:30', '2024-09-09 14:44:13', '2024-09-09 14:52:30'),
(687, 44, '2024-09-09 10:52:45', NULL, '2024-09-09 14:52:45', '2024-09-09 14:52:45'),
(688, 44, '2024-09-09 10:52:54', NULL, '2024-09-09 14:52:54', '2024-09-09 14:52:54'),
(689, 44, '2024-09-09 10:52:59', NULL, '2024-09-09 14:52:59', '2024-09-09 14:52:59'),
(690, 44, '2024-09-09 10:53:29', '2024-09-09 11:10:09', '2024-09-09 14:53:29', '2024-09-09 15:10:09'),
(691, 44, '2024-09-09 11:13:27', '2024-09-09 11:21:53', '2024-09-09 15:13:27', '2024-09-09 15:21:53'),
(692, 44, '2024-09-09 11:21:59', '2024-09-09 11:40:27', '2024-09-09 15:21:59', '2024-09-09 15:40:27'),
(693, 44, '2024-09-09 13:23:37', '2024-09-09 13:30:43', '2024-09-09 17:23:37', '2024-09-09 17:30:43'),
(694, 34, '2024-09-09 22:47:22', '2024-09-09 22:55:26', '2024-09-10 02:47:22', '2024-09-10 02:55:26'),
(695, 34, '2024-09-09 22:56:50', '2024-09-09 23:01:46', '2024-09-10 02:56:50', '2024-09-10 03:01:46'),
(696, 34, '2024-09-09 23:03:02', NULL, '2024-09-10 03:03:02', '2024-09-10 03:03:02'),
(697, 34, '2024-09-09 23:05:01', '2024-09-09 23:05:26', '2024-09-10 03:05:01', '2024-09-10 03:05:26'),
(698, 34, '2024-09-09 23:09:45', '2024-09-10 00:13:02', '2024-09-10 03:09:45', '2024-09-10 04:13:02'),
(699, 44, '2024-09-09 23:41:07', '2024-09-10 00:15:17', '2024-09-10 03:41:07', '2024-09-10 04:15:17'),
(700, 34, '2024-09-10 00:15:03', '2024-09-10 00:17:33', '2024-09-10 04:15:03', '2024-09-10 04:17:33'),
(701, 44, '2024-09-10 00:15:22', '2024-09-10 00:54:41', '2024-09-10 04:15:22', '2024-09-10 04:54:41'),
(702, 34, '2024-09-10 00:17:58', NULL, '2024-09-10 04:17:58', '2024-09-10 04:17:58'),
(703, 34, '2024-09-10 00:20:05', '2024-09-10 00:25:49', '2024-09-10 04:20:05', '2024-09-10 04:25:49'),
(704, 34, '2024-09-10 00:32:54', '2024-09-10 00:35:25', '2024-09-10 04:32:54', '2024-09-10 04:35:25'),
(705, 34, '2024-09-10 00:45:02', '2024-09-10 00:46:27', '2024-09-10 04:45:02', '2024-09-10 04:46:27'),
(706, 34, '2024-09-10 00:46:48', '2024-09-10 00:51:25', '2024-09-10 04:46:48', '2024-09-10 04:51:25'),
(707, 34, '2024-09-10 00:52:53', '2024-09-10 00:53:46', '2024-09-10 04:52:53', '2024-09-10 04:53:46'),
(708, 44, '2024-09-10 00:54:55', '2024-09-10 01:16:29', '2024-09-10 04:54:55', '2024-09-10 05:16:29'),
(709, 34, '2024-09-10 00:54:55', '2024-09-10 00:56:55', '2024-09-10 04:54:55', '2024-09-10 04:56:55'),
(710, 34, '2024-09-10 00:58:26', '2024-09-10 00:59:39', '2024-09-10 04:58:26', '2024-09-10 04:59:39'),
(711, 34, '2024-09-10 01:06:39', NULL, '2024-09-10 05:06:39', '2024-09-10 05:06:39'),
(712, 34, '2024-09-10 01:09:56', '2024-09-10 01:13:59', '2024-09-10 05:09:56', '2024-09-10 05:13:59'),
(713, 34, '2024-09-10 01:14:20', NULL, '2024-09-10 05:14:20', '2024-09-10 05:14:20'),
(714, 34, '2024-09-10 01:16:57', NULL, '2024-09-10 05:16:57', '2024-09-10 05:16:57'),
(715, 34, '2024-09-10 01:18:22', NULL, '2024-09-10 05:18:22', '2024-09-10 05:18:22'),
(716, 34, '2024-09-10 01:19:53', NULL, '2024-09-10 05:19:53', '2024-09-10 05:19:53'),
(717, 34, '2024-09-10 01:22:45', NULL, '2024-09-10 05:22:45', '2024-09-10 05:22:45'),
(718, 34, '2024-09-10 01:25:54', '2024-09-10 01:46:56', '2024-09-10 05:25:54', '2024-09-10 05:46:56'),
(719, 44, '2024-09-10 01:27:45', '2024-09-10 01:28:54', '2024-09-10 05:27:45', '2024-09-10 05:28:54'),
(720, 34, '2024-09-10 01:54:42', '2024-09-10 01:55:21', '2024-09-10 05:54:42', '2024-09-10 05:55:21'),
(721, 34, '2024-09-10 01:59:04', '2024-09-10 02:10:49', '2024-09-10 05:59:04', '2024-09-10 06:10:49'),
(722, 34, '2024-09-10 03:09:20', '2024-09-10 03:10:01', '2024-09-10 07:09:20', '2024-09-10 07:10:01'),
(723, 40, '2024-09-11 10:24:37', NULL, '2024-09-11 14:24:37', '2024-09-11 14:24:37'),
(724, 40, '2024-09-11 10:25:06', '2024-09-11 10:25:42', '2024-09-11 14:25:06', '2024-09-11 14:25:42'),
(725, 44, '2024-09-11 11:11:27', '2024-09-11 11:12:30', '2024-09-11 15:11:27', '2024-09-11 15:12:30'),
(726, 44, '2024-09-11 11:16:23', '2024-09-11 11:18:04', '2024-09-11 15:16:23', '2024-09-11 15:18:04'),
(727, 44, '2024-09-11 11:24:49', '2024-09-11 11:25:56', '2024-09-11 15:24:49', '2024-09-11 15:25:56'),
(728, 44, '2024-09-11 11:32:43', '2024-09-11 11:34:03', '2024-09-11 15:32:43', '2024-09-11 15:34:03'),
(729, 44, '2024-09-11 11:36:29', '2024-09-11 11:51:59', '2024-09-11 15:36:29', '2024-09-11 15:51:59'),
(730, 44, '2024-09-11 18:13:55', NULL, '2024-09-11 22:13:55', '2024-09-11 22:13:55'),
(731, 40, '2024-09-11 21:15:47', NULL, '2024-09-12 01:15:47', '2024-09-12 01:15:47'),
(732, 44, '2024-09-11 21:19:09', '2024-09-11 21:20:11', '2024-09-12 01:19:09', '2024-09-12 01:20:11'),
(733, 40, '2024-09-11 21:22:24', NULL, '2024-09-12 01:22:24', '2024-09-12 01:22:24'),
(734, 44, '2024-09-11 21:23:21', '2024-09-11 21:24:21', '2024-09-12 01:23:21', '2024-09-12 01:24:21'),
(735, 44, '2024-09-11 21:24:26', '2024-09-11 21:26:44', '2024-09-12 01:24:26', '2024-09-12 01:26:44'),
(736, 44, '2024-09-11 21:27:16', NULL, '2024-09-12 01:27:16', '2024-09-12 01:27:16'),
(737, 40, '2024-09-12 10:08:11', NULL, '2024-09-12 14:08:11', '2024-09-12 14:08:11'),
(738, 40, '2024-09-12 14:43:48', NULL, '2024-09-12 18:43:48', '2024-09-12 18:43:48'),
(739, 40, '2024-09-12 21:24:34', NULL, '2024-09-13 01:24:34', '2024-09-13 01:24:34'),
(740, 34, '2024-09-12 23:21:31', '2024-09-12 23:29:26', '2024-09-13 03:21:31', '2024-09-13 03:29:26'),
(741, 34, '2024-09-12 23:29:45', '2024-09-13 00:47:13', '2024-09-13 03:29:45', '2024-09-13 04:47:13'),
(742, 33, '2024-09-13 00:02:20', '2024-09-13 00:33:56', '2024-09-13 04:02:20', '2024-09-13 04:33:56'),
(743, 33, '2024-09-13 00:38:59', NULL, '2024-09-13 04:38:59', '2024-09-13 04:38:59'),
(744, 34, '2024-09-13 00:47:31', NULL, '2024-09-13 04:47:31', '2024-09-13 04:47:31'),
(745, 34, '2024-09-13 00:54:33', NULL, '2024-09-13 04:54:33', '2024-09-13 04:54:33'),
(746, 40, '2024-09-13 09:56:59', NULL, '2024-09-13 13:56:59', '2024-09-13 13:56:59'),
(747, 40, '2024-09-14 08:27:44', NULL, '2024-09-14 12:27:44', '2024-09-14 12:27:44'),
(748, 40, '2024-09-14 13:05:35', NULL, '2024-09-14 17:05:35', '2024-09-14 17:05:35'),
(749, 40, '2024-09-14 13:06:15', '2024-09-14 13:20:43', '2024-09-14 17:06:15', '2024-09-14 17:20:43'),
(750, 40, '2024-09-14 13:20:52', '2024-09-14 13:28:10', '2024-09-14 17:20:52', '2024-09-14 17:28:10'),
(751, 40, '2024-09-14 13:28:20', NULL, '2024-09-14 17:28:20', '2024-09-14 17:28:20'),
(752, 40, '2024-09-14 13:33:20', '2024-09-14 13:34:21', '2024-09-14 17:33:20', '2024-09-14 17:34:21'),
(753, 40, '2024-09-14 13:34:49', '2024-09-14 13:35:49', '2024-09-14 17:34:49', '2024-09-14 17:35:49'),
(754, 40, '2024-09-14 13:36:32', '2024-09-14 13:38:02', '2024-09-14 17:36:32', '2024-09-14 17:38:02'),
(755, 40, '2024-09-14 13:38:12', '2024-09-14 13:39:12', '2024-09-14 17:38:12', '2024-09-14 17:39:12'),
(756, 40, '2024-09-14 13:39:26', '2024-09-14 13:41:49', '2024-09-14 17:39:26', '2024-09-14 17:41:49'),
(757, 40, '2024-09-14 13:42:02', '2024-09-14 13:43:03', '2024-09-14 17:42:02', '2024-09-14 17:43:03'),
(758, 40, '2024-09-14 13:43:27', '2024-09-14 13:44:28', '2024-09-14 17:43:27', '2024-09-14 17:44:28'),
(759, 40, '2024-09-14 13:44:37', '2024-09-14 14:08:02', '2024-09-14 17:44:37', '2024-09-14 18:08:02'),
(760, 40, '2024-09-14 14:08:44', NULL, '2024-09-14 18:08:44', '2024-09-14 18:08:44'),
(761, 44, '2024-09-14 14:09:09', '2024-09-14 14:10:10', '2024-09-14 18:09:09', '2024-09-14 18:10:10'),
(762, 40, '2024-09-14 14:12:53', '2024-09-14 14:15:06', '2024-09-14 18:12:53', '2024-09-14 18:15:06'),
(763, 40, '2024-09-14 14:16:27', '2024-09-14 14:18:34', '2024-09-14 18:16:27', '2024-09-14 18:18:34'),
(764, 40, '2024-09-14 14:18:43', '2024-09-14 14:21:02', '2024-09-14 18:18:43', '2024-09-14 18:21:02'),
(765, 40, '2024-09-14 14:22:07', '2024-09-14 14:27:11', '2024-09-14 18:22:07', '2024-09-14 18:27:11'),
(766, 34, '2024-09-14 14:28:10', '2024-09-14 14:35:13', '2024-09-14 18:28:10', '2024-09-14 18:35:13'),
(767, 40, '2024-09-14 14:28:15', '2024-09-14 14:46:54', '2024-09-14 18:28:15', '2024-09-14 18:46:54'),
(768, 44, '2024-09-14 14:29:30', '2024-09-14 14:31:16', '2024-09-14 18:29:30', '2024-09-14 18:31:16'),
(769, 44, '2024-09-14 14:31:45', NULL, '2024-09-14 18:31:45', '2024-09-14 18:31:45'),
(770, 34, '2024-09-14 14:36:02', '2024-09-14 14:50:09', '2024-09-14 18:36:02', '2024-09-14 18:50:09'),
(771, 44, '2024-09-14 14:39:43', '2024-09-14 14:48:12', '2024-09-14 18:39:43', '2024-09-14 18:48:12'),
(772, 40, '2024-09-14 14:47:03', '2024-09-14 15:22:54', '2024-09-14 18:47:03', '2024-09-14 19:22:54'),
(773, 40, '2024-09-14 15:34:44', NULL, '2024-09-14 19:34:44', '2024-09-14 19:34:44'),
(774, 40, '2024-09-14 15:39:11', '2024-09-14 15:51:02', '2024-09-14 19:39:11', '2024-09-14 19:51:02'),
(775, 44, '2024-09-14 15:39:18', '2024-09-14 15:40:18', '2024-09-14 19:39:18', '2024-09-14 19:40:18'),
(776, 44, '2024-09-14 15:43:08', '2024-09-14 15:44:23', '2024-09-14 19:43:08', '2024-09-14 19:44:23'),
(777, 44, '2024-09-14 15:48:39', '2024-09-14 16:04:08', '2024-09-14 19:48:39', '2024-09-14 20:04:08'),
(778, 40, '2024-09-14 15:52:28', NULL, '2024-09-14 19:52:28', '2024-09-14 19:52:28'),
(779, 40, '2024-09-14 16:20:40', NULL, '2024-09-14 20:20:40', '2024-09-14 20:20:40'),
(780, 40, '2024-09-14 16:42:30', '2024-09-14 16:44:34', '2024-09-14 20:42:30', '2024-09-14 20:44:34'),
(781, 40, '2024-09-14 16:45:32', '2024-09-14 16:59:20', '2024-09-14 20:45:32', '2024-09-14 20:59:20'),
(782, 40, '2024-09-14 16:59:34', '2024-09-14 17:38:17', '2024-09-14 20:59:34', '2024-09-14 21:38:17'),
(783, 40, '2024-09-14 17:49:37', '2024-09-14 18:05:44', '2024-09-14 21:49:37', '2024-09-14 22:05:44'),
(784, 40, '2024-09-14 18:05:48', '2024-09-14 18:09:02', '2024-09-14 22:05:48', '2024-09-14 22:09:02'),
(785, 40, '2024-09-14 18:09:06', '2024-09-14 18:26:57', '2024-09-14 22:09:06', '2024-09-14 22:26:57'),
(786, 40, '2024-09-14 18:27:05', '2024-09-14 19:44:53', '2024-09-14 22:27:05', '2024-09-14 23:44:53'),
(787, 40, '2024-09-14 19:44:59', '2024-09-14 20:07:40', '2024-09-14 23:44:59', '2024-09-15 00:07:40'),
(788, 40, '2024-09-14 23:28:30', NULL, '2024-09-15 03:28:30', '2024-09-15 03:28:30'),
(789, 40, '2024-09-16 10:06:39', NULL, '2024-09-16 14:06:39', '2024-09-16 14:06:39'),
(790, 40, '2024-09-16 11:49:53', NULL, '2024-09-16 15:49:53', '2024-09-16 15:49:53'),
(791, 40, '2024-09-16 14:52:53', '2024-09-16 15:05:51', '2024-09-16 18:52:53', '2024-09-16 19:05:51'),
(792, 40, '2024-09-16 15:06:01', '2024-09-16 15:07:09', '2024-09-16 19:06:01', '2024-09-16 19:07:09'),
(793, 40, '2024-09-16 15:12:25', '2024-09-16 15:29:40', '2024-09-16 19:12:25', '2024-09-16 19:29:40'),
(794, 40, '2024-09-16 15:29:48', '2024-09-16 16:07:10', '2024-09-16 19:29:48', '2024-09-16 20:07:10'),
(795, 40, '2024-09-16 16:07:14', '2024-09-16 16:33:02', '2024-09-16 20:07:14', '2024-09-16 20:33:02'),
(796, 40, '2024-09-16 17:13:20', NULL, '2024-09-16 21:13:20', '2024-09-16 21:13:20'),
(797, 45, '2024-09-17 11:18:32', NULL, '2024-09-17 15:18:32', '2024-09-17 15:18:32'),
(798, 45, '2024-09-17 11:19:00', '2024-09-17 11:19:33', '2024-09-17 15:19:00', '2024-09-17 15:19:33'),
(799, 45, '2024-09-17 11:19:43', NULL, '2024-09-17 15:19:43', '2024-09-17 15:19:43'),
(800, 45, '2024-09-17 11:20:14', '2024-09-17 11:25:05', '2024-09-17 15:20:14', '2024-09-17 15:25:05'),
(801, 45, '2024-09-17 11:25:11', NULL, '2024-09-17 15:25:11', '2024-09-17 15:25:11'),
(802, 40, '2024-09-17 11:28:50', NULL, '2024-09-17 15:28:50', '2024-09-17 15:28:50'),
(803, 40, '2024-09-17 11:30:58', '2024-09-17 12:14:11', '2024-09-17 15:30:58', '2024-09-17 16:14:11'),
(804, 45, '2024-09-17 11:33:50', NULL, '2024-09-17 15:33:50', '2024-09-17 15:33:50'),
(805, 40, '2024-09-17 12:14:37', '2024-09-17 12:40:15', '2024-09-17 16:14:37', '2024-09-17 16:40:15'),
(806, 40, '2024-09-17 12:59:13', '2024-09-17 13:36:58', '2024-09-17 16:59:13', '2024-09-17 17:36:58'),
(807, 33, '2024-09-17 14:30:00', '2024-09-17 14:33:24', '2024-09-17 18:30:00', '2024-09-17 18:33:24'),
(808, 40, '2024-09-17 14:30:16', NULL, '2024-09-17 18:30:16', '2024-09-17 18:30:16'),
(809, 44, '2024-09-17 14:31:13', '2024-09-17 14:33:21', '2024-09-17 18:31:13', '2024-09-17 18:33:21'),
(810, 44, '2024-09-17 14:33:37', '2024-09-17 14:34:38', '2024-09-17 18:33:37', '2024-09-17 18:34:38'),
(811, 33, '2024-09-17 14:34:22', '2024-09-17 14:52:02', '2024-09-17 18:34:22', '2024-09-17 18:52:02'),
(812, 44, '2024-09-17 14:44:04', '2024-09-17 14:48:52', '2024-09-17 18:44:04', '2024-09-17 18:48:52'),
(813, 40, '2024-09-17 14:47:08', '2024-09-17 15:18:27', '2024-09-17 18:47:08', '2024-09-17 19:18:27'),
(814, 44, '2024-09-17 14:50:40', '2024-09-17 14:51:41', '2024-09-17 18:50:40', '2024-09-17 18:51:41'),
(815, 44, '2024-09-17 14:50:40', NULL, '2024-09-17 18:50:40', '2024-09-17 18:50:40'),
(816, 40, '2024-09-17 16:26:04', '2024-09-17 16:26:35', '2024-09-17 20:26:04', '2024-09-17 20:26:35'),
(817, 40, '2024-09-17 16:54:55', '2024-09-17 17:55:04', '2024-09-17 20:54:55', '2024-09-17 21:55:04'),
(818, 40, '2024-09-17 17:55:15', '2024-09-17 18:30:07', '2024-09-17 21:55:15', '2024-09-17 22:30:07'),
(819, 40, '2024-09-17 18:30:25', '2024-09-17 18:47:51', '2024-09-17 22:30:25', '2024-09-17 22:47:51'),
(820, 40, '2024-09-17 19:07:05', NULL, '2024-09-17 23:07:05', '2024-09-17 23:07:05'),
(821, 40, '2024-09-17 19:07:45', '2024-09-17 19:10:43', '2024-09-17 23:07:45', '2024-09-17 23:10:43'),
(822, 40, '2024-09-17 19:19:25', '2024-09-17 19:20:49', '2024-09-17 23:19:25', '2024-09-17 23:20:49'),
(823, 40, '2024-09-17 19:22:08', '2024-09-17 19:23:25', '2024-09-17 23:22:08', '2024-09-17 23:23:25'),
(824, 40, '2024-09-17 19:23:50', NULL, '2024-09-17 23:23:50', '2024-09-17 23:23:50'),
(825, 40, '2024-09-17 19:24:32', '2024-09-17 19:25:12', '2024-09-17 23:24:32', '2024-09-17 23:25:12'),
(826, 40, '2024-09-17 19:25:50', '2024-09-17 21:17:57', '2024-09-17 23:25:50', '2024-09-18 01:17:57'),
(827, 40, '2024-09-17 21:26:03', NULL, '2024-09-18 01:26:03', '2024-09-18 01:26:03'),
(828, 40, '2024-09-17 21:54:12', NULL, '2024-09-18 01:54:12', '2024-09-18 01:54:12'),
(829, 40, '2024-09-17 21:54:15', '2024-09-17 21:56:12', '2024-09-18 01:54:15', '2024-09-18 01:56:12'),
(830, 40, '2024-09-17 21:56:36', NULL, '2024-09-18 01:56:36', '2024-09-18 01:56:36'),
(831, 40, '2024-09-17 21:59:13', NULL, '2024-09-18 01:59:13', '2024-09-18 01:59:13'),
(832, 34, '2024-09-17 22:25:20', NULL, '2024-09-18 02:25:20', '2024-09-18 02:25:20'),
(833, 44, '2024-09-17 22:25:57', '2024-09-17 22:42:22', '2024-09-18 02:25:57', '2024-09-18 02:42:22'),
(834, 34, '2024-09-17 22:33:56', '2024-09-17 22:35:00', '2024-09-18 02:33:56', '2024-09-18 02:35:00'),
(835, 34, '2024-09-17 22:37:05', '2024-09-17 22:56:52', '2024-09-18 02:37:05', '2024-09-18 02:56:52'),
(836, 44, '2024-09-17 22:46:37', '2024-09-17 22:48:35', '2024-09-18 02:46:37', '2024-09-18 02:48:35'),
(837, 40, '2024-09-17 23:01:30', NULL, '2024-09-18 03:01:30', '2024-09-18 03:01:30'),
(838, 34, '2024-09-17 23:06:53', '2024-09-17 23:08:07', '2024-09-18 03:06:53', '2024-09-18 03:08:07'),
(839, 34, '2024-09-17 23:10:54', NULL, '2024-09-18 03:10:54', '2024-09-18 03:10:54'),
(840, 34, '2024-09-17 23:11:54', NULL, '2024-09-18 03:11:54', '2024-09-18 03:11:54'),
(841, 34, '2024-09-17 23:13:07', NULL, '2024-09-18 03:13:07', '2024-09-18 03:13:07'),
(842, 34, '2024-09-17 23:14:42', '2024-09-17 23:16:08', '2024-09-18 03:14:42', '2024-09-18 03:16:08'),
(843, 34, '2024-09-17 23:17:34', NULL, '2024-09-18 03:17:34', '2024-09-18 03:17:34'),
(844, 34, '2024-09-17 23:19:21', '2024-09-17 23:24:09', '2024-09-18 03:19:21', '2024-09-18 03:24:09'),
(845, 34, '2024-09-17 23:24:29', '2024-09-18 00:02:21', '2024-09-18 03:24:29', '2024-09-18 04:02:21'),
(846, 40, '2024-09-18 07:29:58', NULL, '2024-09-18 11:29:58', '2024-09-18 11:29:58'),
(847, 40, '2024-09-18 12:39:37', '2024-09-18 12:41:34', '2024-09-18 16:39:37', '2024-09-18 16:41:34'),
(848, 40, '2024-09-18 12:41:40', '2024-09-18 12:42:51', '2024-09-18 16:41:40', '2024-09-18 16:42:51'),
(849, 40, '2024-09-18 12:46:45', '2024-09-18 12:47:56', '2024-09-18 16:46:45', '2024-09-18 16:47:56'),
(850, 40, '2024-09-18 12:48:23', '2024-09-18 13:03:57', '2024-09-18 16:48:23', '2024-09-18 17:03:57'),
(851, 40, '2024-09-18 15:18:47', '2024-09-18 15:34:48', '2024-09-18 19:18:47', '2024-09-18 19:34:48'),
(852, 40, '2024-09-18 15:39:58', NULL, '2024-09-18 19:39:58', '2024-09-18 19:39:58'),
(853, 40, '2024-09-19 10:09:09', NULL, '2024-09-19 14:09:09', '2024-09-19 14:09:09'),
(854, 40, '2024-09-19 14:14:44', '2024-09-19 14:16:27', '2024-09-19 18:14:44', '2024-09-19 18:16:27'),
(855, 40, '2024-09-19 14:16:32', '2024-09-19 14:53:29', '2024-09-19 18:16:32', '2024-09-19 18:53:29'),
(856, 40, '2024-09-19 16:31:44', NULL, '2024-09-19 20:31:44', '2024-09-19 20:31:44'),
(857, 45, '2024-09-19 16:32:10', NULL, '2024-09-19 20:32:10', '2024-09-19 20:32:10'),
(858, 40, '2024-09-20 08:49:20', NULL, '2024-09-20 12:49:20', '2024-09-20 12:49:20'),
(859, 40, '2024-09-20 09:55:26', '2024-09-20 10:07:09', '2024-09-20 13:55:26', '2024-09-20 14:07:09'),
(860, 40, '2024-09-20 10:07:14', '2024-09-20 10:23:37', '2024-09-20 14:07:14', '2024-09-20 14:23:37'),
(861, 40, '2024-09-20 10:23:45', '2024-09-20 11:17:15', '2024-09-20 14:23:45', '2024-09-20 15:17:15'),
(862, 40, '2024-09-20 11:53:53', '2024-09-20 12:38:57', '2024-09-20 15:53:53', '2024-09-20 16:38:57'),
(863, 40, '2024-09-20 14:15:06', '2024-09-20 14:16:14', '2024-09-20 18:15:06', '2024-09-20 18:16:14'),
(864, 44, '2024-09-20 14:15:26', '2024-09-20 14:23:57', '2024-09-20 18:15:26', '2024-09-20 18:23:57'),
(865, 40, '2024-09-20 14:16:18', NULL, '2024-09-20 18:16:18', '2024-09-20 18:16:18'),
(866, 40, '2024-09-20 19:03:24', '2024-09-20 19:28:48', '2024-09-20 23:03:24', '2024-09-20 23:28:48'),
(867, 40, '2024-09-21 08:48:45', NULL, '2024-09-21 12:48:45', '2024-09-21 12:48:45'),
(868, 40, '2024-09-21 14:03:32', '2024-09-21 14:40:35', '2024-09-21 18:03:32', '2024-09-21 18:40:35'),
(869, 40, '2024-09-21 14:40:51', '2024-09-21 15:19:43', '2024-09-21 18:40:51', '2024-09-21 19:19:43'),
(870, 45, '2024-09-23 10:03:25', '2024-09-23 10:09:46', '2024-09-23 14:03:25', '2024-09-23 14:09:46'),
(871, 40, '2024-09-23 11:51:31', '2024-09-23 12:19:36', '2024-09-23 15:51:31', '2024-09-23 16:19:36'),
(872, 40, '2024-09-23 12:19:54', NULL, '2024-09-23 16:19:54', '2024-09-23 16:19:54'),
(873, 45, '2024-09-23 14:49:09', '2024-09-23 14:50:27', '2024-09-23 18:49:09', '2024-09-23 18:50:27'),
(874, 40, '2024-09-24 10:25:49', '2024-09-24 10:30:57', '2024-09-24 14:25:49', '2024-09-24 14:30:57'),
(875, 40, '2024-09-24 11:22:41', NULL, '2024-09-24 15:22:41', '2024-09-24 15:22:41'),
(876, 40, '2024-09-24 12:12:56', '2024-09-24 13:13:37', '2024-09-24 16:12:56', '2024-09-24 17:13:37'),
(877, 40, '2024-09-24 13:14:38', '2024-09-24 13:36:26', '2024-09-24 17:14:38', '2024-09-24 17:36:26'),
(878, 40, '2024-09-24 13:37:14', NULL, '2024-09-24 17:37:14', '2024-09-24 17:37:14'),
(879, 40, '2024-09-24 13:53:18', '2024-09-24 14:03:17', '2024-09-24 17:53:18', '2024-09-24 18:03:18'),
(880, 45, '2024-09-24 16:04:42', '2024-09-24 16:59:41', '2024-09-24 20:04:42', '2024-09-24 20:59:41'),
(881, 45, '2024-09-24 17:10:15', '2024-09-24 17:20:37', '2024-09-24 21:10:15', '2024-09-24 21:20:37'),
(882, 45, '2024-09-24 17:21:11', NULL, '2024-09-24 21:21:11', '2024-09-24 21:21:11'),
(883, 40, '2024-09-25 10:25:03', '2024-09-25 10:30:10', '2024-09-25 14:25:03', '2024-09-25 14:30:10'),
(884, 40, '2024-09-25 15:18:14', '2024-09-25 15:19:47', '2024-09-25 19:18:14', '2024-09-25 19:19:47'),
(885, 41, '2024-09-25 15:23:31', '2024-09-25 15:24:40', '2024-09-25 19:23:31', '2024-09-25 19:24:40'),
(886, 40, '2024-09-25 17:05:42', NULL, '2024-09-25 21:05:42', '2024-09-25 21:05:42'),
(887, 40, '2024-09-25 17:23:28', NULL, '2024-09-25 21:23:28', '2024-09-25 21:23:28'),
(888, 41, '2024-09-25 17:26:26', NULL, '2024-09-25 21:26:26', '2024-09-25 21:26:26'),
(889, 40, '2024-09-25 17:40:54', NULL, '2024-09-25 21:40:54', '2024-09-25 21:40:54'),
(890, 40, '2024-09-25 19:19:18', '2024-09-25 19:20:19', '2024-09-25 23:19:18', '2024-09-25 23:20:19'),
(891, 48, '2024-09-25 20:27:13', '2024-09-25 20:28:29', '2024-09-26 00:27:13', '2024-09-26 00:28:29'),
(892, 48, '2024-09-25 20:31:11', '2024-09-25 20:32:12', '2024-09-26 00:31:11', '2024-09-26 00:32:12'),
(893, 40, '2024-09-25 20:36:16', NULL, '2024-09-26 00:36:16', '2024-09-26 00:36:16'),
(894, 49, '2024-09-25 20:41:11', '2024-09-25 20:42:47', '2024-09-26 00:41:11', '2024-09-26 00:42:47'),
(895, 49, '2024-09-25 23:43:06', '2024-09-25 23:54:04', '2024-09-26 03:43:06', '2024-09-26 03:54:04'),
(896, 40, '2024-09-26 11:16:58', NULL, '2024-09-26 15:16:58', '2024-09-26 15:16:58'),
(897, 40, '2024-09-26 11:53:22', '2024-09-26 12:09:32', '2024-09-26 15:53:22', '2024-09-26 16:09:32'),
(898, 41, '2024-09-26 15:32:25', NULL, '2024-09-26 19:32:25', '2024-09-26 19:32:25'),
(899, 40, '2024-09-26 18:01:30', '2024-09-26 18:16:14', '2024-09-26 22:01:30', '2024-09-26 22:16:14'),
(900, 40, '2024-09-26 18:16:33', '2024-09-26 18:58:02', '2024-09-26 22:16:33', '2024-09-26 22:58:02'),
(901, 49, '2024-09-26 18:50:12', NULL, '2024-09-26 22:50:12', '2024-09-26 22:50:12'),
(902, 49, '2024-09-26 18:50:13', '2024-09-26 18:51:50', '2024-09-26 22:50:13', '2024-09-26 22:51:50'),
(903, 49, '2024-09-26 18:52:31', '2024-09-26 18:53:43', '2024-09-26 22:52:31', '2024-09-26 22:53:43'),
(904, 49, '2024-09-26 18:54:08', NULL, '2024-09-26 22:54:08', '2024-09-26 22:54:08'),
(905, 48, '2024-09-27 07:54:09', NULL, '2024-09-27 11:54:09', '2024-09-27 11:54:09'),
(906, 40, '2024-09-27 09:16:11', '2024-09-27 10:01:45', '2024-09-27 13:16:11', '2024-09-27 14:01:45'),
(907, 40, '2024-09-27 11:24:41', '2024-09-27 13:27:45', '2024-09-27 15:24:41', '2024-09-27 17:27:45'),
(908, 40, '2024-09-27 13:27:48', '2024-09-27 13:38:02', '2024-09-27 17:27:48', '2024-09-27 17:38:02'),
(909, 40, '2024-09-27 13:38:11', '2024-09-27 14:37:36', '2024-09-27 17:38:11', '2024-09-27 18:37:36'),
(910, 40, '2024-09-27 16:20:52', NULL, '2024-09-27 20:20:52', '2024-09-27 20:20:52'),
(911, 49, '2024-09-28 19:35:57', '2024-09-28 19:37:04', '2024-09-28 23:35:57', '2024-09-28 23:37:04'),
(912, 49, '2024-09-28 19:37:37', '2024-09-28 19:39:58', '2024-09-28 23:37:37', '2024-09-28 23:39:58'),
(913, 49, '2024-09-28 19:41:06', '2024-09-28 19:42:07', '2024-09-28 23:41:06', '2024-09-28 23:42:07'),
(914, 40, '2024-09-30 14:46:33', NULL, '2024-09-30 18:46:33', '2024-09-30 18:46:33'),
(915, 45, '2024-09-30 15:36:43', NULL, '2024-09-30 19:36:43', '2024-09-30 19:36:43'),
(916, 49, '2024-09-30 17:18:28', NULL, '2024-09-30 21:18:28', '2024-09-30 21:18:28'),
(917, 49, '2024-09-30 17:18:29', '2024-09-30 17:27:59', '2024-09-30 21:18:29', '2024-09-30 21:27:59'),
(918, 40, '2024-10-01 12:48:09', '2024-10-01 13:07:51', '2024-10-01 16:48:09', '2024-10-01 17:07:51'),
(919, 40, '2024-10-01 13:08:00', NULL, '2024-10-01 17:08:00', '2024-10-01 17:08:00'),
(920, 40, '2024-10-01 16:58:26', NULL, '2024-10-01 20:58:26', '2024-10-01 20:58:26'),
(921, 45, '2024-10-02 12:07:14', '2024-10-02 12:08:31', '2024-10-02 16:07:14', '2024-10-02 16:08:31'),
(922, 45, '2024-10-02 12:16:18', '2024-10-02 12:17:31', '2024-10-02 16:16:18', '2024-10-02 16:17:31'),
(923, 45, '2024-10-02 12:56:55', '2024-10-02 13:01:19', '2024-10-02 16:56:55', '2024-10-02 17:01:19'),
(924, 45, '2024-10-02 13:01:24', '2024-10-02 13:02:46', '2024-10-02 17:01:24', '2024-10-02 17:02:46'),
(925, 45, '2024-10-03 09:25:18', '2024-10-03 09:26:55', '2024-10-03 13:25:18', '2024-10-03 13:26:55'),
(926, 45, '2024-10-03 10:05:35', '2024-10-03 10:07:00', '2024-10-03 14:05:35', '2024-10-03 14:07:00'),
(927, 40, '2024-10-04 15:05:01', NULL, '2024-10-04 19:05:01', '2024-10-04 19:05:01'),
(928, 45, '2024-10-05 12:08:05', '2024-10-05 12:13:21', '2024-10-05 16:08:05', '2024-10-05 16:13:21'),
(929, 45, '2024-10-05 12:13:44', '2024-10-05 12:54:01', '2024-10-05 16:13:44', '2024-10-05 16:54:01'),
(930, 45, '2024-10-05 12:54:08', '2024-10-05 13:14:13', '2024-10-05 16:54:08', '2024-10-05 17:14:13'),
(931, 45, '2024-10-05 13:14:22', '2024-10-05 13:24:29', '2024-10-05 17:14:22', '2024-10-05 17:24:29'),
(932, 45, '2024-10-05 13:24:33', '2024-10-05 13:43:45', '2024-10-05 17:24:33', '2024-10-05 17:43:45'),
(933, 45, '2024-10-05 13:44:35', '2024-10-05 13:45:51', '2024-10-05 17:44:35', '2024-10-05 17:45:51'),
(934, 45, '2024-10-05 13:45:58', '2024-10-05 13:47:11', '2024-10-05 17:45:58', '2024-10-05 17:47:11'),
(935, 45, '2024-10-07 09:16:35', NULL, '2024-10-07 13:16:35', '2024-10-07 13:16:35'),
(936, 40, '2024-10-07 13:45:47', '2024-10-07 14:05:57', '2024-10-07 17:45:47', '2024-10-07 18:05:57'),
(937, 49, '2024-10-07 20:49:49', '2024-10-07 20:51:47', '2024-10-08 00:49:49', '2024-10-08 00:51:47'),
(938, 45, '2024-10-08 11:39:57', '2024-10-08 11:41:15', '2024-10-08 15:39:57', '2024-10-08 15:41:15'),
(939, 45, '2024-10-08 11:41:45', '2024-10-08 11:43:28', '2024-10-08 15:41:45', '2024-10-08 15:43:28'),
(940, 45, '2024-10-08 11:52:13', '2024-10-08 11:53:30', '2024-10-08 15:52:13', '2024-10-08 15:53:30'),
(941, 45, '2024-10-08 11:57:44', '2024-10-08 13:25:53', '2024-10-08 15:57:44', '2024-10-08 17:25:53'),
(942, 45, '2024-10-08 13:26:00', '2024-10-08 14:11:21', '2024-10-08 17:26:00', '2024-10-08 18:11:21'),
(943, 45, '2024-10-08 14:11:25', '2024-10-08 14:22:04', '2024-10-08 18:11:25', '2024-10-08 18:22:04'),
(944, 40, '2024-10-08 15:10:01', NULL, '2024-10-08 19:10:01', '2024-10-08 19:10:01'),
(945, 45, '2024-10-08 15:54:09', '2024-10-08 15:57:20', '2024-10-08 19:54:09', '2024-10-08 19:57:20'),
(946, 45, '2024-10-08 15:57:32', '2024-10-08 16:36:22', '2024-10-08 19:57:32', '2024-10-08 20:36:22'),
(947, 45, '2024-10-08 16:36:28', '2024-10-08 16:38:08', '2024-10-08 20:36:28', '2024-10-08 20:38:08'),
(948, 45, '2024-10-08 16:38:52', NULL, '2024-10-08 20:38:52', '2024-10-08 20:38:52'),
(949, 40, '2024-10-08 16:48:17', '2024-10-08 16:50:12', '2024-10-08 20:48:17', '2024-10-08 20:50:12'),
(950, 34, '2024-10-09 09:48:08', NULL, '2024-10-09 13:48:08', '2024-10-09 13:48:08'),
(951, 45, '2024-10-09 12:57:16', '2024-10-09 13:07:09', '2024-10-09 16:57:16', '2024-10-09 17:07:09'),
(952, 45, '2024-10-09 13:07:21', '2024-10-09 13:15:15', '2024-10-09 17:07:21', '2024-10-09 17:15:15'),
(953, 45, '2024-10-09 17:34:44', '2024-10-09 17:35:54', '2024-10-09 21:34:44', '2024-10-09 21:35:54'),
(954, 45, '2024-10-10 10:02:47', '2024-10-10 10:03:48', '2024-10-10 14:02:47', '2024-10-10 14:03:48'),
(955, 45, '2024-10-10 10:04:02', NULL, '2024-10-10 14:04:02', '2024-10-10 14:04:02'),
(956, 45, '2024-10-10 10:04:04', '2024-10-10 10:22:14', '2024-10-10 14:04:04', '2024-10-10 14:22:14'),
(957, 45, '2024-10-10 11:49:08', '2024-10-10 11:51:10', '2024-10-10 15:49:08', '2024-10-10 15:51:10'),
(958, 45, '2024-10-10 14:55:55', '2024-10-10 14:57:42', '2024-10-10 18:55:55', '2024-10-10 18:57:42'),
(959, 45, '2024-10-11 10:02:39', '2024-10-11 10:03:54', '2024-10-11 14:02:39', '2024-10-11 14:03:54'),
(960, 45, '2024-10-11 10:04:06', '2024-10-11 10:05:16', '2024-10-11 14:04:06', '2024-10-11 14:05:16'),
(961, 45, '2024-10-11 10:05:39', '2024-10-11 10:08:08', '2024-10-11 14:05:39', '2024-10-11 14:08:08'),
(962, 45, '2024-10-11 10:45:10', NULL, '2024-10-11 14:45:10', '2024-10-11 14:45:10'),
(963, 40, '2024-10-11 11:20:51', '2024-10-11 12:16:31', '2024-10-11 15:20:51', '2024-10-11 16:16:31'),
(964, 45, '2024-10-11 13:12:41', NULL, '2024-10-11 17:12:41', '2024-10-11 17:12:41'),
(965, 33, '2024-10-11 14:33:21', NULL, '2024-10-11 18:33:21', '2024-10-11 18:33:21'),
(966, 33, '2024-10-11 14:33:24', NULL, '2024-10-11 18:33:24', '2024-10-11 18:33:24'),
(967, 40, '2024-10-11 19:21:52', '2024-10-11 19:41:32', '2024-10-11 23:21:52', '2024-10-11 23:41:32'),
(968, 49, '2024-10-14 17:09:44', '2024-10-14 17:12:10', '2024-10-14 21:09:44', '2024-10-14 21:12:10'),
(969, 49, '2024-10-14 17:12:51', NULL, '2024-10-14 21:12:51', '2024-10-14 21:12:51'),
(970, 45, '2024-10-16 10:11:26', '2024-10-16 10:12:32', '2024-10-16 14:11:26', '2024-10-16 14:12:32'),
(971, 45, '2024-10-16 10:13:43', '2024-10-16 10:24:08', '2024-10-16 14:13:43', '2024-10-16 14:24:08'),
(972, 45, '2024-10-16 10:24:16', '2024-10-16 10:25:28', '2024-10-16 14:24:16', '2024-10-16 14:25:28'),
(973, 45, '2024-10-17 11:56:52', '2024-10-17 11:58:17', '2024-10-17 15:56:52', '2024-10-17 15:58:17'),
(974, 40, '2024-10-17 12:00:25', '2024-10-17 12:17:51', '2024-10-17 16:00:25', '2024-10-17 16:17:51'),
(975, 40, '2024-10-17 12:18:00', NULL, '2024-10-17 16:18:00', '2024-10-17 16:18:00'),
(976, 45, '2024-10-17 12:23:42', '2024-10-17 12:45:23', '2024-10-17 16:23:42', '2024-10-17 16:45:23'),
(977, 45, '2024-10-17 12:45:36', '2024-10-17 13:16:06', '2024-10-17 16:45:36', '2024-10-17 17:16:06'),
(978, 45, '2024-10-17 14:14:39', '2024-10-17 14:16:59', '2024-10-17 18:14:39', '2024-10-17 18:16:59'),
(979, 45, '2024-10-18 18:15:29', NULL, '2024-10-18 22:15:29', '2024-10-18 22:15:29'),
(980, 45, '2024-10-21 16:04:40', NULL, '2024-10-21 20:04:40', '2024-10-21 20:04:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_type` varchar(255) DEFAULT NULL,
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
  `city` varchar(255) DEFAULT NULL,
  `categories` varchar(255) DEFAULT NULL,
  `alter_mobile_number` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `store` varchar(255) DEFAULT NULL,
  `is_online` tinyint(4) DEFAULT 0,
  `is_active` tinyint(4) DEFAULT 1,
  `status` int(11) DEFAULT 1,
  `about` text DEFAULT NULL,
  `photo_url` varchar(191) DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `balance` varchar(255) DEFAULT NULL,
  `is_system` tinyint(4) DEFAULT 0,
  `is_subscribed` tinyint(1) DEFAULT NULL,
  `privacy` int(11) NOT NULL DEFAULT 1,
  `gender` int(11) DEFAULT NULL,
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

INSERT INTO `users` (`id`, `account_type`, `last_seen`, `birth_date`, `role`, `permissions`, `name`, `email`, `email_verified_at`, `password`, `custom_password`, `mobile_number`, `city`, `categories`, `alter_mobile_number`, `location`, `department`, `store`, `is_online`, `is_active`, `status`, `about`, `photo_url`, `profile_photo`, `remember_token`, `ip_address`, `balance`, `is_system`, `is_subscribed`, `privacy`, `gender`, `created_by`, `deleted_at`, `language`, `is_super_admin`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2024-10-28 02:44:45', NULL, 1, NULL, 'SUPER ADMINISTRADOR', 'negociosgen@gmail.com', '2023-03-23 07:45:02', '$2y$10$xzAHnPbXnMT3Egv9hhG.BeekGkMElECUCv/.SYVuKmLI7nn69m9e.', NULL, '8878326802', 'bolivia', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '149071.png', NULL, NULL, NULL, 1, 0, 1, 1, NULL, NULL, 'es', 1, '2023-03-23 07:45:02', '2024-10-28 02:44:45'),
(2, 'affiliate', NULL, '2024-10-04', 2, NULL, 'arsh aasif', 'aasifdev5@gmail.com', NULL, '$2y$10$SrPch6fIaF4ffuJzdKrZeuRx5jhObs6.2/tz8iXbfqJbHxZN6BhYS', NULL, '59109876543215', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, NULL, NULL, NULL, NULL, '127.0.0.1', NULL, 0, NULL, 1, NULL, NULL, NULL, '\'en\'', 0, '2024-10-28 06:21:23', '2024-10-28 06:21:23');

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
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `time_logs`
--
ALTER TABLE `time_logs`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mail_templates`
--
ALTER TABLE `mail_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticket_departments`
--
ALTER TABLE `ticket_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticket_messages`
--
ALTER TABLE `ticket_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ticket_priorities`
--
ALTER TABLE `ticket_priorities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ticket_related_services`
--
ALTER TABLE `ticket_related_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `time_logs`
--
ALTER TABLE `time_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=981;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
