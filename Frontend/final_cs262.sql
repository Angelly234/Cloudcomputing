-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 07, 2023 at 02:17 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_cs262`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Sok Eng', 'aaaa@gmail.com', '$2y$10$wrLLZ2Qdf40XGW9aLVJwiewISQAUKWnGFqOOhOUmdjxaW2ZLnr2Hi', '2023-07-05 07:02:19', '2023-07-05 07:02:19'),
(2, 'Headangelly Huy', 'hhuy@paragoniu.edu.kh', '$2y$10$H3q88uhcGHj9Cyj8s/VHN.JDch4j1BFmMqZqDkEM.pVkAqwUZKzvG', '2023-07-06 02:26:02', '2023-07-06 02:26:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2023_06_21_022454_create_scholars_table', 1),
(3, '2023_06_21_040148_create_scholars_profile_table', 1),
(4, '2023_06_21_040247_create_upload_papers_table', 1),
(5, '2023_06_21_064557_create_users_profile_table', 1),
(6, '2023_06_30_031520_create_admins_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `scholars`
--

DROP TABLE IF EXISTS `scholars`;
CREATE TABLE IF NOT EXISTS `scholars` (
  `scholars_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ban` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`scholars_id`),
  UNIQUE KEY `scholars_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scholars`
--

INSERT INTO `scholars` (`scholars_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `ban`, `created_at`, `updated_at`) VALUES
(1, 'Scholar Musk', 'aaaa@gmail.com', '2023-07-25 10:12:52', '$2y$10$Vi3D6X2B3pBU75joWXTjYe/ry7BUReKyFnWoYZbbF6lBEVkDZk8TO', NULL, 0, '2023-06-29 06:39:32', '2023-07-06 10:12:56'),
(2, 'Scholar Eng', 'bbbb@gmail.com', '2023-07-19 10:12:43', '$2y$10$uSgY0PaPAaPca9mHm3taquZ2FN2fW2UgQlGAVDybjh.EYwDwKBh3O', NULL, 0, '2023-06-29 06:51:30', '2023-07-06 10:12:50'),
(3, 'Daniel Anderson', 'danielanderson@example.com', '2023-07-06 11:00:00', '$2y$10$aKMMVZjUjYkB08gFKHbT/eKY.8R2Hfb5IOsZUmtiqfwH3NIqlaOl2', NULL, 0, '2023-07-06 11:00:00', '2023-07-06 10:36:45'),
(4, 'Olivia Taylor', 'oliviataylor@example.com', '2023-07-06 10:00:00', '$2y$10$aKMMVZjUjYkB08gFKHbT/eKY.8R2Hfb5IOsZUmtiqfwH3NIqlaOl2', NULL, 0, '2023-07-06 10:00:00', '2023-07-06 10:16:27'),
(13, 'kanoldsvjolsr', 'kanoldsvjolsr@gmail.com', '2023-07-22 10:12:58', '$2y$10$7Ri6osFmKgl3OkT9McZ9IO63/zjmFyJ0.v4IOARePw4njS86DOsj6', NULL, 0, '2023-07-06 03:02:14', '2023-07-06 10:13:03'),
(5, 'Michael Wilson', 'michaelwilson@example.com', '2023-07-06 07:00:00', '$2y$10$aKMMVZjUjYkB08gFKHbT/eKY.8R2Hfb5IOsZUmtiqfwH3NIqlaOl2', NULL, 0, '2023-07-06 07:00:00', '2023-07-06 10:16:27'),
(6, 'Sophia Martinez', 'sophiamartinez@example.com', '2023-07-06 12:00:00', '$2y$10$aKMMVZjUjYkB08gFKHbT/eKY.8R2Hfb5IOsZUmtiqfwH3NIqlaOl2', NULL, 0, '2023-07-06 12:00:00', '2023-07-06 10:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `scholars_profile`
--

DROP TABLE IF EXISTS `scholars_profile`;
CREATE TABLE IF NOT EXISTS `scholars_profile` (
  `scholars_profile_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `scholars_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `work` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`scholars_profile_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scholars_profile`
--

INSERT INTO `scholars_profile` (`scholars_profile_id`, `scholars_id`, `first_name`, `last_name`, `bio`, `email`, `work`, `education`, `experience`, `created_at`, `updated_at`) VALUES
(2, '2', 'Scholar', 'Eng11', 'Love programming', 'bbbb@gmail.com', 'Tesla, SpaceX', 'Harvard University', 'Engineering, Python', '2023-07-06 04:13:48', '2023-07-06 04:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `upload_papers`
--

DROP TABLE IF EXISTS `upload_papers`;
CREATE TABLE IF NOT EXISTS `upload_papers` (
  `upload_papers_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `scholars_id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish_date` date NOT NULL,
  `ban` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`upload_papers_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upload_papers`
--

INSERT INTO `upload_papers` (`upload_papers_id`, `scholars_id`, `title`, `description`, `website`, `file`, `publish_date`, `ban`, `created_at`, `updated_at`) VALUES
(1, 1, 'AI and Economic', 'We review the evidence that artificial intelligence (AI) is having a large effect on the economy.', 'https://academic.oup.com/esr/article-abstract/5/3/231/712117', 'Test1.pdf', '2023-06-28', 0, '2023-06-29 13:41:28', '2023-06-29 13:41:28'),
(5, 2, 'What is sciecne?', 'Science is a systematic and logical approach to understanding the natural world.', 'https://www.journals.uchicago.edu/doi/full/10.1086/699936', 'Test4.pdf', '2023-06-13', 0, '2023-06-29 13:56:43', '2023-06-29 13:56:43'),
(6, 2, 'Ultracapacitors: why, how, and where is the technology', 'The science and technology of ultracapacitors are reviewed for a number of electrode materials, including carbon, mixed metal oxides, and conducting polymers.', 'https://www.sciencedirect.com/science/article/abs/pii/S0378775300004857', 'Test5.pdf', '2023-06-27', 0, '2023-06-29 16:35:17', '2023-06-29 16:35:17'),
(7, 2, 'Climate change 2007: The physical science basis', 'We observed climate change, climate processes and attribution, and estimates of projected future climate change.', 'https://www.tandfonline.com/doi/abs/10.1080/03736245.2010.480842?journalCode=rsag20', 'Test6_new.pdf', '2023-07-06', 0, '2023-07-06 03:40:04', '2023-07-06 03:40:04'),
(8, 2, 'Are we adapting to climate change?', 'Human systems will have to adapt to climate change.', 'https://www.sciencedirect.com/science/article/pii/S0959378010000968', 'Test7_new.pdf', '2023-07-06', 0, '2023-07-06 11:13:01', '2023-07-06 11:13:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `users_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ban` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`users_id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `ban`, `created_at`, `updated_at`) VALUES
(1, 'SokEng Huot', 'huoteng@gmail.com', NULL, '$2y$10$aKMMVZjUjYkB08gFKHbT/eKY.8R2Hfb5IOsZUmtiqfwH3NIqlaOl2', NULL, 0, '2023-06-29 06:23:47', '2023-07-06 03:45:45'),
(2, 'gellyuser', 'gellyuser@gmail.com', NULL, '$2y$10$6Y7//721/.96y0SG2Qynke6uJ4qr5nbo69uL9k9QTi3N5x9dP3dU.', NULL, 1, '2023-07-06 02:13:13', '2023-07-06 11:16:54'),
(3, 'kanold Vyry', 'nold@gmail.com', NULL, '$2y$10$YpHpZ0G8.tCHwq2hI10AbuHV9AzdPa9QULxILE8eDApt/KYIDGjEi', NULL, 0, '2023-07-06 02:50:48', '2023-07-06 02:50:48'),
(4, 'mono', 'mono@gmail.com', NULL, '$2y$10$UH9X8uD/0to92aEyl.amLeyWvk4MEmkHUXi2qfbEmSNJBSKzljepG', NULL, 0, '2023-07-06 02:56:10', '2023-07-06 02:56:10'),
(5, 'loco smith', 'smith@gmail.com', NULL, '$2y$10$F7CxFryXle8QNJTolYisR.tZpXyEQ/3dY7curStc6o5JlJphaeml.', NULL, 0, '2023-07-06 02:57:33', '2023-07-06 02:57:33'),
(6, 'Sok Bopha', 'sokbopha@example.com', NULL, '$2y$10$7Ri6osFmKgl3OkT9McZ9IO63/zjmFyJ0.v4IOARePw4njS86DOsj6', NULL, 0, '2023-07-06 03:00:00', '2023-07-06 10:15:31'),
(7, 'Chantha Sinan', 'chanthasinan@example.com', NULL, '$dsfd$10$7Ri6osFmKgl3OkT9McZ9IO63/zjmFyJ0.v4IOARePw4njS86DOsj6', NULL, 0, '2023-07-06 04:00:00', '2023-07-06 10:15:31'),
(8, 'Rith Sophea', 'rithsophea@example.com', NULL, '$Sd2y$10$7Ri6osFmKgl3OkT9McZ9IO63/zjmFyJ0.v4IOARePw4njS86DOsj6', NULL, 0, '2023-07-06 05:00:00', '2023-07-06 10:18:20'),
(9, 'Channthy Chan', 'channthychan@example.com', NULL, '$sFm2y$10$7Ri6oKgl3OkT9McZ9IO63/zjmFyJ0.v4IOARePw4njS86DOsj6', NULL, 0, '2023-07-06 06:00:00', '2023-07-06 10:15:31'),
(10, 'Monirath Sun', 'monirathsun@example.com', NULL, '$2y$10$7Ri6osFmKgl3OkT9McZ9IO63/zjmFyJ0.v4IOARePw4njS86DOsj6', NULL, 0, '2023-07-06 07:00:00', '2023-07-06 10:15:31'),
(11, 'Phanna Yann', 'phannayann@example.com', NULL, '$2y$10$7Ri6osFmKgl3OkT9McZ9IO63/zjmFyJ0.v4IOARePw4njS86DOsj6', NULL, 0, '2023-07-06 08:00:00', '2023-07-06 10:18:22'),
(12, 'Bun Sambath', 'bunsambath@example.com', NULL, '$Kgl3OkT9McZ9IO2y$10$7Ri6osFm63/zjmFyJ0.v4IOARePw4njS86DOsj6', NULL, 0, '2023-07-06 09:00:00', '2023-07-06 10:36:34');

-- --------------------------------------------------------

--
-- Table structure for table `users_profile`
--

DROP TABLE IF EXISTS `users_profile`;
CREATE TABLE IF NOT EXISTS `users_profile` (
  `users_profile_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `users_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`users_profile_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_profile`
--

INSERT INTO `users_profile` (`users_profile_id`, `users_id`, `first_name`, `last_name`, `bio`, `email`, `created_at`, `updated_at`) VALUES
(4, '1', 'SokEng', 'Huot', 'Love eating', 'huoteng@gmail.com', '2023-07-06 04:10:55', '2023-07-06 04:11:10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
