-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 25, 2024 at 11:04 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_inv_m_s`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Brand1', '2024-10-13 00:06:43', '2024-10-13 00:06:43'),
(2, 'Test', '2024-10-13 00:06:48', '2024-10-13 00:06:48'),
(3, 'Kaji Nozrul Islam', '2024-10-13 00:07:03', '2024-10-13 00:07:03'),
(4, 'ttttt', '2024-10-25 02:13:20', '2024-10-25 02:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'test1', '2024-10-13 00:05:56', '2024-10-13 00:05:56'),
(2, 'book', '2024-10-13 00:06:02', '2024-10-13 00:06:02'),
(3, 'City', '2024-10-13 00:06:14', '2024-10-13 00:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_09_14_161453_create_sessions_table', 1),
(7, '2024_09_14_162706_create_categories_table', 1),
(8, '2024_09_14_162810_create_brands_table', 1),
(9, '2024_09_14_162844_create_sizes_table', 1),
(10, '2024_09_14_162915_create_products_table', 1),
(11, '2024_10_25_095203_create_product_size_stocks_table', 2);

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
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `brand_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_price` decimal(8,2) NOT NULL,
  `retail_price` decimal(8,2) NOT NULL,
  `year` year NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `category_id`, `brand_id`, `name`, `sku`, `image`, `cost_price`, `retail_price`, `year`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 1, 'fgdfh tr', '3453', 'C:\\Users\\user\\AppData\\Local\\Temp\\php89D5.tmp', 4534.00, 3000.00, '2024', 'sdfsaf sf fasf', 1, '2024-10-17 02:10:22', '2024-10-17 02:10:22'),
(2, NULL, 1, 1, 'fgdfh tr', '235de', 'storage/product_image/qCfoUSlCHyHpNa2lNVccZgaEJP0IJpEkc4DolLEJsH169d3nKX4lI9lO7XGx.jpeg', 4534.00, 3000.00, '2024', 'sdfsaf sf fasf', 1, '2024-10-17 02:17:32', '2024-10-17 02:17:32'),
(3, NULL, 1, 1, 'fgdfh tr', '235dett', 'storage/product_image/4j2HW7kSp5Ts5cWiXAOkEdYvVhuEZxeRCApmLiRw2fjBVsIhbAFYZ5bW75Z4.jpeg', 4534.00, 3000.00, '2024', 'sdfsaf sf fasf', 1, '2024-10-17 02:18:15', '2024-10-17 02:18:15'),
(4, NULL, 1, 1, 'fgdfh tr', '235dettse', 'storage/product_image/cODyQhQGUvVgCUy4FWT36gGdc7pfaT0fAcwQ0URwPo3xVgiDFVlt4ge1Tjhf.jpeg', 4534.00, 3000.00, '2024', 'sdfsaf sf fasf', 1, '2024-10-17 02:19:32', '2024-10-17 02:19:32'),
(5, NULL, 2, 2, 'sdgfsdgdg dfg dg', 'erwrwrw', 'storage/product_image/ahDVhwUSBrSQokXj9G3ZfimhA4LwbzHnzv3Rc15YEafsFLk7V7O3s4ERe9v5.jpeg', 4534.00, 3000.00, '2024', 'sdfsaf sf fasf', 0, '2024-10-17 02:21:00', '2024-10-17 02:21:00'),
(6, NULL, 1, 1, 'T-shirt test', '3453po', 'storage/product_image/OjfJGxWundIi8o5eM9W5G60qYttP9FG4sPYEfj8liu96s0Mrx7o10yvikbGS.png', 450.00, 300.00, '2024', 'test t-shirt 1111', 1, '2024-10-24 23:39:17', '2024-10-24 23:39:17'),
(7, NULL, 2, 2, 'dfgdgd ege gvdeg', 'sdffte34 5', 'storage/product_image/ursHB9sH1m1uEDtU8te3pZ2ZVLWVVY5CCpYlS4bVkZt9iCbDwp0QkYO3f6P7.png', 44533.00, 4535.00, '2024', 'sdfasfasf sdfasf asfas', 1, '2024-10-24 23:49:34', '2024-10-24 23:49:34'),
(8, NULL, 2, 3, 'sdfdasfasd fasdfas', 'gfh1', 'storage/product_image/cdU4k17lBYljzqIDvRnAtupex7Yk8FKM2Njnl4xjrXAUjU8i3Y7W0nKWMFBK.png', 34433.00, 3333.00, '2024', 'sadfasf sfas fasfasfsf', 1, '2024-10-25 02:14:38', '2024-10-25 02:14:38'),
(9, NULL, 2, 3, 'sdfasf sfasfas', 'sdafasr', 'storage/product_image/pFBcgqckHwPhOFN5dgWUupYyNe1PyxwTkfmB3Afb2NHn9hXIGWuWNlwWmryC.jpg', 4444.00, 3333.00, '2024', 'fasfasfasf', 1, '2024-10-25 02:16:47', '2024-10-25 02:16:47'),
(10, NULL, 3, 3, 'sdfasfefasdfvas fasdf', 'sfsfasfasfasfas', 'storage/product_image/jbkjGgC5crXUD0l3NP4V3vBBuyMhCa9er8acrokaKLNmXrzg6BTvuDUKK8PU.jpg', 55555.00, 4444.00, '2024', 'gdg gdgsd gdgsd gsdgsdgsdg', 1, '2024-10-25 02:20:56', '2024-10-25 02:20:56'),
(11, 1, 2, 4, 'fsafs fsdfas fasf', 'sdfsarwerwr', 'storage/product_image/qPLZ47lpDjn13YxIkKATLqorJfM2n0ck3AEAF3I20HgzPGtHcEGaCfkQCzFh.jpeg', 55555.00, 5555.00, '2024', 'sdfafdsafasd fasfas fasf', 1, '2024-10-25 02:34:09', '2024-10-25 02:34:09'),
(12, 1, 2, 1, 'yyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', 'tyuuiop', 'storage/product_image/f79qMgFc2iHXyOPq0y648Qako8bQefgDypcj0RsieRsOXdRmaYePjr4J6G1C.png', 6666.00, 5555.00, '2024', 'yuiopppppppppppppppppppppppppppppppp', 1, '2024-10-25 04:19:41', '2024-10-25 04:19:41'),
(13, 1, 1, 1, 'sdfgsdgfs', 'fsdgsdg', 'storage/product_image/3IWdwYygG4Woqzsn2HH947w1cYrt9JscbPunbmZJlbRw1BvgVoDl0s7qyUNJ.jpg', 777.00, 666.00, '2024', 'sdgf dfsg sdfg sdfgdyyyyyyyyyyyyyyyyyyyy', 1, '2024-10-25 04:22:42', '2024-10-25 04:22:42'),
(14, 1, 1, 1, 'sdafsssssssssssssssssssssssssssssss', 'sffrrefff', 'storage/product_image/YKETMnhHWCReztpreJryuZAy3IzLHi4afTgq7XlqjBwxpkBQ21yDpKER88wk.jpeg', 444.00, 443.00, '2024', 'sadfasf asdfas fasf', 1, '2024-10-25 04:38:45', '2024-10-25 04:38:45'),
(15, 1, 1, 1, 'sdafsssssssssssssssssssssssssssssss', 'ggggggggg', 'storage/product_image/5tQLENILlRoelXNBacRy4zRPxKipLj8nLvh8MkIGZxe4zbWQXoiGm1NeOf5g.jpeg', 444.00, 443.00, '2024', 'sadfasf asdfas fasf', 1, '2024-10-25 04:40:29', '2024-10-25 04:40:29'),
(16, 1, 3, 3, 'iiiiiiiiiiiiiii', 'iiiiii', 'storage/product_image/kstPJDN9p5vGKFLiDR9ZycOSFL6jAQE9OKcVguaXLgKQZJOssiyOFeeWlEns.png', 999.00, 888.00, '2024', 'asdffadfasfasfasf', 1, '2024-10-25 04:42:34', '2024-10-25 04:42:34'),
(17, 1, 2, 2, 'LLLLLLLLLLLLLLLL', 'LLLLLLLLLLLLLLLLLL', 'storage/product_image/5ewix8vmyqjMhXSVFr9LETKeR8UV9GSBYFD7ZDgfFeJ8HBnPrKCs0u8VARGz.png', 999.00, 888.00, '2024', 'LLLLLLLLLLLLLL', 1, '2024-10-25 04:44:56', '2024-10-25 04:44:56'),
(18, 1, 1, 1, 'afaf asfdafaf 12', 'SKU 45', 'storage/product_image/3VPORMCzNEMoG32eiXk0xdaIG0U6FnPbcGpD0e8JubFu86eWsjfOIvnKvID7.jpg', 1234.00, 1122.00, '2024', 'tesrs sfasfas fasf asfasfas', 1, '2024-10-25 04:55:26', '2024-10-25 04:55:26');

-- --------------------------------------------------------

--
-- Table structure for table `product_size_stocks`
--

CREATE TABLE `product_size_stocks` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `size_id` bigint UNSIGNED DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_size_stocks`
--

