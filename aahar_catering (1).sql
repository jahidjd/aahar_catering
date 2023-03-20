-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2023 at 11:45 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aahar_catering`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Non-Veg Starter', 'this is a test description for non veg starter', '2023-03-19 15:27:02', '2023-03-19 15:27:02'),
(3, 'Veg Starter', 'This is a test description', '2023-03-19 15:31:27', '2023-03-19 15:31:27'),
(4, 'Cereals', 'This is a test description', '2023-03-19 15:31:43', '2023-03-19 15:31:43'),
(5, 'Pulses', 'This is a test description', '2023-03-19 15:31:58', '2023-03-19 15:31:58'),
(6, 'Veg Main Cource', 'This is a test description', '2023-03-19 15:32:17', '2023-03-19 15:32:17'),
(7, 'NonVeg Main Cource', 'This is a test description', '2023-03-19 15:32:34', '2023-03-19 15:32:34'),
(8, 'Beverages', 'This is a test description', '2023-03-19 15:32:52', '2023-03-19 15:32:52'),
(9, 'Salad', 'This is Salad', '2023-03-19 15:33:33', '2023-03-19 15:33:33'),
(10, 'Soup', 'This is Soup', '2023-03-19 15:33:49', '2023-03-19 15:33:49'),
(11, 'Desserts', 'This is Desserts', '2023-03-19 15:34:05', '2023-03-19 15:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `correlations`
--

CREATE TABLE `correlations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `item_id` varchar(255) DEFAULT NULL,
  `ratio` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `correlations`
--

