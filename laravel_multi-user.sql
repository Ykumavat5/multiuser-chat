-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 06, 2024 at 10:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_multi-user`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `friend_id` int(10) UNSIGNED NOT NULL,
  `message` text DEFAULT NULL,
  `media` text DEFAULT NULL,
  `chat_id` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `user_id`, `friend_id`, `message`, `media`, `chat_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'hi', NULL, '96f26380-690f-434f-b792-feb8b3c3ce05', '2024-12-04 01:19:24', '2024-12-04 01:19:24'),
(2, 3, 1, 'hi', NULL, '231a90b3-5712-489b-9e27-e1a959dc9257', '2024-12-04 01:28:22', '2024-12-04 01:28:22'),
(3, 2, 1, 'hi', NULL, '96f26380-690f-434f-b792-feb8b3c3ce05', '2024-12-04 01:28:49', '2024-12-04 01:28:49'),
(6, 4, 4, 'hi', NULL, '4ada20cd-3711-4224-9690-ab4142938781', '2024-12-04 02:18:27', '2024-12-04 02:18:27'),
(7, 4, 2, 'hi', NULL, '08eba498-64fa-4416-8285-e40e72b08d9c', '2024-12-04 02:29:14', '2024-12-04 02:29:14'),
(11, 4, 1, 'g', NULL, 'fcdef0d0-31ae-421f-82e0-fb7d25daa8fd', '2024-12-04 04:52:57', '2024-12-04 04:52:57'),
(17, 4, 3, 'hi', NULL, 'b6c1474c-0bc4-4560-b073-feee5c424429', '2024-12-04 06:18:30', '2024-12-04 06:18:30'),
(23, 3, 2, NULL, 'media/Lu5ommCLNmmQy7wo4271Q4aZLzwPBvFM84BIcL0K.jpg,media/o8iK22HVaKPoBQxMYR82hNzifZVA72XjFCiR3RYE.jpg', 'd7f01785-1180-45bc-b45a-2a71517e5e5e', '2024-12-04 07:49:34', '2024-12-04 07:49:34'),
(24, 2, 2, NULL, 'media/jdm5jdKzbJJgfMpGqfgOluELsd1vhNeQBjA19y0b.jpg,media/DnpwNgJJ2ftVl4rVhvqFTBEuZ1VmMKQ99Ron70W5.jpg', '43be0cde-f8dc-4208-99c0-609efb40e48f', '2024-12-04 23:13:23', '2024-12-04 23:13:23'),
(25, 2, 2, 'hi', NULL, '43be0cde-f8dc-4208-99c0-609efb40e48f', '2024-12-04 23:44:24', '2024-12-04 23:44:24'),
(26, 3, 2, NULL, 'media/d5MQ1INNm0Q5iCqMwlILtp2aBXR8GtE7yXy1wKh8.png,media/R6dzhzsQyuuoheyEdSP7BimTOaCAB1bfhMIaNsCu.jpg', 'd7f01785-1180-45bc-b45a-2a71517e5e5e', '2024-12-05 00:15:37', '2024-12-05 00:15:37'),
(27, 2, 3, NULL, 'media/1QIcuSI5pR8f5IPeCZGL1kEamtHO33lpuNHhdO7Q.jpg', 'd7f01785-1180-45bc-b45a-2a71517e5e5e', '2024-12-05 00:16:50', '2024-12-05 00:16:50'),
(28, 2, 3, '', 'media/GBHFn8uFNeZkkep2ppTtquK5bN8IiGhyegkiudiD.pdf', 'd7f01785-1180-45bc-b45a-2a71517e5e5e', '2024-12-05 02:45:41', '2024-12-05 02:45:41'),
(29, 2, 3, '', NULL, 'd7f01785-1180-45bc-b45a-2a71517e5e5e', '2024-12-05 02:45:42', '2024-12-05 02:45:42'),
(30, 2, 2, NULL, 'media/HWQiGMu1kFEMcGUotSdoWpN3m40R3g0dHrav9WzV.mp4', '43be0cde-f8dc-4208-99c0-609efb40e48f', '2024-12-05 05:12:23', '2024-12-05 05:12:23'),
(31, 2, 2, NULL, 'media/t75N0VCv7ekvdS60XG5ZNzG4lza6zjpiKt7uSvD8.mp3', '43be0cde-f8dc-4208-99c0-609efb40e48f', '2024-12-05 05:28:10', '2024-12-05 05:28:10'),
(32, 2, 2, NULL, 'media/PmF9Yn1UXkAUjTy5sgz3RLR9nWyBtkxR3ISxKRGm.pdf', '43be0cde-f8dc-4208-99c0-609efb40e48f', '2024-12-05 05:37:50', '2024-12-05 05:37:50'),
(33, 3, 3, 'hi', NULL, '7c0a16c4-6f67-43e7-b059-eeedffaa1c67', '2024-12-05 23:36:16', '2024-12-05 23:36:16'),
(34, 3, 3, '', 'media/NI7TvlUqHoGLua9CLQi5bM7Tc0xxXZuptn5Bde4G.mp3,media/nrRu5wEPmKI3Re2T0fSO3exA6XakFespDVtuy63H.png', '7c0a16c4-6f67-43e7-b059-eeedffaa1c67', '2024-12-05 23:36:24', '2024-12-05 23:36:24'),
(35, 3, 3, 'hi', NULL, '7c0a16c4-6f67-43e7-b059-eeedffaa1c67', '2024-12-05 23:37:56', '2024-12-05 23:37:56'),
(36, 2, 3, 'hi', NULL, 'd7f01785-1180-45bc-b45a-2a71517e5e5e', '2024-12-05 23:38:48', '2024-12-05 23:38:48'),
(37, 2, 3, 'hi', NULL, 'd7f01785-1180-45bc-b45a-2a71517e5e5e', '2024-12-05 23:39:33', '2024-12-05 23:39:33'),
(38, 3, 2, 'hi', NULL, 'd7f01785-1180-45bc-b45a-2a71517e5e5e', '2024-12-05 23:40:54', '2024-12-05 23:40:54'),
(39, 3, 2, 'hello', NULL, 'd7f01785-1180-45bc-b45a-2a71517e5e5e', '2024-12-05 23:43:17', '2024-12-05 23:43:17'),
(40, 3, 2, 'hi', NULL, 'd7f01785-1180-45bc-b45a-2a71517e5e5e', '2024-12-05 23:52:00', '2024-12-05 23:52:00'),
(41, 3, 3, '11.00', NULL, '7c0a16c4-6f67-43e7-b059-eeedffaa1c67', '2024-12-06 00:00:39', '2024-12-06 00:00:39'),
(42, 3, 2, '11.00', NULL, 'd7f01785-1180-45bc-b45a-2a71517e5e5e', '2024-12-06 00:00:49', '2024-12-06 00:00:49'),
(43, 2, 3, '11.22 from yogesh', NULL, 'd7f01785-1180-45bc-b45a-2a71517e5e5e', '2024-12-06 00:23:11', '2024-12-06 00:23:11'),
(44, 3, 2, 'hi 11.50', NULL, 'd7f01785-1180-45bc-b45a-2a71517e5e5e', '2024-12-06 00:50:39', '2024-12-06 00:50:39');

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
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `chat_id` char(36) NOT NULL,
  `friend_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`id`, `user_id`, `chat_id`, `friend_id`, `created_at`, `updated_at`) VALUES
(1, 2, '96f26380-690f-434f-b792-feb8b3c3ce05', 1, '2024-12-04 01:19:15', '2024-12-04 01:19:15'),
(2, 1, '96f26380-690f-434f-b792-feb8b3c3ce05', 2, '2024-12-04 01:19:15', '2024-12-04 01:19:15'),
(3, 3, 'd7f01785-1180-45bc-b45a-2a71517e5e5e', 2, '2024-12-04 01:26:40', '2024-12-04 01:26:40'),
(4, 2, 'd7f01785-1180-45bc-b45a-2a71517e5e5e', 3, '2024-12-04 01:26:40', '2024-12-04 01:26:40'),
(5, 3, '231a90b3-5712-489b-9e27-e1a959dc9257', 1, '2024-12-04 01:28:17', '2024-12-04 01:28:17'),
(6, 1, '231a90b3-5712-489b-9e27-e1a959dc9257', 3, '2024-12-04 01:28:17', '2024-12-04 01:28:17'),
(7, 4, 'b6c1474c-0bc4-4560-b073-feee5c424429', 3, '2024-12-04 02:09:22', '2024-12-04 02:09:22'),
(8, 3, 'b6c1474c-0bc4-4560-b073-feee5c424429', 4, '2024-12-04 02:09:22', '2024-12-04 02:09:22'),
(9, 4, '08eba498-64fa-4416-8285-e40e72b08d9c', 2, '2024-12-04 02:09:33', '2024-12-04 02:09:33'),
(10, 2, '08eba498-64fa-4416-8285-e40e72b08d9c', 4, '2024-12-04 02:09:33', '2024-12-04 02:09:33'),
(11, 4, 'fcdef0d0-31ae-421f-82e0-fb7d25daa8fd', 1, '2024-12-04 02:09:42', '2024-12-04 02:09:42'),
(12, 1, 'fcdef0d0-31ae-421f-82e0-fb7d25daa8fd', 4, '2024-12-04 02:09:42', '2024-12-04 02:09:42'),
(13, 4, '4ada20cd-3711-4224-9690-ab4142938781', 4, '2024-12-04 02:18:19', '2024-12-04 02:18:19'),
(15, 3, '7c0a16c4-6f67-43e7-b059-eeedffaa1c67', 3, '2024-12-04 06:41:59', '2024-12-04 06:41:59'),
(16, 2, '43be0cde-f8dc-4208-99c0-609efb40e48f', 2, '2024-12-04 23:13:08', '2024-12-04 23:13:08');

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
(5, '2022_02_06_060853_create_posts_table', 1),
(6, '2022_02_06_101123_create_frinds_table', 1),
(7, '2022_02_06_162847_create_chats_table', 1);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
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
  `uuid` char(36) NOT NULL,
  `image` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `uuid`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dustin Volkman', 'tauseeedzaman@test.com', '2024-12-04 01:15:03', '$2y$10$E4tJ9pgsthyl985ZXP/Ryey57WR08jS/dqlHebNALuhWHm3o7GnUy', '4d1cff0b-4150-341d-956c-dca2e0ad512d', 'storage/avatars/default.jpg', 'qHvdGzh2h0', '2024-12-04 01:15:03', '2024-12-04 01:15:03'),
(2, 'yogesh', 'yogeshkumavat42615@gmail.com', NULL, '$2y$10$E4tJ9pgsthyl985ZXP/Ryey57WR08jS/dqlHebNALuhWHm3o7GnUy', '999dd5df-262e-4822-bab0-d7de47d025f5', 'storage/avatars/Vwy51mK2mqMCOKbcfqmdutvnFg9PGGIECvnktmQ4.jpg', NULL, '2024-12-04 01:19:05', '2024-12-04 01:19:05'),
(3, 'John Doe', 'yogesh.kumavat.mscit22@gmail.com', NULL, '$2y$10$SWr1dLGuuFrdvnpOruypHe9jF2Nd65hQz9xVi4.dgOVJIzkcVrbXa', 'd3f14223-a97b-41e7-9733-352f8f9e02df', 'storage/avatars/tpNtKRiq993YUGg5ZQkBq9hIS3kUm14amXkGTZxL.jpg', NULL, '2024-12-04 01:20:38', '2024-12-04 01:20:38'),
(4, 'user1', 'yogesh.kumavat.mscit221@gmail.com', NULL, '$2y$10$I/0ABy8U0pPzIjRZaE6tNezMqkVIuZH2.n5k.d/PZanwHMi9p1UGu', 'a4321269-bfdd-432a-870c-946fa0636300', 'storage/avatars/vgV4jeWQ1grklEO3gGarCrx1hycJ38JDla4El2MH.jpg', NULL, '2024-12-04 02:00:46', '2024-12-04 02:00:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chats_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`id`),
  ADD KEY `friend_user_id_foreign` (`user_id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friend`
--
ALTER TABLE `friend`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `friend`
--
ALTER TABLE `friend`
  ADD CONSTRAINT `friend_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
