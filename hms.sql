-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 16, 2023 at 08:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
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
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$UzqiQ7Hgat6hV2UrsJxLhOPTF7p83Qg1jXHKO14XoA0tWqvlNQaLG', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `created_at`, `updated_at`) VALUES
(1, '2023-09-16 15:03:00', '2023-09-16 15:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `department_translations`
--

CREATE TABLE `department_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_translations`
--

INSERT INTO `department_translations` (`id`, `locale`, `department_id`, `name`) VALUES
(1, 'en', 1, 'Surgery');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `email`, `email_verified_at`, `password`, `phone`, `price`, `created_at`, `updated_at`) VALUES
(1, 'eliza70@example.com', '2023-09-16 12:38:49', '$2y$10$m4hym5wKdx1r6lAMrybhb.CkB3SLPBio8jYI9uCZKEPayosBeT.zG', '+1-458-322-8798', 200.00, '2023-09-16 12:38:51', '2023-09-16 12:38:51'),
(2, 'leola.hickle@example.org', '2023-09-16 12:38:49', '$2y$10$YJQik.NhAiZU8n9zT6rEXeQoErWELJuLxE5bZswKU/YzUWyY54gTu', '+1-681-725-9415', 400.00, '2023-09-16 12:38:51', '2023-09-16 12:38:51'),
(3, 'yoshiko42@example.net', '2023-09-16 12:38:49', '$2y$10$2XBLCxpK6Jvrw4iRukNZquNAgPeE6AwJbwsL/J9AamaVuGJNtJ4KC', '+15599578421', 300.00, '2023-09-16 12:38:51', '2023-09-16 12:38:51'),
(4, 'shanna.schinner@example.net', '2023-09-16 12:38:49', '$2y$10$uKpRZ67GwPvKaVS98bkuoel6sQlI0OP5.RT5.CnVbDY.uxHekooGW', '+1 (860) 498-7028', 100.00, '2023-09-16 12:38:51', '2023-09-16 12:38:51'),
(5, 'ansel93@example.com', '2023-09-16 12:38:49', '$2y$10$Lr/dSvwtG4oy2C3I0ypJQuS4cSTEDAlatEMxmY5CKIf7/i9DjAP7i', '(256) 943-0616', 200.00, '2023-09-16 12:38:51', '2023-09-16 12:38:51'),
(6, 'ckunze@example.com', '2023-09-16 12:38:49', '$2y$10$/tzn/i3c4UyTAOMVf9GlWuxNCRPE/HfGHFvTILwH/xlfd1X4g1gFi', '1-254-505-5277', 500.00, '2023-09-16 12:38:51', '2023-09-16 12:38:51'),
(7, 'isai.boehm@example.net', '2023-09-16 12:38:49', '$2y$10$34YWwXulobRdowonwNA.guzMvhl3BR/0KSg/6DtZMObdtrQQ/LFZ.', '1-217-794-4089', 300.00, '2023-09-16 12:38:51', '2023-09-16 12:38:51'),
(8, 'sylvia13@example.com', '2023-09-16 12:38:49', '$2y$10$mJKjluHgxMI8mO7VdZ16euEwoK18q9MTKvAljmr4d2VfkZh3XaKhe', '878-422-8320', 200.00, '2023-09-16 12:38:51', '2023-09-16 12:38:51'),
(9, 'andreanne.hammes@example.net', '2023-09-16 12:38:49', '$2y$10$08tesXvdE.0Imna7c3caEO5P9wQewU9YjlOYgtPLto9FVqqYth3la', '+15396024226', 300.00, '2023-09-16 12:38:51', '2023-09-16 12:38:51'),
(10, 'bborer@example.org', '2023-09-16 12:38:50', '$2y$10$7EfmRbmNr3uWa0eFS1ASgOPt.oRQt03Ldr0LcKqOtJs54zFEyE3j.', '386.954.0179', 400.00, '2023-09-16 12:38:51', '2023-09-16 12:38:51'),
(11, 'justyn.mraz@example.com', '2023-09-16 12:38:50', '$2y$10$e.Xf2QD5OS4n8SjAim9sVe6JVVX6wFkG7B3gIK973axEuqJBG7ZLC', '1-682-682-3389', 100.00, '2023-09-16 12:38:51', '2023-09-16 12:38:51'),
(12, 'donnelly.lester@example.org', '2023-09-16 12:38:50', '$2y$10$oNVONKPTF9txCh1JqCtPRewtbFGrWZ3ryEEnTTp1DDhxGGPWzJSwC', '+1-712-276-6470', 100.00, '2023-09-16 12:38:51', '2023-09-16 12:38:51'),
(13, 'wyman.erich@example.net', '2023-09-16 12:38:50', '$2y$10$lmdjmE0QUxxOwvYgqhzZhu0Vc9xfIjeJ6Zrkwlayrp/FHTyuqkBmW', '+1-540-705-8786', 300.00, '2023-09-16 12:38:51', '2023-09-16 12:38:51'),
(14, 'bernard.kessler@example.net', '2023-09-16 12:38:50', '$2y$10$UQoan21KT4KC4O2H8txX3eC2ZlJeFjWtb.eA4MTT5bgf03ehd9iwu', '940.348.3791', 100.00, '2023-09-16 12:38:51', '2023-09-16 12:38:51'),
(15, 'geraldine45@example.org', '2023-09-16 12:38:50', '$2y$10$VHGl1HzuPSTbFx/6e9HPjO8CK5G1OFZmSkDKzJBwPzqXj9bmcqvnG', '+1-281-971-1429', 200.00, '2023-09-16 12:38:51', '2023-09-16 12:38:51'),
(16, 'oreilly.zack@example.net', '2023-09-16 12:38:50', '$2y$10$UP1PdAhXmuemX8Npj4cC.OG6QT/E56ioz3tGqhAIOpsCFGvDMArsa', '+14353695615', 200.00, '2023-09-16 12:38:51', '2023-09-16 12:38:51'),
(17, 'andrew.veum@example.net', '2023-09-16 12:38:50', '$2y$10$sd5.Qz3Xz6kBIEtlJDhpBeZLB5alKstzuHqXOItZuXSyxky4Glxoe', '1-870-650-9957', 500.00, '2023-09-16 12:38:51', '2023-09-16 12:38:51'),
(18, 'dorthy14@example.com', '2023-09-16 12:38:50', '$2y$10$ophYz0/l.Tz5ybNfAnMcBO1jAHWW0Nw0dIu9l81/uNn2GfOocEmWS', '959.753.3525', 500.00, '2023-09-16 12:38:51', '2023-09-16 12:38:51'),
(19, 'henriette.howe@example.com', '2023-09-16 12:38:50', '$2y$10$U5b.N4Fb.wtZsb4pFuDTGO768fEifZO01tkUNa4QEiUtUQRrG5eri', '281-603-7015', 400.00, '2023-09-16 12:38:51', '2023-09-16 12:38:51'),
(20, 'hayley59@example.net', '2023-09-16 12:38:50', '$2y$10$J/liNZeeygiy1OQmgo/z0OAtXVxAg7FtZJFx3WvQ315FZ5HlNQpty', '206-426-8574', 300.00, '2023-09-16 12:38:51', '2023-09-16 12:38:51'),
(21, 'abbey.keeling@example.com', '2023-09-16 12:38:50', '$2y$10$4xHBuxKpokiEIwwTomUcQuyBCa6gSNW6vLAPHAPR2Z.HkSwVy2eIO', '+1.517.544.1537', 100.00, '2023-09-16 12:38:51', '2023-09-16 12:38:51'),
(22, 'oreilly.samantha@example.org', '2023-09-16 12:38:50', '$2y$10$gE8bE2FxGnmvDh8xPOvdieBtDRS2REvxm/hu7npRZD/WXBjbjlEC6', '+1.931.431.0260', 200.00, '2023-09-16 12:38:51', '2023-09-16 12:38:51'),
(23, 'sydnee.hayes@example.org', '2023-09-16 12:38:50', '$2y$10$EOiNfDLtfPTPPu6mZ0RiSeV.s3qbqGtMBSOMm8RuEC5tbs64AsS8S', '1-651-537-5337', 500.00, '2023-09-16 12:38:51', '2023-09-16 12:38:51'),
(24, 'annalise42@example.org', '2023-09-16 12:38:50', '$2y$10$lhuZUh7FP6uqVMwB..ruL./D9GZmVJcHnaJV77i1pnyxkdIYy./g2', '+1 (838) 382-3438', 100.00, '2023-09-16 12:38:51', '2023-09-16 12:38:51'),
(25, 'alyson24@example.org', '2023-09-16 12:38:50', '$2y$10$IZJ1xKf9cX7I0N9MH2OaDu8n9JnrGJDCkainUk7AEV9JnGBfjT5/S', '+1.872.331.0624', 400.00, '2023-09-16 12:38:51', '2023-09-16 12:38:51'),
(26, 'hsenger@example.org', '2023-09-16 12:38:50', '$2y$10$7hCopHcBRs/PHZHS4HZKaOK5ZePX6IDqBIgaa8ajwUnyHj7mJ3NYa', '(980) 642-3701', 200.00, '2023-09-16 12:38:51', '2023-09-16 12:38:51'),
(27, 'okoch@example.com', '2023-09-16 12:38:50', '$2y$10$EuYe6X3wNQSLKXNGfYbBluE4ijNF6p3dFzdM.jQ/1DwXPoMCaIox2', '1-858-979-4258', 400.00, '2023-09-16 12:38:51', '2023-09-16 12:38:51'),
(28, 'helen.cassin@example.net', '2023-09-16 12:38:50', '$2y$10$gElJqqcvye4aKP6EsGvlFO/8Aypug05OiPdQxUKZ8UWDcF3/IPGTa', '+1.475.371.5018', 300.00, '2023-09-16 12:38:51', '2023-09-16 12:38:51'),
(29, 'donnelly.erika@example.org', '2023-09-16 12:38:51', '$2y$10$mU3PwgFAxB7Al3HzFgkpL.UGUgNUalLvNriqX69aLNgXVGBhuXiCe', '321.449.6231', 500.00, '2023-09-16 12:38:51', '2023-09-16 12:38:51'),
(30, 'imelda42@example.org', '2023-09-16 12:38:51', '$2y$10$zYIMw6RYYga3YfrIe3ubXO0kHXxlsKkmMeXBqK7khB7TbHZAFylcm', '+15405903113', 500.00, '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(31, 'douglas.domenica@example.net', '2023-09-16 12:38:51', '$2y$10$VyG9Qdy6GzfFST8eQk7R9O3I5rhUpE4XHHKYJ7i0Zx6i3wchP8bha', '323.680.1376', 400.00, '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(32, 'mervin.green@example.com', '2023-09-16 12:38:51', '$2y$10$ye1GzepwlRokQIHsH6Wq8.xsfJzkTu8TW8CkW2BiJcyNtADD5tw3y', '678.598.2701', 100.00, '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(33, 'wisoky.cordia@example.com', '2023-09-16 12:38:51', '$2y$10$KNAnE7T8Q6h0GAkeMPVFJudAj8LbzFPOnTCDxX17g3jph7pu3DWqq', '+1 (978) 531-6689', 500.00, '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(34, 'mack05@example.org', '2023-09-16 12:38:51', '$2y$10$52BqL2Mi/1qUHw8XgEU/g.9eZvM.zrztedyRaCf1OrEntBvcwYLoG', '(641) 896-9219', 100.00, '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(35, 'charity95@example.com', '2023-09-16 12:38:51', '$2y$10$tFUzuisoAf476R0XpRo5AemGKiTciHUSzMr13BY/JSSy/oIor0ek.', '+1-312-731-7277', 500.00, '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(36, 'willy.miller@example.org', '2023-09-16 12:38:51', '$2y$10$nBIUlh5eOQ9DMpSG2a06re63NVSN1dGaz7pOTKWZVuAUnWkRT.WDy', '(862) 558-5465', 400.00, '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(37, 'zelma.torphy@example.org', '2023-09-16 12:38:51', '$2y$10$qA3Ug/L8P0FmG6zghwYYg.Ii/hSlQjwvVUl0p2i2a6XQn8XLs.B5W', '+1 (248) 670-1289', 300.00, '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(38, 'danika07@example.com', '2023-09-16 12:38:51', '$2y$10$TBDBrGHoNHfZG9idsfomQ.Mcf6w/.Ui/fRvGdnmXXpSPZ8cmkcsi6', '(737) 601-6401', 500.00, '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(39, 'michel30@example.com', '2023-09-16 12:38:51', '$2y$10$vLcrfP.12mo9YW4EmEMgfOmmIMiRM0HMBOFF1lbPOm2fP87tkPh8u', '+1 (541) 352-8508', 100.00, '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(40, 'arvel22@example.net', '2023-09-16 12:38:51', '$2y$10$1/yfWE9iHLvsmc40LrVMqeI9uSxkllh0LfF9zrYsuJ/wquVOEwISu', '1-541-966-4229', 200.00, '2023-09-16 12:38:52', '2023-09-16 12:38:52');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_translations`
--

CREATE TABLE `doctor_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `appointments` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_translations`
--

INSERT INTO `doctor_translations` (`id`, `locale`, `doctor_id`, `name`, `appointments`) VALUES
(1, 'en', 1, 'Francesco Johns', 'Monday'),
(2, 'en', 2, 'Vanessa Crona', 'Monday'),
(3, 'en', 3, 'Mrs. Linda Volkman', 'Thursday'),
(4, 'en', 4, 'Jadon Stamm', 'Monday'),
(5, 'en', 5, 'Dr. Brook White DDS', 'Friday'),
(6, 'en', 6, 'Antonina Upton', 'Monday'),
(7, 'en', 7, 'Broderick Glover', 'Sunday'),
(8, 'en', 8, 'Angelica Fay', 'Sunday'),
(9, 'en', 9, 'Prof. Kory Kovacek Jr.', 'Wednesday'),
(10, 'en', 10, 'Philip Macejkovic', 'Tuesday'),
(11, 'en', 11, 'Erick Auer II', 'Wednesday'),
(12, 'en', 12, 'Emery Koss III', 'Friday'),
(13, 'en', 13, 'Miss Meggie McCullough I', 'Tuesday'),
(14, 'en', 14, 'Johnathan Daniel', 'Friday'),
(15, 'en', 15, 'Eloisa Schimmel DVM', 'Thursday'),
(16, 'en', 16, 'Chaya Wilkinson', 'Tuesday'),
(17, 'en', 17, 'Ima Botsford', 'Monday'),
(18, 'en', 18, 'Renee Beier', 'Friday'),
(19, 'en', 19, 'Prof. Eliseo Moore V', 'Wednesday'),
(20, 'en', 20, 'Prof. Loyal Prosacco V', 'Tuesday'),
(21, 'en', 21, 'Ottilie Gorczany Jr.', 'Saturday'),
(22, 'en', 22, 'Prof. Kristofer Kautzer', 'Monday'),
(23, 'en', 23, 'Gerson Bernhard MD', 'Monday'),
(24, 'en', 24, 'Chase Reichel', 'Sunday'),
(25, 'en', 25, 'Noble Stroman', 'Friday'),
(26, 'en', 26, 'Ed Stiedemann', 'Monday'),
(27, 'en', 27, 'Cathy Kuhn', 'Wednesday'),
(28, 'en', 28, 'Dr. Odessa McKenzie Sr.', 'Thursday'),
(29, 'en', 29, 'Prof. Kellen Haag', 'Thursday'),
(30, 'en', 30, 'Willa Roberts', 'Wednesday'),
(31, 'en', 31, 'Ayla Klocko', 'Saturday'),
(32, 'en', 32, 'Mrs. Lola Rath', 'Saturday'),
(33, 'en', 33, 'Herbert Nienow', 'Monday'),
(34, 'en', 34, 'Kassandra Quigley', 'Thursday'),
(35, 'en', 35, 'Noe Willms MD', 'Monday'),
(36, 'en', 36, 'Prof. Verner Towne', 'Sunday'),
(37, 'en', 37, 'Stone Beier', 'Saturday'),
(38, 'en', 38, 'Myrtie Conroy', 'Wednesday'),
(39, 'en', 39, 'Dr. Aletha Pagac DDS', 'Monday'),
(40, 'en', 40, 'Malinda Ward V', 'Tuesday');

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
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `imageable_id` int(11) NOT NULL,
  `imageable_type` varchar(255) NOT NULL COMMENT 'column will contain the class name of the parent model',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `url`, `imageable_id`, `imageable_type`, `created_at`, `updated_at`) VALUES
(1, '1.png', 30, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(2, '3.png', 7, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(3, '1.png', 28, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(4, '2.png', 12, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(5, '2.png', 17, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(6, '1.png', 23, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(7, '4.png', 38, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(8, '1.png', 36, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(9, '4.png', 26, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(10, '2.png', 19, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(11, '2.png', 19, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(12, '4.png', 31, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(13, '4.png', 31, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(14, '4.png', 13, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(15, '4.png', 6, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(16, '3.png', 5, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(17, '2.png', 1, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(18, '4.png', 34, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(19, '4.png', 39, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(20, '2.png', 25, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(21, '3.png', 25, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(22, '2.png', 37, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(23, '1.png', 10, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(24, '4.png', 24, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(25, '4.png', 13, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(26, '4.png', 31, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(27, '1.png', 38, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(28, '4.png', 10, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(29, '3.png', 30, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(30, '1.png', 27, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(31, '4.png', 40, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(32, '3.png', 4, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(33, '4.png', 28, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(34, '1.png', 33, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(35, '4.png', 34, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(36, '4.png', 15, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(37, '4.png', 31, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(38, '3.png', 37, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(39, '1.png', 37, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52'),
(40, '1.png', 35, 'App\\Models\\Doctor', '2023-09-16 12:38:52', '2023-09-16 12:38:52');

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
(5, '2023_09_10_122421_create_admins_table', 1),
(6, '2023_09_12_211714_create_departments_table', 1),
(7, '2023_09_12_212453_create_department_translations_table', 1),
(8, '2023_09_16_093326_create_doctors_table', 1),
(9, '2023_09_16_093551_create_doctor_translations_table', 1),
(10, '2023_09_16_140526_create_images_table', 1);

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
(1, 'user', 'user@gmail.com', NULL, '$2y$10$1oVfgwFm3Ij3zwXsBlJcWeCzcOwombwPyhHVwj9Ouw0Kdb2yUFiG2', NULL, NULL, NULL);

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
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_translations`
--
ALTER TABLE `department_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department_translations_department_id_locale_unique` (`department_id`,`locale`),
  ADD KEY `department_translations_locale_index` (`locale`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctors_email_unique` (`email`);

--
-- Indexes for table `doctor_translations`
--
ALTER TABLE `doctor_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctor_translations_doctor_id_locale_unique` (`doctor_id`,`locale`),
  ADD KEY `doctor_translations_locale_index` (`locale`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department_translations`
--
ALTER TABLE `department_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `doctor_translations`
--
ALTER TABLE `doctor_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- Constraints for table `department_translations`
--
ALTER TABLE `department_translations`
  ADD CONSTRAINT `department_translations_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctor_translations`
--
ALTER TABLE `doctor_translations`
  ADD CONSTRAINT `doctor_translations_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