INSERT INTO `correlations` (`id`, `category_id`, `item_id`, `ratio`, `created_at`, `updated_at`) VALUES
(1, '8', '2,3,4', '5,5,6,3', NULL, NULL),
(2, '4', '9,10,11', '3,100,5', NULL, NULL),
(3, '1', '4,5,6,7,8,9,10,11', '5,5,6,3,5,6,4,8', NULL, NULL),
(4, '4', '1,2,3', '5,6,5', NULL, NULL),
(5, '1', '1,13', '150,100', NULL, NULL),
(6, '8', '2,3,6', '2,5,1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_name` char(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_factor` char(100) NOT NULL DEFAULT '1',
  `address` char(255) NOT NULL,
  `phone` char(20) NOT NULL,
  `email` char(100) NOT NULL,
  `party_name` char(150) NOT NULL,
  `job_no` char(255) NOT NULL,
  `organized_by` char(255) NOT NULL,
  `arrangement` char(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_date`, `event_factor`, `address`, `phone`, `email`, `party_name`, `job_no`, `organized_by`, `arrangement`, `created_at`, `updated_at`) VALUES
(1, 'Rahims Birthday', '2023-03-22', '1', 'Dhaka', '01627809808', 'admin@gmail.com', 'Jahid', 'event-20032023_1', 'Naim', 'Dinner', '2023-03-20 02:55:39', '2023-03-20 02:55:39'),
(2, 'test event', '2023-03-23', '1', 'Dhaka', '01627809808', 'admin@gmail.com', 'Tam', 'event-20032023_2', 'Naim', 'Dinner', '2023-03-20 03:10:39', '2023-03-20 03:10:39'),
(3, 'Rahims Birthday', '2023-03-23', '1', 'Dhaka', '01627809808', 'admin@gmail.com', 'Akash', 'event-20032023_3', 'Shuvam', 'Dinner', '2023-03-20 03:20:05', '2023-03-20 03:20:05'),
(4, 'Birthday', '2023-03-22', '1', 'Dhaka', '01627809808', 'admin@gmail.com', 'Kashem', 'event-20032023_4', 'Naim', 'Dinner', '2023-03-20 03:34:18', '2023-03-20 03:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `event_menus`
--

CREATE TABLE `event_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `menu_name` char(150) NOT NULL,
  `number_of_attendees` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `ingredient_type_id` bigint(20) UNSIGNED NOT NULL,
  `name` char(255) NOT NULL,
  `quantity_per_unit` bigint(20) NOT NULL,
  `unit_of_quantity` char(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ingredient_types`
--

CREATE TABLE `ingredient_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` char(150) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ingredient_types`
--

INSERT INTO `ingredient_types` (`id`, `type`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Raw Non Veg Item', 'hgfd', '2023-03-20 03:54:42', '2023-03-20 03:54:42');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `item_name` char(255) NOT NULL,
  `avg_per_head_qunatity` bigint(20) NOT NULL,
  `unit_of_measurement` char(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `category_id`, `item_name`, `avg_per_head_qunatity`, `unit_of_measurement`, `created_at`, `updated_at`) VALUES
(1, 1, 'Fish Fry', 200, 'gm', '2023-03-19 15:27:13', '2023-03-19 15:27:13'),
(2, 8, 'Tea', 2, 'cup', '2023-03-19 15:34:49', '2023-03-19 15:34:49'),
(3, 8, 'Coffee', 2, 'cup', '2023-03-19 15:35:19', '2023-03-19 15:35:19'),
(4, 8, 'Aam Porar Sharbat', 1, 'cup', '2023-03-19 15:35:39', '2023-03-19 15:35:39'),
(5, 8, 'Gandharaj Ghol', 1, 'cup', '2023-03-19 15:37:44', '2023-03-19 15:37:44'),
(6, 8, 'Virgin Mohito', 1, 'cup', '2023-03-19 15:37:58', '2023-03-19 15:37:58'),
(7, 8, 'Spanish Garlic Soup', 1, 'cup', '2023-03-19 15:38:10', '2023-03-19 15:38:10'),
(8, 8, 'Tomato Soup', 1, 'cup', '2023-03-19 15:38:21', '2023-03-19 15:38:21'),
(9, 8, 'Garlic Bread', 1, 'p', '2023-03-19 15:38:55', '2023-03-19 15:38:55'),
(10, 8, 'French Fry', 200, 'gm', '2023-03-19 15:39:11', '2023-03-19 15:39:11'),
(11, 8, 'Tomato Sauses', 2, 'p', '2023-03-19 15:39:23', '2023-03-19 15:39:23'),
(12, 1, 'Fish Fry', 200, 'gm', '2023-03-20 03:21:25', '2023-03-20 03:21:25'),
(13, 1, 'fish finger', 200, 'gm', '2023-03-20 03:21:32', '2023-03-20 03:21:32');

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
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_03_14_035555_create_categories_table', 1),
(7, '2023_03_14_051509_create_items_table', 1),
(8, '2023_03_14_063221_create_ingredient_types_table', 1),
(9, '2023_03_14_071311_create_ingredients_table', 1),
(10, '2023_03_14_084631_create_events_table', 1),
(11, '2023_03_14_095024_create_event_menus_table', 1),
(12, '2023_03_15_044015_create_orders_table', 1),
(13, '2023_03_15_055042_create_correlations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` varchar(255) DEFAULT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `party_name` bigint(20) UNSIGNED DEFAULT NULL,
  `menu_name` char(150) DEFAULT NULL,
  `number_of_attendees` bigint(20) DEFAULT NULL,
  `number_of_veg` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `item_id`, `category_id`, `party_name`, `menu_name`, `number_of_attendees`, `number_of_veg`, `created_at`, `updated_at`) VALUES
(1, '2,3,4', '8', 1, 'breakfast', 100, 10, NULL, NULL),
(2, '9,10,11', '4', 1, 'breakfast', 100, 10, NULL, NULL),
(3, '4,5,6,7,8,9,10,11', '1', 2, 'lunch', 100, 10, NULL, NULL),
(4, '1,2,3', '4', 2, 'lunch', 100, 10, NULL, NULL),
(5, '9,10', '1', 3, 'lunch', 100, 10, NULL, NULL),
(6, '2,3', '8', 3, 'lunch', 100, 10, NULL, NULL),
(7, '1,13', '1', 3, 'breakfast', 100, 10, NULL, NULL),
(8, '2,3,5,6', '8', 3, 'breakfast', 100, 10, NULL, NULL),
(9, '6', '4', 3, 'breakfast', 100, 10, NULL, NULL),
(10, '1,13', '1', 3, 'dinner', 100, 10, NULL, NULL),
(11, '2,3,6', '8', 3, 'dinner', 100, 10, NULL, NULL),
(12, '1,13', '1', 4, 'dinner', 100, 10, NULL, NULL),
(13, '2', '8', 4, 'dinner', 100, 10, NULL, NULL),
(14, '12,13', '1', 4, 'dinner', 100, 10, NULL, NULL),
(15, '2', '8', 4, 'dinner', 100, 10, NULL, NULL);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$vGLKE5NELbpvqfjN10zIWONPqqYpcN86drU9K33exxA0OWouaqiya', NULL, '2023-03-20 02:52:38', '2023-03-20 02:52:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `correlations`
--
ALTER TABLE `correlations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_menus`
--
ALTER TABLE `event_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_menus_event_id_foreign` (`event_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredients_item_id_foreign` (`item_id`),
  ADD KEY `ingredients_ingredient_type_id_foreign` (`ingredient_type_id`);

--
-- Indexes for table `ingredient_types`
--
ALTER TABLE `ingredient_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_category_id_foreign` (`category_id`);

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
  ADD KEY `orders_party_name_foreign` (`party_name`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `correlations`
--
ALTER TABLE `correlations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_menus`
--
ALTER TABLE `event_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ingredient_types`
--
ALTER TABLE `ingredient_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_menus`
--
ALTER TABLE `event_menus`
  ADD CONSTRAINT `event_menus_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_ingredient_type_id_foreign` FOREIGN KEY (`ingredient_type_id`) REFERENCES `ingredient_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ingredients_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_party_name_foreign` FOREIGN KEY (`party_name`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