INSERT INTO `product_size_stocks` (`id`, `product_id`, `size_id`, `location`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'A1', 44, '2024-10-25 04:22:42', '2024-10-25 04:22:42'),
(2, 1, NULL, 'B1', 33, '2024-10-25 04:22:42', '2024-10-25 04:22:42'),
(3, 17, 1, 'L!', 22, '2024-10-25 04:44:56', '2024-10-25 04:44:56'),
(4, 17, 2, 'L2', 12, '2024-10-25 04:44:56', '2024-10-25 04:44:56'),
(5, 17, 3, 'L3', 11, '2024-10-25 04:44:56', '2024-10-25 04:44:56'),
(6, 18, 1, 'R1', 12, '2024-10-25 04:55:26', '2024-10-25 04:55:26'),
(7, 18, 2, 'R2', 22, '2024-10-25 04:55:26', '2024-10-25 04:55:26'),
(8, 18, 3, 'RT', 111, '2024-10-25 04:55:26', '2024-10-25 04:55:26');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('gEAEPzYvpXBwJdJqhr6aFzWKlE7Hu7ML6S2vgPMU', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiV1B4anlXSkhwVUpENTlEY1B4VUFwUkVPVEpLblBXbnFqbGxkcm9GRiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0cyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQuODJCWjhOR3BNdUhLV3hwZkduNUR1SW5LZHdNaFp3WHV1RGYyelRLR1pnbC9HUks5N0NpMiI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkLjgyQlo4TkdwTXVIS1d4cGZHbjVEdUluS2R3TWhad1h1dURmMnpUS0daZ2wvR1JLOTdDaTIiO30=', 1729853726),
('xTvfovWsjPcJn13hMypwLQ9FttudBcCflxxsHLIX', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiZ2poYmlNN056RkhjaXN4blZaYTk1bkYwWDdBbXFXN2dWUlV3bzJvRCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMwOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcHJvZHVjdHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkLjgyQlo4TkdwTXVIS1d4cGZHbjVEdUluS2R3TWhad1h1dURmMnpUS0daZ2wvR1JLOTdDaTIiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJC44MkJaOE5HcE11SEtXeHBmR241RHVJbktkd01oWndYdXVEZjJ6VEtHWmdsL0dSSzk3Q2kyIjt9', 1729853820);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `size` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `created_at`, `updated_at`) VALUES
(1, 'XL', '2024-10-13 00:07:31', '2024-10-13 00:07:31'),
(2, 'XXL', '2024-10-13 00:07:40', '2024-10-13 00:07:40'),
(3, 'Medium', '2024-10-13 00:07:48', '2024-10-13 00:07:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Sagor Ali BD', 'mdsagorali033@gmail.com', NULL, '$2y$10$.82BZ8NGpMuHKWxpfGn5DuInKdwMhZwXuuDf2zTKGZgl/GRK97Ci2', NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-13 00:05:08', '2024-10-13 00:05:08');

--
-- Indexes for dumped tables
--

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
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_size_stocks`
--
ALTER TABLE `product_size_stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_size_stocks_product_id_foreign` (`product_id`),
  ADD KEY `product_size_stocks_size_id_foreign` (`size_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_size_stocks`
--
ALTER TABLE `product_size_stocks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `product_size_stocks`
--
ALTER TABLE `product_size_stocks`
  ADD CONSTRAINT `product_size_stocks_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_size_stocks_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
