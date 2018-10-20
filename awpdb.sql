-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2018 at 05:01 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `awpdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Alkaline Water', 'Heals cancer and the best', '2018-09-02 05:30:03', '2018-10-16 22:03:24'),
(2, 'Pill', 'Works like dbz magic beans', '2018-09-02 05:56:18', '2018-09-02 05:56:18');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_08_30_073507_create_category_table', 1),
(4, '2018_09_02_050251_create_products_table', 2),
(5, '2018_09_23_030723_create_inventory_table', 3),
(6, '2018_09_25_035933_create_package_table', 4),
(7, '2018_09_25_040052_create_package_table', 5),
(8, '2018_09_25_041228_create_packages_products_table', 5),
(9, '2018_09_25_041707_create_packages_products_table', 6),
(10, '2018_09_25_042021_create_packages_products_table', 7),
(11, '2018_09_27_120920_create_stocks_table', 8),
(12, '2014_10_12_000000_create_users_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `description`, `price`, `created_at`, `updated_at`) VALUES
(5, 'Package1', 'Package 1 Description', '5000.00', '2018-09-25 20:16:58', '2018-09-25 20:16:58'),
(6, 'Package 2', 'Package 2 description', '4243.00', '2018-09-28 20:18:47', '2018-09-28 20:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `packages_products`
--

CREATE TABLE `packages_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `package_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages_products`
--

INSERT INTO `packages_products` (`id`, `package_id`, `product_id`, `product_quantity`, `created_at`, `updated_at`) VALUES
(19, 5, 48, 1, '2018-09-29 03:30:49', '2018-09-29 03:30:49'),
(20, 6, 48, 3, '2018-10-16 21:57:41', '2018-10-16 22:00:12'),
(21, 6, 49, 2, '2018-10-16 21:58:01', '2018-10-16 21:59:24'),
(22, 6, 50, 2, '2018-10-16 21:59:03', '2018-10-16 21:59:22');

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
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `image`, `created_at`, `updated_at`) VALUES
(48, 2, 'Product1', 'Product1 description', '434.00', '../images/placeholder.png', '2018-09-27 23:16:04', '2018-09-27 23:17:17'),
(49, 1, 'Product2', 'Product2', '4234.00', '../images/placeholder.png', '2018-09-28 20:09:57', '2018-09-28 20:09:57'),
(50, 1, 'Product 3', 'Product 3', '200.00', '../images/placeholder.png', '2018-10-16 21:49:56', '2018-10-16 21:49:56'),
(51, 2, 'Product 4', 'Product 4', '200.00', '../images/placeholder.png', '2018-10-16 22:01:11', '2018-10-16 22:01:11'),
(52, 1, 'Product 5', 'Product 5', '500.00', '../images/placeholder.png', '2018-10-16 22:01:26', '2018-10-16 22:01:26'),
(53, 2, 'Product 6', 'Product 6', '500.00', '../images/placeholder.png', '2018-10-16 22:02:08', '2018-10-16 22:02:08');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 48, 12, '2018-09-27 23:16:05', '2018-09-28 02:46:35'),
(2, 49, 10, '2018-09-28 20:09:57', '2018-10-16 21:46:09'),
(3, 50, 10, '2018-10-16 21:49:56', '2018-10-16 22:04:28'),
(4, 51, 10, '2018-10-16 22:01:11', '2018-10-16 22:04:32'),
(5, 52, 10, '2018-10-16 22:01:26', '2018-10-16 22:04:34'),
(6, 53, 15, '2018-10-16 22:02:08', '2018-10-16 22:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@test.com', '$2y$10$LwhSeNdSi8h7.TpTxhoRDO.Ta9RSyep3JMCTY51CYL5GMvaal7hTi', 1, '6jZhsHYYzaN6BanawNPjZkxz7lTiOoNYZ3ow4ANDJYzbxumtGo4RyNc7uiQv', '2018-10-16 21:42:36', '2018-10-16 21:42:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages_products`
--
ALTER TABLE `packages_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packages_products_package_id_foreign` (`package_id`),
  ADD KEY `packages_products_product_id_foreign` (`product_id`);

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
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_product_id_foreign` (`product_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `packages_products`
--
ALTER TABLE `packages_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `packages_products`
--
ALTER TABLE `packages_products`
  ADD CONSTRAINT `packages_products_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`),
  ADD CONSTRAINT `packages_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
