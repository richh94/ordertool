-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 21 aug 2019 om 08:56
-- Serverversie: 10.1.40-MariaDB
-- PHP-versie: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ordertool`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `meals`
--

CREATE TABLE `meals` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `restaurant_id` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `is_open` tinyint(1) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `meals`
--

INSERT INTO `meals` (`id`, `created_at`, `updated_at`, `restaurant_id`, `date`, `is_open`, `user_id`) VALUES
(10, '2019-08-20 05:34:31', '2019-08-21 04:47:35', 2, '2019-08-20 07:34:31', 0, 1),
(11, '2019-08-21 04:47:44', '2019-08-21 04:47:44', 2, '2019-08-21 06:47:44', 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `meal_order_rows`
--

CREATE TABLE `meal_order_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `meal_id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `meal_order_rows`
--

INSERT INTO `meal_order_rows` (`id`, `created_at`, `updated_at`, `product_id`, `meal_id`, `user_id`) VALUES
(25, '2019-08-20 05:36:47', '2019-08-20 05:36:47', 2, 10, 2),
(28, '2019-08-20 14:24:48', '2019-08-20 14:24:48', 2, 10, 1),
(29, '2019-08-21 04:48:08', '2019-08-21 04:48:08', 2, 11, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_18_103532_create_restaurants_table', 2),
(4, '2019_08_18_110740_create_products_table', 3),
(6, '2019_08_18_114042_create_product_options_table', 4),
(7, '2019_08_18_120321_create_product_sub_options_table', 5),
(8, '2019_08_18_130738_create_meals_table', 6),
(9, '2019_08_18_133744_create_meal_order_rows_table', 7),
(10, '2019_08_18_133744_create_order_row_sub_options_table', 8),
(11, '2019_08_18_150715_update_users_table', 9),
(13, '2019_08_18_215023_update_meals_table', 10),
(14, '2019_08_18_225149_fix_foreign_key_product_sub_options', 11);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order_row_sub_options`
--

