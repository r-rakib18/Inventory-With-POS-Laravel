-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2021 at 03:05 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Macy Kent', NULL, 'Final Logo.jpg.1624863437', 'Drafts', '2021-06-28 00:57:17', '2021-06-28 00:57:17');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Drafts',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(25, 'Electronics', '<p>higvbg</p><h2>uagdsjfboash</h2><ul><li>s<strong>gdsdf</strong></li><li><strong>ljbjbohuobn</strong></li><li><strong>sodugbfsad;foasdhnf</strong></li><li><strong>pdshnfmsadf</strong></li><li><strong>sp[dojfd</strong></li></ul>', 'ajwa-premium-dates-big-size1.jpg', 0, 'Drafts', '2021-06-26 21:59:44', '2021-06-27 00:43:31'),
(28, 'Abra Henderson', '<p>lorem ipsum</p>', NULL, 25, 'Pending', '2021-06-27 01:00:36', '2021-06-27 01:00:36'),
(29, 'Chelsea Rowland', '<p>lorem ipsum</p>', NULL, 31, 'Drafts', '2021-06-27 01:01:10', '2021-06-27 02:35:38'),
(31, 'Grocery', '<p>sdfsdfsdaf</p>', NULL, 25, 'Drafts', '2021-06-27 01:02:29', '2021-06-27 02:25:29'),
(32, 'sdfsdfa', '<p>sdfsdfsdaf</p>', NULL, 31, 'Drafts', '2021-06-27 01:02:35', '2021-06-27 01:02:35'),
(34, 'Homr Applience 2', '<ul><li><strong>Lorem Ipsum</strong> is<i> simply dummy text of the printing and typesetting industry</i>. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</li></ul>', 'vivo_s1.webp.1624862580', 25, 'Published', '2021-06-28 00:43:00', '2021-06-28 00:43:42'),
(35, 'Macon Barnes', NULL, NULL, NULL, 'Drafts', '2021-06-28 06:06:46', '2021-06-28 06:06:46');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_24_065410_create_categories_table', 1),
(5, '2021_06_24_065633_create_brands_table', 1),
(6, '2021_06_24_065950_create_varients_table', 1),
(7, '2021_06_24_070008_create_vats_table', 1),
(8, '2021_06_24_070028_create_products_table', 1);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `vat_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_set` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) NOT NULL COMMENT 'selling price',
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0=disable, 1=enable',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `vat_id`, `name`, `image`, `attribute_set`, `price`, `description`, `sku`, `barcode`, `tag`, `vat_status`, `status`, `created_at`, `updated_at`) VALUES
(41, 2, 29, 1, 'Fritz Haynes Orange L 4 Kg', 'Final Logo Black.jpg', 'Orange L 4 Kg', 430.00, '<p>vsfdasdfasd<strong>asdasdasd</strong></p><p><strong>dasdasd</strong><i><strong>sdfdsf</strong></i></p>', 'Eaque cupiditate har', 'Qui corrupti ad qua', 'Quod provident volu', 'Enabled', 'Published', '2021-06-28 07:00:07', '2021-06-28 07:00:07'),
(42, 2, 29, 1, 'Fritz Haynes Orange L 3 Kg', 'Final Logo Black.jpg', 'Orange L 3 Kg', 592.00, '<p>vsfdasdfasd<strong>asdasdasd</strong></p><p><strong>dasdasd</strong><i><strong>sdfdsf</strong></i></p>', 'Sunt est deleniti a', 'Sed itaque officia r', 'Quod provident volu', 'Enabled', 'Drafts', '2021-06-28 07:00:07', '2021-06-28 07:00:07'),
(43, 2, 29, 1, 'Fritz Haynes Orange L 5 Kg', 'Final Logo Black.jpg', 'Orange L 5 Kg', 805.00, '<p>vsfdasdfasd<strong>asdasdasd</strong></p><p><strong>dasdasd</strong><i><strong>sdfdsf</strong></i></p>', 'Voluptas qui tenetur', 'Consectetur similiq', 'Quod provident volu', 'Enabled', 'Published', '2021-06-28 07:00:07', '2021-06-28 07:00:07'),
(44, 2, 29, 1, 'Fritz Haynes Orange M 4 Kg', 'Final Logo Black.jpg', 'Orange M 4 Kg', 446.00, '<p>vsfdasdfasd<strong>asdasdasd</strong></p><p><strong>dasdasd</strong><i><strong>sdfdsf</strong></i></p>', 'Aut quia et tenetur', 'Libero obcaecati mol', 'Quod provident volu', 'Enabled', 'Published', '2021-06-28 07:00:07', '2021-06-28 07:00:07'),
(45, 2, 29, 1, 'Fritz Haynes Orange M 3 Kg', 'Final Logo Black.jpg', 'Orange M 3 Kg', 269.00, '<p>vsfdasdfasd<strong>asdasdasd</strong></p><p><strong>dasdasd</strong><i><strong>sdfdsf</strong></i></p>', 'Pariatur Dolores do', 'In maiores tempora s', 'Quod provident volu', 'Enabled', 'Pending', '2021-06-28 07:00:07', '2021-06-28 07:00:07'),
(46, 2, 29, 1, 'Fritz Haynes Orange M 5 Kg', 'Final Logo Black.jpg', 'Orange M 5 Kg', 95.00, '<p>vsfdasdfasd<strong>asdasdasd</strong></p><p><strong>dasdasd</strong><i><strong>sdfdsf</strong></i></p>', 'Alias amet adipisci', 'Laboriosam eum sint', 'Quod provident volu', 'Enabled', 'Published', '2021-06-28 07:00:07', '2021-06-28 07:00:07'),
(47, 2, 29, 1, 'Fritz Haynes Orange S 4 Kg', 'Final Logo Black.jpg', 'Orange S 4 Kg', 12.00, '<p>vsfdasdfasd<strong>asdasdasd</strong></p><p><strong>dasdasd</strong><i><strong>sdfdsf</strong></i></p>', 'Voluptatem voluptas', 'Molestias et culpa b', 'Quod provident volu', 'Enabled', 'Drafts', '2021-06-28 07:00:07', '2021-06-28 07:00:07'),
(48, 2, 29, 1, 'Fritz Haynes Orange S 3 Kg', 'Final Logo Black.jpg', 'Orange S 3 Kg', 709.00, '<p>vsfdasdfasd<strong>asdasdasd</strong></p><p><strong>dasdasd</strong><i><strong>sdfdsf</strong></i></p>', 'Et rem dolore error', 'Reprehenderit itaqu', 'Quod provident volu', 'Enabled', 'Pending', '2021-06-28 07:00:07', '2021-06-28 07:00:07'),
(49, 2, 29, 1, 'Fritz Haynes Orange S 5 Kg', 'Final Logo Black.jpg', 'Orange S 5 Kg', 702.00, '<p>vsfdasdfasd<strong>asdasdasd</strong></p><p><strong>dasdasd</strong><i><strong>sdfdsf</strong></i></p>', 'Minima aliqua Aut a', 'Harum ducimus moles', 'Quod provident volu', 'Enabled', 'Drafts', '2021-06-28 07:00:07', '2021-06-28 07:00:07'),
(50, 2, 29, 1, 'Fritz Haynes Red L 4 Kg', 'Final Logo Black.jpg', 'Red L 4 Kg', 451.00, '<p>vsfdasdfasd<strong>asdasdasd</strong></p><p><strong>dasdasd</strong><i><strong>sdfdsf</strong></i></p>', 'Quis ex distinctio', 'Minima officia modi', 'Quod provident volu', 'Enabled', 'Drafts', '2021-06-28 07:00:07', '2021-06-28 07:00:07'),
(51, 2, 29, 1, 'Fritz Haynes Red L 3 Kg', 'Final Logo Black.jpg', 'Red L 3 Kg', 881.00, '<p>vsfdasdfasd<strong>asdasdasd</strong></p><p><strong>dasdasd</strong><i><strong>sdfdsf</strong></i></p>', 'Ut et tenetur aut co', 'Reiciendis ut volupt', 'Quod provident volu', 'Enabled', 'Pending', '2021-06-28 07:00:07', '2021-06-28 07:00:07'),
(52, 2, 29, 1, 'Fritz Haynes Red L 5 Kg', 'Final Logo Black.jpg', 'Red L 5 Kg', 808.00, '<p>vsfdasdfasd<strong>asdasdasd</strong></p><p><strong>dasdasd</strong><i><strong>sdfdsf</strong></i></p>', 'Consectetur velit', 'Eu sunt exercitatio', 'Quod provident volu', 'Enabled', 'Published', '2021-06-28 07:00:07', '2021-06-28 07:00:07'),
(53, 2, 29, 1, 'Fritz Haynes Red M 4 Kg', 'Final Logo Black.jpg', 'Red M 4 Kg', 961.00, '<p>vsfdasdfasd<strong>asdasdasd</strong></p><p><strong>dasdasd</strong><i><strong>sdfdsf</strong></i></p>', 'Quis non laudantium', 'Aperiam dolor nulla', 'Quod provident volu', 'Enabled', 'Published', '2021-06-28 07:00:07', '2021-06-28 07:00:07'),
(54, 2, 29, 1, 'Fritz Haynes Red M 3 Kg', 'Final Logo Black.jpg', 'Red M 3 Kg', 650.00, '<p>vsfdasdfasd<strong>asdasdasd</strong></p><p><strong>dasdasd</strong><i><strong>sdfdsf</strong></i></p>', 'Iusto neque ipsum m', 'Sed praesentium simi', 'Quod provident volu', 'Enabled', 'Published', '2021-06-28 07:00:07', '2021-06-28 07:00:07'),
(55, 2, 29, 1, 'Fritz Haynes Red M 5 Kg', 'Final Logo Black.jpg', 'Red M 5 Kg', 289.00, '<p>vsfdasdfasd<strong>asdasdasd</strong></p><p><strong>dasdasd</strong><i><strong>sdfdsf</strong></i></p>', 'Sint qui quis impedi', 'Doloremque natus ill', 'Quod provident volu', 'Enabled', 'Drafts', '2021-06-28 07:00:07', '2021-06-28 07:00:07'),
(56, 2, 35, 2, 'Jayme Cunningham Orange Orange L', '', 'Orange Orange L', 588.00, NULL, 'Laboriosam autem ab', 'In rerum porro velit', 'Minim dolores et Nam', 'Enabled', 'Pending', '2021-06-28 07:03:42', '2021-06-28 07:03:42'),
(57, 2, 35, 2, 'Jayme Cunningham Orange Orange M', '', 'Orange Orange M', 811.00, NULL, 'Qui qui omnis dolor', 'Distinctio Error er', 'Minim dolores et Nam', 'Enabled', 'Published', '2021-06-28 07:03:42', '2021-06-28 07:03:42'),
(58, 2, 35, 2, 'Jayme Cunningham Orange Orange S', '', 'Orange Orange S', 244.00, NULL, 'Quia voluptatem quae', 'Qui officiis non fug', 'Minim dolores et Nam', 'Enabled', 'Pending', '2021-06-28 07:03:42', '2021-06-28 07:03:42'),
(59, 2, 35, 2, 'Jayme Cunningham Orange Red L', '', 'Orange Red L', 983.00, NULL, 'In distinctio Quia', 'Voluptas ut reprehen', 'Minim dolores et Nam', 'Enabled', 'Pending', '2021-06-28 07:03:42', '2021-06-28 07:03:42'),
(60, 2, 35, 2, 'Jayme Cunningham Orange Red M', '', 'Orange Red M', 859.00, NULL, 'Et sint illum et qu', 'Id atque nihil dolor', 'Minim dolores et Nam', 'Enabled', 'Drafts', '2021-06-28 07:03:42', '2021-06-28 07:03:42'),
(61, 2, 35, 2, 'Jayme Cunningham Orange Red S', '', 'Orange Red S', 773.00, NULL, 'In non minim assumen', 'Voluptas delectus q', 'Minim dolores et Nam', 'Enabled', 'Pending', '2021-06-28 07:03:42', '2021-06-28 07:03:42'),
(62, 2, 35, 2, 'Jayme Cunningham Red Orange L', '', 'Red Orange L', 304.00, NULL, 'Dolore aut et illum', 'Et tenetur qui odit', 'Minim dolores et Nam', 'Enabled', 'Pending', '2021-06-28 07:03:42', '2021-06-28 07:03:42'),
(63, 2, 35, 2, 'Jayme Cunningham Red Orange M', '', 'Red Orange M', 62.00, NULL, 'Optio deserunt cupi', 'Nisi tempora consequ', 'Minim dolores et Nam', 'Enabled', 'Drafts', '2021-06-28 07:03:42', '2021-06-28 07:03:42'),
(64, 2, 35, 2, 'Jayme Cunningham Red Orange S', '', 'Red Orange S', 312.00, NULL, 'Impedit et vel dolo', 'Non veritatis aliqua', 'Minim dolores et Nam', 'Enabled', 'Pending', '2021-06-28 07:03:42', '2021-06-28 07:03:42'),
(65, 2, 35, 2, 'Jayme Cunningham Red Red L', '', 'Red Red L', 259.00, NULL, 'Dolores suscipit ut', 'Et vel ut ullamco ea', 'Minim dolores et Nam', 'Enabled', 'Drafts', '2021-06-28 07:03:42', '2021-06-28 07:03:42'),
(66, 2, 35, 2, 'Jayme Cunningham Red Red M', '', 'Red Red M', 145.00, NULL, 'Aliqua Fugiat ea p', 'Adipisci incidunt q', 'Minim dolores et Nam', 'Enabled', 'Drafts', '2021-06-28 07:03:42', '2021-06-28 07:03:42'),
(67, 2, 35, 2, 'Jayme Cunningham Red Red S', '', 'Red Red S', 694.00, NULL, 'Reiciendis repellend', 'Maxime sit inventor', 'Minim dolores et Nam', 'Enabled', 'Published', '2021-06-28 07:03:42', '2021-06-28 07:03:42');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `varients`
--