CREATE TABLE `order_row_sub_options` (
  `meal_order_row_id` int(10) UNSIGNED NOT NULL,
  `product_sub_option_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `order_row_sub_options`
--

INSERT INTO `order_row_sub_options` (`meal_order_row_id`, `product_sub_option_id`, `created_at`, `updated_at`) VALUES
(25, 2, '2019-08-20 05:36:47', '2019-08-20 05:36:47'),
(25, 5, '2019-08-20 05:36:47', '2019-08-20 05:36:47'),
(25, 8, '2019-08-20 05:36:47', '2019-08-20 05:36:47'),
(25, 15, '2019-08-20 05:36:47', '2019-08-20 05:36:47'),
(25, 41, '2019-08-20 05:36:47', '2019-08-20 05:36:47'),
(25, 28, '2019-08-20 05:36:47', '2019-08-20 05:36:47'),
(25, 44, '2019-08-20 05:36:47', '2019-08-20 05:36:47'),
(28, 2, '2019-08-20 14:24:48', '2019-08-20 14:24:48'),
(28, 5, '2019-08-20 14:24:48', '2019-08-20 14:24:48'),
(28, 7, '2019-08-20 14:24:48', '2019-08-20 14:24:48'),
(28, 14, '2019-08-20 14:24:48', '2019-08-20 14:24:48'),
(28, 15, '2019-08-20 14:24:48', '2019-08-20 14:24:48'),
(28, 28, '2019-08-20 14:24:48', '2019-08-20 14:24:48'),
(28, 38, '2019-08-20 14:24:48', '2019-08-20 14:24:48'),
(28, 44, '2019-08-20 14:24:48', '2019-08-20 14:24:48'),
(29, 2, '2019-08-21 04:48:08', '2019-08-21 04:48:08'),
(29, 4, '2019-08-21 04:48:08', '2019-08-21 04:48:08'),
(29, 6, '2019-08-21 04:48:08', '2019-08-21 04:48:08'),
(29, 14, '2019-08-21 04:48:08', '2019-08-21 04:48:08'),
(29, 15, '2019-08-21 04:48:08', '2019-08-21 04:48:08'),
(29, 16, '2019-08-21 04:48:08', '2019-08-21 04:48:08'),
(29, 29, '2019-08-21 04:48:08', '2019-08-21 04:48:08'),
(29, 38, '2019-08-21 04:48:08', '2019-08-21 04:48:08'),
(29, 40, '2019-08-21 04:48:08', '2019-08-21 04:48:08'),
(29, 44, '2019-08-21 04:48:08', '2019-08-21 04:48:08');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `restaurant_id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `restaurant_id`, `name`) VALUES
(2, '2019-08-18 09:12:14', '2019-08-18 09:12:14', 2, 'Bread'),
(3, '2019-08-18 12:11:38', '2019-08-18 12:11:38', 2, 'Cola'),
(4, '2019-08-18 12:21:42', '2019-08-20 05:23:03', 3, 'Fries'),
(5, '2019-08-20 10:33:54', '2019-08-20 10:33:54', 2, 'Drinks');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_options`
--

CREATE TABLE `product_options` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL,
  `can_select_multiple` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `product_options`
--

INSERT INTO `product_options` (`id`, `created_at`, `updated_at`, `product_id`, `name`, `required`, `can_select_multiple`) VALUES
(2, '2019-08-18 10:00:40', '2019-08-18 20:44:29', 2, 'Toasted', 1, 0),
(3, '2019-08-18 12:19:39', '2019-08-18 12:19:39', 2, 'Length', 1, 0),
(4, '2019-08-18 18:36:14', '2019-08-18 18:36:14', 2, 'Breadtype', 1, 0),
(6, '2019-08-18 20:48:28', '2019-08-18 20:48:28', 2, 'Vegetables', 0, 1),
(7, '2019-08-18 20:56:05', '2019-08-18 20:56:05', 3, 'Brand', 1, 0),
(8, '2019-08-20 05:20:42', '2019-08-20 05:20:42', 4, 'Size', 0, 0),
(9, '2019-08-20 05:22:05', '2019-08-20 05:22:05', 4, 'Sauce', 0, 0),
(10, '2019-08-20 05:25:00', '2019-08-20 05:25:00', 2, 'Type', 1, 0),
(11, '2019-08-20 05:30:31', '2019-08-20 05:30:31', 2, 'Extra\'s', 0, 1),
(12, '2019-08-20 05:33:10', '2019-08-20 05:33:10', 2, 'Sauce', 1, 0),
(13, '2019-08-20 10:34:10', '2019-08-20 10:35:58', 5, 'Type', 1, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_sub_options`
--

CREATE TABLE `product_sub_options` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_option_id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `product_sub_options`
--

INSERT INTO `product_sub_options` (`id`, `created_at`, `updated_at`, `product_option_id`, `name`) VALUES
(2, '2019-08-18 10:05:10', '2019-08-18 10:05:10', 2, 'Yes'),
(3, '2019-08-18 10:05:22', '2019-08-18 10:05:22', 2, 'No'),
(4, '2019-08-18 12:19:53', '2019-08-18 12:19:53', 3, '15cm'),
(5, '2019-08-18 12:20:01', '2019-08-18 12:20:01', 3, '30cm'),
(6, '2019-08-18 18:36:24', '2019-08-18 18:36:24', 4, 'Sesam'),
(7, '2019-08-18 18:36:31', '2019-08-18 18:36:31', 4, 'White'),
(8, '2019-08-18 18:36:41', '2019-08-18 18:36:41', 4, 'Brown'),
(10, '2019-08-18 20:47:02', '2019-08-18 20:47:02', 4, 'Honey'),
(14, '2019-08-18 20:54:40', '2019-08-18 20:54:40', 6, 'Tomato'),
(15, '2019-08-18 20:55:01', '2019-08-18 20:55:01', 6, 'Lettuce'),
(16, '2019-08-18 20:55:18', '2019-08-18 20:55:18', 6, 'Cucumber'),
(17, '2019-08-18 20:56:15', '2019-08-18 20:56:15', 7, 'Coca-cola'),
(18, '2019-08-18 20:56:25', '2019-08-18 20:56:25', 7, 'Pepsi'),
(19, '2019-08-20 05:21:10', '2019-08-20 05:21:10', 8, 'Small'),
(20, '2019-08-20 05:21:16', '2019-08-20 05:21:16', 8, 'Medium'),
(21, '2019-08-20 05:21:22', '2019-08-20 05:21:22', 8, 'Large'),
(22, '2019-08-20 05:22:17', '2019-08-20 05:22:17', 9, 'Mayo'),
(23, '2019-08-20 05:22:24', '2019-08-20 05:22:24', 9, 'Ketchup'),
(24, '2019-08-20 05:22:34', '2019-08-20 05:22:34', 9, 'Satésaus'),
(25, '2019-08-20 05:25:12', '2019-08-20 05:25:12', 10, 'American Stakehouse Melt'),
(26, '2019-08-20 05:25:19', '2019-08-20 05:25:19', 10, 'B.L.T.'),
(27, '2019-08-20 05:25:29', '2019-08-20 05:25:29', 10, 'Chicken Fajita'),
(28, '2019-08-20 05:25:40', '2019-08-20 05:25:40', 10, 'Chicken Teriyaki'),
(29, '2019-08-20 05:25:47', '2019-08-20 05:25:47', 10, 'Ham'),
(30, '2019-08-20 05:25:58', '2019-08-20 05:25:58', 10, 'Italian B.M.T.'),
(31, '2019-08-20 05:26:06', '2019-08-20 05:26:06', 10, 'Chicken Filet'),
(32, '2019-08-20 05:26:14', '2019-08-20 05:26:14', 10, 'Spicy Italian'),
(33, '2019-08-20 05:26:25', '2019-08-20 05:26:25', 10, 'Steak & Cheese'),
(34, '2019-08-20 05:26:33', '2019-08-20 05:26:33', 10, 'Subway Melt'),
(35, '2019-08-20 05:26:39', '2019-08-20 05:26:39', 10, 'Taco Beef'),
(36, '2019-08-20 05:26:53', '2019-08-20 05:26:53', 10, 'Vegan Patty'),
(37, '2019-08-20 05:27:01', '2019-08-20 05:27:01', 10, 'Veggie Delite'),
(38, '2019-08-20 05:30:44', '2019-08-20 05:30:44', 11, 'Bacon'),
(39, '2019-08-20 05:30:53', '2019-08-20 05:30:53', 11, 'Double meat'),
(40, '2019-08-20 05:30:59', '2019-08-20 05:30:59', 11, 'Cheese'),
(41, '2019-08-20 05:31:29', '2019-08-20 05:31:29', 6, 'Union'),
(42, '2019-08-20 05:32:09', '2019-08-20 05:32:09', 6, 'Green pepper'),
(43, '2019-08-20 05:32:42', '2019-08-20 05:32:42', 6, 'Black olives'),
(44, '2019-08-20 05:33:26', '2019-08-20 05:33:26', 12, 'Sweet chili'),
(45, '2019-08-20 05:33:34', '2019-08-20 05:33:34', 12, 'Caesar'),
(46, '2019-08-20 05:33:42', '2019-08-20 05:33:42', 12, 'Hickory smoked BBQ'),
(47, '2019-08-20 05:33:48', '2019-08-20 05:33:48', 12, 'Mayonaise'),
(48, '2019-08-20 05:33:55', '2019-08-20 05:33:55', 12, 'Southwest Chipotle'),
(49, '2019-08-20 05:34:07', '2019-08-20 05:34:07', 12, 'Sriracha sauce'),
(50, '2019-08-20 05:34:15', '2019-08-20 05:34:15', 12, 'Sweet Onion'),
(51, '2019-08-20 05:34:23', '2019-08-20 05:34:23', 12, 'Whole Grain Honey Mustard'),
(52, '2019-08-20 10:34:50', '2019-08-20 10:34:50', 13, 'Cola'),
(53, '2019-08-20 10:34:56', '2019-08-20 10:34:56', 13, 'Fanta'),
(54, '2019-08-20 10:35:03', '2019-08-20 10:35:03', 13, 'Chocomel');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `restaurants`
--