CREATE TABLE `varients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `varients`
--

INSERT INTO `varients` (`id`, `key`, `value`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Color', 'Red,Orange', 'Drafts', '2021-06-27 06:22:34', '2021-06-27 07:16:31'),
(6, 'Size', 'S,M,L', 'Published', '2021-06-28 03:17:04', '2021-06-28 03:17:04'),
(7, 'Weight', '5 Kg,3 Kg,4 Kg', 'Published', '2021-06-28 03:18:33', '2021-06-28 03:18:33');

-- --------------------------------------------------------

--
-- Table structure for table `vats`
--

CREATE TABLE `vats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_head` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` double(8,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vats`
--

INSERT INTO `vats` (`id`, `item_head`, `description`, `value`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Grocery', '<p>Govt Vat For <i><strong>Grocery Comodity</strong></i></p>', 15.00, 'Published', '2021-06-27 23:13:31', '2021-06-27 23:37:21'),
(2, 'Service Charge', '<p>This is Service Charge For Chowk Duniya</p>', 10.00, 'Published', '2021-06-27 23:14:11', '2021-06-27 23:35:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_vat_id_foreign` (`vat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `varients`
--
ALTER TABLE `varients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vats`
--
ALTER TABLE `vats`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `varients`
--
ALTER TABLE `varients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vats`
--
ALTER TABLE `vats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_vat_id_foreign` FOREIGN KEY (`vat_id`) REFERENCES `vats` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