INSERT INTO `restaurants` (`id`, `created_at`, `updated_at`, `name`) VALUES
(2, '2019-08-18 08:43:42', '2019-08-18 08:43:42', 'Subway'),
(3, '2019-08-18 12:11:26', '2019-08-18 12:11:26', 'AnyTyme Zwolle');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'Richard', 'richard_wemmenhove@live.nl', NULL, '$2y$10$ZE.nhZf/aeS2KR4o/AW9seh3XcdXkqpH/xpc/YciZeete4hn1YYvy', NULL, '2019-08-18 07:36:34', '2019-08-18 13:04:50', 1),
(2, 'testuser', 'test@test.nl', NULL, '$2y$10$ZE.nhZf/aeS2KR4o/AW9seh3XcdXkqpH/xpc/YciZeete4hn1YYvy', NULL, '2019-08-18 13:13:08', '2019-08-18 13:29:01', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meals_user_id_foreign` (`user_id`);

--
-- Indexen voor tabel `meal_order_rows`
--
ALTER TABLE `meal_order_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meal_order_rows_product_id_foreign` (`product_id`),
  ADD KEY `meal_order_rows_meal_id_foreign` (`meal_id`),
  ADD KEY `meal_order_rows_user_id_foreign` (`user_id`);

--
-- Indexen voor tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `order_row_sub_options`
--
ALTER TABLE `order_row_sub_options`
  ADD KEY `order_row_sub_options_meal_order_row_id_foreign` (`meal_order_row_id`),
  ADD KEY `order_row_sub_options_product_sub_option_id_foreign` (`product_sub_option_id`);

--
-- Indexen voor tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexen voor tabel `product_options`
--
ALTER TABLE `product_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_options_product_id_foreign` (`product_id`);

--
-- Indexen voor tabel `product_sub_options`
--
ALTER TABLE `product_sub_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_sub_options_product_option_id_foreign` (`product_option_id`);

--
-- Indexen voor tabel `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `meals`
--
ALTER TABLE `meals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `meal_order_rows`
--
ALTER TABLE `meal_order_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT voor een tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `product_options`
--
ALTER TABLE `product_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `product_sub_options`
--
ALTER TABLE `product_sub_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT voor een tabel `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `meals`
--
ALTER TABLE `meals`
  ADD CONSTRAINT `meals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `meal_order_rows`
--
ALTER TABLE `meal_order_rows`
  ADD CONSTRAINT `meal_order_rows_meal_id_foreign` FOREIGN KEY (`meal_id`) REFERENCES `meals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `meal_order_rows_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `meal_order_rows_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `order_row_sub_options`
--
ALTER TABLE `order_row_sub_options`
  ADD CONSTRAINT `order_row_sub_options_meal_order_row_id_foreign` FOREIGN KEY (`meal_order_row_id`) REFERENCES `meal_order_rows` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_row_sub_options_product_sub_option_id_foreign` FOREIGN KEY (`product_sub_option_id`) REFERENCES `product_sub_options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `product_options`
--
ALTER TABLE `product_options`
  ADD CONSTRAINT `product_options_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `product_sub_options`
--
ALTER TABLE `product_sub_options`
  ADD CONSTRAINT `product_sub_options_product_option_id_foreign` FOREIGN KEY (`product_option_id`) REFERENCES `product_options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
